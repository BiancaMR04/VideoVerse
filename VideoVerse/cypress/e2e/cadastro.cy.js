beforeEach(() => {
    cy.visit('http://127.0.0.1:8000')
})

function cadastro(nome, email, senha, confirmSenha, dataNascimento) {
    cy.get('[href="/register"]').click()
    cy.get('#name').type(nome)
    cy.get('#email').type(email)
    cy.get('#password').type(senha)
    cy.get('#password-confirm').type(confirmSenha)
    cy.get('#date_of_birth').type(dataNascimento)
    cy.get('.button').click()
}

describe('cadastro', () => {
    it('cadastro normal', () => {
        cy.viewport(1920, 1080)
        const randomName = `user${Math.floor(Math.random() * 100000)}`
        const randomEmail = `${randomName}@example.com`
        cadastro(randomName, randomEmail, '12345678', '12345678', '1999-01-01')
    })

    it('cadastro errado', () => {
        cadastro('nome_incorreto', 'email_incorreto', 'senha_incorreta', 'senha_incorreta', 'data_incorreta')
        // Adicione verificações ou ações para validar o cadastro com dados incorretos
    })

    it('cadastro sem senha', () => {
        cadastro('userSemSenha', 'emailSemSenha@example.com', '', '', '1990-01-01')
        // Adicione verificações ou ações para validar o cadastro sem senha
    })

    it('cadastro sem email', () => {
        cadastro('userSemEmail', '', 'senhaSemEmail', 'senhaSemEmail', '1985-01-01')
        // Adicione verificações ou ações para validar o cadastro sem e-mail
    })

    it('cadastro sem email e senha', () => {
        cadastro('userSemEmailSenha', '', '', '', '1980-01-01')
        // Adicione verificações ou ações para validar o cadastro sem e-mail e senha
    })
})
