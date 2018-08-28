<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the RestaurantCopy1 class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single RestaurantCopy1 object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a RestaurantCopy1MetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 *
	 * @package My QCubed Application
	 * @subpackage MetaControls
	 * @property-read RestaurantCopy1 $RestaurantCopy1 the actual RestaurantCopy1 data class being edited
	 * @property QLabel $IdRestaurantControl
	 * @property-read QLabel $IdRestaurantLabel
	 * @property QTextBox $EmailControl
	 * @property-read QLabel $EmailLabel
	 * @property QTextBox $PasswordControl
	 * @property-read QLabel $PasswordLabel
	 * @property QTextBox $OwnerFirstNameControl
	 * @property-read QLabel $OwnerFirstNameLabel
	 * @property QTextBox $OwnerLastNameControl
	 * @property-read QLabel $OwnerLastNameLabel
	 * @property QTextBox $OwnerMiddleNameControl
	 * @property-read QLabel $OwnerMiddleNameLabel
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
	 * @property QTextBox $QrcodeControl
	 * @property-read QLabel $QrcodeLabel
	 * @property QIntegerTextBox $QtycoinsControl
	 * @property-read QLabel $QtycoinsLabel
	 * @property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * @property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class RestaurantCopy1MetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var RestaurantCopy1 objRestaurantCopy1
		 * @access protected
		 */
		protected $objRestaurantCopy1;
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

		// Controls that allow the editing of RestaurantCopy1's individual data fields
		/**
		 * @var QLabel lblIdRestaurant
		 * @access protected
		 */
		protected $lblIdRestaurant;
		/**
		 * @var QTextBox txtEmail
		 * @access protected
		 */
		protected $txtEmail;
		/**
		 * @var QTextBox txtPassword
		 * @access protected
		 */
		protected $txtPassword;
		/**
		 * @var QTextBox txtOwnerFirstName
		 * @access protected
		 */
		protected $txtOwnerFirstName;
		/**
		 * @var QTextBox txtOwnerLastName
		 * @access protected
		 */
		protected $txtOwnerLastName;
		/**
		 * @var QTextBox txtOwnerMiddleName
		 * @access protected
		 */
		protected $txtOwnerMiddleName;
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
		 * @var QTextBox txtQrcode
		 * @access protected
		 */
		protected $txtQrcode;
		/**
		 * @var QIntegerTextBox txtQtycoins
		 * @access protected
		 */
		protected $txtQtycoins;

		// Controls that allow the viewing of RestaurantCopy1's individual data fields
		/**
		 * @var QLabel lblEmail
		 * @access protected
		 */
		protected $lblEmail;
		/**
		 * @var QLabel lblPassword
		 * @access protected
		 */
		protected $lblPassword;
		/**
		 * @var QLabel lblOwnerFirstName
		 * @access protected
		 */
		protected $lblOwnerFirstName;
		/**
		 * @var QLabel lblOwnerLastName
		 * @access protected
		 */
		protected $lblOwnerLastName;
		/**
		 * @var QLabel lblOwnerMiddleName
		 * @access protected
		 */
		protected $lblOwnerMiddleName;
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
		 * @var QLabel lblQrcode
		 * @access protected
		 */
		protected $lblQrcode;
		/**
		 * @var QLabel lblQtycoins
		 * @access protected
		 */
		protected $lblQtycoins;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * RestaurantCopy1MetaControl to edit a single RestaurantCopy1 object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single RestaurantCopy1 object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RestaurantCopy1MetaControl
		 * @param RestaurantCopy1 $objRestaurantCopy1 new or existing RestaurantCopy1 object
		 */
		 public function __construct($objParentObject, RestaurantCopy1 $objRestaurantCopy1) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this RestaurantCopy1MetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked RestaurantCopy1 object
			$this->objRestaurantCopy1 = $objRestaurantCopy1;

			// Figure out if we're Editing or Creating New
			if ($this->objRestaurantCopy1->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this RestaurantCopy1MetaControl
		 * @param integer $intIdRestaurant primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing RestaurantCopy1 object creation - defaults to CreateOrEdit
 		 * @return RestaurantCopy1MetaControl
		 */
		public static function Create($objParentObject, $intIdRestaurant = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intIdRestaurant)) {
				$objRestaurantCopy1 = RestaurantCopy1::Load($intIdRestaurant);

				// RestaurantCopy1 was found -- return it!
				if ($objRestaurantCopy1)
					return new RestaurantCopy1MetaControl($objParentObject, $objRestaurantCopy1);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a RestaurantCopy1 object with PK arguments: ' . $intIdRestaurant);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new RestaurantCopy1MetaControl($objParentObject, new RestaurantCopy1());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RestaurantCopy1MetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing RestaurantCopy1 object creation - defaults to CreateOrEdit
		 * @return RestaurantCopy1MetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdRestaurant = QApplication::PathInfo(0);
			return RestaurantCopy1MetaControl::Create($objParentObject, $intIdRestaurant, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RestaurantCopy1MetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing RestaurantCopy1 object creation - defaults to CreateOrEdit
		 * @return RestaurantCopy1MetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdRestaurant = QApplication::QueryString('intIdRestaurant');
			return RestaurantCopy1MetaControl::Create($objParentObject, $intIdRestaurant, $intCreateType);
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
				$this->lblIdRestaurant->Text = $this->objRestaurantCopy1->IdRestaurant;
			else
				$this->lblIdRestaurant->Text = 'N/A';
			return $this->lblIdRestaurant;
		}

		/**
		 * Create and setup QTextBox txtEmail
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtEmail_Create($strControlId = null) {
			$this->txtEmail = new QTextBox($this->objParentObject, $strControlId);
			$this->txtEmail->Name = QApplication::Translate('Email');
			$this->txtEmail->Text = $this->objRestaurantCopy1->Email;
			$this->txtEmail->Required = true;
			$this->txtEmail->MaxLength = RestaurantCopy1::EmailMaxLength;
			return $this->txtEmail;
		}

		/**
		 * Create and setup QLabel lblEmail
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblEmail_Create($strControlId = null) {
			$this->lblEmail = new QLabel($this->objParentObject, $strControlId);
			$this->lblEmail->Name = QApplication::Translate('Email');
			$this->lblEmail->Text = $this->objRestaurantCopy1->Email;
			$this->lblEmail->Required = true;
			return $this->lblEmail;
		}

		/**
		 * Create and setup QTextBox txtPassword
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtPassword_Create($strControlId = null) {
			$this->txtPassword = new QTextBox($this->objParentObject, $strControlId);
			$this->txtPassword->Name = QApplication::Translate('Password');
			$this->txtPassword->Text = $this->objRestaurantCopy1->Password;
			$this->txtPassword->Required = true;
			$this->txtPassword->MaxLength = RestaurantCopy1::PasswordMaxLength;
			return $this->txtPassword;
		}

		/**
		 * Create and setup QLabel lblPassword
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPassword_Create($strControlId = null) {
			$this->lblPassword = new QLabel($this->objParentObject, $strControlId);
			$this->lblPassword->Name = QApplication::Translate('Password');
			$this->lblPassword->Text = $this->objRestaurantCopy1->Password;
			$this->lblPassword->Required = true;
			return $this->lblPassword;
		}

		/**
		 * Create and setup QTextBox txtOwnerFirstName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtOwnerFirstName_Create($strControlId = null) {
			$this->txtOwnerFirstName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtOwnerFirstName->Name = QApplication::Translate('Owner First Name');
			$this->txtOwnerFirstName->Text = $this->objRestaurantCopy1->OwnerFirstName;
			$this->txtOwnerFirstName->Required = true;
			$this->txtOwnerFirstName->MaxLength = RestaurantCopy1::OwnerFirstNameMaxLength;
			return $this->txtOwnerFirstName;
		}

		/**
		 * Create and setup QLabel lblOwnerFirstName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblOwnerFirstName_Create($strControlId = null) {
			$this->lblOwnerFirstName = new QLabel($this->objParentObject, $strControlId);
			$this->lblOwnerFirstName->Name = QApplication::Translate('Owner First Name');
			$this->lblOwnerFirstName->Text = $this->objRestaurantCopy1->OwnerFirstName;
			$this->lblOwnerFirstName->Required = true;
			return $this->lblOwnerFirstName;
		}

		/**
		 * Create and setup QTextBox txtOwnerLastName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtOwnerLastName_Create($strControlId = null) {
			$this->txtOwnerLastName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtOwnerLastName->Name = QApplication::Translate('Owner Last Name');
			$this->txtOwnerLastName->Text = $this->objRestaurantCopy1->OwnerLastName;
			$this->txtOwnerLastName->Required = true;
			$this->txtOwnerLastName->MaxLength = RestaurantCopy1::OwnerLastNameMaxLength;
			return $this->txtOwnerLastName;
		}

		/**
		 * Create and setup QLabel lblOwnerLastName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblOwnerLastName_Create($strControlId = null) {
			$this->lblOwnerLastName = new QLabel($this->objParentObject, $strControlId);
			$this->lblOwnerLastName->Name = QApplication::Translate('Owner Last Name');
			$this->lblOwnerLastName->Text = $this->objRestaurantCopy1->OwnerLastName;
			$this->lblOwnerLastName->Required = true;
			return $this->lblOwnerLastName;
		}

		/**
		 * Create and setup QTextBox txtOwnerMiddleName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtOwnerMiddleName_Create($strControlId = null) {
			$this->txtOwnerMiddleName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtOwnerMiddleName->Name = QApplication::Translate('Owner Middle Name');
			$this->txtOwnerMiddleName->Text = $this->objRestaurantCopy1->OwnerMiddleName;
			$this->txtOwnerMiddleName->Required = true;
			$this->txtOwnerMiddleName->MaxLength = RestaurantCopy1::OwnerMiddleNameMaxLength;
			return $this->txtOwnerMiddleName;
		}

		/**
		 * Create and setup QLabel lblOwnerMiddleName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblOwnerMiddleName_Create($strControlId = null) {
			$this->lblOwnerMiddleName = new QLabel($this->objParentObject, $strControlId);
			$this->lblOwnerMiddleName->Name = QApplication::Translate('Owner Middle Name');
			$this->lblOwnerMiddleName->Text = $this->objRestaurantCopy1->OwnerMiddleName;
			$this->lblOwnerMiddleName->Required = true;
			return $this->lblOwnerMiddleName;
		}

		/**
		 * Create and setup QTextBox txtCountry
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtCountry_Create($strControlId = null) {
			$this->txtCountry = new QTextBox($this->objParentObject, $strControlId);
			$this->txtCountry->Name = QApplication::Translate('Country');
			$this->txtCountry->Text = $this->objRestaurantCopy1->Country;
			$this->txtCountry->Required = true;
			$this->txtCountry->MaxLength = RestaurantCopy1::CountryMaxLength;
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
			$this->lblCountry->Text = $this->objRestaurantCopy1->Country;
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
			$this->txtCity->Text = $this->objRestaurantCopy1->City;
			$this->txtCity->Required = true;
			$this->txtCity->MaxLength = RestaurantCopy1::CityMaxLength;
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
			$this->lblCity->Text = $this->objRestaurantCopy1->City;
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
			$this->txtAddress->Text = $this->objRestaurantCopy1->Address;
			$this->txtAddress->Required = true;
			$this->txtAddress->MaxLength = RestaurantCopy1::AddressMaxLength;
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
			$this->lblAddress->Text = $this->objRestaurantCopy1->Address;
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
			$this->txtRestaurantName->Text = $this->objRestaurantCopy1->RestaurantName;
			$this->txtRestaurantName->Required = true;
			$this->txtRestaurantName->MaxLength = RestaurantCopy1::RestaurantNameMaxLength;
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
			$this->lblRestaurantName->Text = $this->objRestaurantCopy1->RestaurantName;
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
			$this->txtLongitude->Text = $this->objRestaurantCopy1->Longitude;
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
			$this->lblLongitude->Text = $this->objRestaurantCopy1->Longitude;
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
			$this->txtLatitude->Text = $this->objRestaurantCopy1->Latitude;
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
			$this->lblLatitude->Text = $this->objRestaurantCopy1->Latitude;
			$this->lblLatitude->Required = true;
			return $this->lblLatitude;
		}

		/**
		 * Create and setup QTextBox txtQrcode
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtQrcode_Create($strControlId = null) {
			$this->txtQrcode = new QTextBox($this->objParentObject, $strControlId);
			$this->txtQrcode->Name = QApplication::Translate('Qrcode');
			$this->txtQrcode->Text = $this->objRestaurantCopy1->Qrcode;
			$this->txtQrcode->Required = true;
			$this->txtQrcode->TextMode = QTextMode::MultiLine;
			return $this->txtQrcode;
		}

		/**
		 * Create and setup QLabel lblQrcode
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblQrcode_Create($strControlId = null) {
			$this->lblQrcode = new QLabel($this->objParentObject, $strControlId);
			$this->lblQrcode->Name = QApplication::Translate('Qrcode');
			$this->lblQrcode->Text = $this->objRestaurantCopy1->Qrcode;
			$this->lblQrcode->Required = true;
			return $this->lblQrcode;
		}

		/**
		 * Create and setup QIntegerTextBox txtQtycoins
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtQtycoins_Create($strControlId = null) {
			$this->txtQtycoins = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtQtycoins->Name = QApplication::Translate('Qtycoins');
			$this->txtQtycoins->Text = $this->objRestaurantCopy1->Qtycoins;
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
			$this->lblQtycoins->Text = $this->objRestaurantCopy1->Qtycoins;
			$this->lblQtycoins->Format = $strFormat;
			return $this->lblQtycoins;
		}



		/**
		 * Refresh this MetaControl with Data from the local RestaurantCopy1 object.
		 * @param boolean $blnReload reload RestaurantCopy1 from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objRestaurantCopy1->Reload();

			if ($this->lblIdRestaurant) if ($this->blnEditMode) $this->lblIdRestaurant->Text = $this->objRestaurantCopy1->IdRestaurant;

			if ($this->txtEmail) $this->txtEmail->Text = $this->objRestaurantCopy1->Email;
			if ($this->lblEmail) $this->lblEmail->Text = $this->objRestaurantCopy1->Email;

			if ($this->txtPassword) $this->txtPassword->Text = $this->objRestaurantCopy1->Password;
			if ($this->lblPassword) $this->lblPassword->Text = $this->objRestaurantCopy1->Password;

			if ($this->txtOwnerFirstName) $this->txtOwnerFirstName->Text = $this->objRestaurantCopy1->OwnerFirstName;
			if ($this->lblOwnerFirstName) $this->lblOwnerFirstName->Text = $this->objRestaurantCopy1->OwnerFirstName;

			if ($this->txtOwnerLastName) $this->txtOwnerLastName->Text = $this->objRestaurantCopy1->OwnerLastName;
			if ($this->lblOwnerLastName) $this->lblOwnerLastName->Text = $this->objRestaurantCopy1->OwnerLastName;

			if ($this->txtOwnerMiddleName) $this->txtOwnerMiddleName->Text = $this->objRestaurantCopy1->OwnerMiddleName;
			if ($this->lblOwnerMiddleName) $this->lblOwnerMiddleName->Text = $this->objRestaurantCopy1->OwnerMiddleName;

			if ($this->txtCountry) $this->txtCountry->Text = $this->objRestaurantCopy1->Country;
			if ($this->lblCountry) $this->lblCountry->Text = $this->objRestaurantCopy1->Country;

			if ($this->txtCity) $this->txtCity->Text = $this->objRestaurantCopy1->City;
			if ($this->lblCity) $this->lblCity->Text = $this->objRestaurantCopy1->City;

			if ($this->txtAddress) $this->txtAddress->Text = $this->objRestaurantCopy1->Address;
			if ($this->lblAddress) $this->lblAddress->Text = $this->objRestaurantCopy1->Address;

			if ($this->txtRestaurantName) $this->txtRestaurantName->Text = $this->objRestaurantCopy1->RestaurantName;
			if ($this->lblRestaurantName) $this->lblRestaurantName->Text = $this->objRestaurantCopy1->RestaurantName;

			if ($this->txtLongitude) $this->txtLongitude->Text = $this->objRestaurantCopy1->Longitude;
			if ($this->lblLongitude) $this->lblLongitude->Text = $this->objRestaurantCopy1->Longitude;

			if ($this->txtLatitude) $this->txtLatitude->Text = $this->objRestaurantCopy1->Latitude;
			if ($this->lblLatitude) $this->lblLatitude->Text = $this->objRestaurantCopy1->Latitude;

			if ($this->txtQrcode) $this->txtQrcode->Text = $this->objRestaurantCopy1->Qrcode;
			if ($this->lblQrcode) $this->lblQrcode->Text = $this->objRestaurantCopy1->Qrcode;

			if ($this->txtQtycoins) $this->txtQtycoins->Text = $this->objRestaurantCopy1->Qtycoins;
			if ($this->lblQtycoins) $this->lblQtycoins->Text = $this->objRestaurantCopy1->Qtycoins;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC RESTAURANTCOPY1 OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's RestaurantCopy1 instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveRestaurantCopy1() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtEmail) $this->objRestaurantCopy1->Email = $this->txtEmail->Text;
				if ($this->txtPassword) $this->objRestaurantCopy1->Password = $this->txtPassword->Text;
				if ($this->txtOwnerFirstName) $this->objRestaurantCopy1->OwnerFirstName = $this->txtOwnerFirstName->Text;
				if ($this->txtOwnerLastName) $this->objRestaurantCopy1->OwnerLastName = $this->txtOwnerLastName->Text;
				if ($this->txtOwnerMiddleName) $this->objRestaurantCopy1->OwnerMiddleName = $this->txtOwnerMiddleName->Text;
				if ($this->txtCountry) $this->objRestaurantCopy1->Country = $this->txtCountry->Text;
				if ($this->txtCity) $this->objRestaurantCopy1->City = $this->txtCity->Text;
				if ($this->txtAddress) $this->objRestaurantCopy1->Address = $this->txtAddress->Text;
				if ($this->txtRestaurantName) $this->objRestaurantCopy1->RestaurantName = $this->txtRestaurantName->Text;
				if ($this->txtLongitude) $this->objRestaurantCopy1->Longitude = $this->txtLongitude->Text;
				if ($this->txtLatitude) $this->objRestaurantCopy1->Latitude = $this->txtLatitude->Text;
				if ($this->txtQrcode) $this->objRestaurantCopy1->Qrcode = $this->txtQrcode->Text;
				if ($this->txtQtycoins) $this->objRestaurantCopy1->Qtycoins = $this->txtQtycoins->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the RestaurantCopy1 object
				$this->objRestaurantCopy1->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's RestaurantCopy1 instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteRestaurantCopy1() {
			$this->objRestaurantCopy1->Delete();
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
				case 'RestaurantCopy1': return $this->objRestaurantCopy1;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to RestaurantCopy1 fields -- will be created dynamically if not yet created
				case 'IdRestaurantControl':
					if (!$this->lblIdRestaurant) return $this->lblIdRestaurant_Create();
					return $this->lblIdRestaurant;
				case 'IdRestaurantLabel':
					if (!$this->lblIdRestaurant) return $this->lblIdRestaurant_Create();
					return $this->lblIdRestaurant;
				case 'EmailControl':
					if (!$this->txtEmail) return $this->txtEmail_Create();
					return $this->txtEmail;
				case 'EmailLabel':
					if (!$this->lblEmail) return $this->lblEmail_Create();
					return $this->lblEmail;
				case 'PasswordControl':
					if (!$this->txtPassword) return $this->txtPassword_Create();
					return $this->txtPassword;
				case 'PasswordLabel':
					if (!$this->lblPassword) return $this->lblPassword_Create();
					return $this->lblPassword;
				case 'OwnerFirstNameControl':
					if (!$this->txtOwnerFirstName) return $this->txtOwnerFirstName_Create();
					return $this->txtOwnerFirstName;
				case 'OwnerFirstNameLabel':
					if (!$this->lblOwnerFirstName) return $this->lblOwnerFirstName_Create();
					return $this->lblOwnerFirstName;
				case 'OwnerLastNameControl':
					if (!$this->txtOwnerLastName) return $this->txtOwnerLastName_Create();
					return $this->txtOwnerLastName;
				case 'OwnerLastNameLabel':
					if (!$this->lblOwnerLastName) return $this->lblOwnerLastName_Create();
					return $this->lblOwnerLastName;
				case 'OwnerMiddleNameControl':
					if (!$this->txtOwnerMiddleName) return $this->txtOwnerMiddleName_Create();
					return $this->txtOwnerMiddleName;
				case 'OwnerMiddleNameLabel':
					if (!$this->lblOwnerMiddleName) return $this->lblOwnerMiddleName_Create();
					return $this->lblOwnerMiddleName;
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
				case 'QrcodeControl':
					if (!$this->txtQrcode) return $this->txtQrcode_Create();
					return $this->txtQrcode;
				case 'QrcodeLabel':
					if (!$this->lblQrcode) return $this->lblQrcode_Create();
					return $this->lblQrcode;
				case 'QtycoinsControl':
					if (!$this->txtQtycoins) return $this->txtQtycoins_Create();
					return $this->txtQtycoins;
				case 'QtycoinsLabel':
					if (!$this->lblQtycoins) return $this->lblQtycoins_Create();
					return $this->lblQtycoins;
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
					// Controls that point to RestaurantCopy1 fields
					case 'IdRestaurantControl':
						return ($this->lblIdRestaurant = QType::Cast($mixValue, 'QControl'));
					case 'EmailControl':
						return ($this->txtEmail = QType::Cast($mixValue, 'QControl'));
					case 'PasswordControl':
						return ($this->txtPassword = QType::Cast($mixValue, 'QControl'));
					case 'OwnerFirstNameControl':
						return ($this->txtOwnerFirstName = QType::Cast($mixValue, 'QControl'));
					case 'OwnerLastNameControl':
						return ($this->txtOwnerLastName = QType::Cast($mixValue, 'QControl'));
					case 'OwnerMiddleNameControl':
						return ($this->txtOwnerMiddleName = QType::Cast($mixValue, 'QControl'));
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
					case 'QrcodeControl':
						return ($this->txtQrcode = QType::Cast($mixValue, 'QControl'));
					case 'QtycoinsControl':
						return ($this->txtQtycoins = QType::Cast($mixValue, 'QControl'));
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