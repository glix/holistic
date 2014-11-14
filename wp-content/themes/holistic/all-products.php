<?php
/*
Template Name: All Products Template
*/
get_header();
?>
<section id="all-products">
	<div class="container">
		<div id="breadcrum">
			<a href="<?php echo home_url(); ?>" id="bread">Home</a> > Products
		</div>

		<!-- <div id="the-title">
			<span><h5>Products</h5></span>
		</div> -->

		<div class="col1">
			<strong>Sort reviews by: </strong>Editors Rating 
			<div class="starRate">
				<span class="star-rating">
					<input type="radio" class="one" name="all-rating" value="1"><i></i>
					<input type="radio" class="one" name="all-rating" value="2"><i></i>
					<input type="radio" class="one" name="all-rating" value="3"><i></i>
					<input type="radio" class="one" name="all-rating" value="4"><i></i>
					<input type="radio" class="one" name="all-rating" value="5"><i></i>
				</span>
			</div>
		</div>
		<div class="col2">
			<span>Medical condition</span>
			<?php
			$terms = get_terms('medical_conditions', array(
				'orderby' => 'name',
				'order' => 'ASC',
				'hide_empty' => false
				));
				?>
			<select class="select all-product-medicol-condition"  style="width:150px;">
				<option value="0"> Choose One -  </option>
				<?php 
				foreach ($terms as $term) {
					$termSlug = $term->slug;
					$termId = $term->id;
					echo "<option value=$term->slug>";
					echo $term->name;
					echo "</option>";
				}	
				?>
			</select>
		</div>
		<div class="col3 product-col3-hide" >
			<span>Get Educated:</span>
			<a href="#">Facts & Guide</a>
		</div>
		<div class="preload-image"></div>
		<div class="row" id ="product-row">
			<?php 
				$arg = array(
					'post_type' =>'product_manager',
					'order' => 'ASC',
					'posts_per_page'=>-1
				);
				$args = array();
				if (isset($_GET['rating'])) {
					$rating = $_GET['rating'];
					$args = array(
								'meta_key' => 'review-star',
								'meta_value' => $rating
							);	
				}elseif (isset($_GET['medicol_condition'])) {

					$medicol_condition = $_GET['medicol_condition'];
					$args = array(
		                'tax_query' => array(
		                      		array(
			                            'taxonomy' => 'medical_conditions',
			                            'field'    => 'slug',
			                            'terms'    => $medicol_condition,
		                            )
		                    	)
		               		 );

				} 
				?>
				<div class="product-slider" id="all-product">
								<ul id="product-list-wrapper">	
									<?php
				$merge_arg = array_merge($arg,$args);
				$query = new WP_Query($merge_arg);
				if ( $query->have_posts() ) {
					//$i = 1;
					while ( $query->have_posts() ) : $query->the_post();

						$product_logo = get_post_meta(get_the_ID(),'product_logo',true);
						$image_attributes = wp_get_attachment_image_src($product_logo);
						$metaBox = get_post_custom(get_the_ID());
						$all_metaBox_values = unserialize($metaBox['review_specs']['0']);
			?>	
						<?php //if($i == 1): ?>

							
						<?php //endif; ?>
									<li>
										<a href="<?php the_permalink(); ?>">
											<?php
												if ( has_post_thumbnail() ) { 
													the_post_thumbnail('product-thumb');
												} else {
													echo "<div style='width:150px;height:150px'></div>"	;
												}
											?>
											<div class="featured-overlay">
												<h5><?php the_title(); ?></h5>
												<?php
													if ($image_attributes) :
														echo '<div><img src="'.$image_attributes[0].'"></div>';
													endif;
												?>
												<ul>
													<?php if (isset($all_metaBox_values['fitness'])) {
														echo "<li>Fitness ". $all_metaBox_values['fitness']."</li>";	
													} ?>	
													<?php if (isset($all_metaBox_values['bone'])) {
														echo "<li> Bone density ". $all_metaBox_values['bone']."</li>";
													} ?>
													<?php if (isset($all_metaBox_values['detoxification'])) {
														echo "<li> Detoxification ". $all_metaBox_values['detoxification']."</li>";
													} ?>
													<?php 
													if (isset($all_metaBox_values['lymph_drainage'])) {
														echo "<li> Lymph Drainage ".$lymph_drainage."</li>";
													}
													?>
												</ul>
											</div>
										</a>
										<div class="info">
											<a href="<?php the_permalink(); ?>?q=video"><i class="fa fa-youtube-play"></i>VIDEO DEMO</a>
											<a href="<?php the_permalink(); ?>"><i class="fa fa-info-circle"></i>MORE INFO</a>
										</div>	
									</li>
						<?php
							// $i++; 
							// if($i == 7): 
							// 	$i = 1;
						?>
								
						<?php //endif; ?>
					<?php endwhile; ?>

			<?php } ?>
			</ul>
							</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>