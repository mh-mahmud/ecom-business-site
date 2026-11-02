<?php
date_default_timezone_set('Asia/Dhaka');
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';


// ==================================================
// ONLY ALLOW POST
// ==================================================

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    http_response_code(405);

    exit('Method Not Allowed');
}

/*echo "<pre>";
print_r($_POST);
die;*/

// ==================================================
// CSRF PROTECTION
// ==================================================

$submitted_token = $_POST['csrf_token'] ?? '';

if (
    empty($submitted_token) ||
    empty($_SESSION['csrf_token']) ||
    !hash_equals(
        $_SESSION['csrf_token'],
        $submitted_token
    )
) {

    http_response_code(403);

    exit(
        'Invalid CSRF token. Please refresh the page and try again.'
    );
}


// ==================================================
// ONE-TIME ORDER TOKEN
// ==================================================

$submitted_order_token = $_POST['order_token'] ?? '';

if (
    empty($submitted_order_token) ||
    empty($_SESSION['order_token']) ||
    !hash_equals(
        $_SESSION['order_token'],
        $submitted_order_token
    )
) {

    http_response_code(409);

    exit(
        'This order has already been submitted or the form has expired. Please refresh the page.'
    );
}


// ==================================================
// IMPORTANT:
// Consume order token immediately
// ==================================================

unset($_SESSION['order_token']);


// ==================================================
// DATABASE CONNECTION
// ==================================================

$host = "localhost";
$dbname = "prithaen_landing";
$username = "prithaen_luser";
$password = "xPWimTBywdyv";

try {

    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );

} catch (PDOException $e) {

    error_log(
        'Database connection failed: ' . $e->getMessage()
    );

    http_response_code(500);

    exit('Database connection failed.');

}


// ==================================================
// GET FORM DATA
// ==================================================

$name = trim(
    $_POST['billing_first_name'] ?? ''
);

$phone = trim(
    $_POST['billing_phone'] ?? ''
);

$address = trim(
    $_POST['billing_address_1'] ?? ''
);

$quantity = (int) (
    $_POST['quantity'] ?? 1
);


// ==================================================
// PRODUCT
// ==================================================

$unit_price = $_POST['unit_price'];

$subtotal = $unit_price * $quantity;

$shipping = 0;

$total = $subtotal + $shipping;

$payment_method = "Cash on Delivery";


// ==================================================
// VALIDATION
// ==================================================

if (
    $name === '' ||
    $phone === '' ||
    $address === ''
) {

    http_response_code(422);

    exit(
        "Please fill in all required fields."
    );
}


if (
    !preg_match(
        '/^01[3-9][0-9]{8}$/',
        $phone
    )
) {

    http_response_code(422);

    exit(
        "Invalid Bangladesh phone number."
    );
}


if ($quantity < 1 || $quantity > 10) {

    http_response_code(422);

    exit(
        "Invalid quantity."
    );
}


// ==================================================
// GET IP
// ==================================================

$ip_address = $_SERVER['REMOTE_ADDR'] ?? '';

$user_agent = $_SERVER['HTTP_USER_AGENT'] ?? '';
$created_at = date("Y-m-d H:i:s");


// ==================================================
// RATE LIMIT
//
// Maximum 3 orders from the same IP
// within 60 minutes
// ==================================================

/*$rateLimitSql = "
    SELECT COUNT(*)
    FROM orders_new_hairoil
    WHERE ip_address = :ip_address
    AND created_at >= DATE_SUB(
        NOW(),
        INTERVAL 60 MINUTE
    )
";

$rateLimitStmt = $pdo->prepare(
    $rateLimitSql
);

$rateLimitStmt->execute([
    ':ip_address' => $ip_address
]);

$recentOrders = (int) $rateLimitStmt->fetchColumn();


if ($recentOrders >= 3) {

    error_log(
        "Order rate limit exceeded. IP: "
        . $ip_address
    );

    http_response_code(429);

    exit(
        "Too many orders. Please try again later."
    );
}*/

$rateLimitTime = date("Y-m-d H:i:s", strtotime("-60 minutes"));

$rateLimitSql = "
    SELECT COUNT(*)
    FROM orders_new_hairoil
    WHERE ip_address = :ip_address
    AND created_at >= :rate_limit_time
";

$rateLimitStmt = $pdo->prepare($rateLimitSql);

$rateLimitStmt->execute([
    ':ip_address' => $ip_address,
    ':rate_limit_time' => $rateLimitTime
]);

$recentOrders = (int) $rateLimitStmt->fetchColumn();

if ($recentOrders >= 3) {
    error_log("Order rate limit exceeded. IP: " . $ip_address);
    http_response_code(429);
    exit("Too many orders. Please try again later.");
}


// ==================================================
// DUPLICATE ORDER PROTECTION
//
// Same phone + address within 2 minutes
// ==================================================

/*$duplicateSql = "
    SELECT order_number
    FROM orders_new_hairoil

    WHERE phone = :phone

    AND address = :address

    AND created_at >= DATE_SUB(
        NOW(),
        INTERVAL 2 MINUTE
    )

    ORDER BY created_at DESC

    LIMIT 1
";

$duplicateStmt = $pdo->prepare(
    $duplicateSql
);

$duplicateStmt->execute([
    ':phone' => $phone,
    ':address' => $address
]);

$existingOrder = $duplicateStmt->fetch();


if ($existingOrder) {

    error_log(
        "Duplicate order blocked. "
        . "Existing order: #"
        . $existingOrder['order_number']
        . " IP: "
        . $ip_address
    );

    http_response_code(409);

    exit(
        "Duplicate order detected. "
        . "Your previous order has already been received."
    );
}*/

$duplicateTime = date(
    "Y-m-d H:i:s",
    strtotime("-2 minutes")
);

$duplicateSql = "
    SELECT order_number
    FROM orders_new_hairoil
    WHERE phone = :phone
    AND address = :address
    AND created_at >= :duplicate_time
    ORDER BY created_at DESC
    LIMIT 1
";

$duplicateStmt = $pdo->prepare($duplicateSql);

$duplicateStmt->execute([
    ':phone' => $phone,
    ':address' => $address,
    ':duplicate_time' => $duplicateTime
]);

$existingOrder = $duplicateStmt->fetch();

if ($existingOrder) {

    error_log(
        "Duplicate order blocked. "
        . "Existing order: #"
        . $existingOrder['order_number']
        . " IP: "
        . $ip_address
    );

    http_response_code(409);

    exit(
        "Duplicate order detected. "
        . "Your previous order has already been received."
    );
}


// ==================================================
// GENERATE UNIQUE ORDER NUMBER
// ==================================================

function generateOrderNumber(PDO $pdo): string
{
    do {

        $orderNumber = (string) random_int(
            100000,
            999999
        );

        $stmt = $pdo->prepare(
            "
            SELECT COUNT(*)
            FROM orders_new_hairoil
            WHERE order_number = :order_number
            "
        );

        $stmt->execute([
            ':order_number' => $orderNumber
        ]);

        $exists = (int) $stmt->fetchColumn();

    } while ($exists > 0);

    return $orderNumber;
}


$orderNumber = generateOrderNumber($pdo);


// ==================================================
// INSERT ORDER
// ==================================================

$sql = "
    INSERT INTO orders_new_hairoil
    (
        order_number,
        name,
        phone,
        address,
        quantity,
        unit_price,
        total,
        payment_method,
        ip_address,
        user_agent,
        created_at
    )

    VALUES
    (
        :order_number,
        :name,
        :phone,
        :address,
        :quantity,
        :unit_price,
        :total,
        :payment_method,
        :ip_address,
        :user_agent,
        :created_at
    )
";

$stmt = $pdo->prepare($sql);

$stmt->execute([

    ':order_number' => $orderNumber,

    ':name' => $name,

    ':phone' => $phone,

    ':address' => $address,

    ':quantity' => $quantity,

    ':unit_price' => $unit_price,

    ':total' => $total,

    ':payment_method' => $payment_method,

    ':ip_address' => $ip_address,

    ':user_agent' => $user_agent,

    ':created_at' => $created_at,

]);


// ==================================================
// ORDER ID
// ==================================================

$order_id = $orderNumber;


// ==========================================
// SEND EMAIL TO ADMIN
// ==========================================




try {

    $mail = new PHPMailer(true);

    // =====================================================
    // SMTP SETTINGS
    // =====================================================

    $mail->isSMTP();
    $mail->Host       = 'mail.prithaenterprise.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'info@prithaenterprise.com';
    $mail->Password   = '##$$AAaa123456';

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    // =====================================================
    // SENDER
    // =====================================================

    $mail->setFrom(
        'info@prithaenterprise.com',
        'Pritha Enterprise'
    );

    // =====================================================
    // RECEIVER
    // =====================================================

    $mail->addAddress(
        'dcostapankaj@gmail.com',
        // 'mh.developer.me@gmail.com',
        'Admin'
    );

    // =====================================================
    // ORDER DATA
    // =====================================================

    $product_name = 'Mahashankar Hair Oil';

    $quantity = (int) $quantity;

    $unit_price = (float) $unit_price;

    $subtotal = $unit_price * $quantity;

    $shipping = 0;

    $total = $subtotal + $shipping;

    $order_date = date('F d, Y');

    // Escape customer data before inserting into HTML
    $safe_name = htmlspecialchars(
        $name,
        ENT_QUOTES,
        'UTF-8'
    );

    $safe_phone = htmlspecialchars(
        $phone,
        ENT_QUOTES,
        'UTF-8'
    );

    $safe_address = nl2br(
        htmlspecialchars(
            $address,
            ENT_QUOTES,
            'UTF-8'
        )
    );

    $safe_payment_method = htmlspecialchars(
        $payment_method,
        ENT_QUOTES,
        'UTF-8'
    );

    // =====================================================
    // SUBJECT
    // =====================================================

    $mail->Subject =
        'New Order: #' . $order_id;

    // =====================================================
    // HTML EMAIL
    // =====================================================

    $mail->isHTML(true);

    $mail->CharSet = 'UTF-8';

    $mail->Body = '

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>New Order #' . $order_id . '</title>

</head>

<body style="
    margin:0;
    padding:0;
    background:#ffffff;
    font-family:Arial, Helvetica, sans-serif;
    color:#666666;
">

<table
    width="100%"
    cellpadding="0"
    cellspacing="0"
    border="0"
    style="background:#ffffff;"
>

<tr>

<td align="center">

<table
    width="100%"
    cellpadding="0"
    cellspacing="0"
    border="0"
    style="
        max-width:600px;
        margin:0 auto;
        background:#ffffff;
    "
>

<!-- =====================================================
     HEADER
===================================================== -->

<tr>

<td style="
    background:#7200e9;
    padding:20px 30px;
    color:#ffffff;
    font-size:28px;
    line-height:1.3;
    font-weight:300;
">

New Order: #' . $order_id . '

</td>

</tr>


<!-- =====================================================
     CONTENT
===================================================== -->

<tr>

<td style="
    padding:45px 48px 30px 48px;
">

<!-- Introduction -->

<p style="
    margin:0 0 22px 0;
    font-size:14px;
    line-height:1.7;
    color:#777777;
">

You\'ve received the following order from
<strong>' . $safe_name . '</strong>:

</p>


<!-- Order Link -->

<p style="
    margin:0 0 20px 0;
    font-size:16px;
    line-height:1.5;
">

<a
    href="#"
    style="
        color:#6d00d9;
        text-decoration:underline;
    "
>

Order #' . $order_id . '

</a>

<span style="
    color:#6d00d9;
">

(' . $order_date . ')

</span>

</p>


<!-- =====================================================
     PRODUCT TABLE
===================================================== -->

<table
    width="100%"
    cellpadding="0"
    cellspacing="0"
    border="0"
    style="
        border-collapse:collapse;
        margin-top:10px;
        font-size:14px;
    "
>

<tr>

<th
    align="left"
    style="
        border:1px solid #dddddd;
        padding:14px 12px;
        color:#555555;
        font-weight:normal;
        width:65%;
    "
>

প্রোডাক্ট

</th>

<th
    align="center"
    style="
        border:1px solid #dddddd;
        padding:14px 8px;
        color:#555555;
        font-weight:normal;
        width:15%;
    "
>

Quantity

</th>

<th
    align="right"
    style="
        border:1px solid #dddddd;
        padding:14px 12px;
        color:#555555;
        font-weight:normal;
        width:20%;
    "
>

Price

</th>

</tr>


<tr>

<td
    style="
        border:1px solid #dddddd;
        padding:14px 12px;
        color:#666666;
        line-height:1.5;
    "
>

' . htmlspecialchars(
    $product_name,
    ENT_QUOTES,
    'UTF-8'
) . '

</td>

<td
    align="center"
    style="
        border:1px solid #dddddd;
        padding:14px 8px;
        color:#666666;
    "
>

' . $quantity . '

</td>

<td
    align="right"
    style="
        border:1px solid #dddddd;
        padding:14px 12px;
        color:#666666;
        white-space:nowrap;
    "
>

৳' . number_format(
    $subtotal,
    2
) . '

</td>

</tr>

</table>


<!-- Separator -->

<table
    width="100%"
    cellpadding="0"
    cellspacing="0"
    border="0"
>

<tr>

<td
    height="40"
    style="
        border-bottom:1px solid #dddddd;
    "
>

</td>

</tr>

</table>


<!-- =====================================================
     TOTALS
===================================================== -->

<table
    width="100%"
    cellpadding="0"
    cellspacing="0"
    border="0"
    style="
        border-collapse:collapse;
        margin-top:20px;
        font-size:14px;
    "
>

<tr>

<td
    style="
        border:1px solid #dddddd;
        padding:15px 12px;
        color:#666666;
        width:42%;
    "
>

Subtotal:

</td>

<td
    style="
        border:1px solid #dddddd;
        padding:15px 12px;
        color:#666666;
    "
>

৳' . number_format(
    $subtotal,
    2
) . '

</td>

</tr>


<tr>

<td
    style="
        border:1px solid #dddddd;
        padding:15px 12px;
        color:#666666;
    "
>

Shipping:

</td>

<td
    style="
        border:1px solid #dddddd;
        padding:15px 12px;
        color:#666666;
    "
>

৳' . number_format(
    $shipping,
    2
) . '

&nbsp;

<span style="
    font-size:12px;
    color:#777777;
">

via ঢাকা সিটির ভিতরে

</span>

</td>

</tr>


<tr>

<td
    style="
        border:1px solid #dddddd;
        padding:15px 12px;
        color:#666666;
    "
>

Payment method:

</td>

<td
    style="
        border:1px solid #dddddd;
        padding:15px 12px;
        color:#666666;
    "
>

' . $safe_payment_method . '

</td>

</tr>


<tr>

<td
    style="
        border:1px solid #dddddd;
        padding:15px 12px;
        color:#666666;
    "
>

Total:

</td>

<td
    style="
        border:1px solid #dddddd;
        padding:15px 12px;
        color:#666666;
        font-weight:500;
    "
>

৳' . number_format(
    $total,
    2
) . '

</td>

</tr>

</table>


<!-- =====================================================
     ADDRESS SEPARATOR
===================================================== -->

<table
    width="100%"
    cellpadding="0"
    cellspacing="0"
    border="0"
>

<tr>

<td
    height="40"
    style="
        border-bottom:1px solid #dddddd;
    "
>

</td>

</tr>

</table>


<!-- =====================================================
     ADDRESSES
===================================================== -->

<table
    width="100%"
    cellpadding="0"
    cellspacing="0"
    border="0"
    style="
        margin-top:20px;
    "
>

<tr>

<!-- BILLING -->

<td
    valign="top"
    width="50%"
    style="
        padding-right:15px;
    "
>

<h2 style="
    margin:0 0 18px 0;
    font-size:18px;
    font-weight:400;
    color:#6d00d9;
">

Billing address

</h2>


<div style="
    border:1px solid #dddddd;
    padding:14px 12px;
    font-size:14px;
    line-height:1.7;
    color:#777777;
">

<strong style="
    font-weight:normal;
">

' . $safe_name . '

</strong>

<br>

' . $safe_address . '

<br>

<a
    href="tel:' . $safe_phone . '"
    style="
        color:#6d00d9;
        text-decoration:underline;
    "
>

' . $safe_phone . '

</a>

</div>

</td>


<!-- SHIPPING -->

<td
    valign="top"
    width="50%"
    style="
        padding-left:15px;
    "
>

<h2 style="
    margin:0 0 18px 0;
    font-size:18px;
    font-weight:400;
    color:#6d00d9;
">

Shipping address

</h2>


<div style="
    border:1px solid #dddddd;
    padding:14px 12px;
    font-size:14px;
    line-height:1.7;
    color:#777777;
">

<strong style="
    font-weight:normal;
">

' . $safe_name . '

</strong>

<br>

' . $safe_address . '

</div>

</td>

</tr>

</table>


<!-- =====================================================
     FOOTER
===================================================== -->

<table
    width="100%"
    cellpadding="0"
    cellspacing="0"
    border="0"
>

<tr>

<td
    height="40"
    style="
        border-bottom:1px solid #dddddd;
    "
>

</td>

</tr>

</table>


<p style="
    margin:25px 0 0 0;
    font-size:12px;
    line-height:1.6;
    color:#999999;
    text-align:center;
">

Thank you for your order.

<br>

Pritha Enterprise

</p>

</td>

</tr>

</table>

</td>

</tr>

</table>

</body>

</html>

';


    // =====================================================
    // PLAIN TEXT FALLBACK
    // =====================================================

    $mail->AltBody =

"NEW ORDER: #$order_id

You've received the following order from $name.

Order #$order_id
Date: $order_date

Product:
$product_name

Quantity: $quantity

Subtotal: ৳" .
number_format($subtotal, 2) .

"

Shipping: ৳" .
number_format($shipping, 2) .

"

Payment Method:
$payment_method

Total: ৳" .
number_format($total, 2) .

"

Billing Address:
$name
$address
$phone

Shipping Address:
$name
$address
$phone

Thank you,
Pritha Enterprise";


    // =====================================================
    // SEND
    // =====================================================

    $mail->send();


    // =====================================================
    // LOG
    // =====================================================

    error_log(
        "Order email sent successfully. Order ID: #"
        . $order_id
    );


} catch (Exception $e) {

    error_log(
        "Order email failed. Order ID: #"
        . $order_id
        . " - "
        . $mail->ErrorInfo
    );

}


// ==========================================
// End Email
// ==========================================



// ==========================================
// REDIRECT
// ==========================================


header("Location: index.php?order_id=" . $order_id);
exit;

?>