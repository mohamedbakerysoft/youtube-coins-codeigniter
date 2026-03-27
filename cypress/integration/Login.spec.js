import setting from '../fixtures/setting.json';

it('should login correctly', () => {
    cy.visit(`${setting.baseUrl}/users/login`)
        .get('#email')
        .type('admin@admin.com')
        .get('#password')
        .type("123456")
        .get('#login')
        .click();
})