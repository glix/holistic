<?php 
/*
Template Name: SiteMap
*/
get_header();
 ?>
 <section id="comp-product">
 	<div class="container">
		<div id="breadcrum">
			<a href="<?php echo home_url(); ?>" id="bread">Home</a> > Sitemap
		</div>
	</div>
 </section>
 <section id="sitemap">
 	<div class="container">
 		<div class="row">
 			<div class="col-md-12">
 				<div class="row">
 					<div class="col-md-4">
 						<ul>
 							<li><a href="<?php echo home_url(); ?>">Home</a></li>
 							<li><a href="<?php echo home_url(); ?>/about">About</a></li>
 							<li><a href="<?php echo home_url(); ?>/products">Reviews</a></li>
 							<li><a >Get Educated</a></li>
 							<li><a href="<?php echo home_url(); ?>/medical_conditions/cellulite">Cellulite</a></li>
 							<li><a href="<?php echo home_url(); ?>/medical_conditions/detoxing">Detoxing</a></li>
 						</ul>
 					</div>
 					<div class="col-md-4">
 						<ul>
 							<li><a href="<?php echo home_url(); ?>/medical_conditions/fat_loss">Fat Loss</a></li>
 							<li><a href="<?php echo home_url(); ?>/medical_conditions/fibromyalgia">Fibromyalgia</a></li>
 							<li><a href="<?php echo home_url(); ?>/medical_conditions/fitness">Fitness</a></li>
 							<li><a href="<?php echo home_url(); ?>/medical_conditions/join_pain">Join Pain</a></li>
 							<li><a href="<?php echo home_url(); ?>/medical_conditions/low_circulation">Low Circulation</a></li>
 							<li><a href="<?php echo home_url(); ?>/medical_conditions/lower_back_pain">Lower back pain</a></li>
 						</ul>
 					</div>
 					<div class="col-md-4">
 						<ul>
 							<li><a href="<?php echo home_url(); ?>/medical_conditions/lymphatic_drainage">Lymphatic Drainage</a></li>
 							<li><a href="<?php echo home_url(); ?>/medical_conditions/bone_density">Bone Density</a></li>
 							<li><a href="<?php echo home_url(); ?>/comparisons">Comparisons</a></li>
 							<li><a href="<?php echo home_url(); ?>/buyers-guide">Buyer's Guide</a></li>
 							<li><a href="">Support</a></li>
 						</ul>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>
 <?php get_footer(); ?>