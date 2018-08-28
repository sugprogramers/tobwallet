<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Owner class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Owner object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a OwnerMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 *
	 * @package My QCubed Application
	 * @subpackage MetaControls
	 * @property-read Owner $Owner the actual Owner data class being edited
	 * @property QLabel $IdOwnerControl
	 * @property-read QLabel $IdOwnerLabel
	 * @property QListBox $IdUserControl
	 * @property-read QLabel $IdUserLabel
	 * @property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * @property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class OwnerMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Owner objOwner
		 * @access protected
		 */
		protected $objOwner;
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

		// Controls that allow the editing of Owner's individual data fields
		/**
		 * @var QLabel lblIdOwner
		 * @access protected
		 */
		protected $lblIdOwner;
		/**
		 * @var QListBox lstIdUserObject
		 * @access protected
		 */
		protected $lstIdUserObject;

		// Controls that allow the viewing of Owner's individual data fields
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
		 * OwnerMetaControl to edit a single Owner object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Owner object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this OwnerMetaControl
		 * @param Owner $objOwner new or existing Owner object
		 */
		 public function __construct($objParentObject, Owner $objOwner) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this OwnerMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Owner object
			$this->objOwner = $objOwner;

			// Figure out if we're Editing or Creating New
			if ($this->objOwner->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this OwnerMetaControl
		 * @param integer $intIdOwner primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Owner object creation - defaults to CreateOrEdit
 		 * @return OwnerMetaControl
		 */
		public static function Create($objParentObject, $intIdOwner = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intIdOwner)) {
				$objOwner = Owner::Load($intIdOwner);

				// Owner was found -- return it!
				if ($objOwner)
					return new OwnerMetaControl($objParentObject, $objOwner);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Owner object with PK arguments: ' . $intIdOwner);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new OwnerMetaControl($objParentObject, new Owner());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this OwnerMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Owner object creation - defaults to CreateOrEdit
		 * @return OwnerMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdOwner = QApplication::PathInfo(0);
			return OwnerMetaControl::Create($objParentObject, $intIdOwner, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this OwnerMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Owner object creation - defaults to CreateOrEdit
		 * @return OwnerMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdOwner = QApplication::QueryString('intIdOwner');
			return OwnerMetaControl::Create($objParentObject, $intIdOwner, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblIdOwner
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIdOwner_Create($strControlId = null) {
			$this->lblIdOwner = new QLabel($this->objParentObject, $strControlId);
			$this->lblIdOwner->Name = QApplication::Translate('Id Owner');
			if ($this->blnEditMode)
				$this->lblIdOwner->Text = $this->objOwner->IdOwner;
			else
				$this->lblIdOwner->Text = 'N/A';
			return $this->lblIdOwner;
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
				if (($this->objOwner->IdUserObject) && ($this->objOwner->IdUserObject->IdUser == $objIdUserObject->IdUser))
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
			$this->lblIdUser->Text = ($this->objOwner->IdUserObject) ? $this->objOwner->IdUserObject->__toString() : null;
			$this->lblIdUser->Required = true;
			return $this->lblIdUser;
		}



		/**
		 * Refresh this MetaControl with Data from the local Owner object.
		 * @param boolean $blnReload reload Owner from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objOwner->Reload();

			if ($this->lblIdOwner) if ($this->blnEditMode) $this->lblIdOwner->Text = $this->objOwner->IdOwner;

			if ($this->lstIdUserObject) {
					$this->lstIdUserObject->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstIdUserObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objIdUserObjectArray = User::LoadAll();
				if ($objIdUserObjectArray) foreach ($objIdUserObjectArray as $objIdUserObject) {
					$objListItem = new QListItem($objIdUserObject->__toString(), $objIdUserObject->IdUser);
					if (($this->objOwner->IdUserObject) && ($this->objOwner->IdUserObject->IdUser == $objIdUserObject->IdUser))
						$objListItem->Selected = true;
					$this->lstIdUserObject->AddItem($objListItem);
				}
			}
			if ($this->lblIdUser) $this->lblIdUser->Text = ($this->objOwner->IdUserObject) ? $this->objOwner->IdUserObject->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC OWNER OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Owner instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveOwner() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstIdUserObject) $this->objOwner->IdUser = $this->lstIdUserObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Owner object
				$this->objOwner->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Owner instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteOwner() {
			$this->objOwner->Delete();
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
				case 'Owner': return $this->objOwner;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Owner fields -- will be created dynamically if not yet created
				case 'IdOwnerControl':
					if (!$this->lblIdOwner) return $this->lblIdOwner_Create();
					return $this->lblIdOwner;
				case 'IdOwnerLabel':
					if (!$this->lblIdOwner) return $this->lblIdOwner_Create();
					return $this->lblIdOwner;
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
					// Controls that point to Owner fields
					case 'IdOwnerControl':
						return ($this->lblIdOwner = QType::Cast($mixValue, 'QControl'));
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