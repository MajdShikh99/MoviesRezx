<?php require '../controller/sidebar.php'; ?>  


	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Create new genre</h2>
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
										<span style="color:#fff;">Genre Name</span>
										<input type="text" class="form__input" value="" name="genre_title" placeholder="Genre Please!" required="">
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
