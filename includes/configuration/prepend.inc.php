<?php

if (!defined('__PREPEND_INCLUDED__')) {
    // Ensure prepend.inc is only executed once
    define('__PREPEND_INCLUDED__', 1);


    ///////////////////////////////////
    // Define Server-specific constants
    ///////////////////////////////////	
    /*
     * This assumes that the configuration include file is in the same directory
     * as this prepend include file.  For security reasons, you can feel free
     * to move the configuration file anywhere you want.  But be sure to provide
     * a relative or absolute path to the file.
     */
    require(dirname(__FILE__) . '/configuration.inc.php');


    //////////////////////////////
    // Include the QCubed Framework
    //////////////////////////////
    require(__QCUBED_CORE__ . '/framework/DisableMagicQuotes.inc.php');
    require(__QCUBED_CORE__ . '/qcubed.inc.php');

    ///////////////////////////////
    // Define the Application Class
    ///////////////////////////////
    /**
     * The Application class is an abstract class that statically provides
     * information and global utilities for the entire web application.
     *
     * Custom constants for this webapp, as well as global variables and global
     * methods should be declared in this abstract class (declared statically).
     *
     * This Application class should extend from the ApplicationBase class in
     * the framework.
     */
    abstract class QApplication extends QApplicationBase {

        /**
         * This is called by the PHP5 Autoloader.  This method overrides the
         * one in ApplicationBase.
         *
         * @return void
         */
        public static function Autoload($strClassName) {
            // First use the QCubed Autoloader
            if (!parent::Autoload($strClassName)) {
                // TODO: Run any custom autoloading functionality (if any) here...
            }
        }

        ////////////////////////////
        // QApplication Customizations (e.g. EncodingType, etc.)
        ////////////////////////////
        // public static $EncodingType = 'ISO-8859-1';
        ////////////////////////////
        // Additional Static Methods
        ////////////////////////////
        // TODO: Define any other custom global WebApplication functions (if any) here...
/*
        public static function verifyAdminPrivileges() {
            $admin = @unserialize($_SESSION['DatosAdministrador']);
            if ($admin != NULL) {
                return true;
            }
            return false;
        }

        public static function GetGeneralInfo() {

            $strConstantName = sprintf('DB_CONNECTION_%s', 1);
            $strSerialArray = constant($strConstantName);
            $objConfigArray = unserialize($strSerialArray);

            return $objConfigArray;
        }
*/
        /*
        public static function InitializeDatabaseConnections() {

            $user = @unserialize($_SESSION['DatosUsuario']);
            $hostDB = @unserialize($_SESSION['hostdb']);
            $userDB = @unserialize($_SESSION['userdb']);
            $passDB = @unserialize($_SESSION['passdb']);
            $nameDB = @unserialize($_SESSION['namedb']);


            if ($user != NULL) {//user is logged as normal user, change database
                //QApplication::ExecuteJavascript("alert('$userDB')");
                //exit(1);
                $strDatabaseType = 'QMySqli5Database';
                if (!class_exists($strDatabaseType)) {
                    $strDatabaseAdapter = sprintf('%s/database/%s.class.php', __QCUBED_CORE__, $strDatabaseType);
                    if (!file_exists($strDatabaseAdapter))
                        throw new Exception('Database Type is not valid: ' . $objConfigArray['adapter']);
                    require($strDatabaseAdapter);
                }

                $config = array(
                    'adapter' => 'MySqli5',
                    'server' => $hostDB,
                    'port' => null,
                    'database' => $nameDB,
                    'username' => $userDB,
                    'password' => $passDB,
                    'profiling' => false);

                QApplication::$Database[1] = new $strDatabaseType(1, $config);
                return;
            }


            for ($intIndex = 0; $intIndex <= 9; $intIndex++) {
                $strConstantName = sprintf('DB_CONNECTION_%s', $intIndex);

                if (defined($strConstantName)) {
                    // Expected Keys to be Set
                    $strExpectedKeys = array(
                        'adapter', 'server', 'port', 'database',
                        'username', 'password', 'profiling', 'dateformat'
                    );

                    // Lookup the Serialized Array from the DB_CONFIG constants and unserialize it
                    $strSerialArray = constant($strConstantName);
                    $objConfigArray = unserialize($strSerialArray);

                    // Set All Expected Keys
                    foreach ($strExpectedKeys as $strExpectedKey)
                        if (!array_key_exists($strExpectedKey, $objConfigArray))
                            $objConfigArray[$strExpectedKey] = null;

                    if (!$objConfigArray['adapter'])
                        throw new Exception('No Adapter Defined for ' . $strConstantName . ': ' . var_export($objConfigArray, true));

                    if (!$objConfigArray['server'])
                        throw new Exception('No Server Defined for ' . $strConstantName . ': ' . constant($strConstantName));

                    $strDatabaseType = 'Q' . $objConfigArray['adapter'] . 'Database';
                    if (!class_exists($strDatabaseType)) {
                        $strDatabaseAdapter = sprintf('%s/database/%s.class.php', __QCUBED_CORE__, $strDatabaseType);
                        if (!file_exists($strDatabaseAdapter))
                            throw new Exception('Database Type is not valid: ' . $objConfigArray['adapter']);
                        require($strDatabaseAdapter);
                    }

                    QApplication::$Database[$intIndex] = new $strDatabaseType($intIndex, $objConfigArray);
                }
            }
        }
        
        
        */

    }

    // Register the autoloader
    spl_autoload_register(array('QApplication', 'Autoload'));

    //////////////////////////
    // Custom Global Functions
    //////////////////////////	
    // TODO: Define any custom global functions (if any) here...
    ////////////////
    // Include Files
    ////////////////
    // TODO: Include any other include files (if any) here...
    ///////////////////////
    // Setup Error Handling
    ///////////////////////
    /*
     * Set Error/Exception Handling to the default
     * QCubed HandleError and HandlException functions
     * (Only in non CLI mode)
     *
     * Feel free to change, if needed, to your own
     * custom error handling script(s).
     */
    if (array_key_exists('SERVER_PROTOCOL', $_SERVER)) {
        set_error_handler('QcodoHandleError', error_reporting());
        set_exception_handler('QcodoHandleException');
    }


    ////////////////////////////////////////////////
    // Initialize the Application and DB Connections
    ////////////////////////////////////////////////
    QApplication::Initialize();
    /////////////////////////////
    // Start Session Handler (if required)
    /////////////////////////////
    session_start();

    QApplication::InitializeDatabaseConnections();
    //////////////////////////////////////////////
    // Setup Internationalization and Localization (if applicable)
    // Note, this is where you would implement code to do Language Setting discovery, as well, for example:
    // * Checking against $_GET['language_code']
    // * checking against session (example provided below)
    // * Checking the URL
    // * etc.
    // TODO: options to do this are left to the developer
    //////////////////////////////////////////////
    if (isset($_SESSION)) {

        ini_set("session.gc_maxlifetime", "54400");

        if (array_key_exists('country_code', $_SESSION))
            QApplication::$CountryCode = $_SESSION['country_code'];
        if (array_key_exists('language_code', $_SESSION))
            QApplication::$LanguageCode = $_SESSION['language_code'];
    }

    // Initialize I18n if QApplication::$LanguageCode is set
    if (QApplication::$LanguageCode)
        QI18n::Initialize();
    else {
        // QApplication::$CountryCode = 'us';
        // QApplication::$LanguageCode = 'en';
        // QI18n::Initialize();
    }
}
?>