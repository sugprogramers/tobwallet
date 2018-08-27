<?php
	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Queueemail class.  It uses the code-generated
	 * QueueemailDataGrid control which has meta-methods to help with
	 * easily creating/defining Queueemail columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both queueemail_list.php AND
	 * queueemail_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage FormBaseObjects
	 */
	abstract class QueueemailListFormBase extends QForm {
		// Local instance of the Meta DataGrid to list Queueemails
		/**
		 * @var QueueemailDataGrid dtgQueueemails
		 */
		protected $dtgQueueemails;

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
			$this->dtgQueueemails = new QueueemailDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgQueueemails->CssClass = 'datagrid';
			$this->dtgQueueemails->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgQueueemails->Paginator = new QPaginator($this->dtgQueueemails);
			$this->dtgQueueemails->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/queueemail_edit.php';
			$this->dtgQueueemails->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for queueemail's properties, or you
			// can traverse down QQN::queueemail() to display fields that are down the hierarchy)
			$this->dtgQueueemails->MetaAddColumn('IdQueueEmail');
			$this->dtgQueueemails->MetaAddColumn('To');
			$this->dtgQueueemails->MetaAddColumn('Subject');
			$this->dtgQueueemails->MetaAddColumn('Body');
			$this->dtgQueueemails->MetaAddColumn('Status');
			$this->dtgQueueemails->MetaAddColumn('Log');
			$this->dtgQueueemails->MetaAddColumn('IdUser');
			$this->dtgQueueemails->MetaAddColumn('CreateDateTime');
		}
	}
?>
