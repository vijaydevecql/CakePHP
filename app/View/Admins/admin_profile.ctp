<div class="form-group pull-right">

</div>


<h1>Profile</h1>

<?php if (!empty($admin_data['Admin']['name'])) { ?>
	<div class="row">
		<div class="form-group">
			<label class="col-sm-3 control-label">Name : </label>
			<div class="col-sm-9">
				<?php
				echo ucfirst($admin_data['Admin']['name']);
				?>
			</div>
		</div>
	</div>
	<?php } ?>
	<!-- <?php if (!empty($data['Category']['email'])) { ?>
		<div class="row">
			<div class="form-group">
				<label class="col-sm-3 control-label">Email : </label>
				<div class="col-sm-9">
					<?php
					echo ucfirst($data['Category']['email']);
					?>
				</div>
			</div>
		</div>
		<?php } ?> -->
		<!-- <?php if (!empty($data['Category']['created'])) { ?>
			<div class="row">
				<div class="form-group">
					<label class="col-sm-3 control-label">Date Added: </label>
					<div class="col-sm-9">
						<?php
						echo date('Y-m-d h:i:s', $data['Category']['created']);
						?> 
					</div>
				</div>
			</div>
			<?php } ?> -->

			<?php if (!empty($admin_data['Admin']['image'])) { ?>
				<div class="row">
					<div class="form-group">
						<label class="col-sm-3 control-label">Image : </label>
						<div class="col-sm-9">
							<img
							style="
							width: 150px;"
							src="<?php echo $this->webroot . 'files/users/' . $admin_data['Admin']['image']; ?>"
							/>
						</div>
					</div>
				</div>
				<?php } ?>


				<?php if (!empty($admin_data['Admin']['description'])) { ?>
					<div class="row">
						<div class="form-group">
							<label class="col-sm-3 control-label">Description : </label>
							<div class="col-sm-9">
								<?php
								echo ucfirst($admin_data['Admin']['description']);
								?>
							</div>
						</div>
					</div>
					<?php } ?>
					
						<?php if ($admin_data['Admin']['status'] == 0 || $admin_data['Admin']['status'] == 1) { ?>
							<div class="row">
								<div class="form-group">
									<label class="col-sm-3 control-label">Status : </label>
									<div class="col-sm-9">
										<?php
										echo ucfirst(($admin_data['Admin']['status'] == 1)?'active':'inactive');
										?>
									</div>
								</div>
							</div>
							<?php } ?>
							
									
										<div class="col-sm-12" align="center">
											<a rel="<?php echo $admin_data['Admin']['id'] ?>" 
                                                        href="<?php echo $this->webroot.'admin/profile_edit/'.$admin_data['Admin']['id'];?>" model="Profile" class="btn btn-primary">Edit
                                                    </a> 

											<a href="<?php echo $this->webroot . 'admin/dashboard' ?>" class='btn btn-primary'>Back </a>
										</div>
					
