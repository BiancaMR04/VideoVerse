describe('template spec', () => {
  it('passes', () => {
    cy.viewport(1920, 1080)
    cy.visit('http://127.0.0.1:8000')
    cy.get('#btn_entrar').click()
    cy.get('#email').type('kaua@gmail.com')
    cy.get('#password').type('12345678')
    cy.get('.button').click()
    cy.get('#navbarDropdown').click()
    cy.get('[href="http://127.0.0.1:8000/upload_video"]').click()
    .wait(6000)   
    cy.get('#titulo_video').type('teste')
    cy.get('#descricao').type('teste')
    cy.get('.enviar-button').click()
    
  })
})