<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Organizationtype class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Organizationtype object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a OrganizationtypeMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 *
	 * @package My QCubed Application
	 * @subpackage MetaControls
	 * @property-read Organizationtype $Organizationtype the actual Organizationtype data class being edited
	 * @property QLabel $IdOrganizationTypeControl
	 * @property-read QLabel $IdOrganizationTypeLabel
	 * @property QTextBox $NameControl
	 * @property-read QLabel $NameLabel
	 * @property QTextBox $DescriptionControl
	 * @property-read QLabel $DescriptionLabel
	 * @property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * @property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class OrganizationtypeMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Organizationtype objOrganizationtype
		 * @access protected
		 */
		protected $objOrganizationtype;
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

		// Controls that allow the editing of Organizationtype's individual data fields
		/**
		 * @var QLabel lblIdOrganizationType
		 * @access protected
		 */
		protected $lblIdOrganizationType;
		/**
		 * @var QTextBox txtName
		 * @access protected
		 */
		protected $txtName;
		/**
		 * @var QTextBox txtDescription
		 * @access protected
		 */
		protected $txtDescription;

		// Controls that allow the viewing of Organizationtype's individual data fields
		/**
		 * @var QLabel lblName
		 * @access protected
		 */
		protected $lblName;
		/**
		 * @var QLabel lblDescription
		 * @access protected
		 */
		protected $lblDescription;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * OrganizationtypeMetaControl to edit a single Organizationtype object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Organizationtype object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this OrganizationtypeMetaControl
		 * @param Organizationtype $objOrganizationtype new or existing Organizationtype object
		 */
		 public function __construct($objParentObject, Organizationtype $objOrganizationtype) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this OrganizationtypeMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Organizationtype object
			$this->objOrganizationtype = $objOrganizationtype;

			// Figure out if we're Editing or Creating New
			if ($this->objOrganizationtype->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this OrganizationtypeMetaControl
		 * @param integer $intIdOrganizationType primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Organizationtype object creation - defaults to CreateOrEdit
 		 * @return OrganizationtypeMetaControl
		 */
		public static function Create($objParentObject, $intIdOrganizationType = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intIdOrganizationType)) {
				$objOrganizationtype = Organizationtype::Load($intIdOrganizationType);

				// Organizationtype was found -- return it!
				if ($objOrganizationtype)
					return new OrganizationtypeMetaControl($objParentObject, $objOrganizationtype);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Organizationtype object with PK arguments: ' . $intIdOrganizationType);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new OrganizationtypeMetaControl($objParentObject, new Organizationtype());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this OrganizationtypeMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Organizationtype object creation - defaults to CreateOrEdit
		 * @return OrganizationtypeMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdOrganizationType = QApplication::PathInfo(0);
			return OrganizationtypeMetaControl::Create($objParentObject, $intIdOrganizationType, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this OrganizationtypeMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Organizationtype object creation - defaults to CreateOrEdit
		 * @return OrganizationtypeMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdOrganizationType = QApplication::QueryString('intIdOrganizationType');
			return OrganizationtypeMetaControl::Create($objParentObject, $intIdOrganizationType, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblIdOrganizationType
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIdOrganizationType_Create($strControlId = null) {
			$this->lblIdOrganizationType = new QLabel($this->objParentObject, $strControlId);
			$this->lblIdOrganizationType->Name = QApplication::Translate('Id Organization Type');
			if ($this->blnEditMode)
				$this->lblIdOrganizationType->Text = $this->objOrganizationtype->IdOrganizationType;
			else
				$this->lblIdOrganizationType->Text = 'N/A';
			return $this->lblIdOrganizationType;
		}

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objOrganizationtype->Name;
			$this->txtName->Required = true;
			$this->txtName->MaxLength = Organizationtype::NameMaxLength;
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
			$this->lblName->Text = $this->objOrganizationtype->Name;
			$this->lblName->Required = true;
			return $this->lblName;
		}

		/**
		 * Create and setup QTextBox txtDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtDescription_Create($strControlId = null) {
			$this->txtDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtDescription->Name = QApplication::Translate('Description');
			$this->txtDescription->Text = $this->objOrganizationtype->Description;
			$this->txtDescription->MaxLength = Organizationtype::DescriptionMaxLength;
			return $this->txtDescription;
		}

		/**
		 * Create and setup QLabel lblDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDescription_Create($strControlId = null) {
			$this->lblDescription = new QLabel($this->objParentObject, $strControlId);
			$this->lblDescription->Name = QApplication::Translate('Description');
			$this->lblDescription->Text = $this->objOrganizationtype->Description;
			return $this->lblDescription;
		}



		/**
		 * Refresh this MetaControl with Data from the local Organizationtype object.
		 * @param boolean $blnReload reload Organizationtype from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objOrganizationtype->Reload();

			if ($this->lblIdOrganizationType) if ($this->blnEditMode) $this->lblIdOrganizationType->Text = $this->objOrganizationtype->IdOrganizationType;

			if ($this->txtName) $this->txtName->Text = $this->objOrganizationtype->Name;
			if ($this->lblName) $this->lblName->Text = $this->objOrganizationtype->Name;

			if ($this->txtDescription) $this->txtDescription->Text = $this->objOrganizationtype->Description;
			if ($this->lblDescription) $this->lblDescription->Text = $this->objOrganizationtype->Description;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ORGANIZATIONTYPE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Organizationtype instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveOrganizationtype() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtName) $this->objOrganizationtype->Name = $this->txtName->Text;
				if ($this->txtDescription) $this->objOrganizationtype->Description = $this->txtDescription->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Organizationtype object
				$this->objOrganizationtype->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Organizationtype instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteOrganizationtype() {
			$this->objOrganizationtype->Delete();
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
				case 'Organizationtype': return $this->objOrganizationtype;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Organizationtype fields -- will be created dynamically if not yet created
				case 'IdOrganizationTypeControl':
					if (!$this->lblIdOrganizationType) return $this->lblIdOrganizationType_Create();
					return $this->lblIdOrganizationType;
				case 'IdOrganizationTypeLabel':
					if (!$this->lblIdOrganizationType) return $this->lblIdOrganizationType_Create();
					return $this->lblIdOrganizationType;
				case 'NameControl':
					if (!$this->txtName) return $this->txtName_Create();
					return $this->txtName;
				case 'NameLabel':
					if (!$this->lblName) return $this->lblName_Create();
					return $this->lblName;
				case 'DescriptionControl':
					if (!$this->txtDescription) return $this->txtDescription_Create();
					return $this->txtDescription;
				case 'DescriptionLabel':
					if (!$this->lblDescription) return $this->lblDescription_Create();
					return $this->lblDescription;
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
					// Controls that point to Organizationtype fields
					case 'IdOrganizationTypeControl':
						return ($this->lblIdOrganizationType = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'DescriptionControl':
						return ($this->txtDescription = QType::Cast($mixValue, 'QControl'));
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