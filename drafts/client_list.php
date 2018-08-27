<?php
	// Load the QCubed Development Framework
	require('../qcubed.inc.php');

	require(__FORMBASE_CLASSES__ . '/ClientListFormBase.class.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Client class.  It uses the code-generated
	 * ClientDataGrid control which has meta-methods to help with
	 * easily creating/defining Client columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both client_list.php AND
	 * client_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage Drafts
	 */
	class ClientListForm extends ClientListFormBase {
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

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// client_list.tpl.php as the included HTML template file
	ClientListForm::Run('ClientListForm');
?>