<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the Administrator class.  It uses the code-generated
	 * AdministratorMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a Administrator columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 *
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both administrator_edit.php AND
	 * administrator_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage Drafts
	 */
	class AdministratorEditPanel extends QPanel {
		// Local instance of the AdministratorMetaControl
		/**
		 * @var AdministratorMetaControl
		 */
		protected $mctAdministrator;

		// Controls for Administrator's Data Fields
		public $lblIdAdministrator;
		public $txtEmail;
		public $txtPassword;
		public $txtFirstName;
		public $txtLastName;
		public $txtAddress;
		public $txtPhone;

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

		public function __construct($objParentObject, $strClosePanelMethod, $intIdAdministrator = null, $strControlId = null) {
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Setup Callback and Template
			$this->strTemplate = __DOCROOT__ . __PANEL_DRAFTS__ . '/AdministratorEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the AdministratorMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctAdministrator = AdministratorMetaControl::Create($this, $intIdAdministrator);

			// Call MetaControl's methods to create qcontrols based on Administrator's data fields
			$this->lblIdAdministrator = $this->mctAdministrator->lblIdAdministrator_Create();
			$this->txtEmail = $this->mctAdministrator->txtEmail_Create();
			$this->txtPassword = $this->mctAdministrator->txtPassword_Create();
			$this->txtFirstName = $this->mctAdministrator->txtFirstName_Create();
			$this->txtLastName = $this->mctAdministrator->txtLastName_Create();
			$this->txtAddress = $this->mctAdministrator->txtAddress_Create();
			$this->txtPhone = $this->mctAdministrator->txtPhone_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'),  QApplication::Translate('Administrator'))));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctAdministrator->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the AdministratorMetaControl
			$this->mctAdministrator->SaveAdministrator();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the AdministratorMetaControl
			$this->mctAdministrator->DeleteAdministrator();
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

		// Check for records that may violate Unique Clauses
		public function Validate() {
			$blnToReturn = true;
			if (($objAdministrator = Administrator::LoadByEmail($this->txtEmail->Text)) && ($objAdministrator->IdAdministrator != $this->mctAdministrator->Administrator->IdAdministrator )){
				$blnToReturn = false;
				$this->txtEmail->Warning = QApplication::Translate("Already in Use");
			}
	return $blnToReturn;
		}

	}
?>