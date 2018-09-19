<?php
	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Message class.  It uses the code-generated
	 * MessageDataGrid control which has meta-methods to help with
	 * easily creating/defining Message columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both message_list.php AND
	 * message_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage FormBaseObjects
	 */
	abstract class MessageListFormBase extends QForm {
		// Local instance of the Meta DataGrid to list Messages
		/**
		 * @var MessageDataGrid dtgMessages
		 */
		protected $dtgMessages;

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
			$this->dtgMessages = new MessageDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgMessages->CssClass = 'datagrid';
			$this->dtgMessages->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgMessages->Paginator = new QPaginator($this->dtgMessages);
			$this->dtgMessages->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/message_edit.php';
			$this->dtgMessages->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for message's properties, or you
			// can traverse down QQN::message() to display fields that are down the hierarchy)
			$this->dtgMessages->MetaAddColumn('IdMessage');
			$this->dtgMessages->MetaAddColumn(QQN::Message()->IdUserObject);
			$this->dtgMessages->MetaAddColumn('Type');
			$this->dtgMessages->MetaAddColumn('Body');
			$this->dtgMessages->MetaAddColumn('CreatedDate');
			$this->dtgMessages->MetaAddColumn('IsRead');
		}
	}
?>
