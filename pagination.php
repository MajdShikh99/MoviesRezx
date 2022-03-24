
<?php 

$pageNum = getNumPage();

?>

<?php echo _PAGE . $pageNum." - ".$numPages; ?>


<?php if ($numPages > 1): ?>

    <div class="row">
				<!-- paginator -->
				<div class="col-12">
					<ul class="paginator">

                        <?php if ($pageNum > 3): ?>
						<li class="paginator__item paginator__item--active"><a href="<?php echo goToPage("p", "1"); ?>">1</a></li>
                        <?php endif; ?>
                        <?php if ($pageNum-2 > 0): ?>
						<li class="paginator__item"><a href="<?php echo goToPage("p", $pageNum-2); ?>"><?php echo $pageNum-2 ?></a></li>
                        <?php endif; ?>
                        <?php if ($pageNum-1 > 0): ?>
						<li class="paginator__item"><a href="<?php echo goToPage("p", $pageNum-1); ?>"><?php echo $pageNum-1 ?></a></li>
                        <?php endif; ?>
                        
						<li class="paginator__item"><a href="#"><?php echo $pageNum ?></a></li>
                        <?php if ($pageNum < $numPages): ?>
                        <li class="paginator__item">
							<a href="<?php echo goToPage("p", $pageNum+1); ?>"><?php echo $pageNum+1 ?></a>
						</li>			
                        <?php endif; ?>

    
					</ul>
				</div>
				<!-- end paginator -->
			</div>
		</div>
	</div>


    <?php endif; ?>


	