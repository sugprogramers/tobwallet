<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the Message class.  It uses the code-generated
	 * MessageMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a Message columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 *
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both message_edit.php AND
	 * message_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage Drafts
	 */
	class MessageEditPanel extends QPanel {
		// Local instance of the MessageMetaControl
		/**
		 * @var MessageMetaControl
		 */
		protected $mctMessage;

		// Controls for Message's Data Fields
		public $lblIdMessage;
		public $lstIdUserObject;
		public $txtType;
		public $txtBody;
		public $calCreatedDate;
		public $chkIsRead;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References

		// Other Controls
		/**
		 * @var QButton Save
		 */
		public $btnSave;
		/**
		 * @var QButton Delete
		 */
		public $btnDelete;
		/**
		 * @var QButton Cancel
		 */
		public $btnCancel;

		// Callback
		protected $strClosePanelMethod;

		public function __construct($objParentObject, $strClosePanelMethod, $intIdMessage = null, $strControlId = null) {
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Setup Callback and Template
			$this->strTemplate = __DOCROOT__ . __PANEL_DRAFTS__ . '/MessageEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the MessageMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctMessage = MessageMetaControl::Create($this, $intIdMessage);

			// Call MetaControl's methods to create qcontrols based on Message's data fields
			$this->lblIdMessage = $this->mctMessage->lblIdMessage_Create();
			$this->lstIdUserObject = $this->mctMessage->lstIdUserObject_Create();
			$this->txtType = $this->mctMessage->txtType_Create();
			$this->txtBody = $this->mctMessage->txtBody_Create();
			$this->calCreatedDate = $this->mctMessage->calCreatedDate_Create();
			$this->chkIsRead = $this->mctMessage->chkIsRead_Create();

			// Create Buttons and Actions on this Form
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = QApplication::Translate('Save');
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
			$this->btnSave->CausesValidation = $this;

			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = QApplication::Translate('Cancel');
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));

			$this->btnDelete = new QButton($this);
			$this->btnDelete->Text = QApplication::Translate('Delete');
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'),  QApplication::Translate('Message'))));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctMessage->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the MessageMetaControl
			$this->mctMessage->SaveMessage();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the MessageMetaControl
			$this->mctMessage->DeleteMessage();
			$this->CloseSelf(true);
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->CloseSelf(false);
		}

		// Close Myself and Call ClosePanelMethod Callback
		protected function CloseSelf($blnChangesMade) {
			$strMethod = $this->strClosePanelMethod;
			$this->objForm->$strMethod($blnChangesMade);
		}

		
	}
?>