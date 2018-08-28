<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Organization class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Organization object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a OrganizationMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 *
	 * @package My QCubed Application
	 * @subpackage MetaControls
	 * @property-read Organization $Organization the actual Organization data class being edited
	 * @property QLabel $IdOrganizationControl
	 * @property-read QLabel $IdOrganizationLabel
	 * @property QTextBox $NameControl
	 * @property-read QLabel $NameLabel
	 * @property QTextBox $PhoneControl
	 * @property-read QLabel $PhoneLabel
	 * @property QTextBox $QrCodeControl
	 * @property-read QLabel $QrCodeLabel
	 * @property QTextBox $OrganizationImageControl
	 * @property-read QLabel $OrganizationImageLabel
	 * @property QTextBox $LatitudeControl
	 * @property-read QLabel $LatitudeLabel
	 * @property QTextBox $LongitudeControl
	 * @property-read QLabel $LongitudeLabel
	 * @property QTextBox $CountryControl
	 * @property-read QLabel $CountryLabel
	 * @property QTextBox $CityControl
	 * @property-read QLabel $CityLabel
	 * @property QTextBox $AddressControl
	 * @property-read QLabel $AddressLabel
	 * @property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * @property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class OrganizationMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Organization objOrganization
		 * @access protected
		 */
		protected $objOrganization;
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

		// Controls that allow the editing of Organization's individual data fields
		/**
		 * @var QLabel lblIdOrganization
		 * @access protected
		 */
		protected $lblIdOrganization;
		/**
		 * @var QTextBox txtName
		 * @access protected
		 */
		protected $txtName;
		/**
		 * @var QTextBox txtPhone
		 * @access protected
		 */
		protected $txtPhone;
		/**
		 * @var QTextBox txtQrCode
		 * @access protected
		 */
		protected $txtQrCode;
		/**
		 * @var QTextBox txtOrganizationImage
		 * @access protected
		 */
		protected $txtOrganizationImage;
		/**
		 * @var QTextBox txtLatitude
		 * @access protected
		 */
		protected $txtLatitude;
		/**
		 * @var QTextBox txtLongitude
		 * @access protected
		 */
		protected $txtLongitude;
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

		// Controls that allow the viewing of Organization's individual data fields
		/**
		 * @var QLabel lblName
		 * @access protected
		 */
		protected $lblName;
		/**
		 * @var QLabel lblPhone
		 * @access protected
		 */
		protected $lblPhone;
		/**
		 * @var QLabel lblQrCode
		 * @access protected
		 */
		protected $lblQrCode;
		/**
		 * @var QLabel lblOrganizationImage
		 * @access protected
		 */
		protected $lblOrganizationImage;
		/**
		 * @var QLabel lblLatitude
		 * @access protected
		 */
		protected $lblLatitude;
		/**
		 * @var QLabel lblLongitude
		 * @access protected
		 */
		protected $lblLongitude;
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

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * OrganizationMetaControl to edit a single Organization object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Organization object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this OrganizationMetaControl
		 * @param Organization $objOrganization new or existing Organization object
		 */
		 public function __construct($objParentObject, Organization $objOrganization) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this OrganizationMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Organization object
			$this->objOrganization = $objOrganization;

			// Figure out if we're Editing or Creating New
			if ($this->objOrganization->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this OrganizationMetaControl
		 * @param integer $intIdOrganization primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Organization object creation - defaults to CreateOrEdit
 		 * @return OrganizationMetaControl
		 */
		public static function Create($objParentObject, $intIdOrganization = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intIdOrganization)) {
				$objOrganization = Organization::Load($intIdOrganization);

				// Organization was found -- return it!
				if ($objOrganization)
					return new OrganizationMetaControl($objParentObject, $objOrganization);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Organization object with PK arguments: ' . $intIdOrganization);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new OrganizationMetaControl($objParentObject, new Organization());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this OrganizationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Organization object creation - defaults to CreateOrEdit
		 * @return OrganizationMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdOrganization = QApplication::PathInfo(0);
			return OrganizationMetaControl::Create($objParentObject, $intIdOrganization, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this OrganizationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Organization object creation - defaults to CreateOrEdit
		 * @return OrganizationMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdOrganization = QApplication::QueryString('intIdOrganization');
			return OrganizationMetaControl::Create($objParentObject, $intIdOrganization, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblIdOrganization
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIdOrganization_Create($strControlId = null) {
			$this->lblIdOrganization = new QLabel($this->objParentObject, $strControlId);
			$this->lblIdOrganization->Name = QApplication::Translate('Id Organization');
			if ($this->blnEditMode)
				$this->lblIdOrganization->Text = $this->objOrganization->IdOrganization;
			else
				$this->lblIdOrganization->Text = 'N/A';
			return $this->lblIdOrganization;
		}

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objOrganization->Name;
			$this->txtName->Required = true;
			$this->txtName->MaxLength = Organization::NameMaxLength;
			return $this->txtName;
		}

		/**
		 * Create and setup QLabel lblName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblName_Create($strControlId = null) {
			$this->lblName = new QLabel($this->objParentObject, $strControlId);
			$this->lblName->Name = QApplication::Translate('Name');
			$this->lblName->Text = $this->objOrganization->Name;
			$this->lblName->Required = true;
			return $this->lblName;
		}

		/**
		 * Create and setup QTextBox txtPhone
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtPhone_Create($strControlId = null) {
			$this->txtPhone = new QTextBox($this->objParentObject, $strControlId);
			$this->txtPhone->Name = QApplication::Translate('Phone');
			$this->txtPhone->Text = $this->objOrganization->Phone;
			$this->txtPhone->MaxLength = Organization::PhoneMaxLength;
			return $this->txtPhone;
		}

		/**
		 * Create and setup QLabel lblPhone
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPhone_Create($strControlId = null) {
			$this->lblPhone = new QLabel($this->objParentObject, $strControlId);
			$this->lblPhone->Name = QApplication::Translate('Phone');
			$this->lblPhone->Text = $this->objOrganization->Phone;
			return $this->lblPhone;
		}

		/**
		 * Create and setup QTextBox txtQrCode
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtQrCode_Create($strControlId = null) {
			$this->txtQrCode = new QTextBox($this->objParentObject, $strControlId);
			$this->txtQrCode->Name = QApplication::Translate('Qr Code');
			$this->txtQrCode->Text = $this->objOrganization->QrCode;
			$this->txtQrCode->MaxLength = Organization::QrCodeMaxLength;
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
			$this->lblQrCode->Text = $this->objOrganization->QrCode;
			return $this->lblQrCode;
		}

		/**
		 * Create and setup QTextBox txtOrganizationImage
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtOrganizationImage_Create($strControlId = null) {
			$this->txtOrganizationImage = new QTextBox($this->objParentObject, $strControlId);
			$this->txtOrganizationImage->Name = QApplication::Translate('Organization Image');
			$this->txtOrganizationImage->Text = $this->objOrganization->OrganizationImage;
			$this->txtOrganizationImage->MaxLength = Organization::OrganizationImageMaxLength;
			return $this->txtOrganizationImage;
		}

		/**
		 * Create and setup QLabel lblOrganizationImage
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblOrganizationImage_Create($strControlId = null) {
			$this->lblOrganizationImage = new QLabel($this->objParentObject, $strControlId);
			$this->lblOrganizationImage->Name = QApplication::Translate('Organization Image');
			$this->lblOrganizationImage->Text = $this->objOrganization->OrganizationImage;
			return $this->lblOrganizationImage;
		}

		/**
		 * Create and setup QTextBox txtLatitude
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtLatitude_Create($strControlId = null) {
			$this->txtLatitude = new QTextBox($this->objParentObject, $strControlId);
			$this->txtLatitude->Name = QApplication::Translate('Latitude');
			$this->txtLatitude->Text = $this->objOrganization->Latitude;
			$this->txtLatitude->Required = true;
			$this->txtLatitude->MaxLength = Organization::LatitudeMaxLength;
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
			$this->lblLatitude->Text = $this->objOrganization->Latitude;
			$this->lblLatitude->Required = true;
			return $this->lblLatitude;
		}

		/**
		 * Create and setup QTextBox txtLongitude
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtLongitude_Create($strControlId = null) {
			$this->txtLongitude = new QTextBox($this->objParentObject, $strControlId);
			$this->txtLongitude->Name = QApplication::Translate('Longitude');
			$this->txtLongitude->Text = $this->objOrganization->Longitude;
			$this->txtLongitude->Required = true;
			$this->txtLongitude->MaxLength = Organization::LongitudeMaxLength;
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
			$this->lblLongitude->Text = $this->objOrganization->Longitude;
			$this->lblLongitude->Required = true;
			return $this->lblLongitude;
		}

		/**
		 * Create and setup QTextBox txtCountry
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtCountry_Create($strControlId = null) {
			$this->txtCountry = new QTextBox($this->objParentObject, $strControlId);
			$this->txtCountry->Name = QApplication::Translate('Country');
			$this->txtCountry->Text = $this->objOrganization->Country;
			$this->txtCountry->MaxLength = Organization::CountryMaxLength;
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
			$this->lblCountry->Text = $this->objOrganization->Country;
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
			$this->txtCity->Text = $this->objOrganization->City;
			$this->txtCity->MaxLength = Organization::CityMaxLength;
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
			$this->lblCity->Text = $this->objOrganization->City;
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
			$this->txtAddress->Text = $this->objOrganization->Address;
			$this->txtAddress->MaxLength = Organization::AddressMaxLength;
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
			$this->lblAddress->Text = $this->objOrganization->Address;
			return $this->lblAddress;
		}



		/**
		 * Refresh this MetaControl with Data from the local Organization object.
		 * @param boolean $blnReload reload Organization from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objOrganization->Reload();

			if ($this->lblIdOrganization) if ($this->blnEditMode) $this->lblIdOrganization->Text = $this->objOrganization->IdOrganization;

			if ($this->txtName) $this->txtName->Text = $this->objOrganization->Name;
			if ($this->lblName) $this->lblName->Text = $this->objOrganization->Name;

			if ($this->txtPhone) $this->txtPhone->Text = $this->objOrganization->Phone;
			if ($this->lblPhone) $this->lblPhone->Text = $this->objOrganization->Phone;

			if ($this->txtQrCode) $this->txtQrCode->Text = $this->objOrganization->QrCode;
			if ($this->lblQrCode) $this->lblQrCode->Text = $this->objOrganization->QrCode;

			if ($this->txtOrganizationImage) $this->txtOrganizationImage->Text = $this->objOrganization->OrganizationImage;
			if ($this->lblOrganizationImage) $this->lblOrganizationImage->Text = $this->objOrganization->OrganizationImage;

			if ($this->txtLatitude) $this->txtLatitude->Text = $this->objOrganization->Latitude;
			if ($this->lblLatitude) $this->lblLatitude->Text = $this->objOrganization->Latitude;

			if ($this->txtLongitude) $this->txtLongitude->Text = $this->objOrganization->Longitude;
			if ($this->lblLongitude) $this->lblLongitude->Text = $this->objOrganization->Longitude;

			if ($this->txtCountry) $this->txtCountry->Text = $this->objOrganization->Country;
			if ($this->lblCountry) $this->lblCountry->Text = $this->objOrganization->Country;

			if ($this->txtCity) $this->txtCity->Text = $this->objOrganization->City;
			if ($this->lblCity) $this->lblCity->Text = $this->objOrganization->City;

			if ($this->txtAddress) $this->txtAddress->Text = $this->objOrganization->Address;
			if ($this->lblAddress) $this->lblAddress->Text = $this->objOrganization->Address;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ORGANIZATION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Organization instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveOrganization() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtName) $this->objOrganization->Name = $this->txtName->Text;
				if ($this->txtPhone) $this->objOrganization->Phone = $this->txtPhone->Text;
				if ($this->txtQrCode) $this->objOrganization->QrCode = $this->txtQrCode->Text;
				if ($this->txtOrganizationImage) $this->objOrganization->OrganizationImage = $this->txtOrganizationImage->Text;
				if ($this->txtLatitude) $this->objOrganization->Latitude = $this->txtLatitude->Text;
				if ($this->txtLongitude) $this->objOrganization->Longitude = $this->txtLongitude->Text;
				if ($this->txtCountry) $this->objOrganization->Country = $this->txtCountry->Text;
				if ($this->txtCity) $this->objOrganization->City = $this->txtCity->Text;
				if ($this->txtAddress) $this->objOrganization->Address = $this->txtAddress->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Organization object
				$this->objOrganization->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Organization instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteOrganization() {
			$this->objOrganization->Delete();
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
				case 'Organization': return $this->objOrganization;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Organization fields -- will be created dynamically if not yet created
				case 'IdOrganizationControl':
					if (!$this->lblIdOrganization) return $this->lblIdOrganization_Create();
					return $this->lblIdOrganization;
				case 'IdOrganizationLabel':
					if (!$this->lblIdOrganization) return $this->lblIdOrganization_Create();
					return $this->lblIdOrganization;
				case 'NameControl':
					if (!$this->txtName) return $this->txtName_Create();
					return $this->txtName;
				case 'NameLabel':
					if (!$this->lblName) return $this->lblName_Create();
					return $this->lblName;
				case 'PhoneControl':
					if (!$this->txtPhone) return $this->txtPhone_Create();
					return $this->txtPhone;
				case 'PhoneLabel':
					if (!$this->lblPhone) return $this->lblPhone_Create();
					return $this->lblPhone;
				case 'QrCodeControl':
					if (!$this->txtQrCode) return $this->txtQrCode_Create();
					return $this->txtQrCode;
				case 'QrCodeLabel':
					if (!$this->lblQrCode) return $this->lblQrCode_Create();
					return $this->lblQrCode;
				case 'OrganizationImageControl':
					if (!$this->txtOrganizationImage) return $this->txtOrganizationImage_Create();
					return $this->txtOrganizationImage;
				case 'OrganizationImageLabel':
					if (!$this->lblOrganizationImage) return $this->lblOrganizationImage_Create();
					return $this->lblOrganizationImage;
				case 'LatitudeControl':
					if (!$this->txtLatitude) return $this->txtLatitude_Create();
					return $this->txtLatitude;
				case 'LatitudeLabel':
					if (!$this->lblLatitude) return $this->lblLatitude_Create();
					return $this->lblLatitude;
				case 'LongitudeControl':
					if (!$this->txtLongitude) return $this->txtLongitude_Create();
					return $this->txtLongitude;
				case 'LongitudeLabel':
					if (!$this->lblLongitude) return $this->lblLongitude_Create();
					return $this->lblLongitude;
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
					// Controls that point to Organization fields
					case 'IdOrganizationControl':
						return ($this->lblIdOrganization = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'PhoneControl':
						return ($this->txtPhone = QType::Cast($mixValue, 'QControl'));
					case 'QrCodeControl':
						return ($this->txtQrCode = QType::Cast($mixValue, 'QControl'));
					case 'OrganizationImageControl':
						return ($this->txtOrganizationImage = QType::Cast($mixValue, 'QControl'));
					case 'LatitudeControl':
						return ($this->txtLatitude = QType::Cast($mixValue, 'QControl'));
					case 'LongitudeControl':
						return ($this->txtLongitude = QType::Cast($mixValue, 'QControl'));
					case 'CountryControl':
						return ($this->txtCountry = QType::Cast($mixValue, 'QControl'));
					case 'CityControl':
						return ($this->txtCity = QType::Cast($mixValue, 'QControl'));
					case 'AddressControl':
						return ($this->txtAddress = QType::Cast($mixValue, 'QControl'));
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