<?php
	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Organization class.  It uses the code-generated
	 * OrganizationDataGrid control which has meta-methods to help with
	 * easily creating/defining Organization columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both organization_list.php AND
	 * organization_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage FormBaseObjects
	 */
	abstract class OrganizationListFormBase extends QForm {
		// Local instance of the Meta DataGrid to list Organizations
		/**
		 * @var OrganizationDataGrid dtgOrganizations
		 */
		protected $dtgOrganizations;

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
			$this->dtgOrganizations = new OrganizationDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgOrganizations->CssClass = 'datagrid';
			$this->dtgOrganizations->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgOrganizations->Paginator = new QPaginator($this->dtgOrganizations);
			$this->dtgOrganizations->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/organization_edit.php';
			$this->dtgOrganizations->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for organization's properties, or you
			// can traverse down QQN::organization() to display fields that are down the hierarchy)
			$this->dtgOrganizations->MetaAddColumn('IdOrganization');
			$this->dtgOrganizations->MetaAddColumn('Name');
			$this->dtgOrganizations->MetaAddColumn('Phone');
			$this->dtgOrganizations->MetaAddColumn('QrCode');
			$this->dtgOrganizations->MetaAddColumn('OrganizationImage');
			$this->dtgOrganizations->MetaAddColumn('Latitude');
			$this->dtgOrganizations->MetaAddColumn('Longitude');
			$this->dtgOrganizations->MetaAddColumn('Country');
			$this->dtgOrganizations->MetaAddColumn('City');
			$this->dtgOrganizations->MetaAddColumn('Address');
			$this->dtgOrganizations->MetaAddColumn(QQN::Organization()->IdOrganizationTypeObject);
			$this->dtgOrganizations->MetaAddColumn(QQN::Organization()->IdOwnerObject);
		}
	}
?>
