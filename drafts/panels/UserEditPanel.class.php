<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the User class.  It uses the code-generated
	 * UserMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a User columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 *
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both user_edit.php AND
	 * user_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage Drafts
	 */
	class UserEditPanel extends QPanel {
		// Local instance of the UserMetaControl
		/**
		 * @var UserMetaControl
		 */
		protected $mctUser;

		// Controls for User's Data Fields
		public $lblIdUser;
		public $txtEmail;
		public $txtPassword;
		public $txtFirstName;
		public $txtMiddleName;
		public $txtLastName;
		public $txtCountry;
		public $txtCity;
		public $txtPhone;
		public $calBirthday;
		public $txtImagePhoto;
		public $txtStatusUser;
		public $txtWalletAddress;
		public $txtUserType;
		public $txtTotalqtycoins;

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

		public function __construct($objParentObject, $strClosePanelMethod, $intIdUser = null, $strControlId = null) {
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Setup Callback and Template
			$this->strTemplate = __DOCROOT__ . __PANEL_DRAFTS__ . '/UserEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the UserMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctUser = UserMetaControl::Create($this, $intIdUser);

			// Call MetaControl's methods to create qcontrols based on User's data fields
			$this->lblIdUser = $this->mctUser->lblIdUser_Create();
			$this->txtEmail = $this->mctUser->txtEmail_Create();
			$this->txtPassword = $this->mctUser->txtPassword_Create();
			$this->txtFirstName = $this->mctUser->txtFirstName_Create();
			$this->txtMiddleName = $this->mctUser->txtMiddleName_Create();
			$this->txtLastName = $this->mctUser->txtLastName_Create();
			$this->txtCountry = $this->mctUser->txtCountry_Create();
			$this->txtCity = $this->mctUser->txtCity_Create();
			$this->txtPhone = $this->mctUser->txtPhone_Create();
			$this->calBirthday = $this->mctUser->calBirthday_Create();
			$this->txtImagePhoto = $this->mctUser->txtImagePhoto_Create();
			$this->txtStatusUser = $this->mctUser->txtStatusUser_Create();
			$this->txtWalletAddress = $this->mctUser->txtWalletAddress_Create();
			$this->txtUserType = $this->mctUser->txtUserType_Create();
			$this->txtTotalqtycoins = $this->mctUser->txtTotalqtycoins_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'),  QApplication::Translate('User'))));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctUser->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the UserMetaControl
			$this->mctUser->SaveUser();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the UserMetaControl
			$this->mctUser->DeleteUser();
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
			if (($objUser = User::LoadByEmail($this->txtEmail->Text)) && ($objUser->IdUser != $this->mctUser->User->IdUser )){
				$blnToReturn = false;
				$this->txtEmail->Warning = QApplication::Translate("Already in Use");
			}
	return $blnToReturn;
		}

	}
?>