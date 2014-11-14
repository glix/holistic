<?php get_header(); ?>
<?php while(have_posts()): the_post(); ?>
<section id="product" class="gradient-layer">
	<div class="container product-top-container">
		<div class="top-features">
			<a class="back" href="<?php echo home_url(); ?>/products"><i class="fa fa-chevron-left"></i>back to results</a>
			<p>You have selected the <?php the_title(); ?></p>
			<div class="btn-container">
				<a href="<?php echo home_url(); ?>/schedule" class="fancybox btn btn-default">Free Consultation</a>
				<a href="#" class="btn-arrow-blue">Buy Now for $2500</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5">
				<div class="product-slider">
					<div class="main-img">
						<!-- <img class="main-slide-img" src="images/main-product.png" data-large="images/large/main-product.png" alt="jQuery"/> -->
							<span class="zoom"><i></i>ZOOM IN</span>
							<?php 
								$image_attributes = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
							 ?>
						<a class="fancybox" href="<?php echo $image_attributes['0']; ?>">
							<span></span>
							 <img src="<?php echo $image_attributes['0']; ?>" class="main-image"  width="210" height="360"/>
						</a>
						<div class="below-image">
							<img src="<?php bloginfo('template_directory'); ?>/images/product-below-image.png" />
						</div>
					</div>
					<div class="tmb-caption bx-slider">
						<?php 
						$product_logo = get_post_meta($post->ID,'product_logo',true);
						$attachments = get_posts( array('post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'post__not_in' => array($product_logo)) );
						foreach ( $attachments as $attachment ) {
							$image = wp_get_attachment_image_src($attachment->ID,'full');
							echo '<div class="slide wp-caption slider-change-picture alignleft">
									<img src="'.$image[0].'" data-tmb-large="'.$image[0].'"/>				
							        </div>';
						} 
						$custom_field = get_post_custom($post->ID); 
						$keyspecs = unserialize($custom_field['review_specs']['0']);
						$videos = $keyspecs['video'];
						$img = get_bloginfo("template_directory").'/images/tab-pic1.png';
						foreach ($videos as $video) {
							echo '<div class="slide wp-caption alignleft">
									<a class="fancybox-media" rel="media-gallery" href="'.$video['url'].'">
										<div style="width:50px; height:50px; background:url('.$img.') 50% 50% no-repeat; border:1px solid #000;"></div>
							        </a></div>';
							        
							}
							?>
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<div class="product-tabs">
					<ul class="nav nav-tabs" role="tablist">
						<li class="description active" rel="des"><a class="btn" href="#description" role="tab" data-toggle="tab">Description</a></li>
						<li class="specifications" rel="spec"><a class="btn" href="#specifications" role="tab" data-toggle="tab">Specifications</a></li>
						<li class="review" rel="review"><a class="btn" href="#review" role="tab" data-toggle="tab">Review</a></li>
						<li class="shippingTerms" rel="ship"><a class="btn" href="#shippingTerms " role="tab" data-toggle="tab">Shipping terms</a></li>
						<li class="returns" rel="return"><a class="btn" href="#returns" role="tab" data-toggle="tab">Returns</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade in active product_read" id="description">
							<?php 
								$content = get_the_content();
								$des = preg_replace('/<img[^>]+./','', $content);
							 ?>
							 <p><?php echo $des; ?></p>
						</div>
						<div class="tab-pane fade in product_read" id="specifications">
							<div class="row">
								<div class="col-md-12">
									<?php 
										$fitness = $keyspecs['fitness'];
										$bone = $keyspecs['bone'];
										$detoxification = $keyspecs['detoxification'];
										$lymph_drainage = $keyspecs['lymph_drainage'];
									?>
									<div class="specs">
										<div class="key-spec specification-key">
											<h4>Key Specs </h4>
											<ul id="loadbar" class="spec-progressbar">
												<?php 
													for ($i=1; $i <=10 ; $i++) { 
														if ($i <= $fitness) {
															echo '<li><div id="layerFill'.$i.'" class="bar"></div></li>';
														} else {
															echo '<li><div id="layerFill"></div></li>';
														}
														
													}
													echo '<span class="key-spec-text">Fitness '.$fitness.'</span>';
												 ?>
											</ul>
											<ul id="loadbar" class="spec-progressbar">
												<?php 
													for ($i=1; $i <=10 ; $i++) { 
														if ($i <= $bone) {
															echo '<li><div id="layerFill'.$i.'" class="bar"></div></li>';
														} else {
															echo '<li><div id="layerFill"></div></li>';
														}
														
													}
													echo '<span class="key-spec-text">Bone Density '.$bone.'</span>';
												 ?>
											</ul>
											<ul id="loadbar" class="spec-progressbar">
												<?php 
													for ($i=1; $i <=10 ; $i++) { 
														if ($i <= $detoxification) {
															echo '<li><div id="layerFill'.$i.'" class="bar"></div></li>';
														} else {
															echo '<li><div id="layerFill"></div></li>';
														}
														
													}
													echo '<span class="key-spec-text">Bone Density '.$detoxification.'</span>';
												 ?>
											</ul>
											<ul id="loadbar" class="spec-progressbar">
												<?php 
													for ($i=1; $i <=10 ; $i++) { 
														if ($i <= $lymph_drainage) {
															echo '<li><div id="layerFill'.$i.'" class="bar"></div></li>';
														} else {
															echo '<li><div id="layerFill"></div></li>';
														}
														
													}
													echo '<span class="key-spec-text">Bone Density '.$lymph_drainage.'</span>';
												 ?>
											</ul>
										</div>
										<p><?php echo $custom_field['specification'][0]; ?></p>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade in " id="review">
							<div class="row">
								<div class="md-col-12">
									<div class="tab-inner-main">
										<div class="tab-inner-review">
											<div class="specs">
												<div class="starRate1">
													<span class="star-rating1">
														<?php 
														if ($keyspecs['link'] !=0) {
															for ($i=1; $i <=$keyspecs['link']; $i++) { 
																echo '<input type="radio" name="rating" value="'.$i.'"><i></i>';
															}
														}
														?>
													</span>
												</div>
												<div class="reviews">
													<img src="<?php bloginfo('template_directory'); ?>/images/review.png">
												</div>
											</div>
										</div>
										<span class="review product_read">
										<p>
											<?php
												$review_description = $custom_field['review_description']['0'];
											 echo $review_description;
											?>
										</p>
										</span>			
									</div>			  			
									<span class="quote-review">
										<span class="review-border"><img src="<?php bloginfo('template_directory'); ?>/images/border_hor.png"/></span>
										<h1>Consumer Review</h1>
										<p><?php echo $custom_field['consumer_reviews']['0']; ?></p>
									</span>			
								</div>
							</div>
						</div>
						<div class="tab-pane fade in product_read" id="shippingTerms">
							<p><?php echo $custom_field['shipping_terms']['0']; ?></p>
						</div>
						<div class="tab-pane fade in product_read" id="returns">
							<p><?php echo $custom_field['returns']['0']; ?></p>
						</div>
					</div>
				</div>
				<div class="col-md-4 specs-container">
					<div class="specs">
						<h4>Key Specs </h4>
						<ul id="loadbar" class="spec-progressbar1">
							<?php 
							for ($i=1; $i <=10 ; $i++) { 
								if ($i <= $fitness) {
									echo '<li><div id="layerFill'.$i.'" class="bar"></div></li>';
								} else {
									echo '<li><div id="layerFill"></div></li>';
								}

							}
							echo '<span class="key-spec-text">Fitness '.$fitness.'</span>';
							?>
						</ul>
						<ul id="loadbar" class="spec-progressbar1">
							<?php 
							for ($i=1; $i <=10 ; $i++) { 
								if ($i <= $bone) {
									echo '<li><div id="layerFill'.$i.'" class="bar"></div></li>';
								} else {
									echo '<li><div id="layerFill"></div></li>';
								}

							}
							echo '<span class="key-spec-text">Bone Density '.$bone.'</span>';
							?>
						</ul>
						<ul id="loadbar" class="spec-progressbar1">
							<?php 
							for ($i=1; $i <=10 ; $i++) { 
								if ($i <= $detoxification) {
									echo '<li><div id="layerFill'.$i.'" class="bar"></div></li>';
								} else {
									echo '<li><div id="layerFill"></div></li>';
								}

							}
							echo '<span class="key-spec-text">Bone Density '.$detoxification.'</span>';
							?>
						</ul>
						<ul id="loadbar" class="spec-progressbar1">
							<?php 
							for ($i=1; $i <=10 ; $i++) { 
								if ($i <= $lymph_drainage) {
									echo '<li><div id="layerFill'.$i.'" class="bar"></div></li>';
								} else {
									echo '<li><div id="layerFill"></div></li>';
								}

							}
							echo '<span class="key-spec-text">Bone Density '.$lymph_drainage.'</span>';
							?>
						</ul>
					</div>
					<a class="cust-tab more" rel="spec" href="#specifications">all specs</a>
				</div>
				<div class="col-md-4 specs-container">
					<div class="specs">
						<h4>Review</h4>
						<div class="starRate pull-r1ight">
							<span class="star-rating1">
								<?php 
								if ($keyspecs['link'] !=0) {
									for ($i=1; $i <=$keyspecs['link']; $i++) { 
										echo '<input type="radio" name="rating" value="'.$i.'"><i></i>';
									}
								}
								?>
							</span>
						</div>
						<div class="reviews">
							<img src="<?php bloginfo('template_directory'); ?>/images/review.png">
							<p><?php echo wp_trim_words($review_description, 15); ?></p>

						</div>
						<a href="#review" rel="review" class="cust-tab more">read review</a>
					</div>
				</div>
				<div class="col-md-4 specs-container">
					<div class="specs">
						<h4>Concerns</h4>
						<div class="concern">
							<a class="cust-tab" rel="ship" href="#shippingTerms">How much is shipping</a>
							<a href="#">Frequently asked questions</a>
							<a href="#">How can I get a discount</a>
							<a class="cust-tab" rel="return" href="#returns">Returns policy</a>
							<a href="#">How can I avoid a scam</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="mid-product-section">
			<div class="container">
				<div class="row">
					<div class="col-md-8 seperator-right">
						<div class="depth-analysis product_analysis_read">
							<h5><?php the_title(); ?> in depth analysis</h5>
							<div class="pull-right">
								<?php 
									$image_attributes = wp_get_attachment_image_src($product_logo);
								 ?>
								<img src=<?php echo $image_attributes[0]; ?> />
							</div>
							<p style="text-align:justify;"><?php echo $custom_field['analysis']['0']; ?></p>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="facts">
									<h5><?php the_title(); ?> facts</h5>
									<div class="facts-links">
										<?php 
										 $facts = $keyspecs['fact'];
										 $count = 0;
										 foreach ($facts as $fact) {
										 	echo '<a class="fancybox-inline" href="#facts-popup'.$count.'">'.$fact['title'].'</a>';
										 	?>
										 	<div id="facts-popup<?php echo $count++; ?>" style="display: none;">
										 		<h2><?php echo $fact['title']; ?></h2>
										 		<div class="facts-divider" style="display:block; text-align:center;"><img src="<?php bloginfo('template_directory') ?>/images/guide-bg.png"></div>
										 		<div class="facts-content"><?php echo $fact['desc'] ?></div>
										 	</div>
										 	<?php
										 }
										?>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="video-reviews">
									<h5>Top <?php the_title(); ?> video reviews</h5>
									<?php 
									$guide_arg = array(
										'post_type' => 'buyer_guide',
										'order' => 'ASC',
										'posts_per_page' => 3,
										);
									$query_guide1 = new WP_Query($guide_arg);
									while($query_guide1->have_posts()) : $query_guide1->the_post();
									 $id = $query_guide1->post->ID;
									?>
									<div class="tab-col">
										<a href="<?php the_permalink($id); ?>">
											<?php 
											$image_attributes = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'product-thumb');
											?>
											<img src="<?php echo $image_attributes[0]; ?>" />
											<div>
												<h5><?php echo get_the_title($id); ?></h5>
												<p><?php echo wp_trim_words(get_the_content($id),14); ?></p>
											</div>
										</a>
									</div>
								<?php endwhile; wp_reset_query() ?>
					  				<div class="text-right"><a href="<?php echo home_url(); ?>/buyers-guide">check out more videos</a></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 compare-border">
						<div class="compare-model">
							<h5>Compare <?php the_title(); ?> with any model</h5>
							<?php 
								$arg = array(
									'post_type' => 'product_manager',
									'order' => 'ASC',
									'orderby' => 'title',
									'posts_per_page' => -1
									);
								$query = new WP_Query($arg);
							 ?>
							<select class="select" id="productlist3">
								<option selected="selected" value="0">Choose Model</option>
								<?php 
									while($query->have_posts()) : $query->the_post();
									$id = $query->post->ID;
								 ?>
								 <option value="<?php echo $id ?>"><?php echo get_the_title($id); ?></option>
								<?php endwhile; wp_reset_query(); ?>
							</select>
							<a class="grey-arrow-btn button-link url>" href="<?php echo home_url(); ?>/compare-product?product1=<?php echo $post->ID; ?>&product2=">Compare</a>
						</div>
						<div class="common-comparison">
							<h5>Most common comparisons</h5>
							<?php 
								$arg_tex = array(
									'post_type' => 'comparison',
									'order' => 'desc',
									'posts_per_page'=> '3'
									);
								$query = new wp_Query($arg_tex);
								if($query->have_posts()) : 
									while($query->have_posts()) : $query->the_post();
								$custom_fields = get_post_custom($query->post->ID);
								$product_ids = unserialize($custom_fields['compare']['0']);
								// debug($product_ids);
								$product_1 = $product_ids['compare_product1_id'];
								$product_2 = $product_ids['compare_product2_id'];
							?>
							<a href="<?php echo home_url(); ?>/compare-product?product1=<?php echo $product_1.'&product2='.$product_2; ?>">
								<div class="comp-col">
								  <?php
								  	 $comparision_products_data = get_post_custom($product_1); 
								  	 $thumbnail_id = $comparision_products_data['_thumbnail_id']['0']; 
									 $image_attributes = wp_get_attachment_image_src($thumbnail_id);
								  ?>

									<div class="dark-col">
										<img src="<?php echo $image_attributes['0']; ?>" />
										<p><?php echo get_the_title($product_2); ?></p>
									</div>
									<div class="versus"><img src="<?php bloginfo('template_directory'); ?>/images/vs.png"></div>
									<?php
								  	 $comparision_products_data = get_post_custom($product_2); 
								  	 $thumbnail_id = $comparision_products_data['_thumbnail_id']['0']; 
									 $image_attributes = wp_get_attachment_image_src($thumbnail_id);
								  ?>
									<div class="light-col">
										<img src="<?php echo $image_attributes['0']; ?>" />
										<p><?php echo get_the_title($product_2); ?></p>
									</div>
								</div>
							</a>
						<?php endwhile; endif; ?>
							<div class="text-right"><a href="<?php echo home_url(); ?>/comparison">view all comparisons</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>
<?php endwhile; ?>
<script>
	$(document).ready(function(){
		var queryString = window.location.search;
		if(queryString!= '' && queryString == '?q=video'){
			$(".fancybox-media").trigger('click');
		}
	});
</script>
<?php get_footer(); ?>
