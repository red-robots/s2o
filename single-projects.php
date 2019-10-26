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
			$placeholder = get_bloginfo("template_url") . "/images/rectangle.png";
		?>

		<?php if ($galleries) { ?>
		<div class="galleries wrapper cf">
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<?php foreach ($galleries as $ga) { 
					$imgURL = $ga['images']['url'];
					$description = $ga['description'];
					?>
					<div class="swiper-slide" style="background-image:url('<?php echo $imgURL;?>')">
						<img src="<?php echo $placeholder; ?>" alt="" aria-hidden="true" />
						<?php if ($description) { ?>
						<div class="description"><?php echo $description ?></div>	
						<?php } ?>
					</div>
					<?php } ?>
				</div>
			</div>	
			<div class="swiper-pagination"></div>
		</div>
		<?php } ?>

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
