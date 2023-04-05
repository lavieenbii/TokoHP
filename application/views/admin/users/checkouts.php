<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body>
	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">
	<?php $this->load->view("admin/_partials/sidebar.php") ?>
		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>
					<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th >Name</th>
										<th>Product</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($checkouts as $checkout): ?>  
									<tr>
										<td>
											<?php echo $checkout->user ?>
										</td>
										<td>
											<?php echo $checkout->product ?>
										</td>
										<td align="center">
                                            <?php if ($checkout->admin_confirmation == 0): ?>
											    <a href="<?php echo site_url('admin/checkouts/confirm/'.$checkout->id) ?>" 
                                                    class="text-success btn btn-small">
                                                <i class="fas fa-check"></i> Confirm</a>
                                            <?php else: ?>
                                                <a href="<?php echo site_url('admin/checkouts/unconfirm/'.$checkout->id) ?>" 
                                                    class="text-danger btn btn-small">
                                                <i class="fas fa-trash"></i> Unconfirm</a>
                                            <?php endif; ?>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->
		</div>
		<!-- /.content-wrapper -->
		
	</div>
	<?php $this->load->view("admin/_partials/footer.php") ?>
	<script>
	function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script>
</body>
</html>

