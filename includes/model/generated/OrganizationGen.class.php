<?php
	/**
	 * The abstract OrganizationGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Organization subclass which
	 * extends this OrganizationGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Organization class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $IdOrganization the value for intIdOrganization (Read-Only PK)
	 * @property string $Name the value for strName (Not Null)
	 * @property string $Phone the value for strPhone 
	 * @property string $QrCode the value for strQrCode 
	 * @property string $OrganizationImage the value for strOrganizationImage 
	 * @property string $Latitude the value for strLatitude (Unique)
	 * @property string $Longitude the value for strLongitude (Unique)
	 * @property string $Country the value for strCountry 
	 * @property string $City the value for strCity 
	 * @property string $Address the value for strAddress 
	 * @property integer $IdOrganizationType the value for intIdOrganizationType (Not Null)
	 * @property integer $IdOwner the value for intIdOwner (Not Null)
	 * @property Organizationtype $IdOrganizationTypeObject the value for the Organizationtype object referenced by intIdOrganizationType (Not Null)
	 * @property Owner $IdOwnerObject the value for the Owner object referenced by intIdOwner (Not Null)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class OrganizationGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column organization.IdOrganization
		 * @var integer intIdOrganization
		 */
		protected $intIdOrganization;
		const IdOrganizationDefault = null;


		/**
		 * Protected member variable that maps to the database column organization.Name
		 * @var string strName
		 */
		protected $strName;
		const NameMaxLength = 50;
		const NameDefault = null;


		/**
		 * Protected member variable that maps to the database column organization.Phone
		 * @var string strPhone
		 */
		protected $strPhone;
		const PhoneMaxLength = 15;
		const PhoneDefault = null;


		/**
		 * Protected member variable that maps to the database column organization.QrCode
		 * @var string strQrCode
		 */
		protected $strQrCode;
		const QrCodeMaxLength = 45;
		const QrCodeDefault = null;


		/**
		 * Protected member variable that maps to the database column organization.OrganizationImage
		 * @var string strOrganizationImage
		 */
		protected $strOrganizationImage;
		const OrganizationImageMaxLength = 50;
		const OrganizationImageDefault = null;


		/**
		 * Protected member variable that maps to the database column organization.Latitude
		 * @var string strLatitude
		 */
		protected $strLatitude;
		const LatitudeMaxLength = 45;
		const LatitudeDefault = null;


		/**
		 * Protected member variable that maps to the database column organization.Longitude
		 * @var string strLongitude
		 */
		protected $strLongitude;
		const LongitudeMaxLength = 45;
		const LongitudeDefault = null;


		/**
		 * Protected member variable that maps to the database column organization.Country
		 * @var string strCountry
		 */
		protected $strCountry;
		const CountryMaxLength = 45;
		const CountryDefault = null;


		/**
		 * Protected member variable that maps to the database column organization.City
		 * @var string strCity
		 */
		protected $strCity;
		const CityMaxLength = 45;
		const CityDefault = null;


		/**
		 * Protected member variable that maps to the database column organization.Address
		 * @var string strAddress
		 */
		protected $strAddress;
		const AddressMaxLength = 45;
		const AddressDefault = null;


		/**
		 * Protected member variable that maps to the database column organization.IdOrganizationType
		 * @var integer intIdOrganizationType
		 */
		protected $intIdOrganizationType;
		const IdOrganizationTypeDefault = null;


		/**
		 * Protected member variable that maps to the database column organization.IdOwner
		 * @var integer intIdOwner
		 */
		protected $intIdOwner;
		const IdOwnerDefault = null;


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
		 * in the database column organization.IdOrganizationType.
		 *
		 * NOTE: Always use the IdOrganizationTypeObject property getter to correctly retrieve this Organizationtype object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Organizationtype objIdOrganizationTypeObject
		 */
		protected $objIdOrganizationTypeObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column organization.IdOwner.
		 *
		 * NOTE: Always use the IdOwnerObject property getter to correctly retrieve this Owner object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Owner objIdOwnerObject
		 */
		protected $objIdOwnerObject;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intIdOrganization = Organization::IdOrganizationDefault;
			$this->strName = Organization::NameDefault;
			$this->strPhone = Organization::PhoneDefault;
			$this->strQrCode = Organization::QrCodeDefault;
			$this->strOrganizationImage = Organization::OrganizationImageDefault;
			$this->strLatitude = Organization::LatitudeDefault;
			$this->strLongitude = Organization::LongitudeDefault;
			$this->strCountry = Organization::CountryDefault;
			$this->strCity = Organization::CityDefault;
			$this->strAddress = Organization::AddressDefault;
			$this->intIdOrganizationType = Organization::IdOrganizationTypeDefault;
			$this->intIdOwner = Organization::IdOwnerDefault;
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
		 * Load a Organization from PK Info
		 * @param integer $intIdOrganization
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Organization
		 */
		public static function Load($intIdOrganization, $objOptionalClauses = null) {
			// Use QuerySingle to Perform the Query
			return Organization::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Organization()->IdOrganization, $intIdOrganization)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load all Organizations
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Organization[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Organization::QueryArray to perform the LoadAll query
			try {
				return Organization::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Organizations
		 * @return int
		 */
		public static function CountAll() {
			// Call Organization::QueryCount to perform the CountAll query
			return Organization::QueryCount(QQ::All());
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
			$objDatabase = Organization::GetDatabase();

			// Create/Build out the QueryBuilder object with Organization-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'organization');
			Organization::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('organization');

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
		 * Static Qcubed Query method to query for a single Organization object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Organization the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Organization::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Organization object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Organization::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Organization::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Organization objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Organization[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Organization::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Organization::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of Organization objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Organization::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Organization::GetDatabase();

			$strQuery = Organization::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/organization', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Organization::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Organization
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'organization';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'IdOrganization', $strAliasPrefix . 'IdOrganization');
			$objBuilder->AddSelectItem($strTableName, 'Name', $strAliasPrefix . 'Name');
			$objBuilder->AddSelectItem($strTableName, 'Phone', $strAliasPrefix . 'Phone');
			$objBuilder->AddSelectItem($strTableName, 'QrCode', $strAliasPrefix . 'QrCode');
			$objBuilder->AddSelectItem($strTableName, 'OrganizationImage', $strAliasPrefix . 'OrganizationImage');
			$objBuilder->AddSelectItem($strTableName, 'Latitude', $strAliasPrefix . 'Latitude');
			$objBuilder->AddSelectItem($strTableName, 'Longitude', $strAliasPrefix . 'Longitude');
			$objBuilder->AddSelectItem($strTableName, 'Country', $strAliasPrefix . 'Country');
			$objBuilder->AddSelectItem($strTableName, 'City', $strAliasPrefix . 'City');
			$objBuilder->AddSelectItem($strTableName, 'Address', $strAliasPrefix . 'Address');
			$objBuilder->AddSelectItem($strTableName, 'IdOrganizationType', $strAliasPrefix . 'IdOrganizationType');
			$objBuilder->AddSelectItem($strTableName, 'IdOwner', $strAliasPrefix . 'IdOwner');
		}



		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Organization from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Organization::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Organization
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}

			// Create a new instance of the Organization object
			$objToReturn = new Organization();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'IdOrganization', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'IdOrganization'] : $strAliasPrefix . 'IdOrganization';
			$objToReturn->intIdOrganization = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'Name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Name'] : $strAliasPrefix . 'Name';
			$objToReturn->strName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'Phone', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Phone'] : $strAliasPrefix . 'Phone';
			$objToReturn->strPhone = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'QrCode', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'QrCode'] : $strAliasPrefix . 'QrCode';
			$objToReturn->strQrCode = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'OrganizationImage', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'OrganizationImage'] : $strAliasPrefix . 'OrganizationImage';
			$objToReturn->strOrganizationImage = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'Latitude', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Latitude'] : $strAliasPrefix . 'Latitude';
			$objToReturn->strLatitude = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'Longitude', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Longitude'] : $strAliasPrefix . 'Longitude';
			$objToReturn->strLongitude = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'Country', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Country'] : $strAliasPrefix . 'Country';
			$objToReturn->strCountry = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'City', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'City'] : $strAliasPrefix . 'City';
			$objToReturn->strCity = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'Address', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Address'] : $strAliasPrefix . 'Address';
			$objToReturn->strAddress = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'IdOrganizationType', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'IdOrganizationType'] : $strAliasPrefix . 'IdOrganizationType';
			$objToReturn->intIdOrganizationType = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'IdOwner', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'IdOwner'] : $strAliasPrefix . 'IdOwner';
			$objToReturn->intIdOwner = $objDbRow->GetColumn($strAliasName, 'Integer');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->IdOrganization != $objPreviousItem->IdOrganization) {
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
				$strAliasPrefix = 'organization__';

			// Check for IdOrganizationTypeObject Early Binding
			$strAlias = $strAliasPrefix . 'IdOrganizationType__IdOrganizationType';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdOrganizationTypeObject = Organizationtype::InstantiateDbRow($objDbRow, $strAliasPrefix . 'IdOrganizationType__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for IdOwnerObject Early Binding
			$strAlias = $strAliasPrefix . 'IdOwner__IdOwner';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdOwnerObject = Owner::InstantiateDbRow($objDbRow, $strAliasPrefix . 'IdOwner__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of Organizations from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Organization[]
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
					$objItem = Organization::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Organization::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}



		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Organization object,
		 * by IdOrganization Index(es)
		 * @param integer $intIdOrganization
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Organization
		*/
		public static function LoadByIdOrganization($intIdOrganization, $objOptionalClauses = null) {
			return Organization::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Organization()->IdOrganization, $intIdOrganization)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load a single Organization object,
		 * by Latitude Index(es)
		 * @param string $strLatitude
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Organization
		*/
		public static function LoadByLatitude($strLatitude, $objOptionalClauses = null) {
			return Organization::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Organization()->Latitude, $strLatitude)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load a single Organization object,
		 * by Longitude Index(es)
		 * @param string $strLongitude
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Organization
		*/
		public static function LoadByLongitude($strLongitude, $objOptionalClauses = null) {
			return Organization::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Organization()->Longitude, $strLongitude)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Organization objects,
		 * by IdOrganizationType Index(es)
		 * @param integer $intIdOrganizationType
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Organization[]
		*/
		public static function LoadArrayByIdOrganizationType($intIdOrganizationType, $objOptionalClauses = null) {
			// Call Organization::QueryArray to perform the LoadArrayByIdOrganizationType query
			try {
				return Organization::QueryArray(
					QQ::Equal(QQN::Organization()->IdOrganizationType, $intIdOrganizationType),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Organizations
		 * by IdOrganizationType Index(es)
		 * @param integer $intIdOrganizationType
		 * @return int
		*/
		public static function CountByIdOrganizationType($intIdOrganizationType) {
			// Call Organization::QueryCount to perform the CountByIdOrganizationType query
			return Organization::QueryCount(
				QQ::Equal(QQN::Organization()->IdOrganizationType, $intIdOrganizationType)
			);
		}
			
		/**
		 * Load an array of Organization objects,
		 * by IdOwner Index(es)
		 * @param integer $intIdOwner
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Organization[]
		*/
		public static function LoadArrayByIdOwner($intIdOwner, $objOptionalClauses = null) {
			// Call Organization::QueryArray to perform the LoadArrayByIdOwner query
			try {
				return Organization::QueryArray(
					QQ::Equal(QQN::Organization()->IdOwner, $intIdOwner),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Organizations
		 * by IdOwner Index(es)
		 * @param integer $intIdOwner
		 * @return int
		*/
		public static function CountByIdOwner($intIdOwner) {
			// Call Organization::QueryCount to perform the CountByIdOwner query
			return Organization::QueryCount(
				QQ::Equal(QQN::Organization()->IdOwner, $intIdOwner)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Organization
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Organization::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `organization` (
							`Name`,
							`Phone`,
							`QrCode`,
							`OrganizationImage`,
							`Latitude`,
							`Longitude`,
							`Country`,
							`City`,
							`Address`,
							`IdOrganizationType`,
							`IdOwner`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strName) . ',
							' . $objDatabase->SqlVariable($this->strPhone) . ',
							' . $objDatabase->SqlVariable($this->strQrCode) . ',
							' . $objDatabase->SqlVariable($this->strOrganizationImage) . ',
							' . $objDatabase->SqlVariable($this->strLatitude) . ',
							' . $objDatabase->SqlVariable($this->strLongitude) . ',
							' . $objDatabase->SqlVariable($this->strCountry) . ',
							' . $objDatabase->SqlVariable($this->strCity) . ',
							' . $objDatabase->SqlVariable($this->strAddress) . ',
							' . $objDatabase->SqlVariable($this->intIdOrganizationType) . ',
							' . $objDatabase->SqlVariable($this->intIdOwner) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intIdOrganization = $objDatabase->InsertId('organization', 'IdOrganization');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`organization`
						SET
							`Name` = ' . $objDatabase->SqlVariable($this->strName) . ',
							`Phone` = ' . $objDatabase->SqlVariable($this->strPhone) . ',
							`QrCode` = ' . $objDatabase->SqlVariable($this->strQrCode) . ',
							`OrganizationImage` = ' . $objDatabase->SqlVariable($this->strOrganizationImage) . ',
							`Latitude` = ' . $objDatabase->SqlVariable($this->strLatitude) . ',
							`Longitude` = ' . $objDatabase->SqlVariable($this->strLongitude) . ',
							`Country` = ' . $objDatabase->SqlVariable($this->strCountry) . ',
							`City` = ' . $objDatabase->SqlVariable($this->strCity) . ',
							`Address` = ' . $objDatabase->SqlVariable($this->strAddress) . ',
							`IdOrganizationType` = ' . $objDatabase->SqlVariable($this->intIdOrganizationType) . ',
							`IdOwner` = ' . $objDatabase->SqlVariable($this->intIdOwner) . '
						WHERE
							`IdOrganization` = ' . $objDatabase->SqlVariable($this->intIdOrganization) . '
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
		 * Delete this Organization
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intIdOrganization)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Organization with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Organization::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`organization`
				WHERE
					`IdOrganization` = ' . $objDatabase->SqlVariable($this->intIdOrganization) . '');
		}

		/**
		 * Delete all Organizations
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Organization::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`organization`');
		}

		/**
		 * Truncate organization table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Organization::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `organization`');
		}

		/**
		 * Reload this Organization from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Organization object.');

			// Reload the Object
			$objReloaded = Organization::Load($this->intIdOrganization);

			// Update $this's local variables to match
			$this->strName = $objReloaded->strName;
			$this->strPhone = $objReloaded->strPhone;
			$this->strQrCode = $objReloaded->strQrCode;
			$this->strOrganizationImage = $objReloaded->strOrganizationImage;
			$this->strLatitude = $objReloaded->strLatitude;
			$this->strLongitude = $objReloaded->strLongitude;
			$this->strCountry = $objReloaded->strCountry;
			$this->strCity = $objReloaded->strCity;
			$this->strAddress = $objReloaded->strAddress;
			$this->IdOrganizationType = $objReloaded->IdOrganizationType;
			$this->IdOwner = $objReloaded->IdOwner;
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
				case 'IdOrganization':
					/**
					 * Gets the value for intIdOrganization (Read-Only PK)
					 * @return integer
					 */
					return $this->intIdOrganization;

				case 'Name':
					/**
					 * Gets the value for strName (Not Null)
					 * @return string
					 */
					return $this->strName;

				case 'Phone':
					/**
					 * Gets the value for strPhone 
					 * @return string
					 */
					return $this->strPhone;

				case 'QrCode':
					/**
					 * Gets the value for strQrCode 
					 * @return string
					 */
					return $this->strQrCode;

				case 'OrganizationImage':
					/**
					 * Gets the value for strOrganizationImage 
					 * @return string
					 */
					return $this->strOrganizationImage;

				case 'Latitude':
					/**
					 * Gets the value for strLatitude (Unique)
					 * @return string
					 */
					return $this->strLatitude;

				case 'Longitude':
					/**
					 * Gets the value for strLongitude (Unique)
					 * @return string
					 */
					return $this->strLongitude;

				case 'Country':
					/**
					 * Gets the value for strCountry 
					 * @return string
					 */
					return $this->strCountry;

				case 'City':
					/**
					 * Gets the value for strCity 
					 * @return string
					 */
					return $this->strCity;

				case 'Address':
					/**
					 * Gets the value for strAddress 
					 * @return string
					 */
					return $this->strAddress;

				case 'IdOrganizationType':
					/**
					 * Gets the value for intIdOrganizationType (Not Null)
					 * @return integer
					 */
					return $this->intIdOrganizationType;

				case 'IdOwner':
					/**
					 * Gets the value for intIdOwner (Not Null)
					 * @return integer
					 */
					return $this->intIdOwner;


				///////////////////
				// Member Objects
				///////////////////
				case 'IdOrganizationTypeObject':
					/**
					 * Gets the value for the Organizationtype object referenced by intIdOrganizationType (Not Null)
					 * @return Organizationtype
					 */
					try {
						if ((!$this->objIdOrganizationTypeObject) && (!is_null($this->intIdOrganizationType)))
							$this->objIdOrganizationTypeObject = Organizationtype::Load($this->intIdOrganizationType);
						return $this->objIdOrganizationTypeObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'IdOwnerObject':
					/**
					 * Gets the value for the Owner object referenced by intIdOwner (Not Null)
					 * @return Owner
					 */
					try {
						if ((!$this->objIdOwnerObject) && (!is_null($this->intIdOwner)))
							$this->objIdOwnerObject = Owner::Load($this->intIdOwner);
						return $this->objIdOwnerObject;
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
				case 'Name':
					/**
					 * Sets the value for strName (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Phone':
					/**
					 * Sets the value for strPhone 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strPhone = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'QrCode':
					/**
					 * Sets the value for strQrCode 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strQrCode = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'OrganizationImage':
					/**
					 * Sets the value for strOrganizationImage 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strOrganizationImage = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Latitude':
					/**
					 * Sets the value for strLatitude (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strLatitude = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Longitude':
					/**
					 * Sets the value for strLongitude (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strLongitude = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Country':
					/**
					 * Sets the value for strCountry 
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
					 * Sets the value for strCity 
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
					 * Sets the value for strAddress 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strAddress = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'IdOrganizationType':
					/**
					 * Sets the value for intIdOrganizationType (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objIdOrganizationTypeObject = null;
						return ($this->intIdOrganizationType = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'IdOwner':
					/**
					 * Sets the value for intIdOwner (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objIdOwnerObject = null;
						return ($this->intIdOwner = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'IdOrganizationTypeObject':
					/**
					 * Sets the value for the Organizationtype object referenced by intIdOrganizationType (Not Null)
					 * @param Organizationtype $mixValue
					 * @return Organizationtype
					 */
					if (is_null($mixValue)) {
						$this->intIdOrganizationType = null;
						$this->objIdOrganizationTypeObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Organizationtype object
						try {
							$mixValue = QType::Cast($mixValue, 'Organizationtype');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Organizationtype object
						if (is_null($mixValue->IdOrganizationType))
							throw new QCallerException('Unable to set an unsaved IdOrganizationTypeObject for this Organization');

						// Update Local Member Variables
						$this->objIdOrganizationTypeObject = $mixValue;
						$this->intIdOrganizationType = $mixValue->IdOrganizationType;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'IdOwnerObject':
					/**
					 * Sets the value for the Owner object referenced by intIdOwner (Not Null)
					 * @param Owner $mixValue
					 * @return Owner
					 */
					if (is_null($mixValue)) {
						$this->intIdOwner = null;
						$this->objIdOwnerObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Owner object
						try {
							$mixValue = QType::Cast($mixValue, 'Owner');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Owner object
						if (is_null($mixValue->IdOwner))
							throw new QCallerException('Unable to set an unsaved IdOwnerObject for this Organization');

						// Update Local Member Variables
						$this->objIdOwnerObject = $mixValue;
						$this->intIdOwner = $mixValue->IdOwner;

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
			$strToReturn = '<complexType name="Organization"><sequence>';
			$strToReturn .= '<element name="IdOrganization" type="xsd:int"/>';
			$strToReturn .= '<element name="Name" type="xsd:string"/>';
			$strToReturn .= '<element name="Phone" type="xsd:string"/>';
			$strToReturn .= '<element name="QrCode" type="xsd:string"/>';
			$strToReturn .= '<element name="OrganizationImage" type="xsd:string"/>';
			$strToReturn .= '<element name="Latitude" type="xsd:string"/>';
			$strToReturn .= '<element name="Longitude" type="xsd:string"/>';
			$strToReturn .= '<element name="Country" type="xsd:string"/>';
			$strToReturn .= '<element name="City" type="xsd:string"/>';
			$strToReturn .= '<element name="Address" type="xsd:string"/>';
			$strToReturn .= '<element name="IdOrganizationTypeObject" type="xsd1:Organizationtype"/>';
			$strToReturn .= '<element name="IdOwnerObject" type="xsd1:Owner"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Organization', $strComplexTypeArray)) {
				$strComplexTypeArray['Organization'] = Organization::GetSoapComplexTypeXml();
				Organizationtype::AlterSoapComplexTypeArray($strComplexTypeArray);
				Owner::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Organization::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Organization();
			if (property_exists($objSoapObject, 'IdOrganization'))
				$objToReturn->intIdOrganization = $objSoapObject->IdOrganization;
			if (property_exists($objSoapObject, 'Name'))
				$objToReturn->strName = $objSoapObject->Name;
			if (property_exists($objSoapObject, 'Phone'))
				$objToReturn->strPhone = $objSoapObject->Phone;
			if (property_exists($objSoapObject, 'QrCode'))
				$objToReturn->strQrCode = $objSoapObject->QrCode;
			if (property_exists($objSoapObject, 'OrganizationImage'))
				$objToReturn->strOrganizationImage = $objSoapObject->OrganizationImage;
			if (property_exists($objSoapObject, 'Latitude'))
				$objToReturn->strLatitude = $objSoapObject->Latitude;
			if (property_exists($objSoapObject, 'Longitude'))
				$objToReturn->strLongitude = $objSoapObject->Longitude;
			if (property_exists($objSoapObject, 'Country'))
				$objToReturn->strCountry = $objSoapObject->Country;
			if (property_exists($objSoapObject, 'City'))
				$objToReturn->strCity = $objSoapObject->City;
			if (property_exists($objSoapObject, 'Address'))
				$objToReturn->strAddress = $objSoapObject->Address;
			if ((property_exists($objSoapObject, 'IdOrganizationTypeObject')) &&
				($objSoapObject->IdOrganizationTypeObject))
				$objToReturn->IdOrganizationTypeObject = Organizationtype::GetObjectFromSoapObject($objSoapObject->IdOrganizationTypeObject);
			if ((property_exists($objSoapObject, 'IdOwnerObject')) &&
				($objSoapObject->IdOwnerObject))
				$objToReturn->IdOwnerObject = Owner::GetObjectFromSoapObject($objSoapObject->IdOwnerObject);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Organization::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objIdOrganizationTypeObject)
				$objObject->objIdOrganizationTypeObject = Organizationtype::GetSoapObjectFromObject($objObject->objIdOrganizationTypeObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIdOrganizationType = null;
			if ($objObject->objIdOwnerObject)
				$objObject->objIdOwnerObject = Owner::GetSoapObjectFromObject($objObject->objIdOwnerObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIdOwner = null;
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
			$iArray['IdOrganization'] = $this->intIdOrganization;
			$iArray['Name'] = $this->strName;
			$iArray['Phone'] = $this->strPhone;
			$iArray['QrCode'] = $this->strQrCode;
			$iArray['OrganizationImage'] = $this->strOrganizationImage;
			$iArray['Latitude'] = $this->strLatitude;
			$iArray['Longitude'] = $this->strLongitude;
			$iArray['Country'] = $this->strCountry;
			$iArray['City'] = $this->strCity;
			$iArray['Address'] = $this->strAddress;
			$iArray['IdOrganizationType'] = $this->intIdOrganizationType;
			$iArray['IdOwner'] = $this->intIdOwner;
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
     * @property-read QQNode $IdOrganization
     * @property-read QQNode $Name
     * @property-read QQNode $Phone
     * @property-read QQNode $QrCode
     * @property-read QQNode $OrganizationImage
     * @property-read QQNode $Latitude
     * @property-read QQNode $Longitude
     * @property-read QQNode $Country
     * @property-read QQNode $City
     * @property-read QQNode $Address
     * @property-read QQNode $IdOrganizationType
     * @property-read QQNodeOrganizationtype $IdOrganizationTypeObject
     * @property-read QQNode $IdOwner
     * @property-read QQNodeOwner $IdOwnerObject
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeOrganization extends QQNode {
		protected $strTableName = 'organization';
		protected $strPrimaryKey = 'IdOrganization';
		protected $strClassName = 'Organization';
		public function __get($strName) {
			switch ($strName) {
				case 'IdOrganization':
					return new QQNode('IdOrganization', 'IdOrganization', 'Integer', $this);
				case 'Name':
					return new QQNode('Name', 'Name', 'VarChar', $this);
				case 'Phone':
					return new QQNode('Phone', 'Phone', 'VarChar', $this);
				case 'QrCode':
					return new QQNode('QrCode', 'QrCode', 'VarChar', $this);
				case 'OrganizationImage':
					return new QQNode('OrganizationImage', 'OrganizationImage', 'VarChar', $this);
				case 'Latitude':
					return new QQNode('Latitude', 'Latitude', 'VarChar', $this);
				case 'Longitude':
					return new QQNode('Longitude', 'Longitude', 'VarChar', $this);
				case 'Country':
					return new QQNode('Country', 'Country', 'VarChar', $this);
				case 'City':
					return new QQNode('City', 'City', 'VarChar', $this);
				case 'Address':
					return new QQNode('Address', 'Address', 'VarChar', $this);
				case 'IdOrganizationType':
					return new QQNode('IdOrganizationType', 'IdOrganizationType', 'Integer', $this);
				case 'IdOrganizationTypeObject':
					return new QQNodeOrganizationtype('IdOrganizationType', 'IdOrganizationTypeObject', 'Integer', $this);
				case 'IdOwner':
					return new QQNode('IdOwner', 'IdOwner', 'Integer', $this);
				case 'IdOwnerObject':
					return new QQNodeOwner('IdOwner', 'IdOwnerObject', 'Integer', $this);

				case '_PrimaryKeyNode':
					return new QQNode('IdOrganization', 'IdOrganization', 'Integer', $this);
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
     * @property-read QQNode $IdOrganization
     * @property-read QQNode $Name
     * @property-read QQNode $Phone
     * @property-read QQNode $QrCode
     * @property-read QQNode $OrganizationImage
     * @property-read QQNode $Latitude
     * @property-read QQNode $Longitude
     * @property-read QQNode $Country
     * @property-read QQNode $City
     * @property-read QQNode $Address
     * @property-read QQNode $IdOrganizationType
     * @property-read QQNodeOrganizationtype $IdOrganizationTypeObject
     * @property-read QQNode $IdOwner
     * @property-read QQNodeOwner $IdOwnerObject
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeOrganization extends QQReverseReferenceNode {
		protected $strTableName = 'organization';
		protected $strPrimaryKey = 'IdOrganization';
		protected $strClassName = 'Organization';
		public function __get($strName) {
			switch ($strName) {
				case 'IdOrganization':
					return new QQNode('IdOrganization', 'IdOrganization', 'integer', $this);
				case 'Name':
					return new QQNode('Name', 'Name', 'string', $this);
				case 'Phone':
					return new QQNode('Phone', 'Phone', 'string', $this);
				case 'QrCode':
					return new QQNode('QrCode', 'QrCode', 'string', $this);
				case 'OrganizationImage':
					return new QQNode('OrganizationImage', 'OrganizationImage', 'string', $this);
				case 'Latitude':
					return new QQNode('Latitude', 'Latitude', 'string', $this);
				case 'Longitude':
					return new QQNode('Longitude', 'Longitude', 'string', $this);
				case 'Country':
					return new QQNode('Country', 'Country', 'string', $this);
				case 'City':
					return new QQNode('City', 'City', 'string', $this);
				case 'Address':
					return new QQNode('Address', 'Address', 'string', $this);
				case 'IdOrganizationType':
					return new QQNode('IdOrganizationType', 'IdOrganizationType', 'integer', $this);
				case 'IdOrganizationTypeObject':
					return new QQNodeOrganizationtype('IdOrganizationType', 'IdOrganizationTypeObject', 'integer', $this);
				case 'IdOwner':
					return new QQNode('IdOwner', 'IdOwner', 'integer', $this);
				case 'IdOwnerObject':
					return new QQNodeOwner('IdOwner', 'IdOwnerObject', 'integer', $this);

				case '_PrimaryKeyNode':
					return new QQNode('IdOrganization', 'IdOrganization', 'integer', $this);
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
