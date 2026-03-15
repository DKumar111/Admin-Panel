<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
define('BASE_URL', 'http://crm.local/admin/');
include BASE_URL.'config/db.php';