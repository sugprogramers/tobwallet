<?php
	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Administrator class.  It uses the code-generated
	 * AdministratorDataGrid control which has meta-methods to help with
	 * easily creating/defining Administrator columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both administrator_list.php AND
	 * administrator_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage FormBaseObjects
	 */
	abstract class AdministratorListFormBase extends QForm {
		// Local instance of the Meta DataGrid to list Administrators
		/**
		 * @var AdministratorDataGrid dtgAdministrators
		 */
		protected $dtgAdministrators;

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
			$this->dtgAdministrators = new AdministratorDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgAdministrators->CssClass = 'datagrid';
			$this->dtgAdministrators->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgAdministrators->Paginator = new QPaginator($this->dtgAdministrators);
			$this->dtgAdministrators->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/administrator_edit.php';
			$this->dtgAdministrators->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for administrator's properties, or you
			// can traverse down QQN::administrator() to display fields that are down the hierarchy)
			$this->dtgAdministrators->MetaAddColumn('IdAdministrator');
			$this->dtgAdministrators->MetaAddColumn('Email');
			$this->dtgAdministrators->MetaAddColumn('Password');
			$this->dtgAdministrators->MetaAddColumn('FirstName');
			$this->dtgAdministrators->MetaAddColumn('LastName');
			$this->dtgAdministrators->MetaAddColumn('Address');
			$this->dtgAdministrators->MetaAddColumn('Phone');
		}
	}
?>
