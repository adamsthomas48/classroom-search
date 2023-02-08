<?php

include 'priv/Search.php';

$currentPageUrl = 'http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$urlComponents = parse_url($currentPageUrl);
parse_str($urlComponents['query'], $params);
$intBuildingId = $params["building_id"];

$objSearch = new Search();

if($params["add_building"]){
    include 'priv/views/add-building.php';
}
else if($params["add_classroom"]){
    
    include 'priv/views/add-classroom.php';
}
else if($params["building_id"]){
    $arrClassrooms = $objSearch->getClassroomsByBuilding($params["building_id"]);
    $objBuildingInfo = $objSearch->getBuildingById($params["building_id"])[0];
    include 'priv/views/admin-building.php';
} else {
    $arrBuildings = $objSearch->getAllBuildings();
    include 'priv/views/admin.php';
}

