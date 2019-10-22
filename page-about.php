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
				?>

				<section class="row1 subsection">
					<div class="wrapper">
						<?php if ($row1_title) { ?>
							<h1 class="hd1"><?php echo $row1_title ?></h1>
						<?php } ?>
					</div>
					
				</section>

			<?php endwhile; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
