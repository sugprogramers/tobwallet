<?php
	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Owner class.  It uses the code-generated
	 * OwnerDataGrid control which has meta-methods to help with
	 * easily creating/defining Owner columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both owner_list.php AND
	 * owner_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage FormBaseObjects
	 */
	abstract class OwnerListFormBase extends QForm {
		// Local instance of the Meta DataGrid to list Owners
		/**
		 * @var OwnerDataGrid dtgOwners
		 */
		protected $dtgOwners;

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
			$this->dtgOwners = new OwnerDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgOwners->CssClass = 'datagrid';
			$this->dtgOwners->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgOwners->Paginator = new QPaginator($this->dtgOwners);
			$this->dtgOwners->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/owner_edit.php';
			$this->dtgOwners->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for owner's properties, or you
			// can traverse down QQN::owner() to display fields that are down the hierarchy)
			$this->dtgOwners->MetaAddColumn('IdOwner');
			$this->dtgOwners->MetaAddColumn(QQN::Owner()->IdUserObject);
		}
	}
?>
