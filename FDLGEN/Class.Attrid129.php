<?php


namespace Dcp\AttributeIdentifiers {

      /**
        * groupe
        */
     class Group  extends Dir  {
        
        /** frame Profils par défaut */
		const fld_fr_prof='fld_fr_prof';
        
        /** frame Restrictions */
		const fld_fr_rest='fld_fr_rest';
        
        /** frame basique */
		const fr_basic='fr_basic';
        
        /** menu Gérer les membres */
		const grp_adduser='grp_adduser';
        
        /** text titre */
		const ba_title='ba_title';
        
        /** menu Rafraîchir */
		const grp_refresh='grp_refresh';
        
        /** frame Identification */
		const grp_fr_ident='grp_fr_ident';
        
        /** text nom */
		const grp_name='grp_name';
        
        /** text mail */
		const grp_mail='grp_mail';
        
        /** enum sans adresse mail de groupe */
		const grp_hasmail='grp_hasmail';
        
        /** longtext attribution */
		const grp_role='grp_role';
        
        /** enum fonction */
		const grp_type='grp_type';
        
        /** frame Groupes */
		const grp_fr='grp_fr';
        
        /** account sous groupes */
		const grp_idgroup='grp_idgroup';
        
        /** account groupes parents */
		const grp_idpgroup='grp_idpgroup';
        
        /** enum est rafraîchi */
		const grp_isrefreshed='grp_isrefreshed';
        
     }
}
