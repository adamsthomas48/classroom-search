<a class="btn btn-bright-light" href="https://adam-thomas.ou.usu.edu/classroom-search-admin"><i class="fas fa-arrow-left"></i> Back To Admin Home</a>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <h1>Add Building</h1>
        <form method="post">
            <div class="form-group">
                <label for="create-building">Building Name</label>
                <input type="text" class="form-control" id="building-name" name="building-name" required >
            </div>
            <div class="form-group">
                <label for="create-building">Building Code</label>
                <input type="text" class="form-control" id="building-code" name="building-code" required >
                <small id="building-code" class="form-text text-muted">This will show up as "building-code room-name" in the search results.</small>

            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success" name="submit">Create Building</button>

            </div>
        </form>
    </div>
</div>

<?php
include '{{f:53496668}}';
$objDbConnection = new DatabaseConnection();

if(isset($_POST['submit'])){
    $strBuildingName = $_POST['building-name'];
    $strBuildingCode = $_POST['building-code'];

    $arrCols = array("id", "building_name", "filter_code");
    $arrValues = array(null, $strBuildingName, $strBuildingCode);
    $objDbConnection->insertData('building_list', $arrCols, $arrValues);

    echo '<p class="text-bold text-center">Building Added!</p>';
}


