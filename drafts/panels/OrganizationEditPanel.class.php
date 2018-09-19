<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
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
	 * @subpackage Drafts
	 */
	class OrganizationEditPanel extends QPanel {
		// Local instance of the OrganizationMetaControl
		/**
		 * @var OrganizationMetaControl
		 */
		protected $mctOrganization;

		// Controls for Organization's Data Fields
		public $lblIdOrganization;
		public $txtName;
		public $txtPhone;
		public $txtQrCode;
		public $txtOrganizationImage;
		public $txtLatitude;
		public $txtLongitude;
		public $txtCountry;
		public $txtCity;
		public $txtAddress;
		public $lstIdOrganizationTypeObject;
		public $lstIdOwnerObject;

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

		public function __construct($objParentObject, $strClosePanelMethod, $intIdOrganization = null, $strControlId = null) {
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Setup Callback and Template
			$this->strTemplate = __DOCROOT__ . __PANEL_DRAFTS__ . '/OrganizationEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the OrganizationMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctOrganization = OrganizationMetaControl::Create($this, $intIdOrganization);

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
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
			$this->btnSave->CausesValidation = $this;

			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = QApplication::Translate('Cancel');
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));

			$this->btnDelete = new QButton($this);
			$this->btnDelete->Text = QApplication::Translate('Delete');
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'),  QApplication::Translate('Organization'))));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctOrganization->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the OrganizationMetaControl
			$this->mctOrganization->SaveOrganization();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the OrganizationMetaControl
			$this->mctOrganization->DeleteOrganization();
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
			if (($objOrganization = Organization::LoadByLatitude($this->txtLatitude->Text)) && ($objOrganization->IdOrganization != $this->mctOrganization->Organization->IdOrganization )){
				$blnToReturn = false;
				$this->txtLatitude->Warning = QApplication::Translate("Already in Use");
			}
			if (($objOrganization = Organization::LoadByLongitude($this->txtLongitude->Text)) && ($objOrganization->IdOrganization != $this->mctOrganization->Organization->IdOrganization )){
				$blnToReturn = false;
				$this->txtLongitude->Warning = QApplication::Translate("Already in Use");
			}
	return $blnToReturn;
		}

	}
?>