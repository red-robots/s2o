<?php
/**
 * Template Name: About
 *
 */

get_header(); ?>

	<div id="primary" class="content-area cf">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<h1 style="display:none;"><?php the_title(); ?></h1>
				<?php 
				$row1_title = get_field('row1_title'); 
				$row1_text = get_field('row1_text'); 
				$row1_image = get_field('row1_image'); 
				$row1_button_name = get_field('row1_button_name'); 
				$row1_button_link = get_field('row1_button_link'); 
				?>

				<section class="subsection row1">
					<div class="wrapper">
						<?php if ($row1_title) { ?>
							<h1 class="hd1 mb50 fadeIn wow" data-wow-delay="0.3s"><?php echo $row1_title ?></h1>
						<?php } ?>
						
						<div class="content-section text-image-wrap cf">
							<div class="flexrow">

								<div class="scol right fadeIn wow" data-wow-delay="0.8s">
									<?php if ($row1_image) { ?>
										<div class="image">
											<img src="<?php echo $row1_image['url'] ?>" alt="<?php echo $row1_image['title'] ?>" />
										</div>
									<?php } ?>
								</div>

								<div class="scol left fadeIn wow" data-wow-delay="0.5s">
									<?php if ($row1_text) { ?>
										<div class="text cf"><?php echo $row1_text; ?></div>
										<?php if ($row1_button_name && $row1_button_link) { ?>
										<div class="button cf"><a href="<?php echo $row1_button_link ?>" class="btn"><?php echo $row1_button_name ?></a></div>
										<?php } ?>
									<?php } ?>
								</div>
								
							</div>

						</div>
						
					</div>
				</section>

				<?php 
				$row2_title = get_field('row2_title'); 
				$row2_text = get_field('row2_text'); 
				$row2_image = get_field('row2_image'); 
				$row2_button_name = get_field('row2_button_name'); 
				$row2_button_link = get_field('row2_button_link'); 
				?>

				<section class="subsection row2">
					<div class="wrapper">						
						<div class="content-section text-image-wrap cf">
							<div class="flexrow">

								<div class="scol right fadeIn wow" data-wow-delay="0.8s">
									<?php if ($row2_image) { ?>
										<div class="image">
											<img src="<?php echo $row2_image['url'] ?>" alt="<?php echo $row2_image['title'] ?>" />
										</div>
									<?php } ?>
								</div>


								<div class="scol left fadeIn wow" data-wow-delay="0.5s">
									<?php if ($row2_text) { ?>
										<div class="text cf"><h3><?php echo $row2_text; ?></h3></div>
										<?php if ($row2_button_name && $row2_button_link) { ?>
										<div class="button cf"><a href="<?php echo $row2_button_link ?>" class="btn"><?php echo $row2_button_name ?></a></div>
										<?php } ?>
									<?php } ?>
								</div>

								
								
							</div>

						</div>
						
					</div>
				</section>

				

			<?php endwhile; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
