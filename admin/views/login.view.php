<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- authorization form -->
                        <form class="sign__form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="login" id="needs-validation" novalidate>  
							<a href="index.html" class="sign__logo">
								<h3 class="Logotext" style="color: #ff0000;font-size: 2.5rem;font-weight: 700;">REZX</h3>
							</a>

							<div class="sign__group">
								<input type="text" name="user_email" class="sign__input" placeholder="Admin Email" required>
							</div>

							<div class="sign__group">
								<input type="password" name="user_password" class="sign__input" placeholder="Admin Password" required>
							</div>
							
							<button class="sign__btn" type="submit">Sign in</button>

                            <?php if( !empty($errors)): ?>

   
                            <?php echo $errors; ?>
                            <?php endif; ?>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
