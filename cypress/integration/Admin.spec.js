import setting from '../fixtures/setting.json';

describe("Manage Videos", () => {
    it("Should render manage videos correctly", () => {
        cy.visit(`${setting.baseUrl}/users/login`)
            .get('#email')
            .type('admin@admin.com')
            .get('#password')
            .type("123456")
            .get('#login')
            .click();

        cy.visit(`${setting.baseUrl}/admin/articles`);
        cy.contains('Manage videos');
    });

    it("Should render manage Custom Style Correctly", () => {
        cy.visit(`${setting.baseUrl}/users/login`)
            .get('#email')
            .type('admin@admin.com')
            .get('#password')
            .type("123456")
            .get('#login')
            .click();

        cy.visit(`${setting.baseUrl}/admin/custom_style`);
        cy.contains('Custom Style (Edit the website css file)');
        cy.url().should('include', '/admin/custom_style');
        cy.contains('Save').eq(0).click();
        cy.contains('data has been updated successfully');
    });

    it("Should render manage setting correctly", () => {
        cy.visit(`${setting.baseUrl}/users/login`)
            .get('#email')
            .type('admin@admin.com')
            .get('#password')
            .type("123456")
            .get('#login')
            .click();

        cy.visit(`${setting.baseUrl}/admin/setting`);
        cy.contains('Website setting');
        cy.url().should('include', '/admin/setting');
        cy.contains('Save').eq(0).click();
        cy.contains('data has been updated successfully');
    });

});
