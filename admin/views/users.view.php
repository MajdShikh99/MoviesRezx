<?php require '../controller/sidebar.php'; ?>  

	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Users</h2>

						<div class="main__title-wrap">
                            <a href="<?php echo _SITE_URL ?>/admin/controller/new_user.php" class="main__title-link">add user</a>

						</div>
					</div>
				</div>
				<!-- end main title -->
<style>
label {
    display: inline-block;
    margin-bottom: 0.5rem;
    color: #fff;
    background: transparent;
    border-radius: 44px;
    padding: 0px 15px;
}
.page-link {
    color: #fff;
    background-color: transparent;
    border: 1px solid #fff;
    margin-bottom: 25%;
}
.form-control:not(.custom-select) {
    color: #fff;
    border: transparent;
    margin-left: 15px;
}

.form-control:not(.custom-select):hover {
    border: 1px solid #ff0000;
}
.page-item.active .page-link {
    z-index: 2;
    color: var(--white-color);
    background-color: red;
}
.main__table tbody td {
    color: #fff;
}
div#DataTables_Table_0_info {
    color: #fff;
}
</style>
				<!-- users -->
				<div class="col-12">
					<div class="main__table-wrap">
						<table data-table="data-table" class="main__table" style="color: #fff;">
							<thead>
                                <tr>
								    <th>Id</th>
								    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
							<tbody>
									<?php foreach($users as $user): ?>
									<tr>
										<td>
											<div class="main__table-text"><?php echo echoOutput($user['user_id']); ?></div>
										</td>
										<td>
											<div class="main__table-text"><?php echo echoOutput($user['user_name']); ?></div>
										</td>
										<td>
											<div class="main__table-text"><?php echo echoOutput($user['user_email']); ?></div>
										</td>
										<td>
											<div class="main__table-text">
												<?php
                                                    $status = $user['user_role'];
                                                    if ($status == 1) {
                                                        echo 'Admin';
                                                    }else{
                                                        echo 'Normal';
                                                    }
                                                ?>
											</div>
										</td>
										<td>	
											<div class="main__table-text">
											    <?php
                                                    $status = $user['user_status'];
                                                    if ($status == 1) {
                                                        echo 'Active';
                                                    }else{
                                                        echo 'Inactive';
                                                    }
                                                ?>
											</div>
										</td>
										<td>
											<a href="<?php echo _SITE_URL ?>/admin/controller/edit_user.php?id=<?php echo $user['user_id']; ?>" class="main__table-btn main__table-btn--edit">
												<i class="bx bx-edit-alt" style="color: #ff0000;"></i>
											</a>

										</td>
                                    </tr>
                                    <?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- end users -->

			</div>
		</div>
	</main>
	<!-- end main content -->

<script>

    // - Activate Data Tables
    $('[data-table="data-table"]').DataTable({ buttons: ['copy', 'excel', 'pdf'] });

</script>
