<div class="row mb-3">
    <div class="col-lg-9">
        <h1>Classroom Search Admin</h1>
    </div>
    <div class="col-lg-3 mt-3">
        <a href="https://adam-thomas.ou.usu.edu/classroom-search-admin?add_building=true" class="btn btn-success btn-block"> <i class="fas fa-plus"></i> Add New Building</a>
    </div>
</div>
<div class="row">
    <?php
    foreach($arrBuildings as $objBuilding){
        ?>
        <div class="col-lg-4 my-2">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title"><?php echo $objBuilding->getName(); ?></h3>
                    <div class="mt-3 d-flex justify-content-end">
                        <a class="btn btn-primary" <?php echo 'href="https://adam-thomas.ou.usu.edu/classroom-search-admin?building_id=' . $objBuilding->getId() . '"' ?>>View</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

</div>
