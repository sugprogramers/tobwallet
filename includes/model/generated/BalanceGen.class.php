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
	 * @property-read integer $IdBalance the value for intIdBalance (Read-Only PK)
	 * @property QDateTime $Date the value for dttDate (Not Null)
	 * @property double $AmountExchangedCoins the value for fltAmountExchangedCoins (Not Null)
	 * @property integer $IdUser the value for intIdUser (Not Null)
	 * @property integer $IdOffer the value for intIdOffer (Not Null)
	 * @property User $IdUserObject the value for the User object referenced by intIdUser (Not Null)
	 * @property Offer $IdOfferObject the value for the Offer object referenced by intIdOffer (Not Null)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class BalanceGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column balance.IdBalance
		 * @var integer intIdBalance
		 */
		protected $intIdBalance;
		const IdBalanceDefault = null;


		/**
		 * Protected member variable that maps to the database column balance.Date
		 * @var QDateTime dttDate
		 */
		protected $dttDate;
		const DateDefault = null;


		/**
		 * Protected member variable that maps to the database column balance.AmountExchangedCoins
		 * @var double fltAmountExchangedCoins
		 */
		protected $fltAmountExchangedCoins;
		const AmountExchangedCoinsDefault = null;


		/**
		 * Protected member variable that maps to the database column balance.IdUser
		 * @var integer intIdUser
		 */
		protected $intIdUser;
		const IdUserDefault = null;


		/**
		 * Protected member variable that maps to the database column balance.IdOffer
		 * @var integer intIdOffer
		 */
		protected $intIdOffer;
		const IdOfferDefault = null;


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
		 * in the database column balance.IdUser.
		 *
		 * NOTE: Always use the IdUserObject property getter to correctly retrieve this User object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var User objIdUserObject
		 */
		protected $objIdUserObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column balance.IdOffer.
		 *
		 * NOTE: Always use the IdOfferObject property getter to correctly retrieve this Offer object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Offer objIdOfferObject
		 */
		protected $objIdOfferObject;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intIdBalance = Balance::IdBalanceDefault;
			$this->dttDate = (Balance::DateDefault === null)?null:new QDateTime(Balance::DateDefault);
			$this->fltAmountExchangedCoins = Balance::AmountExchangedCoinsDefault;
			$this->intIdUser = Balance::IdUserDefault;
			$this->intIdOffer = Balance::IdOfferDefault;
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
			$objBuilder->AddSelectItem($strTableName, 'AmountExchangedCoins', $strAliasPrefix . 'AmountExchangedCoins');
			$objBuilder->AddSelectItem($strTableName, 'IdUser', $strAliasPrefix . 'IdUser');
			$objBuilder->AddSelectItem($strTableName, 'IdOffer', $strAliasPrefix . 'IdOffer');
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
			$strAliasName = array_key_exists($strAliasPrefix . 'Date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Date'] : $strAliasPrefix . 'Date';
			$objToReturn->dttDate = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'AmountExchangedCoins', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'AmountExchangedCoins'] : $strAliasPrefix . 'AmountExchangedCoins';
			$objToReturn->fltAmountExchangedCoins = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAliasName = array_key_exists($strAliasPrefix . 'IdUser', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'IdUser'] : $strAliasPrefix . 'IdUser';
			$objToReturn->intIdUser = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'IdOffer', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'IdOffer'] : $strAliasPrefix . 'IdOffer';
			$objToReturn->intIdOffer = $objDbRow->GetColumn($strAliasName, 'Integer');

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

			// Check for IdUserObject Early Binding
			$strAlias = $strAliasPrefix . 'IdUser__IdUser';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdUserObject = User::InstantiateDbRow($objDbRow, $strAliasPrefix . 'IdUser__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for IdOfferObject Early Binding
			$strAlias = $strAliasPrefix . 'IdOffer__IdOffer';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdOfferObject = Offer::InstantiateDbRow($objDbRow, $strAliasPrefix . 'IdOffer__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




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
		 * by IdUser Index(es)
		 * @param integer $intIdUser
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Balance[]
		*/
		public static function LoadArrayByIdUser($intIdUser, $objOptionalClauses = null) {
			// Call Balance::QueryArray to perform the LoadArrayByIdUser query
			try {
				return Balance::QueryArray(
					QQ::Equal(QQN::Balance()->IdUser, $intIdUser),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Balances
		 * by IdUser Index(es)
		 * @param integer $intIdUser
		 * @return int
		*/
		public static function CountByIdUser($intIdUser) {
			// Call Balance::QueryCount to perform the CountByIdUser query
			return Balance::QueryCount(
				QQ::Equal(QQN::Balance()->IdUser, $intIdUser)
			);
		}
			
		/**
		 * Load an array of Balance objects,
		 * by IdOffer Index(es)
		 * @param integer $intIdOffer
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Balance[]
		*/
		public static function LoadArrayByIdOffer($intIdOffer, $objOptionalClauses = null) {
			// Call Balance::QueryArray to perform the LoadArrayByIdOffer query
			try {
				return Balance::QueryArray(
					QQ::Equal(QQN::Balance()->IdOffer, $intIdOffer),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Balances
		 * by IdOffer Index(es)
		 * @param integer $intIdOffer
		 * @return int
		*/
		public static function CountByIdOffer($intIdOffer) {
			// Call Balance::QueryCount to perform the CountByIdOffer query
			return Balance::QueryCount(
				QQ::Equal(QQN::Balance()->IdOffer, $intIdOffer)
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
		 * @return int
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
							`Date`,
							`AmountExchangedCoins`,
							`IdUser`,
							`IdOffer`
						) VALUES (
							' . $objDatabase->SqlVariable($this->dttDate) . ',
							' . $objDatabase->SqlVariable($this->fltAmountExchangedCoins) . ',
							' . $objDatabase->SqlVariable($this->intIdUser) . ',
							' . $objDatabase->SqlVariable($this->intIdOffer) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intIdBalance = $objDatabase->InsertId('balance', 'IdBalance');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`balance`
						SET
							`Date` = ' . $objDatabase->SqlVariable($this->dttDate) . ',
							`AmountExchangedCoins` = ' . $objDatabase->SqlVariable($this->fltAmountExchangedCoins) . ',
							`IdUser` = ' . $objDatabase->SqlVariable($this->intIdUser) . ',
							`IdOffer` = ' . $objDatabase->SqlVariable($this->intIdOffer) . '
						WHERE
							`IdBalance` = ' . $objDatabase->SqlVariable($this->intIdBalance) . '
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
			$this->dttDate = $objReloaded->dttDate;
			$this->fltAmountExchangedCoins = $objReloaded->fltAmountExchangedCoins;
			$this->IdUser = $objReloaded->IdUser;
			$this->IdOffer = $objReloaded->IdOffer;
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
					 * Gets the value for intIdBalance (Read-Only PK)
					 * @return integer
					 */
					return $this->intIdBalance;

				case 'Date':
					/**
					 * Gets the value for dttDate (Not Null)
					 * @return QDateTime
					 */
					return $this->dttDate;

				case 'AmountExchangedCoins':
					/**
					 * Gets the value for fltAmountExchangedCoins (Not Null)
					 * @return double
					 */
					return $this->fltAmountExchangedCoins;

				case 'IdUser':
					/**
					 * Gets the value for intIdUser (Not Null)
					 * @return integer
					 */
					return $this->intIdUser;

				case 'IdOffer':
					/**
					 * Gets the value for intIdOffer (Not Null)
					 * @return integer
					 */
					return $this->intIdOffer;


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

				case 'IdOfferObject':
					/**
					 * Gets the value for the Offer object referenced by intIdOffer (Not Null)
					 * @return Offer
					 */
					try {
						if ((!$this->objIdOfferObject) && (!is_null($this->intIdOffer)))
							$this->objIdOfferObject = Offer::Load($this->intIdOffer);
						return $this->objIdOfferObject;
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

				case 'IdOffer':
					/**
					 * Sets the value for intIdOffer (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objIdOfferObject = null;
						return ($this->intIdOffer = QType::Cast($mixValue, QType::Integer));
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
							throw new QCallerException('Unable to set an unsaved IdUserObject for this Balance');

						// Update Local Member Variables
						$this->objIdUserObject = $mixValue;
						$this->intIdUser = $mixValue->IdUser;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'IdOfferObject':
					/**
					 * Sets the value for the Offer object referenced by intIdOffer (Not Null)
					 * @param Offer $mixValue
					 * @return Offer
					 */
					if (is_null($mixValue)) {
						$this->intIdOffer = null;
						$this->objIdOfferObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Offer object
						try {
							$mixValue = QType::Cast($mixValue, 'Offer');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Offer object
						if (is_null($mixValue->IdOffer))
							throw new QCallerException('Unable to set an unsaved IdOfferObject for this Balance');

						// Update Local Member Variables
						$this->objIdOfferObject = $mixValue;
						$this->intIdOffer = $mixValue->IdOffer;

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
			$strToReturn .= '<element name="AmountExchangedCoins" type="xsd:float"/>';
			$strToReturn .= '<element name="IdUserObject" type="xsd1:User"/>';
			$strToReturn .= '<element name="IdOfferObject" type="xsd1:Offer"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Balance', $strComplexTypeArray)) {
				$strComplexTypeArray['Balance'] = Balance::GetSoapComplexTypeXml();
				User::AlterSoapComplexTypeArray($strComplexTypeArray);
				Offer::AlterSoapComplexTypeArray($strComplexTypeArray);
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
			if (property_exists($objSoapObject, 'AmountExchangedCoins'))
				$objToReturn->fltAmountExchangedCoins = $objSoapObject->AmountExchangedCoins;
			if ((property_exists($objSoapObject, 'IdUserObject')) &&
				($objSoapObject->IdUserObject))
				$objToReturn->IdUserObject = User::GetObjectFromSoapObject($objSoapObject->IdUserObject);
			if ((property_exists($objSoapObject, 'IdOfferObject')) &&
				($objSoapObject->IdOfferObject))
				$objToReturn->IdOfferObject = Offer::GetObjectFromSoapObject($objSoapObject->IdOfferObject);
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
			if ($objObject->objIdUserObject)
				$objObject->objIdUserObject = User::GetSoapObjectFromObject($objObject->objIdUserObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIdUser = null;
			if ($objObject->objIdOfferObject)
				$objObject->objIdOfferObject = Offer::GetSoapObjectFromObject($objObject->objIdOfferObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIdOffer = null;
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
			$iArray['AmountExchangedCoins'] = $this->fltAmountExchangedCoins;
			$iArray['IdUser'] = $this->intIdUser;
			$iArray['IdOffer'] = $this->intIdOffer;
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
     * @property-read QQNode $AmountExchangedCoins
     * @property-read QQNode $IdUser
     * @property-read QQNodeUser $IdUserObject
     * @property-read QQNode $IdOffer
     * @property-read QQNodeOffer $IdOfferObject
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
				case 'AmountExchangedCoins':
					return new QQNode('AmountExchangedCoins', 'AmountExchangedCoins', 'Float', $this);
				case 'IdUser':
					return new QQNode('IdUser', 'IdUser', 'Integer', $this);
				case 'IdUserObject':
					return new QQNodeUser('IdUser', 'IdUserObject', 'Integer', $this);
				case 'IdOffer':
					return new QQNode('IdOffer', 'IdOffer', 'Integer', $this);
				case 'IdOfferObject':
					return new QQNodeOffer('IdOffer', 'IdOfferObject', 'Integer', $this);

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
     * @property-read QQNode $AmountExchangedCoins
     * @property-read QQNode $IdUser
     * @property-read QQNodeUser $IdUserObject
     * @property-read QQNode $IdOffer
     * @property-read QQNodeOffer $IdOfferObject
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
				case 'AmountExchangedCoins':
					return new QQNode('AmountExchangedCoins', 'AmountExchangedCoins', 'double', $this);
				case 'IdUser':
					return new QQNode('IdUser', 'IdUser', 'integer', $this);
				case 'IdUserObject':
					return new QQNodeUser('IdUser', 'IdUserObject', 'integer', $this);
				case 'IdOffer':
					return new QQNode('IdOffer', 'IdOffer', 'integer', $this);
				case 'IdOfferObject':
					return new QQNodeOffer('IdOffer', 'IdOfferObject', 'integer', $this);

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
