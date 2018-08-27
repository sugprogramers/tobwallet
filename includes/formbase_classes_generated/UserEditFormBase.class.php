<?php
	/**
	 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
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
	 * @subpackage FormBaseObjects
	 */
	abstract class UserEditFormBase extends QForm {
		// Local instance of the UserMetaControl
		/**
		 * @var UserMetaControlGen mctUser
		 */
		protected $mctUser;

		// Controls for User's Data Fields
		protected $lblIdUser;
		protected $txtEmail;
		protected $txtPassword;
		protected $txtFirstName;
		protected $txtMiddleName;
		protected $txtLastName;
		protected $txtCountry;
		protected $txtCity;
		protected $txtPhone;
		protected $calBirthday;
		protected $txtImagePhoto;
		protected $txtStatusUser;
		protected $txtWalletAddress;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References

		// Other Controls
		/**
		 * @var QButton Save
		 */
		protected $btnSave;
		/**
		 * @var QButton Delete
		 */
		protected $btnDelete;
		/**
		 * @var QButton Cancel
		 */
		protected $btnCancel;

		// Create QForm Event Handlers as Needed

//		protected function Form_Exit() {}
//		protected function Form_Load() {}
//		protected function Form_PreRender() {}

		protected function Form_Run() {
			parent::Form_Run();
		}

		protected function Form_Create() {
			parent::Form_Create();

			// Use the CreateFromPathInfo shortcut (this can also be done manually using the UserMetaControl constructor)
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctUser = UserMetaControl::CreateFromPathInfo($this);

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

			// Create Buttons and Actions on this Form
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = QApplication::Translate('Save');
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->CausesValidation = true;

			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = QApplication::Translate('Cancel');
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));

			$this->btnDelete = new QButton($this);
			$this->btnDelete->Text = QApplication::Translate('Delete');
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), QApplication::Translate('User'))));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctUser->EditMode;
		}

		/**
		 * This Form_Validate event handler allows you to specify any custom Form Validation rules.
		 * It will also Blink() on all invalid controls, as well as Focus() on the top-most invalid control.
		 */
		protected function Form_Validate() {
			// By default, we report the result of validation from the parent
			$blnToReturn = parent::Form_Validate();

			// Custom Validation Rules
			// TODO: Be sure to set $blnToReturn to false if any custom validation fails!
			// Check for records that may violate Unique Clauses
			if (($objUser = User::LoadByEmail($this->txtEmail->Text)) && ($objUser->IdUser != $this->mctUser->User->IdUser )){
				$blnToReturn = false;
				$this->txtEmail->Warning = QApplication::Translate("Already in Use");
			}


			$blnFocused = false;
			foreach ($this->GetErrorControls() as $objControl) {
				// Set Focus to the top-most invalid control
				if (!$blnFocused) {
					$objControl->Focus();
					$blnFocused = true;
				}

				// Blink on ALL invalid controls
				$objControl->Blink();
			}

			return $blnToReturn;
		}

		// Button Event Handlers

		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the UserMetaControl
			$this->mctUser->SaveUser();
			$this->RedirectToListPage();
		}

		protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the UserMetaControl
			$this->mctUser->DeleteUser();
			$this->RedirectToListPage();
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->RedirectToListPage();
		}

		// Other Methods

		protected function RedirectToListPage() {
			QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/user_list.php');
		}
	}
?>
