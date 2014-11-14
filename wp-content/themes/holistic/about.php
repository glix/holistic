<?php 
/*
Template Name: About Page
*/
get_header();
while(have_posts()): the_post(); 
 ?>
 <section id="comp-product">
	<div class="container">
		<div id="breadcrum">
			<a href="<?php echo home_url(); ?>" id="bread">Home</a> > About
		</div>
	</div>
</section>
<section id="about">
	<div class="container">
		<div class="row">
			<!-- <div class="col-md-4"> -->
				<?php 
					// if ( has_post_thumbnail() ) { 
					// 	the_post_thumbnail('full');
					// }
				?>
			<!-- </div> -->
			<div class="col-md-12">
				<?php 
					$attachments = get_posts( array('post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'post__not_in' => array($product_logo)) );
					foreach ( $attachments as $attachment ) {
						$image = wp_get_attachment_image_src($attachment->ID,'full');
						echo '<img src="'.$image[0].'" data-tmb-large="'.$image[0].'"/>';
					}
					$content = get_the_content();
					$content = preg_replace('/<img[^>]+./','', $content);
					echo '<p>'.$content.'</p>';
				?>
			</div>
		</div>
	</div>
</section>
<?php endwhile; ?>
 <?php get_footer(); ?>