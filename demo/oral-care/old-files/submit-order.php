<?php
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

    exit('Invalid CSRF token. Please refresh the page and try again.');
}

// ==========================================
// DATABASE CONNECTION
// ==========================================

$host = "localhost";
$dbname = "landing_db";
$username = "root";
$password = "";

try {

    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );

    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch (PDOException $e) {

    die("Database connection failed.");

}


// ==========================================
// GET FORM DATA
// ==========================================

$name = trim($_POST['billing_first_name'] ?? '');
$phone = trim($_POST['billing_phone'] ?? '');
$address = trim($_POST['billing_address_1'] ?? '');

$quantity = (int)($_POST['wcf_qty_selection'] ?? 1);


// ==========================================
// PRODUCT PRICE
// ==========================================

$unit_price = 900;

$total = $unit_price * $quantity;

$payment_method = "Cash on Delivery";


// ==========================================
// VALIDATION
// ==========================================

if ($name === '' || $phone === '' || $address === '') {

    die("Please fill in all required fields.");

}


if (!preg_match('/^01[3-9][0-9]{8}$/', $phone)) {

    die("Invalid Bangladesh phone number.");

}


if ($quantity < 1) {

    die("Invalid quantity.");

}


// ==========================================
// INSERT ORDER
// ==========================================

$sql = "
    INSERT INTO orders_new
    (
        name,
        phone,
        address,
        quantity,
        unit_price,
        total,
        payment_method
    )
    VALUES
    (
        :name,
        :phone,
        :address,
        :quantity,
        :unit_price,
        :total,
        :payment_method
    )
";

$stmt = $pdo->prepare($sql);
// echo "<pre>";
// print_r($_POST);die;

$stmt->execute([

    ':name' => $name,
    ':phone' => $phone,
    ':address' => $address,
    ':quantity' => $quantity,
    ':unit_price' => $unit_price,
    ':total' => $total,
    ':payment_method' => $payment_method

]);


// Get newly created order ID

$order_id = $pdo->lastInsertId();


// ==========================================
// SEND EMAIL TO ADMIN
// ==========================================

try {

    $mail = new PHPMailer(true);

    // SMTP settings
    $mail->isSMTP();
    $mail->Host       = 'mail.prithaenterprise.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'info@prithaenterprise.com';
    $mail->Password   = '##$$AAaa123456';

    // Port 465 = SSL
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    // Sender
    $mail->setFrom(
        'info@prithaenterprise.com',
        'Pritha Enterprise'
    );

    // Receiver
    $mail->addAddress(
        'mh.developer.me@gmail.com',
        'Admin'
    );

    // Subject
    $mail->Subject = 'New Order Received - Order #' . $order_id;

    // Plain text email
    $mail->isHTML(false);

    $mail->Body = "
========================================
NEW ORDER RECEIVED
========================================

Order ID: #$order_id

Customer Information
--------------------

Name: $name

Phone: $phone

Address:
$address


Order Information
-----------------

Product:
Mahashankar Oral Care Combo

Quantity: $quantity

Unit Price: ৳" . number_format($unit_price, 2) . "

Subtotal: ৳" . number_format($total, 2) . "

Total: ৳" . number_format($total, 2) . "

Payment Method:
$payment_method


Order Date:
" . date("Y-m-d H:i:s") . "


========================================
";

    // Send email
    $mail->send();

    // Optional logging
    error_log(
        "Order email sent successfully. Order ID: #" . $order_id
    );

} catch (Exception $e) {

    // Log the email error
    error_log(
        "Order email failed. Order ID: #" .
        $order_id .
        " - " .
        $mail->ErrorInfo
    );

    // Don't stop the order process
}


// ==========================================
// REDIRECT
// ==========================================


header("Location: index.php?order_id=" . $order_id);
exit;

?>