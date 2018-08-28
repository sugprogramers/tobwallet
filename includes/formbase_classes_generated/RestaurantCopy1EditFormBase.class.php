<?php
	/**
	 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
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
	 * @subpackage FormBaseObjects
	 */
	abstract class RestaurantCopy1EditFormBase extends QForm {
		// Local instance of the RestaurantCopy1MetaControl
		/**
		 * @var RestaurantCopy1MetaControlGen mctRestaurantCopy1
		 */
		protected $mctRestaurantCopy1;

		// Controls for RestaurantCopy1's Data Fields
		protected $lblIdRestaurant;
		protected $txtEmail;
		protected $txtPassword;
		protected $txtOwnerFirstName;
		protected $txtOwnerLastName;
		protected $txtOwnerMiddleName;
		protected $txtCountry;
		protected $txtCity;
		protected $txtAddress;
		protected $txtRestaurantName;
		protected $txtLongitude;
		protected $txtLatitude;
		protected $txtQrcode;
		protected $txtQtycoins;

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

			// Use the CreateFromPathInfo shortcut (this can also be done manually using the RestaurantCopy1MetaControl constructor)
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctRestaurantCopy1 = RestaurantCopy1MetaControl::CreateFromPathInfo($this);

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
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->CausesValidation = true;

			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = QApplication::Translate('Cancel');
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));

			$this->btnDelete = new QButton($this);
			$this->btnDelete->Text = QApplication::Translate('Delete');
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), QApplication::Translate('RestaurantCopy1'))));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctRestaurantCopy1->EditMode;
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
			if (($objRestaurantCopy1 = RestaurantCopy1::LoadByEmail($this->txtEmail->Text)) && ($objRestaurantCopy1->IdRestaurant != $this->mctRestaurantCopy1->RestaurantCopy1->IdRestaurant )){
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
			// Delegate "Save" processing to the RestaurantCopy1MetaControl
			$this->mctRestaurantCopy1->SaveRestaurantCopy1();
			$this->RedirectToListPage();
		}

		protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the RestaurantCopy1MetaControl
			$this->mctRestaurantCopy1->DeleteRestaurantCopy1();
			$this->RedirectToListPage();
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->RedirectToListPage();
		}

		// Other Methods

		protected function RedirectToListPage() {
			QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/restaurant_copy1_list.php');
		}
	}
?>
