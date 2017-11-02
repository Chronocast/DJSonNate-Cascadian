<!--
	Author: Nathan Hascup, Duck Nguyen, Jeremy Manalo, Sonie Moon
	Date: 10/13/17
	Filename: home.html
	Description: Admin page for Track-king. Cascadian Landworks tracking system.
-->

<?php echo $this->render('pages/admin-header.html',NULL,get_defined_vars(),0); ?>
	
	<!-- ACTIVE PROJECT START -->
	<div id="active-div" class="portfolio container-fluid">
		<div class="col-sm-12">
			<h1>Active projects:</h1>
		</div>
		
		<!-- CARD DECK/COLUMNS START -->
		<div class="card-deck">
		  
			<?php foreach (($projectDisplay?:[]) as $track): ?>
		  
				<!-- CARD -->
				<div class="card">
					<!-- CARD TITLE + OPTIONS BUTTONS-->
					<!-- button class was btn-info -->
					<button type="button" class="btn btn-title" data-toggle="modal" data-target="#exampleModal">
						Project: <?= ($track['project_name'])."
" ?>
					</button>
					
					<div class="d-inline-block text-center">
						<a>
							<button type="button" class="btn btn-warning" alt="documents" data-toggle="modal" data-target="#documentModal"> 
								<i class="fa fa-file-text-o"></i> 
							</button>
						</a>
						<a>
							<button type="button" class="btn btn-warning" alt="documents"> 
								<i class="fa fa-calendar-check-o"></i> 
							</button>
						</a>
						<a>
							<button type="button" class="btn btn-warning" alt="documents"> 
								<i class="fa fa-cogs"></i>
							</button>
						</a>
						<a>
							<button type="button" class="btn btn-warning" alt="documents"> 
								<i class="fa fa-cubes"></i> 
							</button>
						</a>
						<a>
							<button type="button" class="btn btn-warning" alt="documents"> 
								<i class="fa fa-list-ol"></i> 
							</button>
						</a>
						<a>
							<button type="button" class="btn btn-warning" alt="documents"> 
								<i class="fa fa-check"></i> 
							</button>
						</a>
					</div>
					
					<!-- CARD BODY -->
					<div class="card-body">
						<h6 class="card-title">Current Stage: <?= ($track['current_stage']) ?></h6>
						<p class="card-text">Tracking # <?= ($track['track_id']) ?></p>
						<p class="card-text">Start Date: <?= ($track['start_date']) ?></p>
						<p class="card-text">End Date: <?= ($track['end_date']) ?></p>
					</div>
					<div class="card-footer">
						<small class="text-muted">Last updated <?= ($track['last_update']) ?></small>
					</div>
				  
				  
					<!-- MODAL -->
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Project: <?= ($track['project_name']) ?></h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<p class="card-text">Current Stage: <?= ($track['current_stage']) ?></p>
									<p class="card-text">Start Date: <?= ($track['start_date']) ?></p>
									<p class="card-text">End Date: <?= ($track['end_date']) ?></p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary">Save changes</button>
								</div>
							</div>
						</div>
					</div>
					<!-- END Modal -->
					
					<!-- MODAL -->
					<div class="modal fade" id="documentModal" tabindex="-1" role="dialog" aria-labelledby="documentModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="documentModalLabel">Tracking # <?= ($track['track_id']) ?></h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<a href="<?= ($track['documentation_link']) ?>" data-toggle="lightbox" data-footer="Img Footer">
										<img src="<?= ($track['documentation_link']) ?>" class="img-fluid" >
									</a>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary">Save changes</button>
								</div>
							</div>
						</div>
					</div>
					<!-- END Modal -->
				  
				</div>
				<!-- END Card -->
		  
			<?php endforeach; ?>
		</div>
	</div>
	<!-- ACTIVE PROJECT END -->
	
	
<?php echo $this->render('pages/admin-footer.html',NULL,get_defined_vars(),0); ?>