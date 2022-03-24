<?php require '../controller/sidebar.php'; ?>  


	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>General Settings</h2>
					</div>
				</div>
				<!-- end main title -->

				<!-- form -->
				<div class="col-12">
					<form class="form" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="formSettings">
						<div class="row row--form">
							<div class="col-12 col-md-7 form__content">
								<div class="row row--form">
									<div class="col-12">
										<span style="color:#fff;">Site Name</span>
										<input type="text" class="form__input" value="<?php echo $settings['st_sitename']; ?>" name="st_sitename" placeholder="Site Name">
									</div>
									<div class="col-12">
									<span style="color:#fff;">Logo Name</span>
										<input type="text" class="form__input" value="<?php echo $settings['projectname']; ?>" name="projectname" placeholder="Logo Name">
									</div>
								    <div class="col-12">
									    <span style="color:#fff;">Description</span>
										<textarea class="form__textarea" name="st_description"><?php echo $settings['st_description']; ?></textarea>
									</div>
									<div class="col-12">
									    <span style="color:#fff;">Link Facebook Personal</span>
										<input type="text" class="form__input" value="<?php echo $settings['facebook_personal']; ?>" name="facebook_personal" placeholder="Link please!">
									</div>
									<div class="col-12">
									    <span style="color:#fff;">Author</span>
										<input type="text" class="form__input" value="<?php echo $settings['author']; ?>" name="author" placeholder="Creator!">
									</div>
									<div class="col-12">
									    <span style="color:#fff;">Keywords...</span>
										<input type="text" class="form__input" value="<?php echo $settings['st_keywords']; ?>" name="st_keywords" placeholder="Keywords...">
									</div>
									<div class="col-12">
										<button type="sumbit" class="form__btn" name="save">publish</button>
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
