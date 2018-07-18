<?php


namespace Dcp\AttributeIdentifiers {

      /**
        * Action basique
        */
     class Basicbatch  extends Batch  {
        
        /** action Verrouiller */
		const bbatch_lock='bbatch_lock';
        
        /** action Déverrouiller */
		const bbatch_unlock='bbatch_unlock';
        
        /** action Supprimer */
		const bbatch_delete='bbatch_delete';
        
        /** action Dupliquer */
		const bbatch_copy='bbatch_copy';
        
     }
}
