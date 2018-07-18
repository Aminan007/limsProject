<?php


namespace Dcp\AttributeIdentifiers {

      /**
        * chemise
        */
     class Portfolio  extends Dir  {
        
        /** menu ouvrir */
		const pfl_open='pfl_open';
        
        /** menu ouvrir */
		const fld_open='fld_open';
        
        /** menu ouvrir comme une chemise */
		const fld_openfolio='fld_openfolio';
        
        /** frame Affichage de la chemise */
		const pfl_fr_init='pfl_fr_init';
        
        /** enum style de la liste */
		const pfl_liststyle='pfl_liststyle';
        
        /** enum affichage dernier onglet consulté */
		const pfl_savetab='pfl_savetab';
        
        /** enum affichage dernière disposition */
		const pfl_savedispo='pfl_savedispo';
        
        /** array Onglets à lier (dynamique) */
		const pfl_t_linktab='pfl_t_linktab';
        
        /** docid("DIR") id onglet à lier */
		const pfl_idlinktab='pfl_idlinktab';
        
        /** text onglet à lier */
		const pfl_linktab='pfl_linktab';
        
        /** array Onglets à copier pour les nouveaux documents */
		const pfl_t_copytab='pfl_t_copytab';
        
        /** docid("DIR") id onglet à copier */
		const pfl_idcopytab='pfl_idcopytab';
        
        /** text onglet à copier */
		const pfl_copytab='pfl_copytab';
        
        /** docid id chemise defaut */
		const pfl_iddef='pfl_iddef';
        
        /** text chemise defaut */
		const pfl_def='pfl_def';
        
     }
}
