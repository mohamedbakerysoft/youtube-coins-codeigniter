import setting from '../fixtures/setting.json';

it('should render home page correctly', () => {
  cy.visit(setting.baseUrl)
    .contains('Rocket your Videos all over the World!')
})
