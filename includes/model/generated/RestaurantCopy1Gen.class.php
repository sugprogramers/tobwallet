<?php
	/**
	 * The abstract RestaurantCopy1Gen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the RestaurantCopy1 subclass which
	 * extends this RestaurantCopy1Gen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the RestaurantCopy1 class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $IdRestaurant the value for intIdRestaurant (Read-Only PK)
	 * @property string $Email the value for strEmail (Unique)
	 * @property string $Password the value for strPassword (Not Null)
	 * @property string $OwnerFirstName the value for strOwnerFirstName (Not Null)
	 * @property string $OwnerLastName the value for strOwnerLastName (Not Null)
	 * @property string $OwnerMiddleName the value for strOwnerMiddleName (Not Null)
	 * @property string $Country the value for strCountry (Not Null)
	 * @property string $City the value for strCity (Not Null)
	 * @property string $Address the value for strAddress (Not Null)
	 * @property string $RestaurantName the value for strRestaurantName (Not Null)
	 * @property string $Longitude the value for strLongitude (Not Null)
	 * @property string $Latitude the value for strLatitude (Not Null)
	 * @property string $Qrcode the value for strQrcode (Not Null)
	 * @property integer $Qtycoins the value for intQtycoins 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class RestaurantCopy1Gen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column restaurant_copy1.IdRestaurant
		 * @var integer intIdRestaurant
		 */
		protected $intIdRestaurant;
		const IdRestaurantDefault = null;


		/**
		 * Protected member variable that maps to the database column restaurant_copy1.email
		 * @var string strEmail
		 */
		protected $strEmail;
		const EmailMaxLength = 50;
		const EmailDefault = null;


		/**
		 * Protected member variable that maps to the database column restaurant_copy1.password
		 * @var string strPassword
		 */
		protected $strPassword;
		const PasswordMaxLength = 50;
		const PasswordDefault = null;


		/**
		 * Protected member variable that maps to the database column restaurant_copy1.OwnerFirstName
		 * @var string strOwnerFirstName
		 */
		protected $strOwnerFirstName;
		const OwnerFirstNameMaxLength = 100;
		const OwnerFirstNameDefault = null;


		/**
		 * Protected member variable that maps to the database column restaurant_copy1.OwnerLastName
		 * @var string strOwnerLastName
		 */
		protected $strOwnerLastName;
		const OwnerLastNameMaxLength = 100;
		const OwnerLastNameDefault = null;


		/**
		 * Protected member variable that maps to the database column restaurant_copy1.OwnerMiddleName
		 * @var string strOwnerMiddleName
		 */
		protected $strOwnerMiddleName;
		const OwnerMiddleNameMaxLength = 100;
		const OwnerMiddleNameDefault = null;


		/**
		 * Protected member variable that maps to the database column restaurant_copy1.country
		 * @var string strCountry
		 */
		protected $strCountry;
		const CountryMaxLength = 100;
		const CountryDefault = null;


		/**
		 * Protected member variable that maps to the database column restaurant_copy1.city
		 * @var string strCity
		 */
		protected $strCity;
		const CityMaxLength = 100;
		const CityDefault = null;


		/**
		 * Protected member variable that maps to the database column restaurant_copy1.Address
		 * @var string strAddress
		 */
		protected $strAddress;
		const AddressMaxLength = 100;
		const AddressDefault = null;


		/**
		 * Protected member variable that maps to the database column restaurant_copy1.RestaurantName
		 * @var string strRestaurantName
		 */
		protected $strRestaurantName;
		const RestaurantNameMaxLength = 100;
		const RestaurantNameDefault = null;


		/**
		 * Protected member variable that maps to the database column restaurant_copy1.longitude
		 * @var string strLongitude
		 */
		protected $strLongitude;
		const LongitudeDefault = null;


		/**
		 * Protected member variable that maps to the database column restaurant_copy1.latitude
		 * @var string strLatitude
		 */
		protected $strLatitude;
		const LatitudeDefault = null;


		/**
		 * Protected member variable that maps to the database column restaurant_copy1.qrcode
		 * @var string strQrcode
		 */
		protected $strQrcode;
		const QrcodeDefault = null;


		/**
		 * Protected member variable that maps to the database column restaurant_copy1.qtycoins
		 * @var integer intQtycoins
		 */
		protected $intQtycoins;
		const QtycoinsDefault = null;


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
			$this->intIdRestaurant = RestaurantCopy1::IdRestaurantDefault;
			$this->strEmail = RestaurantCopy1::EmailDefault;
			$this->strPassword = RestaurantCopy1::PasswordDefault;
			$this->strOwnerFirstName = RestaurantCopy1::OwnerFirstNameDefault;
			$this->strOwnerLastName = RestaurantCopy1::OwnerLastNameDefault;
			$this->strOwnerMiddleName = RestaurantCopy1::OwnerMiddleNameDefault;
			$this->strCountry = RestaurantCopy1::CountryDefault;
			$this->strCity = RestaurantCopy1::CityDefault;
			$this->strAddress = RestaurantCopy1::AddressDefault;
			$this->strRestaurantName = RestaurantCopy1::RestaurantNameDefault;
			$this->strLongitude = RestaurantCopy1::LongitudeDefault;
			$this->strLatitude = RestaurantCopy1::LatitudeDefault;
			$this->strQrcode = RestaurantCopy1::QrcodeDefault;
			$this->intQtycoins = RestaurantCopy1::QtycoinsDefault;
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
		 * Load a RestaurantCopy1 from PK Info
		 * @param integer $intIdRestaurant
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RestaurantCopy1
		 */
		public static function Load($intIdRestaurant, $objOptionalClauses = null) {
			// Use QuerySingle to Perform the Query
			return RestaurantCopy1::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::RestaurantCopy1()->IdRestaurant, $intIdRestaurant)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load all RestaurantCopy1s
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RestaurantCopy1[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call RestaurantCopy1::QueryArray to perform the LoadAll query
			try {
				return RestaurantCopy1::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all RestaurantCopy1s
		 * @return int
		 */
		public static function CountAll() {
			// Call RestaurantCopy1::QueryCount to perform the CountAll query
			return RestaurantCopy1::QueryCount(QQ::All());
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
			$objDatabase = RestaurantCopy1::GetDatabase();

			// Create/Build out the QueryBuilder object with RestaurantCopy1-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'restaurant_copy1');
			RestaurantCopy1::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('restaurant_copy1');

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
		 * Static Qcubed Query method to query for a single RestaurantCopy1 object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return RestaurantCopy1 the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = RestaurantCopy1::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new RestaurantCopy1 object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = RestaurantCopy1::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return RestaurantCopy1::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of RestaurantCopy1 objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return RestaurantCopy1[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = RestaurantCopy1::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return RestaurantCopy1::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of RestaurantCopy1 objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = RestaurantCopy1::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = RestaurantCopy1::GetDatabase();

			$strQuery = RestaurantCopy1::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/restaurantcopy1', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = RestaurantCopy1::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this RestaurantCopy1
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'restaurant_copy1';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'IdRestaurant', $strAliasPrefix . 'IdRestaurant');
			$objBuilder->AddSelectItem($strTableName, 'email', $strAliasPrefix . 'email');
			$objBuilder->AddSelectItem($strTableName, 'password', $strAliasPrefix . 'password');
			$objBuilder->AddSelectItem($strTableName, 'OwnerFirstName', $strAliasPrefix . 'OwnerFirstName');
			$objBuilder->AddSelectItem($strTableName, 'OwnerLastName', $strAliasPrefix . 'OwnerLastName');
			$objBuilder->AddSelectItem($strTableName, 'OwnerMiddleName', $strAliasPrefix . 'OwnerMiddleName');
			$objBuilder->AddSelectItem($strTableName, 'country', $strAliasPrefix . 'country');
			$objBuilder->AddSelectItem($strTableName, 'city', $strAliasPrefix . 'city');
			$objBuilder->AddSelectItem($strTableName, 'Address', $strAliasPrefix . 'Address');
			$objBuilder->AddSelectItem($strTableName, 'RestaurantName', $strAliasPrefix . 'RestaurantName');
			$objBuilder->AddSelectItem($strTableName, 'longitude', $strAliasPrefix . 'longitude');
			$objBuilder->AddSelectItem($strTableName, 'latitude', $strAliasPrefix . 'latitude');
			$objBuilder->AddSelectItem($strTableName, 'qrcode', $strAliasPrefix . 'qrcode');
			$objBuilder->AddSelectItem($strTableName, 'qtycoins', $strAliasPrefix . 'qtycoins');
		}



		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a RestaurantCopy1 from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this RestaurantCopy1::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return RestaurantCopy1
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}

			// Create a new instance of the RestaurantCopy1 object
			$objToReturn = new RestaurantCopy1();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'IdRestaurant', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'IdRestaurant'] : $strAliasPrefix . 'IdRestaurant';
			$objToReturn->intIdRestaurant = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'email', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'email'] : $strAliasPrefix . 'email';
			$objToReturn->strEmail = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'password', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'password'] : $strAliasPrefix . 'password';
			$objToReturn->strPassword = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'OwnerFirstName', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'OwnerFirstName'] : $strAliasPrefix . 'OwnerFirstName';
			$objToReturn->strOwnerFirstName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'OwnerLastName', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'OwnerLastName'] : $strAliasPrefix . 'OwnerLastName';
			$objToReturn->strOwnerLastName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'OwnerMiddleName', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'OwnerMiddleName'] : $strAliasPrefix . 'OwnerMiddleName';
			$objToReturn->strOwnerMiddleName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'country', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'country'] : $strAliasPrefix . 'country';
			$objToReturn->strCountry = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'city', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'city'] : $strAliasPrefix . 'city';
			$objToReturn->strCity = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'Address', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Address'] : $strAliasPrefix . 'Address';
			$objToReturn->strAddress = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'RestaurantName', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'RestaurantName'] : $strAliasPrefix . 'RestaurantName';
			$objToReturn->strRestaurantName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'longitude', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'longitude'] : $strAliasPrefix . 'longitude';
			$objToReturn->strLongitude = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'latitude', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'latitude'] : $strAliasPrefix . 'latitude';
			$objToReturn->strLatitude = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'qrcode', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'qrcode'] : $strAliasPrefix . 'qrcode';
			$objToReturn->strQrcode = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'qtycoins', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'qtycoins'] : $strAliasPrefix . 'qtycoins';
			$objToReturn->intQtycoins = $objDbRow->GetColumn($strAliasName, 'Integer');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->IdRestaurant != $objPreviousItem->IdRestaurant) {
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
				$strAliasPrefix = 'restaurant_copy1__';




			return $objToReturn;
		}

		/**
		 * Instantiate an array of RestaurantCopy1s from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return RestaurantCopy1[]
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
					$objItem = RestaurantCopy1::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = RestaurantCopy1::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}



		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single RestaurantCopy1 object,
		 * by IdRestaurant Index(es)
		 * @param integer $intIdRestaurant
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RestaurantCopy1
		*/
		public static function LoadByIdRestaurant($intIdRestaurant, $objOptionalClauses = null) {
			return RestaurantCopy1::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::RestaurantCopy1()->IdRestaurant, $intIdRestaurant)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load a single RestaurantCopy1 object,
		 * by Email Index(es)
		 * @param string $strEmail
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RestaurantCopy1
		*/
		public static function LoadByEmail($strEmail, $objOptionalClauses = null) {
			return RestaurantCopy1::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::RestaurantCopy1()->Email, $strEmail)
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
		 * Save this RestaurantCopy1
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = RestaurantCopy1::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `restaurant_copy1` (
							`email`,
							`password`,
							`OwnerFirstName`,
							`OwnerLastName`,
							`OwnerMiddleName`,
							`country`,
							`city`,
							`Address`,
							`RestaurantName`,
							`longitude`,
							`latitude`,
							`qrcode`,
							`qtycoins`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strEmail) . ',
							' . $objDatabase->SqlVariable($this->strPassword) . ',
							' . $objDatabase->SqlVariable($this->strOwnerFirstName) . ',
							' . $objDatabase->SqlVariable($this->strOwnerLastName) . ',
							' . $objDatabase->SqlVariable($this->strOwnerMiddleName) . ',
							' . $objDatabase->SqlVariable($this->strCountry) . ',
							' . $objDatabase->SqlVariable($this->strCity) . ',
							' . $objDatabase->SqlVariable($this->strAddress) . ',
							' . $objDatabase->SqlVariable($this->strRestaurantName) . ',
							' . $objDatabase->SqlVariable($this->strLongitude) . ',
							' . $objDatabase->SqlVariable($this->strLatitude) . ',
							' . $objDatabase->SqlVariable($this->strQrcode) . ',
							' . $objDatabase->SqlVariable($this->intQtycoins) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intIdRestaurant = $objDatabase->InsertId('restaurant_copy1', 'IdRestaurant');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`restaurant_copy1`
						SET
							`email` = ' . $objDatabase->SqlVariable($this->strEmail) . ',
							`password` = ' . $objDatabase->SqlVariable($this->strPassword) . ',
							`OwnerFirstName` = ' . $objDatabase->SqlVariable($this->strOwnerFirstName) . ',
							`OwnerLastName` = ' . $objDatabase->SqlVariable($this->strOwnerLastName) . ',
							`OwnerMiddleName` = ' . $objDatabase->SqlVariable($this->strOwnerMiddleName) . ',
							`country` = ' . $objDatabase->SqlVariable($this->strCountry) . ',
							`city` = ' . $objDatabase->SqlVariable($this->strCity) . ',
							`Address` = ' . $objDatabase->SqlVariable($this->strAddress) . ',
							`RestaurantName` = ' . $objDatabase->SqlVariable($this->strRestaurantName) . ',
							`longitude` = ' . $objDatabase->SqlVariable($this->strLongitude) . ',
							`latitude` = ' . $objDatabase->SqlVariable($this->strLatitude) . ',
							`qrcode` = ' . $objDatabase->SqlVariable($this->strQrcode) . ',
							`qtycoins` = ' . $objDatabase->SqlVariable($this->intQtycoins) . '
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
		 * Delete this RestaurantCopy1
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intIdRestaurant)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this RestaurantCopy1 with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = RestaurantCopy1::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`restaurant_copy1`
				WHERE
					`IdRestaurant` = ' . $objDatabase->SqlVariable($this->intIdRestaurant) . '');
		}

		/**
		 * Delete all RestaurantCopy1s
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = RestaurantCopy1::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`restaurant_copy1`');
		}

		/**
		 * Truncate restaurant_copy1 table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = RestaurantCopy1::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `restaurant_copy1`');
		}

		/**
		 * Reload this RestaurantCopy1 from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved RestaurantCopy1 object.');

			// Reload the Object
			$objReloaded = RestaurantCopy1::Load($this->intIdRestaurant);

			// Update $this's local variables to match
			$this->strEmail = $objReloaded->strEmail;
			$this->strPassword = $objReloaded->strPassword;
			$this->strOwnerFirstName = $objReloaded->strOwnerFirstName;
			$this->strOwnerLastName = $objReloaded->strOwnerLastName;
			$this->strOwnerMiddleName = $objReloaded->strOwnerMiddleName;
			$this->strCountry = $objReloaded->strCountry;
			$this->strCity = $objReloaded->strCity;
			$this->strAddress = $objReloaded->strAddress;
			$this->strRestaurantName = $objReloaded->strRestaurantName;
			$this->strLongitude = $objReloaded->strLongitude;
			$this->strLatitude = $objReloaded->strLatitude;
			$this->strQrcode = $objReloaded->strQrcode;
			$this->intQtycoins = $objReloaded->intQtycoins;
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

				case 'OwnerFirstName':
					/**
					 * Gets the value for strOwnerFirstName (Not Null)
					 * @return string
					 */
					return $this->strOwnerFirstName;

				case 'OwnerLastName':
					/**
					 * Gets the value for strOwnerLastName (Not Null)
					 * @return string
					 */
					return $this->strOwnerLastName;

				case 'OwnerMiddleName':
					/**
					 * Gets the value for strOwnerMiddleName (Not Null)
					 * @return string
					 */
					return $this->strOwnerMiddleName;

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

				case 'Qrcode':
					/**
					 * Gets the value for strQrcode (Not Null)
					 * @return string
					 */
					return $this->strQrcode;

				case 'Qtycoins':
					/**
					 * Gets the value for intQtycoins 
					 * @return integer
					 */
					return $this->intQtycoins;


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

				case 'OwnerFirstName':
					/**
					 * Sets the value for strOwnerFirstName (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strOwnerFirstName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'OwnerLastName':
					/**
					 * Sets the value for strOwnerLastName (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strOwnerLastName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'OwnerMiddleName':
					/**
					 * Sets the value for strOwnerMiddleName (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strOwnerMiddleName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

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

				case 'Qrcode':
					/**
					 * Sets the value for strQrcode (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strQrcode = QType::Cast($mixValue, QType::String));
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
			$strToReturn = '<complexType name="RestaurantCopy1"><sequence>';
			$strToReturn .= '<element name="IdRestaurant" type="xsd:int"/>';
			$strToReturn .= '<element name="Email" type="xsd:string"/>';
			$strToReturn .= '<element name="Password" type="xsd:string"/>';
			$strToReturn .= '<element name="OwnerFirstName" type="xsd:string"/>';
			$strToReturn .= '<element name="OwnerLastName" type="xsd:string"/>';
			$strToReturn .= '<element name="OwnerMiddleName" type="xsd:string"/>';
			$strToReturn .= '<element name="Country" type="xsd:string"/>';
			$strToReturn .= '<element name="City" type="xsd:string"/>';
			$strToReturn .= '<element name="Address" type="xsd:string"/>';
			$strToReturn .= '<element name="RestaurantName" type="xsd:string"/>';
			$strToReturn .= '<element name="Longitude" type="xsd:string"/>';
			$strToReturn .= '<element name="Latitude" type="xsd:string"/>';
			$strToReturn .= '<element name="Qrcode" type="xsd:string"/>';
			$strToReturn .= '<element name="Qtycoins" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('RestaurantCopy1', $strComplexTypeArray)) {
				$strComplexTypeArray['RestaurantCopy1'] = RestaurantCopy1::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, RestaurantCopy1::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new RestaurantCopy1();
			if (property_exists($objSoapObject, 'IdRestaurant'))
				$objToReturn->intIdRestaurant = $objSoapObject->IdRestaurant;
			if (property_exists($objSoapObject, 'Email'))
				$objToReturn->strEmail = $objSoapObject->Email;
			if (property_exists($objSoapObject, 'Password'))
				$objToReturn->strPassword = $objSoapObject->Password;
			if (property_exists($objSoapObject, 'OwnerFirstName'))
				$objToReturn->strOwnerFirstName = $objSoapObject->OwnerFirstName;
			if (property_exists($objSoapObject, 'OwnerLastName'))
				$objToReturn->strOwnerLastName = $objSoapObject->OwnerLastName;
			if (property_exists($objSoapObject, 'OwnerMiddleName'))
				$objToReturn->strOwnerMiddleName = $objSoapObject->OwnerMiddleName;
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
			if (property_exists($objSoapObject, 'Qrcode'))
				$objToReturn->strQrcode = $objSoapObject->Qrcode;
			if (property_exists($objSoapObject, 'Qtycoins'))
				$objToReturn->intQtycoins = $objSoapObject->Qtycoins;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, RestaurantCopy1::GetSoapObjectFromObject($objObject, true));

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
			$iArray['IdRestaurant'] = $this->intIdRestaurant;
			$iArray['Email'] = $this->strEmail;
			$iArray['Password'] = $this->strPassword;
			$iArray['OwnerFirstName'] = $this->strOwnerFirstName;
			$iArray['OwnerLastName'] = $this->strOwnerLastName;
			$iArray['OwnerMiddleName'] = $this->strOwnerMiddleName;
			$iArray['Country'] = $this->strCountry;
			$iArray['City'] = $this->strCity;
			$iArray['Address'] = $this->strAddress;
			$iArray['RestaurantName'] = $this->strRestaurantName;
			$iArray['Longitude'] = $this->strLongitude;
			$iArray['Latitude'] = $this->strLatitude;
			$iArray['Qrcode'] = $this->strQrcode;
			$iArray['Qtycoins'] = $this->intQtycoins;
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
     * @property-read QQNode $Email
     * @property-read QQNode $Password
     * @property-read QQNode $OwnerFirstName
     * @property-read QQNode $OwnerLastName
     * @property-read QQNode $OwnerMiddleName
     * @property-read QQNode $Country
     * @property-read QQNode $City
     * @property-read QQNode $Address
     * @property-read QQNode $RestaurantName
     * @property-read QQNode $Longitude
     * @property-read QQNode $Latitude
     * @property-read QQNode $Qrcode
     * @property-read QQNode $Qtycoins
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeRestaurantCopy1 extends QQNode {
		protected $strTableName = 'restaurant_copy1';
		protected $strPrimaryKey = 'IdRestaurant';
		protected $strClassName = 'RestaurantCopy1';
		public function __get($strName) {
			switch ($strName) {
				case 'IdRestaurant':
					return new QQNode('IdRestaurant', 'IdRestaurant', 'Integer', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'VarChar', $this);
				case 'Password':
					return new QQNode('password', 'Password', 'VarChar', $this);
				case 'OwnerFirstName':
					return new QQNode('OwnerFirstName', 'OwnerFirstName', 'VarChar', $this);
				case 'OwnerLastName':
					return new QQNode('OwnerLastName', 'OwnerLastName', 'VarChar', $this);
				case 'OwnerMiddleName':
					return new QQNode('OwnerMiddleName', 'OwnerMiddleName', 'VarChar', $this);
				case 'Country':
					return new QQNode('country', 'Country', 'VarChar', $this);
				case 'City':
					return new QQNode('city', 'City', 'VarChar', $this);
				case 'Address':
					return new QQNode('Address', 'Address', 'VarChar', $this);
				case 'RestaurantName':
					return new QQNode('RestaurantName', 'RestaurantName', 'VarChar', $this);
				case 'Longitude':
					return new QQNode('longitude', 'Longitude', 'VarChar', $this);
				case 'Latitude':
					return new QQNode('latitude', 'Latitude', 'VarChar', $this);
				case 'Qrcode':
					return new QQNode('qrcode', 'Qrcode', 'Blob', $this);
				case 'Qtycoins':
					return new QQNode('qtycoins', 'Qtycoins', 'Integer', $this);

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
     * @property-read QQNode $Email
     * @property-read QQNode $Password
     * @property-read QQNode $OwnerFirstName
     * @property-read QQNode $OwnerLastName
     * @property-read QQNode $OwnerMiddleName
     * @property-read QQNode $Country
     * @property-read QQNode $City
     * @property-read QQNode $Address
     * @property-read QQNode $RestaurantName
     * @property-read QQNode $Longitude
     * @property-read QQNode $Latitude
     * @property-read QQNode $Qrcode
     * @property-read QQNode $Qtycoins
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeRestaurantCopy1 extends QQReverseReferenceNode {
		protected $strTableName = 'restaurant_copy1';
		protected $strPrimaryKey = 'IdRestaurant';
		protected $strClassName = 'RestaurantCopy1';
		public function __get($strName) {
			switch ($strName) {
				case 'IdRestaurant':
					return new QQNode('IdRestaurant', 'IdRestaurant', 'integer', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'string', $this);
				case 'Password':
					return new QQNode('password', 'Password', 'string', $this);
				case 'OwnerFirstName':
					return new QQNode('OwnerFirstName', 'OwnerFirstName', 'string', $this);
				case 'OwnerLastName':
					return new QQNode('OwnerLastName', 'OwnerLastName', 'string', $this);
				case 'OwnerMiddleName':
					return new QQNode('OwnerMiddleName', 'OwnerMiddleName', 'string', $this);
				case 'Country':
					return new QQNode('country', 'Country', 'string', $this);
				case 'City':
					return new QQNode('city', 'City', 'string', $this);
				case 'Address':
					return new QQNode('Address', 'Address', 'string', $this);
				case 'RestaurantName':
					return new QQNode('RestaurantName', 'RestaurantName', 'string', $this);
				case 'Longitude':
					return new QQNode('longitude', 'Longitude', 'string', $this);
				case 'Latitude':
					return new QQNode('latitude', 'Latitude', 'string', $this);
				case 'Qrcode':
					return new QQNode('qrcode', 'Qrcode', 'string', $this);
				case 'Qtycoins':
					return new QQNode('qtycoins', 'Qtycoins', 'integer', $this);

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
