<?php get_header(); ?> 
<!-- Main Container Start -->
<?php 
	$arg = array(
			'post_type' =>'product_manager',
			'order' => 'ASC'
		);
	$query = new WP_Query($arg);
	$posts = $query->get_posts();		
?>
	<section id="mainSlider">
		<div class="container">
			<div class="col1">
				<strong>Sort reviews by:</strong>Editors Rating 
				<!-- <img src="<?php echo IMAGES ?>/rating.png"> -->
				<div class="starRate">
					<span class="star-rating">
						<input type="radio" class="one" name="rating" value="1"><i></i>
						<input type="radio" class="one" name="rating" value="2"><i></i>
						<input type="radio" class="one" name="rating" value="3"><i></i>
						<input type="radio" class="one" name="rating" value="4"><i></i>
						<input type="radio" class="one" name="rating" value="5"><i></i>
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
			<select class="select" id="productlist" style="width:150px;">
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
			<div class="row">
				<div class="product-slider">
					<div id="productCarousel" class="everslider">  
						<ul class="es-slides" id="product_list_wrapper">  
							<?php 
							foreach($posts as $post) :

							   ?>
						    <li class="product-list">
								<a href="#">
									<?php 
										if ( has_post_thumbnail() ) { 
												the_post_thumbnail('product-thumb');
											} else {
												echo "<div style='width:150px;height:150px'></div>"	;
											}
									$metaBox = get_post_custom($post->ID);
									$all_metaBox_values = unserialize($metaBox['review_specs']['0']);
									?>
									<?php 
									$product_logo = get_post_meta($post->ID,'product_logo',true);
									 ?>
									<div class="featured-overlay">
										<h5><?php echo $post->post_title; ?></h5>
										<?php 
											$image_attributes = wp_get_attachment_image_src($product_logo);

											if ($image_attributes) :
												// debug($image_attributes);
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
									<a href="#"><i class="fa fa-youtube-play"></i>VIDEO DEMO</a>
									<a href="#"><i class="fa fa-info-circle"></i>MORE INFO</a>
								</div>
							</li>   

							<?php endforeach;?> 

						</ul>
					</div>
				</div>
				<div class="view-all-products"><a href="#">view all reviews</a></div>
			</div> 
		</div>
	</section>
	<section id="comparisons">
		<div class="container">
			<h5>Explore Comparisons</h5>
			<div class="row">
				<div class="col-md-4 text-center">
					<div class="compare-module">
						<p>Compare any two holistic vibration machine models:</p>
						<?php 
							$query = '';	
							$query_data = new WP_Query(array('post_type' =>'product_manager','order' => 'ASC'));
									
						?>	
						<?php  ?>
							
							<select class="select" name ="model1" id ="productlist1" style="width:200px;">
								<option>Choose Model</option>
							</select>
							<h2>VS</h2>
							<select class="select" name="model2" id ="productlist2" style="width:200px;" >
								<option selected="selected">Choose Model</option>
							</select>
							<div class="generate-btn"><a href="<?php echo get_permalink( get_page_by_path( 'compare-product' ) );?>	" >Generate Comparison</a></div>

					</div>
				</div>
				<div class="col-md-8">
					<div class="row center-div">
						<?php 
							$query = '';

							$args = array(
									'post_type' =>'comparison',
									'orderby' =>'rand',
									'order' => 'DESC',
									'posts_per_page' => '3'
								);

							$query = new WP_Query($args);
							$all_compares = $query->get_posts();						    
							foreach ($all_compares as $compare_key => $compare) :?>
								<?php

								 $custom_fields = get_post_custom($compare->ID); 
								$product_ids = unserialize($custom_fields['compare']['0']);
								?>
							<?php ?>
						<div class="col-md-4 comparing-cols">
							<div class="compare-img">
								<a href="#"><?php $one = false; ?>
									<p><?php

									 $compare_tex_values = get_the_terms( $compare->ID, 'comparison' );
									 
									 foreach ($compare_tex_values as  $compare_tex_value) {
										echo  $compare_tex_value->name;	
									 }
									 
									  ?>
									</p>
									<?php foreach ($product_ids as $id) :?>
										<?php $comparision_products_data = get_post_custom($id);
												if ($one) {
													 echo '<div class="vs col-md-4">
														<img src="'.IMAGES.'/compare-arrow.png" /><br>
														<div>
															<div class="compare-feature"><br>
																<h5 style="margin-top:14px">VS</h5>
															</div>
														</div>
													</div>';
													 $thumbnail_id = $comparision_products_data['_thumbnail_id']['0']; 
													 $image_attributes = wp_get_attachment_image_src($thumbnail_id);
													 echo '<div class="first-vs col-md-4">';
													 if ($image_attributes) :
											 	  	 	echo  '<img src="'.$image_attributes[0].'" width="55"height="95"/>';
										 		   	 endif;
										 		   	 echo '<div class="compare-feature"><p>'; 
											 		 echo get_the_title( $id ); 
											 		 echo '</p></div></div>';
											 		 $one =false; 
										 		   	 
												}
												else {
												 $thumbnail_id = $comparision_products_data['_thumbnail_id']['0']; 
												 $image_attributes = wp_get_attachment_image_src($thumbnail_id);
												 echo '<div class="first-vs col-md-4">';
												 if ($image_attributes) :
										 	  	 	echo  '<img src="'.$image_attributes[0].'" width="55"height="95"/>';
									 		   	 endif;
									 		   	 echo '<div class="compare-feature"><p>'; 
										 		 echo get_the_title( $id ); 
										 		 echo '</p></div></div>';
										 		 $one =true;
										 		}

											?>

											

									 <?php endforeach;?>	
									 
								</a>	
								<div class="text-right"><a href="<?php echo get_permalink( $compare->ID ); ?>"><?php echo _e('Go','holistic-vibration'); ;?></a></div>
							</div>
						</div>

							
						<?php   endforeach;?>
						
					</div>
				</div>
			</div>
			<div class="text-right"><a href="#">view all popular comparisons</a></div>
		</div>
	</section>
	<section id="guide">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h5>Buyer&#39;s Guide</h5>
				</div>
				<div class="col-md-8">
					<div class="report">
						<p><img src="<?php echo IMAGES ?>/report.png" />2014 Consumer Industry Report - The Truth about the Industry's Dirt Little Secrets Exposed.</p>
					</div>
				</div>
			</div>
			<div class="guide-tabs">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
				  	<li class="active"><a href="#thingsToConsiderBeforeYouBuy" role="tab" data-toggle="tab"><img src="<?php echo IMAGES ?>/cart.png" />THINGS TO CONSIDER BEFORE YOU BUY</a></li>
				  	<li><a href="#claimsToAvoidBeforeYouBuy" role="tab" data-toggle="tab"><img src="<?php echo IMAGES ?>/claim.png" />CLAIMS TO AVOID BEFORE YOU BUY</a></li>
				  	<li><a href="#scamWatchAndUpdates" role="tab" data-toggle="tab"><img src="<?php echo IMAGES ?>/scam.png" />SCAM WATCH <br>AND UPDATES</a></li>
				</ul> 
				<div class="tab-content">
				  	<div class="tab-pane fade in active" id="thingsToConsiderBeforeYouBuy">
				  		<div class="row">
				  			<?php 
			  				$guide_arg = array(
			                'post_type' => 'buyer_guide',
			                'order' => 'ASC',
			                'post_per_page' => '9',
			                'tax_query' => array(
			                        array(
			                            'taxonomy' => 'guide_category',
			                            'field'    => 'slug',
			                            'terms'    =>  'things_to_consider_before_you_buy',
			                        ),
			                    )
			                );
			                
			                $query_guide1 = new WP_Query($guide_arg);
			                $i = 1;
			                $count = 1;
			                while( $query_guide1->have_posts() ) :
			                	$query_guide1->the_post();
			                	if ($i==1) {
			                		echo "<div class='col-md-4'>";
			                	}
			                	?>
						        <div class="tab-col">
				  					<a class="fancybox-media" rel="media-gallery" href="<?php  echo get_post_meta( get_the_ID(), 'video', true );  ?>">
				  						<?php 
				  						if (has_post_thumbnail()) {
				  							the_post_thumbnail();
				  						}
				  						 ?>
				  						<div>
				  							<h5><?php the_title(); ?></h5>
				  							<?php the_content(); ?>
										</div>
									</a>
								</div>
							<?php
			                	if ($i==3) {

			                		echo "</div>";
			                		$i=0;
			                	}
			                $i++;	
					        endwhile;
					        unset($query_guide1);
					        $i--;
					        if($i%3 != 0){
					        	echo '</div>';
					        }

					        ?>
					  	</div>
				  	</div>
				  	<div class="tab-pane fade" id="claimsToAvoidBeforeYouBuy">
				  		<div class="row">
				  			<?php 

				  				$guide_arg1 = array(
				                'post_type' => 'buyer_guide',
				                'order' => 'ASC',
				                'post_per_page' => '9',
				                'tax_query' => array(
				                        array(
				                            'taxonomy' => 'guide_category',
				                            'field'    => 'slug',
				                            'terms'    =>  'claims_to_avoid_before_you_buy',
				                        ),
				                    )
				                );
				                $query_guide2 = new WP_Query($guide_arg1);
				                unset($i);
				                $j = 1;
				                $p=1;
				                 while( $query_guide2->have_posts() ) :
				                	$query_guide2->the_post();
				                	if ($j==1) {
				                		echo "<div class='col-md-4'>";

				                	}
				                	$p++;
				                	?>
				                	
							        <div class="tab-col">
					  					<a class="fancybox-media" rel="media-gallery" href="<?php  echo get_post_meta( get_the_ID(), 'video', true );  ?>">
					  						<?php 
						  						if (has_post_thumbnail()) {
						  							the_post_thumbnail();
						  						}
						  					?>
					  						<div>
					  							<h5><?php the_title(); ?></h5>
					  							<?php the_content(); ?>
											</div>
										</a>
									</div>
								<?php
				                	if ($j==3) {
				                		echo "</div>";
				                		$j=(int)0;
				                	}
				                	$j++;
						        endwhile;
				  			$j--;
				  			

				  			 if($j%3 != 0){
						        	echo '</div>';
						        }
						     ?>
				  			
					  	</div>
				  	</div>
				  	<div class="tab-pane fade" id="scamWatchAndUpdates">
				  		<div class="row">
				  			<?php 
				  				$guide_arg2 = array(
				                'post_type' => 'buyer_guide',
				                'order' => 'ASC',
				                'post_per_page' => '9',
				                'tax_query' => array(
				                        array(
				                            'taxonomy' => 'guide_category',
				                            'field'    => 'slug',
				                            'terms'    =>  'scam_watch_and_updates',
				                        ),
				                    )
				                );
				                $query_guide3 = new WP_Query($guide_arg2);
				                unset($i);
				                $j  = 1;
				                 while( $query_guide3->have_posts() ) :
				                	$query_guide3->the_post();
				                	if ($j==1) {
				                		echo "<div class='col-md-4'>";
				                	}
				                	?>
							        <div class="tab-col">
					  					<a class="fancybox-media" rel="media-gallery" href="<?php  echo get_post_meta( get_the_ID(), 'video', true );  ?>">
					  						<?php 
				  						if (has_post_thumbnail()) {
				  							the_post_thumbnail();
				  						}
				  						 ?>
					  						<div>
					  							<h5><?php the_title(); ?></h5>
					  							<?php the_content(); ?>
											</div>
										</a>
									</div>
								<?php
				                	if ($j==3) {
				                		echo "</div>";
				                		$j=(int)0;
				                	}
				                	$j++;
						        endwhile;
						        $j--;

						        if($j%3 != 0){
						        	echo '</div>';
						        }
				  			 ?>
					  	</div>
				  	</div>
				</div>
			</div>
			<div class="text-right"><a href="#">view all buyer info</a></div>
		</div>
	</section>
<!-- Main Container End -->
<?php get_footer(); ?>
