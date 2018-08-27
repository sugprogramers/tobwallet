<?php
	/**
	 * The abstract AdministratorGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Administrator subclass which
	 * extends this AdministratorGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Administrator class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $IdAdministrator the value for intIdAdministrator (Read-Only PK)
	 * @property string $Email the value for strEmail (Unique)
	 * @property string $Password the value for strPassword (Not Null)
	 * @property string $FirstName the value for strFirstName (Not Null)
	 * @property string $LastName the value for strLastName (Not Null)
	 * @property string $Address the value for strAddress (Not Null)
	 * @property string $Phone the value for strPhone (Not Null)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class AdministratorGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column administrator.IdAdministrator
		 * @var integer intIdAdministrator
		 */
		protected $intIdAdministrator;
		const IdAdministratorDefault = null;


		/**
		 * Protected member variable that maps to the database column administrator.Email
		 * @var string strEmail
		 */
		protected $strEmail;
		const EmailMaxLength = 50;
		const EmailDefault = null;


		/**
		 * Protected member variable that maps to the database column administrator.Password
		 * @var string strPassword
		 */
		protected $strPassword;
		const PasswordMaxLength = 50;
		const PasswordDefault = null;


		/**
		 * Protected member variable that maps to the database column administrator.FirstName
		 * @var string strFirstName
		 */
		protected $strFirstName;
		const FirstNameMaxLength = 70;
		const FirstNameDefault = null;


		/**
		 * Protected member variable that maps to the database column administrator.LastName
		 * @var string strLastName
		 */
		protected $strLastName;
		const LastNameMaxLength = 70;
		const LastNameDefault = null;


		/**
		 * Protected member variable that maps to the database column administrator.Address
		 * @var string strAddress
		 */
		protected $strAddress;
		const AddressMaxLength = 100;
		const AddressDefault = null;


		/**
		 * Protected member variable that maps to the database column administrator.Phone
		 * @var string strPhone
		 */
		protected $strPhone;
		const PhoneMaxLength = 9;
		const PhoneDefault = null;


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
			$this->intIdAdministrator = Administrator::IdAdministratorDefault;
			$this->strEmail = Administrator::EmailDefault;
			$this->strPassword = Administrator::PasswordDefault;
			$this->strFirstName = Administrator::FirstNameDefault;
			$this->strLastName = Administrator::LastNameDefault;
			$this->strAddress = Administrator::AddressDefault;
			$this->strPhone = Administrator::PhoneDefault;
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
		 * Load a Administrator from PK Info
		 * @param integer $intIdAdministrator
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Administrator
		 */
		public static function Load($intIdAdministrator, $objOptionalClauses = null) {
			// Use QuerySingle to Perform the Query
			return Administrator::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Administrator()->IdAdministrator, $intIdAdministrator)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load all Administrators
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Administrator[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Administrator::QueryArray to perform the LoadAll query
			try {
				return Administrator::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Administrators
		 * @return int
		 */
		public static function CountAll() {
			// Call Administrator::QueryCount to perform the CountAll query
			return Administrator::QueryCount(QQ::All());
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
			$objDatabase = Administrator::GetDatabase();

			// Create/Build out the QueryBuilder object with Administrator-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'administrator');
			Administrator::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('administrator');

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
		 * Static Qcubed Query method to query for a single Administrator object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Administrator the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Administrator::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Administrator object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Administrator::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Administrator::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Administrator objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Administrator[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Administrator::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Administrator::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of Administrator objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Administrator::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Administrator::GetDatabase();

			$strQuery = Administrator::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/administrator', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Administrator::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Administrator
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'administrator';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'IdAdministrator', $strAliasPrefix . 'IdAdministrator');
			$objBuilder->AddSelectItem($strTableName, 'Email', $strAliasPrefix . 'Email');
			$objBuilder->AddSelectItem($strTableName, 'Password', $strAliasPrefix . 'Password');
			$objBuilder->AddSelectItem($strTableName, 'FirstName', $strAliasPrefix . 'FirstName');
			$objBuilder->AddSelectItem($strTableName, 'LastName', $strAliasPrefix . 'LastName');
			$objBuilder->AddSelectItem($strTableName, 'Address', $strAliasPrefix . 'Address');
			$objBuilder->AddSelectItem($strTableName, 'Phone', $strAliasPrefix . 'Phone');
		}



		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Administrator from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Administrator::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Administrator
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}

			// Create a new instance of the Administrator object
			$objToReturn = new Administrator();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'IdAdministrator', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'IdAdministrator'] : $strAliasPrefix . 'IdAdministrator';
			$objToReturn->intIdAdministrator = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'Email', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Email'] : $strAliasPrefix . 'Email';
			$objToReturn->strEmail = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'Password', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Password'] : $strAliasPrefix . 'Password';
			$objToReturn->strPassword = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'FirstName', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'FirstName'] : $strAliasPrefix . 'FirstName';
			$objToReturn->strFirstName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'LastName', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'LastName'] : $strAliasPrefix . 'LastName';
			$objToReturn->strLastName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'Address', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Address'] : $strAliasPrefix . 'Address';
			$objToReturn->strAddress = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'Phone', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Phone'] : $strAliasPrefix . 'Phone';
			$objToReturn->strPhone = $objDbRow->GetColumn($strAliasName, 'VarChar');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->IdAdministrator != $objPreviousItem->IdAdministrator) {
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
				$strAliasPrefix = 'administrator__';




			return $objToReturn;
		}

		/**
		 * Instantiate an array of Administrators from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Administrator[]
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
					$objItem = Administrator::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Administrator::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}



		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Administrator object,
		 * by IdAdministrator Index(es)
		 * @param integer $intIdAdministrator
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Administrator
		*/
		public static function LoadByIdAdministrator($intIdAdministrator, $objOptionalClauses = null) {
			return Administrator::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Administrator()->IdAdministrator, $intIdAdministrator)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load a single Administrator object,
		 * by Email Index(es)
		 * @param string $strEmail
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Administrator
		*/
		public static function LoadByEmail($strEmail, $objOptionalClauses = null) {
			return Administrator::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Administrator()->Email, $strEmail)
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
		 * Save this Administrator
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Administrator::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `administrator` (
							`Email`,
							`Password`,
							`FirstName`,
							`LastName`,
							`Address`,
							`Phone`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strEmail) . ',
							' . $objDatabase->SqlVariable($this->strPassword) . ',
							' . $objDatabase->SqlVariable($this->strFirstName) . ',
							' . $objDatabase->SqlVariable($this->strLastName) . ',
							' . $objDatabase->SqlVariable($this->strAddress) . ',
							' . $objDatabase->SqlVariable($this->strPhone) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intIdAdministrator = $objDatabase->InsertId('administrator', 'IdAdministrator');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`administrator`
						SET
							`Email` = ' . $objDatabase->SqlVariable($this->strEmail) . ',
							`Password` = ' . $objDatabase->SqlVariable($this->strPassword) . ',
							`FirstName` = ' . $objDatabase->SqlVariable($this->strFirstName) . ',
							`LastName` = ' . $objDatabase->SqlVariable($this->strLastName) . ',
							`Address` = ' . $objDatabase->SqlVariable($this->strAddress) . ',
							`Phone` = ' . $objDatabase->SqlVariable($this->strPhone) . '
						WHERE
							`IdAdministrator` = ' . $objDatabase->SqlVariable($this->intIdAdministrator) . '
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
		 * Delete this Administrator
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intIdAdministrator)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Administrator with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Administrator::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`administrator`
				WHERE
					`IdAdministrator` = ' . $objDatabase->SqlVariable($this->intIdAdministrator) . '');
		}

		/**
		 * Delete all Administrators
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Administrator::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`administrator`');
		}

		/**
		 * Truncate administrator table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Administrator::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `administrator`');
		}

		/**
		 * Reload this Administrator from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Administrator object.');

			// Reload the Object
			$objReloaded = Administrator::Load($this->intIdAdministrator);

			// Update $this's local variables to match
			$this->strEmail = $objReloaded->strEmail;
			$this->strPassword = $objReloaded->strPassword;
			$this->strFirstName = $objReloaded->strFirstName;
			$this->strLastName = $objReloaded->strLastName;
			$this->strAddress = $objReloaded->strAddress;
			$this->strPhone = $objReloaded->strPhone;
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
				case 'IdAdministrator':
					/**
					 * Gets the value for intIdAdministrator (Read-Only PK)
					 * @return integer
					 */
					return $this->intIdAdministrator;

				case 'Email':
					/**
					 * Gets the value for strEmail (Unique)
					 * @return string
					 */
					return $this->strEmail;

				case 'Password':
					/**
					 * Gets the value for strPassword (Not Null)
					 * @return string
					 */
					return $this->strPassword;

				case 'FirstName':
					/**
					 * Gets the value for strFirstName (Not Null)
					 * @return string
					 */
					return $this->strFirstName;

				case 'LastName':
					/**
					 * Gets the value for strLastName (Not Null)
					 * @return string
					 */
					return $this->strLastName;

				case 'Address':
					/**
					 * Gets the value for strAddress (Not Null)
					 * @return string
					 */
					return $this->strAddress;

				case 'Phone':
					/**
					 * Gets the value for strPhone (Not Null)
					 * @return string
					 */
					return $this->strPhone;


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
				case 'Email':
					/**
					 * Sets the value for strEmail (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEmail = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Password':
					/**
					 * Sets the value for strPassword (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strPassword = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FirstName':
					/**
					 * Sets the value for strFirstName (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFirstName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LastName':
					/**
					 * Sets the value for strLastName (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strLastName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Address':
					/**
					 * Sets the value for strAddress (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strAddress = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Phone':
					/**
					 * Sets the value for strPhone (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strPhone = QType::Cast($mixValue, QType::String));
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
			$strToReturn = '<complexType name="Administrator"><sequence>';
			$strToReturn .= '<element name="IdAdministrator" type="xsd:int"/>';
			$strToReturn .= '<element name="Email" type="xsd:string"/>';
			$strToReturn .= '<element name="Password" type="xsd:string"/>';
			$strToReturn .= '<element name="FirstName" type="xsd:string"/>';
			$strToReturn .= '<element name="LastName" type="xsd:string"/>';
			$strToReturn .= '<element name="Address" type="xsd:string"/>';
			$strToReturn .= '<element name="Phone" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Administrator', $strComplexTypeArray)) {
				$strComplexTypeArray['Administrator'] = Administrator::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Administrator::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Administrator();
			if (property_exists($objSoapObject, 'IdAdministrator'))
				$objToReturn->intIdAdministrator = $objSoapObject->IdAdministrator;
			if (property_exists($objSoapObject, 'Email'))
				$objToReturn->strEmail = $objSoapObject->Email;
			if (property_exists($objSoapObject, 'Password'))
				$objToReturn->strPassword = $objSoapObject->Password;
			if (property_exists($objSoapObject, 'FirstName'))
				$objToReturn->strFirstName = $objSoapObject->FirstName;
			if (property_exists($objSoapObject, 'LastName'))
				$objToReturn->strLastName = $objSoapObject->LastName;
			if (property_exists($objSoapObject, 'Address'))
				$objToReturn->strAddress = $objSoapObject->Address;
			if (property_exists($objSoapObject, 'Phone'))
				$objToReturn->strPhone = $objSoapObject->Phone;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Administrator::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
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
			$iArray['IdAdministrator'] = $this->intIdAdministrator;
			$iArray['Email'] = $this->strEmail;
			$iArray['Password'] = $this->strPassword;
			$iArray['FirstName'] = $this->strFirstName;
			$iArray['LastName'] = $this->strLastName;
			$iArray['Address'] = $this->strAddress;
			$iArray['Phone'] = $this->strPhone;
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
     * @property-read QQNode $IdAdministrator
     * @property-read QQNode $Email
     * @property-read QQNode $Password
     * @property-read QQNode $FirstName
     * @property-read QQNode $LastName
     * @property-read QQNode $Address
     * @property-read QQNode $Phone
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeAdministrator extends QQNode {
		protected $strTableName = 'administrator';
		protected $strPrimaryKey = 'IdAdministrator';
		protected $strClassName = 'Administrator';
		public function __get($strName) {
			switch ($strName) {
				case 'IdAdministrator':
					return new QQNode('IdAdministrator', 'IdAdministrator', 'Integer', $this);
				case 'Email':
					return new QQNode('Email', 'Email', 'VarChar', $this);
				case 'Password':
					return new QQNode('Password', 'Password', 'VarChar', $this);
				case 'FirstName':
					return new QQNode('FirstName', 'FirstName', 'VarChar', $this);
				case 'LastName':
					return new QQNode('LastName', 'LastName', 'VarChar', $this);
				case 'Address':
					return new QQNode('Address', 'Address', 'VarChar', $this);
				case 'Phone':
					return new QQNode('Phone', 'Phone', 'VarChar', $this);

				case '_PrimaryKeyNode':
					return new QQNode('IdAdministrator', 'IdAdministrator', 'Integer', $this);
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
     * @property-read QQNode $IdAdministrator
     * @property-read QQNode $Email
     * @property-read QQNode $Password
     * @property-read QQNode $FirstName
     * @property-read QQNode $LastName
     * @property-read QQNode $Address
     * @property-read QQNode $Phone
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeAdministrator extends QQReverseReferenceNode {
		protected $strTableName = 'administrator';
		protected $strPrimaryKey = 'IdAdministrator';
		protected $strClassName = 'Administrator';
		public function __get($strName) {
			switch ($strName) {
				case 'IdAdministrator':
					return new QQNode('IdAdministrator', 'IdAdministrator', 'integer', $this);
				case 'Email':
					return new QQNode('Email', 'Email', 'string', $this);
				case 'Password':
					return new QQNode('Password', 'Password', 'string', $this);
				case 'FirstName':
					return new QQNode('FirstName', 'FirstName', 'string', $this);
				case 'LastName':
					return new QQNode('LastName', 'LastName', 'string', $this);
				case 'Address':
					return new QQNode('Address', 'Address', 'string', $this);
				case 'Phone':
					return new QQNode('Phone', 'Phone', 'string', $this);

				case '_PrimaryKeyNode':
					return new QQNode('IdAdministrator', 'IdAdministrator', 'integer', $this);
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
