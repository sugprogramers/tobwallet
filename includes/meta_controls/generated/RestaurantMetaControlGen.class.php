<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Restaurant class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Restaurant object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a RestaurantMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 *
	 * @package My QCubed Application
	 * @subpackage MetaControls
	 * @property-read Restaurant $Restaurant the actual Restaurant data class being edited
	 * @property QLabel $IdRestaurantControl
	 * @property-read QLabel $IdRestaurantLabel
	 * @property QTextBox $CountryControl
	 * @property-read QLabel $CountryLabel
	 * @property QTextBox $CityControl
	 * @property-read QLabel $CityLabel
	 * @property QTextBox $AddressControl
	 * @property-read QLabel $AddressLabel
	 * @property QTextBox $RestaurantNameControl
	 * @property-read QLabel $RestaurantNameLabel
	 * @property QTextBox $LongitudeControl
	 * @property-read QLabel $LongitudeLabel
	 * @property QTextBox $LatitudeControl
	 * @property-read QLabel $LatitudeLabel
	 * @property QTextBox $QrCodeControl
	 * @property-read QLabel $QrCodeLabel
	 * @property QIntegerTextBox $QtycoinsControl
	 * @property-read QLabel $QtycoinsLabel
	 * @property QListBox $IdUserControl
	 * @property-read QLabel $IdUserLabel
	 * @property QTextBox $TypeControl
	 * @property-read QLabel $TypeLabel
	 * @property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * @property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class RestaurantMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Restaurant objRestaurant
		 * @access protected
		 */
		protected $objRestaurant;
		/**
		 * @var QForm|QControl objParentObject
		 * @access protected
		 */
		protected $objParentObject;
		/**
		 * @var string strTitleVerb
		 * @access protected
		 */
		protected $strTitleVerb;
		/**
		 * @var boolean blnEditMode
		 * @access protected
		 */
		protected $blnEditMode;

		// Controls that allow the editing of Restaurant's individual data fields
		/**
		 * @var QLabel lblIdRestaurant
		 * @access protected
		 */
		protected $lblIdRestaurant;
		/**
		 * @var QTextBox txtCountry
		 * @access protected
		 */
		protected $txtCountry;
		/**
		 * @var QTextBox txtCity
		 * @access protected
		 */
		protected $txtCity;
		/**
		 * @var QTextBox txtAddress
		 * @access protected
		 */
		protected $txtAddress;
		/**
		 * @var QTextBox txtRestaurantName
		 * @access protected
		 */
		protected $txtRestaurantName;
		/**
		 * @var QTextBox txtLongitude
		 * @access protected
		 */
		protected $txtLongitude;
		/**
		 * @var QTextBox txtLatitude
		 * @access protected
		 */
		protected $txtLatitude;
		/**
		 * @var QTextBox txtQrCode
		 * @access protected
		 */
		protected $txtQrCode;
		/**
		 * @var QIntegerTextBox txtQtycoins
		 * @access protected
		 */
		protected $txtQtycoins;
		/**
		 * @var QListBox lstIdUserObject
		 * @access protected
		 */
		protected $lstIdUserObject;
		/**
		 * @var QTextBox txtType
		 * @access protected
		 */
		protected $txtType;

		// Controls that allow the viewing of Restaurant's individual data fields
		/**
		 * @var QLabel lblCountry
		 * @access protected
		 */
		protected $lblCountry;
		/**
		 * @var QLabel lblCity
		 * @access protected
		 */
		protected $lblCity;
		/**
		 * @var QLabel lblAddress
		 * @access protected
		 */
		protected $lblAddress;
		/**
		 * @var QLabel lblRestaurantName
		 * @access protected
		 */
		protected $lblRestaurantName;
		/**
		 * @var QLabel lblLongitude
		 * @access protected
		 */
		protected $lblLongitude;
		/**
		 * @var QLabel lblLatitude
		 * @access protected
		 */
		protected $lblLatitude;
		/**
		 * @var QLabel lblQrCode
		 * @access protected
		 */
		protected $lblQrCode;
		/**
		 * @var QLabel lblQtycoins
		 * @access protected
		 */
		protected $lblQtycoins;
		/**
		 * @var QLabel lblIdUser
		 * @access protected
		 */
		protected $lblIdUser;
		/**
		 * @var QLabel lblType
		 * @access protected
		 */
		protected $lblType;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * RestaurantMetaControl to edit a single Restaurant object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Restaurant object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RestaurantMetaControl
		 * @param Restaurant $objRestaurant new or existing Restaurant object
		 */
		 public function __construct($objParentObject, Restaurant $objRestaurant) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this RestaurantMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Restaurant object
			$this->objRestaurant = $objRestaurant;

			// Figure out if we're Editing or Creating New
			if ($this->objRestaurant->__Restored) {
				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			} else {
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
		 }

		/**
		 * Static Helper Method to Create using PK arguments
		 * You must pass in the PK arguments on an object to load, or leave it blank to create a new one.
		 * If you want to load via QueryString or PathInfo, use the CreateFromQueryString or CreateFromPathInfo
		 * static helper methods.  Finally, specify a CreateType to define whether or not we are only allowed to
		 * edit, or if we are also allowed to create a new one, etc.
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RestaurantMetaControl
		 * @param integer $intIdRestaurant primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Restaurant object creation - defaults to CreateOrEdit
 		 * @return RestaurantMetaControl
		 */
		public static function Create($objParentObject, $intIdRestaurant = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intIdRestaurant)) {
				$objRestaurant = Restaurant::Load($intIdRestaurant);

				// Restaurant was found -- return it!
				if ($objRestaurant)
					return new RestaurantMetaControl($objParentObject, $objRestaurant);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Restaurant object with PK arguments: ' . $intIdRestaurant);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new RestaurantMetaControl($objParentObject, new Restaurant());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RestaurantMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Restaurant object creation - defaults to CreateOrEdit
		 * @return RestaurantMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdRestaurant = QApplication::PathInfo(0);
			return RestaurantMetaControl::Create($objParentObject, $intIdRestaurant, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RestaurantMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Restaurant object creation - defaults to CreateOrEdit
		 * @return RestaurantMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdRestaurant = QApplication::QueryString('intIdRestaurant');
			return RestaurantMetaControl::Create($objParentObject, $intIdRestaurant, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblIdRestaurant
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIdRestaurant_Create($strControlId = null) {
			$this->lblIdRestaurant = new QLabel($this->objParentObject, $strControlId);
			$this->lblIdRestaurant->Name = QApplication::Translate('Id Restaurant');
			if ($this->blnEditMode)
				$this->lblIdRestaurant->Text = $this->objRestaurant->IdRestaurant;
			else
				$this->lblIdRestaurant->Text = 'N/A';
			return $this->lblIdRestaurant;
		}

		/**
		 * Create and setup QTextBox txtCountry
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtCountry_Create($strControlId = null) {
			$this->txtCountry = new QTextBox($this->objParentObject, $strControlId);
			$this->txtCountry->Name = QApplication::Translate('Country');
			$this->txtCountry->Text = $this->objRestaurant->Country;
			$this->txtCountry->Required = true;
			$this->txtCountry->MaxLength = Restaurant::CountryMaxLength;
			return $this->txtCountry;
		}

		/**
		 * Create and setup QLabel lblCountry
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCountry_Create($strControlId = null) {
			$this->lblCountry = new QLabel($this->objParentObject, $strControlId);
			$this->lblCountry->Name = QApplication::Translate('Country');
			$this->lblCountry->Text = $this->objRestaurant->Country;
			$this->lblCountry->Required = true;
			return $this->lblCountry;
		}

		/**
		 * Create and setup QTextBox txtCity
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtCity_Create($strControlId = null) {
			$this->txtCity = new QTextBox($this->objParentObject, $strControlId);
			$this->txtCity->Name = QApplication::Translate('City');
			$this->txtCity->Text = $this->objRestaurant->City;
			$this->txtCity->Required = true;
			$this->txtCity->MaxLength = Restaurant::CityMaxLength;
			return $this->txtCity;
		}

		/**
		 * Create and setup QLabel lblCity
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCity_Create($strControlId = null) {
			$this->lblCity = new QLabel($this->objParentObject, $strControlId);
			$this->lblCity->Name = QApplication::Translate('City');
			$this->lblCity->Text = $this->objRestaurant->City;
			$this->lblCity->Required = true;
			return $this->lblCity;
		}

		/**
		 * Create and setup QTextBox txtAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtAddress_Create($strControlId = null) {
			$this->txtAddress = new QTextBox($this->objParentObject, $strControlId);
			$this->txtAddress->Name = QApplication::Translate('Address');
			$this->txtAddress->Text = $this->objRestaurant->Address;
			$this->txtAddress->Required = true;
			$this->txtAddress->MaxLength = Restaurant::AddressMaxLength;
			return $this->txtAddress;
		}

		/**
		 * Create and setup QLabel lblAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAddress_Create($strControlId = null) {
			$this->lblAddress = new QLabel($this->objParentObject, $strControlId);
			$this->lblAddress->Name = QApplication::Translate('Address');
			$this->lblAddress->Text = $this->objRestaurant->Address;
			$this->lblAddress->Required = true;
			return $this->lblAddress;
		}

		/**
		 * Create and setup QTextBox txtRestaurantName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtRestaurantName_Create($strControlId = null) {
			$this->txtRestaurantName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtRestaurantName->Name = QApplication::Translate('Restaurant Name');
			$this->txtRestaurantName->Text = $this->objRestaurant->RestaurantName;
			$this->txtRestaurantName->Required = true;
			$this->txtRestaurantName->MaxLength = Restaurant::RestaurantNameMaxLength;
			return $this->txtRestaurantName;
		}

		/**
		 * Create and setup QLabel lblRestaurantName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblRestaurantName_Create($strControlId = null) {
			$this->lblRestaurantName = new QLabel($this->objParentObject, $strControlId);
			$this->lblRestaurantName->Name = QApplication::Translate('Restaurant Name');
			$this->lblRestaurantName->Text = $this->objRestaurant->RestaurantName;
			$this->lblRestaurantName->Required = true;
			return $this->lblRestaurantName;
		}

		/**
		 * Create and setup QTextBox txtLongitude
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtLongitude_Create($strControlId = null) {
			$this->txtLongitude = new QTextBox($this->objParentObject, $strControlId);
			$this->txtLongitude->Name = QApplication::Translate('Longitude');
			$this->txtLongitude->Text = $this->objRestaurant->Longitude;
			$this->txtLongitude->Required = true;
			return $this->txtLongitude;
		}

		/**
		 * Create and setup QLabel lblLongitude
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLongitude_Create($strControlId = null) {
			$this->lblLongitude = new QLabel($this->objParentObject, $strControlId);
			$this->lblLongitude->Name = QApplication::Translate('Longitude');
			$this->lblLongitude->Text = $this->objRestaurant->Longitude;
			$this->lblLongitude->Required = true;
			return $this->lblLongitude;
		}

		/**
		 * Create and setup QTextBox txtLatitude
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtLatitude_Create($strControlId = null) {
			$this->txtLatitude = new QTextBox($this->objParentObject, $strControlId);
			$this->txtLatitude->Name = QApplication::Translate('Latitude');
			$this->txtLatitude->Text = $this->objRestaurant->Latitude;
			$this->txtLatitude->Required = true;
			return $this->txtLatitude;
		}

		/**
		 * Create and setup QLabel lblLatitude
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLatitude_Create($strControlId = null) {
			$this->lblLatitude = new QLabel($this->objParentObject, $strControlId);
			$this->lblLatitude->Name = QApplication::Translate('Latitude');
			$this->lblLatitude->Text = $this->objRestaurant->Latitude;
			$this->lblLatitude->Required = true;
			return $this->lblLatitude;
		}

		/**
		 * Create and setup QTextBox txtQrCode
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtQrCode_Create($strControlId = null) {
			$this->txtQrCode = new QTextBox($this->objParentObject, $strControlId);
			$this->txtQrCode->Name = QApplication::Translate('Qr Code');
			$this->txtQrCode->Text = $this->objRestaurant->QrCode;
			$this->txtQrCode->Required = true;
			$this->txtQrCode->TextMode = QTextMode::MultiLine;
			return $this->txtQrCode;
		}

		/**
		 * Create and setup QLabel lblQrCode
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblQrCode_Create($strControlId = null) {
			$this->lblQrCode = new QLabel($this->objParentObject, $strControlId);
			$this->lblQrCode->Name = QApplication::Translate('Qr Code');
			$this->lblQrCode->Text = $this->objRestaurant->QrCode;
			$this->lblQrCode->Required = true;
			return $this->lblQrCode;
		}

		/**
		 * Create and setup QIntegerTextBox txtQtycoins
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtQtycoins_Create($strControlId = null) {
			$this->txtQtycoins = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtQtycoins->Name = QApplication::Translate('Qtycoins');
			$this->txtQtycoins->Text = $this->objRestaurant->Qtycoins;
			return $this->txtQtycoins;
		}

		/**
		 * Create and setup QLabel lblQtycoins
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblQtycoins_Create($strControlId = null, $strFormat = null) {
			$this->lblQtycoins = new QLabel($this->objParentObject, $strControlId);
			$this->lblQtycoins->Name = QApplication::Translate('Qtycoins');
			$this->lblQtycoins->Text = $this->objRestaurant->Qtycoins;
			$this->lblQtycoins->Format = $strFormat;
			return $this->lblQtycoins;
		}

		/**
		 * Create and setup QListBox lstIdUserObject
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstIdUserObject_Create($strControlId = null) {
			$this->lstIdUserObject = new QListBox($this->objParentObject, $strControlId);
			$this->lstIdUserObject->Name = QApplication::Translate('Id User Object');
			$this->lstIdUserObject->Required = true;
			if (!$this->blnEditMode)
				$this->lstIdUserObject->AddItem(QApplication::Translate('- Select One -'), null);
			$objIdUserObjectArray = User::LoadAll();
			if ($objIdUserObjectArray) foreach ($objIdUserObjectArray as $objIdUserObject) {
				$objListItem = new QListItem($objIdUserObject->__toString(), $objIdUserObject->IdUser);
				if (($this->objRestaurant->IdUserObject) && ($this->objRestaurant->IdUserObject->IdUser == $objIdUserObject->IdUser))
					$objListItem->Selected = true;
				$this->lstIdUserObject->AddItem($objListItem);
			}
			return $this->lstIdUserObject;
		}

		/**
		 * Create and setup QLabel lblIdUser
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIdUser_Create($strControlId = null) {
			$this->lblIdUser = new QLabel($this->objParentObject, $strControlId);
			$this->lblIdUser->Name = QApplication::Translate('Id User Object');
			$this->lblIdUser->Text = ($this->objRestaurant->IdUserObject) ? $this->objRestaurant->IdUserObject->__toString() : null;
			$this->lblIdUser->Required = true;
			return $this->lblIdUser;
		}

		/**
		 * Create and setup QTextBox txtType
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtType_Create($strControlId = null) {
			$this->txtType = new QTextBox($this->objParentObject, $strControlId);
			$this->txtType->Name = QApplication::Translate('Type');
			$this->txtType->Text = $this->objRestaurant->Type;
			$this->txtType->Required = true;
			$this->txtType->MaxLength = Restaurant::TypeMaxLength;
			return $this->txtType;
		}

		/**
		 * Create and setup QLabel lblType
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblType_Create($strControlId = null) {
			$this->lblType = new QLabel($this->objParentObject, $strControlId);
			$this->lblType->Name = QApplication::Translate('Type');
			$this->lblType->Text = $this->objRestaurant->Type;
			$this->lblType->Required = true;
			return $this->lblType;
		}



		/**
		 * Refresh this MetaControl with Data from the local Restaurant object.
		 * @param boolean $blnReload reload Restaurant from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objRestaurant->Reload();

			if ($this->lblIdRestaurant) if ($this->blnEditMode) $this->lblIdRestaurant->Text = $this->objRestaurant->IdRestaurant;

			if ($this->txtCountry) $this->txtCountry->Text = $this->objRestaurant->Country;
			if ($this->lblCountry) $this->lblCountry->Text = $this->objRestaurant->Country;

			if ($this->txtCity) $this->txtCity->Text = $this->objRestaurant->City;
			if ($this->lblCity) $this->lblCity->Text = $this->objRestaurant->City;

			if ($this->txtAddress) $this->txtAddress->Text = $this->objRestaurant->Address;
			if ($this->lblAddress) $this->lblAddress->Text = $this->objRestaurant->Address;

			if ($this->txtRestaurantName) $this->txtRestaurantName->Text = $this->objRestaurant->RestaurantName;
			if ($this->lblRestaurantName) $this->lblRestaurantName->Text = $this->objRestaurant->RestaurantName;

			if ($this->txtLongitude) $this->txtLongitude->Text = $this->objRestaurant->Longitude;
			if ($this->lblLongitude) $this->lblLongitude->Text = $this->objRestaurant->Longitude;

			if ($this->txtLatitude) $this->txtLatitude->Text = $this->objRestaurant->Latitude;
			if ($this->lblLatitude) $this->lblLatitude->Text = $this->objRestaurant->Latitude;

			if ($this->txtQrCode) $this->txtQrCode->Text = $this->objRestaurant->QrCode;
			if ($this->lblQrCode) $this->lblQrCode->Text = $this->objRestaurant->QrCode;

			if ($this->txtQtycoins) $this->txtQtycoins->Text = $this->objRestaurant->Qtycoins;
			if ($this->lblQtycoins) $this->lblQtycoins->Text = $this->objRestaurant->Qtycoins;

			if ($this->lstIdUserObject) {
					$this->lstIdUserObject->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstIdUserObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objIdUserObjectArray = User::LoadAll();
				if ($objIdUserObjectArray) foreach ($objIdUserObjectArray as $objIdUserObject) {
					$objListItem = new QListItem($objIdUserObject->__toString(), $objIdUserObject->IdUser);
					if (($this->objRestaurant->IdUserObject) && ($this->objRestaurant->IdUserObject->IdUser == $objIdUserObject->IdUser))
						$objListItem->Selected = true;
					$this->lstIdUserObject->AddItem($objListItem);
				}
			}
			if ($this->lblIdUser) $this->lblIdUser->Text = ($this->objRestaurant->IdUserObject) ? $this->objRestaurant->IdUserObject->__toString() : null;

			if ($this->txtType) $this->txtType->Text = $this->objRestaurant->Type;
			if ($this->lblType) $this->lblType->Text = $this->objRestaurant->Type;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC RESTAURANT OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Restaurant instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveRestaurant() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtCountry) $this->objRestaurant->Country = $this->txtCountry->Text;
				if ($this->txtCity) $this->objRestaurant->City = $this->txtCity->Text;
				if ($this->txtAddress) $this->objRestaurant->Address = $this->txtAddress->Text;
				if ($this->txtRestaurantName) $this->objRestaurant->RestaurantName = $this->txtRestaurantName->Text;
				if ($this->txtLongitude) $this->objRestaurant->Longitude = $this->txtLongitude->Text;
				if ($this->txtLatitude) $this->objRestaurant->Latitude = $this->txtLatitude->Text;
				if ($this->txtQrCode) $this->objRestaurant->QrCode = $this->txtQrCode->Text;
				if ($this->txtQtycoins) $this->objRestaurant->Qtycoins = $this->txtQtycoins->Text;
				if ($this->lstIdUserObject) $this->objRestaurant->IdUser = $this->lstIdUserObject->SelectedValue;
				if ($this->txtType) $this->objRestaurant->Type = $this->txtType->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Restaurant object
				$this->objRestaurant->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Restaurant instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteRestaurant() {
			$this->objRestaurant->Delete();
		}



		///////////////////////////////////////////////
		// PUBLIC GETTERS and SETTERS
		///////////////////////////////////////////////

		/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				// General MetaControlVariables
				case 'Restaurant': return $this->objRestaurant;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Restaurant fields -- will be created dynamically if not yet created
				case 'IdRestaurantControl':
					if (!$this->lblIdRestaurant) return $this->lblIdRestaurant_Create();
					return $this->lblIdRestaurant;
				case 'IdRestaurantLabel':
					if (!$this->lblIdRestaurant) return $this->lblIdRestaurant_Create();
					return $this->lblIdRestaurant;
				case 'CountryControl':
					if (!$this->txtCountry) return $this->txtCountry_Create();
					return $this->txtCountry;
				case 'CountryLabel':
					if (!$this->lblCountry) return $this->lblCountry_Create();
					return $this->lblCountry;
				case 'CityControl':
					if (!$this->txtCity) return $this->txtCity_Create();
					return $this->txtCity;
				case 'CityLabel':
					if (!$this->lblCity) return $this->lblCity_Create();
					return $this->lblCity;
				case 'AddressControl':
					if (!$this->txtAddress) return $this->txtAddress_Create();
					return $this->txtAddress;
				case 'AddressLabel':
					if (!$this->lblAddress) return $this->lblAddress_Create();
					return $this->lblAddress;
				case 'RestaurantNameControl':
					if (!$this->txtRestaurantName) return $this->txtRestaurantName_Create();
					return $this->txtRestaurantName;
				case 'RestaurantNameLabel':
					if (!$this->lblRestaurantName) return $this->lblRestaurantName_Create();
					return $this->lblRestaurantName;
				case 'LongitudeControl':
					if (!$this->txtLongitude) return $this->txtLongitude_Create();
					return $this->txtLongitude;
				case 'LongitudeLabel':
					if (!$this->lblLongitude) return $this->lblLongitude_Create();
					return $this->lblLongitude;
				case 'LatitudeControl':
					if (!$this->txtLatitude) return $this->txtLatitude_Create();
					return $this->txtLatitude;
				case 'LatitudeLabel':
					if (!$this->lblLatitude) return $this->lblLatitude_Create();
					return $this->lblLatitude;
				case 'QrCodeControl':
					if (!$this->txtQrCode) return $this->txtQrCode_Create();
					return $this->txtQrCode;
				case 'QrCodeLabel':
					if (!$this->lblQrCode) return $this->lblQrCode_Create();
					return $this->lblQrCode;
				case 'QtycoinsControl':
					if (!$this->txtQtycoins) return $this->txtQtycoins_Create();
					return $this->txtQtycoins;
				case 'QtycoinsLabel':
					if (!$this->lblQtycoins) return $this->lblQtycoins_Create();
					return $this->lblQtycoins;
				case 'IdUserControl':
					if (!$this->lstIdUserObject) return $this->lstIdUserObject_Create();
					return $this->lstIdUserObject;
				case 'IdUserLabel':
					if (!$this->lblIdUser) return $this->lblIdUser_Create();
					return $this->lblIdUser;
				case 'TypeControl':
					if (!$this->txtType) return $this->txtType_Create();
					return $this->txtType;
				case 'TypeLabel':
					if (!$this->lblType) return $this->lblType_Create();
					return $this->lblType;
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Override method to perform a property "Set"
		 * This will set the property $strName to be $mixValue
		 *
		 * @param string $strName Name of the property to set
		 * @param string $mixValue New value of the property
		 * @return mixed
		 */
		public function __set($strName, $mixValue) {
			try {
				switch ($strName) {
					// Controls that point to Restaurant fields
					case 'IdRestaurantControl':
						return ($this->lblIdRestaurant = QType::Cast($mixValue, 'QControl'));
					case 'CountryControl':
						return ($this->txtCountry = QType::Cast($mixValue, 'QControl'));
					case 'CityControl':
						return ($this->txtCity = QType::Cast($mixValue, 'QControl'));
					case 'AddressControl':
						return ($this->txtAddress = QType::Cast($mixValue, 'QControl'));
					case 'RestaurantNameControl':
						return ($this->txtRestaurantName = QType::Cast($mixValue, 'QControl'));
					case 'LongitudeControl':
						return ($this->txtLongitude = QType::Cast($mixValue, 'QControl'));
					case 'LatitudeControl':
						return ($this->txtLatitude = QType::Cast($mixValue, 'QControl'));
					case 'QrCodeControl':
						return ($this->txtQrCode = QType::Cast($mixValue, 'QControl'));
					case 'QtycoinsControl':
						return ($this->txtQtycoins = QType::Cast($mixValue, 'QControl'));
					case 'IdUserControl':
						return ($this->lstIdUserObject = QType::Cast($mixValue, 'QControl'));
					case 'TypeControl':
						return ($this->txtType = QType::Cast($mixValue, 'QControl'));
					default:
						return parent::__set($strName, $mixValue);
				}
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}
	}
?>