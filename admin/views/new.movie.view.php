<?php require '../controller/sidebar.php'; ?>  

	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Add new movie</h2>
					</div>
				</div>
				<!-- end main title -->

				<!-- form -->
				<div class="col-12">
					<form enctype="multipart/form-data" class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
						<div class="row row--form">
							<div class="col-12 col-md-5 form__cover">
								<div class="row row--form">
									<div class="col-12 col-sm-6 col-md-12">
										<div class="form__img">
											<label for="form__img-upload">Upload cover (270 x 400)</label>
											<input id="form__img-upload" type="file" accept=".png, .jpg, .jpeg" name="movie_image">
											<img id="form__img" src="#" alt=" ">
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-7 form__content">
								<div class="row row--form">
									<div class="col-12">
									    <span style="color:#fff;">Movie name</span>
										<input type="text" name="movie_title" class="form__input" placeholder="Title" required="">
									</div>

									<div class="col-12">
								    	<span style="color:#fff;">Story</span>
										<textarea id="text" name="movie_description" class="form__textarea" placeholder="Description"></textarea>
									</div>

									<div class="col-12 col-sm-6 col-lg-3">
									    <span style="color:#fff;">Year</span>
										<input class="form__input" placeholder="Release year" name="movie_year" type="text" required="">
									</div>

									<div class="col-12 col-sm-6 col-lg-3">
									    <span style="color:#fff;">Duration</span>
										<input value="" name="movie_duration" type="text" class="form__input" placeholder="Running timed in minutes" required="">
									</div>
									<div class="col-12 col-sm-6 col-lg-3">
									    <span style="color:#fff;">Genres 2</span>
										<input type="text" class="form__input" placeholder="Genres 2 out" value="" name="movie_genree" required="">
									</div>
									<div class="col-12 col-sm-6 col-lg-3">
									    <span style="color:#fff;">Rating</span>
										<input type="text" class="form__input" placeholder="Rating" value="" name="movie_stars" required="">
									</div>
									<div class="col-12 col-lg-6">
									    <span style="color:#fff;">Genres</span>
										<select class="js-example-basic-multiple" id="genre" multiple="multiple" name="movie_genre[]" required="">
										    <?php foreach($genres as $genre): ?>
                                            <option value="<?php echo $genre['genre_id']; ?>"><?php echo $genre['genre_title']; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="col-12 col-lg-6">
										<span style="color:#fff;">Featured</span>
										<select class="js-example-basic-multiple" id="selectccc" name="movie_featured" required="">
										   <option value="1">Yes</option>
										   <option value="0">No</option>
										</select>
									</div>
									<div class="col-12 col-lg-6">
									    <span style="color:#fff;">Status</span>
										<select class="js-example-basic-multiple" id="selectccc2" name="movie_status" required="">
										   <option value="0">Draft</option>
										   <option value="1" selected="">Publish</option>
										</select>
									</div>
									</select>
								</div>
							</div>

							<div class="col-12">
								<div class="row row--form">

									<div class="col-12">
										<input type="text" class="form__input" placeholder="Trailer ID Youtube.." name="movie_trailer" required="">
									</div>
									
									<div class="col-12">
										<input type="text" class="form__input" placeholder="Link Video Embed.." name="movie_link" required="">
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

