<a class="btn btn-bright-light" href="https://adam-thomas.ou.usu.edu/classroom-search-admin"><i class="fas fa-arrow-left"></i> Back To Admin Home</a>
<div class="row justify-content-center">
	<div class="col-lg-6">
		<h1>Add New Classroom</h1>
		<form method="post">
			<div class="form-group">
				<label for="room-name">Room Name</label>
				<input type="text" class="form-control" id="room-name" name="room-name" >
			</div>
			<div class="form-group">
				<label for="room-image-url">Room Image URL</label>
				<input type="text" class="form-control" id="room-image-url" name="room-image-url" >
				<small id="room-image-help" class="form-text text-muted">This will show up as the first image in the popup on the form page. leaving blank will default to `/classroom-technology-images/"Building Code"_"Room Name"_r.jpg`
				</small>
			</div>
			<div class="form-group">
				<label for="equipment-image-url">Equipment Image URL</label>
				<input type="text" class="form-control" id="equipment-image-url" name="equipment-image-url">
				<small id="equipment-image-help" class="form-text text-muted">This will show up as the second image in the popup on the form page. leaving blank will default to `/classroom-technology-images/"Building Code"_"Room Name"_e.jpg`
				</small>
			</div>
			<div class="form-group">
				<label for="seat-capacity">Seat Capacity</label>
				<input type="text" class="form-control" id="seat-capacity" name="seat-capacity">
			</div>


			<div class="d-flex justify-content-end">
				<button type="submit" name="submit" class="btn btn-success">Create Classroom</button>
			</div>
		</form>
	</div>
</div>

<?php

include '{{f:53496668}}';
$objDbConnection = new DatabaseConnection();




if(isset($_POST['submit'])){
	$strRoomName = $_POST['room-name'];
	$strRoomImage = $_POST['room-image-url'];
	$strEquipmentImage = $_POST['equipment-image-url'];
	$strSeatCapacity = $_POST['seat-capacity'];

	$arrCols = array("id", "name", "building_id", "seats", "room_image_url", "equipment_image_url");
	$arrValues = array(null, $strRoomName, $intBuildingId, $strSeatCapacity, $strRoomImage, $strEquipmentImage);
	$objDbConnection->insertData('classrooms', $arrCols, $arrValues);


	echo '<p class="text-bold text-center">Classroom Added!</p>';


}
