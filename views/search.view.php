
	<!-- content -->
	<section class="content" style="margin-top: 6%;">
		<div class="content__head">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- content title -->
						<h2 class="content__title">Result:</h2>
						<!-- end content title -->

						<!-- content tabs nav -->
						<ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
							<li class="nav-item">
							</li>
						</ul>
						<!-- end content tabs nav -->

						<!-- content mobile tabs nav -->
						<div class="content__mobile-tabs" id="content__mobile-tabs">


							<div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
								<ul class="nav nav-tabs" role="tablist">
								</ul>
							</div>
						</div>
						<!-- end content mobile tabs nav -->
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<!-- content tabs -->
            <?php if (!empty($qResults)):?>
			<div class="tab-content">
				<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
					<div class="row row--grid">
                    <?php foreach($qResults as $item): ?>
						<!-- card -->
						<div class="col-6 col-sm-4 col-md-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="<?php echo $urlPath->image($item['image']); ?>" alt="">
									<a href="<?php echo $urlPath->movie($item['id'], $item['slug']); ?>" class="card__play">
									<i class='bx bx-play' ></i>
									</a>
								</div>
                                <?php if ($item['type'] == 'movie'):?>
								<div class="card__content">
									<h3 class="card__title"><a href="<?php echo $urlPath->movie($item['id'], $item['slug']); ?>"><?php echo echoOutput($item['title']); ?></a></h3>
								</div>
                                <?php endif; ?>
								<span class="card__category">
									<a href="#"><?php echo echoOutput($item['year']); ?></a>
								</span>
							</div>
						</div>
						<!-- end card -->
						<?php endforeach; ?>
					</div>
				</div>
			</div>
            <?php endif; ?>
			<!-- end content tabs -->
            <?php if (!empty($errors)):?>
                <?php echo $errors; ?>
            <?php endif; ?>

		</div>
	</section>
	<!-- end content -->



				
