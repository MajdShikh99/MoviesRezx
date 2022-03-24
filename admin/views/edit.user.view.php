<?php require '../controller/sidebar.php'; ?>  

	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Edit user</h2>
					</div>
				</div>
				<!-- end main title -->

				<!-- form -->
				<div class="col-12">
					<form class="form" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
						<div class="row row--form">
							<div class="col-12 col-md-7 form__content">
								<div class="row row--form">
									<div class="col-12">
                    <input type="hidden" value="<?php echo $usr['user_id']; ?>" name="user_id">
										<span style="color:#fff;">Name</span>
										<input type="text" class="form__input" value="<?php echo $usr['user_name']; ?>" name="user_name" placeholder="Edit Name!">
									</div>
                  <div class="col-12">
										<span style="color:#fff;">Email</span>
										<input type="text" class="form__input" value="<?php echo $usr['user_email']; ?>" name="user_email" placeholder="Edit Email!">
									</div>
									<div class="col-12">
                    <span style="color:#fff;">Status</span>
										<select class="js-example-basic-multiple" id="selectccc" name="user_status" required="">
                    <?php
                      $i = $usr['user_status'];
                      if($i == 1)
                      {
                        echo '<option value="'.$usr['user_status'].'" selected="selected">Active</option>';
                        echo '<option value="0">Inactive</option>';

                      }
                      else
                      {
                        echo '<option value="'.$usr['user_status'].'" selected="selected">Inactive</option>';
                        echo '<option value="1">Active</option>';
                      }
                    ?>
										</select>
                  </div>
                  <div class="col-12">
										<span style="color:#fff;">Password</span>
                    <input class="sign__input" type="password" name="user_password" placeholder="Edit Password!">
									</div>
									<div class="col-12">
										<button type="sumbit" class="form__btn" name="save">save edit</button>
									</div>
									<div class="col-12">
                    <p style="margin-top:3%;font-size: 13px; font-weight: 300;color: #fff;"><b style="font-size: 13px;">Date of registration: </b> <?php echo FormatDate($usr['user_created']); ?> · <b style="font-size: 13px;">Latest update: </b> <?php echo FormatDate($usr['user_updated']); ?></p>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				<!-- end form -->
			</div>
		</div>
	</main>
	<!-- end main content -->
