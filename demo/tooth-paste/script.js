// ================= MOBILE MENU =================

const menuToggle = document.getElementById("menuToggle");
const navMenu = document.getElementById("navMenu");

menuToggle.addEventListener("click", () => {
    navMenu.classList.toggle("active");
});


// Close menu after clicking navigation

document.querySelectorAll(".nav-menu a").forEach(link => {

    link.addEventListener("click", () => {
        navMenu.classList.remove("active");
    });

});


// ================= FAQ =================

const faqQuestions =
    document.querySelectorAll(".faq-question");

faqQuestions.forEach(question => {

    question.addEventListener("click", () => {

        const currentItem = question.parentElement;

        document.querySelectorAll(".faq-item")
            .forEach(item => {

                if (item !== currentItem) {
                    item.classList.remove("active");
                }

            });

        currentItem.classList.toggle("active");

    });

});


// ================= ORDER FORM =================

const orderForm =
    document.getElementById("orderForm");

const successMessage =
    document.getElementById("successMessage");


// Bangladesh phone validation

function isValidBangladeshPhone(phone) {

    const pattern = /^01[3-9]\d{8}$/;

    return pattern.test(phone);

}


orderForm.addEventListener("submit", function(event) {

    event.preventDefault();


    const name =
        document.getElementById("name").value.trim();

    const phone =
        document.getElementById("phone").value.trim();

    const address =
        document.getElementById("address").value.trim();


    // Validate name

    if (name.length < 3) {

        alert("অনুগ্রহ করে আপনার পূর্ণ নাম লিখুন।");

        return;

    }


    // Validate Bangladesh phone

    if (!isValidBangladeshPhone(phone)) {

        alert(
            "সঠিক বাংলাদেশি মোবাইল নম্বর দিন।\nউদাহরণ: 01712345678"
        );

        return;

    }


    // Validate address

    if (address.length < 10) {

        alert("অনুগ্রহ করে সম্পূর্ণ ঠিকানা লিখুন।");

        return;

    }


    /*
        এখানে আপনার backend API call করবেন।

        Example:

        fetch("/api/orders", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                name: name,
                phone: phone,
                address: address
            })
        });

    */


    // Demo success

    orderForm.style.display = "none";

    successMessage.classList.add("show");


    // Scroll to success message

    successMessage.scrollIntoView({
        behavior: "smooth",
        block: "center"
    });

});


// ================= NEW ORDER =================

const newOrder =
    document.getElementById("newOrder");

newOrder.addEventListener("click", () => {

    successMessage.classList.remove("show");

    orderForm.reset();

    orderForm.style.display = "block";

});


// ================= PHONE INPUT =================

const phoneInput =
    document.getElementById("phone");

phoneInput.addEventListener("input", function() {

    this.value = this.value
        .replace(/\D/g, "")
        .slice(0, 11);

});