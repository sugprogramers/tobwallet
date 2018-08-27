<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Client class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Client object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ClientMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 *
	 * @package My QCubed Application
	 * @subpackage MetaControls
	 * @property-read Client $Client the actual Client data class being edited
	 * @property QLabel $IdClientControl
	 * @property-read QLabel $IdClientLabel
	 * @property QListBox $IdUserControl
	 * @property-read QLabel $IdUserLabel
	 * @property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * @property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ClientMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Client objClient
		 * @access protected
		 */
		protected $objClient;
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

		// Controls that allow the editing of Client's individual data fields
		/**
		 * @var QLabel lblIdClient
		 * @access protected
		 */
		protected $lblIdClient;
		/**
		 * @var QListBox lstIdUserObject
		 * @access protected
		 */
		protected $lstIdUserObject;

		// Controls that allow the viewing of Client's individual data fields
		/**
		 * @var QLabel lblIdUser
		 * @access protected
		 */
		protected $lblIdUser;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ClientMetaControl to edit a single Client object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Client object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ClientMetaControl
		 * @param Client $objClient new or existing Client object
		 */
		 public function __construct($objParentObject, Client $objClient) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ClientMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Client object
			$this->objClient = $objClient;

			// Figure out if we're Editing or Creating New
			if ($this->objClient->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ClientMetaControl
		 * @param integer $intIdClient primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Client object creation - defaults to CreateOrEdit
 		 * @return ClientMetaControl
		 */
		public static function Create($objParentObject, $intIdClient = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intIdClient)) {
				$objClient = Client::Load($intIdClient);

				// Client was found -- return it!
				if ($objClient)
					return new ClientMetaControl($objParentObject, $objClient);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Client object with PK arguments: ' . $intIdClient);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ClientMetaControl($objParentObject, new Client());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ClientMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Client object creation - defaults to CreateOrEdit
		 * @return ClientMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdClient = QApplication::PathInfo(0);
			return ClientMetaControl::Create($objParentObject, $intIdClient, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ClientMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Client object creation - defaults to CreateOrEdit
		 * @return ClientMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdClient = QApplication::QueryString('intIdClient');
			return ClientMetaControl::Create($objParentObject, $intIdClient, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblIdClient
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIdClient_Create($strControlId = null) {
			$this->lblIdClient = new QLabel($this->objParentObject, $strControlId);
			$this->lblIdClient->Name = QApplication::Translate('Id Client');
			if ($this->blnEditMode)
				$this->lblIdClient->Text = $this->objClient->IdClient;
			else
				$this->lblIdClient->Text = 'N/A';
			return $this->lblIdClient;
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
				if (($this->objClient->IdUserObject) && ($this->objClient->IdUserObject->IdUser == $objIdUserObject->IdUser))
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
			$this->lblIdUser->Text = ($this->objClient->IdUserObject) ? $this->objClient->IdUserObject->__toString() : null;
			$this->lblIdUser->Required = true;
			return $this->lblIdUser;
		}



		/**
		 * Refresh this MetaControl with Data from the local Client object.
		 * @param boolean $blnReload reload Client from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objClient->Reload();

			if ($this->lblIdClient) if ($this->blnEditMode) $this->lblIdClient->Text = $this->objClient->IdClient;

			if ($this->lstIdUserObject) {
					$this->lstIdUserObject->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstIdUserObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objIdUserObjectArray = User::LoadAll();
				if ($objIdUserObjectArray) foreach ($objIdUserObjectArray as $objIdUserObject) {
					$objListItem = new QListItem($objIdUserObject->__toString(), $objIdUserObject->IdUser);
					if (($this->objClient->IdUserObject) && ($this->objClient->IdUserObject->IdUser == $objIdUserObject->IdUser))
						$objListItem->Selected = true;
					$this->lstIdUserObject->AddItem($objListItem);
				}
			}
			if ($this->lblIdUser) $this->lblIdUser->Text = ($this->objClient->IdUserObject) ? $this->objClient->IdUserObject->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC CLIENT OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Client instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveClient() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstIdUserObject) $this->objClient->IdUser = $this->lstIdUserObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Client object
				$this->objClient->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Client instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteClient() {
			$this->objClient->Delete();
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
				case 'Client': return $this->objClient;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Client fields -- will be created dynamically if not yet created
				case 'IdClientControl':
					if (!$this->lblIdClient) return $this->lblIdClient_Create();
					return $this->lblIdClient;
				case 'IdClientLabel':
					if (!$this->lblIdClient) return $this->lblIdClient_Create();
					return $this->lblIdClient;
				case 'IdUserControl':
					if (!$this->lstIdUserObject) return $this->lstIdUserObject_Create();
					return $this->lstIdUserObject;
				case 'IdUserLabel':
					if (!$this->lblIdUser) return $this->lblIdUser_Create();
					return $this->lblIdUser;
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
					// Controls that point to Client fields
					case 'IdClientControl':
						return ($this->lblIdClient = QType::Cast($mixValue, 'QControl'));
					case 'IdUserControl':
						return ($this->lstIdUserObject = QType::Cast($mixValue, 'QControl'));
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