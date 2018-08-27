<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Queueemail class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Queueemail object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a QueueemailMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 *
	 * @package My QCubed Application
	 * @subpackage MetaControls
	 * @property-read Queueemail $Queueemail the actual Queueemail data class being edited
	 * @property QLabel $IdQueueEmailControl
	 * @property-read QLabel $IdQueueEmailLabel
	 * @property QTextBox $ToControl
	 * @property-read QLabel $ToLabel
	 * @property QTextBox $SubjectControl
	 * @property-read QLabel $SubjectLabel
	 * @property QTextBox $BodyControl
	 * @property-read QLabel $BodyLabel
	 * @property QIntegerTextBox $StatusControl
	 * @property-read QLabel $StatusLabel
	 * @property QTextBox $LogControl
	 * @property-read QLabel $LogLabel
	 * @property QIntegerTextBox $IdUserControl
	 * @property-read QLabel $IdUserLabel
	 * @property QDateTimePicker $CreateDateTimeControl
	 * @property-read QLabel $CreateDateTimeLabel
	 * @property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * @property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class QueueemailMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Queueemail objQueueemail
		 * @access protected
		 */
		protected $objQueueemail;
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

		// Controls that allow the editing of Queueemail's individual data fields
		/**
		 * @var QLabel lblIdQueueEmail
		 * @access protected
		 */
		protected $lblIdQueueEmail;
		/**
		 * @var QTextBox txtTo
		 * @access protected
		 */
		protected $txtTo;
		/**
		 * @var QTextBox txtSubject
		 * @access protected
		 */
		protected $txtSubject;
		/**
		 * @var QTextBox txtBody
		 * @access protected
		 */
		protected $txtBody;
		/**
		 * @var QIntegerTextBox txtStatus
		 * @access protected
		 */
		protected $txtStatus;
		/**
		 * @var QTextBox txtLog
		 * @access protected
		 */
		protected $txtLog;
		/**
		 * @var QIntegerTextBox txtIdUser
		 * @access protected
		 */
		protected $txtIdUser;
		/**
		 * @var QDateTimePicker calCreateDateTime
		 * @access protected
		 */
		protected $calCreateDateTime;

		// Controls that allow the viewing of Queueemail's individual data fields
		/**
		 * @var QLabel lblTo
		 * @access protected
		 */
		protected $lblTo;
		/**
		 * @var QLabel lblSubject
		 * @access protected
		 */
		protected $lblSubject;
		/**
		 * @var QLabel lblBody
		 * @access protected
		 */
		protected $lblBody;
		/**
		 * @var QLabel lblStatus
		 * @access protected
		 */
		protected $lblStatus;
		/**
		 * @var QLabel lblLog
		 * @access protected
		 */
		protected $lblLog;
		/**
		 * @var QLabel lblIdUser
		 * @access protected
		 */
		protected $lblIdUser;
		/**
		 * @var QLabel lblCreateDateTime
		 * @access protected
		 */
		protected $lblCreateDateTime;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * QueueemailMetaControl to edit a single Queueemail object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Queueemail object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this QueueemailMetaControl
		 * @param Queueemail $objQueueemail new or existing Queueemail object
		 */
		 public function __construct($objParentObject, Queueemail $objQueueemail) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this QueueemailMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Queueemail object
			$this->objQueueemail = $objQueueemail;

			// Figure out if we're Editing or Creating New
			if ($this->objQueueemail->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this QueueemailMetaControl
		 * @param integer $intIdQueueEmail primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Queueemail object creation - defaults to CreateOrEdit
 		 * @return QueueemailMetaControl
		 */
		public static function Create($objParentObject, $intIdQueueEmail = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intIdQueueEmail)) {
				$objQueueemail = Queueemail::Load($intIdQueueEmail);

				// Queueemail was found -- return it!
				if ($objQueueemail)
					return new QueueemailMetaControl($objParentObject, $objQueueemail);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Queueemail object with PK arguments: ' . $intIdQueueEmail);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new QueueemailMetaControl($objParentObject, new Queueemail());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this QueueemailMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Queueemail object creation - defaults to CreateOrEdit
		 * @return QueueemailMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdQueueEmail = QApplication::PathInfo(0);
			return QueueemailMetaControl::Create($objParentObject, $intIdQueueEmail, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this QueueemailMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Queueemail object creation - defaults to CreateOrEdit
		 * @return QueueemailMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intIdQueueEmail = QApplication::QueryString('intIdQueueEmail');
			return QueueemailMetaControl::Create($objParentObject, $intIdQueueEmail, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblIdQueueEmail
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIdQueueEmail_Create($strControlId = null) {
			$this->lblIdQueueEmail = new QLabel($this->objParentObject, $strControlId);
			$this->lblIdQueueEmail->Name = QApplication::Translate('Id Queue Email');
			if ($this->blnEditMode)
				$this->lblIdQueueEmail->Text = $this->objQueueemail->IdQueueEmail;
			else
				$this->lblIdQueueEmail->Text = 'N/A';
			return $this->lblIdQueueEmail;
		}

		/**
		 * Create and setup QTextBox txtTo
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtTo_Create($strControlId = null) {
			$this->txtTo = new QTextBox($this->objParentObject, $strControlId);
			$this->txtTo->Name = QApplication::Translate('To');
			$this->txtTo->Text = $this->objQueueemail->To;
			$this->txtTo->Required = true;
			$this->txtTo->MaxLength = Queueemail::ToMaxLength;
			return $this->txtTo;
		}

		/**
		 * Create and setup QLabel lblTo
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTo_Create($strControlId = null) {
			$this->lblTo = new QLabel($this->objParentObject, $strControlId);
			$this->lblTo->Name = QApplication::Translate('To');
			$this->lblTo->Text = $this->objQueueemail->To;
			$this->lblTo->Required = true;
			return $this->lblTo;
		}

		/**
		 * Create and setup QTextBox txtSubject
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtSubject_Create($strControlId = null) {
			$this->txtSubject = new QTextBox($this->objParentObject, $strControlId);
			$this->txtSubject->Name = QApplication::Translate('Subject');
			$this->txtSubject->Text = $this->objQueueemail->Subject;
			$this->txtSubject->Required = true;
			$this->txtSubject->MaxLength = Queueemail::SubjectMaxLength;
			return $this->txtSubject;
		}

		/**
		 * Create and setup QLabel lblSubject
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSubject_Create($strControlId = null) {
			$this->lblSubject = new QLabel($this->objParentObject, $strControlId);
			$this->lblSubject->Name = QApplication::Translate('Subject');
			$this->lblSubject->Text = $this->objQueueemail->Subject;
			$this->lblSubject->Required = true;
			return $this->lblSubject;
		}

		/**
		 * Create and setup QTextBox txtBody
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtBody_Create($strControlId = null) {
			$this->txtBody = new QTextBox($this->objParentObject, $strControlId);
			$this->txtBody->Name = QApplication::Translate('Body');
			$this->txtBody->Text = $this->objQueueemail->Body;
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
			$this->lblBody->Text = $this->objQueueemail->Body;
			$this->lblBody->Required = true;
			return $this->lblBody;
		}

		/**
		 * Create and setup QIntegerTextBox txtStatus
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtStatus_Create($strControlId = null) {
			$this->txtStatus = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtStatus->Name = QApplication::Translate('Status');
			$this->txtStatus->Text = $this->objQueueemail->Status;
			$this->txtStatus->Required = true;
			return $this->txtStatus;
		}

		/**
		 * Create and setup QLabel lblStatus
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblStatus_Create($strControlId = null, $strFormat = null) {
			$this->lblStatus = new QLabel($this->objParentObject, $strControlId);
			$this->lblStatus->Name = QApplication::Translate('Status');
			$this->lblStatus->Text = $this->objQueueemail->Status;
			$this->lblStatus->Required = true;
			$this->lblStatus->Format = $strFormat;
			return $this->lblStatus;
		}

		/**
		 * Create and setup QTextBox txtLog
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtLog_Create($strControlId = null) {
			$this->txtLog = new QTextBox($this->objParentObject, $strControlId);
			$this->txtLog->Name = QApplication::Translate('Log');
			$this->txtLog->Text = $this->objQueueemail->Log;
			$this->txtLog->Required = true;
			$this->txtLog->TextMode = QTextMode::MultiLine;
			return $this->txtLog;
		}

		/**
		 * Create and setup QLabel lblLog
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLog_Create($strControlId = null) {
			$this->lblLog = new QLabel($this->objParentObject, $strControlId);
			$this->lblLog->Name = QApplication::Translate('Log');
			$this->lblLog->Text = $this->objQueueemail->Log;
			$this->lblLog->Required = true;
			return $this->lblLog;
		}

		/**
		 * Create and setup QIntegerTextBox txtIdUser
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtIdUser_Create($strControlId = null) {
			$this->txtIdUser = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtIdUser->Name = QApplication::Translate('Id User');
			$this->txtIdUser->Text = $this->objQueueemail->IdUser;
			$this->txtIdUser->Required = true;
			return $this->txtIdUser;
		}

		/**
		 * Create and setup QLabel lblIdUser
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblIdUser_Create($strControlId = null, $strFormat = null) {
			$this->lblIdUser = new QLabel($this->objParentObject, $strControlId);
			$this->lblIdUser->Name = QApplication::Translate('Id User');
			$this->lblIdUser->Text = $this->objQueueemail->IdUser;
			$this->lblIdUser->Required = true;
			$this->lblIdUser->Format = $strFormat;
			return $this->lblIdUser;
		}

		/**
		 * Create and setup QDateTimePicker calCreateDateTime
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calCreateDateTime_Create($strControlId = null) {
			$this->calCreateDateTime = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calCreateDateTime->Name = QApplication::Translate('Create Date Time');
			$this->calCreateDateTime->DateTime = $this->objQueueemail->CreateDateTime;
			$this->calCreateDateTime->DateTimePickerType = QDateTimePickerType::DateTime;
			return $this->calCreateDateTime;
		}

		/**
		 * Create and setup QLabel lblCreateDateTime
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblCreateDateTime_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblCreateDateTime = new QLabel($this->objParentObject, $strControlId);
			$this->lblCreateDateTime->Name = QApplication::Translate('Create Date Time');
			$this->strCreateDateTimeDateTimeFormat = $strDateTimeFormat;
			$this->lblCreateDateTime->Text = sprintf($this->objQueueemail->CreateDateTime) ? $this->objQueueemail->CreateDateTime->qFormat($this->strCreateDateTimeDateTimeFormat) : null;
			return $this->lblCreateDateTime;
		}

		protected $strCreateDateTimeDateTimeFormat;




		/**
		 * Refresh this MetaControl with Data from the local Queueemail object.
		 * @param boolean $blnReload reload Queueemail from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objQueueemail->Reload();

			if ($this->lblIdQueueEmail) if ($this->blnEditMode) $this->lblIdQueueEmail->Text = $this->objQueueemail->IdQueueEmail;

			if ($this->txtTo) $this->txtTo->Text = $this->objQueueemail->To;
			if ($this->lblTo) $this->lblTo->Text = $this->objQueueemail->To;

			if ($this->txtSubject) $this->txtSubject->Text = $this->objQueueemail->Subject;
			if ($this->lblSubject) $this->lblSubject->Text = $this->objQueueemail->Subject;

			if ($this->txtBody) $this->txtBody->Text = $this->objQueueemail->Body;
			if ($this->lblBody) $this->lblBody->Text = $this->objQueueemail->Body;

			if ($this->txtStatus) $this->txtStatus->Text = $this->objQueueemail->Status;
			if ($this->lblStatus) $this->lblStatus->Text = $this->objQueueemail->Status;

			if ($this->txtLog) $this->txtLog->Text = $this->objQueueemail->Log;
			if ($this->lblLog) $this->lblLog->Text = $this->objQueueemail->Log;

			if ($this->txtIdUser) $this->txtIdUser->Text = $this->objQueueemail->IdUser;
			if ($this->lblIdUser) $this->lblIdUser->Text = $this->objQueueemail->IdUser;

			if ($this->calCreateDateTime) $this->calCreateDateTime->DateTime = $this->objQueueemail->CreateDateTime;
			if ($this->lblCreateDateTime) $this->lblCreateDateTime->Text = sprintf($this->objQueueemail->CreateDateTime) ? $this->objQueueemail->CreateDateTime->qFormat($this->strCreateDateTimeDateTimeFormat) : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC QUEUEEMAIL OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Queueemail instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveQueueemail() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtTo) $this->objQueueemail->To = $this->txtTo->Text;
				if ($this->txtSubject) $this->objQueueemail->Subject = $this->txtSubject->Text;
				if ($this->txtBody) $this->objQueueemail->Body = $this->txtBody->Text;
				if ($this->txtStatus) $this->objQueueemail->Status = $this->txtStatus->Text;
				if ($this->txtLog) $this->objQueueemail->Log = $this->txtLog->Text;
				if ($this->txtIdUser) $this->objQueueemail->IdUser = $this->txtIdUser->Text;
				if ($this->calCreateDateTime) $this->objQueueemail->CreateDateTime = $this->calCreateDateTime->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Queueemail object
				$this->objQueueemail->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Queueemail instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteQueueemail() {
			$this->objQueueemail->Delete();
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
				case 'Queueemail': return $this->objQueueemail;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Queueemail fields -- will be created dynamically if not yet created
				case 'IdQueueEmailControl':
					if (!$this->lblIdQueueEmail) return $this->lblIdQueueEmail_Create();
					return $this->lblIdQueueEmail;
				case 'IdQueueEmailLabel':
					if (!$this->lblIdQueueEmail) return $this->lblIdQueueEmail_Create();
					return $this->lblIdQueueEmail;
				case 'ToControl':
					if (!$this->txtTo) return $this->txtTo_Create();
					return $this->txtTo;
				case 'ToLabel':
					if (!$this->lblTo) return $this->lblTo_Create();
					return $this->lblTo;
				case 'SubjectControl':
					if (!$this->txtSubject) return $this->txtSubject_Create();
					return $this->txtSubject;
				case 'SubjectLabel':
					if (!$this->lblSubject) return $this->lblSubject_Create();
					return $this->lblSubject;
				case 'BodyControl':
					if (!$this->txtBody) return $this->txtBody_Create();
					return $this->txtBody;
				case 'BodyLabel':
					if (!$this->lblBody) return $this->lblBody_Create();
					return $this->lblBody;
				case 'StatusControl':
					if (!$this->txtStatus) return $this->txtStatus_Create();
					return $this->txtStatus;
				case 'StatusLabel':
					if (!$this->lblStatus) return $this->lblStatus_Create();
					return $this->lblStatus;
				case 'LogControl':
					if (!$this->txtLog) return $this->txtLog_Create();
					return $this->txtLog;
				case 'LogLabel':
					if (!$this->lblLog) return $this->lblLog_Create();
					return $this->lblLog;
				case 'IdUserControl':
					if (!$this->txtIdUser) return $this->txtIdUser_Create();
					return $this->txtIdUser;
				case 'IdUserLabel':
					if (!$this->lblIdUser) return $this->lblIdUser_Create();
					return $this->lblIdUser;
				case 'CreateDateTimeControl':
					if (!$this->calCreateDateTime) return $this->calCreateDateTime_Create();
					return $this->calCreateDateTime;
				case 'CreateDateTimeLabel':
					if (!$this->lblCreateDateTime) return $this->lblCreateDateTime_Create();
					return $this->lblCreateDateTime;
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
					// Controls that point to Queueemail fields
					case 'IdQueueEmailControl':
						return ($this->lblIdQueueEmail = QType::Cast($mixValue, 'QControl'));
					case 'ToControl':
						return ($this->txtTo = QType::Cast($mixValue, 'QControl'));
					case 'SubjectControl':
						return ($this->txtSubject = QType::Cast($mixValue, 'QControl'));
					case 'BodyControl':
						return ($this->txtBody = QType::Cast($mixValue, 'QControl'));
					case 'StatusControl':
						return ($this->txtStatus = QType::Cast($mixValue, 'QControl'));
					case 'LogControl':
						return ($this->txtLog = QType::Cast($mixValue, 'QControl'));
					case 'IdUserControl':
						return ($this->txtIdUser = QType::Cast($mixValue, 'QControl'));
					case 'CreateDateTimeControl':
						return ($this->calCreateDateTime = QType::Cast($mixValue, 'QControl'));
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