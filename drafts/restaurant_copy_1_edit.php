<?php
	// Load the QCubed Development Framework
	require('../qcubed.inc.php');

	require(__FORMBASE_CLASSES__ . '/RestaurantCopy1EditFormBase.class.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
	 * of the RestaurantCopy1 class.  It uses the code-generated
	 * RestaurantCopy1MetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a RestaurantCopy1 columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both restaurant_copy_1_edit.php AND
	 * restaurant_copy_1_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage Drafts
	 */
	class RestaurantCopy1EditForm extends RestaurantCopy1EditFormBase {
		// Override Form Event Handlers as Needed
		protected function Form_Run() {
			parent::Form_Run();

			// Security check for ALLOW_REMOTE_ADMIN
			// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
			QApplication::CheckRemoteAdmin();
		}

//		protected function Form_Load() {}

//		protected function Form_Create() {}
	}

	// Go ahead and run this form object to render the page and its event handlers, implicitly using
	// restaurant_copy_1_edit.tpl.php as the included HTML template file
	RestaurantCopy1EditForm::Run('RestaurantCopy1EditForm');
?>