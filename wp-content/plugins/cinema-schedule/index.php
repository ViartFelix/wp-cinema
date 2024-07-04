<?php

/*
Plugin Name: Cinema schedule
Description: Manage, and display cinema schedules
Author: Félix Viart
Version: 0.1.0
*/

require_once __DIR__ . "/page-utils.php";
require_once __DIR__ . "/db-utils.php";
require_once __DIR__ . "/menu-utils.php";

register_activation_hook(__FILE__, 'createTables');
