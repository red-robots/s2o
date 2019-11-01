<?php
/*
 * Template Name: Sitemap
*/

get_header(); ?>

	<div id="primary" class="content-area default cf pagesitemap">
		<main id="main" class="site-main wrapper cf" role="main">

			
			<?php while ( have_posts() ) : the_post(); ?> 
				
				<header class="page-header">  
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>
				
				<div class="entry-content">
					<?php the_content(); ?>
					<?php get_template_part('template-parts/content','sitemap'); ?>
				</div>

			<?php endwhile;  ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
