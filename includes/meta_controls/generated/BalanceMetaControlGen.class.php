<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Balance class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Balance object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a BalanceMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 *
	 * @package My QCubed Application
	 * @subpackage MetaControls
	 * @property-read Balance $Balance the actual Balance data class being edited
	 * @property QIntegerTextBox $IdBalanceControl
	 * @property-read QLabel $IdBalanceLabel
	 * @property QDateTimePicker $DateControl
	 * @property-read QLabel $DateLabel
	 * @property QListBox $IdClientControl
	 * @property-read QLabel $IdClientLabel
	 * @property QListBox $IdOrganizationControl
	 * @property-read QLabel $IdOrganizationLabel
	 * @property QFloatTextBox $AmountExchangedCoinsControl
	 * @property-read QLabel $AmountExchangedCoinsLabel
	 * @property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * @property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class BalanceMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Balance objBalance
		 * @access protected
		 */
		protected $objBalance;
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

		// Controls that allow the editing of Balance's individual data fields
		/**
		 * @var QIntegerTextBox txtIdBalance
		 * @access protected
		 */
		protected $txtIdBalance;
		/**
		 * @var QDateTimePicker calDate
		 * @access protected
		 */
		protected $calDate;
		/**
		 * @var QListBox lstIdClientObject
		 * @access protected
		 */
		protected $lstIdClientObject;
		/**
		 * @var QListBox lstIdOrganizationObject
		 * @access protected
		 */
		protected $lstIdOrganizationObject;
		/**
		 * @var QFloatTextBox txtAmountExchangedCoins
		 * @access protected
		 */
		protected $txtAmountExchangedCoins;

		// Controls that allow the viewing of Balance's individual data fields
		/**
		 * @var QLabel lblIdBalance
		 * @access protected
		 */
		protected $lblIdBalance;
		/**
		 * @var QLabel lblDate
		 * @access protected
		 */
		protected $lblDate;
		/**
		 * @var QLabel lblIdClient
		 * @access protected
		 */
		protected $lblIdClient;
		/**
		 * @var QLabel lblIdOrganization
		 * @access protected
		 */
		protected $lblIdOrganization;
		/**
		 * @var QLabel lblAmountExchangedCoins
		 * @access protected
		 */
		protected $lblAmountExchangedCoins;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * BalanceMetaControl to edit a single Balance object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Balance object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this BalanceMetaControl
		 * @param Balance $objBalance new or existing Balance object
		 */
		 public function __construct($objParentObject, Balance $objBalance) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this BalanceMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Balance object
			$this->objBalance = $objBalance;

			// Figure out if we're Editing or Creating New
			if ($this->objBalance->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this BalanceMetaControl
		 * @param integer $intIdBalance primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Balance object creation - defaults to CreateOrEdit
 		 * @return BalanceMetaControl
		 */
		public static function Create($objParentObject, $intIdBalance = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intIdBalance)) {
				$objBalance = Balance::Load($intIdBalance);

				// Balance was found -- return it!
				if ($objBalance)
					return new BalanceMetaControl($objParentObject, $objBalance);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Balance object with PK arguments: ' . $intIdBalance);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new BalanceMetaControl($objParentObject, new Balance());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this BalanceMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Balance object creation - defaults to CreateOrEdit
		 * @return BalanceMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdBalance = QApplication::PathInfo(0);
			return BalanceMetaControl::Create($objParentObject, $intIdBalance, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this BalanceMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Balance object creation - defaults to CreateOrEdit
		 * @return BalanceMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdBalance = QApplication::QueryString('intIdBalance');
			return BalanceMetaControl::Create($objParentObject, $intIdBalance, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QIntegerTextBox txtIdBalance
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtIdBalance_Create($strControlId = null) {
			$this->txtIdBalance = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtIdBalance->Name = QApplication::Translate('Id Balance');
			$this->txtIdBalance->Text = $this->objBalance->IdBalance;
			$this->txtIdBalance->Required = true;
			return $this->txtIdBalance;
		}

		/**
		 * Create and setup QLabel lblIdBalance
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblIdBalance_Create($strControlId = null, $strFormat = null) {
			$this->lblIdBalance = new QLabel($this->objParentObject, $strControlId);
			$this->lblIdBalance->Name = QApplication::Translate('Id Balance');
			$this->lblIdBalance->Text = $this->objBalance->IdBalance;
			$this->lblIdBalance->Required = true;
			$this->lblIdBalance->Format = $strFormat;
			return $this->lblIdBalance;
		}

		/**
		 * Create and setup QDateTimePicker calDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDate_Create($strControlId = null) {
			$this->calDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDate->Name = QApplication::Translate('Date');
			$this->calDate->DateTime = $this->objBalance->Date;
			$this->calDate->DateTimePickerType = QDateTimePickerType::DateTime;
			$this->calDate->Required = true;
			return $this->calDate;
		}

		/**
		 * Create and setup QLabel lblDate
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDate_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDate = new QLabel($this->objParentObject, $strControlId);
			$this->lblDate->Name = QApplication::Translate('Date');
			$this->strDateDateTimeFormat = $strDateTimeFormat;
			$this->lblDate->Text = sprintf($this->objBalance->Date) ? $this->objBalance->Date->qFormat($this->strDateDateTimeFormat) : null;
			$this->lblDate->Required = true;
			return $this->lblDate;
		}

		protected $strDateDateTimeFormat;


		/**
		 * Create and setup QListBox lstIdClientObject
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstIdClientObject_Create($strControlId = null) {
			$this->lstIdClientObject = new QListBox($this->objParentObject, $strControlId);
			$this->lstIdClientObject->Name = QApplication::Translate('Id Client Object');
			$this->lstIdClientObject->Required = true;
			if (!$this->blnEditMode)
				$this->lstIdClientObject->AddItem(QApplication::Translate('- Select One -'), null);
			$objIdClientObjectArray = Client::LoadAll();
			if ($objIdClientObjectArray) foreach ($objIdClientObjectArray as $objIdClientObject) {
				$objListItem = new QListItem($objIdClientObject->__toString(), $objIdClientObject->IdClient);
				if (($this->objBalance->IdClientObject) && ($this->objBalance->IdClientObject->IdClient == $objIdClientObject->IdClient))
					$objListItem->Selected = true;
				$this->lstIdClientObject->AddItem($objListItem);
			}
			return $this->lstIdClientObject;
		}

		/**
		 * Create and setup QLabel lblIdClient
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIdClient_Create($strControlId = null) {
			$this->lblIdClient = new QLabel($this->objParentObject, $strControlId);
			$this->lblIdClient->Name = QApplication::Translate('Id Client Object');
			$this->lblIdClient->Text = ($this->objBalance->IdClientObject) ? $this->objBalance->IdClientObject->__toString() : null;
			$this->lblIdClient->Required = true;
			return $this->lblIdClient;
		}

		/**
		 * Create and setup QListBox lstIdOrganizationObject
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstIdOrganizationObject_Create($strControlId = null) {
			$this->lstIdOrganizationObject = new QListBox($this->objParentObject, $strControlId);
			$this->lstIdOrganizationObject->Name = QApplication::Translate('Id Organization Object');
			$this->lstIdOrganizationObject->Required = true;
			if (!$this->blnEditMode)
				$this->lstIdOrganizationObject->AddItem(QApplication::Translate('- Select One -'), null);
			$objIdOrganizationObjectArray = Organization::LoadAll();
			if ($objIdOrganizationObjectArray) foreach ($objIdOrganizationObjectArray as $objIdOrganizationObject) {
				$objListItem = new QListItem($objIdOrganizationObject->__toString(), $objIdOrganizationObject->IdOrganization);
				if (($this->objBalance->IdOrganizationObject) && ($this->objBalance->IdOrganizationObject->IdOrganization == $objIdOrganizationObject->IdOrganization))
					$objListItem->Selected = true;
				$this->lstIdOrganizationObject->AddItem($objListItem);
			}
			return $this->lstIdOrganizationObject;
		}

		/**
		 * Create and setup QLabel lblIdOrganization
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIdOrganization_Create($strControlId = null) {
			$this->lblIdOrganization = new QLabel($this->objParentObject, $strControlId);
			$this->lblIdOrganization->Name = QApplication::Translate('Id Organization Object');
			$this->lblIdOrganization->Text = ($this->objBalance->IdOrganizationObject) ? $this->objBalance->IdOrganizationObject->__toString() : null;
			$this->lblIdOrganization->Required = true;
			return $this->lblIdOrganization;
		}

		/**
		 * Create and setup QFloatTextBox txtAmountExchangedCoins
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtAmountExchangedCoins_Create($strControlId = null) {
			$this->txtAmountExchangedCoins = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtAmountExchangedCoins->Name = QApplication::Translate('Amount Exchanged Coins');
			$this->txtAmountExchangedCoins->Text = $this->objBalance->AmountExchangedCoins;
			$this->txtAmountExchangedCoins->Required = true;
			return $this->txtAmountExchangedCoins;
		}

		/**
		 * Create and setup QLabel lblAmountExchangedCoins
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblAmountExchangedCoins_Create($strControlId = null, $strFormat = null) {
			$this->lblAmountExchangedCoins = new QLabel($this->objParentObject, $strControlId);
			$this->lblAmountExchangedCoins->Name = QApplication::Translate('Amount Exchanged Coins');
			$this->lblAmountExchangedCoins->Text = $this->objBalance->AmountExchangedCoins;
			$this->lblAmountExchangedCoins->Required = true;
			$this->lblAmountExchangedCoins->Format = $strFormat;
			return $this->lblAmountExchangedCoins;
		}



		/**
		 * Refresh this MetaControl with Data from the local Balance object.
		 * @param boolean $blnReload reload Balance from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objBalance->Reload();

			if ($this->txtIdBalance) $this->txtIdBalance->Text = $this->objBalance->IdBalance;
			if ($this->lblIdBalance) $this->lblIdBalance->Text = $this->objBalance->IdBalance;

			if ($this->calDate) $this->calDate->DateTime = $this->objBalance->Date;
			if ($this->lblDate) $this->lblDate->Text = sprintf($this->objBalance->Date) ? $this->objBalance->Date->qFormat($this->strDateDateTimeFormat) : null;

			if ($this->lstIdClientObject) {
					$this->lstIdClientObject->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstIdClientObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objIdClientObjectArray = Client::LoadAll();
				if ($objIdClientObjectArray) foreach ($objIdClientObjectArray as $objIdClientObject) {
					$objListItem = new QListItem($objIdClientObject->__toString(), $objIdClientObject->IdClient);
					if (($this->objBalance->IdClientObject) && ($this->objBalance->IdClientObject->IdClient == $objIdClientObject->IdClient))
						$objListItem->Selected = true;
					$this->lstIdClientObject->AddItem($objListItem);
				}
			}
			if ($this->lblIdClient) $this->lblIdClient->Text = ($this->objBalance->IdClientObject) ? $this->objBalance->IdClientObject->__toString() : null;

			if ($this->lstIdOrganizationObject) {
					$this->lstIdOrganizationObject->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstIdOrganizationObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objIdOrganizationObjectArray = Organization::LoadAll();
				if ($objIdOrganizationObjectArray) foreach ($objIdOrganizationObjectArray as $objIdOrganizationObject) {
					$objListItem = new QListItem($objIdOrganizationObject->__toString(), $objIdOrganizationObject->IdOrganization);
					if (($this->objBalance->IdOrganizationObject) && ($this->objBalance->IdOrganizationObject->IdOrganization == $objIdOrganizationObject->IdOrganization))
						$objListItem->Selected = true;
					$this->lstIdOrganizationObject->AddItem($objListItem);
				}
			}
			if ($this->lblIdOrganization) $this->lblIdOrganization->Text = ($this->objBalance->IdOrganizationObject) ? $this->objBalance->IdOrganizationObject->__toString() : null;

			if ($this->txtAmountExchangedCoins) $this->txtAmountExchangedCoins->Text = $this->objBalance->AmountExchangedCoins;
			if ($this->lblAmountExchangedCoins) $this->lblAmountExchangedCoins->Text = $this->objBalance->AmountExchangedCoins;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC BALANCE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Balance instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveBalance() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtIdBalance) $this->objBalance->IdBalance = $this->txtIdBalance->Text;
				if ($this->calDate) $this->objBalance->Date = $this->calDate->DateTime;
				if ($this->lstIdClientObject) $this->objBalance->IdClient = $this->lstIdClientObject->SelectedValue;
				if ($this->lstIdOrganizationObject) $this->objBalance->IdOrganization = $this->lstIdOrganizationObject->SelectedValue;
				if ($this->txtAmountExchangedCoins) $this->objBalance->AmountExchangedCoins = $this->txtAmountExchangedCoins->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Balance object
				$this->objBalance->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Balance instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteBalance() {
			$this->objBalance->Delete();
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
				case 'Balance': return $this->objBalance;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Balance fields -- will be created dynamically if not yet created
				case 'IdBalanceControl':
					if (!$this->txtIdBalance) return $this->txtIdBalance_Create();
					return $this->txtIdBalance;
				case 'IdBalanceLabel':
					if (!$this->lblIdBalance) return $this->lblIdBalance_Create();
					return $this->lblIdBalance;
				case 'DateControl':
					if (!$this->calDate) return $this->calDate_Create();
					return $this->calDate;
				case 'DateLabel':
					if (!$this->lblDate) return $this->lblDate_Create();
					return $this->lblDate;
				case 'IdClientControl':
					if (!$this->lstIdClientObject) return $this->lstIdClientObject_Create();
					return $this->lstIdClientObject;
				case 'IdClientLabel':
					if (!$this->lblIdClient) return $this->lblIdClient_Create();
					return $this->lblIdClient;
				case 'IdOrganizationControl':
					if (!$this->lstIdOrganizationObject) return $this->lstIdOrganizationObject_Create();
					return $this->lstIdOrganizationObject;
				case 'IdOrganizationLabel':
					if (!$this->lblIdOrganization) return $this->lblIdOrganization_Create();
					return $this->lblIdOrganization;
				case 'AmountExchangedCoinsControl':
					if (!$this->txtAmountExchangedCoins) return $this->txtAmountExchangedCoins_Create();
					return $this->txtAmountExchangedCoins;
				case 'AmountExchangedCoinsLabel':
					if (!$this->lblAmountExchangedCoins) return $this->lblAmountExchangedCoins_Create();
					return $this->lblAmountExchangedCoins;
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
					// Controls that point to Balance fields
					case 'IdBalanceControl':
						return ($this->txtIdBalance = QType::Cast($mixValue, 'QControl'));
					case 'DateControl':
						return ($this->calDate = QType::Cast($mixValue, 'QControl'));
					case 'IdClientControl':
						return ($this->lstIdClientObject = QType::Cast($mixValue, 'QControl'));
					case 'IdOrganizationControl':
						return ($this->lstIdOrganizationObject = QType::Cast($mixValue, 'QControl'));
					case 'AmountExchangedCoinsControl':
						return ($this->txtAmountExchangedCoins = QType::Cast($mixValue, 'QControl'));
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