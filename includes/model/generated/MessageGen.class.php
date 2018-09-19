<?php
	/**
	 * The abstract MessageGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Message subclass which
	 * extends this MessageGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Message class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $IdMessage the value for intIdMessage (Read-Only PK)
	 * @property integer $IdUser the value for intIdUser (Not Null)
	 * @property integer $Type the value for intType (Not Null)
	 * @property string $Body the value for strBody (Not Null)
	 * @property QDateTime $CreatedDate the value for dttCreatedDate (Not Null)
	 * @property boolean $IsRead the value for blnIsRead 
	 * @property User $IdUserObject the value for the User object referenced by intIdUser (Not Null)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class MessageGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column message.IdMessage
		 * @var integer intIdMessage
		 */
		protected $intIdMessage;
		const IdMessageDefault = null;


		/**
		 * Protected member variable that maps to the database column message.IdUser
		 * @var integer intIdUser
		 */
		protected $intIdUser;
		const IdUserDefault = null;


		/**
		 * Protected member variable that maps to the database column message.Type
		 * @var integer intType
		 */
		protected $intType;
		const TypeDefault = null;


		/**
		 * Protected member variable that maps to the database column message.Body
		 * @var string strBody
		 */
		protected $strBody;
		const BodyDefault = null;


		/**
		 * Protected member variable that maps to the database column message.CreatedDate
		 * @var QDateTime dttCreatedDate
		 */
		protected $dttCreatedDate;
		const CreatedDateDefault = null;


		/**
		 * Protected member variable that maps to the database column message.IsRead
		 * @var boolean blnIsRead
		 */
		protected $blnIsRead;
		const IsReadDefault = null;


		/**
		 * Protected array of virtual attributes for this object (e.g. extra/other calculated and/or non-object bound
		 * columns from the run-time database query result for this object).  Used by InstantiateDbRow and
		 * GetVirtualAttribute.
		 * @var string[] $__strVirtualAttributeArray
		 */
		protected $__strVirtualAttributeArray = array();

		/**
		 * Protected internal member variable that specifies whether or not this object is Restored from the database.
		 * Used by Save() to determine if Save() should perform a db UPDATE or INSERT.
		 * @var bool __blnRestored;
		 */
		protected $__blnRestored;




		///////////////////////////////
		// PROTECTED MEMBER OBJECTS
		///////////////////////////////

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column message.IdUser.
		 *
		 * NOTE: Always use the IdUserObject property getter to correctly retrieve this User object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var User objIdUserObject
		 */
		protected $objIdUserObject;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intIdMessage = Message::IdMessageDefault;
			$this->intIdUser = Message::IdUserDefault;
			$this->intType = Message::TypeDefault;
			$this->strBody = Message::BodyDefault;
			$this->dttCreatedDate = (Message::CreatedDateDefault === null)?null:new QDateTime(Message::CreatedDateDefault);
			$this->blnIsRead = Message::IsReadDefault;
		}


		///////////////////////////////
		// CLASS-WIDE LOAD AND COUNT METHODS
		///////////////////////////////

		/**
		 * Static method to retrieve the Database object that owns this class.
		 * @return QDatabaseBase reference to the Database object that can query this class
		 */
		public static function GetDatabase() {
			return QApplication::$Database[1];
		}

		/**
		 * Load a Message from PK Info
		 * @param integer $intIdMessage
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Message
		 */
		public static function Load($intIdMessage, $objOptionalClauses = null) {
			// Use QuerySingle to Perform the Query
			return Message::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Message()->IdMessage, $intIdMessage)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load all Messages
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Message[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Message::QueryArray to perform the LoadAll query
			try {
				return Message::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Messages
		 * @return int
		 */
		public static function CountAll() {
			// Call Message::QueryCount to perform the CountAll query
			return Message::QueryCount(QQ::All());
		}




		///////////////////////////////
		// QCUBED QUERY-RELATED METHODS
		///////////////////////////////

		/**
		 * Internally called method to assist with calling Qcubed Query for this class
		 * on load methods.
		 * @param QQueryBuilder &$objQueryBuilder the QueryBuilder object that will be created
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause object or array of QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with (sending in null will skip the PrepareStatement step)
		 * @param boolean $blnCountOnly only select a rowcount
		 * @return string the query statement
		 */
		protected static function BuildQueryStatement(&$objQueryBuilder, QQCondition $objConditions, $objOptionalClauses, $mixParameterArray, $blnCountOnly) {
			// Get the Database Object for this Class
			$objDatabase = Message::GetDatabase();

			// Create/Build out the QueryBuilder object with Message-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'message');
			Message::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('message');

			// Set "CountOnly" option (if applicable)
			if ($blnCountOnly)
				$objQueryBuilder->SetCountOnlyFlag();

			// Apply Any Conditions
			if ($objConditions)
				try {
					$objConditions->UpdateQueryBuilder($objQueryBuilder);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

			// Iterate through all the Optional Clauses (if any) and perform accordingly
			if ($objOptionalClauses) {
				if ($objOptionalClauses instanceof QQClause)
					$objOptionalClauses->UpdateQueryBuilder($objQueryBuilder);
				else if (is_array($objOptionalClauses))
					foreach ($objOptionalClauses as $objClause)
						$objClause->UpdateQueryBuilder($objQueryBuilder);
				else
					throw new QCallerException('Optional Clauses must be a QQClause object or an array of QQClause objects');
			}

			// Get the SQL Statement
			$strQuery = $objQueryBuilder->GetStatement();

			// Prepare the Statement with the Query Parameters (if applicable)
			if ($mixParameterArray) {
				if (is_array($mixParameterArray)) {
					if (count($mixParameterArray))
						$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

					// Ensure that there are no other Unresolved Named Parameters
					if (strpos($strQuery, chr(QQNamedValue::DelimiterCode) . '{') !== false)
						throw new QCallerException('Unresolved named parameters in the query');
				} else
					throw new QCallerException('Parameter Array must be an array of name-value parameter pairs');
			}

			// Return the Objects
			return $strQuery;
		}

		/**
		 * Static Qcubed Query method to query for a single Message object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Message the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Message::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Message object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Message::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;
				}
				if (count($objToReturn)) {
					// Since we only want the object to return, lets return the object and not the array.
					return $objToReturn[0];
				} else {
					return null;
				}
			} else {
				// No expands just return the first row
				$objDbRow = $objDbResult->GetNextRow();
				if(null === $objDbRow)
					return null;
				return Message::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Message objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Message[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Message::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Message::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of Message objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Message::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and return the row_count
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Figure out if the query is using GroupBy
			$blnGrouped = false;

			if ($objOptionalClauses) foreach ($objOptionalClauses as $objClause) {
				if ($objClause instanceof QQGroupBy) {
					$blnGrouped = true;
					break;
				}
			}

			if ($blnGrouped)
				// Groups in this query - return the count of Groups (which is the count of all rows)
				return $objDbResult->CountRows();
			else {
				// No Groups - return the sql-calculated count(*) value
				$strDbRow = $objDbResult->FetchRow();
				return QType::Cast($strDbRow[0], QType::Integer);
			}
		}

		public static function QueryArrayCached(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Message::GetDatabase();

			$strQuery = Message::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/message', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Message::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Message
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'message';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'IdMessage', $strAliasPrefix . 'IdMessage');
			$objBuilder->AddSelectItem($strTableName, 'IdUser', $strAliasPrefix . 'IdUser');
			$objBuilder->AddSelectItem($strTableName, 'Type', $strAliasPrefix . 'Type');
			$objBuilder->AddSelectItem($strTableName, 'Body', $strAliasPrefix . 'Body');
			$objBuilder->AddSelectItem($strTableName, 'CreatedDate', $strAliasPrefix . 'CreatedDate');
			$objBuilder->AddSelectItem($strTableName, 'IsRead', $strAliasPrefix . 'IsRead');
		}



		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Message from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Message::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Message
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}

			// Create a new instance of the Message object
			$objToReturn = new Message();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'IdMessage', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'IdMessage'] : $strAliasPrefix . 'IdMessage';
			$objToReturn->intIdMessage = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'IdUser', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'IdUser'] : $strAliasPrefix . 'IdUser';
			$objToReturn->intIdUser = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'Type', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Type'] : $strAliasPrefix . 'Type';
			$objToReturn->intType = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'Body', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Body'] : $strAliasPrefix . 'Body';
			$objToReturn->strBody = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'CreatedDate', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'CreatedDate'] : $strAliasPrefix . 'CreatedDate';
			$objToReturn->dttCreatedDate = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'IsRead', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'IsRead'] : $strAliasPrefix . 'IsRead';
			$objToReturn->blnIsRead = $objDbRow->GetColumn($strAliasName, 'Bit');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->IdMessage != $objPreviousItem->IdMessage) {
						continue;
					}

					// complete match - all primary key columns are the same
					return null;
				}
			}

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'message__';

			// Check for IdUserObject Early Binding
			$strAlias = $strAliasPrefix . 'IdUser__IdUser';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdUserObject = User::InstantiateDbRow($objDbRow, $strAliasPrefix . 'IdUser__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of Messages from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Message[]
		 */
		public static function InstantiateDbResult(QDatabaseResultBase $objDbResult, $strExpandAsArrayNodes = null, $strColumnAliasArray = null) {
			$objToReturn = array();

			if (!$strColumnAliasArray)
				$strColumnAliasArray = array();

			// If blank resultset, then return empty array
			if (!$objDbResult)
				return $objToReturn;

			// Load up the return array with each row
			if ($strExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Message::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Message::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}



		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Message object,
		 * by IdMessage Index(es)
		 * @param integer $intIdMessage
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Message
		*/
		public static function LoadByIdMessage($intIdMessage, $objOptionalClauses = null) {
			return Message::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Message()->IdMessage, $intIdMessage)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Message objects,
		 * by IdUser Index(es)
		 * @param integer $intIdUser
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Message[]
		*/
		public static function LoadArrayByIdUser($intIdUser, $objOptionalClauses = null) {
			// Call Message::QueryArray to perform the LoadArrayByIdUser query
			try {
				return Message::QueryArray(
					QQ::Equal(QQN::Message()->IdUser, $intIdUser),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Messages
		 * by IdUser Index(es)
		 * @param integer $intIdUser
		 * @return int
		*/
		public static function CountByIdUser($intIdUser) {
			// Call Message::QueryCount to perform the CountByIdUser query
			return Message::QueryCount(
				QQ::Equal(QQN::Message()->IdUser, $intIdUser)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Message
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Message::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `message` (
							`IdUser`,
							`Type`,
							`Body`,
							`CreatedDate`,
							`IsRead`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intIdUser) . ',
							' . $objDatabase->SqlVariable($this->intType) . ',
							' . $objDatabase->SqlVariable($this->strBody) . ',
							' . $objDatabase->SqlVariable($this->dttCreatedDate) . ',
							' . $objDatabase->SqlVariable($this->blnIsRead) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intIdMessage = $objDatabase->InsertId('message', 'IdMessage');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`message`
						SET
							`IdUser` = ' . $objDatabase->SqlVariable($this->intIdUser) . ',
							`Type` = ' . $objDatabase->SqlVariable($this->intType) . ',
							`Body` = ' . $objDatabase->SqlVariable($this->strBody) . ',
							`CreatedDate` = ' . $objDatabase->SqlVariable($this->dttCreatedDate) . ',
							`IsRead` = ' . $objDatabase->SqlVariable($this->blnIsRead) . '
						WHERE
							`IdMessage` = ' . $objDatabase->SqlVariable($this->intIdMessage) . '
					');
				}

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;


			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this Message
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intIdMessage)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Message with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Message::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`message`
				WHERE
					`IdMessage` = ' . $objDatabase->SqlVariable($this->intIdMessage) . '');
		}

		/**
		 * Delete all Messages
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Message::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`message`');
		}

		/**
		 * Truncate message table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Message::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `message`');
		}

		/**
		 * Reload this Message from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Message object.');

			// Reload the Object
			$objReloaded = Message::Load($this->intIdMessage);

			// Update $this's local variables to match
			$this->IdUser = $objReloaded->IdUser;
			$this->intType = $objReloaded->intType;
			$this->strBody = $objReloaded->strBody;
			$this->dttCreatedDate = $objReloaded->dttCreatedDate;
			$this->blnIsRead = $objReloaded->blnIsRead;
		}



		////////////////////
		// PUBLIC OVERRIDERS
		////////////////////

				/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'IdMessage':
					/**
					 * Gets the value for intIdMessage (Read-Only PK)
					 * @return integer
					 */
					return $this->intIdMessage;

				case 'IdUser':
					/**
					 * Gets the value for intIdUser (Not Null)
					 * @return integer
					 */
					return $this->intIdUser;

				case 'Type':
					/**
					 * Gets the value for intType (Not Null)
					 * @return integer
					 */
					return $this->intType;

				case 'Body':
					/**
					 * Gets the value for strBody (Not Null)
					 * @return string
					 */
					return $this->strBody;

				case 'CreatedDate':
					/**
					 * Gets the value for dttCreatedDate (Not Null)
					 * @return QDateTime
					 */
					return $this->dttCreatedDate;

				case 'IsRead':
					/**
					 * Gets the value for blnIsRead 
					 * @return boolean
					 */
					return $this->blnIsRead;


				///////////////////
				// Member Objects
				///////////////////
				case 'IdUserObject':
					/**
					 * Gets the value for the User object referenced by intIdUser (Not Null)
					 * @return User
					 */
					try {
						if ((!$this->objIdUserObject) && (!is_null($this->intIdUser)))
							$this->objIdUserObject = User::Load($this->intIdUser);
						return $this->objIdUserObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////


				case '__Restored':
					return $this->__blnRestored;

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
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'IdUser':
					/**
					 * Sets the value for intIdUser (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objIdUserObject = null;
						return ($this->intIdUser = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Type':
					/**
					 * Sets the value for intType (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intType = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Body':
					/**
					 * Sets the value for strBody (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strBody = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreatedDate':
					/**
					 * Sets the value for dttCreatedDate (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttCreatedDate = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'IsRead':
					/**
					 * Sets the value for blnIsRead 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnIsRead = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'IdUserObject':
					/**
					 * Sets the value for the User object referenced by intIdUser (Not Null)
					 * @param User $mixValue
					 * @return User
					 */
					if (is_null($mixValue)) {
						$this->intIdUser = null;
						$this->objIdUserObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a User object
						try {
							$mixValue = QType::Cast($mixValue, 'User');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED User object
						if (is_null($mixValue->IdUser))
							throw new QCallerException('Unable to set an unsaved IdUserObject for this Message');

						// Update Local Member Variables
						$this->objIdUserObject = $mixValue;
						$this->intIdUser = $mixValue->IdUser;

						// Return $mixValue
						return $mixValue;
					}
					break;

				default:
					try {
						return parent::__set($strName, $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Lookup a VirtualAttribute value (if applicable).  Returns NULL if none found.
		 * @param string $strName
		 * @return string
		 */
		public function GetVirtualAttribute($strName) {
			if (array_key_exists($strName, $this->__strVirtualAttributeArray))
				return $this->__strVirtualAttributeArray[$strName];
			return null;
		}



		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Message"><sequence>';
			$strToReturn .= '<element name="IdMessage" type="xsd:int"/>';
			$strToReturn .= '<element name="IdUserObject" type="xsd1:User"/>';
			$strToReturn .= '<element name="Type" type="xsd:int"/>';
			$strToReturn .= '<element name="Body" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="IsRead" type="xsd:boolean"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Message', $strComplexTypeArray)) {
				$strComplexTypeArray['Message'] = Message::GetSoapComplexTypeXml();
				User::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Message::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Message();
			if (property_exists($objSoapObject, 'IdMessage'))
				$objToReturn->intIdMessage = $objSoapObject->IdMessage;
			if ((property_exists($objSoapObject, 'IdUserObject')) &&
				($objSoapObject->IdUserObject))
				$objToReturn->IdUserObject = User::GetObjectFromSoapObject($objSoapObject->IdUserObject);
			if (property_exists($objSoapObject, 'Type'))
				$objToReturn->intType = $objSoapObject->Type;
			if (property_exists($objSoapObject, 'Body'))
				$objToReturn->strBody = $objSoapObject->Body;
			if (property_exists($objSoapObject, 'CreatedDate'))
				$objToReturn->dttCreatedDate = new QDateTime($objSoapObject->CreatedDate);
			if (property_exists($objSoapObject, 'IsRead'))
				$objToReturn->blnIsRead = $objSoapObject->IsRead;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Message::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objIdUserObject)
				$objObject->objIdUserObject = User::GetSoapObjectFromObject($objObject->objIdUserObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIdUser = null;
			if ($objObject->dttCreatedDate)
				$objObject->dttCreatedDate = $objObject->dttCreatedDate->qFormat(QDateTime::FormatSoap);
			return $objObject;
		}


		////////////////////////////////////////
		// METHODS for JSON Object Translation
		////////////////////////////////////////

		// this function is required for objects that implement the
		// IteratorAggregate interface
		public function getIterator() {
			///////////////////
			// Member Variables
			///////////////////
			$iArray['IdMessage'] = $this->intIdMessage;
			$iArray['IdUser'] = $this->intIdUser;
			$iArray['Type'] = $this->intType;
			$iArray['Body'] = $this->strBody;
			$iArray['CreatedDate'] = $this->dttCreatedDate;
			$iArray['IsRead'] = $this->blnIsRead;
			return new ArrayIterator($iArray);
		}

		// this function returns a Json formatted string using the
		// IteratorAggregate interface
		public function getJson() {
			return json_encode($this->getIterator());
		}


	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $IdMessage
     * @property-read QQNode $IdUser
     * @property-read QQNodeUser $IdUserObject
     * @property-read QQNode $Type
     * @property-read QQNode $Body
     * @property-read QQNode $CreatedDate
     * @property-read QQNode $IsRead
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeMessage extends QQNode {
		protected $strTableName = 'message';
		protected $strPrimaryKey = 'IdMessage';
		protected $strClassName = 'Message';
		public function __get($strName) {
			switch ($strName) {
				case 'IdMessage':
					return new QQNode('IdMessage', 'IdMessage', 'Integer', $this);
				case 'IdUser':
					return new QQNode('IdUser', 'IdUser', 'Integer', $this);
				case 'IdUserObject':
					return new QQNodeUser('IdUser', 'IdUserObject', 'Integer', $this);
				case 'Type':
					return new QQNode('Type', 'Type', 'Integer', $this);
				case 'Body':
					return new QQNode('Body', 'Body', 'Blob', $this);
				case 'CreatedDate':
					return new QQNode('CreatedDate', 'CreatedDate', 'DateTime', $this);
				case 'IsRead':
					return new QQNode('IsRead', 'IsRead', 'Bit', $this);

				case '_PrimaryKeyNode':
					return new QQNode('IdMessage', 'IdMessage', 'Integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

    /**
     * @property-read QQNode $IdMessage
     * @property-read QQNode $IdUser
     * @property-read QQNodeUser $IdUserObject
     * @property-read QQNode $Type
     * @property-read QQNode $Body
     * @property-read QQNode $CreatedDate
     * @property-read QQNode $IsRead
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeMessage extends QQReverseReferenceNode {
		protected $strTableName = 'message';
		protected $strPrimaryKey = 'IdMessage';
		protected $strClassName = 'Message';
		public function __get($strName) {
			switch ($strName) {
				case 'IdMessage':
					return new QQNode('IdMessage', 'IdMessage', 'integer', $this);
				case 'IdUser':
					return new QQNode('IdUser', 'IdUser', 'integer', $this);
				case 'IdUserObject':
					return new QQNodeUser('IdUser', 'IdUserObject', 'integer', $this);
				case 'Type':
					return new QQNode('Type', 'Type', 'integer', $this);
				case 'Body':
					return new QQNode('Body', 'Body', 'string', $this);
				case 'CreatedDate':
					return new QQNode('CreatedDate', 'CreatedDate', 'QDateTime', $this);
				case 'IsRead':
					return new QQNode('IsRead', 'IsRead', 'boolean', $this);

				case '_PrimaryKeyNode':
					return new QQNode('IdMessage', 'IdMessage', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

?>
