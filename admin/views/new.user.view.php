<?php require '../controller/sidebar.php'; ?>  


	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Create new user</h2>
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
										<span style="color:#fff;">Name</span>
										<input type="text" class="form__input" value="" name="user_name" placeholder="Name Please!" required="">
									</div>
                  <div class="col-12">
										<span style="color:#fff;">Email</span>
										<input type="text" class="form__input" value="" name="user_email" placeholder="Email Please!" required="">
									</div>
                  <div class="col-12">
                    <span style="color:#fff;">Role</span>
										<select class="js-example-basic-multiple" id="selectccc" name="user_role" required="">
                    <option value="" selected>Choose</option>
                    <option value="1">Admin</option>
                    <option value="2">Normal</option>
										</select>
                  </div>
                  <div class="col-12">
										<span style="color:#fff;">Password</span>
                    <input type="password" name="user_password" class="sign__input" placeholder="Password Please!" required>
									</div>
									<div class="col-12">
										<button type="sumbit" class="form__btn" name="save">save</button>
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
