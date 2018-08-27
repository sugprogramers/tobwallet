<?php
	/**
	 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
	 * of the Organization class.  It uses the code-generated
	 * OrganizationMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a Organization columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both organization_edit.php AND
	 * organization_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage FormBaseObjects
	 */
	abstract class OrganizationEditFormBase extends QForm {
		// Local instance of the OrganizationMetaControl
		/**
		 * @var OrganizationMetaControlGen mctOrganization
		 */
		protected $mctOrganization;

		// Controls for Organization's Data Fields
		protected $lblIdOrganization;
		protected $txtName;
		protected $txtPhone;
		protected $txtQrCode;
		protected $txtOrganizationImage;
		protected $txtLatitude;
		protected $txtLongitude;
		protected $txtCountry;
		protected $txtCity;
		protected $txtAddress;
		protected $lstIdOrganizationTypeObject;
		protected $lstIdOwnerObject;

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

			// Use the CreateFromPathInfo shortcut (this can also be done manually using the OrganizationMetaControl constructor)
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctOrganization = OrganizationMetaControl::CreateFromPathInfo($this);

			// Call MetaControl's methods to create qcontrols based on Organization's data fields
			$this->lblIdOrganization = $this->mctOrganization->lblIdOrganization_Create();
			$this->txtName = $this->mctOrganization->txtName_Create();
			$this->txtPhone = $this->mctOrganization->txtPhone_Create();
			$this->txtQrCode = $this->mctOrganization->txtQrCode_Create();
			$this->txtOrganizationImage = $this->mctOrganization->txtOrganizationImage_Create();
			$this->txtLatitude = $this->mctOrganization->txtLatitude_Create();
			$this->txtLongitude = $this->mctOrganization->txtLongitude_Create();
			$this->txtCountry = $this->mctOrganization->txtCountry_Create();
			$this->txtCity = $this->mctOrganization->txtCity_Create();
			$this->txtAddress = $this->mctOrganization->txtAddress_Create();
			$this->lstIdOrganizationTypeObject = $this->mctOrganization->lstIdOrganizationTypeObject_Create();
			$this->lstIdOwnerObject = $this->mctOrganization->lstIdOwnerObject_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), QApplication::Translate('Organization'))));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctOrganization->EditMode;
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
			if (($objOrganization = Organization::LoadByLatitude($this->txtLatitude->Text)) && ($objOrganization->IdOrganization != $this->mctOrganization->Organization->IdOrganization )){
				$blnToReturn = false;
				$this->txtLatitude->Warning = QApplication::Translate("Already in Use");
			}
			if (($objOrganization = Organization::LoadByLongitude($this->txtLongitude->Text)) && ($objOrganization->IdOrganization != $this->mctOrganization->Organization->IdOrganization )){
				$blnToReturn = false;
				$this->txtLongitude->Warning = QApplication::Translate("Already in Use");
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
			// Delegate "Save" processing to the OrganizationMetaControl
			$this->mctOrganization->SaveOrganization();
			$this->RedirectToListPage();
		}

		protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the OrganizationMetaControl
			$this->mctOrganization->DeleteOrganization();
			$this->RedirectToListPage();
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->RedirectToListPage();
		}

		// Other Methods

		protected function RedirectToListPage() {
			QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/organization_list.php');
		}
	}
?>
