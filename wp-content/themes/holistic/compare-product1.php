<?php
/*
Template Name: Compare Product
*/
get_header();
$product1_id = $product2_id = '';
if (isset($_GET['product1']) && isset($_GET['product2']) ) {
	$product1_id = $_GET['product1'];
	$product2_id = $_GET['product2'];
	$args = array('p' => $product1_id, 'post_type' => 'product_manager');
	$arg = array('p' => $product2_id, 'post_type' => 'product_manager');
}
else {
	$query = new WP_Query( 'post_type=comparison&posts_per_page=1' );
	while($query->have_posts() )  :
		$query->the_post();
	    $custom_field = get_post_custom($post->ID);
	    $compare = unserialize($custom_field['compare'][0]);
	    $product1_id = $compare['compare_product1_id'];
	    $product2_id = $compare['compare_product2_id'];
	endwhile;
	$args = array('p' => $product1_id, 'post_type' => 'product_manager');
	$arg = array('p' => $product2_id, 'post_type' => 'product_manager');
}


?>  
<section id="comp-product">
	<div class="container">
		<div id="breadcrum">
			<a href="<?php echo home_url(); ?>" id="bread">Home</a> > Comparison
		</div>

		<div id="the-title">
			<span><h5>Compare Products</h5></span>
		</div>

		<div class="row" id="border-row">
			<div class="col-md-5" id="myCol2">
				<?php 
				$loop = new WP_Query($args);
				while($loop->have_posts() )  :
					$loop->the_post();

					$image_attributes =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'product-thumb' );

					if ($image_attributes) :
					  	 	echo  '<img src="'.$image_attributes[0].'"  width="150"height="150"/>';
					endif;
					echo '<h5 class="pro-title">';
					echo $post->post_title;
					echo "</h5>";
					$custom_fields = get_post_custom($post->ID);
					$stock_msg[] = isset($custom_fields['stock_msg']['0']) ? $custom_fields['stock_msg']['0'] : '';
					
					$video_url = !empty($custom_fields['video_url']['0']) ? $custom_fields['video_url']['0'] : '';

					$all_feature = unserialize($custom_fields['review_specs']['0']);
					?>
					<div class="starRate1">
						<span class="star-rating1">
							<?php 
								if ($all_feature['link'] !=0) {
									for ($i=1; $i <=$all_feature['link']; $i++) { 
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
					 ?>
					<?php 
					$hp[]          = $all_feature['hp'];
					$watt[]        = $all_feature['watt'];
					$gforce[]      = $all_feature['gforce'];
					$amplitude[]   = $all_feature['amplitude'];
					$durability[]  = $all_feature['durability'];
					$bone_health[] = $all_feature['bone_health'];
					$circulation[] = $all_feature['circulation'];
					$cr_fitness[]  = $all_feature['cr_fitness'];
					$lymphatic[]   = $all_feature['lymphatic'];
					$cr_detoxification[]  = $all_feature['cr_detoxification'];
					$weightloss[]         = $all_feature['weightloss'];
					$pain_relief_consumer_review[] = $all_feature['pain_relief_consumer_review'];
					
					$price[] = $custom_fields['price']['0'];
					$availability[] = $custom_fields['availbility']['0'];
					$consumer_reviews[] = $custom_fields['consumer_reviews']['0'];
					$warranty[] = $custom_fields['warranty']['0'];
					$special_offer[] = $custom_fields['special_offer']['0'];

				endwhile;	 
				 ?>

			</div>

			<div class="col-md-2" id="myCol3">
				<img src="<?php echo IMAGES; ?>/compare-arrow.png" width="50" id="compare-ico" />
			</div>

			<div class="col-md-5" id="myCol4">
				<?php 
				unset($loop);
				$loop = '';
				$loop = new WP_Query($arg);
				while($loop->have_posts() )  :
					$loop->the_post();
					
					$image_attributes = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'product-thumb');
					if ($image_attributes) :
					  	 	echo  '<img src="'.$image_attributes[0].'"  width="150"height="150"/>';	
					endif;
					echo '<h5 class="pro-title">';
					echo $post->post_title;
					echo "</h5>";?>
					<?php 
					unset($custom_fields);
					$custom_fields = get_post_custom($post->ID);
					
					$stock_msg[] = isset($custom_fields['stock_msg']['0']) ? $custom_fields['stock_msg']['0'] : '';
					unset($video_url);
					$video_url = !empty($custom_fields['video_url']['0']) ? $custom_fields['video_url']['0'] : '';
					$all_feature = unserialize($custom_fields['review_specs']['0']);
					 ?>
					<div class="starRate1">
						<span class="star-rating1">
							<?php 
								if ($all_feature['link'] !=0) {
									for ($i=1; $i <=$all_feature['link']; $i++) { 
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

					$hp[]          = $all_feature['hp'];
					$watt[]        = $all_feature['watt'];
					$gforce[]      = $all_feature['gforce'];
					$amplitude[]   = $all_feature['amplitude'];
					$durability[]  = $all_feature['durability'];
					$bone_health[] = $all_feature['bone_health'];
					$circulation[] = $all_feature['circulation'];
					$cr_fitness[]  = $all_feature['cr_fitness'];
					$lymphatic[]   = $all_feature['lymphatic'];
					$cr_detoxification[]  = $all_feature['cr_detoxification'];
					$weightloss[]         = $all_feature['weightloss'];
					$pain_relief_consumer_review[] = $all_feature['pain_relief_consumer_review'];
					$price[] = $custom_fields['price']['0'];
					$availability[] = $custom_fields['availbility']['0'];
					$consumer_reviews[] = $custom_fields['consumer_reviews']['0'];
					$warranty[] = $custom_fields['warranty']['0'];
					$special_offer[] = $custom_fields['special_offer']['0'];
				endwhile;	 
				 ?>
			</div>


		</div>
	</div>
</section>
<section>
	<div class="container">
		<table class="table table-hover table-striped table-bordered table-responsive">
			<tr><th colspan="3" class="row-title">Specifications</th></tr>
			<tr>
				<th class="table-head">Price</th>

				<?php if (isset($price)) {
					foreach ($price as $single_price) {
						echo '<td class="table-data">';
						echo $single_price;
						echo "</td>";
					}
				} ?>
			</tr>
			<tr>
				<th class="table-head">Availability</th>
				<?php $i = 0;
				foreach ($availability as $avail) {
					if ($avail=='1') {
						echo '<td class="table-data">';
						echo "In Stock";
						echo '<div class="alignright">
								<a href="#">BUY NOW</a>
							</div>';
							$i++;

					}
					else if ($avail=='2') {
						echo '<td class="table-data">';
						echo "Out of Stock";
						echo '<div class="alignright">
								<a href="#">BUY NOW</a>
							</div>';
					}
				}

				?>
			</tr>
			<!-- <tr>
				<th class="table-head">Warranty of Hardware</th>
				<?php 
					if (isset($warranty)) {
						foreach ($warranty as $single_waranty ) {
							echo '<td class="table-data">';
							echo $single_waranty;
							echo "</td>";		
						}
					}
				 ?>
			</tr>
			<tr>
				<th class="table-head">Special Offer</th>
				<?php 
					if (isset($special_offer)) {
						foreach ($special_offer as $single_offer) {
							echo '<td class="table-data">';
							echo $single_offer;
							echo "</td>";		
						}
					}
				 ?>
			</tr> -->
		</table>
	</div>
</section>

<section>
	<div class="container">
		<table class="table table-hover table-striped table-bordered table-responsive">
			<tr><th colspan="3" class="row-title">Spec Comparisons</th></tr>
			<tr>
				<th class="table-head">Watts</th>
				<?php  comparison_feature($watt); ?>	
			</tr>
			<tr>
				<th class="table-head"> HP</th>
				<?php  comparison_feature($hp); ?>	
			</tr>
			<tr>
				<th class="table-head">Gforce </th>
				<?php  comparison_feature($gforce); ?>	
			</tr>
			<tr>
				<th class="table-head">Amplitude</th>
				<?php  comparison_feature($amplitude); ?>	
			</tr>
			<tr>
				<th class="table-head"> Durability</th>
				<?php  comparison_feature($durability); ?>	
			</tr>
		</table>
	</div>
</section>
<section>
	<div class="container">
		<table class="table table-hover table-striped table-bordered table-responsive">
			<tr><th colspan="3" class="row-title">Health Performance Comparison Rating</th></tr>

			<tr>
				<th class="table-head">Bone Health</th>
				<?php  comparison_feature($bone_health); ?>	
			</tr>

			<tr>
				<th class="table-head"> circulation </th>
					<?php  comparison_feature($circulation); ?>					
			</tr>

			<tr>
				<th class="table-head">Lymphatic </th>
				<?php  comparison_feature($lymphatic); ?>				
			</tr>
			<tr>
				<th class="table-head">Fitness, </th>
				<?php  comparison_feature($cr_fitness); ?>	
			</tr>
			<tr>
				<th class="table-head"> Detoxification </th>
				<?php  comparison_feature($cr_detoxification); ?>	
			</tr>
			<tr>
				<th class="table-head"> Weightloss </th>
				<?php  comparison_feature($weightloss); ?>	
			</tr>
			<tr>
				<th class="table-head">Pain relief Consumer Review</th>
				<?php  comparison_feature($pain_relief_consumer_review); ?>	
			</tr>
			<tr>
				<th class="table-head">Consumer Reviews</th>
				<?php if (isset($consumer_reviews)) {
					foreach ($consumer_reviews as $single_consumer_reviews) {
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
				} ?>	
			</tr>
			<!-- <tr>
				<th></th>
				<td class="table-data"><a target="_blank" href="http://qbpn.com/holistic-design/product.php?product_id=<?php echo $product1_id ?>" class="btn btn-primary">View Product Deatils</a></td>
				<td class="table-data"><a target="_blank" href="http://qbpn.com/holistic-design/product.php?product_id=<?php echo $product2_id ?>" class="btn btn-primary">View Product Deatils</a></td>
			</tr> -->

		</table>
	</div>
</section>

<?php get_footer();?>