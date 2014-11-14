<?php

get_header(); ?>
	<div id="primary" class="content-area">
		<div id="content compare" class="site-content" role="main">
			<header class="entry-header">
			<?php while ( have_posts() ) : the_post(); ?>
				<h3 class="entry-title"><?php the_title(); ?></h1>
				<?php 
					$post_meta_data = get_post_custom($post->ID);
					$compare_data =unserialize($post_meta_data['compare']['0']);

					foreach ($compare_data as $key => $id) {
						$ids[] = get_post_custom($id);

						$titles[] =get_the_title($id);
					}
					
					foreach ($ids as $key1 => $product_info) {
						$metaBox[] = unserialize($product_info['review_specs']['0']);
						$description[] = $product_info['review_description']['0'];
						$featured_image[] = $product_info['_thumbnail_id']['0']; 
					}
					foreach ($metaBox as $field => $value) {
						
						$hp[] = $value['hp'];
						$watt[] = $value['watt'];
						$gforce[] = $value['gforce'];
						$amplitude[] = $value['amplitude'];
						$durability[] = $value['durability'];
						$bone_health[] = $value['bone_health'];
						$circulation[] = $value['circulation'];
						$cr_fitness[] = $value['cr_fitness'];
						$lymphatic[]= $value['lymphatic'];
						$cr_detoxification[] = $value['cr_detoxification'];
						$weightloss[] = $value['weightloss'];
						$pain_relief_consumer_review[] = $value['pain_relief_consumer_review'];
						
					}
					?>
					<table >
						<thead>
							<tr><th>Particular</th><?php compare_heading($titles); ?></tr>
						</thead>
						<tbody>
							<tr>
								<td>Image</td>
								<?php
									foreach ($featured_image as $image => $image_id) {
										$image_attributes = wp_get_attachment_image_src($image_id);
										if ($image_attributes) {
											?><td>		
											<img src="<?php echo $image_attributes[0]; ?>" width="<?php echo $image_attributes[1]; ?>" height="<?php echo $image_attributes[2]; ?>"> 	
											</td><?php 
										}
									}
								  ?>
							</tr>
							<tr><td colspan="3">Spec Comparision</td></tr>
							<tr><td>Watt</td><?php compare_body($watt) ?></tr>
							<tr><td>HP</td><?php compare_body($hp) ?></tr> 	
							<tr><td>Gforce</td><?php compare_body($gforce) ?></tr>
							<tr><td>Amplitude</td><?php compare_body($amplitude) ?></tr>
							<tr><td>Durability</td><?php compare_body($durability) ?></tr>
							<tr><td colspan="3">Health Performance Comparison Rating</td></tr>
							<tr><td>Bone Health</td><?php compare_body($bone_health) ?></tr>
							<tr><td>Circulation</td><?php compare_body($circulation) ?></tr>
							<tr><td>Lymphatic</td><?php compare_body($lymphatic) ?></tr>
							<tr><td>Fitness</td><?php compare_body($cr_fitness) ?></tr>
							<tr><td>Detoxification</td><?php compare_body($cr_detoxification) ?></tr>
							<tr><td>Weight Loss</td><?php compare_body($weightloss) ?></tr>
							<tr><td>Pain Relief Consumner Review</td><?php compare_body($pain_relief_consumer_review) ?></tr>
							
							
						</tbody>
					</table>	
					<?php
					

					
				 ?>

				<?php twentythirteen_post_nav(); ?>
				
			<?php endwhile; ?>
		</div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>