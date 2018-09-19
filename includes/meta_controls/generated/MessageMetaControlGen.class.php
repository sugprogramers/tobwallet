<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Message class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Message object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a MessageMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 *
	 * @package My QCubed Application
	 * @subpackage MetaControls
	 * @property-read Message $Message the actual Message data class being edited
	 * @property QLabel $IdMessageControl
	 * @property-read QLabel $IdMessageLabel
	 * @property QListBox $IdUserControl
	 * @property-read QLabel $IdUserLabel
	 * @property QIntegerTextBox $TypeControl
	 * @property-read QLabel $TypeLabel
	 * @property QTextBox $BodyControl
	 * @property-read QLabel $BodyLabel
	 * @property QDateTimePicker $CreatedDateControl
	 * @property-read QLabel $CreatedDateLabel
	 * @property QCheckBox $IsReadControl
	 * @property-read QLabel $IsReadLabel
	 * @property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * @property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class MessageMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Message objMessage
		 * @access protected
		 */
		protected $objMessage;
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

		// Controls that allow the editing of Message's individual data fields
		/**
		 * @var QLabel lblIdMessage
		 * @access protected
		 */
		protected $lblIdMessage;
		/**
		 * @var QListBox lstIdUserObject
		 * @access protected
		 */
		protected $lstIdUserObject;
		/**
		 * @var QIntegerTextBox txtType
		 * @access protected
		 */
		protected $txtType;
		/**
		 * @var QTextBox txtBody
		 * @access protected
		 */
		protected $txtBody;
		/**
		 * @var QDateTimePicker calCreatedDate
		 * @access protected
		 */
		protected $calCreatedDate;
		/**
		 * @var QCheckBox chkIsRead
		 * @access protected
		 */
		protected $chkIsRead;

		// Controls that allow the viewing of Message's individual data fields
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
		/**
		 * @var QLabel lblBody
		 * @access protected
		 */
		protected $lblBody;
		/**
		 * @var QLabel lblCreatedDate
		 * @access protected
		 */
		protected $lblCreatedDate;
		/**
		 * @var QLabel lblIsRead
		 * @access protected
		 */
		protected $lblIsRead;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * MessageMetaControl to edit a single Message object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Message object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this MessageMetaControl
		 * @param Message $objMessage new or existing Message object
		 */
		 public function __construct($objParentObject, Message $objMessage) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this MessageMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Message object
			$this->objMessage = $objMessage;

			// Figure out if we're Editing or Creating New
			if ($this->objMessage->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this MessageMetaControl
		 * @param integer $intIdMessage primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Message object creation - defaults to CreateOrEdit
 		 * @return MessageMetaControl
		 */
		public static function Create($objParentObject, $intIdMessage = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intIdMessage)) {
				$objMessage = Message::Load($intIdMessage);

				// Message was found -- return it!
				if ($objMessage)
					return new MessageMetaControl($objParentObject, $objMessage);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Message object with PK arguments: ' . $intIdMessage);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new MessageMetaControl($objParentObject, new Message());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this MessageMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Message object creation - defaults to CreateOrEdit
		 * @return MessageMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdMessage = QApplication::PathInfo(0);
			return MessageMetaControl::Create($objParentObject, $intIdMessage, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this MessageMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Message object creation - defaults to CreateOrEdit
		 * @return MessageMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdMessage = QApplication::QueryString('intIdMessage');
			return MessageMetaControl::Create($objParentObject, $intIdMessage, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblIdMessage
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIdMessage_Create($strControlId = null) {
			$this->lblIdMessage = new QLabel($this->objParentObject, $strControlId);
			$this->lblIdMessage->Name = QApplication::Translate('Id Message');
			if ($this->blnEditMode)
				$this->lblIdMessage->Text = $this->objMessage->IdMessage;
			else
				$this->lblIdMessage->Text = 'N/A';
			return $this->lblIdMessage;
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
				if (($this->objMessage->IdUserObject) && ($this->objMessage->IdUserObject->IdUser == $objIdUserObject->IdUser))
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
			$this->lblIdUser->Text = ($this->objMessage->IdUserObject) ? $this->objMessage->IdUserObject->__toString() : null;
			$this->lblIdUser->Required = true;
			return $this->lblIdUser;
		}

		/**
		 * Create and setup QIntegerTextBox txtType
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtType_Create($strControlId = null) {
			$this->txtType = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtType->Name = QApplication::Translate('Type');
			$this->txtType->Text = $this->objMessage->Type;
			$this->txtType->Required = true;
			return $this->txtType;
		}

		/**
		 * Create and setup QLabel lblType
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblType_Create($strControlId = null, $strFormat = null) {
			$this->lblType = new QLabel($this->objParentObject, $strControlId);
			$this->lblType->Name = QApplication::Translate('Type');
			$this->lblType->Text = $this->objMessage->Type;
			$this->lblType->Required = true;
			$this->lblType->Format = $strFormat;
			return $this->lblType;
		}

		/**
		 * Create and setup QTextBox txtBody
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtBody_Create($strControlId = null) {
			$this->txtBody = new QTextBox($this->objParentObject, $strControlId);
			$this->txtBody->Name = QApplication::Translate('Body');
			$this->txtBody->Text = $this->objMessage->Body;
			$this->txtBody->Required = true;
			$this->txtBody->TextMode = QTextMode::MultiLine;
			return $this->txtBody;
		}

		/**
		 * Create and setup QLabel lblBody
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblBody_Create($strControlId = null) {
			$this->lblBody = new QLabel($this->objParentObject, $strControlId);
			$this->lblBody->Name = QApplication::Translate('Body');
			$this->lblBody->Text = $this->objMessage->Body;
			$this->lblBody->Required = true;
			return $this->lblBody;
		}

		/**
		 * Create and setup QDateTimePicker calCreatedDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calCreatedDate_Create($strControlId = null) {
			$this->calCreatedDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calCreatedDate->Name = QApplication::Translate('Created Date');
			$this->calCreatedDate->DateTime = $this->objMessage->CreatedDate;
			$this->calCreatedDate->DateTimePickerType = QDateTimePickerType::DateTime;
			$this->calCreatedDate->Required = true;
			return $this->calCreatedDate;
		}

		/**
		 * Create and setup QLabel lblCreatedDate
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblCreatedDate_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblCreatedDate = new QLabel($this->objParentObject, $strControlId);
			$this->lblCreatedDate->Name = QApplication::Translate('Created Date');
			$this->strCreatedDateDateTimeFormat = $strDateTimeFormat;
			$this->lblCreatedDate->Text = sprintf($this->objMessage->CreatedDate) ? $this->objMessage->CreatedDate->qFormat($this->strCreatedDateDateTimeFormat) : null;
			$this->lblCreatedDate->Required = true;
			return $this->lblCreatedDate;
		}

		protected $strCreatedDateDateTimeFormat;


		/**
		 * Create and setup QCheckBox chkIsRead
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkIsRead_Create($strControlId = null) {
			$this->chkIsRead = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkIsRead->Name = QApplication::Translate('Is Read');
			$this->chkIsRead->Checked = $this->objMessage->IsRead;
			return $this->chkIsRead;
		}

		/**
		 * Create and setup QLabel lblIsRead
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIsRead_Create($strControlId = null) {
			$this->lblIsRead = new QLabel($this->objParentObject, $strControlId);
			$this->lblIsRead->Name = QApplication::Translate('Is Read');
			$this->lblIsRead->Text = ($this->objMessage->IsRead) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblIsRead;
		}



		/**
		 * Refresh this MetaControl with Data from the local Message object.
		 * @param boolean $blnReload reload Message from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objMessage->Reload();

			if ($this->lblIdMessage) if ($this->blnEditMode) $this->lblIdMessage->Text = $this->objMessage->IdMessage;

			if ($this->lstIdUserObject) {
					$this->lstIdUserObject->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstIdUserObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objIdUserObjectArray = User::LoadAll();
				if ($objIdUserObjectArray) foreach ($objIdUserObjectArray as $objIdUserObject) {
					$objListItem = new QListItem($objIdUserObject->__toString(), $objIdUserObject->IdUser);
					if (($this->objMessage->IdUserObject) && ($this->objMessage->IdUserObject->IdUser == $objIdUserObject->IdUser))
						$objListItem->Selected = true;
					$this->lstIdUserObject->AddItem($objListItem);
				}
			}
			if ($this->lblIdUser) $this->lblIdUser->Text = ($this->objMessage->IdUserObject) ? $this->objMessage->IdUserObject->__toString() : null;

			if ($this->txtType) $this->txtType->Text = $this->objMessage->Type;
			if ($this->lblType) $this->lblType->Text = $this->objMessage->Type;

			if ($this->txtBody) $this->txtBody->Text = $this->objMessage->Body;
			if ($this->lblBody) $this->lblBody->Text = $this->objMessage->Body;

			if ($this->calCreatedDate) $this->calCreatedDate->DateTime = $this->objMessage->CreatedDate;
			if ($this->lblCreatedDate) $this->lblCreatedDate->Text = sprintf($this->objMessage->CreatedDate) ? $this->objMessage->CreatedDate->qFormat($this->strCreatedDateDateTimeFormat) : null;

			if ($this->chkIsRead) $this->chkIsRead->Checked = $this->objMessage->IsRead;
			if ($this->lblIsRead) $this->lblIsRead->Text = ($this->objMessage->IsRead) ? QApplication::Translate('Yes') : QApplication::Translate('No');

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC MESSAGE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Message instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveMessage() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstIdUserObject) $this->objMessage->IdUser = $this->lstIdUserObject->SelectedValue;
				if ($this->txtType) $this->objMessage->Type = $this->txtType->Text;
				if ($this->txtBody) $this->objMessage->Body = $this->txtBody->Text;
				if ($this->calCreatedDate) $this->objMessage->CreatedDate = $this->calCreatedDate->DateTime;
				if ($this->chkIsRead) $this->objMessage->IsRead = $this->chkIsRead->Checked;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Message object
				$this->objMessage->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Message instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteMessage() {
			$this->objMessage->Delete();
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
				case 'Message': return $this->objMessage;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Message fields -- will be created dynamically if not yet created
				case 'IdMessageControl':
					if (!$this->lblIdMessage) return $this->lblIdMessage_Create();
					return $this->lblIdMessage;
				case 'IdMessageLabel':
					if (!$this->lblIdMessage) return $this->lblIdMessage_Create();
					return $this->lblIdMessage;
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
				case 'BodyControl':
					if (!$this->txtBody) return $this->txtBody_Create();
					return $this->txtBody;
				case 'BodyLabel':
					if (!$this->lblBody) return $this->lblBody_Create();
					return $this->lblBody;
				case 'CreatedDateControl':
					if (!$this->calCreatedDate) return $this->calCreatedDate_Create();
					return $this->calCreatedDate;
				case 'CreatedDateLabel':
					if (!$this->lblCreatedDate) return $this->lblCreatedDate_Create();
					return $this->lblCreatedDate;
				case 'IsReadControl':
					if (!$this->chkIsRead) return $this->chkIsRead_Create();
					return $this->chkIsRead;
				case 'IsReadLabel':
					if (!$this->lblIsRead) return $this->lblIsRead_Create();
					return $this->lblIsRead;
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
					// Controls that point to Message fields
					case 'IdMessageControl':
						return ($this->lblIdMessage = QType::Cast($mixValue, 'QControl'));
					case 'IdUserControl':
						return ($this->lstIdUserObject = QType::Cast($mixValue, 'QControl'));
					case 'TypeControl':
						return ($this->txtType = QType::Cast($mixValue, 'QControl'));
					case 'BodyControl':
						return ($this->txtBody = QType::Cast($mixValue, 'QControl'));
					case 'CreatedDateControl':
						return ($this->calCreatedDate = QType::Cast($mixValue, 'QControl'));
					case 'IsReadControl':
						return ($this->chkIsRead = QType::Cast($mixValue, 'QControl'));
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