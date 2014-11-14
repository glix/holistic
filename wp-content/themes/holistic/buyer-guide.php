<?php 
/*
Template Name: Buyer's Guide
*/
get_header();
 ?>
<section id="all-buyer-guide">
	<div class="container">
		<div class="breadcurm">
			<a href="<?php echo home_url(); ?>" id="bread">Home</a> > Buyer&#39;s Guide
		</div>
		<div id="the-title">
			<span><h5>Buyer&#39;s Guide</h5></span>
		</div>
		<div class="row">
			<div class="col-md-12">
				<ul class="nav nav-tabs" role="tablist">
					<li class="active"><a data-toggle="tab" role="tab" href="#thingsToConsiderBeforeYouBuy">THINGS TO CONSIDER BEFORE YOU BUY</a></li>
					<li><a data-toggle="tab" role="tab" href="#claimsToAvoidBeforeYouBuy">CLAIMS TO AVOID BEFORE YOU BUY</a></li>
					<li><a data-toggle="tab" role="tab" href="#scamWatchAndUpdates">SCAM WATCH AND UPDATES</a></li>
				</ul>
				<div class="tab-content">
					<div id="thingsToConsiderBeforeYouBuy" class="tab-pane active">
						<div class="row">
							<?php 
								$guide_args = array(
									'post_type' => 'buyer_guide',
									'order' => 'ASC',
									'post_per_page' => '30',
									'tax_query' => array(
										array(
											'taxonomy' => 'guide_category',
											'field' => 'slug',
											'terms' => 'things_to_consider_before_you_buy'
											),
										)
									);
								$query_guide1 = new WP_Query($guide_args);
								$i=1;
								while($query_guide1->have_posts()): $query_guide1->the_post();
								?>
								<div class="col-md-4 tab-col">
									<a href="<?php the_permalink(); ?>" >
										<?php if (has_post_thumbnail()) {
											the_post_thumbnail();
										} ?>
									<div>
										<h5><?php the_title(); ?></h5>
										<p><?php echo wp_trim_Words(get_the_content(),30); ?></p>
									</div>
									</a>
								</div>
								<?php 
									$i++;
									if($i==4):
										$i=1;
								 ?>
								 <div class="clearfix"></div>
								 <section class="divider"></section>
								<?php endif; ?>
							<?php endwhile; ?>
						</div>
					</div>
					<div id="claimsToAvoidBeforeYouBuy" class="tab-pane">
						<div class="row">
							<?php 
								$guide_args = array(
									'post_type' => 'buyer_guide',
									'order' => 'ASC',
									'post_per_page' => '30',
									'tax_query' => array(
										array(
											'taxonomy' => 'guide_category',
											'field' => 'slug',
											'terms' => 'claims_to_avoid_before_you_buy'
											),
										)
									);
								$query_guide1 = new WP_Query($guide_args);
								$i=1;
								while($query_guide1->have_posts()): $query_guide1->the_post();
								?>
								<div class="col-md-4 tab-col">
									<a href="<?php the_permalink(); ?>" >
										<?php if (has_post_thumbnail()) {
											the_post_thumbnail();
										} ?>
									<div>
										<h5><?php the_title(); ?></h5>
										<p><?php echo wp_trim_Words(get_the_content(),30); ?></p>
									</div>
									</a>
								</div>
								<?php 
									$i++;
									if($i==4):
										$i=1;
								 ?>
								 <div class="clearfix"></div>
								 <section class="divider"></section>
								<?php endif; ?>
							<?php endwhile; ?>
						</div>
					</div>
					<div id="scamWatchAndUpdates" class="tab-pane">
						<div class="row">
							<?php 
								$guide_args = array(
									'post_type' => 'buyer_guide',
									'order' => 'ASC',
									'post_per_page' => '30',
									'tax_query' => array(
										array(
											'taxonomy' => 'guide_category',
											'field' => 'slug',
											'terms' => 'scam_watch_and_updates'
											),
										)
									);
								$query_guide1 = new WP_Query($guide_args);
								$i=1;
								while($query_guide1->have_posts()): $query_guide1->the_post();
								?>
								<div class="col-md-4 tab-col">
									<a href="<?php the_permalink(); ?>" >
										<?php if (has_post_thumbnail()) {
											the_post_thumbnail();
										} ?>
									<div>
										<h5><?php the_title(); ?></h5>
										<p><?php echo wp_trim_Words(get_the_content(),30); ?></p>
									</div>
									</a>
								</div>
								<?php 
									$i++;
									if($i==4):
										$i=1;
								 ?>
								 <div class="clearfix"></div>
								 <section class="divider"></section>
								<?php endif; ?>
							<?php endwhile; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
 <?php get_footer(); ?>