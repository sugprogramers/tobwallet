<?php
	/**
	 * The abstract OwnerGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Owner subclass which
	 * extends this OwnerGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Owner class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $IdOwner the value for intIdOwner (PK)
	 * @property integer $IdUser the value for intIdUser (Not Null)
	 * @property User $IdUserObject the value for the User object referenced by intIdUser (Not Null)
	 * @property-read Organization $_OrganizationAsIdOwner the value for the private _objOrganizationAsIdOwner (Read-Only) if set due to an expansion on the organization.IdOwner reverse relationship
	 * @property-read Organization[] $_OrganizationAsIdOwnerArray the value for the private _objOrganizationAsIdOwnerArray (Read-Only) if set due to an ExpandAsArray on the organization.IdOwner reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class OwnerGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK column owner.IdOwner
		 * @var integer intIdOwner
		 */
		protected $intIdOwner;
		const IdOwnerDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var integer __intIdOwner;
		 */
		protected $__intIdOwner;

		/**
		 * Protected member variable that maps to the database column owner.IdUser
		 * @var integer intIdUser
		 */
		protected $intIdUser;
		const IdUserDefault = null;


		/**
		 * Private member variable that stores a reference to a single OrganizationAsIdOwner object
		 * (of type Organization), if this Owner object was restored with
		 * an expansion on the organization association table.
		 * @var Organization _objOrganizationAsIdOwner;
		 */
		private $_objOrganizationAsIdOwner;

		/**
		 * Private member variable that stores a reference to an array of OrganizationAsIdOwner objects
		 * (of type Organization[]), if this Owner object was restored with
		 * an ExpandAsArray on the organization association table.
		 * @var Organization[] _objOrganizationAsIdOwnerArray;
		 */
		private $_objOrganizationAsIdOwnerArray = null;

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
		 * in the database column owner.IdUser.
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
			$this->intIdOwner = Owner::IdOwnerDefault;
			$this->intIdUser = Owner::IdUserDefault;
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
		 * Load a Owner from PK Info
		 * @param integer $intIdOwner
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Owner
		 */
		public static function Load($intIdOwner, $objOptionalClauses = null) {
			// Use QuerySingle to Perform the Query
			return Owner::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Owner()->IdOwner, $intIdOwner)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load all Owners
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Owner[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Owner::QueryArray to perform the LoadAll query
			try {
				return Owner::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Owners
		 * @return int
		 */
		public static function CountAll() {
			// Call Owner::QueryCount to perform the CountAll query
			return Owner::QueryCount(QQ::All());
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
			$objDatabase = Owner::GetDatabase();

			// Create/Build out the QueryBuilder object with Owner-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'owner');
			Owner::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('owner');

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
		 * Static Qcubed Query method to query for a single Owner object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Owner the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Owner::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Owner object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Owner::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Owner::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Owner objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Owner[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Owner::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Owner::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of Owner objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Owner::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Owner::GetDatabase();

			$strQuery = Owner::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/owner', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Owner::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Owner
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'owner';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'IdOwner', $strAliasPrefix . 'IdOwner');
			$objBuilder->AddSelectItem($strTableName, 'IdUser', $strAliasPrefix . 'IdUser');
		}



		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Owner from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Owner::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Owner
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'IdOwner';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && is_array($arrPreviousItems) && count($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objPreviousItem->intIdOwner == $objDbRow->GetColumn($strAliasName, 'Integer')) {
						// We are.  Now, prepare to check for ExpandAsArray clauses
						$blnExpandedViaArray = false;
						if (!$strAliasPrefix)
							$strAliasPrefix = 'owner__';


						// Expanding reverse references: OrganizationAsIdOwner
						$strAlias = $strAliasPrefix . 'organizationasidowner__IdOrganization';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if(null === $objPreviousItem->_objOrganizationAsIdOwnerArray)
								$objPreviousItem->_objOrganizationAsIdOwnerArray = array();
							if ($intPreviousChildItemCount = count($objPreviousItem->_objOrganizationAsIdOwnerArray)) {
								$objPreviousChildItems = $objPreviousItem->_objOrganizationAsIdOwnerArray;
								$objChildItem = Organization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'organizationasidowner__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->_objOrganizationAsIdOwnerArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->_objOrganizationAsIdOwnerArray[] = Organization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'organizationasidowner__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
						if ($blnExpandedViaArray) {
							return false;
						} else if ($strAliasPrefix == 'owner__') {
							$strAliasPrefix = null;
						}
					}
				}
			}

			// Create a new instance of the Owner object
			$objToReturn = new Owner();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'IdOwner', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'IdOwner'] : $strAliasPrefix . 'IdOwner';
			$objToReturn->intIdOwner = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intIdOwner = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'IdUser', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'IdUser'] : $strAliasPrefix . 'IdUser';
			$objToReturn->intIdUser = $objDbRow->GetColumn($strAliasName, 'Integer');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->IdOwner != $objPreviousItem->IdOwner) {
						continue;
					}
					if (array_diff($objPreviousItem->_objOrganizationAsIdOwnerArray, $objToReturn->_objOrganizationAsIdOwnerArray) != null) {
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
				$strAliasPrefix = 'owner__';

			// Check for IdUserObject Early Binding
			$strAlias = $strAliasPrefix . 'IdUser__IdUser';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdUserObject = User::InstantiateDbRow($objDbRow, $strAliasPrefix . 'IdUser__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for OrganizationAsIdOwner Virtual Binding
			$strAlias = $strAliasPrefix . 'organizationasidowner__IdOrganization';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = $strExpandAsArrayNodes && array_key_exists($strAlias, $strExpandAsArrayNodes);
			if ($blnExpanded && null === $objToReturn->_objOrganizationAsIdOwnerArray)
				$objToReturn->_objOrganizationAsIdOwnerArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded)
					$objToReturn->_objOrganizationAsIdOwnerArray[] = Organization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'organizationasidowner__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objOrganizationAsIdOwner = Organization::InstantiateDbRow($objDbRow, $strAliasPrefix . 'organizationasidowner__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Owners from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Owner[]
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
					$objItem = Owner::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Owner::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}



		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Owner object,
		 * by IdOwner Index(es)
		 * @param integer $intIdOwner
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Owner
		*/
		public static function LoadByIdOwner($intIdOwner, $objOptionalClauses = null) {
			return Owner::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Owner()->IdOwner, $intIdOwner)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Owner objects,
		 * by IdUser Index(es)
		 * @param integer $intIdUser
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Owner[]
		*/
		public static function LoadArrayByIdUser($intIdUser, $objOptionalClauses = null) {
			// Call Owner::QueryArray to perform the LoadArrayByIdUser query
			try {
				return Owner::QueryArray(
					QQ::Equal(QQN::Owner()->IdUser, $intIdUser),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Owners
		 * by IdUser Index(es)
		 * @param integer $intIdUser
		 * @return int
		*/
		public static function CountByIdUser($intIdUser) {
			// Call Owner::QueryCount to perform the CountByIdUser query
			return Owner::QueryCount(
				QQ::Equal(QQN::Owner()->IdUser, $intIdUser)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Owner
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Owner::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `owner` (
							`IdOwner`,
							`IdUser`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intIdOwner) . ',
							' . $objDatabase->SqlVariable($this->intIdUser) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`owner`
						SET
							`IdOwner` = ' . $objDatabase->SqlVariable($this->intIdOwner) . ',
							`IdUser` = ' . $objDatabase->SqlVariable($this->intIdUser) . '
						WHERE
							`IdOwner` = ' . $objDatabase->SqlVariable($this->__intIdOwner) . '
					');
				}

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__intIdOwner = $this->intIdOwner;


			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this Owner
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intIdOwner)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Owner with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Owner::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`owner`
				WHERE
					`IdOwner` = ' . $objDatabase->SqlVariable($this->intIdOwner) . '');
		}

		/**
		 * Delete all Owners
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Owner::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`owner`');
		}

		/**
		 * Truncate owner table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Owner::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `owner`');
		}

		/**
		 * Reload this Owner from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Owner object.');

			// Reload the Object
			$objReloaded = Owner::Load($this->intIdOwner);

			// Update $this's local variables to match
			$this->intIdOwner = $objReloaded->intIdOwner;
			$this->__intIdOwner = $this->intIdOwner;
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
				case 'IdOwner':
					/**
					 * Gets the value for intIdOwner (PK)
					 * @return integer
					 */
					return $this->intIdOwner;

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

				case '_OrganizationAsIdOwner':
					/**
					 * Gets the value for the private _objOrganizationAsIdOwner (Read-Only)
					 * if set due to an expansion on the organization.IdOwner reverse relationship
					 * @return Organization
					 */
					return $this->_objOrganizationAsIdOwner;

				case '_OrganizationAsIdOwnerArray':
					/**
					 * Gets the value for the private _objOrganizationAsIdOwnerArray (Read-Only)
					 * if set due to an ExpandAsArray on the organization.IdOwner reverse relationship
					 * @return Organization[]
					 */
					return $this->_objOrganizationAsIdOwnerArray;


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
				case 'IdOwner':
					/**
					 * Sets the value for intIdOwner (PK)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intIdOwner = QType::Cast($mixValue, QType::Integer));
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
							throw new QCallerException('Unable to set an unsaved IdUserObject for this Owner');

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

			
		
		// Related Objects' Methods for OrganizationAsIdOwner
		//-------------------------------------------------------------------

		/**
		 * Gets all associated OrganizationsAsIdOwner as an array of Organization objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Organization[]
		*/
		public function GetOrganizationAsIdOwnerArray($objOptionalClauses = null) {
			if ((is_null($this->intIdOwner)))
				return array();

			try {
				return Organization::LoadArrayByIdOwner($this->intIdOwner, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated OrganizationsAsIdOwner
		 * @return int
		*/
		public function CountOrganizationsAsIdOwner() {
			if ((is_null($this->intIdOwner)))
				return 0;

			return Organization::CountByIdOwner($this->intIdOwner);
		}

		/**
		 * Associates a OrganizationAsIdOwner
		 * @param Organization $objOrganization
		 * @return void
		*/
		public function AssociateOrganizationAsIdOwner(Organization $objOrganization) {
			if ((is_null($this->intIdOwner)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateOrganizationAsIdOwner on this unsaved Owner.');
			if ((is_null($objOrganization->IdOrganization)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateOrganizationAsIdOwner on this Owner with an unsaved Organization.');

			// Get the Database Object for this Class
			$objDatabase = Owner::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`organization`
				SET
					`IdOwner` = ' . $objDatabase->SqlVariable($this->intIdOwner) . '
				WHERE
					`IdOrganization` = ' . $objDatabase->SqlVariable($objOrganization->IdOrganization) . '
			');
		}

		/**
		 * Unassociates a OrganizationAsIdOwner
		 * @param Organization $objOrganization
		 * @return void
		*/
		public function UnassociateOrganizationAsIdOwner(Organization $objOrganization) {
			if ((is_null($this->intIdOwner)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOrganizationAsIdOwner on this unsaved Owner.');
			if ((is_null($objOrganization->IdOrganization)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOrganizationAsIdOwner on this Owner with an unsaved Organization.');

			// Get the Database Object for this Class
			$objDatabase = Owner::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`organization`
				SET
					`IdOwner` = null
				WHERE
					`IdOrganization` = ' . $objDatabase->SqlVariable($objOrganization->IdOrganization) . ' AND
					`IdOwner` = ' . $objDatabase->SqlVariable($this->intIdOwner) . '
			');
		}

		/**
		 * Unassociates all OrganizationsAsIdOwner
		 * @return void
		*/
		public function UnassociateAllOrganizationsAsIdOwner() {
			if ((is_null($this->intIdOwner)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOrganizationAsIdOwner on this unsaved Owner.');

			// Get the Database Object for this Class
			$objDatabase = Owner::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`organization`
				SET
					`IdOwner` = null
				WHERE
					`IdOwner` = ' . $objDatabase->SqlVariable($this->intIdOwner) . '
			');
		}

		/**
		 * Deletes an associated OrganizationAsIdOwner
		 * @param Organization $objOrganization
		 * @return void
		*/
		public function DeleteAssociatedOrganizationAsIdOwner(Organization $objOrganization) {
			if ((is_null($this->intIdOwner)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOrganizationAsIdOwner on this unsaved Owner.');
			if ((is_null($objOrganization->IdOrganization)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOrganizationAsIdOwner on this Owner with an unsaved Organization.');

			// Get the Database Object for this Class
			$objDatabase = Owner::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`organization`
				WHERE
					`IdOrganization` = ' . $objDatabase->SqlVariable($objOrganization->IdOrganization) . ' AND
					`IdOwner` = ' . $objDatabase->SqlVariable($this->intIdOwner) . '
			');
		}

		/**
		 * Deletes all associated OrganizationsAsIdOwner
		 * @return void
		*/
		public function DeleteAllOrganizationsAsIdOwner() {
			if ((is_null($this->intIdOwner)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOrganizationAsIdOwner on this unsaved Owner.');

			// Get the Database Object for this Class
			$objDatabase = Owner::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`organization`
				WHERE
					`IdOwner` = ' . $objDatabase->SqlVariable($this->intIdOwner) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Owner"><sequence>';
			$strToReturn .= '<element name="IdOwner" type="xsd:int"/>';
			$strToReturn .= '<element name="IdUserObject" type="xsd1:User"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Owner', $strComplexTypeArray)) {
				$strComplexTypeArray['Owner'] = Owner::GetSoapComplexTypeXml();
				User::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Owner::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Owner();
			if (property_exists($objSoapObject, 'IdOwner'))
				$objToReturn->intIdOwner = $objSoapObject->IdOwner;
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
				array_push($objArrayToReturn, Owner::GetSoapObjectFromObject($objObject, true));

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
			$iArray['IdOwner'] = $this->intIdOwner;
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
     * @property-read QQNode $IdOwner
     * @property-read QQNode $IdUser
     * @property-read QQNodeUser $IdUserObject
     *
     *
     * @property-read QQReverseReferenceNodeOrganization $OrganizationAsIdOwner

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeOwner extends QQNode {
		protected $strTableName = 'owner';
		protected $strPrimaryKey = 'IdOwner';
		protected $strClassName = 'Owner';
		public function __get($strName) {
			switch ($strName) {
				case 'IdOwner':
					return new QQNode('IdOwner', 'IdOwner', 'Integer', $this);
				case 'IdUser':
					return new QQNode('IdUser', 'IdUser', 'Integer', $this);
				case 'IdUserObject':
					return new QQNodeUser('IdUser', 'IdUserObject', 'Integer', $this);
				case 'OrganizationAsIdOwner':
					return new QQReverseReferenceNodeOrganization($this, 'organizationasidowner', 'reverse_reference', 'IdOwner');

				case '_PrimaryKeyNode':
					return new QQNode('IdOwner', 'IdOwner', 'Integer', $this);
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
     * @property-read QQNode $IdOwner
     * @property-read QQNode $IdUser
     * @property-read QQNodeUser $IdUserObject
     *
     *
     * @property-read QQReverseReferenceNodeOrganization $OrganizationAsIdOwner

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeOwner extends QQReverseReferenceNode {
		protected $strTableName = 'owner';
		protected $strPrimaryKey = 'IdOwner';
		protected $strClassName = 'Owner';
		public function __get($strName) {
			switch ($strName) {
				case 'IdOwner':
					return new QQNode('IdOwner', 'IdOwner', 'integer', $this);
				case 'IdUser':
					return new QQNode('IdUser', 'IdUser', 'integer', $this);
				case 'IdUserObject':
					return new QQNodeUser('IdUser', 'IdUserObject', 'integer', $this);
				case 'OrganizationAsIdOwner':
					return new QQReverseReferenceNodeOrganization($this, 'organizationasidowner', 'reverse_reference', 'IdOwner');

				case '_PrimaryKeyNode':
					return new QQNode('IdOwner', 'IdOwner', 'integer', $this);
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
