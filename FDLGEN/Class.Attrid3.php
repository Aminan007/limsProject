<?php


namespace Dcp\AttributeIdentifiers {

      /**
        * Profil de document
        */
     class Pdoc  extends Base  {
        
        /** longtext Description */
		const prf_desc='prf_desc';
        
        /** frame Dynamique */
		const dpdoc_fr_dyn='dpdoc_fr_dyn';
        
        /** docid Famille (id) */
		const dpdoc_famid='dpdoc_famid';
        
        /** text Famille */
		const dpdoc_fam='dpdoc_fam';
        
        /** action Accessibilités */
		const prf_access='prf_access';
        
        /** action Activer */
		const prf_activate='prf_activate';
        
        /** action Désactiver */
		const prf_desactivate='prf_desactivate';
        
        /** menu Forcer la propagation du profil */
		const prf_forcecomputing='prf_forcecomputing';
        
     }
}
