  
	<!-- details -->
		<!-- details content -->
                <?php if(isWatch()): ?>
				<!-- player -->
				<div class="fullscreen col-12 col-xl-6">
                    <div class="plyr__video-embed" id="player">
                        <iframe
                        src="<?php echo echoOutput($itemDetails['link']); ?>"
                        style="position:fixed; top:0; left:0; bottom:0; right:0; width:100%; height:100%; border:none; margin:0; padding:0; overflow:hidden; z-index:999999;"                        allowfullscreen
                        allowtransparency
                        allow="autoplay"
                        ></iframe>
                    </div>
				</div>
				<!-- end player -->
                <?php endif; ?>

