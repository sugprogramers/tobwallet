<?php
	/**
	 * The abstract ClientGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Client subclass which
	 * extends this ClientGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Client class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $IdClient the value for intIdClient (Read-Only PK)
	 * @property integer $IdUser the value for intIdUser (Not Null)
	 * @property User $IdUserObject the value for the User object referenced by intIdUser (Not Null)
	 * @property-read Balance $_BalanceAsIdClient the value for the private _objBalanceAsIdClient (Read-Only) if set due to an expansion on the balance.IdClient reverse relationship
	 * @property-read Balance[] $_BalanceAsIdClientArray the value for the private _objBalanceAsIdClientArray (Read-Only) if set due to an ExpandAsArray on the balance.IdClient reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ClientGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column client.IdClient
		 * @var integer intIdClient
		 */
		protected $intIdClient;
		const IdClientDefault = null;


		/**
		 * Protected member variable that maps to the database column client.IdUser
		 * @var integer intIdUser
		 */
		protected $intIdUser;
		const IdUserDefault = null;


		/**
		 * Private member variable that stores a reference to a single BalanceAsIdClient object
		 * (of type Balance), if this Client object was restored with
		 * an expansion on the balance association table.
		 * @var Balance _objBalanceAsIdClient;
		 */
		private $_objBalanceAsIdClient;

		/**
		 * Private member variable that stores a reference to an array of BalanceAsIdClient objects
		 * (of type Balance[]), if this Client object was restored with
		 * an ExpandAsArray on the balance association table.
		 * @var Balance[] _objBalanceAsIdClientArray;
		 */
		private $_objBalanceAsIdClientArray = null;

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
		 * in the database column client.IdUser.
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
			$this->intIdClient = Client::IdClientDefault;
			$this->intIdUser = Client::IdUserDefault;
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
		 * Load a Client from PK Info
		 * @param integer $intIdClient
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Client
		 */
		public static function Load($intIdClient, $objOptionalClauses = null) {
			// Use QuerySingle to Perform the Query
			return Client::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Client()->IdClient, $intIdClient)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load all Clients
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Client[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Client::QueryArray to perform the LoadAll query
			try {
				return Client::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Clients
		 * @return int
		 */
		public static function CountAll() {
			// Call Client::QueryCount to perform the CountAll query
			return Client::QueryCount(QQ::All());
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
			$objDatabase = Client::GetDatabase();

			// Create/Build out the QueryBuilder object with Client-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'client');
			Client::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('client');

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
		 * Static Qcubed Query method to query for a single Client object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Client the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Client::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Client object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Client::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Client::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Client objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Client[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Client::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Client::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of Client objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Client::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Client::GetDatabase();

			$strQuery = Client::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/client', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Client::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Client
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'client';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'IdClient', $strAliasPrefix . 'IdClient');
			$objBuilder->AddSelectItem($strTableName, 'IdUser', $strAliasPrefix . 'IdUser');
		}



		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Client from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Client::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Client
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'IdClient';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && is_array($arrPreviousItems) && count($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objPreviousItem->intIdClient == $objDbRow->GetColumn($strAliasName, 'Integer')) {
						// We are.  Now, prepare to check for ExpandAsArray clauses
						$blnExpandedViaArray = false;
						if (!$strAliasPrefix)
							$strAliasPrefix = 'client__';


						// Expanding reverse references: BalanceAsIdClient
						$strAlias = $strAliasPrefix . 'balanceasidclient__IdBalance';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if(null === $objPreviousItem->_objBalanceAsIdClientArray)
								$objPreviousItem->_objBalanceAsIdClientArray = array();
							if ($intPreviousChildItemCount = count($objPreviousItem->_objBalanceAsIdClientArray)) {
								$objPreviousChildItems = $objPreviousItem->_objBalanceAsIdClientArray;
								$objChildItem = Balance::InstantiateDbRow($objDbRow, $strAliasPrefix . 'balanceasidclient__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->_objBalanceAsIdClientArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->_objBalanceAsIdClientArray[] = Balance::InstantiateDbRow($objDbRow, $strAliasPrefix . 'balanceasidclient__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
						if ($blnExpandedViaArray) {
							return false;
						} else if ($strAliasPrefix == 'client__') {
							$strAliasPrefix = null;
						}
					}
				}
			}

			// Create a new instance of the Client object
			$objToReturn = new Client();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'IdClient', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'IdClient'] : $strAliasPrefix . 'IdClient';
			$objToReturn->intIdClient = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'IdUser', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'IdUser'] : $strAliasPrefix . 'IdUser';
			$objToReturn->intIdUser = $objDbRow->GetColumn($strAliasName, 'Integer');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->IdClient != $objPreviousItem->IdClient) {
						continue;
					}
					if (array_diff($objPreviousItem->_objBalanceAsIdClientArray, $objToReturn->_objBalanceAsIdClientArray) != null) {
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
				$strAliasPrefix = 'client__';

			// Check for IdUserObject Early Binding
			$strAlias = $strAliasPrefix . 'IdUser__IdUser';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdUserObject = User::InstantiateDbRow($objDbRow, $strAliasPrefix . 'IdUser__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for BalanceAsIdClient Virtual Binding
			$strAlias = $strAliasPrefix . 'balanceasidclient__IdBalance';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = $strExpandAsArrayNodes && array_key_exists($strAlias, $strExpandAsArrayNodes);
			if ($blnExpanded && null === $objToReturn->_objBalanceAsIdClientArray)
				$objToReturn->_objBalanceAsIdClientArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded)
					$objToReturn->_objBalanceAsIdClientArray[] = Balance::InstantiateDbRow($objDbRow, $strAliasPrefix . 'balanceasidclient__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objBalanceAsIdClient = Balance::InstantiateDbRow($objDbRow, $strAliasPrefix . 'balanceasidclient__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Clients from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Client[]
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
					$objItem = Client::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Client::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}



		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Client object,
		 * by IdClient Index(es)
		 * @param integer $intIdClient
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Client
		*/
		public static function LoadByIdClient($intIdClient, $objOptionalClauses = null) {
			return Client::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Client()->IdClient, $intIdClient)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Client objects,
		 * by IdUser Index(es)
		 * @param integer $intIdUser
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Client[]
		*/
		public static function LoadArrayByIdUser($intIdUser, $objOptionalClauses = null) {
			// Call Client::QueryArray to perform the LoadArrayByIdUser query
			try {
				return Client::QueryArray(
					QQ::Equal(QQN::Client()->IdUser, $intIdUser),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Clients
		 * by IdUser Index(es)
		 * @param integer $intIdUser
		 * @return int
		*/
		public static function CountByIdUser($intIdUser) {
			// Call Client::QueryCount to perform the CountByIdUser query
			return Client::QueryCount(
				QQ::Equal(QQN::Client()->IdUser, $intIdUser)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Client
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Client::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `client` (
							`IdUser`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intIdUser) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intIdClient = $objDatabase->InsertId('client', 'IdClient');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`client`
						SET
							`IdUser` = ' . $objDatabase->SqlVariable($this->intIdUser) . '
						WHERE
							`IdClient` = ' . $objDatabase->SqlVariable($this->intIdClient) . '
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
		 * Delete this Client
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intIdClient)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Client with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Client::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`client`
				WHERE
					`IdClient` = ' . $objDatabase->SqlVariable($this->intIdClient) . '');
		}

		/**
		 * Delete all Clients
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Client::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`client`');
		}

		/**
		 * Truncate client table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Client::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `client`');
		}

		/**
		 * Reload this Client from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Client object.');

			// Reload the Object
			$objReloaded = Client::Load($this->intIdClient);

			// Update $this's local variables to match
			$this->IdUser = $objReloaded->IdUser;
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
				case 'IdClient':
					/**
					 * Gets the value for intIdClient (Read-Only PK)
					 * @return integer
					 */
					return $this->intIdClient;

				case 'IdUser':
					/**
					 * Gets the value for intIdUser (Not Null)
					 * @return integer
					 */
					return $this->intIdUser;


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

				case '_BalanceAsIdClient':
					/**
					 * Gets the value for the private _objBalanceAsIdClient (Read-Only)
					 * if set due to an expansion on the balance.IdClient reverse relationship
					 * @return Balance
					 */
					return $this->_objBalanceAsIdClient;

				case '_BalanceAsIdClientArray':
					/**
					 * Gets the value for the private _objBalanceAsIdClientArray (Read-Only)
					 * if set due to an ExpandAsArray on the balance.IdClient reverse relationship
					 * @return Balance[]
					 */
					return $this->_objBalanceAsIdClientArray;


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
							throw new QCallerException('Unable to set an unsaved IdUserObject for this Client');

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

			
		
		// Related Objects' Methods for BalanceAsIdClient
		//-------------------------------------------------------------------

		/**
		 * Gets all associated BalancesAsIdClient as an array of Balance objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Balance[]
		*/
		public function GetBalanceAsIdClientArray($objOptionalClauses = null) {
			if ((is_null($this->intIdClient)))
				return array();

			try {
				return Balance::LoadArrayByIdClient($this->intIdClient, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated BalancesAsIdClient
		 * @return int
		*/
		public function CountBalancesAsIdClient() {
			if ((is_null($this->intIdClient)))
				return 0;

			return Balance::CountByIdClient($this->intIdClient);
		}

		/**
		 * Associates a BalanceAsIdClient
		 * @param Balance $objBalance
		 * @return void
		*/
		public function AssociateBalanceAsIdClient(Balance $objBalance) {
			if ((is_null($this->intIdClient)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateBalanceAsIdClient on this unsaved Client.');
			if ((is_null($objBalance->IdBalance)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateBalanceAsIdClient on this Client with an unsaved Balance.');

			// Get the Database Object for this Class
			$objDatabase = Client::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`balance`
				SET
					`IdClient` = ' . $objDatabase->SqlVariable($this->intIdClient) . '
				WHERE
					`IdBalance` = ' . $objDatabase->SqlVariable($objBalance->IdBalance) . '
			');
		}

		/**
		 * Unassociates a BalanceAsIdClient
		 * @param Balance $objBalance
		 * @return void
		*/
		public function UnassociateBalanceAsIdClient(Balance $objBalance) {
			if ((is_null($this->intIdClient)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBalanceAsIdClient on this unsaved Client.');
			if ((is_null($objBalance->IdBalance)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBalanceAsIdClient on this Client with an unsaved Balance.');

			// Get the Database Object for this Class
			$objDatabase = Client::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`balance`
				SET
					`IdClient` = null
				WHERE
					`IdBalance` = ' . $objDatabase->SqlVariable($objBalance->IdBalance) . ' AND
					`IdClient` = ' . $objDatabase->SqlVariable($this->intIdClient) . '
			');
		}

		/**
		 * Unassociates all BalancesAsIdClient
		 * @return void
		*/
		public function UnassociateAllBalancesAsIdClient() {
			if ((is_null($this->intIdClient)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBalanceAsIdClient on this unsaved Client.');

			// Get the Database Object for this Class
			$objDatabase = Client::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`balance`
				SET
					`IdClient` = null
				WHERE
					`IdClient` = ' . $objDatabase->SqlVariable($this->intIdClient) . '
			');
		}

		/**
		 * Deletes an associated BalanceAsIdClient
		 * @param Balance $objBalance
		 * @return void
		*/
		public function DeleteAssociatedBalanceAsIdClient(Balance $objBalance) {
			if ((is_null($this->intIdClient)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBalanceAsIdClient on this unsaved Client.');
			if ((is_null($objBalance->IdBalance)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBalanceAsIdClient on this Client with an unsaved Balance.');

			// Get the Database Object for this Class
			$objDatabase = Client::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`balance`
				WHERE
					`IdBalance` = ' . $objDatabase->SqlVariable($objBalance->IdBalance) . ' AND
					`IdClient` = ' . $objDatabase->SqlVariable($this->intIdClient) . '
			');
		}

		/**
		 * Deletes all associated BalancesAsIdClient
		 * @return void
		*/
		public function DeleteAllBalancesAsIdClient() {
			if ((is_null($this->intIdClient)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBalanceAsIdClient on this unsaved Client.');

			// Get the Database Object for this Class
			$objDatabase = Client::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`balance`
				WHERE
					`IdClient` = ' . $objDatabase->SqlVariable($this->intIdClient) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Client"><sequence>';
			$strToReturn .= '<element name="IdClient" type="xsd:int"/>';
			$strToReturn .= '<element name="IdUserObject" type="xsd1:User"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Client', $strComplexTypeArray)) {
				$strComplexTypeArray['Client'] = Client::GetSoapComplexTypeXml();
				User::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Client::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Client();
			if (property_exists($objSoapObject, 'IdClient'))
				$objToReturn->intIdClient = $objSoapObject->IdClient;
			if ((property_exists($objSoapObject, 'IdUserObject')) &&
				($objSoapObject->IdUserObject))
				$objToReturn->IdUserObject = User::GetObjectFromSoapObject($objSoapObject->IdUserObject);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Client::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objIdUserObject)
				$objObject->objIdUserObject = User::GetSoapObjectFromObject($objObject->objIdUserObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIdUser = null;
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
			$iArray['IdClient'] = $this->intIdClient;
			$iArray['IdUser'] = $this->intIdUser;
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
     * @property-read QQNode $IdClient
     * @property-read QQNode $IdUser
     * @property-read QQNodeUser $IdUserObject
     *
     *
     * @property-read QQReverseReferenceNodeBalance $BalanceAsIdClient

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeClient extends QQNode {
		protected $strTableName = 'client';
		protected $strPrimaryKey = 'IdClient';
		protected $strClassName = 'Client';
		public function __get($strName) {
			switch ($strName) {
				case 'IdClient':
					return new QQNode('IdClient', 'IdClient', 'Integer', $this);
				case 'IdUser':
					return new QQNode('IdUser', 'IdUser', 'Integer', $this);
				case 'IdUserObject':
					return new QQNodeUser('IdUser', 'IdUserObject', 'Integer', $this);
				case 'BalanceAsIdClient':
					return new QQReverseReferenceNodeBalance($this, 'balanceasidclient', 'reverse_reference', 'IdClient');

				case '_PrimaryKeyNode':
					return new QQNode('IdClient', 'IdClient', 'Integer', $this);
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
     * @property-read QQNode $IdClient
     * @property-read QQNode $IdUser
     * @property-read QQNodeUser $IdUserObject
     *
     *
     * @property-read QQReverseReferenceNodeBalance $BalanceAsIdClient

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeClient extends QQReverseReferenceNode {
		protected $strTableName = 'client';
		protected $strPrimaryKey = 'IdClient';
		protected $strClassName = 'Client';
		public function __get($strName) {
			switch ($strName) {
				case 'IdClient':
					return new QQNode('IdClient', 'IdClient', 'integer', $this);
				case 'IdUser':
					return new QQNode('IdUser', 'IdUser', 'integer', $this);
				case 'IdUserObject':
					return new QQNodeUser('IdUser', 'IdUserObject', 'integer', $this);
				case 'BalanceAsIdClient':
					return new QQReverseReferenceNodeBalance($this, 'balanceasidclient', 'reverse_reference', 'IdClient');

				case '_PrimaryKeyNode':
					return new QQNode('IdClient', 'IdClient', 'integer', $this);
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
