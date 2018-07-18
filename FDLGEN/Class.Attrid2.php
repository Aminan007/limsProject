<?php


namespace Dcp\AttributeIdentifiers {

      /**
        * dossier
        */
     class Dir  extends Base  {
        
        /** frame Restrictions */
		const fld_fr_rest='fld_fr_rest';
        
        /** frame Profils par défaut */
		const fld_fr_prof='fld_fr_prof';
        
        /** longtext Description */
		const ba_desc='ba_desc';
        
        /** menu Ouvrir */
		const fld_open='fld_open';
        
        /** color Couleur intercalaire */
		const gui_color='gui_color';
        
        /** menu Insérer le porte-document */
		const fld_copybasket='fld_copybasket';
        
        /** enum Utilisable comme flux RSS */
		const gui_isrss='gui_isrss';
        
        /** enum Flux RSS système */
		const gui_sysrss='gui_sysrss';
        
        /** menu Ouvrir comme une chemise */
		const fld_openfolio='fld_openfolio';
        
        /** menu Insérer des documents */
		const fld_insertdoc='fld_insertdoc';
        
        /** menu RSS visible/masquée aux utilisateurs */
		const fld_setsysrss='fld_setsysrss';
        
        /** enum Tout ou rien */
		const fld_allbut='fld_allbut';
        
        /** array Familles filtrées */
		const fld_tfam='fld_tfam';
        
        /** text Familles (titre) */
		const fld_fam='fld_fam';
        
        /** docid('-1') Familles */
		const fld_famids='fld_famids';
        
        /** enum Restriction sous famille */
		const fld_subfam='fld_subfam';
        
        /** text Profil par défaut de document (titre) */
		const fld_pdoc='fld_pdoc';
        
        /** docid('PDOC') Profil par défaut de document */
		const fld_pdocid='fld_pdocid';
        
        /** text Profil par défaut de dossier (titre) */
		const fld_pdir='fld_pdir';
        
        /** docid('PDIR') Profil par défaut de dossier */
		const fld_pdirid='fld_pdirid';
        
     }
}
