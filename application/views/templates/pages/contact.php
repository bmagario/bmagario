<section id="contact" class="pd-75" data-scroll-item-index=5>
	<div class='container flex'>
		<div class='animatedParent animateOnce' data-sequence='500'>
      <h1 class='section-title-separator animated fadeInLeft slower' data-id='1'>Contact</h1>
    </div>
		<div class='section-line-separator'></div>
		
		<div class="container pd-25">
		
				<div class="row">
						<div class="col-lg-5 col-sm-6 sm-padding text-left">
								<h2>Feel free to contact me</h2>
								<ul class="contact-info list-unstyled mb-0">
										<li>
												<i class="fas fa-phone"></i>
												<span> Phone: +54 2915 225083</span>
										</li>
										<li>
												<i class="fas fa-envelope fa"></i>
												<span> Email: support@bmagario.com</span>
										</li>
										<li>
												<i class="fas fa-map-marker fa"></i>
												<span> Location: Bahía Blanca, Argentina.</span>
										</li>
								</ul>
						</div>
						<div class="col-lg-7 col-sm-6 sm-padding">
								<form id="contact-form" class="contact-form">

								<div class="messages"></div>

										<div class="controls">
												<div class="row">
														<div class="col-lg-6">
																<div class="form-group">
																		<label for="form_name">Name *</label>
																		<input id="form_name" type="text" name="name" class="form-control" placeholder="" required="required"
																				data-error="Name is required.">
																		<div class="help-block with-errors text-danger"></div>
																</div>
														</div>
														<div class="col-lg-6">
																<div class="form-group">
																		<label for="form_email">Email *</label>
																		<input id="form_email" type="email" name="email" class="form-control" placeholder="" required="required"
																				data-error="Valid email is required.">
																		<div class="help-block with-errors text-danger"></div>
																</div>
														</div>
												</div>
												<div class="form-group">
														<label for="form_message">Message *</label>
														<textarea id="form_message" name="message" class="form-control" placeholder="" rows="4" required="required"
																data-error="Please, send me a message."></textarea>
														<div class="help-block with-errors text-danger"></div>
												</div>


												<div class="form-group">
														<div class="g-recaptcha" data-sitekey="<?php echo RECAPTCHA_PUBLIC ;?>" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
														<input class="form-control d-none" data-recaptcha="true" required data-error="Please complete the Captcha">
														<div class="help-block with-errors text-danger"></div>
												</div>

												<input type="submit" class="btn my-btn" value="Send message">

										</div>

								</form>

						</div>
				</div>

		</div>
	</div>
</section>
