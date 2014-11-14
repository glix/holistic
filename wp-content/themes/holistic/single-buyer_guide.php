<?php 
get_header();

 ?>

<?php while(have_posts()) : the_post();?>

<section id="buyer-guide">
	<div class="container">
		<div class="breadcurm">
			<a href="<?php echo home_url(); ?>" id="bread">Home</a> > <a href="/holistic-vibration/buyer-guide/" id="bread">Buyer&#39;s Guide</a> > <?php the_title();?>
		</div>
	</div>
</section>
<section id ="comparisons" class="buyer">
	<div class="container">
		<h5 style="margin-bottom:30px;"><?php the_title(); ?></h5>
		<?php
		  $custom_fileds = get_post_custom($post->ID); 
		$video_url=str_replace('.','',$custom_fileds['video']['0']);
		$url=str_replace('http://youtube','http://www.youtube.com/embed',$video_url);
		?>
		<iframe class="buyer-frame" width="560" height="315" src="<?php echo $url; ?>" frameborder="0" allowfullscreen></iframe>
		<?php the_content(); ?>		
	</div>
</section>

<?php endwhile; ?>

 <?php get_footer(); ?>