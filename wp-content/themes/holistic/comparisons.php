<?php 
/*
Template Name: Comparison
*/

 get_header();
?>

<section id="comp-product">
	<div class="container">
		<div id="breadcrum">
			<a href="<?php echo home_url(); ?>" id="bread">Home</a> > All Comparisons
		</div>
	</div>
</section>

<section id="comparisons">
	<div class="container">
		<div class="col-md-4 text-center">
			<div class="compare-module">
				<p>Compare any two holistic vibration machine models:</p>
				<div class="msg"></div>
				<?php 
				$query = '';	
				$query_data = new WP_Query(array('post_type' =>'product_manager','orderby'=> 'title', 'order' => 'ASC'));

				?>
				<select class="select" name ="model1" id ="productlist1" style="width:200px;">
					<option>Choose Model</option>
				</select>
				<h2>VS</h2>
				<select class="select" name="model2" id ="productlist2" style="width:200px;" >
					<option selected="selected">Choose Model</option>
				</select>
				<div class="generate-btn"><a href="<?php echo get_permalink( get_page_by_path('compare-product'));?>" >Generate Comparison</a></div>
			</div>
		</div>
		<div class="col-md-8">
		<div class="row">
		<strong>Most Compared Product</strong>
		<span class="clearfix"></span>
		<?php 
			$terms = get_terms('comparison');
			// debug($terms);
			foreach ($terms as $value) :
				// if(!empty($terms)&& !is_wp_error( $terms )) :
		 ?>
		<div class="cust-md-2">
			<div class="compare-link">
				<a href="<?php echo home_url(); ?>/categorised-comparison?slug=<?php echo $value->slug; ?>">
					<img height="80px" src="<?php bloginfo('template_directory'); ?>/images/product1.png">
					<p><?php echo $value->name; ?></p>
				</a>
			</div>
		</div>
	<?php //endif; 
	endforeach; ?>
	</div>
	</div>
	</div>
</section>
<section id="product-slider">
	<div class="container">
		<div class="row">
			<?php 
				$args = array(
					'post_type'=>'product_manager',
					'order' => 'ASC',
					'post_per_page' => -1
					);
			?>
			<div class="col-ctm-3">
				<div style="height:275px;"></div>
				<table class="table table-hover table-striped table-bordered table-responsive">
					<tr><th colspan="3" class="row-title">Spec Comparisons</th></tr>
					<tr>
						<th class="table-head">Watts</th>
					</tr>
					<tr>
						<th class="table-head"> HP</th>
					</tr>
					<tr>
						<th class="table-head">Gforce </th>
					</tr>
					<tr>
						<th class="table-head">Amplitude</th>
					</tr>
					<tr>
						<th class="table-head"> Durability</th>
					</tr>

					<tr><th colspan="3" class="row-title">Health Performance Comparison Rating</th></tr>

					<tr>
						<th class="table-head">Bone Health</th>
					</tr>

					<tr>
						<th class="table-head"> circulation </th>			
					</tr>

					<tr>
						<th class="table-head">Lymphatic </th>			
					</tr>
					<tr>
						<th class="table-head">Fitness, </th>
					</tr>
					<tr>
						<th class="table-head"> Detoxification </th>
					</tr>
					<tr>
						<th class="table-head"> Weightloss </th>
					</tr>
					<tr>
						<th class="table-head">Pain relief Consumer Review</th>
					</tr>
					<tr>
						<th class="table-head">Consumer Reviews</th>

					</tr>
				</table>
			</div>
			 <div class="col-ctm-9">
				<table class="table table-hover table-striped table-bordered table-responsive" style="margin-bottom:0; width: 1000px;">
					<tr>
						<?php $arg = array(
								'post_type' => 'product_manager',
								'order' => 'ASC',
                				 'post_status' => 'publish',
								  'posts_per_page' => -1,
								  'caller_get_posts'=> 1
							);
							$query = new wp_Query($arg);
							$posts = $query->get_posts();
							$count = 0;
							foreach ($posts as $post) {

								$count++;
								$reviews = get_post_custom_values('consumer_reviews',$post->ID);
								$review[] = $reviews['0'];
								$custom_fields =(get_post_custom($post->ID));
							 	$review_values = unserialize($custom_fields['review_specs']['0']);
							 	$watt[] = $review_values['watt'];
							 	$hp[] = $review_values['hp'];
							 	$gforce[] = $review_values['gforce'];
							 	$amplitude[] = $review_values['amplitude'];
							 	$durability[] = $review_values['durability'];
							 	$bone_health[] = $review_values['bone_health'];
							 	$circulation[] = $review_values['circulation'];
							 	$cr_fitness[] = $review_values['cr_fitness'];
							 	$lymphatic[] = $review_values['lymphatic'];
							 	$cr_detoxification[] = $review_values['cr_detoxification'];
							 	$weightloss[] = $review_values['weightloss'];
							 	$pain_relief_consumer_review[] = $review_values['pain_relief_consumer_review'];

							 	$video_url = !empty($custom_fields['video_url']['0']) ? $custom_fields['video_url']['0'] : '';


								if ( has_post_thumbnail() ) { 
										echo "<td class=table-head style ='height:250px;'>";
										$image_attributes =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'product-thumb' );

										if ($image_attributes) {	
										  	 	echo  '<img src="'.$image_attributes[0].'"/>';
										 }
										else {
												echo "<div style ='height:150px;width:150px;'>";
										}
										echo '<h5 class="pro-title">';
										echo $post->post_title;
										echo "</h5>";?>
										<div class="starRate1">
											<span class="star-rating1">
												<?php 
													if ($review_values['link'] !=0) {
														for ($i=1; $i <=$review_values['link']; $i++) { 
															echo '<input type="radio" name="rating" value="'.$i.'"><i></i>';
														}
													}
												 ?>
											</span>
										</div>
										<?php 
											if (!empty($video_url)) {
											
												echo '<span id="video-demo">
														<a class="fancybox-media" rel="media-gallery" href='.$video_url.'><i class="fa fa-youtube-play"></i> VIDEO DEMO</a>
													</span>'	;
											} 
										echo "</td>";
									} else {
										echo "<td class='table-head'><div style=height:150px'></div>";
										echo '<h5 class="pro-title">';
										echo $post->post_title;
										echo "</h5>";
										echo "</td>"	;
									}
							}
							 ?>
						
					</tr>
					<tr><th colspan="<?php echo $count; ?>?php echo $count; ?>" class="row-title" style="height:38px;margin-top:5px;"></th></tr>

					<tr style ="width=150px;">
						<?php comparison_feature($watt); ?>
					</tr>
					<tr>
						<?php comparison_feature($hp); ?>
						
					</tr>
					<tr>
						<?php comparison_feature($gforce); ?>
						
					</tr>
					<tr>
						<?php comparison_feature($amplitude); ?>
						
					</tr>

					<tr>
						<?php comparison_feature($durability); ?>
						
					</tr>
				
					<tr><th colspan="<?php echo $count; ?>" class="row-title" style="height:60px;"></th></tr>

					<tr>
						<?php comparison_feature($bone_health); ?>
						
						
					</tr>
					<tr>
						<?php comparison_feature($circulation); ?>
						
						
					</tr>

					<tr>
						<?php comparison_feature($lymphatic); ?>
						
						
					</tr>
					<tr>
						<?php comparison_feature($cr_fitness); ?>
						
					</tr>
					<tr>


						<?php comparison_feature($cr_detoxification); ?>
						
					</tr>
					<tr>
						<?php comparison_feature($weightloss); ?>
						
					</tr>
					<tr>
						<?php comparison_feature($pain_relief_consumer_review); ?>
						
					</tr>
					<tr>
						<?php	
						foreach ($review as $single_consumer_reviews) {
							if ($single_consumer_reviews != '') {
								echo '<td class="table-data  read-more">';
								echo '<p>'.$single_consumer_reviews.'</p>';
								echo "</td>";
							}
							else{
								echo '<td class="table-data">';
								echo "</td>";
							}
						}
					?>	
						
					</tr>
				</table>
			
			</div>

			
		</div>
	</div>
</section>
<?php get_footer(); ?>