describe('Research Support Accordions', () => {
    it('Should open accordion', () => {
        cy.visit('/research-support/');
        cy.get('.colby-accordion-block article:first-of-type').click({
            force: true,
        });
        cy.get(
            '.colby-accordion-block article:first-of-type > .accordion__window'
        ).should('have.css', 'visibility: visible');
    });
});
