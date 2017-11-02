<!--
	Author: Nathan Hascup, Duck Nguyen, Jeremy Manalo, Sonie Moon
	Date: 10/13/17
	Filename: home.html
	Description: Admin page for Track-king. Cascadian Landworks tracking system.
-->

<?php echo $this->render('pages/admin-header.html',NULL,get_defined_vars(),0); ?>

    <!-- Portfolio container -->
    <div id="active-div" class="portfolio container-fluid">

        <!-- PROJECT START -->
        <div id="inactive-div" class="portfolio container-fluid">
            <div class="col-sm-12">
                <h1>Projects:</h1>
            </div>
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">List group item heading</h5>
                        <small>3 days ago</small>
                    </div>
                    <h6 class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</h6>
                    <small class="text-muted">Donec id elit non mi porta.</small>
                </a>
                
                
                
                
                
            </div>
        </div>
        <!-- PROJECT END -->
    
    <!-- Portfolio container END -->
    </div>






<?php echo $this->render('pages/admin-footer.html',NULL,get_defined_vars(),0); ?>