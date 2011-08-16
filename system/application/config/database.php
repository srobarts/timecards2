<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the "Database Connection"
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the "default" group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = "macbook";
$active_record = TRUE;

$db['macbook']['hostname'] = "127.0.0.1:3306";
$db['macbook']['username'] = "root";
$db['macbook']['password'] = "";
$db['macbook']['database'] = "timecard";
$db['macbook']['dbdriver'] = "mysql";
$db['macbook']['dbprefix'] = "";
$db['macbook']['pconnect'] = TRUE;
$db['macbook']['db_debug'] = TRUE;
$db['macbook']['cache_on'] = FALSE;
$db['macbook']['cachedir'] = "";
$db['macbook']['char_set'] = "utf8";
$db['macbook']['dbcollat'] = "utf8_general_ci";

$db['sechelt']['hostname'] = "localhost";
$db['sechelt']['username'] = "root";
$db['sechelt']['password'] = "n0n0udman";
$db['sechelt']['database'] = "timecard";
$db['sechelt']['dbdriver'] = "mysql";
$db['sechelt']['dbprefix'] = "";
$db['sechelt']['pconnect'] = TRUE;
$db['sechelt']['db_debug'] = TRUE;
$db['sechelt']['cache_on'] = FALSE;
$db['sechelt']['cachedir'] = "";
$db['sechelt']['char_set'] = "utf8";
$db['sechelt']['dbcollat'] = "utf8_general_ci";


/* End of file database.php */
/* Location: ./system/application/config/database.php */