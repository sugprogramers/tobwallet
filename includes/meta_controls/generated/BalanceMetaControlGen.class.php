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
	 * @property QLabel $IdBalanceControl
	 * @property-read QLabel $IdBalanceLabel
	 * @property QDateTimePicker $DateControl
	 * @property-read QLabel $DateLabel
	 * @property QFloatTextBox $AmountExchangedCoinsControl
	 * @property-read QLabel $AmountExchangedCoinsLabel
	 * @property QListBox $IdUserControl
	 * @property-read QLabel $IdUserLabel
	 * @property QListBox $IdOfferControl
	 * @property-read QLabel $IdOfferLabel
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
		 * @var QLabel lblIdBalance
		 * @access protected
		 */
		protected $lblIdBalance;
		/**
		 * @var QDateTimePicker calDate
		 * @access protected
		 */
		protected $calDate;
		/**
		 * @var QFloatTextBox txtAmountExchangedCoins
		 * @access protected
		 */
		protected $txtAmountExchangedCoins;
		/**
		 * @var QListBox lstIdUserObject
		 * @access protected
		 */
		protected $lstIdUserObject;
		/**
		 * @var QListBox lstIdOfferObject
		 * @access protected
		 */
		protected $lstIdOfferObject;

		// Controls that allow the viewing of Balance's individual data fields
		/**
		 * @var QLabel lblDate
		 * @access protected
		 */
		protected $lblDate;
		/**
		 * @var QLabel lblAmountExchangedCoins
		 * @access protected
		 */
		protected $lblAmountExchangedCoins;
		/**
		 * @var QLabel lblIdUser
		 * @access protected
		 */
		protected $lblIdUser;
		/**
		 * @var QLabel lblIdOffer
		 * @access protected
		 */
		protected $lblIdOffer;

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
		 * Create and setup QLabel lblIdBalance
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIdBalance_Create($strControlId = null) {
			$this->lblIdBalance = new QLabel($this->objParentObject, $strControlId);
			$this->lblIdBalance->Name = QApplication::Translate('Id Balance');
			if ($this->blnEditMode)
				$this->lblIdBalance->Text = $this->objBalance->IdBalance;
			else
				$this->lblIdBalance->Text = 'N/A';
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
				if (($this->objBalance->IdUserObject) && ($this->objBalance->IdUserObject->IdUser == $objIdUserObject->IdUser))
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
			$this->lblIdUser->Text = ($this->objBalance->IdUserObject) ? $this->objBalance->IdUserObject->__toString() : null;
			$this->lblIdUser->Required = true;
			return $this->lblIdUser;
		}

		/**
		 * Create and setup QListBox lstIdOfferObject
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstIdOfferObject_Create($strControlId = null) {
			$this->lstIdOfferObject = new QListBox($this->objParentObject, $strControlId);
			$this->lstIdOfferObject->Name = QApplication::Translate('Id Offer Object');
			$this->lstIdOfferObject->Required = true;
			if (!$this->blnEditMode)
				$this->lstIdOfferObject->AddItem(QApplication::Translate('- Select One -'), null);
			$objIdOfferObjectArray = Offer::LoadAll();
			if ($objIdOfferObjectArray) foreach ($objIdOfferObjectArray as $objIdOfferObject) {
				$objListItem = new QListItem($objIdOfferObject->__toString(), $objIdOfferObject->IdOffer);
				if (($this->objBalance->IdOfferObject) && ($this->objBalance->IdOfferObject->IdOffer == $objIdOfferObject->IdOffer))
					$objListItem->Selected = true;
				$this->lstIdOfferObject->AddItem($objListItem);
			}
			return $this->lstIdOfferObject;
		}

		/**
		 * Create and setup QLabel lblIdOffer
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIdOffer_Create($strControlId = null) {
			$this->lblIdOffer = new QLabel($this->objParentObject, $strControlId);
			$this->lblIdOffer->Name = QApplication::Translate('Id Offer Object');
			$this->lblIdOffer->Text = ($this->objBalance->IdOfferObject) ? $this->objBalance->IdOfferObject->__toString() : null;
			$this->lblIdOffer->Required = true;
			return $this->lblIdOffer;
		}



		/**
		 * Refresh this MetaControl with Data from the local Balance object.
		 * @param boolean $blnReload reload Balance from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objBalance->Reload();

			if ($this->lblIdBalance) if ($this->blnEditMode) $this->lblIdBalance->Text = $this->objBalance->IdBalance;

			if ($this->calDate) $this->calDate->DateTime = $this->objBalance->Date;
			if ($this->lblDate) $this->lblDate->Text = sprintf($this->objBalance->Date) ? $this->objBalance->Date->qFormat($this->strDateDateTimeFormat) : null;

			if ($this->txtAmountExchangedCoins) $this->txtAmountExchangedCoins->Text = $this->objBalance->AmountExchangedCoins;
			if ($this->lblAmountExchangedCoins) $this->lblAmountExchangedCoins->Text = $this->objBalance->AmountExchangedCoins;

			if ($this->lstIdUserObject) {
					$this->lstIdUserObject->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstIdUserObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objIdUserObjectArray = User::LoadAll();
				if ($objIdUserObjectArray) foreach ($objIdUserObjectArray as $objIdUserObject) {
					$objListItem = new QListItem($objIdUserObject->__toString(), $objIdUserObject->IdUser);
					if (($this->objBalance->IdUserObject) && ($this->objBalance->IdUserObject->IdUser == $objIdUserObject->IdUser))
						$objListItem->Selected = true;
					$this->lstIdUserObject->AddItem($objListItem);
				}
			}
			if ($this->lblIdUser) $this->lblIdUser->Text = ($this->objBalance->IdUserObject) ? $this->objBalance->IdUserObject->__toString() : null;

			if ($this->lstIdOfferObject) {
					$this->lstIdOfferObject->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstIdOfferObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objIdOfferObjectArray = Offer::LoadAll();
				if ($objIdOfferObjectArray) foreach ($objIdOfferObjectArray as $objIdOfferObject) {
					$objListItem = new QListItem($objIdOfferObject->__toString(), $objIdOfferObject->IdOffer);
					if (($this->objBalance->IdOfferObject) && ($this->objBalance->IdOfferObject->IdOffer == $objIdOfferObject->IdOffer))
						$objListItem->Selected = true;
					$this->lstIdOfferObject->AddItem($objListItem);
				}
			}
			if ($this->lblIdOffer) $this->lblIdOffer->Text = ($this->objBalance->IdOfferObject) ? $this->objBalance->IdOfferObject->__toString() : null;

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
				if ($this->calDate) $this->objBalance->Date = $this->calDate->DateTime;
				if ($this->txtAmountExchangedCoins) $this->objBalance->AmountExchangedCoins = $this->txtAmountExchangedCoins->Text;
				if ($this->lstIdUserObject) $this->objBalance->IdUser = $this->lstIdUserObject->SelectedValue;
				if ($this->lstIdOfferObject) $this->objBalance->IdOffer = $this->lstIdOfferObject->SelectedValue;

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
					if (!$this->lblIdBalance) return $this->lblIdBalance_Create();
					return $this->lblIdBalance;
				case 'IdBalanceLabel':
					if (!$this->lblIdBalance) return $this->lblIdBalance_Create();
					return $this->lblIdBalance;
				case 'DateControl':
					if (!$this->calDate) return $this->calDate_Create();
					return $this->calDate;
				case 'DateLabel':
					if (!$this->lblDate) return $this->lblDate_Create();
					return $this->lblDate;
				case 'AmountExchangedCoinsControl':
					if (!$this->txtAmountExchangedCoins) return $this->txtAmountExchangedCoins_Create();
					return $this->txtAmountExchangedCoins;
				case 'AmountExchangedCoinsLabel':
					if (!$this->lblAmountExchangedCoins) return $this->lblAmountExchangedCoins_Create();
					return $this->lblAmountExchangedCoins;
				case 'IdUserControl':
					if (!$this->lstIdUserObject) return $this->lstIdUserObject_Create();
					return $this->lstIdUserObject;
				case 'IdUserLabel':
					if (!$this->lblIdUser) return $this->lblIdUser_Create();
					return $this->lblIdUser;
				case 'IdOfferControl':
					if (!$this->lstIdOfferObject) return $this->lstIdOfferObject_Create();
					return $this->lstIdOfferObject;
				case 'IdOfferLabel':
					if (!$this->lblIdOffer) return $this->lblIdOffer_Create();
					return $this->lblIdOffer;
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
						return ($this->lblIdBalance = QType::Cast($mixValue, 'QControl'));
					case 'DateControl':
						return ($this->calDate = QType::Cast($mixValue, 'QControl'));
					case 'AmountExchangedCoinsControl':
						return ($this->txtAmountExchangedCoins = QType::Cast($mixValue, 'QControl'));
					case 'IdUserControl':
						return ($this->lstIdUserObject = QType::Cast($mixValue, 'QControl'));
					case 'IdOfferControl':
						return ($this->lstIdOfferObject = QType::Cast($mixValue, 'QControl'));
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