<?php
/**
 * Template Name: Staff
 *
 */

get_header(); ?>

<div id="primary" class="content-area cf staffspage">
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<h1 style="display:none;"><?php the_title(); ?></h1>
			
			<div class="introwrap cf">
				<div class="wrapper med text-center">
					<?php the_content(); ?>
				</div>
			</div>
		<?php endwhile;  ?>


		<?php  
			$post_type = 'staff';
			$posts_per_page = -1;
			$paged = ( get_query_var( 'pg' ) ) ? absint( get_query_var( 'pg' ) ) : 1;
			$args = array(
				'posts_per_page'=> $posts_per_page,
				'post_type'		=> $post_type,
				'post_status'	=> 'publish'
			);

			$team = new WP_Query($args);
			$placeholder = get_bloginfo("template_url") . "/images/square.png";
			if ( $team->have_posts() ) {  ?>
				<div class="project-galleries cf">
					<div class="wrapper"><h3 class="hd3 text-center"><em>Meet the Team</em></h3></div>
					<div id="projectslist" class="wrapper">
						<?php while ( $team->have_posts() ) : $team->the_post(); 
							$postid = get_the_ID();
							$projImage = get_field('picture');
							$hasImage = ($projImage) ? 'hasimage' : 'noimage';
							$style = ($projImage) ? ' style="background-image:url('.$projImage['sizes']['medium_large'].')"':'';
							$title = get_the_title();
							$link = get_permalink();
						?>
						<div class="box <?php echo $hasImage ?>">
							<a href="<?php echo $link ?>#content" class="inner <?php echo $hasImage ?>" data-name="<?php echo $title; ?>">
								<?php if ($projImage) { ?>
								<span class="image"<?php echo $style ?>></span>
								<?php } ?>
								<img src="<?php echo $placeholder ?>" alt="" aria-hidden="true" />
								<span class="caption">
									<span class="wrap">
										<span class="title"><?php echo $title; ?></span>
									</span>
								</span>
							</a>
						</div>
						<?php endwhile; wp_reset_postdata(); ?>
					</div>
				</div>
			<?php } ?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
