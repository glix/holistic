<?php 
/*
Template Name: Categorised Comparison
*/

 get_header();
 if (isset($_GET['slug']) && !empty($_GET['slug'])) {
 	$term = $_GET['slug'];
 } else {
 	$term = 'linear';
 }
 
?>

<section id="comp-product">
	<div class="container">
		<div id="breadcrum">
			<a href="<?php echo home_url(); ?>" id="bread">Home</a> > <a href="<?php echo home_url(); ?>/comparisons" id="bread">All Comparison</a> > <?php echo ucfirst($term); ?>
		</div>
	</div>
</section>
<section id="comparisons">
	<div class="container">
		<h5 style="margin-bottom:30px;"><?php echo ucfirst($term); ?></h5>
		<div class="row">
			<div class="col-md-12">
				<div class="row center-div">
					<?php 
						$arg_tex = array(
							'post_type' => 'comparison',
							'order' => 'desc',
							'tax_query' => array(
			                        array(
			                            'taxonomy' => 'comparison',
			                            'field'    => 'slug',
			                            'terms'    => $term,
			                        ),
								),
							);
						$query = new wp_Query($arg_tex);
						$count = 0;
						if($query->have_posts()) : 
							while($query->have_posts()) : $query->the_post();
							$custom_fields = get_post_custom($query->post->ID);
							$product_ids = unserialize($custom_fields['compare']['0']);
					 ?>
					<div class="col-md-3 comparing-cols" style="margin-bottom: 30px;">
						<div class="compare-img">
							<?php 
								echo "<a href='compare-product/?product1=".$product_ids['compare_product1_id']."&product2=".$product_ids['compare_product2_id']."'>";
								foreach ($product_ids as $id) :
									$comparision_products_data = get_post_custom($id);
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
								endforeach;
								echo "</a>";
							 ?>
						</div>
					</div>
					<?php 
						$count++;
						if($count == 4){
							$count = 0;
							?>
							<div class="clearfix"></div>
							<section class="divider"></section>
							<div class="clearfix"></div>
							<?php 
						}
						endwhile;
						endif;
					 ?>
				</div><!-- inner row ends -->
			</div><!-- col-md-12 ends -->
		</div><!-- row ends -->
	</div>
</section>

<?php get_footer(); ?>