<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the Restaurant class.  It uses the code-generated
	 * RestaurantMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a Restaurant columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 *
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both restaurant_edit.php AND
	 * restaurant_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage Drafts
	 */
	class RestaurantEditPanel extends QPanel {
		// Local instance of the RestaurantMetaControl
		/**
		 * @var RestaurantMetaControl
		 */
		protected $mctRestaurant;

		// Controls for Restaurant's Data Fields
		public $lblIdRestaurant;
		public $txtCountry;
		public $txtCity;
		public $txtAddress;
		public $txtRestaurantName;
		public $txtLongitude;
		public $txtLatitude;
		public $txtQrCode;
		public $txtQtycoins;
		public $lstIdUserObject;
		public $txtType;

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
			$this->strTemplate = __DOCROOT__ . __PANEL_DRAFTS__ . '/RestaurantEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the RestaurantMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctRestaurant = RestaurantMetaControl::Create($this, $intIdRestaurant);

			// Call MetaControl's methods to create qcontrols based on Restaurant's data fields
			$this->lblIdRestaurant = $this->mctRestaurant->lblIdRestaurant_Create();
			$this->txtCountry = $this->mctRestaurant->txtCountry_Create();
			$this->txtCity = $this->mctRestaurant->txtCity_Create();
			$this->txtAddress = $this->mctRestaurant->txtAddress_Create();
			$this->txtRestaurantName = $this->mctRestaurant->txtRestaurantName_Create();
			$this->txtLongitude = $this->mctRestaurant->txtLongitude_Create();
			$this->txtLatitude = $this->mctRestaurant->txtLatitude_Create();
			$this->txtQrCode = $this->mctRestaurant->txtQrCode_Create();
			$this->txtQtycoins = $this->mctRestaurant->txtQtycoins_Create();
			$this->lstIdUserObject = $this->mctRestaurant->lstIdUserObject_Create();
			$this->txtType = $this->mctRestaurant->txtType_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'),  QApplication::Translate('Restaurant'))));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctRestaurant->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the RestaurantMetaControl
			$this->mctRestaurant->SaveRestaurant();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the RestaurantMetaControl
			$this->mctRestaurant->DeleteRestaurant();
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