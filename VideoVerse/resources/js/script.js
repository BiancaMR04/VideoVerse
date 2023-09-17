fetch("/cadastro_erro", {
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
        // Exiba as mensagens de erro apropriadas com base no tipo de erro
        if (data.error === 'CamposVazios') {
            document.getElementById('campos_vazios').style.display = 'block';
            document.getElementById('email_usado').style.display = 'none';
        } else if (data.error === 'EmailUsado') {
            document.getElementById('email_usado').style.display = 'block';
            document.getElementById('campos_vazios').style.display = 'none';
        } else {
            // Outros tipos de erro podem ser tratados aqui
            document.getElementById('campos_vazios').style.display = 'none';
            document.getElementById('email_usado').style.display = 'none';
        }
    } else {
        // Se não houver erro, redirecione ou faça outra ação desejada
        window.location.href = "/pagina-de-sucesso";
    }
})
.catch(error => {
    console.error(error);
});
