$(document).ready(function () {

    // Bottom navigation active state
    const navItems = document.querySelectorAll(".nav-item");
    const sections = document.querySelectorAll("section");

    window.addEventListener("scroll", () => {
        let current = "";
        sections.forEach((section) => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            if (pageYOffset >= sectionTop - 200) {
                current = section.getAttribute("id");
            }
        });

        navItems.forEach((item) => {
            item.classList.remove("active");
            if (item.getAttribute("href") === `#${current}`) {
                item.classList.add("active");
            }
        });
    });

    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute("href"));
            if (target) {
                target.scrollIntoView({
                    behavior: "smooth",
                    block: "start",
                });
            }
        });
    });




    // jQuery Validation setup
    $("#contactForm").validate({
        rules: {
            name: "required",
            email: {
                required: true,
                email: true,
            },
            phone: "required",
        },
        messages: {
            name: "Please enter your name",
            email: "Please enter a valid email address",
            phone: "Please enter your phone number",
        },
        submitHandler: function (form) {
            $.ajax({
                url: "submit_form.php",
                type: "POST",
                data: $(form).serialize(),
                success: function (response) {
                    $("#formMsg").text(response).removeClass("text-red-500").addClass("text-green-400");
                    form.reset();
                },
                error: function () {
                    $("#formMsg").text("Something went wrong. Please try again.").removeClass("text-green-400").addClass("text-red-500");
                },
            });
            return false; // Prevent normal form submission
        },
    });

});