<?php
	/**
	 * The abstract RestaurantGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Restaurant subclass which
	 * extends this RestaurantGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Restaurant class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $IdRestaurant the value for intIdRestaurant (Read-Only PK)
	 * @property string $Country the value for strCountry (Not Null)
	 * @property string $City the value for strCity (Not Null)
	 * @property string $Address the value for strAddress (Not Null)
	 * @property string $RestaurantName the value for strRestaurantName (Not Null)
	 * @property string $Longitude the value for strLongitude (Not Null)
	 * @property string $Latitude the value for strLatitude (Not Null)
	 * @property string $QrCode the value for strQrCode (Not Null)
	 * @property integer $Qtycoins the value for intQtycoins 
	 * @property integer $IdUser the value for intIdUser (Not Null)
	 * @property string $Type the value for strType (Not Null)
	 * @property User $IdUserObject the value for the User object referenced by intIdUser (Not Null)
	 * @property-read Offer $_OfferAsIdRestaurant the value for the private _objOfferAsIdRestaurant (Read-Only) if set due to an expansion on the offer.IdRestaurant reverse relationship
	 * @property-read Offer[] $_OfferAsIdRestaurantArray the value for the private _objOfferAsIdRestaurantArray (Read-Only) if set due to an ExpandAsArray on the offer.IdRestaurant reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class RestaurantGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column restaurant.IdRestaurant
		 * @var integer intIdRestaurant
		 */
		protected $intIdRestaurant;
		const IdRestaurantDefault = null;


		/**
		 * Protected member variable that maps to the database column restaurant.Country
		 * @var string strCountry
		 */
		protected $strCountry;
		const CountryMaxLength = 100;
		const CountryDefault = null;


		/**
		 * Protected member variable that maps to the database column restaurant.City
		 * @var string strCity
		 */
		protected $strCity;
		const CityMaxLength = 100;
		const CityDefault = null;


		/**
		 * Protected member variable that maps to the database column restaurant.Address
		 * @var string strAddress
		 */
		protected $strAddress;
		const AddressMaxLength = 100;
		const AddressDefault = null;


		/**
		 * Protected member variable that maps to the database column restaurant.RestaurantName
		 * @var string strRestaurantName
		 */
		protected $strRestaurantName;
		const RestaurantNameMaxLength = 100;
		const RestaurantNameDefault = null;


		/**
		 * Protected member variable that maps to the database column restaurant.Longitude
		 * @var string strLongitude
		 */
		protected $strLongitude;
		const LongitudeDefault = null;


		/**
		 * Protected member variable that maps to the database column restaurant.Latitude
		 * @var string strLatitude
		 */
		protected $strLatitude;
		const LatitudeDefault = null;


		/**
		 * Protected member variable that maps to the database column restaurant.QrCode
		 * @var string strQrCode
		 */
		protected $strQrCode;
		const QrCodeDefault = null;


		/**
		 * Protected member variable that maps to the database column restaurant.qtycoins
		 * @var integer intQtycoins
		 */
		protected $intQtycoins;
		const QtycoinsDefault = null;


		/**
		 * Protected member variable that maps to the database column restaurant.IdUser
		 * @var integer intIdUser
		 */
		protected $intIdUser;
		const IdUserDefault = null;


		/**
		 * Protected member variable that maps to the database column restaurant.Type
		 * @var string strType
		 */
		protected $strType;
		const TypeMaxLength = 50;
		const TypeDefault = null;


		/**
		 * Private member variable that stores a reference to a single OfferAsIdRestaurant object
		 * (of type Offer), if this Restaurant object was restored with
		 * an expansion on the offer association table.
		 * @var Offer _objOfferAsIdRestaurant;
		 */
		private $_objOfferAsIdRestaurant;

		/**
		 * Private member variable that stores a reference to an array of OfferAsIdRestaurant objects
		 * (of type Offer[]), if this Restaurant object was restored with
		 * an ExpandAsArray on the offer association table.
		 * @var Offer[] _objOfferAsIdRestaurantArray;
		 */
		private $_objOfferAsIdRestaurantArray = null;

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
		 * in the database column restaurant.IdUser.
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
			$this->intIdRestaurant = Restaurant::IdRestaurantDefault;
			$this->strCountry = Restaurant::CountryDefault;
			$this->strCity = Restaurant::CityDefault;
			$this->strAddress = Restaurant::AddressDefault;
			$this->strRestaurantName = Restaurant::RestaurantNameDefault;
			$this->strLongitude = Restaurant::LongitudeDefault;
			$this->strLatitude = Restaurant::LatitudeDefault;
			$this->strQrCode = Restaurant::QrCodeDefault;
			$this->intQtycoins = Restaurant::QtycoinsDefault;
			$this->intIdUser = Restaurant::IdUserDefault;
			$this->strType = Restaurant::TypeDefault;
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
		 * Load a Restaurant from PK Info
		 * @param integer $intIdRestaurant
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Restaurant
		 */
		public static function Load($intIdRestaurant, $objOptionalClauses = null) {
			// Use QuerySingle to Perform the Query
			return Restaurant::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Restaurant()->IdRestaurant, $intIdRestaurant)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load all Restaurants
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Restaurant[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Restaurant::QueryArray to perform the LoadAll query
			try {
				return Restaurant::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Restaurants
		 * @return int
		 */
		public static function CountAll() {
			// Call Restaurant::QueryCount to perform the CountAll query
			return Restaurant::QueryCount(QQ::All());
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
			$objDatabase = Restaurant::GetDatabase();

			// Create/Build out the QueryBuilder object with Restaurant-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'restaurant');
			Restaurant::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('restaurant');

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
		 * Static Qcubed Query method to query for a single Restaurant object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Restaurant the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Restaurant::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Restaurant object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Restaurant::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Restaurant::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Restaurant objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Restaurant[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Restaurant::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Restaurant::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of Restaurant objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Restaurant::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Restaurant::GetDatabase();

			$strQuery = Restaurant::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/restaurant', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Restaurant::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Restaurant
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'restaurant';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'IdRestaurant', $strAliasPrefix . 'IdRestaurant');
			$objBuilder->AddSelectItem($strTableName, 'Country', $strAliasPrefix . 'Country');
			$objBuilder->AddSelectItem($strTableName, 'City', $strAliasPrefix . 'City');
			$objBuilder->AddSelectItem($strTableName, 'Address', $strAliasPrefix . 'Address');
			$objBuilder->AddSelectItem($strTableName, 'RestaurantName', $strAliasPrefix . 'RestaurantName');
			$objBuilder->AddSelectItem($strTableName, 'Longitude', $strAliasPrefix . 'Longitude');
			$objBuilder->AddSelectItem($strTableName, 'Latitude', $strAliasPrefix . 'Latitude');
			$objBuilder->AddSelectItem($strTableName, 'QrCode', $strAliasPrefix . 'QrCode');
			$objBuilder->AddSelectItem($strTableName, 'qtycoins', $strAliasPrefix . 'qtycoins');
			$objBuilder->AddSelectItem($strTableName, 'IdUser', $strAliasPrefix . 'IdUser');
			$objBuilder->AddSelectItem($strTableName, 'Type', $strAliasPrefix . 'Type');
		}



		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Restaurant from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Restaurant::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Restaurant
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'IdRestaurant';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && is_array($arrPreviousItems) && count($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objPreviousItem->intIdRestaurant == $objDbRow->GetColumn($strAliasName, 'Integer')) {
						// We are.  Now, prepare to check for ExpandAsArray clauses
						$blnExpandedViaArray = false;
						if (!$strAliasPrefix)
							$strAliasPrefix = 'restaurant__';


						// Expanding reverse references: OfferAsIdRestaurant
						$strAlias = $strAliasPrefix . 'offerasidrestaurant__IdOffer';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if(null === $objPreviousItem->_objOfferAsIdRestaurantArray)
								$objPreviousItem->_objOfferAsIdRestaurantArray = array();
							if ($intPreviousChildItemCount = count($objPreviousItem->_objOfferAsIdRestaurantArray)) {
								$objPreviousChildItems = $objPreviousItem->_objOfferAsIdRestaurantArray;
								$objChildItem = Offer::InstantiateDbRow($objDbRow, $strAliasPrefix . 'offerasidrestaurant__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->_objOfferAsIdRestaurantArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->_objOfferAsIdRestaurantArray[] = Offer::InstantiateDbRow($objDbRow, $strAliasPrefix . 'offerasidrestaurant__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
						if ($blnExpandedViaArray) {
							return false;
						} else if ($strAliasPrefix == 'restaurant__') {
							$strAliasPrefix = null;
						}
					}
				}
			}

			// Create a new instance of the Restaurant object
			$objToReturn = new Restaurant();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'IdRestaurant', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'IdRestaurant'] : $strAliasPrefix . 'IdRestaurant';
			$objToReturn->intIdRestaurant = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'Country', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Country'] : $strAliasPrefix . 'Country';
			$objToReturn->strCountry = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'City', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'City'] : $strAliasPrefix . 'City';
			$objToReturn->strCity = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'Address', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Address'] : $strAliasPrefix . 'Address';
			$objToReturn->strAddress = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'RestaurantName', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'RestaurantName'] : $strAliasPrefix . 'RestaurantName';
			$objToReturn->strRestaurantName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'Longitude', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Longitude'] : $strAliasPrefix . 'Longitude';
			$objToReturn->strLongitude = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'Latitude', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Latitude'] : $strAliasPrefix . 'Latitude';
			$objToReturn->strLatitude = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'QrCode', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'QrCode'] : $strAliasPrefix . 'QrCode';
			$objToReturn->strQrCode = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'qtycoins', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'qtycoins'] : $strAliasPrefix . 'qtycoins';
			$objToReturn->intQtycoins = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'IdUser', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'IdUser'] : $strAliasPrefix . 'IdUser';
			$objToReturn->intIdUser = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'Type', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Type'] : $strAliasPrefix . 'Type';
			$objToReturn->strType = $objDbRow->GetColumn($strAliasName, 'VarChar');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->IdRestaurant != $objPreviousItem->IdRestaurant) {
						continue;
					}
					if (array_diff($objPreviousItem->_objOfferAsIdRestaurantArray, $objToReturn->_objOfferAsIdRestaurantArray) != null) {
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
				$strAliasPrefix = 'restaurant__';

			// Check for IdUserObject Early Binding
			$strAlias = $strAliasPrefix . 'IdUser__IdUser';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdUserObject = User::InstantiateDbRow($objDbRow, $strAliasPrefix . 'IdUser__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for OfferAsIdRestaurant Virtual Binding
			$strAlias = $strAliasPrefix . 'offerasidrestaurant__IdOffer';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = $strExpandAsArrayNodes && array_key_exists($strAlias, $strExpandAsArrayNodes);
			if ($blnExpanded && null === $objToReturn->_objOfferAsIdRestaurantArray)
				$objToReturn->_objOfferAsIdRestaurantArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded)
					$objToReturn->_objOfferAsIdRestaurantArray[] = Offer::InstantiateDbRow($objDbRow, $strAliasPrefix . 'offerasidrestaurant__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objOfferAsIdRestaurant = Offer::InstantiateDbRow($objDbRow, $strAliasPrefix . 'offerasidrestaurant__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Restaurants from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Restaurant[]
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
					$objItem = Restaurant::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Restaurant::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}



		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Restaurant object,
		 * by IdRestaurant Index(es)
		 * @param integer $intIdRestaurant
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Restaurant
		*/
		public static function LoadByIdRestaurant($intIdRestaurant, $objOptionalClauses = null) {
			return Restaurant::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Restaurant()->IdRestaurant, $intIdRestaurant)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Restaurant objects,
		 * by IdUser Index(es)
		 * @param integer $intIdUser
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Restaurant[]
		*/
		public static function LoadArrayByIdUser($intIdUser, $objOptionalClauses = null) {
			// Call Restaurant::QueryArray to perform the LoadArrayByIdUser query
			try {
				return Restaurant::QueryArray(
					QQ::Equal(QQN::Restaurant()->IdUser, $intIdUser),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Restaurants
		 * by IdUser Index(es)
		 * @param integer $intIdUser
		 * @return int
		*/
		public static function CountByIdUser($intIdUser) {
			// Call Restaurant::QueryCount to perform the CountByIdUser query
			return Restaurant::QueryCount(
				QQ::Equal(QQN::Restaurant()->IdUser, $intIdUser)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Restaurant
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Restaurant::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `restaurant` (
							`Country`,
							`City`,
							`Address`,
							`RestaurantName`,
							`Longitude`,
							`Latitude`,
							`QrCode`,
							`qtycoins`,
							`IdUser`,
							`Type`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strCountry) . ',
							' . $objDatabase->SqlVariable($this->strCity) . ',
							' . $objDatabase->SqlVariable($this->strAddress) . ',
							' . $objDatabase->SqlVariable($this->strRestaurantName) . ',
							' . $objDatabase->SqlVariable($this->strLongitude) . ',
							' . $objDatabase->SqlVariable($this->strLatitude) . ',
							' . $objDatabase->SqlVariable($this->strQrCode) . ',
							' . $objDatabase->SqlVariable($this->intQtycoins) . ',
							' . $objDatabase->SqlVariable($this->intIdUser) . ',
							' . $objDatabase->SqlVariable($this->strType) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intIdRestaurant = $objDatabase->InsertId('restaurant', 'IdRestaurant');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`restaurant`
						SET
							`Country` = ' . $objDatabase->SqlVariable($this->strCountry) . ',
							`City` = ' . $objDatabase->SqlVariable($this->strCity) . ',
							`Address` = ' . $objDatabase->SqlVariable($this->strAddress) . ',
							`RestaurantName` = ' . $objDatabase->SqlVariable($this->strRestaurantName) . ',
							`Longitude` = ' . $objDatabase->SqlVariable($this->strLongitude) . ',
							`Latitude` = ' . $objDatabase->SqlVariable($this->strLatitude) . ',
							`QrCode` = ' . $objDatabase->SqlVariable($this->strQrCode) . ',
							`qtycoins` = ' . $objDatabase->SqlVariable($this->intQtycoins) . ',
							`IdUser` = ' . $objDatabase->SqlVariable($this->intIdUser) . ',
							`Type` = ' . $objDatabase->SqlVariable($this->strType) . '
						WHERE
							`IdRestaurant` = ' . $objDatabase->SqlVariable($this->intIdRestaurant) . '
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
		 * Delete this Restaurant
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intIdRestaurant)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Restaurant with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Restaurant::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`restaurant`
				WHERE
					`IdRestaurant` = ' . $objDatabase->SqlVariable($this->intIdRestaurant) . '');
		}

		/**
		 * Delete all Restaurants
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Restaurant::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`restaurant`');
		}

		/**
		 * Truncate restaurant table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Restaurant::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `restaurant`');
		}

		/**
		 * Reload this Restaurant from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Restaurant object.');

			// Reload the Object
			$objReloaded = Restaurant::Load($this->intIdRestaurant);

			// Update $this's local variables to match
			$this->strCountry = $objReloaded->strCountry;
			$this->strCity = $objReloaded->strCity;
			$this->strAddress = $objReloaded->strAddress;
			$this->strRestaurantName = $objReloaded->strRestaurantName;
			$this->strLongitude = $objReloaded->strLongitude;
			$this->strLatitude = $objReloaded->strLatitude;
			$this->strQrCode = $objReloaded->strQrCode;
			$this->intQtycoins = $objReloaded->intQtycoins;
			$this->IdUser = $objReloaded->IdUser;
			$this->strType = $objReloaded->strType;
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
				case 'IdRestaurant':
					/**
					 * Gets the value for intIdRestaurant (Read-Only PK)
					 * @return integer
					 */
					return $this->intIdRestaurant;

				case 'Country':
					/**
					 * Gets the value for strCountry (Not Null)
					 * @return string
					 */
					return $this->strCountry;

				case 'City':
					/**
					 * Gets the value for strCity (Not Null)
					 * @return string
					 */
					return $this->strCity;

				case 'Address':
					/**
					 * Gets the value for strAddress (Not Null)
					 * @return string
					 */
					return $this->strAddress;

				case 'RestaurantName':
					/**
					 * Gets the value for strRestaurantName (Not Null)
					 * @return string
					 */
					return $this->strRestaurantName;

				case 'Longitude':
					/**
					 * Gets the value for strLongitude (Not Null)
					 * @return string
					 */
					return $this->strLongitude;

				case 'Latitude':
					/**
					 * Gets the value for strLatitude (Not Null)
					 * @return string
					 */
					return $this->strLatitude;

				case 'QrCode':
					/**
					 * Gets the value for strQrCode (Not Null)
					 * @return string
					 */
					return $this->strQrCode;

				case 'Qtycoins':
					/**
					 * Gets the value for intQtycoins 
					 * @return integer
					 */
					return $this->intQtycoins;

				case 'IdUser':
					/**
					 * Gets the value for intIdUser (Not Null)
					 * @return integer
					 */
					return $this->intIdUser;

				case 'Type':
					/**
					 * Gets the value for strType (Not Null)
					 * @return string
					 */
					return $this->strType;


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

				case '_OfferAsIdRestaurant':
					/**
					 * Gets the value for the private _objOfferAsIdRestaurant (Read-Only)
					 * if set due to an expansion on the offer.IdRestaurant reverse relationship
					 * @return Offer
					 */
					return $this->_objOfferAsIdRestaurant;

				case '_OfferAsIdRestaurantArray':
					/**
					 * Gets the value for the private _objOfferAsIdRestaurantArray (Read-Only)
					 * if set due to an ExpandAsArray on the offer.IdRestaurant reverse relationship
					 * @return Offer[]
					 */
					return $this->_objOfferAsIdRestaurantArray;


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
				case 'Country':
					/**
					 * Sets the value for strCountry (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCountry = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'City':
					/**
					 * Sets the value for strCity (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCity = QType::Cast($mixValue, QType::String));
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

				case 'RestaurantName':
					/**
					 * Sets the value for strRestaurantName (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strRestaurantName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Longitude':
					/**
					 * Sets the value for strLongitude (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strLongitude = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Latitude':
					/**
					 * Sets the value for strLatitude (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strLatitude = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'QrCode':
					/**
					 * Sets the value for strQrCode (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strQrCode = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Qtycoins':
					/**
					 * Sets the value for intQtycoins 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intQtycoins = QType::Cast($mixValue, QType::Integer));
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

				case 'Type':
					/**
					 * Sets the value for strType (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strType = QType::Cast($mixValue, QType::String));
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
							throw new QCallerException('Unable to set an unsaved IdUserObject for this Restaurant');

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

			
		
		// Related Objects' Methods for OfferAsIdRestaurant
		//-------------------------------------------------------------------

		/**
		 * Gets all associated OffersAsIdRestaurant as an array of Offer objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Offer[]
		*/
		public function GetOfferAsIdRestaurantArray($objOptionalClauses = null) {
			if ((is_null($this->intIdRestaurant)))
				return array();

			try {
				return Offer::LoadArrayByIdRestaurant($this->intIdRestaurant, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated OffersAsIdRestaurant
		 * @return int
		*/
		public function CountOffersAsIdRestaurant() {
			if ((is_null($this->intIdRestaurant)))
				return 0;

			return Offer::CountByIdRestaurant($this->intIdRestaurant);
		}

		/**
		 * Associates a OfferAsIdRestaurant
		 * @param Offer $objOffer
		 * @return void
		*/
		public function AssociateOfferAsIdRestaurant(Offer $objOffer) {
			if ((is_null($this->intIdRestaurant)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateOfferAsIdRestaurant on this unsaved Restaurant.');
			if ((is_null($objOffer->IdOffer)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateOfferAsIdRestaurant on this Restaurant with an unsaved Offer.');

			// Get the Database Object for this Class
			$objDatabase = Restaurant::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`offer`
				SET
					`IdRestaurant` = ' . $objDatabase->SqlVariable($this->intIdRestaurant) . '
				WHERE
					`IdOffer` = ' . $objDatabase->SqlVariable($objOffer->IdOffer) . '
			');
		}

		/**
		 * Unassociates a OfferAsIdRestaurant
		 * @param Offer $objOffer
		 * @return void
		*/
		public function UnassociateOfferAsIdRestaurant(Offer $objOffer) {
			if ((is_null($this->intIdRestaurant)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOfferAsIdRestaurant on this unsaved Restaurant.');
			if ((is_null($objOffer->IdOffer)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOfferAsIdRestaurant on this Restaurant with an unsaved Offer.');

			// Get the Database Object for this Class
			$objDatabase = Restaurant::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`offer`
				SET
					`IdRestaurant` = null
				WHERE
					`IdOffer` = ' . $objDatabase->SqlVariable($objOffer->IdOffer) . ' AND
					`IdRestaurant` = ' . $objDatabase->SqlVariable($this->intIdRestaurant) . '
			');
		}

		/**
		 * Unassociates all OffersAsIdRestaurant
		 * @return void
		*/
		public function UnassociateAllOffersAsIdRestaurant() {
			if ((is_null($this->intIdRestaurant)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOfferAsIdRestaurant on this unsaved Restaurant.');

			// Get the Database Object for this Class
			$objDatabase = Restaurant::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`offer`
				SET
					`IdRestaurant` = null
				WHERE
					`IdRestaurant` = ' . $objDatabase->SqlVariable($this->intIdRestaurant) . '
			');
		}

		/**
		 * Deletes an associated OfferAsIdRestaurant
		 * @param Offer $objOffer
		 * @return void
		*/
		public function DeleteAssociatedOfferAsIdRestaurant(Offer $objOffer) {
			if ((is_null($this->intIdRestaurant)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOfferAsIdRestaurant on this unsaved Restaurant.');
			if ((is_null($objOffer->IdOffer)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOfferAsIdRestaurant on this Restaurant with an unsaved Offer.');

			// Get the Database Object for this Class
			$objDatabase = Restaurant::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`offer`
				WHERE
					`IdOffer` = ' . $objDatabase->SqlVariable($objOffer->IdOffer) . ' AND
					`IdRestaurant` = ' . $objDatabase->SqlVariable($this->intIdRestaurant) . '
			');
		}

		/**
		 * Deletes all associated OffersAsIdRestaurant
		 * @return void
		*/
		public function DeleteAllOffersAsIdRestaurant() {
			if ((is_null($this->intIdRestaurant)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOfferAsIdRestaurant on this unsaved Restaurant.');

			// Get the Database Object for this Class
			$objDatabase = Restaurant::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`offer`
				WHERE
					`IdRestaurant` = ' . $objDatabase->SqlVariable($this->intIdRestaurant) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Restaurant"><sequence>';
			$strToReturn .= '<element name="IdRestaurant" type="xsd:int"/>';
			$strToReturn .= '<element name="Country" type="xsd:string"/>';
			$strToReturn .= '<element name="City" type="xsd:string"/>';
			$strToReturn .= '<element name="Address" type="xsd:string"/>';
			$strToReturn .= '<element name="RestaurantName" type="xsd:string"/>';
			$strToReturn .= '<element name="Longitude" type="xsd:string"/>';
			$strToReturn .= '<element name="Latitude" type="xsd:string"/>';
			$strToReturn .= '<element name="QrCode" type="xsd:string"/>';
			$strToReturn .= '<element name="Qtycoins" type="xsd:int"/>';
			$strToReturn .= '<element name="IdUserObject" type="xsd1:User"/>';
			$strToReturn .= '<element name="Type" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Restaurant', $strComplexTypeArray)) {
				$strComplexTypeArray['Restaurant'] = Restaurant::GetSoapComplexTypeXml();
				User::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Restaurant::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Restaurant();
			if (property_exists($objSoapObject, 'IdRestaurant'))
				$objToReturn->intIdRestaurant = $objSoapObject->IdRestaurant;
			if (property_exists($objSoapObject, 'Country'))
				$objToReturn->strCountry = $objSoapObject->Country;
			if (property_exists($objSoapObject, 'City'))
				$objToReturn->strCity = $objSoapObject->City;
			if (property_exists($objSoapObject, 'Address'))
				$objToReturn->strAddress = $objSoapObject->Address;
			if (property_exists($objSoapObject, 'RestaurantName'))
				$objToReturn->strRestaurantName = $objSoapObject->RestaurantName;
			if (property_exists($objSoapObject, 'Longitude'))
				$objToReturn->strLongitude = $objSoapObject->Longitude;
			if (property_exists($objSoapObject, 'Latitude'))
				$objToReturn->strLatitude = $objSoapObject->Latitude;
			if (property_exists($objSoapObject, 'QrCode'))
				$objToReturn->strQrCode = $objSoapObject->QrCode;
			if (property_exists($objSoapObject, 'Qtycoins'))
				$objToReturn->intQtycoins = $objSoapObject->Qtycoins;
			if ((property_exists($objSoapObject, 'IdUserObject')) &&
				($objSoapObject->IdUserObject))
				$objToReturn->IdUserObject = User::GetObjectFromSoapObject($objSoapObject->IdUserObject);
			if (property_exists($objSoapObject, 'Type'))
				$objToReturn->strType = $objSoapObject->Type;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Restaurant::GetSoapObjectFromObject($objObject, true));

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
			$iArray['IdRestaurant'] = $this->intIdRestaurant;
			$iArray['Country'] = $this->strCountry;
			$iArray['City'] = $this->strCity;
			$iArray['Address'] = $this->strAddress;
			$iArray['RestaurantName'] = $this->strRestaurantName;
			$iArray['Longitude'] = $this->strLongitude;
			$iArray['Latitude'] = $this->strLatitude;
			$iArray['QrCode'] = $this->strQrCode;
			$iArray['Qtycoins'] = $this->intQtycoins;
			$iArray['IdUser'] = $this->intIdUser;
			$iArray['Type'] = $this->strType;
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
     * @property-read QQNode $IdRestaurant
     * @property-read QQNode $Country
     * @property-read QQNode $City
     * @property-read QQNode $Address
     * @property-read QQNode $RestaurantName
     * @property-read QQNode $Longitude
     * @property-read QQNode $Latitude
     * @property-read QQNode $QrCode
     * @property-read QQNode $Qtycoins
     * @property-read QQNode $IdUser
     * @property-read QQNodeUser $IdUserObject
     * @property-read QQNode $Type
     *
     *
     * @property-read QQReverseReferenceNodeOffer $OfferAsIdRestaurant

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeRestaurant extends QQNode {
		protected $strTableName = 'restaurant';
		protected $strPrimaryKey = 'IdRestaurant';
		protected $strClassName = 'Restaurant';
		public function __get($strName) {
			switch ($strName) {
				case 'IdRestaurant':
					return new QQNode('IdRestaurant', 'IdRestaurant', 'Integer', $this);
				case 'Country':
					return new QQNode('Country', 'Country', 'VarChar', $this);
				case 'City':
					return new QQNode('City', 'City', 'VarChar', $this);
				case 'Address':
					return new QQNode('Address', 'Address', 'VarChar', $this);
				case 'RestaurantName':
					return new QQNode('RestaurantName', 'RestaurantName', 'VarChar', $this);
				case 'Longitude':
					return new QQNode('Longitude', 'Longitude', 'VarChar', $this);
				case 'Latitude':
					return new QQNode('Latitude', 'Latitude', 'VarChar', $this);
				case 'QrCode':
					return new QQNode('QrCode', 'QrCode', 'Blob', $this);
				case 'Qtycoins':
					return new QQNode('qtycoins', 'Qtycoins', 'Integer', $this);
				case 'IdUser':
					return new QQNode('IdUser', 'IdUser', 'Integer', $this);
				case 'IdUserObject':
					return new QQNodeUser('IdUser', 'IdUserObject', 'Integer', $this);
				case 'Type':
					return new QQNode('Type', 'Type', 'VarChar', $this);
				case 'OfferAsIdRestaurant':
					return new QQReverseReferenceNodeOffer($this, 'offerasidrestaurant', 'reverse_reference', 'IdRestaurant');

				case '_PrimaryKeyNode':
					return new QQNode('IdRestaurant', 'IdRestaurant', 'Integer', $this);
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
     * @property-read QQNode $IdRestaurant
     * @property-read QQNode $Country
     * @property-read QQNode $City
     * @property-read QQNode $Address
     * @property-read QQNode $RestaurantName
     * @property-read QQNode $Longitude
     * @property-read QQNode $Latitude
     * @property-read QQNode $QrCode
     * @property-read QQNode $Qtycoins
     * @property-read QQNode $IdUser
     * @property-read QQNodeUser $IdUserObject
     * @property-read QQNode $Type
     *
     *
     * @property-read QQReverseReferenceNodeOffer $OfferAsIdRestaurant

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeRestaurant extends QQReverseReferenceNode {
		protected $strTableName = 'restaurant';
		protected $strPrimaryKey = 'IdRestaurant';
		protected $strClassName = 'Restaurant';
		public function __get($strName) {
			switch ($strName) {
				case 'IdRestaurant':
					return new QQNode('IdRestaurant', 'IdRestaurant', 'integer', $this);
				case 'Country':
					return new QQNode('Country', 'Country', 'string', $this);
				case 'City':
					return new QQNode('City', 'City', 'string', $this);
				case 'Address':
					return new QQNode('Address', 'Address', 'string', $this);
				case 'RestaurantName':
					return new QQNode('RestaurantName', 'RestaurantName', 'string', $this);
				case 'Longitude':
					return new QQNode('Longitude', 'Longitude', 'string', $this);
				case 'Latitude':
					return new QQNode('Latitude', 'Latitude', 'string', $this);
				case 'QrCode':
					return new QQNode('QrCode', 'QrCode', 'string', $this);
				case 'Qtycoins':
					return new QQNode('qtycoins', 'Qtycoins', 'integer', $this);
				case 'IdUser':
					return new QQNode('IdUser', 'IdUser', 'integer', $this);
				case 'IdUserObject':
					return new QQNodeUser('IdUser', 'IdUserObject', 'integer', $this);
				case 'Type':
					return new QQNode('Type', 'Type', 'string', $this);
				case 'OfferAsIdRestaurant':
					return new QQReverseReferenceNodeOffer($this, 'offerasidrestaurant', 'reverse_reference', 'IdRestaurant');

				case '_PrimaryKeyNode':
					return new QQNode('IdRestaurant', 'IdRestaurant', 'integer', $this);
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
