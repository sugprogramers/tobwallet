<?php
	/**
	 * The abstract BalanceGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Balance subclass which
	 * extends this BalanceGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Balance class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $IdBalance the value for intIdBalance (PK)
	 * @property QDateTime $Date the value for dttDate (Not Null)
	 * @property integer $IdClient the value for intIdClient (Not Null)
	 * @property integer $IdOrganization the value for intIdOrganization (Not Null)
	 * @property double $AmountExchangedCoins the value for fltAmountExchangedCoins (Not Null)
	 * @property Client $IdClientObject the value for the Client object referenced by intIdClient (Not Null)
	 * @property Organization $IdOrganizationObject the value for the Organization object referenced by intIdOrganization (Not Null)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class BalanceGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK column balance.IdBalance
		 * @var integer intIdBalance
		 */
		protected $intIdBalance;
		const IdBalanceDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var integer __intIdBalance;
		 */
		protected $__intIdBalance;

		/**
		 * Protected member variable that maps to the database column balance.Date
		 * @var QDateTime dttDate
		 */
		protected $dttDate;
		const DateDefault = null;


		/**
		 * Protected member variable that maps to the database column balance.IdClient
		 * @var integer intIdClient
		 */
		protected $intIdClient;
		const IdClientDefault = null;


		/**
		 * Protected member variable that maps to the database column balance.IdOrganization
		 * @var integer intIdOrganization
		 */
		protected $intIdOrganization;
		const IdOrganizationDefault = null;


		/**
		 * Protected member variable that maps to the database column balance.AmountExchangedCoins
		 * @var double fltAmountExchangedCoins
		 */
		protected $fltAmountExchangedCoins;
		const AmountExchangedCoinsDefault = null;


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
		 * in the database column balance.IdClient.
		 *
		 * NOTE: Always use the IdClientObject property getter to correctly retrieve this Client object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Client objIdClientObject
		 */
		protected $objIdClientObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column balance.IdOrganization.
		 *
		 * NOTE: Always use the IdOrganizationObject property getter to correctly retrieve this Organization object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Organization objIdOrganizationObject
		 */
		protected $objIdOrganizationObject;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intIdBalance = Balance::IdBalanceDefault;
			$this->dttDate = (Balance::DateDefault === null)?null:new QDateTime(Balance::DateDefault);
			$this->intIdClient = Balance::IdClientDefault;
			$this->intIdOrganization = Balance::IdOrganizationDefault;
			$this->fltAmountExchangedCoins = Balance::AmountExchangedCoinsDefault;
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
		 * Load a Balance from PK Info
		 * @param integer $intIdBalance
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Balance
		 */
		public static function Load($intIdBalance, $objOptionalClauses = null) {
			// Use QuerySingle to Perform the Query
			return Balance::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Balance()->IdBalance, $intIdBalance)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load all Balances
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Balance[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Balance::QueryArray to perform the LoadAll query
			try {
				return Balance::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Balances
		 * @return int
		 */
		public static function CountAll() {
			// Call Balance::QueryCount to perform the CountAll query
			return Balance::QueryCount(QQ::All());
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
			$objDatabase = Balance::GetDatabase();

			// Create/Build out the QueryBuilder object with Balance-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'balance');
			Balance::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('balance');

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
		 * Static Qcubed Query method to query for a single Balance object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Balance the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Balance::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Balance object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Balance::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Balance::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Balance objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Balance[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Balance::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Balance::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of Balance objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Balance::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Balance::GetDatabase();

			$strQuery = Balance::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/balance', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Balance::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Balance
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'balance';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'IdBalance', $strAliasPrefix . 'IdBalance');
			$objBuilder->AddSelectItem($strTableName, 'Date', $strAliasPrefix . 'Date');
			$objBuilder->AddSelectItem($strTableName, 'IdClient', $strAliasPrefix . 'IdClient');
			$objBuilder->AddSelectItem($strTableName, 'IdOrganization', $strAliasPrefix . 'IdOrganization');
			$objBuilder->AddSelectItem($strTableName, 'AmountExchangedCoins', $strAliasPrefix . 'AmountExchangedCoins');
		}



		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Balance from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Balance::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Balance
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}

			// Create a new instance of the Balance object
			$objToReturn = new Balance();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'IdBalance', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'IdBalance'] : $strAliasPrefix . 'IdBalance';
			$objToReturn->intIdBalance = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intIdBalance = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'Date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Date'] : $strAliasPrefix . 'Date';
			$objToReturn->dttDate = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'IdClient', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'IdClient'] : $strAliasPrefix . 'IdClient';
			$objToReturn->intIdClient = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'IdOrganization', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'IdOrganization'] : $strAliasPrefix . 'IdOrganization';
			$objToReturn->intIdOrganization = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'AmountExchangedCoins', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'AmountExchangedCoins'] : $strAliasPrefix . 'AmountExchangedCoins';
			$objToReturn->fltAmountExchangedCoins = $objDbRow->GetColumn($strAliasName, 'Float');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->IdBalance != $objPreviousItem->IdBalance) {
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
				$strAliasPrefix = 'balance__';

			// Check for IdClientObject Early Binding
			$strAlias = $strAliasPrefix . 'IdClient__IdClient';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdClientObject = Client::InstantiateDbRow($objDbRow, $strAliasPrefix . 'IdClient__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for IdOrganizationObject Early Binding
			$strAlias = $strAliasPrefix . 'IdOrganization__IdOrganization';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdOrganizationObject = Organization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'IdOrganization__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of Balances from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Balance[]
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
					$objItem = Balance::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Balance::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}



		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Balance object,
		 * by IdBalance Index(es)
		 * @param integer $intIdBalance
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Balance
		*/
		public static function LoadByIdBalance($intIdBalance, $objOptionalClauses = null) {
			return Balance::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Balance()->IdBalance, $intIdBalance)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Balance objects,
		 * by IdClient Index(es)
		 * @param integer $intIdClient
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Balance[]
		*/
		public static function LoadArrayByIdClient($intIdClient, $objOptionalClauses = null) {
			// Call Balance::QueryArray to perform the LoadArrayByIdClient query
			try {
				return Balance::QueryArray(
					QQ::Equal(QQN::Balance()->IdClient, $intIdClient),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Balances
		 * by IdClient Index(es)
		 * @param integer $intIdClient
		 * @return int
		*/
		public static function CountByIdClient($intIdClient) {
			// Call Balance::QueryCount to perform the CountByIdClient query
			return Balance::QueryCount(
				QQ::Equal(QQN::Balance()->IdClient, $intIdClient)
			);
		}
			
		/**
		 * Load an array of Balance objects,
		 * by IdOrganization Index(es)
		 * @param integer $intIdOrganization
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Balance[]
		*/
		public static function LoadArrayByIdOrganization($intIdOrganization, $objOptionalClauses = null) {
			// Call Balance::QueryArray to perform the LoadArrayByIdOrganization query
			try {
				return Balance::QueryArray(
					QQ::Equal(QQN::Balance()->IdOrganization, $intIdOrganization),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Balances
		 * by IdOrganization Index(es)
		 * @param integer $intIdOrganization
		 * @return int
		*/
		public static function CountByIdOrganization($intIdOrganization) {
			// Call Balance::QueryCount to perform the CountByIdOrganization query
			return Balance::QueryCount(
				QQ::Equal(QQN::Balance()->IdOrganization, $intIdOrganization)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Balance
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Balance::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `balance` (
							`IdBalance`,
							`Date`,
							`IdClient`,
							`IdOrganization`,
							`AmountExchangedCoins`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intIdBalance) . ',
							' . $objDatabase->SqlVariable($this->dttDate) . ',
							' . $objDatabase->SqlVariable($this->intIdClient) . ',
							' . $objDatabase->SqlVariable($this->intIdOrganization) . ',
							' . $objDatabase->SqlVariable($this->fltAmountExchangedCoins) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`balance`
						SET
							`IdBalance` = ' . $objDatabase->SqlVariable($this->intIdBalance) . ',
							`Date` = ' . $objDatabase->SqlVariable($this->dttDate) . ',
							`IdClient` = ' . $objDatabase->SqlVariable($this->intIdClient) . ',
							`IdOrganization` = ' . $objDatabase->SqlVariable($this->intIdOrganization) . ',
							`AmountExchangedCoins` = ' . $objDatabase->SqlVariable($this->fltAmountExchangedCoins) . '
						WHERE
							`IdBalance` = ' . $objDatabase->SqlVariable($this->__intIdBalance) . '
					');
				}

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__intIdBalance = $this->intIdBalance;


			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this Balance
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intIdBalance)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Balance with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Balance::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`balance`
				WHERE
					`IdBalance` = ' . $objDatabase->SqlVariable($this->intIdBalance) . '');
		}

		/**
		 * Delete all Balances
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Balance::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`balance`');
		}

		/**
		 * Truncate balance table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Balance::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `balance`');
		}

		/**
		 * Reload this Balance from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Balance object.');

			// Reload the Object
			$objReloaded = Balance::Load($this->intIdBalance);

			// Update $this's local variables to match
			$this->intIdBalance = $objReloaded->intIdBalance;
			$this->__intIdBalance = $this->intIdBalance;
			$this->dttDate = $objReloaded->dttDate;
			$this->IdClient = $objReloaded->IdClient;
			$this->IdOrganization = $objReloaded->IdOrganization;
			$this->fltAmountExchangedCoins = $objReloaded->fltAmountExchangedCoins;
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
				case 'IdBalance':
					/**
					 * Gets the value for intIdBalance (PK)
					 * @return integer
					 */
					return $this->intIdBalance;

				case 'Date':
					/**
					 * Gets the value for dttDate (Not Null)
					 * @return QDateTime
					 */
					return $this->dttDate;

				case 'IdClient':
					/**
					 * Gets the value for intIdClient (Not Null)
					 * @return integer
					 */
					return $this->intIdClient;

				case 'IdOrganization':
					/**
					 * Gets the value for intIdOrganization (Not Null)
					 * @return integer
					 */
					return $this->intIdOrganization;

				case 'AmountExchangedCoins':
					/**
					 * Gets the value for fltAmountExchangedCoins (Not Null)
					 * @return double
					 */
					return $this->fltAmountExchangedCoins;


				///////////////////
				// Member Objects
				///////////////////
				case 'IdClientObject':
					/**
					 * Gets the value for the Client object referenced by intIdClient (Not Null)
					 * @return Client
					 */
					try {
						if ((!$this->objIdClientObject) && (!is_null($this->intIdClient)))
							$this->objIdClientObject = Client::Load($this->intIdClient);
						return $this->objIdClientObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'IdOrganizationObject':
					/**
					 * Gets the value for the Organization object referenced by intIdOrganization (Not Null)
					 * @return Organization
					 */
					try {
						if ((!$this->objIdOrganizationObject) && (!is_null($this->intIdOrganization)))
							$this->objIdOrganizationObject = Organization::Load($this->intIdOrganization);
						return $this->objIdOrganizationObject;
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
				case 'IdBalance':
					/**
					 * Sets the value for intIdBalance (PK)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intIdBalance = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Date':
					/**
					 * Sets the value for dttDate (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttDate = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'IdClient':
					/**
					 * Sets the value for intIdClient (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objIdClientObject = null;
						return ($this->intIdClient = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'IdOrganization':
					/**
					 * Sets the value for intIdOrganization (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objIdOrganizationObject = null;
						return ($this->intIdOrganization = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AmountExchangedCoins':
					/**
					 * Sets the value for fltAmountExchangedCoins (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltAmountExchangedCoins = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'IdClientObject':
					/**
					 * Sets the value for the Client object referenced by intIdClient (Not Null)
					 * @param Client $mixValue
					 * @return Client
					 */
					if (is_null($mixValue)) {
						$this->intIdClient = null;
						$this->objIdClientObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Client object
						try {
							$mixValue = QType::Cast($mixValue, 'Client');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Client object
						if (is_null($mixValue->IdClient))
							throw new QCallerException('Unable to set an unsaved IdClientObject for this Balance');

						// Update Local Member Variables
						$this->objIdClientObject = $mixValue;
						$this->intIdClient = $mixValue->IdClient;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'IdOrganizationObject':
					/**
					 * Sets the value for the Organization object referenced by intIdOrganization (Not Null)
					 * @param Organization $mixValue
					 * @return Organization
					 */
					if (is_null($mixValue)) {
						$this->intIdOrganization = null;
						$this->objIdOrganizationObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Organization object
						try {
							$mixValue = QType::Cast($mixValue, 'Organization');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Organization object
						if (is_null($mixValue->IdOrganization))
							throw new QCallerException('Unable to set an unsaved IdOrganizationObject for this Balance');

						// Update Local Member Variables
						$this->objIdOrganizationObject = $mixValue;
						$this->intIdOrganization = $mixValue->IdOrganization;

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
			$strToReturn = '<complexType name="Balance"><sequence>';
			$strToReturn .= '<element name="IdBalance" type="xsd:int"/>';
			$strToReturn .= '<element name="Date" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="IdClientObject" type="xsd1:Client"/>';
			$strToReturn .= '<element name="IdOrganizationObject" type="xsd1:Organization"/>';
			$strToReturn .= '<element name="AmountExchangedCoins" type="xsd:float"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Balance', $strComplexTypeArray)) {
				$strComplexTypeArray['Balance'] = Balance::GetSoapComplexTypeXml();
				Client::AlterSoapComplexTypeArray($strComplexTypeArray);
				Organization::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Balance::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Balance();
			if (property_exists($objSoapObject, 'IdBalance'))
				$objToReturn->intIdBalance = $objSoapObject->IdBalance;
			if (property_exists($objSoapObject, 'Date'))
				$objToReturn->dttDate = new QDateTime($objSoapObject->Date);
			if ((property_exists($objSoapObject, 'IdClientObject')) &&
				($objSoapObject->IdClientObject))
				$objToReturn->IdClientObject = Client::GetObjectFromSoapObject($objSoapObject->IdClientObject);
			if ((property_exists($objSoapObject, 'IdOrganizationObject')) &&
				($objSoapObject->IdOrganizationObject))
				$objToReturn->IdOrganizationObject = Organization::GetObjectFromSoapObject($objSoapObject->IdOrganizationObject);
			if (property_exists($objSoapObject, 'AmountExchangedCoins'))
				$objToReturn->fltAmountExchangedCoins = $objSoapObject->AmountExchangedCoins;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Balance::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttDate)
				$objObject->dttDate = $objObject->dttDate->qFormat(QDateTime::FormatSoap);
			if ($objObject->objIdClientObject)
				$objObject->objIdClientObject = Client::GetSoapObjectFromObject($objObject->objIdClientObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIdClient = null;
			if ($objObject->objIdOrganizationObject)
				$objObject->objIdOrganizationObject = Organization::GetSoapObjectFromObject($objObject->objIdOrganizationObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIdOrganization = null;
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
			$iArray['IdBalance'] = $this->intIdBalance;
			$iArray['Date'] = $this->dttDate;
			$iArray['IdClient'] = $this->intIdClient;
			$iArray['IdOrganization'] = $this->intIdOrganization;
			$iArray['AmountExchangedCoins'] = $this->fltAmountExchangedCoins;
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
     * @property-read QQNode $IdBalance
     * @property-read QQNode $Date
     * @property-read QQNode $IdClient
     * @property-read QQNodeClient $IdClientObject
     * @property-read QQNode $IdOrganization
     * @property-read QQNodeOrganization $IdOrganizationObject
     * @property-read QQNode $AmountExchangedCoins
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeBalance extends QQNode {
		protected $strTableName = 'balance';
		protected $strPrimaryKey = 'IdBalance';
		protected $strClassName = 'Balance';
		public function __get($strName) {
			switch ($strName) {
				case 'IdBalance':
					return new QQNode('IdBalance', 'IdBalance', 'Integer', $this);
				case 'Date':
					return new QQNode('Date', 'Date', 'DateTime', $this);
				case 'IdClient':
					return new QQNode('IdClient', 'IdClient', 'Integer', $this);
				case 'IdClientObject':
					return new QQNodeClient('IdClient', 'IdClientObject', 'Integer', $this);
				case 'IdOrganization':
					return new QQNode('IdOrganization', 'IdOrganization', 'Integer', $this);
				case 'IdOrganizationObject':
					return new QQNodeOrganization('IdOrganization', 'IdOrganizationObject', 'Integer', $this);
				case 'AmountExchangedCoins':
					return new QQNode('AmountExchangedCoins', 'AmountExchangedCoins', 'Float', $this);

				case '_PrimaryKeyNode':
					return new QQNode('IdBalance', 'IdBalance', 'Integer', $this);
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
     * @property-read QQNode $IdBalance
     * @property-read QQNode $Date
     * @property-read QQNode $IdClient
     * @property-read QQNodeClient $IdClientObject
     * @property-read QQNode $IdOrganization
     * @property-read QQNodeOrganization $IdOrganizationObject
     * @property-read QQNode $AmountExchangedCoins
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeBalance extends QQReverseReferenceNode {
		protected $strTableName = 'balance';
		protected $strPrimaryKey = 'IdBalance';
		protected $strClassName = 'Balance';
		public function __get($strName) {
			switch ($strName) {
				case 'IdBalance':
					return new QQNode('IdBalance', 'IdBalance', 'integer', $this);
				case 'Date':
					return new QQNode('Date', 'Date', 'QDateTime', $this);
				case 'IdClient':
					return new QQNode('IdClient', 'IdClient', 'integer', $this);
				case 'IdClientObject':
					return new QQNodeClient('IdClient', 'IdClientObject', 'integer', $this);
				case 'IdOrganization':
					return new QQNode('IdOrganization', 'IdOrganization', 'integer', $this);
				case 'IdOrganizationObject':
					return new QQNodeOrganization('IdOrganization', 'IdOrganizationObject', 'integer', $this);
				case 'AmountExchangedCoins':
					return new QQNode('AmountExchangedCoins', 'AmountExchangedCoins', 'double', $this);

				case '_PrimaryKeyNode':
					return new QQNode('IdBalance', 'IdBalance', 'integer', $this);
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
