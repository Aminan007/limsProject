<?php


namespace Dcp\AttributeIdentifiers {

      /**
        * Livre
        */
     class Book  extends Dir  {
        
        /** menu Insérer un nouveau chapitre */
		const book_addchapter='book_addchapter';
        
        /** menu Ouvrir */
		const book_open='book_open';
        
        /** menu Visualisation */
		const book_gen_html='book_gen_html';
        
        /** menu Génération PDF */
		const book_gen_pdf='book_gen_pdf';
        
        /** frame Contenu */
		const book_fr_info='book_fr_info';
        
        /** longtext Résumé */
		const book_abstract='book_abstract';
        
        /** file PDF */
		const book_pdf='book_pdf';
        
        /** frame Mise en pages */
		const book_fr_pages='book_fr_pages';
        
        /** timestamp Date de production */
		const book_datepdf='book_datepdf';
        
        /** enum Table des matières */
		const book_toc='book_toc';
        
        /** text Entête gauche */
		const book_headleft='book_headleft';
        
        /** text Entête centre */
		const book_headmiddle='book_headmiddle';
        
        /** text Entête droite */
		const book_headright='book_headright';
        
        /** text Pied de page gauche */
		const book_footleft='book_footleft';
        
        /** text Pied de page centre */
		const book_footmiddle='book_footmiddle';
        
        /** text Pied de page droite */
		const book_footright='book_footright';
        
        /** file Style OpenDocument */
		const book_tplodt='book_tplodt';
        
     }
}
