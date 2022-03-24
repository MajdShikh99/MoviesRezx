	<!-- footer -->
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="footer__content">
						<a href="<?php echo $urlPath->home(); ?>" class="footer__logo">
						<h3 class="Logotext" style="color: #ff0000;font-size: 2.5rem;font-weight: 700;"><?php echo echoOutput($projectname); ?></h3>
						</a>

						<span class="footer__copyright"><span style="color: #fff;">
						    © <?php echo echoOutput($projectname); ?>, 2022-2023. <br>Create by <a href="<?php echo echoOutput($facebook_personal); ?>" target="_blank"><?php echo echoOutput($author); ?>
						</span></a></span>

						<nav class="footer__nav">
							<a href="privacy.php">Privacy policy</a>
							<a href="about.php">About Us</a>
						</nav>

						<button class="footer__back" type="button">
							<i class='bx bx-upvote' style='color:#ff0000'  ></i>
						</button>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- end footer -->

	<!-- JS -->
	<script src="<?php echo $urlPath->assets_js('jquery-3.5.1.min.js'); ?>"></script>
	<script src="<?php echo $urlPath->assets_js('bootstrap.bundle.min.js'); ?>"></script>
	<script src="<?php echo $urlPath->assets_js('owl.carousel.min.js'); ?>"></script>
	<script src="<?php echo $urlPath->assets_js('jquery.magnific-popup.min.js'); ?>"></script>
	<script src="<?php echo $urlPath->assets_js('jquery.mousewheel.min.js'); ?>"></script>
	<script src="<?php echo $urlPath->assets_js('jquery.mCustomScrollbar.min.js'); ?>"></script>
	<script src="<?php echo $urlPath->assets_js('wNumb.js'); ?>"></script>
	<script src="<?php echo $urlPath->assets_js('nouislider.min.js'); ?>"></script>
	<script src="<?php echo $urlPath->assets_js('plyr.min.js'); ?>"></script>
	<script src="<?php echo $urlPath->assets_js('photoswipe.min.js'); ?>"></script>
	<script src="<?php echo $urlPath->assets_js('photoswipe-ui-default.min.js'); ?>"></script>
	<script src="<?php echo $urlPath->assets_js('main.js'); ?>"></script>

</body>

</html>