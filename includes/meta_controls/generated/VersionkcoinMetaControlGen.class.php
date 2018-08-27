<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Versionkcoin class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Versionkcoin object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a VersionkcoinMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 *
	 * @package My QCubed Application
	 * @subpackage MetaControls
	 * @property-read Versionkcoin $Versionkcoin the actual Versionkcoin data class being edited
	 * @property QLabel $IdVersionKcoinControl
	 * @property-read QLabel $IdVersionKcoinLabel
	 * @property QTextBox $NameControl
	 * @property-read QLabel $NameLabel
	 * @property QTextBox $PathControl
	 * @property-read QLabel $PathLabel
	 * @property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * @property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class VersionkcoinMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Versionkcoin objVersionkcoin
		 * @access protected
		 */
		protected $objVersionkcoin;
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

		// Controls that allow the editing of Versionkcoin's individual data fields
		/**
		 * @var QLabel lblIdVersionKcoin
		 * @access protected
		 */
		protected $lblIdVersionKcoin;
		/**
		 * @var QTextBox txtName
		 * @access protected
		 */
		protected $txtName;
		/**
		 * @var QTextBox txtPath
		 * @access protected
		 */
		protected $txtPath;

		// Controls that allow the viewing of Versionkcoin's individual data fields
		/**
		 * @var QLabel lblName
		 * @access protected
		 */
		protected $lblName;
		/**
		 * @var QLabel lblPath
		 * @access protected
		 */
		protected $lblPath;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * VersionkcoinMetaControl to edit a single Versionkcoin object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Versionkcoin object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this VersionkcoinMetaControl
		 * @param Versionkcoin $objVersionkcoin new or existing Versionkcoin object
		 */
		 public function __construct($objParentObject, Versionkcoin $objVersionkcoin) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this VersionkcoinMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Versionkcoin object
			$this->objVersionkcoin = $objVersionkcoin;

			// Figure out if we're Editing or Creating New
			if ($this->objVersionkcoin->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this VersionkcoinMetaControl
		 * @param integer $intIdVersionKcoin primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Versionkcoin object creation - defaults to CreateOrEdit
 		 * @return VersionkcoinMetaControl
		 */
		public static function Create($objParentObject, $intIdVersionKcoin = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intIdVersionKcoin)) {
				$objVersionkcoin = Versionkcoin::Load($intIdVersionKcoin);

				// Versionkcoin was found -- return it!
				if ($objVersionkcoin)
					return new VersionkcoinMetaControl($objParentObject, $objVersionkcoin);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Versionkcoin object with PK arguments: ' . $intIdVersionKcoin);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new VersionkcoinMetaControl($objParentObject, new Versionkcoin());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this VersionkcoinMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Versionkcoin object creation - defaults to CreateOrEdit
		 * @return VersionkcoinMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdVersionKcoin = QApplication::PathInfo(0);
			return VersionkcoinMetaControl::Create($objParentObject, $intIdVersionKcoin, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this VersionkcoinMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Versionkcoin object creation - defaults to CreateOrEdit
		 * @return VersionkcoinMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdVersionKcoin = QApplication::QueryString('intIdVersionKcoin');
			return VersionkcoinMetaControl::Create($objParentObject, $intIdVersionKcoin, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblIdVersionKcoin
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIdVersionKcoin_Create($strControlId = null) {
			$this->lblIdVersionKcoin = new QLabel($this->objParentObject, $strControlId);
			$this->lblIdVersionKcoin->Name = QApplication::Translate('Id Version Kcoin');
			if ($this->blnEditMode)
				$this->lblIdVersionKcoin->Text = $this->objVersionkcoin->IdVersionKcoin;
			else
				$this->lblIdVersionKcoin->Text = 'N/A';
			return $this->lblIdVersionKcoin;
		}

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objVersionkcoin->Name;
			$this->txtName->Required = true;
			$this->txtName->MaxLength = Versionkcoin::NameMaxLength;
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
			$this->lblName->Text = $this->objVersionkcoin->Name;
			$this->lblName->Required = true;
			return $this->lblName;
		}

		/**
		 * Create and setup QTextBox txtPath
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtPath_Create($strControlId = null) {
			$this->txtPath = new QTextBox($this->objParentObject, $strControlId);
			$this->txtPath->Name = QApplication::Translate('Path');
			$this->txtPath->Text = $this->objVersionkcoin->Path;
			$this->txtPath->Required = true;
			$this->txtPath->MaxLength = Versionkcoin::PathMaxLength;
			return $this->txtPath;
		}

		/**
		 * Create and setup QLabel lblPath
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPath_Create($strControlId = null) {
			$this->lblPath = new QLabel($this->objParentObject, $strControlId);
			$this->lblPath->Name = QApplication::Translate('Path');
			$this->lblPath->Text = $this->objVersionkcoin->Path;
			$this->lblPath->Required = true;
			return $this->lblPath;
		}



		/**
		 * Refresh this MetaControl with Data from the local Versionkcoin object.
		 * @param boolean $blnReload reload Versionkcoin from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objVersionkcoin->Reload();

			if ($this->lblIdVersionKcoin) if ($this->blnEditMode) $this->lblIdVersionKcoin->Text = $this->objVersionkcoin->IdVersionKcoin;

			if ($this->txtName) $this->txtName->Text = $this->objVersionkcoin->Name;
			if ($this->lblName) $this->lblName->Text = $this->objVersionkcoin->Name;

			if ($this->txtPath) $this->txtPath->Text = $this->objVersionkcoin->Path;
			if ($this->lblPath) $this->lblPath->Text = $this->objVersionkcoin->Path;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC VERSIONKCOIN OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Versionkcoin instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveVersionkcoin() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtName) $this->objVersionkcoin->Name = $this->txtName->Text;
				if ($this->txtPath) $this->objVersionkcoin->Path = $this->txtPath->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Versionkcoin object
				$this->objVersionkcoin->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Versionkcoin instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteVersionkcoin() {
			$this->objVersionkcoin->Delete();
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
				case 'Versionkcoin': return $this->objVersionkcoin;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Versionkcoin fields -- will be created dynamically if not yet created
				case 'IdVersionKcoinControl':
					if (!$this->lblIdVersionKcoin) return $this->lblIdVersionKcoin_Create();
					return $this->lblIdVersionKcoin;
				case 'IdVersionKcoinLabel':
					if (!$this->lblIdVersionKcoin) return $this->lblIdVersionKcoin_Create();
					return $this->lblIdVersionKcoin;
				case 'NameControl':
					if (!$this->txtName) return $this->txtName_Create();
					return $this->txtName;
				case 'NameLabel':
					if (!$this->lblName) return $this->lblName_Create();
					return $this->lblName;
				case 'PathControl':
					if (!$this->txtPath) return $this->txtPath_Create();
					return $this->txtPath;
				case 'PathLabel':
					if (!$this->lblPath) return $this->lblPath_Create();
					return $this->lblPath;
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
					// Controls that point to Versionkcoin fields
					case 'IdVersionKcoinControl':
						return ($this->lblIdVersionKcoin = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'PathControl':
						return ($this->txtPath = QType::Cast($mixValue, 'QControl'));
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