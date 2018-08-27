<?php
	/**
	 * The abstract QueueemailGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Queueemail subclass which
	 * extends this QueueemailGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Queueemail class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $IdQueueEmail the value for intIdQueueEmail (Read-Only PK)
	 * @property string $To the value for strTo (Not Null)
	 * @property string $Subject the value for strSubject (Not Null)
	 * @property string $Body the value for strBody (Not Null)
	 * @property integer $Status the value for intStatus (Not Null)
	 * @property string $Log the value for strLog (Not Null)
	 * @property integer $IdUser the value for intIdUser (Not Null)
	 * @property QDateTime $CreateDateTime the value for dttCreateDateTime 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class QueueemailGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column queueemail.IdQueueEmail
		 * @var integer intIdQueueEmail
		 */
		protected $intIdQueueEmail;
		const IdQueueEmailDefault = null;


		/**
		 * Protected member variable that maps to the database column queueemail.To
		 * @var string strTo
		 */
		protected $strTo;
		const ToMaxLength = 50;
		const ToDefault = null;


		/**
		 * Protected member variable that maps to the database column queueemail.Subject
		 * @var string strSubject
		 */
		protected $strSubject;
		const SubjectMaxLength = 200;
		const SubjectDefault = null;


		/**
		 * Protected member variable that maps to the database column queueemail.Body
		 * @var string strBody
		 */
		protected $strBody;
		const BodyDefault = null;


		/**
		 * Protected member variable that maps to the database column queueemail.Status
		 * @var integer intStatus
		 */
		protected $intStatus;
		const StatusDefault = null;


		/**
		 * Protected member variable that maps to the database column queueemail.Log
		 * @var string strLog
		 */
		protected $strLog;
		const LogDefault = null;


		/**
		 * Protected member variable that maps to the database column queueemail.IdUser
		 * @var integer intIdUser
		 */
		protected $intIdUser;
		const IdUserDefault = null;


		/**
		 * Protected member variable that maps to the database column queueemail.CreateDateTime
		 * @var QDateTime dttCreateDateTime
		 */
		protected $dttCreateDateTime;
		const CreateDateTimeDefault = null;


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
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intIdQueueEmail = Queueemail::IdQueueEmailDefault;
			$this->strTo = Queueemail::ToDefault;
			$this->strSubject = Queueemail::SubjectDefault;
			$this->strBody = Queueemail::BodyDefault;
			$this->intStatus = Queueemail::StatusDefault;
			$this->strLog = Queueemail::LogDefault;
			$this->intIdUser = Queueemail::IdUserDefault;
			$this->dttCreateDateTime = (Queueemail::CreateDateTimeDefault === null)?null:new QDateTime(Queueemail::CreateDateTimeDefault);
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
		 * Load a Queueemail from PK Info
		 * @param integer $intIdQueueEmail
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Queueemail
		 */
		public static function Load($intIdQueueEmail, $objOptionalClauses = null) {
			// Use QuerySingle to Perform the Query
			return Queueemail::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Queueemail()->IdQueueEmail, $intIdQueueEmail)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load all Queueemails
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Queueemail[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Queueemail::QueryArray to perform the LoadAll query
			try {
				return Queueemail::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Queueemails
		 * @return int
		 */
		public static function CountAll() {
			// Call Queueemail::QueryCount to perform the CountAll query
			return Queueemail::QueryCount(QQ::All());
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
			$objDatabase = Queueemail::GetDatabase();

			// Create/Build out the QueryBuilder object with Queueemail-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'queueemail');
			Queueemail::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('queueemail');

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
		 * Static Qcubed Query method to query for a single Queueemail object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Queueemail the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Queueemail::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Queueemail object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Queueemail::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Queueemail::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Queueemail objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Queueemail[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Queueemail::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Queueemail::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of Queueemail objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Queueemail::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Queueemail::GetDatabase();

			$strQuery = Queueemail::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/queueemail', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Queueemail::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Queueemail
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'queueemail';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'IdQueueEmail', $strAliasPrefix . 'IdQueueEmail');
			$objBuilder->AddSelectItem($strTableName, 'To', $strAliasPrefix . 'To');
			$objBuilder->AddSelectItem($strTableName, 'Subject', $strAliasPrefix . 'Subject');
			$objBuilder->AddSelectItem($strTableName, 'Body', $strAliasPrefix . 'Body');
			$objBuilder->AddSelectItem($strTableName, 'Status', $strAliasPrefix . 'Status');
			$objBuilder->AddSelectItem($strTableName, 'Log', $strAliasPrefix . 'Log');
			$objBuilder->AddSelectItem($strTableName, 'IdUser', $strAliasPrefix . 'IdUser');
			$objBuilder->AddSelectItem($strTableName, 'CreateDateTime', $strAliasPrefix . 'CreateDateTime');
		}



		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Queueemail from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Queueemail::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Queueemail
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}

			// Create a new instance of the Queueemail object
			$objToReturn = new Queueemail();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'IdQueueEmail', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'IdQueueEmail'] : $strAliasPrefix . 'IdQueueEmail';
			$objToReturn->intIdQueueEmail = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'To', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'To'] : $strAliasPrefix . 'To';
			$objToReturn->strTo = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'Subject', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Subject'] : $strAliasPrefix . 'Subject';
			$objToReturn->strSubject = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'Body', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Body'] : $strAliasPrefix . 'Body';
			$objToReturn->strBody = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'Status', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Status'] : $strAliasPrefix . 'Status';
			$objToReturn->intStatus = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'Log', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Log'] : $strAliasPrefix . 'Log';
			$objToReturn->strLog = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'IdUser', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'IdUser'] : $strAliasPrefix . 'IdUser';
			$objToReturn->intIdUser = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'CreateDateTime', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'CreateDateTime'] : $strAliasPrefix . 'CreateDateTime';
			$objToReturn->dttCreateDateTime = $objDbRow->GetColumn($strAliasName, 'DateTime');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->IdQueueEmail != $objPreviousItem->IdQueueEmail) {
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
				$strAliasPrefix = 'queueemail__';




			return $objToReturn;
		}

		/**
		 * Instantiate an array of Queueemails from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Queueemail[]
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
					$objItem = Queueemail::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Queueemail::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}



		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Queueemail object,
		 * by IdQueueEmail Index(es)
		 * @param integer $intIdQueueEmail
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Queueemail
		*/
		public static function LoadByIdQueueEmail($intIdQueueEmail, $objOptionalClauses = null) {
			return Queueemail::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Queueemail()->IdQueueEmail, $intIdQueueEmail)
				),
				$objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Queueemail
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Queueemail::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `queueemail` (
							`To`,
							`Subject`,
							`Body`,
							`Status`,
							`Log`,
							`IdUser`,
							`CreateDateTime`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strTo) . ',
							' . $objDatabase->SqlVariable($this->strSubject) . ',
							' . $objDatabase->SqlVariable($this->strBody) . ',
							' . $objDatabase->SqlVariable($this->intStatus) . ',
							' . $objDatabase->SqlVariable($this->strLog) . ',
							' . $objDatabase->SqlVariable($this->intIdUser) . ',
							' . $objDatabase->SqlVariable($this->dttCreateDateTime) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intIdQueueEmail = $objDatabase->InsertId('queueemail', 'IdQueueEmail');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`queueemail`
						SET
							`To` = ' . $objDatabase->SqlVariable($this->strTo) . ',
							`Subject` = ' . $objDatabase->SqlVariable($this->strSubject) . ',
							`Body` = ' . $objDatabase->SqlVariable($this->strBody) . ',
							`Status` = ' . $objDatabase->SqlVariable($this->intStatus) . ',
							`Log` = ' . $objDatabase->SqlVariable($this->strLog) . ',
							`IdUser` = ' . $objDatabase->SqlVariable($this->intIdUser) . ',
							`CreateDateTime` = ' . $objDatabase->SqlVariable($this->dttCreateDateTime) . '
						WHERE
							`IdQueueEmail` = ' . $objDatabase->SqlVariable($this->intIdQueueEmail) . '
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
		 * Delete this Queueemail
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intIdQueueEmail)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Queueemail with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Queueemail::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`queueemail`
				WHERE
					`IdQueueEmail` = ' . $objDatabase->SqlVariable($this->intIdQueueEmail) . '');
		}

		/**
		 * Delete all Queueemails
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Queueemail::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`queueemail`');
		}

		/**
		 * Truncate queueemail table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Queueemail::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `queueemail`');
		}

		/**
		 * Reload this Queueemail from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Queueemail object.');

			// Reload the Object
			$objReloaded = Queueemail::Load($this->intIdQueueEmail);

			// Update $this's local variables to match
			$this->strTo = $objReloaded->strTo;
			$this->strSubject = $objReloaded->strSubject;
			$this->strBody = $objReloaded->strBody;
			$this->intStatus = $objReloaded->intStatus;
			$this->strLog = $objReloaded->strLog;
			$this->intIdUser = $objReloaded->intIdUser;
			$this->dttCreateDateTime = $objReloaded->dttCreateDateTime;
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
				case 'IdQueueEmail':
					/**
					 * Gets the value for intIdQueueEmail (Read-Only PK)
					 * @return integer
					 */
					return $this->intIdQueueEmail;

				case 'To':
					/**
					 * Gets the value for strTo (Not Null)
					 * @return string
					 */
					return $this->strTo;

				case 'Subject':
					/**
					 * Gets the value for strSubject (Not Null)
					 * @return string
					 */
					return $this->strSubject;

				case 'Body':
					/**
					 * Gets the value for strBody (Not Null)
					 * @return string
					 */
					return $this->strBody;

				case 'Status':
					/**
					 * Gets the value for intStatus (Not Null)
					 * @return integer
					 */
					return $this->intStatus;

				case 'Log':
					/**
					 * Gets the value for strLog (Not Null)
					 * @return string
					 */
					return $this->strLog;

				case 'IdUser':
					/**
					 * Gets the value for intIdUser (Not Null)
					 * @return integer
					 */
					return $this->intIdUser;

				case 'CreateDateTime':
					/**
					 * Gets the value for dttCreateDateTime 
					 * @return QDateTime
					 */
					return $this->dttCreateDateTime;


				///////////////////
				// Member Objects
				///////////////////

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
				case 'To':
					/**
					 * Sets the value for strTo (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTo = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Subject':
					/**
					 * Sets the value for strSubject (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strSubject = QType::Cast($mixValue, QType::String));
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

				case 'Status':
					/**
					 * Sets the value for intStatus (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intStatus = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Log':
					/**
					 * Sets the value for strLog (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strLog = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'IdUser':
					/**
					 * Sets the value for intIdUser (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intIdUser = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreateDateTime':
					/**
					 * Sets the value for dttCreateDateTime 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttCreateDateTime = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
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
			$strToReturn = '<complexType name="Queueemail"><sequence>';
			$strToReturn .= '<element name="IdQueueEmail" type="xsd:int"/>';
			$strToReturn .= '<element name="To" type="xsd:string"/>';
			$strToReturn .= '<element name="Subject" type="xsd:string"/>';
			$strToReturn .= '<element name="Body" type="xsd:string"/>';
			$strToReturn .= '<element name="Status" type="xsd:int"/>';
			$strToReturn .= '<element name="Log" type="xsd:string"/>';
			$strToReturn .= '<element name="IdUser" type="xsd:int"/>';
			$strToReturn .= '<element name="CreateDateTime" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Queueemail', $strComplexTypeArray)) {
				$strComplexTypeArray['Queueemail'] = Queueemail::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Queueemail::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Queueemail();
			if (property_exists($objSoapObject, 'IdQueueEmail'))
				$objToReturn->intIdQueueEmail = $objSoapObject->IdQueueEmail;
			if (property_exists($objSoapObject, 'To'))
				$objToReturn->strTo = $objSoapObject->To;
			if (property_exists($objSoapObject, 'Subject'))
				$objToReturn->strSubject = $objSoapObject->Subject;
			if (property_exists($objSoapObject, 'Body'))
				$objToReturn->strBody = $objSoapObject->Body;
			if (property_exists($objSoapObject, 'Status'))
				$objToReturn->intStatus = $objSoapObject->Status;
			if (property_exists($objSoapObject, 'Log'))
				$objToReturn->strLog = $objSoapObject->Log;
			if (property_exists($objSoapObject, 'IdUser'))
				$objToReturn->intIdUser = $objSoapObject->IdUser;
			if (property_exists($objSoapObject, 'CreateDateTime'))
				$objToReturn->dttCreateDateTime = new QDateTime($objSoapObject->CreateDateTime);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Queueemail::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttCreateDateTime)
				$objObject->dttCreateDateTime = $objObject->dttCreateDateTime->qFormat(QDateTime::FormatSoap);
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
			$iArray['IdQueueEmail'] = $this->intIdQueueEmail;
			$iArray['To'] = $this->strTo;
			$iArray['Subject'] = $this->strSubject;
			$iArray['Body'] = $this->strBody;
			$iArray['Status'] = $this->intStatus;
			$iArray['Log'] = $this->strLog;
			$iArray['IdUser'] = $this->intIdUser;
			$iArray['CreateDateTime'] = $this->dttCreateDateTime;
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
     * @property-read QQNode $IdQueueEmail
     * @property-read QQNode $To
     * @property-read QQNode $Subject
     * @property-read QQNode $Body
     * @property-read QQNode $Status
     * @property-read QQNode $Log
     * @property-read QQNode $IdUser
     * @property-read QQNode $CreateDateTime
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeQueueemail extends QQNode {
		protected $strTableName = 'queueemail';
		protected $strPrimaryKey = 'IdQueueEmail';
		protected $strClassName = 'Queueemail';
		public function __get($strName) {
			switch ($strName) {
				case 'IdQueueEmail':
					return new QQNode('IdQueueEmail', 'IdQueueEmail', 'Integer', $this);
				case 'To':
					return new QQNode('To', 'To', 'VarChar', $this);
				case 'Subject':
					return new QQNode('Subject', 'Subject', 'VarChar', $this);
				case 'Body':
					return new QQNode('Body', 'Body', 'Blob', $this);
				case 'Status':
					return new QQNode('Status', 'Status', 'Integer', $this);
				case 'Log':
					return new QQNode('Log', 'Log', 'Blob', $this);
				case 'IdUser':
					return new QQNode('IdUser', 'IdUser', 'Integer', $this);
				case 'CreateDateTime':
					return new QQNode('CreateDateTime', 'CreateDateTime', 'DateTime', $this);

				case '_PrimaryKeyNode':
					return new QQNode('IdQueueEmail', 'IdQueueEmail', 'Integer', $this);
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
     * @property-read QQNode $IdQueueEmail
     * @property-read QQNode $To
     * @property-read QQNode $Subject
     * @property-read QQNode $Body
     * @property-read QQNode $Status
     * @property-read QQNode $Log
     * @property-read QQNode $IdUser
     * @property-read QQNode $CreateDateTime
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeQueueemail extends QQReverseReferenceNode {
		protected $strTableName = 'queueemail';
		protected $strPrimaryKey = 'IdQueueEmail';
		protected $strClassName = 'Queueemail';
		public function __get($strName) {
			switch ($strName) {
				case 'IdQueueEmail':
					return new QQNode('IdQueueEmail', 'IdQueueEmail', 'integer', $this);
				case 'To':
					return new QQNode('To', 'To', 'string', $this);
				case 'Subject':
					return new QQNode('Subject', 'Subject', 'string', $this);
				case 'Body':
					return new QQNode('Body', 'Body', 'string', $this);
				case 'Status':
					return new QQNode('Status', 'Status', 'integer', $this);
				case 'Log':
					return new QQNode('Log', 'Log', 'string', $this);
				case 'IdUser':
					return new QQNode('IdUser', 'IdUser', 'integer', $this);
				case 'CreateDateTime':
					return new QQNode('CreateDateTime', 'CreateDateTime', 'QDateTime', $this);

				case '_PrimaryKeyNode':
					return new QQNode('IdQueueEmail', 'IdQueueEmail', 'integer', $this);
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
