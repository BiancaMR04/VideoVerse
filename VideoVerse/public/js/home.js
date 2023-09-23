document.addEventListener("DOMContentLoaded", function () {
    const entrarBtn = document.getElementById("btn_entrar");
    const cadastreBtn = document.getElementById("btn_cadastrar");

    entrarBtn.addEventListener("click", function () {
        window.location.href = "/login";
    });

    cadastreBtn.addEventListener("click", function () {
        window.location.href = "/cadastro";
    });
});