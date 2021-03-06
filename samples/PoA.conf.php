<?php
// vim:set filetype=php:

/*
 * This is a sample configuration file.
 */

/*
 * Main global configuration. This parameters apply to any PoA defined in this
 * configuration file unless redefined locally.
 */
$poa_cfg = array(

// the full path to the file where to send PoA logs.
'LogFile' => '../var/log/poa.log',

// enable or disable debugging. Debugging mode will display the filename and line
// of any message printed to the log.
'Debug' => true,

// the verbosity level of the logs. Use the predefined PHP constants. Levels
// can be combined by means of the bitwise operators.
// E_ALL: all messages.
// E_USER_NOTICE: notice messages. Use it for debuggin purpuses.
// E_USER_WARNING: warning messages. Verbose common operation.
// E_USER_ERROR: error messages. Just software errors that will abort execution
'LogLevel' => E_ALL | E_STRICT,

// the language to use, in the form of language_variant, like for example
// en_GB for Great Britain's english.
'Language' => 'en_EN',

// the URL where to redirect users when authentication fails.
// AUTOPOA ONLY!
'NoAuthErrorURL' => 'http://www.rediris.es/error.php?status=403',

// the URL where to redirect users when system errors found.
// AUTOPOA ONLY!
'SystemErrorURL' => 'http://www.rediris.es/error.php?status=503',

// the URL where to redirect users when an error was found with an invite.
// AUTOPOA ONLY!
'InviteErrorURL' => 'http://www.rediris.es/null/error.php?status=503',

// the authentication engine to use. Select one of:
// * PAPIAuthnEngine
// * simpleSAMLphp
'AuthnEngine' => 'PAPIAuthnEngine',

// the authorization engine to use. You can choose between:
// * DummyAuthzEngine: unconditional authorization.
// * SourceIPAddrAuthzEngine: authorize users depending on the source address.
// * URLPatterAuthzEngine: authorize users depending on the URL asked.
// * InviteDBAAuthzEngine: authorize users who received an invitation. DBA backend.
// * InviteMySQLAUthzEngine: authorize users who received an invitation. MySQL backend.
//
// If you want to use multiple authorization engines at a time, please set their names
// as the elements of an array. Please note that engines will be always evaluated in the
// same exact order you specify them.
'AuthzEngines' => 'InviteDBAAuthzEngine',

// the configuration file for each authorization engine. A named array with the paths to the files.
'AuthzEnginesConfFiles' => array('InviteDBAAuthzEngine' => 'path-to-config-file')
);

/*
 * Configuration for the site "samples". Define one for each site using the PoA.
 * Parameters defined here will override the general configuration.
 */

$poa_cfg['samples'] = array(
'LogLevel' => E_ALL,
'Language' => 'es_ES',
'AuthnEngineConfFile' => dirname(__FILE__).'/PAPI.conf.php',

'AuthzEngines' => array('AttributeFilterAuthzEngine',
                        'SourceIPAddrAuthzEngine',
                        'QueryFilterAuthzEngine'),

'AuthzEnginesConfFiles' => array('AttributeFilterAuthzEngine' => dirname(__FILE__).'/AttributeFilters.conf.php',
                                 'SourceIPAddrAuthzEngine' => dirname(__FILE__).'/IPFilters.conf.php',
                                 'QueryFilterAuthzEngine' => dirname(__FILE__).'/QueryFilters.conf.php')
);

$poa_cfg['sample7'] = $poa_cfg['samples'];
$poa_cfg['sample7']['AuthzEngines'] = array('InviteAuthzEngine');
$poa_cfg['sample7']['AuthzEnginesConfFiles'] = array('InviteAuthzEngine' => dirname(__FILE__).'/Invites.conf.php');

$poa_cfg['sample8'] = $poa_cfg['samples'];;
$poa_cfg['sample8']['AuthzEngines'] = array();

$poa_cfg['sample9'] = $poa_cfg['sample8'];

$poa_cfg['openid1'] = $poa_cfg['samples'];
$poa_cfg['openid1']['AuthnEngineConfFile'] = dirname(__FILE__).'/OpenID.conf.php';

$poa_cfg['openid2'] = $poa_cfg['openid1'];
$poa_cfg['openid3'] = $poa_cfg['openid1'];

?>
