document.addEventListener("DOMContentLoaded", function () {
    const helpButton = document.getElementById("helpButton");

    window.addEventListener("scroll", function () {
        const scrollPercentage = (window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100;

         if (scrollPercentage >= 2) {
            helpButton.style.display = "block";
        } else {
            helpButton.style.display = "none";
        }
    });

    helpButton.addEventListener("click", function () {
         window.location.href = "/";
    });
});