<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the RestaurantCopy1 class.  It uses the code-generated
	 * RestaurantCopy1MetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a RestaurantCopy1 columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 *
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both restaurant_copy_1_edit.php AND
	 * restaurant_copy_1_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage Drafts
	 */
	class RestaurantCopy1EditPanel extends QPanel {
		// Local instance of the RestaurantCopy1MetaControl
		/**
		 * @var RestaurantCopy1MetaControl
		 */
		protected $mctRestaurantCopy1;

		// Controls for RestaurantCopy1's Data Fields
		public $lblIdRestaurant;
		public $txtEmail;
		public $txtPassword;
		public $txtOwnerFirstName;
		public $txtOwnerLastName;
		public $txtOwnerMiddleName;
		public $txtCountry;
		public $txtCity;
		public $txtAddress;
		public $txtRestaurantName;
		public $txtLongitude;
		public $txtLatitude;
		public $txtQrcode;
		public $txtQtycoins;

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

		public function __construct($objParentObject, $strClosePanelMethod, $intIdRestaurant = null, $strControlId = null) {
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Setup Callback and Template
			$this->strTemplate = __DOCROOT__ . __PANEL_DRAFTS__ . '/RestaurantCopy1EditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the RestaurantCopy1MetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctRestaurantCopy1 = RestaurantCopy1MetaControl::Create($this, $intIdRestaurant);

			// Call MetaControl's methods to create qcontrols based on RestaurantCopy1's data fields
			$this->lblIdRestaurant = $this->mctRestaurantCopy1->lblIdRestaurant_Create();
			$this->txtEmail = $this->mctRestaurantCopy1->txtEmail_Create();
			$this->txtPassword = $this->mctRestaurantCopy1->txtPassword_Create();
			$this->txtOwnerFirstName = $this->mctRestaurantCopy1->txtOwnerFirstName_Create();
			$this->txtOwnerLastName = $this->mctRestaurantCopy1->txtOwnerLastName_Create();
			$this->txtOwnerMiddleName = $this->mctRestaurantCopy1->txtOwnerMiddleName_Create();
			$this->txtCountry = $this->mctRestaurantCopy1->txtCountry_Create();
			$this->txtCity = $this->mctRestaurantCopy1->txtCity_Create();
			$this->txtAddress = $this->mctRestaurantCopy1->txtAddress_Create();
			$this->txtRestaurantName = $this->mctRestaurantCopy1->txtRestaurantName_Create();
			$this->txtLongitude = $this->mctRestaurantCopy1->txtLongitude_Create();
			$this->txtLatitude = $this->mctRestaurantCopy1->txtLatitude_Create();
			$this->txtQrcode = $this->mctRestaurantCopy1->txtQrcode_Create();
			$this->txtQtycoins = $this->mctRestaurantCopy1->txtQtycoins_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'),  QApplication::Translate('RestaurantCopy1'))));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctRestaurantCopy1->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the RestaurantCopy1MetaControl
			$this->mctRestaurantCopy1->SaveRestaurantCopy1();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the RestaurantCopy1MetaControl
			$this->mctRestaurantCopy1->DeleteRestaurantCopy1();
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
			if (($objRestaurantCopy1 = RestaurantCopy1::LoadByEmail($this->txtEmail->Text)) && ($objRestaurantCopy1->IdRestaurant != $this->mctRestaurantCopy1->RestaurantCopy1->IdRestaurant )){
				$blnToReturn = false;
				$this->txtEmail->Warning = QApplication::Translate("Already in Use");
			}
	return $blnToReturn;
		}

	}
?>