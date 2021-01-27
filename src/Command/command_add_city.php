<?php

include_once __DIR__ . "/../Migrations/202101271027_migration_add_field_city_to_shops.php";
include_once __DIR__ . "/../Service/DBConnector.php";

$dbConnector = DBConnector::getInstance();

$migration = new MigrationAddCityToShop($dbConnector);
$migration->commit();

die("ОК");


