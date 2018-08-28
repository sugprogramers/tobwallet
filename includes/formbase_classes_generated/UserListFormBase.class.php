<?php
	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the User class.  It uses the code-generated
	 * UserDataGrid control which has meta-methods to help with
	 * easily creating/defining User columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both user_list.php AND
	 * user_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage FormBaseObjects
	 */
	abstract class UserListFormBase extends QForm {
		// Local instance of the Meta DataGrid to list Users
		/**
		 * @var UserDataGrid dtgUsers
		 */
		protected $dtgUsers;

		// Create QForm Event Handlers as Needed

//		protected function Form_Exit() {}
//		protected function Form_Load() {}
//		protected function Form_PreRender() {}
//		protected function Form_Validate() {}

		protected function Form_Run() {
			parent::Form_Run();
		}

		protected function Form_Create() {
			parent::Form_Create();

			// Instantiate the Meta DataGrid
			$this->dtgUsers = new UserDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgUsers->CssClass = 'datagrid';
			$this->dtgUsers->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgUsers->Paginator = new QPaginator($this->dtgUsers);
			$this->dtgUsers->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/user_edit.php';
			$this->dtgUsers->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for user's properties, or you
			// can traverse down QQN::user() to display fields that are down the hierarchy)
			$this->dtgUsers->MetaAddColumn('IdUser');
			$this->dtgUsers->MetaAddColumn('Email');
			$this->dtgUsers->MetaAddColumn('Password');
			$this->dtgUsers->MetaAddColumn('FirstName');
			$this->dtgUsers->MetaAddColumn('MiddleName');
			$this->dtgUsers->MetaAddColumn('LastName');
			$this->dtgUsers->MetaAddColumn('Country');
			$this->dtgUsers->MetaAddColumn('City');
			$this->dtgUsers->MetaAddColumn('Phone');
			$this->dtgUsers->MetaAddColumn('Birthday');
			$this->dtgUsers->MetaAddColumn('ImagePhoto');
			$this->dtgUsers->MetaAddColumn('StatusUser');
			$this->dtgUsers->MetaAddColumn('WalletAddress');
			$this->dtgUsers->MetaAddColumn('UserType');
		}
	}
?>
