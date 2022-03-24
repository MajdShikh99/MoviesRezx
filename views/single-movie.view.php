
	<!-- details -->
	<section class="section section--details section--bg" style="margin-top: -1rem; ">
		<!-- details content -->
		<div class="container">
			<div class="row">

            <?php if(!isWatch()): ?>
				<!-- title -->
				<div class="col-12">
					<h1 class="section__title section__title--mb"><?php echo echoOutput($itemDetails['movie_title']); ?></h1>
				</div>
				<!-- end title -->

				<!-- content -->
				<div class="col-12 col-xl-6">
					<div class="card card--details">
						<div class="row">
							<!-- card cover -->
							<div class="col-12 col-sm-5 col-md-4 col-lg-3 col-xl-5">
								<div class="card__cover">
									<img src="<?php echo $urlPath->image($itemDetails['movie_image']); ?>" alt="">
									<span class="card__rate card__rate--red">
                                        <?php foreach($movieStars as $item): ?>
                                            <a><?php echo $item; ?></a>
                                        <?php endforeach; ?>
                                    </span>
								</div>

                                <a href="<?php echo gotToWatch(); ?>" class="card__trailer2">Watch Movie</a>
                                </a>

							</div>
							<!-- end card cover -->

							<!-- card content -->
							<div class="col-12 col-md-8 col-lg-9 col-xl-7">
								<div class="card__content">
									<ul class="card__meta">
										<li><span>Genre:</span>
										<a href="#">
											<?php echo echoOutput($itemDetails['movie_genree']); ?>
                                        </a>
									    </li>
										<li><span>Release year:</span> <?php echo echoOutput($itemDetails['movie_year']); ?></li>
										<li><span>Running time:</span> <?php echo echoOutput($itemDetails['movie_duration']); ?></li>
									</ul>
									<div class="card__description"><span><?php echo echoOutput($itemDetails['movie_description']); ?></span></div>
								</div>
							</div>
							<!-- end card content -->
						</div>
					</div>
				</div>
				<!-- end content -->

				<!-- player -->
				<div class="col-12 col-xl-6">
                <?php if(!isWatch()): ?>
                    <div class="plyr__video-embed" id="player">
                        <iframe
                        src="https://www.youtube.com/embed/<?php echo $itemDetails['trailer']; ?>?modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
                        allowfullscreen
                        allowtransparency
                        allow="autoplay"
                        ></iframe>
                    </div>
				</div>
				<!-- end player -->
                <?php endif; ?>
			</div>
            <?php endif; ?>
		</div>
		<!-- end details content -->
	</section>
	<!-- end details -->
                        
    <?php require 'player.php'; ?>
