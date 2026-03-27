import setting from '../fixtures/setting.json';

describe("Installation", () => {

    it("Should Install Correctly", () => {
                
        cy.visit(`${setting.baseUrl}/install`);
        cy.get('[name="database_name"]').type('youtubecoins');
        cy.get('[name="database_user"]').type('root');
        cy.get('[name="database_password"]').type('root');
        cy.get('[name="admin_username"]').type('admin');
        cy.get('[name="admin_email"]').type('admin@admin.com');
        cy.get('[name="admin_password"]').type('123456');
        cy.get('[data-cy="Install"]').click();
    });

});
