<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the Queueemail class.  It uses the code-generated
	 * QueueemailMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a Queueemail columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 *
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both queueemail_edit.php AND
	 * queueemail_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage Drafts
	 */
	class QueueemailEditPanel extends QPanel {
		// Local instance of the QueueemailMetaControl
		/**
		 * @var QueueemailMetaControl
		 */
		protected $mctQueueemail;

		// Controls for Queueemail's Data Fields
		public $lblIdQueueEmail;
		public $txtTo;
		public $txtSubject;
		public $txtBody;
		public $txtStatus;
		public $txtLog;
		public $txtIdUser;
		public $calCreateDateTime;

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

		public function __construct($objParentObject, $strClosePanelMethod, $intIdQueueEmail = null, $strControlId = null) {
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Setup Callback and Template
			$this->strTemplate = __DOCROOT__ . __PANEL_DRAFTS__ . '/QueueemailEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the QueueemailMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctQueueemail = QueueemailMetaControl::Create($this, $intIdQueueEmail);

			// Call MetaControl's methods to create qcontrols based on Queueemail's data fields
			$this->lblIdQueueEmail = $this->mctQueueemail->lblIdQueueEmail_Create();
			$this->txtTo = $this->mctQueueemail->txtTo_Create();
			$this->txtSubject = $this->mctQueueemail->txtSubject_Create();
			$this->txtBody = $this->mctQueueemail->txtBody_Create();
			$this->txtStatus = $this->mctQueueemail->txtStatus_Create();
			$this->txtLog = $this->mctQueueemail->txtLog_Create();
			$this->txtIdUser = $this->mctQueueemail->txtIdUser_Create();
			$this->calCreateDateTime = $this->mctQueueemail->calCreateDateTime_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'),  QApplication::Translate('Queueemail'))));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctQueueemail->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the QueueemailMetaControl
			$this->mctQueueemail->SaveQueueemail();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the QueueemailMetaControl
			$this->mctQueueemail->DeleteQueueemail();
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