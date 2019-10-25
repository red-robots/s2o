<?php

get_header(); ?>

<div id="primary" class="content-area cf singleproject">
	<main id="main" class="site-main" role="main">

	<?php while ( have_posts() ) : the_post();  ?>

		<div class="introwrap cf">
			<h1 class="hd1 text-center"><?php the_title(); ?></h1>
		</div>

		<?php  
			$highlights = get_field('project_highlights');
			$galleries = get_field('gallery');
		?>

		<div class="wrapper single-content<?php echo ($highlights) ? ' hasHighlights':''; ?>">
			
			<div class="text">
				<?php the_content(); ?>
			</div>

			<?php if ($highlights) { ?>
			<div class="sidebar-blue highlights">
				<h3 class="sbtitle">Project Highlights </h3>
				<div class="pad">
					<?php echo $highlights ?>
				</div>
			</div>
			<?php } ?>

		</div>

	<?php endwhile; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
