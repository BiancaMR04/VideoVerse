
beforeEach(() => {

  cy.visit('http://127.0.0.1:8000')

})

describe('login', () => {
  it('login normal', () => {
    cy.viewport(1920, 1080)
    cy.get('[href="/login"]').click()
    cy.get('#email').type('kaua@gmail.com')
    cy.get('#password').type('12345678')
    cy.get('.button').click()
  })
  it('login errado', () => {
    cy.viewport(1920, 1080)
    cy.get('[href="/login"]').click()
    cy.get('#email').type('kaua@gmail')
    cy.get('#password').type('12345678')
    cy.get('.button').click()
    cy.contains('Essas credenciais não correspondem aos nossos registros.').should('be.visible')
  })
  it('login sem senha', () => {
    cy.viewport(1920, 1080)
    cy.get('[href="/login"]').click()
    cy.get('#email').type('kaua@gmail')
    cy.get('.button').click()
    cy.contains('The password field is required.').should('be.visible')
  })
  it('login sem email', () => {
    cy.viewport(1920, 1080)
    cy.get('[href="/login"]').click()
    cy.get('#password').type('12345678')
    cy.get('.button').click()
    cy.contains('The email field is required.').should('be.visible')
  })
  it('login sem email e senha', () => {
    cy.viewport(1920, 1080)
    cy.get('[href="/login"]').click()
    cy.get('.button').click()
    cy.contains('Preencha esse campo.').should('be.visible')
    cy.contains('The password field is required.').should('be.visible')
  })
  
  })