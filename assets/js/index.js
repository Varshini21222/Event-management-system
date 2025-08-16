document.addEventListener("DOMContentLoaded", function () {
    let slides = document.querySelectorAll(".slide");
    let index = 0;

    function showSlide() {
        slides.forEach((slide, i) => {
            slide.style.opacity = i === index ? "1" : "0";
            slide.style.transition = "opacity 1s ease-in-out";
        });
        index = (index + 1) % slides.length;
    }

    setInterval(showSlide, 3000); // Change slide every 5 seconds
    showSlide(); // Show the first slide immediately
});
