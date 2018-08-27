<?php
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
	 * @subpackage FormBaseObjects
	 */
	abstract class ClientListFormBase extends QForm {
		// Local instance of the Meta DataGrid to list Clients
		/**
		 * @var ClientDataGrid dtgClients
		 */
		protected $dtgClients;

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
			$this->dtgClients = new ClientDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgClients->CssClass = 'datagrid';
			$this->dtgClients->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgClients->Paginator = new QPaginator($this->dtgClients);
			$this->dtgClients->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/client_edit.php';
			$this->dtgClients->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for client's properties, or you
			// can traverse down QQN::client() to display fields that are down the hierarchy)
			$this->dtgClients->MetaAddColumn('IdClient');
			$this->dtgClients->MetaAddColumn(QQN::Client()->IdUserObject);
		}
	}
?>
