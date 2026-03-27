<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

$active_group = 'default';
$query_builder = true;

$db['default']['hostname'] = 'localhost';
$db['default']['database'] = 'change_me_database';
$db['default']['username'] = 'change_me_user';
$db['default']['password'] = 'change_me_password';
$db['default']['dbdriver'] = 'mysqli';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = false;
$db['default']['db_debug'] = (ENVIRONMENT !== 'production');
$db['default']['cache_on'] = false;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8mb4';
$db['default']['dbcollat'] = 'utf8mb4_unicode_ci';
$db['default']['swap_pre'] = '';
$db['default']['encrypt'] = false;
$db['default']['compress'] = false;
$db['default']['stricton'] = false;
$db['default']['failover'] = array();
$db['default']['save_queries'] = true;
