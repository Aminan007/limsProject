<?php


namespace Dcp\AttributeIdentifiers {

      /**
        * Publipostage
        */
     class Publimail  extends Batch  {
        
        /** frame Basique */
		const fr_basic='fr_basic';
        
        /** text Titre */
		const ba_title='ba_title';
        
        /** frame Identification */
		const pubm_fr_ident='pubm_fr_ident';
        
        /** text Sujet */
		const pubm_title='pubm_title';
        
        /** frame Corps */
		const pubm_fr_body='pubm_fr_body';
        
        /** htmltext Corps du message */
		const pubm_body='pubm_body';
        
        /** image Image de fond */
		const pubm_bgimg='pubm_bgimg';
        
        /** frame Attachements */
		const pubm_fr_att='pubm_fr_att';
        
        /** array Attachements */
		const pubm_t_att='pubm_t_att';
        
        /** text Description */
		const pubm_adesc='pubm_adesc';
        
        /** file Fichier */
		const pubm_fdesc='pubm_fdesc';
        
        /** action Envoyer */
		const pubm_send='pubm_send';
        
        /** action Afficher */
		const pubm_display='pubm_display';
        
        /** action Prévisualisation */
		const pubm_preview='pubm_preview';
        
        /** action Imprimer */
		const pubm_print='pubm_print';
        
        /** frame Configuration */
		const pubm_fr_config='pubm_fr_config';
        
        /** docid Id famille */
		const pubm_idfam='pubm_idfam';
        
        /** text Famille du lot */
		const pubm_fam='pubm_fam';
        
        /** text Attribut mail */
		const pubm_mailatt='pubm_mailatt';
        
     }
}
