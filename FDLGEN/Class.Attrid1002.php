<?php


namespace Dcp\AttributeIdentifiers {

      /**
        * Archive
        */
     class Archiving  extends Dir  {
        
        /** menu Voir les documents */
		const arc_list='arc_list';
        
        /** menu Archiver les documents */
		const arc_close='arc_close';
        
        /** menu Voir les documents archivés */
		const arc_listc='arc_listc';
        
        /** menu Gérer les droits des documents archivés */
		const arc_modprof='arc_modprof';
        
        /** menu Désarchiver les documents archivés */
		const arc_reopen='arc_reopen';
        
        /** menu Détruire les documents archivé */
		const arc_purge='arc_purge';
        
        /** menu Vider l'archive de son contenu */
		const arc_clear='arc_clear';
        
        /** enum Statut */
		const arc_status='arc_status';
        
        /** date Date de clôture */
		const arc_clotdate='arc_clotdate';
        
        /** tab Purge */
		const arc_tab_purge='arc_tab_purge';
        
        /** docid("PDIR") Profil applicable */
		const arc_profil='arc_profil';
        
        /** frame Purge */
		const arc_fr_purge='arc_fr_purge';
        
        /** date Date de destruction */
		const arc_purgedate='arc_purgedate';
        
        /** htmltext Documents détruits */
		const arc_purgemanif='arc_purgemanif';
        
     }
}
