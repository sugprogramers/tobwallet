<?php
	/**
	 * The abstract UserGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the User subclass which
	 * extends this UserGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the User class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $IdUser the value for intIdUser (Read-Only PK)
	 * @property string $Email the value for strEmail (Unique)
	 * @property string $Password the value for strPassword (Not Null)
	 * @property string $FirstName the value for strFirstName (Not Null)
	 * @property string $MiddleName the value for strMiddleName (Not Null)
	 * @property string $LastName the value for strLastName (Not Null)
	 * @property string $Country the value for strCountry (Not Null)
	 * @property string $City the value for strCity (Not Null)
	 * @property string $Phone the value for strPhone (Not Null)
	 * @property QDateTime $Birthday the value for dttBirthday 
	 * @property string $ImagePhoto the value for strImagePhoto 
	 * @property integer $StatusUser the value for intStatusUser (Not Null)
	 * @property string $WalletAddress the value for strWalletAddress 
	 * @property string $UserType the value for strUserType (Not Null)
	 * @property-read Balance $_BalanceAsIdUser the value for the private _objBalanceAsIdUser (Read-Only) if set due to an expansion on the balance.IdUser reverse relationship
	 * @property-read Balance[] $_BalanceAsIdUserArray the value for the private _objBalanceAsIdUserArray (Read-Only) if set due to an ExpandAsArray on the balance.IdUser reverse relationship
	 * @property-read Restaurant $_RestaurantAsIdUser the value for the private _objRestaurantAsIdUser (Read-Only) if set due to an expansion on the restaurant.IdUser reverse relationship
	 * @property-read Restaurant[] $_RestaurantAsIdUserArray the value for the private _objRestaurantAsIdUserArray (Read-Only) if set due to an ExpandAsArray on the restaurant.IdUser reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class UserGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column user.IdUser
		 * @var integer intIdUser
		 */
		protected $intIdUser;
		const IdUserDefault = null;


		/**
		 * Protected member variable that maps to the database column user.Email
		 * @var string strEmail
		 */
		protected $strEmail;
		const EmailMaxLength = 50;
		const EmailDefault = null;


		/**
		 * Protected member variable that maps to the database column user.Password
		 * @var string strPassword
		 */
		protected $strPassword;
		const PasswordMaxLength = 50;
		const PasswordDefault = null;


		/**
		 * Protected member variable that maps to the database column user.FirstName
		 * @var string strFirstName
		 */
		protected $strFirstName;
		const FirstNameMaxLength = 100;
		const FirstNameDefault = null;


		/**
		 * Protected member variable that maps to the database column user.MiddleName
		 * @var string strMiddleName
		 */
		protected $strMiddleName;
		const MiddleNameMaxLength = 100;
		const MiddleNameDefault = null;


		/**
		 * Protected member variable that maps to the database column user.LastName
		 * @var string strLastName
		 */
		protected $strLastName;
		const LastNameMaxLength = 100;
		const LastNameDefault = null;


		/**
		 * Protected member variable that maps to the database column user.Country
		 * @var string strCountry
		 */
		protected $strCountry;
		const CountryMaxLength = 100;
		const CountryDefault = null;


		/**
		 * Protected member variable that maps to the database column user.City
		 * @var string strCity
		 */
		protected $strCity;
		const CityMaxLength = 100;
		const CityDefault = null;


		/**
		 * Protected member variable that maps to the database column user.Phone
		 * @var string strPhone
		 */
		protected $strPhone;
		const PhoneMaxLength = 20;
		const PhoneDefault = null;


		/**
		 * Protected member variable that maps to the database column user.Birthday
		 * @var QDateTime dttBirthday
		 */
		protected $dttBirthday;
		const BirthdayDefault = null;


		/**
		 * Protected member variable that maps to the database column user.ImagePhoto
		 * @var string strImagePhoto
		 */
		protected $strImagePhoto;
		const ImagePhotoMaxLength = 100;
		const ImagePhotoDefault = null;


		/**
		 * Protected member variable that maps to the database column user.StatusUser
		 * @var integer intStatusUser
		 */
		protected $intStatusUser;
		const StatusUserDefault = null;


		/**
		 * Protected member variable that maps to the database column user.WalletAddress
		 * @var string strWalletAddress
		 */
		protected $strWalletAddress;
		const WalletAddressMaxLength = 100;
		const WalletAddressDefault = null;


		/**
		 * Protected member variable that maps to the database column user.UserType
		 * @var string strUserType
		 */
		protected $strUserType;
		const UserTypeMaxLength = 1;
		const UserTypeDefault = null;


		/**
		 * Private member variable that stores a reference to a single BalanceAsIdUser object
		 * (of type Balance), if this User object was restored with
		 * an expansion on the balance association table.
		 * @var Balance _objBalanceAsIdUser;
		 */
		private $_objBalanceAsIdUser;

		/**
		 * Private member variable that stores a reference to an array of BalanceAsIdUser objects
		 * (of type Balance[]), if this User object was restored with
		 * an ExpandAsArray on the balance association table.
		 * @var Balance[] _objBalanceAsIdUserArray;
		 */
		private $_objBalanceAsIdUserArray = null;

		/**
		 * Private member variable that stores a reference to a single RestaurantAsIdUser object
		 * (of type Restaurant), if this User object was restored with
		 * an expansion on the restaurant association table.
		 * @var Restaurant _objRestaurantAsIdUser;
		 */
		private $_objRestaurantAsIdUser;

		/**
		 * Private member variable that stores a reference to an array of RestaurantAsIdUser objects
		 * (of type Restaurant[]), if this User object was restored with
		 * an ExpandAsArray on the restaurant association table.
		 * @var Restaurant[] _objRestaurantAsIdUserArray;
		 */
		private $_objRestaurantAsIdUserArray = null;

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
			$this->intIdUser = User::IdUserDefault;
			$this->strEmail = User::EmailDefault;
			$this->strPassword = User::PasswordDefault;
			$this->strFirstName = User::FirstNameDefault;
			$this->strMiddleName = User::MiddleNameDefault;
			$this->strLastName = User::LastNameDefault;
			$this->strCountry = User::CountryDefault;
			$this->strCity = User::CityDefault;
			$this->strPhone = User::PhoneDefault;
			$this->dttBirthday = (User::BirthdayDefault === null)?null:new QDateTime(User::BirthdayDefault);
			$this->strImagePhoto = User::ImagePhotoDefault;
			$this->intStatusUser = User::StatusUserDefault;
			$this->strWalletAddress = User::WalletAddressDefault;
			$this->strUserType = User::UserTypeDefault;
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
		 * Load a User from PK Info
		 * @param integer $intIdUser
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return User
		 */
		public static function Load($intIdUser, $objOptionalClauses = null) {
			// Use QuerySingle to Perform the Query
			return User::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::User()->IdUser, $intIdUser)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load all Users
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return User[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call User::QueryArray to perform the LoadAll query
			try {
				return User::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Users
		 * @return int
		 */
		public static function CountAll() {
			// Call User::QueryCount to perform the CountAll query
			return User::QueryCount(QQ::All());
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
			$objDatabase = User::GetDatabase();

			// Create/Build out the QueryBuilder object with User-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'user');
			User::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('user');

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
		 * Static Qcubed Query method to query for a single User object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return User the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = User::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new User object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = User::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return User::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of User objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return User[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = User::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return User::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of User objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = User::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = User::GetDatabase();

			$strQuery = User::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/user', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = User::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this User
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'user';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'IdUser', $strAliasPrefix . 'IdUser');
			$objBuilder->AddSelectItem($strTableName, 'Email', $strAliasPrefix . 'Email');
			$objBuilder->AddSelectItem($strTableName, 'Password', $strAliasPrefix . 'Password');
			$objBuilder->AddSelectItem($strTableName, 'FirstName', $strAliasPrefix . 'FirstName');
			$objBuilder->AddSelectItem($strTableName, 'MiddleName', $strAliasPrefix . 'MiddleName');
			$objBuilder->AddSelectItem($strTableName, 'LastName', $strAliasPrefix . 'LastName');
			$objBuilder->AddSelectItem($strTableName, 'Country', $strAliasPrefix . 'Country');
			$objBuilder->AddSelectItem($strTableName, 'City', $strAliasPrefix . 'City');
			$objBuilder->AddSelectItem($strTableName, 'Phone', $strAliasPrefix . 'Phone');
			$objBuilder->AddSelectItem($strTableName, 'Birthday', $strAliasPrefix . 'Birthday');
			$objBuilder->AddSelectItem($strTableName, 'ImagePhoto', $strAliasPrefix . 'ImagePhoto');
			$objBuilder->AddSelectItem($strTableName, 'StatusUser', $strAliasPrefix . 'StatusUser');
			$objBuilder->AddSelectItem($strTableName, 'WalletAddress', $strAliasPrefix . 'WalletAddress');
			$objBuilder->AddSelectItem($strTableName, 'UserType', $strAliasPrefix . 'UserType');
		}



		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a User from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this User::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return User
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'IdUser';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && is_array($arrPreviousItems) && count($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objPreviousItem->intIdUser == $objDbRow->GetColumn($strAliasName, 'Integer')) {
						// We are.  Now, prepare to check for ExpandAsArray clauses
						$blnExpandedViaArray = false;
						if (!$strAliasPrefix)
							$strAliasPrefix = 'user__';


						// Expanding reverse references: BalanceAsIdUser
						$strAlias = $strAliasPrefix . 'balanceasiduser__IdBalance';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if(null === $objPreviousItem->_objBalanceAsIdUserArray)
								$objPreviousItem->_objBalanceAsIdUserArray = array();
							if ($intPreviousChildItemCount = count($objPreviousItem->_objBalanceAsIdUserArray)) {
								$objPreviousChildItems = $objPreviousItem->_objBalanceAsIdUserArray;
								$objChildItem = Balance::InstantiateDbRow($objDbRow, $strAliasPrefix . 'balanceasiduser__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->_objBalanceAsIdUserArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->_objBalanceAsIdUserArray[] = Balance::InstantiateDbRow($objDbRow, $strAliasPrefix . 'balanceasiduser__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Expanding reverse references: RestaurantAsIdUser
						$strAlias = $strAliasPrefix . 'restaurantasiduser__IdRestaurant';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if(null === $objPreviousItem->_objRestaurantAsIdUserArray)
								$objPreviousItem->_objRestaurantAsIdUserArray = array();
							if ($intPreviousChildItemCount = count($objPreviousItem->_objRestaurantAsIdUserArray)) {
								$objPreviousChildItems = $objPreviousItem->_objRestaurantAsIdUserArray;
								$objChildItem = Restaurant::InstantiateDbRow($objDbRow, $strAliasPrefix . 'restaurantasiduser__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->_objRestaurantAsIdUserArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->_objRestaurantAsIdUserArray[] = Restaurant::InstantiateDbRow($objDbRow, $strAliasPrefix . 'restaurantasiduser__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
						if ($blnExpandedViaArray) {
							return false;
						} else if ($strAliasPrefix == 'user__') {
							$strAliasPrefix = null;
						}
					}
				}
			}

			// Create a new instance of the User object
			$objToReturn = new User();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'IdUser', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'IdUser'] : $strAliasPrefix . 'IdUser';
			$objToReturn->intIdUser = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'Email', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Email'] : $strAliasPrefix . 'Email';
			$objToReturn->strEmail = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'Password', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Password'] : $strAliasPrefix . 'Password';
			$objToReturn->strPassword = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'FirstName', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'FirstName'] : $strAliasPrefix . 'FirstName';
			$objToReturn->strFirstName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'MiddleName', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'MiddleName'] : $strAliasPrefix . 'MiddleName';
			$objToReturn->strMiddleName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'LastName', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'LastName'] : $strAliasPrefix . 'LastName';
			$objToReturn->strLastName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'Country', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Country'] : $strAliasPrefix . 'Country';
			$objToReturn->strCountry = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'City', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'City'] : $strAliasPrefix . 'City';
			$objToReturn->strCity = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'Phone', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Phone'] : $strAliasPrefix . 'Phone';
			$objToReturn->strPhone = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'Birthday', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Birthday'] : $strAliasPrefix . 'Birthday';
			$objToReturn->dttBirthday = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'ImagePhoto', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'ImagePhoto'] : $strAliasPrefix . 'ImagePhoto';
			$objToReturn->strImagePhoto = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'StatusUser', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'StatusUser'] : $strAliasPrefix . 'StatusUser';
			$objToReturn->intStatusUser = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'WalletAddress', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'WalletAddress'] : $strAliasPrefix . 'WalletAddress';
			$objToReturn->strWalletAddress = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'UserType', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'UserType'] : $strAliasPrefix . 'UserType';
			$objToReturn->strUserType = $objDbRow->GetColumn($strAliasName, 'VarChar');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->IdUser != $objPreviousItem->IdUser) {
						continue;
					}
					if (array_diff($objPreviousItem->_objBalanceAsIdUserArray, $objToReturn->_objBalanceAsIdUserArray) != null) {
						continue;
					}
					if (array_diff($objPreviousItem->_objRestaurantAsIdUserArray, $objToReturn->_objRestaurantAsIdUserArray) != null) {
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
				$strAliasPrefix = 'user__';




			// Check for BalanceAsIdUser Virtual Binding
			$strAlias = $strAliasPrefix . 'balanceasiduser__IdBalance';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = $strExpandAsArrayNodes && array_key_exists($strAlias, $strExpandAsArrayNodes);
			if ($blnExpanded && null === $objToReturn->_objBalanceAsIdUserArray)
				$objToReturn->_objBalanceAsIdUserArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded)
					$objToReturn->_objBalanceAsIdUserArray[] = Balance::InstantiateDbRow($objDbRow, $strAliasPrefix . 'balanceasiduser__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objBalanceAsIdUser = Balance::InstantiateDbRow($objDbRow, $strAliasPrefix . 'balanceasiduser__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for RestaurantAsIdUser Virtual Binding
			$strAlias = $strAliasPrefix . 'restaurantasiduser__IdRestaurant';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = $strExpandAsArrayNodes && array_key_exists($strAlias, $strExpandAsArrayNodes);
			if ($blnExpanded && null === $objToReturn->_objRestaurantAsIdUserArray)
				$objToReturn->_objRestaurantAsIdUserArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded)
					$objToReturn->_objRestaurantAsIdUserArray[] = Restaurant::InstantiateDbRow($objDbRow, $strAliasPrefix . 'restaurantasiduser__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objRestaurantAsIdUser = Restaurant::InstantiateDbRow($objDbRow, $strAliasPrefix . 'restaurantasiduser__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Users from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return User[]
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
					$objItem = User::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = User::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}



		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single User object,
		 * by IdUser Index(es)
		 * @param integer $intIdUser
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return User
		*/
		public static function LoadByIdUser($intIdUser, $objOptionalClauses = null) {
			return User::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::User()->IdUser, $intIdUser)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load a single User object,
		 * by Email Index(es)
		 * @param string $strEmail
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return User
		*/
		public static function LoadByEmail($strEmail, $objOptionalClauses = null) {
			return User::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::User()->Email, $strEmail)
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
		 * Save this User
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `user` (
							`Email`,
							`Password`,
							`FirstName`,
							`MiddleName`,
							`LastName`,
							`Country`,
							`City`,
							`Phone`,
							`Birthday`,
							`ImagePhoto`,
							`StatusUser`,
							`WalletAddress`,
							`UserType`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strEmail) . ',
							' . $objDatabase->SqlVariable($this->strPassword) . ',
							' . $objDatabase->SqlVariable($this->strFirstName) . ',
							' . $objDatabase->SqlVariable($this->strMiddleName) . ',
							' . $objDatabase->SqlVariable($this->strLastName) . ',
							' . $objDatabase->SqlVariable($this->strCountry) . ',
							' . $objDatabase->SqlVariable($this->strCity) . ',
							' . $objDatabase->SqlVariable($this->strPhone) . ',
							' . $objDatabase->SqlVariable($this->dttBirthday) . ',
							' . $objDatabase->SqlVariable($this->strImagePhoto) . ',
							' . $objDatabase->SqlVariable($this->intStatusUser) . ',
							' . $objDatabase->SqlVariable($this->strWalletAddress) . ',
							' . $objDatabase->SqlVariable($this->strUserType) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intIdUser = $objDatabase->InsertId('user', 'IdUser');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`user`
						SET
							`Email` = ' . $objDatabase->SqlVariable($this->strEmail) . ',
							`Password` = ' . $objDatabase->SqlVariable($this->strPassword) . ',
							`FirstName` = ' . $objDatabase->SqlVariable($this->strFirstName) . ',
							`MiddleName` = ' . $objDatabase->SqlVariable($this->strMiddleName) . ',
							`LastName` = ' . $objDatabase->SqlVariable($this->strLastName) . ',
							`Country` = ' . $objDatabase->SqlVariable($this->strCountry) . ',
							`City` = ' . $objDatabase->SqlVariable($this->strCity) . ',
							`Phone` = ' . $objDatabase->SqlVariable($this->strPhone) . ',
							`Birthday` = ' . $objDatabase->SqlVariable($this->dttBirthday) . ',
							`ImagePhoto` = ' . $objDatabase->SqlVariable($this->strImagePhoto) . ',
							`StatusUser` = ' . $objDatabase->SqlVariable($this->intStatusUser) . ',
							`WalletAddress` = ' . $objDatabase->SqlVariable($this->strWalletAddress) . ',
							`UserType` = ' . $objDatabase->SqlVariable($this->strUserType) . '
						WHERE
							`IdUser` = ' . $objDatabase->SqlVariable($this->intIdUser) . '
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
		 * Delete this User
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intIdUser)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this User with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`user`
				WHERE
					`IdUser` = ' . $objDatabase->SqlVariable($this->intIdUser) . '');
		}

		/**
		 * Delete all Users
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`user`');
		}

		/**
		 * Truncate user table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `user`');
		}

		/**
		 * Reload this User from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved User object.');

			// Reload the Object
			$objReloaded = User::Load($this->intIdUser);

			// Update $this's local variables to match
			$this->strEmail = $objReloaded->strEmail;
			$this->strPassword = $objReloaded->strPassword;
			$this->strFirstName = $objReloaded->strFirstName;
			$this->strMiddleName = $objReloaded->strMiddleName;
			$this->strLastName = $objReloaded->strLastName;
			$this->strCountry = $objReloaded->strCountry;
			$this->strCity = $objReloaded->strCity;
			$this->strPhone = $objReloaded->strPhone;
			$this->dttBirthday = $objReloaded->dttBirthday;
			$this->strImagePhoto = $objReloaded->strImagePhoto;
			$this->intStatusUser = $objReloaded->intStatusUser;
			$this->strWalletAddress = $objReloaded->strWalletAddress;
			$this->strUserType = $objReloaded->strUserType;
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
				case 'IdUser':
					/**
					 * Gets the value for intIdUser (Read-Only PK)
					 * @return integer
					 */
					return $this->intIdUser;

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

				case 'MiddleName':
					/**
					 * Gets the value for strMiddleName (Not Null)
					 * @return string
					 */
					return $this->strMiddleName;

				case 'LastName':
					/**
					 * Gets the value for strLastName (Not Null)
					 * @return string
					 */
					return $this->strLastName;

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

				case 'Phone':
					/**
					 * Gets the value for strPhone (Not Null)
					 * @return string
					 */
					return $this->strPhone;

				case 'Birthday':
					/**
					 * Gets the value for dttBirthday 
					 * @return QDateTime
					 */
					return $this->dttBirthday;

				case 'ImagePhoto':
					/**
					 * Gets the value for strImagePhoto 
					 * @return string
					 */
					return $this->strImagePhoto;

				case 'StatusUser':
					/**
					 * Gets the value for intStatusUser (Not Null)
					 * @return integer
					 */
					return $this->intStatusUser;

				case 'WalletAddress':
					/**
					 * Gets the value for strWalletAddress 
					 * @return string
					 */
					return $this->strWalletAddress;

				case 'UserType':
					/**
					 * Gets the value for strUserType (Not Null)
					 * @return string
					 */
					return $this->strUserType;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_BalanceAsIdUser':
					/**
					 * Gets the value for the private _objBalanceAsIdUser (Read-Only)
					 * if set due to an expansion on the balance.IdUser reverse relationship
					 * @return Balance
					 */
					return $this->_objBalanceAsIdUser;

				case '_BalanceAsIdUserArray':
					/**
					 * Gets the value for the private _objBalanceAsIdUserArray (Read-Only)
					 * if set due to an ExpandAsArray on the balance.IdUser reverse relationship
					 * @return Balance[]
					 */
					return $this->_objBalanceAsIdUserArray;

				case '_RestaurantAsIdUser':
					/**
					 * Gets the value for the private _objRestaurantAsIdUser (Read-Only)
					 * if set due to an expansion on the restaurant.IdUser reverse relationship
					 * @return Restaurant
					 */
					return $this->_objRestaurantAsIdUser;

				case '_RestaurantAsIdUserArray':
					/**
					 * Gets the value for the private _objRestaurantAsIdUserArray (Read-Only)
					 * if set due to an ExpandAsArray on the restaurant.IdUser reverse relationship
					 * @return Restaurant[]
					 */
					return $this->_objRestaurantAsIdUserArray;


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

				case 'MiddleName':
					/**
					 * Sets the value for strMiddleName (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strMiddleName = QType::Cast($mixValue, QType::String));
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

				case 'Birthday':
					/**
					 * Sets the value for dttBirthday 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttBirthday = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ImagePhoto':
					/**
					 * Sets the value for strImagePhoto 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strImagePhoto = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StatusUser':
					/**
					 * Sets the value for intStatusUser (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intStatusUser = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'WalletAddress':
					/**
					 * Sets the value for strWalletAddress 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strWalletAddress = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UserType':
					/**
					 * Sets the value for strUserType (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strUserType = QType::Cast($mixValue, QType::String));
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

			
		
		// Related Objects' Methods for BalanceAsIdUser
		//-------------------------------------------------------------------

		/**
		 * Gets all associated BalancesAsIdUser as an array of Balance objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Balance[]
		*/
		public function GetBalanceAsIdUserArray($objOptionalClauses = null) {
			if ((is_null($this->intIdUser)))
				return array();

			try {
				return Balance::LoadArrayByIdUser($this->intIdUser, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated BalancesAsIdUser
		 * @return int
		*/
		public function CountBalancesAsIdUser() {
			if ((is_null($this->intIdUser)))
				return 0;

			return Balance::CountByIdUser($this->intIdUser);
		}

		/**
		 * Associates a BalanceAsIdUser
		 * @param Balance $objBalance
		 * @return void
		*/
		public function AssociateBalanceAsIdUser(Balance $objBalance) {
			if ((is_null($this->intIdUser)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateBalanceAsIdUser on this unsaved User.');
			if ((is_null($objBalance->IdBalance)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateBalanceAsIdUser on this User with an unsaved Balance.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`balance`
				SET
					`IdUser` = ' . $objDatabase->SqlVariable($this->intIdUser) . '
				WHERE
					`IdBalance` = ' . $objDatabase->SqlVariable($objBalance->IdBalance) . '
			');
		}

		/**
		 * Unassociates a BalanceAsIdUser
		 * @param Balance $objBalance
		 * @return void
		*/
		public function UnassociateBalanceAsIdUser(Balance $objBalance) {
			if ((is_null($this->intIdUser)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBalanceAsIdUser on this unsaved User.');
			if ((is_null($objBalance->IdBalance)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBalanceAsIdUser on this User with an unsaved Balance.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`balance`
				SET
					`IdUser` = null
				WHERE
					`IdBalance` = ' . $objDatabase->SqlVariable($objBalance->IdBalance) . ' AND
					`IdUser` = ' . $objDatabase->SqlVariable($this->intIdUser) . '
			');
		}

		/**
		 * Unassociates all BalancesAsIdUser
		 * @return void
		*/
		public function UnassociateAllBalancesAsIdUser() {
			if ((is_null($this->intIdUser)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBalanceAsIdUser on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`balance`
				SET
					`IdUser` = null
				WHERE
					`IdUser` = ' . $objDatabase->SqlVariable($this->intIdUser) . '
			');
		}

		/**
		 * Deletes an associated BalanceAsIdUser
		 * @param Balance $objBalance
		 * @return void
		*/
		public function DeleteAssociatedBalanceAsIdUser(Balance $objBalance) {
			if ((is_null($this->intIdUser)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBalanceAsIdUser on this unsaved User.');
			if ((is_null($objBalance->IdBalance)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBalanceAsIdUser on this User with an unsaved Balance.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`balance`
				WHERE
					`IdBalance` = ' . $objDatabase->SqlVariable($objBalance->IdBalance) . ' AND
					`IdUser` = ' . $objDatabase->SqlVariable($this->intIdUser) . '
			');
		}

		/**
		 * Deletes all associated BalancesAsIdUser
		 * @return void
		*/
		public function DeleteAllBalancesAsIdUser() {
			if ((is_null($this->intIdUser)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBalanceAsIdUser on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`balance`
				WHERE
					`IdUser` = ' . $objDatabase->SqlVariable($this->intIdUser) . '
			');
		}

			
		
		// Related Objects' Methods for RestaurantAsIdUser
		//-------------------------------------------------------------------

		/**
		 * Gets all associated RestaurantsAsIdUser as an array of Restaurant objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Restaurant[]
		*/
		public function GetRestaurantAsIdUserArray($objOptionalClauses = null) {
			if ((is_null($this->intIdUser)))
				return array();

			try {
				return Restaurant::LoadArrayByIdUser($this->intIdUser, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated RestaurantsAsIdUser
		 * @return int
		*/
		public function CountRestaurantsAsIdUser() {
			if ((is_null($this->intIdUser)))
				return 0;

			return Restaurant::CountByIdUser($this->intIdUser);
		}

		/**
		 * Associates a RestaurantAsIdUser
		 * @param Restaurant $objRestaurant
		 * @return void
		*/
		public function AssociateRestaurantAsIdUser(Restaurant $objRestaurant) {
			if ((is_null($this->intIdUser)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRestaurantAsIdUser on this unsaved User.');
			if ((is_null($objRestaurant->IdRestaurant)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRestaurantAsIdUser on this User with an unsaved Restaurant.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`restaurant`
				SET
					`IdUser` = ' . $objDatabase->SqlVariable($this->intIdUser) . '
				WHERE
					`IdRestaurant` = ' . $objDatabase->SqlVariable($objRestaurant->IdRestaurant) . '
			');
		}

		/**
		 * Unassociates a RestaurantAsIdUser
		 * @param Restaurant $objRestaurant
		 * @return void
		*/
		public function UnassociateRestaurantAsIdUser(Restaurant $objRestaurant) {
			if ((is_null($this->intIdUser)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRestaurantAsIdUser on this unsaved User.');
			if ((is_null($objRestaurant->IdRestaurant)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRestaurantAsIdUser on this User with an unsaved Restaurant.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`restaurant`
				SET
					`IdUser` = null
				WHERE
					`IdRestaurant` = ' . $objDatabase->SqlVariable($objRestaurant->IdRestaurant) . ' AND
					`IdUser` = ' . $objDatabase->SqlVariable($this->intIdUser) . '
			');
		}

		/**
		 * Unassociates all RestaurantsAsIdUser
		 * @return void
		*/
		public function UnassociateAllRestaurantsAsIdUser() {
			if ((is_null($this->intIdUser)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRestaurantAsIdUser on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`restaurant`
				SET
					`IdUser` = null
				WHERE
					`IdUser` = ' . $objDatabase->SqlVariable($this->intIdUser) . '
			');
		}

		/**
		 * Deletes an associated RestaurantAsIdUser
		 * @param Restaurant $objRestaurant
		 * @return void
		*/
		public function DeleteAssociatedRestaurantAsIdUser(Restaurant $objRestaurant) {
			if ((is_null($this->intIdUser)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRestaurantAsIdUser on this unsaved User.');
			if ((is_null($objRestaurant->IdRestaurant)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRestaurantAsIdUser on this User with an unsaved Restaurant.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`restaurant`
				WHERE
					`IdRestaurant` = ' . $objDatabase->SqlVariable($objRestaurant->IdRestaurant) . ' AND
					`IdUser` = ' . $objDatabase->SqlVariable($this->intIdUser) . '
			');
		}

		/**
		 * Deletes all associated RestaurantsAsIdUser
		 * @return void
		*/
		public function DeleteAllRestaurantsAsIdUser() {
			if ((is_null($this->intIdUser)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRestaurantAsIdUser on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`restaurant`
				WHERE
					`IdUser` = ' . $objDatabase->SqlVariable($this->intIdUser) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="User"><sequence>';
			$strToReturn .= '<element name="IdUser" type="xsd:int"/>';
			$strToReturn .= '<element name="Email" type="xsd:string"/>';
			$strToReturn .= '<element name="Password" type="xsd:string"/>';
			$strToReturn .= '<element name="FirstName" type="xsd:string"/>';
			$strToReturn .= '<element name="MiddleName" type="xsd:string"/>';
			$strToReturn .= '<element name="LastName" type="xsd:string"/>';
			$strToReturn .= '<element name="Country" type="xsd:string"/>';
			$strToReturn .= '<element name="City" type="xsd:string"/>';
			$strToReturn .= '<element name="Phone" type="xsd:string"/>';
			$strToReturn .= '<element name="Birthday" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="ImagePhoto" type="xsd:string"/>';
			$strToReturn .= '<element name="StatusUser" type="xsd:int"/>';
			$strToReturn .= '<element name="WalletAddress" type="xsd:string"/>';
			$strToReturn .= '<element name="UserType" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('User', $strComplexTypeArray)) {
				$strComplexTypeArray['User'] = User::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, User::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new User();
			if (property_exists($objSoapObject, 'IdUser'))
				$objToReturn->intIdUser = $objSoapObject->IdUser;
			if (property_exists($objSoapObject, 'Email'))
				$objToReturn->strEmail = $objSoapObject->Email;
			if (property_exists($objSoapObject, 'Password'))
				$objToReturn->strPassword = $objSoapObject->Password;
			if (property_exists($objSoapObject, 'FirstName'))
				$objToReturn->strFirstName = $objSoapObject->FirstName;
			if (property_exists($objSoapObject, 'MiddleName'))
				$objToReturn->strMiddleName = $objSoapObject->MiddleName;
			if (property_exists($objSoapObject, 'LastName'))
				$objToReturn->strLastName = $objSoapObject->LastName;
			if (property_exists($objSoapObject, 'Country'))
				$objToReturn->strCountry = $objSoapObject->Country;
			if (property_exists($objSoapObject, 'City'))
				$objToReturn->strCity = $objSoapObject->City;
			if (property_exists($objSoapObject, 'Phone'))
				$objToReturn->strPhone = $objSoapObject->Phone;
			if (property_exists($objSoapObject, 'Birthday'))
				$objToReturn->dttBirthday = new QDateTime($objSoapObject->Birthday);
			if (property_exists($objSoapObject, 'ImagePhoto'))
				$objToReturn->strImagePhoto = $objSoapObject->ImagePhoto;
			if (property_exists($objSoapObject, 'StatusUser'))
				$objToReturn->intStatusUser = $objSoapObject->StatusUser;
			if (property_exists($objSoapObject, 'WalletAddress'))
				$objToReturn->strWalletAddress = $objSoapObject->WalletAddress;
			if (property_exists($objSoapObject, 'UserType'))
				$objToReturn->strUserType = $objSoapObject->UserType;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, User::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttBirthday)
				$objObject->dttBirthday = $objObject->dttBirthday->qFormat(QDateTime::FormatSoap);
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
			$iArray['IdUser'] = $this->intIdUser;
			$iArray['Email'] = $this->strEmail;
			$iArray['Password'] = $this->strPassword;
			$iArray['FirstName'] = $this->strFirstName;
			$iArray['MiddleName'] = $this->strMiddleName;
			$iArray['LastName'] = $this->strLastName;
			$iArray['Country'] = $this->strCountry;
			$iArray['City'] = $this->strCity;
			$iArray['Phone'] = $this->strPhone;
			$iArray['Birthday'] = $this->dttBirthday;
			$iArray['ImagePhoto'] = $this->strImagePhoto;
			$iArray['StatusUser'] = $this->intStatusUser;
			$iArray['WalletAddress'] = $this->strWalletAddress;
			$iArray['UserType'] = $this->strUserType;
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
     * @property-read QQNode $IdUser
     * @property-read QQNode $Email
     * @property-read QQNode $Password
     * @property-read QQNode $FirstName
     * @property-read QQNode $MiddleName
     * @property-read QQNode $LastName
     * @property-read QQNode $Country
     * @property-read QQNode $City
     * @property-read QQNode $Phone
     * @property-read QQNode $Birthday
     * @property-read QQNode $ImagePhoto
     * @property-read QQNode $StatusUser
     * @property-read QQNode $WalletAddress
     * @property-read QQNode $UserType
     *
     *
     * @property-read QQReverseReferenceNodeBalance $BalanceAsIdUser
     * @property-read QQReverseReferenceNodeRestaurant $RestaurantAsIdUser

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeUser extends QQNode {
		protected $strTableName = 'user';
		protected $strPrimaryKey = 'IdUser';
		protected $strClassName = 'User';
		public function __get($strName) {
			switch ($strName) {
				case 'IdUser':
					return new QQNode('IdUser', 'IdUser', 'Integer', $this);
				case 'Email':
					return new QQNode('Email', 'Email', 'VarChar', $this);
				case 'Password':
					return new QQNode('Password', 'Password', 'VarChar', $this);
				case 'FirstName':
					return new QQNode('FirstName', 'FirstName', 'VarChar', $this);
				case 'MiddleName':
					return new QQNode('MiddleName', 'MiddleName', 'VarChar', $this);
				case 'LastName':
					return new QQNode('LastName', 'LastName', 'VarChar', $this);
				case 'Country':
					return new QQNode('Country', 'Country', 'VarChar', $this);
				case 'City':
					return new QQNode('City', 'City', 'VarChar', $this);
				case 'Phone':
					return new QQNode('Phone', 'Phone', 'VarChar', $this);
				case 'Birthday':
					return new QQNode('Birthday', 'Birthday', 'DateTime', $this);
				case 'ImagePhoto':
					return new QQNode('ImagePhoto', 'ImagePhoto', 'VarChar', $this);
				case 'StatusUser':
					return new QQNode('StatusUser', 'StatusUser', 'Integer', $this);
				case 'WalletAddress':
					return new QQNode('WalletAddress', 'WalletAddress', 'VarChar', $this);
				case 'UserType':
					return new QQNode('UserType', 'UserType', 'VarChar', $this);
				case 'BalanceAsIdUser':
					return new QQReverseReferenceNodeBalance($this, 'balanceasiduser', 'reverse_reference', 'IdUser');
				case 'RestaurantAsIdUser':
					return new QQReverseReferenceNodeRestaurant($this, 'restaurantasiduser', 'reverse_reference', 'IdUser');

				case '_PrimaryKeyNode':
					return new QQNode('IdUser', 'IdUser', 'Integer', $this);
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
     * @property-read QQNode $IdUser
     * @property-read QQNode $Email
     * @property-read QQNode $Password
     * @property-read QQNode $FirstName
     * @property-read QQNode $MiddleName
     * @property-read QQNode $LastName
     * @property-read QQNode $Country
     * @property-read QQNode $City
     * @property-read QQNode $Phone
     * @property-read QQNode $Birthday
     * @property-read QQNode $ImagePhoto
     * @property-read QQNode $StatusUser
     * @property-read QQNode $WalletAddress
     * @property-read QQNode $UserType
     *
     *
     * @property-read QQReverseReferenceNodeBalance $BalanceAsIdUser
     * @property-read QQReverseReferenceNodeRestaurant $RestaurantAsIdUser

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeUser extends QQReverseReferenceNode {
		protected $strTableName = 'user';
		protected $strPrimaryKey = 'IdUser';
		protected $strClassName = 'User';
		public function __get($strName) {
			switch ($strName) {
				case 'IdUser':
					return new QQNode('IdUser', 'IdUser', 'integer', $this);
				case 'Email':
					return new QQNode('Email', 'Email', 'string', $this);
				case 'Password':
					return new QQNode('Password', 'Password', 'string', $this);
				case 'FirstName':
					return new QQNode('FirstName', 'FirstName', 'string', $this);
				case 'MiddleName':
					return new QQNode('MiddleName', 'MiddleName', 'string', $this);
				case 'LastName':
					return new QQNode('LastName', 'LastName', 'string', $this);
				case 'Country':
					return new QQNode('Country', 'Country', 'string', $this);
				case 'City':
					return new QQNode('City', 'City', 'string', $this);
				case 'Phone':
					return new QQNode('Phone', 'Phone', 'string', $this);
				case 'Birthday':
					return new QQNode('Birthday', 'Birthday', 'QDateTime', $this);
				case 'ImagePhoto':
					return new QQNode('ImagePhoto', 'ImagePhoto', 'string', $this);
				case 'StatusUser':
					return new QQNode('StatusUser', 'StatusUser', 'integer', $this);
				case 'WalletAddress':
					return new QQNode('WalletAddress', 'WalletAddress', 'string', $this);
				case 'UserType':
					return new QQNode('UserType', 'UserType', 'string', $this);
				case 'BalanceAsIdUser':
					return new QQReverseReferenceNodeBalance($this, 'balanceasiduser', 'reverse_reference', 'IdUser');
				case 'RestaurantAsIdUser':
					return new QQReverseReferenceNodeRestaurant($this, 'restaurantasiduser', 'reverse_reference', 'IdUser');

				case '_PrimaryKeyNode':
					return new QQNode('IdUser', 'IdUser', 'integer', $this);
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
