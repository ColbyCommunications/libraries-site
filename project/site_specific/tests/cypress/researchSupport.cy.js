describe('Research Support Accordions', () => {
    it('Should open accordion', () => {
        cy.visit('/research-support/');
        cy.get('.colby-accordion-block article.accordion__panel:first-child').click({
            force: true,
        });
        cy.get(
            '.colby-accordion-block article.accordion__panel:first-child > .accordion__window'
        ).should('have.css', 'visibility: visible');
    });
});
