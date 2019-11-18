<?php
/**
 * Template Name: Contact
 *
 */

get_header(); ?>

<div id="primary" class="content-area cf contactpage">
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<h1 style="display:none;"><?php the_title(); ?></h1>
			<?php  
				$maintitle = get_field("tc_heading");
				$introText = get_field("tc_text");
				$subhead = get_field("subhead");
				$tc_button_name = get_field("tc_button_name");
				$tc_button_link = get_field("tc_button_link");
				$contact_info = get_field("contact_info");
				$cf_shortcode = get_field("cf_shortcode");
			?>
			<div class="introwrap cf">
				<div class="wrapper med text-center">
					<?php if ($maintitle) { ?>
						<h2 class="t2"><?php echo $maintitle ?></h2>
					<?php } ?>
					<?php if ($introText) { ?>
						<div class="introtext"><?php echo $introText ?></div>
					<?php } ?>
					<?php if ($subhead) { ?>
						<h3 class="subhd"><?php echo $subhead ?></h3>
					<?php } ?>
					<?php if ($tc_button_name && $tc_button_link) { ?>
						<div class="buttondiv">
							<a href="<?php echo $tc_button_link ?>" class="btn sm"><?php echo $tc_button_name ?></a>
						</div>
					<?php } ?>

					<div class="contact-details cf">
						<div class="row cf">
							<?php if ($cf_shortcode && do_shortcode($cf_shortcode)) { ?>
							<div class="contactform cfcol">
								<div class="inside">
									<?php echo do_shortcode($cf_shortcode) ?>
								</div>
							</div>	
							<?php } ?>

							<?php if ($contact_info) { ?>
							<div class="contacts cfcol">
								<div class="inside">
									<div class="contacttitle">Contact Us</div>
									<?php echo $contact_info ?>
							</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile;  ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
