document.getElementById("deleteLink").addEventListener("click", function (e) {
    e.preventDefault(); // Impede o comportamento padrão do link
    if (confirm("Tem certeza de que deseja excluir?")) {
        document.getElementById("deleteForm").submit(); // Submeta o formulário de exclusão
    }
});