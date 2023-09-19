document.addEventListener("DOMContentLoaded", function () {
    const entrarBtn = document.getElementById("entrarBtn");
    const cadastreBtn = document.getElementById("cadastreBtn");

    entrarBtn.addEventListener("click", function () {
        window.location.href = "/login";
    });

    cadastreBtn.addEventListener("click", function () {
        window.location.href = "/cadastro";
    });
});