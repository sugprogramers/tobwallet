<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the User class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single User object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a UserMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 *
	 * @package My QCubed Application
	 * @subpackage MetaControls
	 * @property-read User $User the actual User data class being edited
	 * @property QLabel $IdUserControl
	 * @property-read QLabel $IdUserLabel
	 * @property QTextBox $EmailControl
	 * @property-read QLabel $EmailLabel
	 * @property QTextBox $PasswordControl
	 * @property-read QLabel $PasswordLabel
	 * @property QTextBox $FirstNameControl
	 * @property-read QLabel $FirstNameLabel
	 * @property QTextBox $MiddleNameControl
	 * @property-read QLabel $MiddleNameLabel
	 * @property QTextBox $LastNameControl
	 * @property-read QLabel $LastNameLabel
	 * @property QTextBox $CountryControl
	 * @property-read QLabel $CountryLabel
	 * @property QTextBox $CityControl
	 * @property-read QLabel $CityLabel
	 * @property QTextBox $PhoneControl
	 * @property-read QLabel $PhoneLabel
	 * @property QDateTimePicker $BirthdayControl
	 * @property-read QLabel $BirthdayLabel
	 * @property QTextBox $ImagePhotoControl
	 * @property-read QLabel $ImagePhotoLabel
	 * @property QIntegerTextBox $StatusUserControl
	 * @property-read QLabel $StatusUserLabel
	 * @property QTextBox $WalletAddressControl
	 * @property-read QLabel $WalletAddressLabel
	 * @property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * @property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class UserMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var User objUser
		 * @access protected
		 */
		protected $objUser;
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

		// Controls that allow the editing of User's individual data fields
		/**
		 * @var QLabel lblIdUser
		 * @access protected
		 */
		protected $lblIdUser;
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
		 * @var QTextBox txtFirstName
		 * @access protected
		 */
		protected $txtFirstName;
		/**
		 * @var QTextBox txtMiddleName
		 * @access protected
		 */
		protected $txtMiddleName;
		/**
		 * @var QTextBox txtLastName
		 * @access protected
		 */
		protected $txtLastName;
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
		 * @var QTextBox txtPhone
		 * @access protected
		 */
		protected $txtPhone;
		/**
		 * @var QDateTimePicker calBirthday
		 * @access protected
		 */
		protected $calBirthday;
		/**
		 * @var QTextBox txtImagePhoto
		 * @access protected
		 */
		protected $txtImagePhoto;
		/**
		 * @var QIntegerTextBox txtStatusUser
		 * @access protected
		 */
		protected $txtStatusUser;
		/**
		 * @var QTextBox txtWalletAddress
		 * @access protected
		 */
		protected $txtWalletAddress;

		// Controls that allow the viewing of User's individual data fields
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
		 * @var QLabel lblFirstName
		 * @access protected
		 */
		protected $lblFirstName;
		/**
		 * @var QLabel lblMiddleName
		 * @access protected
		 */
		protected $lblMiddleName;
		/**
		 * @var QLabel lblLastName
		 * @access protected
		 */
		protected $lblLastName;
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
		 * @var QLabel lblPhone
		 * @access protected
		 */
		protected $lblPhone;
		/**
		 * @var QLabel lblBirthday
		 * @access protected
		 */
		protected $lblBirthday;
		/**
		 * @var QLabel lblImagePhoto
		 * @access protected
		 */
		protected $lblImagePhoto;
		/**
		 * @var QLabel lblStatusUser
		 * @access protected
		 */
		protected $lblStatusUser;
		/**
		 * @var QLabel lblWalletAddress
		 * @access protected
		 */
		protected $lblWalletAddress;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * UserMetaControl to edit a single User object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single User object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this UserMetaControl
		 * @param User $objUser new or existing User object
		 */
		 public function __construct($objParentObject, User $objUser) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this UserMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked User object
			$this->objUser = $objUser;

			// Figure out if we're Editing or Creating New
			if ($this->objUser->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this UserMetaControl
		 * @param integer $intIdUser primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing User object creation - defaults to CreateOrEdit
 		 * @return UserMetaControl
		 */
		public static function Create($objParentObject, $intIdUser = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intIdUser)) {
				$objUser = User::Load($intIdUser);

				// User was found -- return it!
				if ($objUser)
					return new UserMetaControl($objParentObject, $objUser);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a User object with PK arguments: ' . $intIdUser);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new UserMetaControl($objParentObject, new User());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this UserMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing User object creation - defaults to CreateOrEdit
		 * @return UserMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdUser = QApplication::PathInfo(0);
			return UserMetaControl::Create($objParentObject, $intIdUser, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this UserMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing User object creation - defaults to CreateOrEdit
		 * @return UserMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdUser = QApplication::QueryString('intIdUser');
			return UserMetaControl::Create($objParentObject, $intIdUser, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblIdUser
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIdUser_Create($strControlId = null) {
			$this->lblIdUser = new QLabel($this->objParentObject, $strControlId);
			$this->lblIdUser->Name = QApplication::Translate('Id User');
			if ($this->blnEditMode)
				$this->lblIdUser->Text = $this->objUser->IdUser;
			else
				$this->lblIdUser->Text = 'N/A';
			return $this->lblIdUser;
		}

		/**
		 * Create and setup QTextBox txtEmail
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtEmail_Create($strControlId = null) {
			$this->txtEmail = new QTextBox($this->objParentObject, $strControlId);
			$this->txtEmail->Name = QApplication::Translate('Email');
			$this->txtEmail->Text = $this->objUser->Email;
			$this->txtEmail->Required = true;
			$this->txtEmail->MaxLength = User::EmailMaxLength;
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
			$this->lblEmail->Text = $this->objUser->Email;
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
			$this->txtPassword->Text = $this->objUser->Password;
			$this->txtPassword->Required = true;
			$this->txtPassword->MaxLength = User::PasswordMaxLength;
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
			$this->lblPassword->Text = $this->objUser->Password;
			$this->lblPassword->Required = true;
			return $this->lblPassword;
		}

		/**
		 * Create and setup QTextBox txtFirstName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtFirstName_Create($strControlId = null) {
			$this->txtFirstName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtFirstName->Name = QApplication::Translate('First Name');
			$this->txtFirstName->Text = $this->objUser->FirstName;
			$this->txtFirstName->Required = true;
			$this->txtFirstName->MaxLength = User::FirstNameMaxLength;
			return $this->txtFirstName;
		}

		/**
		 * Create and setup QLabel lblFirstName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFirstName_Create($strControlId = null) {
			$this->lblFirstName = new QLabel($this->objParentObject, $strControlId);
			$this->lblFirstName->Name = QApplication::Translate('First Name');
			$this->lblFirstName->Text = $this->objUser->FirstName;
			$this->lblFirstName->Required = true;
			return $this->lblFirstName;
		}

		/**
		 * Create and setup QTextBox txtMiddleName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtMiddleName_Create($strControlId = null) {
			$this->txtMiddleName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtMiddleName->Name = QApplication::Translate('Middle Name');
			$this->txtMiddleName->Text = $this->objUser->MiddleName;
			$this->txtMiddleName->Required = true;
			$this->txtMiddleName->MaxLength = User::MiddleNameMaxLength;
			return $this->txtMiddleName;
		}

		/**
		 * Create and setup QLabel lblMiddleName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblMiddleName_Create($strControlId = null) {
			$this->lblMiddleName = new QLabel($this->objParentObject, $strControlId);
			$this->lblMiddleName->Name = QApplication::Translate('Middle Name');
			$this->lblMiddleName->Text = $this->objUser->MiddleName;
			$this->lblMiddleName->Required = true;
			return $this->lblMiddleName;
		}

		/**
		 * Create and setup QTextBox txtLastName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtLastName_Create($strControlId = null) {
			$this->txtLastName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtLastName->Name = QApplication::Translate('Last Name');
			$this->txtLastName->Text = $this->objUser->LastName;
			$this->txtLastName->Required = true;
			$this->txtLastName->MaxLength = User::LastNameMaxLength;
			return $this->txtLastName;
		}

		/**
		 * Create and setup QLabel lblLastName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLastName_Create($strControlId = null) {
			$this->lblLastName = new QLabel($this->objParentObject, $strControlId);
			$this->lblLastName->Name = QApplication::Translate('Last Name');
			$this->lblLastName->Text = $this->objUser->LastName;
			$this->lblLastName->Required = true;
			return $this->lblLastName;
		}

		/**
		 * Create and setup QTextBox txtCountry
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtCountry_Create($strControlId = null) {
			$this->txtCountry = new QTextBox($this->objParentObject, $strControlId);
			$this->txtCountry->Name = QApplication::Translate('Country');
			$this->txtCountry->Text = $this->objUser->Country;
			$this->txtCountry->Required = true;
			$this->txtCountry->MaxLength = User::CountryMaxLength;
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
			$this->lblCountry->Text = $this->objUser->Country;
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
			$this->txtCity->Text = $this->objUser->City;
			$this->txtCity->Required = true;
			$this->txtCity->MaxLength = User::CityMaxLength;
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
			$this->lblCity->Text = $this->objUser->City;
			$this->lblCity->Required = true;
			return $this->lblCity;
		}

		/**
		 * Create and setup QTextBox txtPhone
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtPhone_Create($strControlId = null) {
			$this->txtPhone = new QTextBox($this->objParentObject, $strControlId);
			$this->txtPhone->Name = QApplication::Translate('Phone');
			$this->txtPhone->Text = $this->objUser->Phone;
			$this->txtPhone->Required = true;
			$this->txtPhone->MaxLength = User::PhoneMaxLength;
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
			$this->lblPhone->Text = $this->objUser->Phone;
			$this->lblPhone->Required = true;
			return $this->lblPhone;
		}

		/**
		 * Create and setup QDateTimePicker calBirthday
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calBirthday_Create($strControlId = null) {
			$this->calBirthday = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calBirthday->Name = QApplication::Translate('Birthday');
			$this->calBirthday->DateTime = $this->objUser->Birthday;
			$this->calBirthday->DateTimePickerType = QDateTimePickerType::DateTime;
			return $this->calBirthday;
		}

		/**
		 * Create and setup QLabel lblBirthday
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblBirthday_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblBirthday = new QLabel($this->objParentObject, $strControlId);
			$this->lblBirthday->Name = QApplication::Translate('Birthday');
			$this->strBirthdayDateTimeFormat = $strDateTimeFormat;
			$this->lblBirthday->Text = sprintf($this->objUser->Birthday) ? $this->objUser->Birthday->qFormat($this->strBirthdayDateTimeFormat) : null;
			return $this->lblBirthday;
		}

		protected $strBirthdayDateTimeFormat;


		/**
		 * Create and setup QTextBox txtImagePhoto
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtImagePhoto_Create($strControlId = null) {
			$this->txtImagePhoto = new QTextBox($this->objParentObject, $strControlId);
			$this->txtImagePhoto->Name = QApplication::Translate('Image Photo');
			$this->txtImagePhoto->Text = $this->objUser->ImagePhoto;
			$this->txtImagePhoto->MaxLength = User::ImagePhotoMaxLength;
			return $this->txtImagePhoto;
		}

		/**
		 * Create and setup QLabel lblImagePhoto
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblImagePhoto_Create($strControlId = null) {
			$this->lblImagePhoto = new QLabel($this->objParentObject, $strControlId);
			$this->lblImagePhoto->Name = QApplication::Translate('Image Photo');
			$this->lblImagePhoto->Text = $this->objUser->ImagePhoto;
			return $this->lblImagePhoto;
		}

		/**
		 * Create and setup QIntegerTextBox txtStatusUser
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtStatusUser_Create($strControlId = null) {
			$this->txtStatusUser = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtStatusUser->Name = QApplication::Translate('Status User');
			$this->txtStatusUser->Text = $this->objUser->StatusUser;
			$this->txtStatusUser->Required = true;
			return $this->txtStatusUser;
		}

		/**
		 * Create and setup QLabel lblStatusUser
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblStatusUser_Create($strControlId = null, $strFormat = null) {
			$this->lblStatusUser = new QLabel($this->objParentObject, $strControlId);
			$this->lblStatusUser->Name = QApplication::Translate('Status User');
			$this->lblStatusUser->Text = $this->objUser->StatusUser;
			$this->lblStatusUser->Required = true;
			$this->lblStatusUser->Format = $strFormat;
			return $this->lblStatusUser;
		}

		/**
		 * Create and setup QTextBox txtWalletAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtWalletAddress_Create($strControlId = null) {
			$this->txtWalletAddress = new QTextBox($this->objParentObject, $strControlId);
			$this->txtWalletAddress->Name = QApplication::Translate('Wallet Address');
			$this->txtWalletAddress->Text = $this->objUser->WalletAddress;
			$this->txtWalletAddress->MaxLength = User::WalletAddressMaxLength;
			return $this->txtWalletAddress;
		}

		/**
		 * Create and setup QLabel lblWalletAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblWalletAddress_Create($strControlId = null) {
			$this->lblWalletAddress = new QLabel($this->objParentObject, $strControlId);
			$this->lblWalletAddress->Name = QApplication::Translate('Wallet Address');
			$this->lblWalletAddress->Text = $this->objUser->WalletAddress;
			return $this->lblWalletAddress;
		}



		/**
		 * Refresh this MetaControl with Data from the local User object.
		 * @param boolean $blnReload reload User from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objUser->Reload();

			if ($this->lblIdUser) if ($this->blnEditMode) $this->lblIdUser->Text = $this->objUser->IdUser;

			if ($this->txtEmail) $this->txtEmail->Text = $this->objUser->Email;
			if ($this->lblEmail) $this->lblEmail->Text = $this->objUser->Email;

			if ($this->txtPassword) $this->txtPassword->Text = $this->objUser->Password;
			if ($this->lblPassword) $this->lblPassword->Text = $this->objUser->Password;

			if ($this->txtFirstName) $this->txtFirstName->Text = $this->objUser->FirstName;
			if ($this->lblFirstName) $this->lblFirstName->Text = $this->objUser->FirstName;

			if ($this->txtMiddleName) $this->txtMiddleName->Text = $this->objUser->MiddleName;
			if ($this->lblMiddleName) $this->lblMiddleName->Text = $this->objUser->MiddleName;

			if ($this->txtLastName) $this->txtLastName->Text = $this->objUser->LastName;
			if ($this->lblLastName) $this->lblLastName->Text = $this->objUser->LastName;

			if ($this->txtCountry) $this->txtCountry->Text = $this->objUser->Country;
			if ($this->lblCountry) $this->lblCountry->Text = $this->objUser->Country;

			if ($this->txtCity) $this->txtCity->Text = $this->objUser->City;
			if ($this->lblCity) $this->lblCity->Text = $this->objUser->City;

			if ($this->txtPhone) $this->txtPhone->Text = $this->objUser->Phone;
			if ($this->lblPhone) $this->lblPhone->Text = $this->objUser->Phone;

			if ($this->calBirthday) $this->calBirthday->DateTime = $this->objUser->Birthday;
			if ($this->lblBirthday) $this->lblBirthday->Text = sprintf($this->objUser->Birthday) ? $this->objUser->Birthday->qFormat($this->strBirthdayDateTimeFormat) : null;

			if ($this->txtImagePhoto) $this->txtImagePhoto->Text = $this->objUser->ImagePhoto;
			if ($this->lblImagePhoto) $this->lblImagePhoto->Text = $this->objUser->ImagePhoto;

			if ($this->txtStatusUser) $this->txtStatusUser->Text = $this->objUser->StatusUser;
			if ($this->lblStatusUser) $this->lblStatusUser->Text = $this->objUser->StatusUser;

			if ($this->txtWalletAddress) $this->txtWalletAddress->Text = $this->objUser->WalletAddress;
			if ($this->lblWalletAddress) $this->lblWalletAddress->Text = $this->objUser->WalletAddress;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC USER OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's User instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveUser() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtEmail) $this->objUser->Email = $this->txtEmail->Text;
				if ($this->txtPassword) $this->objUser->Password = $this->txtPassword->Text;
				if ($this->txtFirstName) $this->objUser->FirstName = $this->txtFirstName->Text;
				if ($this->txtMiddleName) $this->objUser->MiddleName = $this->txtMiddleName->Text;
				if ($this->txtLastName) $this->objUser->LastName = $this->txtLastName->Text;
				if ($this->txtCountry) $this->objUser->Country = $this->txtCountry->Text;
				if ($this->txtCity) $this->objUser->City = $this->txtCity->Text;
				if ($this->txtPhone) $this->objUser->Phone = $this->txtPhone->Text;
				if ($this->calBirthday) $this->objUser->Birthday = $this->calBirthday->DateTime;
				if ($this->txtImagePhoto) $this->objUser->ImagePhoto = $this->txtImagePhoto->Text;
				if ($this->txtStatusUser) $this->objUser->StatusUser = $this->txtStatusUser->Text;
				if ($this->txtWalletAddress) $this->objUser->WalletAddress = $this->txtWalletAddress->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the User object
				$this->objUser->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's User instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteUser() {
			$this->objUser->Delete();
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
				case 'User': return $this->objUser;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to User fields -- will be created dynamically if not yet created
				case 'IdUserControl':
					if (!$this->lblIdUser) return $this->lblIdUser_Create();
					return $this->lblIdUser;
				case 'IdUserLabel':
					if (!$this->lblIdUser) return $this->lblIdUser_Create();
					return $this->lblIdUser;
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
				case 'FirstNameControl':
					if (!$this->txtFirstName) return $this->txtFirstName_Create();
					return $this->txtFirstName;
				case 'FirstNameLabel':
					if (!$this->lblFirstName) return $this->lblFirstName_Create();
					return $this->lblFirstName;
				case 'MiddleNameControl':
					if (!$this->txtMiddleName) return $this->txtMiddleName_Create();
					return $this->txtMiddleName;
				case 'MiddleNameLabel':
					if (!$this->lblMiddleName) return $this->lblMiddleName_Create();
					return $this->lblMiddleName;
				case 'LastNameControl':
					if (!$this->txtLastName) return $this->txtLastName_Create();
					return $this->txtLastName;
				case 'LastNameLabel':
					if (!$this->lblLastName) return $this->lblLastName_Create();
					return $this->lblLastName;
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
				case 'PhoneControl':
					if (!$this->txtPhone) return $this->txtPhone_Create();
					return $this->txtPhone;
				case 'PhoneLabel':
					if (!$this->lblPhone) return $this->lblPhone_Create();
					return $this->lblPhone;
				case 'BirthdayControl':
					if (!$this->calBirthday) return $this->calBirthday_Create();
					return $this->calBirthday;
				case 'BirthdayLabel':
					if (!$this->lblBirthday) return $this->lblBirthday_Create();
					return $this->lblBirthday;
				case 'ImagePhotoControl':
					if (!$this->txtImagePhoto) return $this->txtImagePhoto_Create();
					return $this->txtImagePhoto;
				case 'ImagePhotoLabel':
					if (!$this->lblImagePhoto) return $this->lblImagePhoto_Create();
					return $this->lblImagePhoto;
				case 'StatusUserControl':
					if (!$this->txtStatusUser) return $this->txtStatusUser_Create();
					return $this->txtStatusUser;
				case 'StatusUserLabel':
					if (!$this->lblStatusUser) return $this->lblStatusUser_Create();
					return $this->lblStatusUser;
				case 'WalletAddressControl':
					if (!$this->txtWalletAddress) return $this->txtWalletAddress_Create();
					return $this->txtWalletAddress;
				case 'WalletAddressLabel':
					if (!$this->lblWalletAddress) return $this->lblWalletAddress_Create();
					return $this->lblWalletAddress;
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
					// Controls that point to User fields
					case 'IdUserControl':
						return ($this->lblIdUser = QType::Cast($mixValue, 'QControl'));
					case 'EmailControl':
						return ($this->txtEmail = QType::Cast($mixValue, 'QControl'));
					case 'PasswordControl':
						return ($this->txtPassword = QType::Cast($mixValue, 'QControl'));
					case 'FirstNameControl':
						return ($this->txtFirstName = QType::Cast($mixValue, 'QControl'));
					case 'MiddleNameControl':
						return ($this->txtMiddleName = QType::Cast($mixValue, 'QControl'));
					case 'LastNameControl':
						return ($this->txtLastName = QType::Cast($mixValue, 'QControl'));
					case 'CountryControl':
						return ($this->txtCountry = QType::Cast($mixValue, 'QControl'));
					case 'CityControl':
						return ($this->txtCity = QType::Cast($mixValue, 'QControl'));
					case 'PhoneControl':
						return ($this->txtPhone = QType::Cast($mixValue, 'QControl'));
					case 'BirthdayControl':
						return ($this->calBirthday = QType::Cast($mixValue, 'QControl'));
					case 'ImagePhotoControl':
						return ($this->txtImagePhoto = QType::Cast($mixValue, 'QControl'));
					case 'StatusUserControl':
						return ($this->txtStatusUser = QType::Cast($mixValue, 'QControl'));
					case 'WalletAddressControl':
						return ($this->txtWalletAddress = QType::Cast($mixValue, 'QControl'));
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