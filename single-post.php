<?php

get_header(); ?>
	
	<div id="primary" class="content-area single-news default cf">
		<main id="main" class="site-main wrapper cf" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php  
					$pid = get_the_ID();
					$thumbId = get_post_thumbnail_id($pid);
					$photo = wp_get_attachment_image_src($thumbId,'full');
					$photoAlt = ($photo) ? get_the_title($thumbId) : '';
				?>
				<article id="news<?php the_ID(); ?>" class="entry-content cf <?php echo ($photo) ? 'hasphoto':'nophoto';?>">

					<header class="entry-header cf">
						<h1><?php the_title() ?></h1>
						<div class="postdate"><?php echo get_the_date('F j, Y'); ?></div>
					</header>
					<div class="text-full cf">
						<!-- <?php if ($photo) { ?>
						<div class="singleFeatImg"><img src="<?php //echo $photo[0] ?>" alt="<?php //echo $photoAlt ?>"/></div>
						<?php } ?> -->
						<?php the_content(); ?>
					</div>

				</article>

			<?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
