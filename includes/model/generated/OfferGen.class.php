<?php
	/**
	 * The abstract OfferGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Offer subclass which
	 * extends this OfferGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Offer class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $IdOffer the value for intIdOffer (Read-Only PK)
	 * @property string $Description the value for strDescription (Not Null)
	 * @property double $OfferedCoins the value for fltOfferedCoins (Not Null)
	 * @property QDateTime $DateFrom the value for dttDateFrom (Not Null)
	 * @property QDateTime $DateTo the value for dttDateTo 
	 * @property integer $IdRestaurant the value for intIdRestaurant (Not Null)
	 * @property integer $MaxOffers the value for intMaxOffers 
	 * @property integer $AppliedOffers the value for intAppliedOffers 
	 * @property integer $MaxCoins the value for intMaxCoins 
	 * @property integer $Status the value for intStatus 
	 * @property Restaurant $IdRestaurantObject the value for the Restaurant object referenced by intIdRestaurant (Not Null)
	 * @property-read Balance $_BalanceAsIdOffer the value for the private _objBalanceAsIdOffer (Read-Only) if set due to an expansion on the balance.IdOffer reverse relationship
	 * @property-read Balance[] $_BalanceAsIdOfferArray the value for the private _objBalanceAsIdOfferArray (Read-Only) if set due to an ExpandAsArray on the balance.IdOffer reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class OfferGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column offer.IdOffer
		 * @var integer intIdOffer
		 */
		protected $intIdOffer;
		const IdOfferDefault = null;


		/**
		 * Protected member variable that maps to the database column offer.Description
		 * @var string strDescription
		 */
		protected $strDescription;
		const DescriptionDefault = null;


		/**
		 * Protected member variable that maps to the database column offer.OfferedCoins
		 * @var double fltOfferedCoins
		 */
		protected $fltOfferedCoins;
		const OfferedCoinsDefault = null;


		/**
		 * Protected member variable that maps to the database column offer.DateFrom
		 * @var QDateTime dttDateFrom
		 */
		protected $dttDateFrom;
		const DateFromDefault = null;


		/**
		 * Protected member variable that maps to the database column offer.DateTo
		 * @var QDateTime dttDateTo
		 */
		protected $dttDateTo;
		const DateToDefault = null;


		/**
		 * Protected member variable that maps to the database column offer.IdRestaurant
		 * @var integer intIdRestaurant
		 */
		protected $intIdRestaurant;
		const IdRestaurantDefault = null;


		/**
		 * Protected member variable that maps to the database column offer.MaxOffers
		 * @var integer intMaxOffers
		 */
		protected $intMaxOffers;
		const MaxOffersDefault = null;


		/**
		 * Protected member variable that maps to the database column offer.AppliedOffers
		 * @var integer intAppliedOffers
		 */
		protected $intAppliedOffers;
		const AppliedOffersDefault = null;


		/**
		 * Protected member variable that maps to the database column offer.MaxCoins
		 * @var integer intMaxCoins
		 */
		protected $intMaxCoins;
		const MaxCoinsDefault = null;


		/**
		 * Protected member variable that maps to the database column offer.Status
		 * @var integer intStatus
		 */
		protected $intStatus;
		const StatusDefault = null;


		/**
		 * Private member variable that stores a reference to a single BalanceAsIdOffer object
		 * (of type Balance), if this Offer object was restored with
		 * an expansion on the balance association table.
		 * @var Balance _objBalanceAsIdOffer;
		 */
		private $_objBalanceAsIdOffer;

		/**
		 * Private member variable that stores a reference to an array of BalanceAsIdOffer objects
		 * (of type Balance[]), if this Offer object was restored with
		 * an ExpandAsArray on the balance association table.
		 * @var Balance[] _objBalanceAsIdOfferArray;
		 */
		private $_objBalanceAsIdOfferArray = null;

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
		 * in the database column offer.IdRestaurant.
		 *
		 * NOTE: Always use the IdRestaurantObject property getter to correctly retrieve this Restaurant object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Restaurant objIdRestaurantObject
		 */
		protected $objIdRestaurantObject;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intIdOffer = Offer::IdOfferDefault;
			$this->strDescription = Offer::DescriptionDefault;
			$this->fltOfferedCoins = Offer::OfferedCoinsDefault;
			$this->dttDateFrom = (Offer::DateFromDefault === null)?null:new QDateTime(Offer::DateFromDefault);
			$this->dttDateTo = (Offer::DateToDefault === null)?null:new QDateTime(Offer::DateToDefault);
			$this->intIdRestaurant = Offer::IdRestaurantDefault;
			$this->intMaxOffers = Offer::MaxOffersDefault;
			$this->intAppliedOffers = Offer::AppliedOffersDefault;
			$this->intMaxCoins = Offer::MaxCoinsDefault;
			$this->intStatus = Offer::StatusDefault;
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
		 * Load a Offer from PK Info
		 * @param integer $intIdOffer
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Offer
		 */
		public static function Load($intIdOffer, $objOptionalClauses = null) {
			// Use QuerySingle to Perform the Query
			return Offer::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Offer()->IdOffer, $intIdOffer)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load all Offers
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Offer[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Offer::QueryArray to perform the LoadAll query
			try {
				return Offer::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Offers
		 * @return int
		 */
		public static function CountAll() {
			// Call Offer::QueryCount to perform the CountAll query
			return Offer::QueryCount(QQ::All());
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
			$objDatabase = Offer::GetDatabase();

			// Create/Build out the QueryBuilder object with Offer-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'offer');
			Offer::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('offer');

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
		 * Static Qcubed Query method to query for a single Offer object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Offer the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Offer::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Offer object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Offer::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Offer::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Offer objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Offer[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Offer::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Offer::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of Offer objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Offer::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Offer::GetDatabase();

			$strQuery = Offer::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/offer', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Offer::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Offer
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'offer';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'IdOffer', $strAliasPrefix . 'IdOffer');
			$objBuilder->AddSelectItem($strTableName, 'Description', $strAliasPrefix . 'Description');
			$objBuilder->AddSelectItem($strTableName, 'OfferedCoins', $strAliasPrefix . 'OfferedCoins');
			$objBuilder->AddSelectItem($strTableName, 'DateFrom', $strAliasPrefix . 'DateFrom');
			$objBuilder->AddSelectItem($strTableName, 'DateTo', $strAliasPrefix . 'DateTo');
			$objBuilder->AddSelectItem($strTableName, 'IdRestaurant', $strAliasPrefix . 'IdRestaurant');
			$objBuilder->AddSelectItem($strTableName, 'MaxOffers', $strAliasPrefix . 'MaxOffers');
			$objBuilder->AddSelectItem($strTableName, 'AppliedOffers', $strAliasPrefix . 'AppliedOffers');
			$objBuilder->AddSelectItem($strTableName, 'MaxCoins', $strAliasPrefix . 'MaxCoins');
			$objBuilder->AddSelectItem($strTableName, 'Status', $strAliasPrefix . 'Status');
		}



		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Offer from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Offer::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Offer
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'IdOffer';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && is_array($arrPreviousItems) && count($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objPreviousItem->intIdOffer == $objDbRow->GetColumn($strAliasName, 'Integer')) {
						// We are.  Now, prepare to check for ExpandAsArray clauses
						$blnExpandedViaArray = false;
						if (!$strAliasPrefix)
							$strAliasPrefix = 'offer__';


						// Expanding reverse references: BalanceAsIdOffer
						$strAlias = $strAliasPrefix . 'balanceasidoffer__IdBalance';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if(null === $objPreviousItem->_objBalanceAsIdOfferArray)
								$objPreviousItem->_objBalanceAsIdOfferArray = array();
							if ($intPreviousChildItemCount = count($objPreviousItem->_objBalanceAsIdOfferArray)) {
								$objPreviousChildItems = $objPreviousItem->_objBalanceAsIdOfferArray;
								$objChildItem = Balance::InstantiateDbRow($objDbRow, $strAliasPrefix . 'balanceasidoffer__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->_objBalanceAsIdOfferArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->_objBalanceAsIdOfferArray[] = Balance::InstantiateDbRow($objDbRow, $strAliasPrefix . 'balanceasidoffer__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
						if ($blnExpandedViaArray) {
							return false;
						} else if ($strAliasPrefix == 'offer__') {
							$strAliasPrefix = null;
						}
					}
				}
			}

			// Create a new instance of the Offer object
			$objToReturn = new Offer();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'IdOffer', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'IdOffer'] : $strAliasPrefix . 'IdOffer';
			$objToReturn->intIdOffer = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'Description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Description'] : $strAliasPrefix . 'Description';
			$objToReturn->strDescription = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'OfferedCoins', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'OfferedCoins'] : $strAliasPrefix . 'OfferedCoins';
			$objToReturn->fltOfferedCoins = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAliasName = array_key_exists($strAliasPrefix . 'DateFrom', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'DateFrom'] : $strAliasPrefix . 'DateFrom';
			$objToReturn->dttDateFrom = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'DateTo', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'DateTo'] : $strAliasPrefix . 'DateTo';
			$objToReturn->dttDateTo = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'IdRestaurant', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'IdRestaurant'] : $strAliasPrefix . 'IdRestaurant';
			$objToReturn->intIdRestaurant = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'MaxOffers', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'MaxOffers'] : $strAliasPrefix . 'MaxOffers';
			$objToReturn->intMaxOffers = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'AppliedOffers', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'AppliedOffers'] : $strAliasPrefix . 'AppliedOffers';
			$objToReturn->intAppliedOffers = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'MaxCoins', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'MaxCoins'] : $strAliasPrefix . 'MaxCoins';
			$objToReturn->intMaxCoins = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'Status', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Status'] : $strAliasPrefix . 'Status';
			$objToReturn->intStatus = $objDbRow->GetColumn($strAliasName, 'Integer');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->IdOffer != $objPreviousItem->IdOffer) {
						continue;
					}
					if (array_diff($objPreviousItem->_objBalanceAsIdOfferArray, $objToReturn->_objBalanceAsIdOfferArray) != null) {
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
				$strAliasPrefix = 'offer__';

			// Check for IdRestaurantObject Early Binding
			$strAlias = $strAliasPrefix . 'IdRestaurant__IdRestaurant';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdRestaurantObject = Restaurant::InstantiateDbRow($objDbRow, $strAliasPrefix . 'IdRestaurant__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for BalanceAsIdOffer Virtual Binding
			$strAlias = $strAliasPrefix . 'balanceasidoffer__IdBalance';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = $strExpandAsArrayNodes && array_key_exists($strAlias, $strExpandAsArrayNodes);
			if ($blnExpanded && null === $objToReturn->_objBalanceAsIdOfferArray)
				$objToReturn->_objBalanceAsIdOfferArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded)
					$objToReturn->_objBalanceAsIdOfferArray[] = Balance::InstantiateDbRow($objDbRow, $strAliasPrefix . 'balanceasidoffer__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objBalanceAsIdOffer = Balance::InstantiateDbRow($objDbRow, $strAliasPrefix . 'balanceasidoffer__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Offers from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Offer[]
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
					$objItem = Offer::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Offer::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}



		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Offer object,
		 * by IdOffer Index(es)
		 * @param integer $intIdOffer
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Offer
		*/
		public static function LoadByIdOffer($intIdOffer, $objOptionalClauses = null) {
			return Offer::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Offer()->IdOffer, $intIdOffer)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Offer objects,
		 * by IdRestaurant Index(es)
		 * @param integer $intIdRestaurant
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Offer[]
		*/
		public static function LoadArrayByIdRestaurant($intIdRestaurant, $objOptionalClauses = null) {
			// Call Offer::QueryArray to perform the LoadArrayByIdRestaurant query
			try {
				return Offer::QueryArray(
					QQ::Equal(QQN::Offer()->IdRestaurant, $intIdRestaurant),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Offers
		 * by IdRestaurant Index(es)
		 * @param integer $intIdRestaurant
		 * @return int
		*/
		public static function CountByIdRestaurant($intIdRestaurant) {
			// Call Offer::QueryCount to perform the CountByIdRestaurant query
			return Offer::QueryCount(
				QQ::Equal(QQN::Offer()->IdRestaurant, $intIdRestaurant)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Offer
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Offer::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `offer` (
							`Description`,
							`OfferedCoins`,
							`DateFrom`,
							`DateTo`,
							`IdRestaurant`,
							`MaxOffers`,
							`AppliedOffers`,
							`MaxCoins`,
							`Status`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strDescription) . ',
							' . $objDatabase->SqlVariable($this->fltOfferedCoins) . ',
							' . $objDatabase->SqlVariable($this->dttDateFrom) . ',
							' . $objDatabase->SqlVariable($this->dttDateTo) . ',
							' . $objDatabase->SqlVariable($this->intIdRestaurant) . ',
							' . $objDatabase->SqlVariable($this->intMaxOffers) . ',
							' . $objDatabase->SqlVariable($this->intAppliedOffers) . ',
							' . $objDatabase->SqlVariable($this->intMaxCoins) . ',
							' . $objDatabase->SqlVariable($this->intStatus) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intIdOffer = $objDatabase->InsertId('offer', 'IdOffer');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`offer`
						SET
							`Description` = ' . $objDatabase->SqlVariable($this->strDescription) . ',
							`OfferedCoins` = ' . $objDatabase->SqlVariable($this->fltOfferedCoins) . ',
							`DateFrom` = ' . $objDatabase->SqlVariable($this->dttDateFrom) . ',
							`DateTo` = ' . $objDatabase->SqlVariable($this->dttDateTo) . ',
							`IdRestaurant` = ' . $objDatabase->SqlVariable($this->intIdRestaurant) . ',
							`MaxOffers` = ' . $objDatabase->SqlVariable($this->intMaxOffers) . ',
							`AppliedOffers` = ' . $objDatabase->SqlVariable($this->intAppliedOffers) . ',
							`MaxCoins` = ' . $objDatabase->SqlVariable($this->intMaxCoins) . ',
							`Status` = ' . $objDatabase->SqlVariable($this->intStatus) . '
						WHERE
							`IdOffer` = ' . $objDatabase->SqlVariable($this->intIdOffer) . '
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
		 * Delete this Offer
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intIdOffer)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Offer with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Offer::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`offer`
				WHERE
					`IdOffer` = ' . $objDatabase->SqlVariable($this->intIdOffer) . '');
		}

		/**
		 * Delete all Offers
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Offer::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`offer`');
		}

		/**
		 * Truncate offer table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Offer::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `offer`');
		}

		/**
		 * Reload this Offer from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Offer object.');

			// Reload the Object
			$objReloaded = Offer::Load($this->intIdOffer);

			// Update $this's local variables to match
			$this->strDescription = $objReloaded->strDescription;
			$this->fltOfferedCoins = $objReloaded->fltOfferedCoins;
			$this->dttDateFrom = $objReloaded->dttDateFrom;
			$this->dttDateTo = $objReloaded->dttDateTo;
			$this->IdRestaurant = $objReloaded->IdRestaurant;
			$this->intMaxOffers = $objReloaded->intMaxOffers;
			$this->intAppliedOffers = $objReloaded->intAppliedOffers;
			$this->intMaxCoins = $objReloaded->intMaxCoins;
			$this->intStatus = $objReloaded->intStatus;
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
				case 'IdOffer':
					/**
					 * Gets the value for intIdOffer (Read-Only PK)
					 * @return integer
					 */
					return $this->intIdOffer;

				case 'Description':
					/**
					 * Gets the value for strDescription (Not Null)
					 * @return string
					 */
					return $this->strDescription;

				case 'OfferedCoins':
					/**
					 * Gets the value for fltOfferedCoins (Not Null)
					 * @return double
					 */
					return $this->fltOfferedCoins;

				case 'DateFrom':
					/**
					 * Gets the value for dttDateFrom (Not Null)
					 * @return QDateTime
					 */
					return $this->dttDateFrom;

				case 'DateTo':
					/**
					 * Gets the value for dttDateTo 
					 * @return QDateTime
					 */
					return $this->dttDateTo;

				case 'IdRestaurant':
					/**
					 * Gets the value for intIdRestaurant (Not Null)
					 * @return integer
					 */
					return $this->intIdRestaurant;

				case 'MaxOffers':
					/**
					 * Gets the value for intMaxOffers 
					 * @return integer
					 */
					return $this->intMaxOffers;

				case 'AppliedOffers':
					/**
					 * Gets the value for intAppliedOffers 
					 * @return integer
					 */
					return $this->intAppliedOffers;

				case 'MaxCoins':
					/**
					 * Gets the value for intMaxCoins 
					 * @return integer
					 */
					return $this->intMaxCoins;

				case 'Status':
					/**
					 * Gets the value for intStatus 
					 * @return integer
					 */
					return $this->intStatus;


				///////////////////
				// Member Objects
				///////////////////
				case 'IdRestaurantObject':
					/**
					 * Gets the value for the Restaurant object referenced by intIdRestaurant (Not Null)
					 * @return Restaurant
					 */
					try {
						if ((!$this->objIdRestaurantObject) && (!is_null($this->intIdRestaurant)))
							$this->objIdRestaurantObject = Restaurant::Load($this->intIdRestaurant);
						return $this->objIdRestaurantObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_BalanceAsIdOffer':
					/**
					 * Gets the value for the private _objBalanceAsIdOffer (Read-Only)
					 * if set due to an expansion on the balance.IdOffer reverse relationship
					 * @return Balance
					 */
					return $this->_objBalanceAsIdOffer;

				case '_BalanceAsIdOfferArray':
					/**
					 * Gets the value for the private _objBalanceAsIdOfferArray (Read-Only)
					 * if set due to an ExpandAsArray on the balance.IdOffer reverse relationship
					 * @return Balance[]
					 */
					return $this->_objBalanceAsIdOfferArray;


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
				case 'Description':
					/**
					 * Sets the value for strDescription (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescription = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'OfferedCoins':
					/**
					 * Sets the value for fltOfferedCoins (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltOfferedCoins = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateFrom':
					/**
					 * Sets the value for dttDateFrom (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttDateFrom = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateTo':
					/**
					 * Sets the value for dttDateTo 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttDateTo = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'IdRestaurant':
					/**
					 * Sets the value for intIdRestaurant (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objIdRestaurantObject = null;
						return ($this->intIdRestaurant = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MaxOffers':
					/**
					 * Sets the value for intMaxOffers 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intMaxOffers = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AppliedOffers':
					/**
					 * Sets the value for intAppliedOffers 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intAppliedOffers = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MaxCoins':
					/**
					 * Sets the value for intMaxCoins 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intMaxCoins = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Status':
					/**
					 * Sets the value for intStatus 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intStatus = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'IdRestaurantObject':
					/**
					 * Sets the value for the Restaurant object referenced by intIdRestaurant (Not Null)
					 * @param Restaurant $mixValue
					 * @return Restaurant
					 */
					if (is_null($mixValue)) {
						$this->intIdRestaurant = null;
						$this->objIdRestaurantObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Restaurant object
						try {
							$mixValue = QType::Cast($mixValue, 'Restaurant');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Restaurant object
						if (is_null($mixValue->IdRestaurant))
							throw new QCallerException('Unable to set an unsaved IdRestaurantObject for this Offer');

						// Update Local Member Variables
						$this->objIdRestaurantObject = $mixValue;
						$this->intIdRestaurant = $mixValue->IdRestaurant;

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

			
		
		// Related Objects' Methods for BalanceAsIdOffer
		//-------------------------------------------------------------------

		/**
		 * Gets all associated BalancesAsIdOffer as an array of Balance objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Balance[]
		*/
		public function GetBalanceAsIdOfferArray($objOptionalClauses = null) {
			if ((is_null($this->intIdOffer)))
				return array();

			try {
				return Balance::LoadArrayByIdOffer($this->intIdOffer, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated BalancesAsIdOffer
		 * @return int
		*/
		public function CountBalancesAsIdOffer() {
			if ((is_null($this->intIdOffer)))
				return 0;

			return Balance::CountByIdOffer($this->intIdOffer);
		}

		/**
		 * Associates a BalanceAsIdOffer
		 * @param Balance $objBalance
		 * @return void
		*/
		public function AssociateBalanceAsIdOffer(Balance $objBalance) {
			if ((is_null($this->intIdOffer)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateBalanceAsIdOffer on this unsaved Offer.');
			if ((is_null($objBalance->IdBalance)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateBalanceAsIdOffer on this Offer with an unsaved Balance.');

			// Get the Database Object for this Class
			$objDatabase = Offer::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`balance`
				SET
					`IdOffer` = ' . $objDatabase->SqlVariable($this->intIdOffer) . '
				WHERE
					`IdBalance` = ' . $objDatabase->SqlVariable($objBalance->IdBalance) . '
			');
		}

		/**
		 * Unassociates a BalanceAsIdOffer
		 * @param Balance $objBalance
		 * @return void
		*/
		public function UnassociateBalanceAsIdOffer(Balance $objBalance) {
			if ((is_null($this->intIdOffer)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBalanceAsIdOffer on this unsaved Offer.');
			if ((is_null($objBalance->IdBalance)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBalanceAsIdOffer on this Offer with an unsaved Balance.');

			// Get the Database Object for this Class
			$objDatabase = Offer::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`balance`
				SET
					`IdOffer` = null
				WHERE
					`IdBalance` = ' . $objDatabase->SqlVariable($objBalance->IdBalance) . ' AND
					`IdOffer` = ' . $objDatabase->SqlVariable($this->intIdOffer) . '
			');
		}

		/**
		 * Unassociates all BalancesAsIdOffer
		 * @return void
		*/
		public function UnassociateAllBalancesAsIdOffer() {
			if ((is_null($this->intIdOffer)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBalanceAsIdOffer on this unsaved Offer.');

			// Get the Database Object for this Class
			$objDatabase = Offer::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`balance`
				SET
					`IdOffer` = null
				WHERE
					`IdOffer` = ' . $objDatabase->SqlVariable($this->intIdOffer) . '
			');
		}

		/**
		 * Deletes an associated BalanceAsIdOffer
		 * @param Balance $objBalance
		 * @return void
		*/
		public function DeleteAssociatedBalanceAsIdOffer(Balance $objBalance) {
			if ((is_null($this->intIdOffer)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBalanceAsIdOffer on this unsaved Offer.');
			if ((is_null($objBalance->IdBalance)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBalanceAsIdOffer on this Offer with an unsaved Balance.');

			// Get the Database Object for this Class
			$objDatabase = Offer::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`balance`
				WHERE
					`IdBalance` = ' . $objDatabase->SqlVariable($objBalance->IdBalance) . ' AND
					`IdOffer` = ' . $objDatabase->SqlVariable($this->intIdOffer) . '
			');
		}

		/**
		 * Deletes all associated BalancesAsIdOffer
		 * @return void
		*/
		public function DeleteAllBalancesAsIdOffer() {
			if ((is_null($this->intIdOffer)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBalanceAsIdOffer on this unsaved Offer.');

			// Get the Database Object for this Class
			$objDatabase = Offer::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`balance`
				WHERE
					`IdOffer` = ' . $objDatabase->SqlVariable($this->intIdOffer) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Offer"><sequence>';
			$strToReturn .= '<element name="IdOffer" type="xsd:int"/>';
			$strToReturn .= '<element name="Description" type="xsd:string"/>';
			$strToReturn .= '<element name="OfferedCoins" type="xsd:float"/>';
			$strToReturn .= '<element name="DateFrom" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="DateTo" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="IdRestaurantObject" type="xsd1:Restaurant"/>';
			$strToReturn .= '<element name="MaxOffers" type="xsd:int"/>';
			$strToReturn .= '<element name="AppliedOffers" type="xsd:int"/>';
			$strToReturn .= '<element name="MaxCoins" type="xsd:int"/>';
			$strToReturn .= '<element name="Status" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Offer', $strComplexTypeArray)) {
				$strComplexTypeArray['Offer'] = Offer::GetSoapComplexTypeXml();
				Restaurant::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Offer::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Offer();
			if (property_exists($objSoapObject, 'IdOffer'))
				$objToReturn->intIdOffer = $objSoapObject->IdOffer;
			if (property_exists($objSoapObject, 'Description'))
				$objToReturn->strDescription = $objSoapObject->Description;
			if (property_exists($objSoapObject, 'OfferedCoins'))
				$objToReturn->fltOfferedCoins = $objSoapObject->OfferedCoins;
			if (property_exists($objSoapObject, 'DateFrom'))
				$objToReturn->dttDateFrom = new QDateTime($objSoapObject->DateFrom);
			if (property_exists($objSoapObject, 'DateTo'))
				$objToReturn->dttDateTo = new QDateTime($objSoapObject->DateTo);
			if ((property_exists($objSoapObject, 'IdRestaurantObject')) &&
				($objSoapObject->IdRestaurantObject))
				$objToReturn->IdRestaurantObject = Restaurant::GetObjectFromSoapObject($objSoapObject->IdRestaurantObject);
			if (property_exists($objSoapObject, 'MaxOffers'))
				$objToReturn->intMaxOffers = $objSoapObject->MaxOffers;
			if (property_exists($objSoapObject, 'AppliedOffers'))
				$objToReturn->intAppliedOffers = $objSoapObject->AppliedOffers;
			if (property_exists($objSoapObject, 'MaxCoins'))
				$objToReturn->intMaxCoins = $objSoapObject->MaxCoins;
			if (property_exists($objSoapObject, 'Status'))
				$objToReturn->intStatus = $objSoapObject->Status;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Offer::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttDateFrom)
				$objObject->dttDateFrom = $objObject->dttDateFrom->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttDateTo)
				$objObject->dttDateTo = $objObject->dttDateTo->qFormat(QDateTime::FormatSoap);
			if ($objObject->objIdRestaurantObject)
				$objObject->objIdRestaurantObject = Restaurant::GetSoapObjectFromObject($objObject->objIdRestaurantObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIdRestaurant = null;
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
			$iArray['IdOffer'] = $this->intIdOffer;
			$iArray['Description'] = $this->strDescription;
			$iArray['OfferedCoins'] = $this->fltOfferedCoins;
			$iArray['DateFrom'] = $this->dttDateFrom;
			$iArray['DateTo'] = $this->dttDateTo;
			$iArray['IdRestaurant'] = $this->intIdRestaurant;
			$iArray['MaxOffers'] = $this->intMaxOffers;
			$iArray['AppliedOffers'] = $this->intAppliedOffers;
			$iArray['MaxCoins'] = $this->intMaxCoins;
			$iArray['Status'] = $this->intStatus;
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
     * @property-read QQNode $IdOffer
     * @property-read QQNode $Description
     * @property-read QQNode $OfferedCoins
     * @property-read QQNode $DateFrom
     * @property-read QQNode $DateTo
     * @property-read QQNode $IdRestaurant
     * @property-read QQNodeRestaurant $IdRestaurantObject
     * @property-read QQNode $MaxOffers
     * @property-read QQNode $AppliedOffers
     * @property-read QQNode $MaxCoins
     * @property-read QQNode $Status
     *
     *
     * @property-read QQReverseReferenceNodeBalance $BalanceAsIdOffer

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeOffer extends QQNode {
		protected $strTableName = 'offer';
		protected $strPrimaryKey = 'IdOffer';
		protected $strClassName = 'Offer';
		public function __get($strName) {
			switch ($strName) {
				case 'IdOffer':
					return new QQNode('IdOffer', 'IdOffer', 'Integer', $this);
				case 'Description':
					return new QQNode('Description', 'Description', 'Blob', $this);
				case 'OfferedCoins':
					return new QQNode('OfferedCoins', 'OfferedCoins', 'Float', $this);
				case 'DateFrom':
					return new QQNode('DateFrom', 'DateFrom', 'DateTime', $this);
				case 'DateTo':
					return new QQNode('DateTo', 'DateTo', 'DateTime', $this);
				case 'IdRestaurant':
					return new QQNode('IdRestaurant', 'IdRestaurant', 'Integer', $this);
				case 'IdRestaurantObject':
					return new QQNodeRestaurant('IdRestaurant', 'IdRestaurantObject', 'Integer', $this);
				case 'MaxOffers':
					return new QQNode('MaxOffers', 'MaxOffers', 'Integer', $this);
				case 'AppliedOffers':
					return new QQNode('AppliedOffers', 'AppliedOffers', 'Integer', $this);
				case 'MaxCoins':
					return new QQNode('MaxCoins', 'MaxCoins', 'Integer', $this);
				case 'Status':
					return new QQNode('Status', 'Status', 'Integer', $this);
				case 'BalanceAsIdOffer':
					return new QQReverseReferenceNodeBalance($this, 'balanceasidoffer', 'reverse_reference', 'IdOffer');

				case '_PrimaryKeyNode':
					return new QQNode('IdOffer', 'IdOffer', 'Integer', $this);
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
     * @property-read QQNode $IdOffer
     * @property-read QQNode $Description
     * @property-read QQNode $OfferedCoins
     * @property-read QQNode $DateFrom
     * @property-read QQNode $DateTo
     * @property-read QQNode $IdRestaurant
     * @property-read QQNodeRestaurant $IdRestaurantObject
     * @property-read QQNode $MaxOffers
     * @property-read QQNode $AppliedOffers
     * @property-read QQNode $MaxCoins
     * @property-read QQNode $Status
     *
     *
     * @property-read QQReverseReferenceNodeBalance $BalanceAsIdOffer

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeOffer extends QQReverseReferenceNode {
		protected $strTableName = 'offer';
		protected $strPrimaryKey = 'IdOffer';
		protected $strClassName = 'Offer';
		public function __get($strName) {
			switch ($strName) {
				case 'IdOffer':
					return new QQNode('IdOffer', 'IdOffer', 'integer', $this);
				case 'Description':
					return new QQNode('Description', 'Description', 'string', $this);
				case 'OfferedCoins':
					return new QQNode('OfferedCoins', 'OfferedCoins', 'double', $this);
				case 'DateFrom':
					return new QQNode('DateFrom', 'DateFrom', 'QDateTime', $this);
				case 'DateTo':
					return new QQNode('DateTo', 'DateTo', 'QDateTime', $this);
				case 'IdRestaurant':
					return new QQNode('IdRestaurant', 'IdRestaurant', 'integer', $this);
				case 'IdRestaurantObject':
					return new QQNodeRestaurant('IdRestaurant', 'IdRestaurantObject', 'integer', $this);
				case 'MaxOffers':
					return new QQNode('MaxOffers', 'MaxOffers', 'integer', $this);
				case 'AppliedOffers':
					return new QQNode('AppliedOffers', 'AppliedOffers', 'integer', $this);
				case 'MaxCoins':
					return new QQNode('MaxCoins', 'MaxCoins', 'integer', $this);
				case 'Status':
					return new QQNode('Status', 'Status', 'integer', $this);
				case 'BalanceAsIdOffer':
					return new QQReverseReferenceNodeBalance($this, 'balanceasidoffer', 'reverse_reference', 'IdOffer');

				case '_PrimaryKeyNode':
					return new QQNode('IdOffer', 'IdOffer', 'integer', $this);
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
