<?php
	require(__META_CONTROLS_GEN__ . '/OfferMetaControlGen.class.php');

	/**
	 * This is a MetaControl customizable subclass, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality of the
	 * Offer class.  This code-generated class extends from
	 * the generated MetaControl class, which contains all the basic elements to help a QPanel or QForm
	 * display an HTML form that can manipulate a single Offer object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a OfferMetaControl
	 * class.
	 *
	 * This file is intended to be modified.  Subsequent code regenerations will NOT modify
	 * or overwrite this file.
	 *
	 * @package My QCubed Application
	 * @subpackage MetaControls
	 */
	class OfferMetaControl extends OfferMetaControlGen {
            public $objOffer;
            public $blnEditMode;
            
		// Initialize fields with default values from database definition
/*
		public function __construct($objParentObject, Offer $objOffer) {
			parent::__construct($objParentObject,$objOffer);
			if ( !$this->blnEditMode ){
				$this->objOffer->Initialize();
			}
		}
*/

	}
?>