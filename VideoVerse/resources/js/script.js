fetch("/cadastro", {
    method: "POST",
    headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
    },
    body: JSON.stringify({ email: email })
})
.then(response => response.json())
.then(data => {
    if (data.error) {
        // Exiba um pop-up com a mensagem de erro
        mostrarAlerta(data.error);
    } else {
        // Se não houver erro, redirecione ou faça outra ação desejada
        window.location.href = "/pagina-de-sucesso";
    }
})
.catch(error => {
    console.error(error);
});
