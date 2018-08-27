<?php
	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Organizationtype class.  It uses the code-generated
	 * OrganizationtypeDataGrid control which has meta-methods to help with
	 * easily creating/defining Organizationtype columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both organizationtype_list.php AND
	 * organizationtype_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage FormBaseObjects
	 */
	abstract class OrganizationtypeListFormBase extends QForm {
		// Local instance of the Meta DataGrid to list Organizationtypes
		/**
		 * @var OrganizationtypeDataGrid dtgOrganizationtypes
		 */
		protected $dtgOrganizationtypes;

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
			$this->dtgOrganizationtypes = new OrganizationtypeDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgOrganizationtypes->CssClass = 'datagrid';
			$this->dtgOrganizationtypes->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgOrganizationtypes->Paginator = new QPaginator($this->dtgOrganizationtypes);
			$this->dtgOrganizationtypes->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/organizationtype_edit.php';
			$this->dtgOrganizationtypes->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for organizationtype's properties, or you
			// can traverse down QQN::organizationtype() to display fields that are down the hierarchy)
			$this->dtgOrganizationtypes->MetaAddColumn('IdOrganizationType');
			$this->dtgOrganizationtypes->MetaAddColumn('Name');
			$this->dtgOrganizationtypes->MetaAddColumn('Description');
		}
	}
?>
