<?php
/**
 * Template Name: Projects
 *
 */

get_header(); ?>

<div id="primary" class="content-area cf projectspage">
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<h1 style="display:none;"><?php the_title(); ?></h1>
			
			<div class="introwrap cf">
				<div class="wrapper text-center">
					<?php the_content(); ?>
				</div>
			</div>
		<?php endwhile;  ?>


		<?php  
			$taxonomy = 'projectscats';
			$post_type = 'projects';
			$projectCats = get_terms( array(
			    'taxonomy' => $taxonomy,
			    'post_types'=> array($post_type),
			    'hide_empty' => false,
			) );

			$posts_per_page = -1;
			$paged = ( get_query_var( 'pg' ) ) ? absint( get_query_var( 'pg' ) ) : 1;
			$cat_id = ( isset($_GET['cat']) && is_numeric($_GET['cat']) ) ? $_GET['cat'] : '';

			$args = array(
				'posts_per_page'=> $posts_per_page,
				'post_type'		=> $post_type,
				'post_status'	=> 'publish'
			);
			if($cat_id) {
				$args['suppress_filters'] = true;
				$args['tax_query'] = array(
									array(
										'taxonomy' => $taxonomy,
					                    'field'    => 'term_id',
					                    'terms'    => array($cat_id),
									)
								);
				$default = '';
			} else {
				$default = 'active';
			}

			$projects = new WP_Query($args);
			$placeholder = get_bloginfo("template_url") . "/images/rectangle.png";
			if ( $projects->have_posts() ) {  ?>
			<div id="filterprojects" class="filter-options">
				<div class="wrapper">
					<strong>Filter by:</strong> 
					<span class="opt <?php echo $default ?>"><a href="<?php echo get_permalink() ?>">All</a></span>
					<?php if ($projectCats) { ?>
						<?php foreach ($projectCats as $cat) { 
							$termId = $cat->term_id;
							$termName = $cat->name;
							$catlink = get_permalink() . '?type=' . $post_type . '&cat=' . $termId;
							$is_active = ($termId==$cat_id) ? 'active':'';
							?>
							<span class="opt <?php echo $is_active ?>"><a href="<?php echo $catlink ?>"><?php echo $termName ?></a></span>
						<?php } ?>	
					<?php } ?>
				</div>
			</div>
			<div class="project-galleries cf">
				<div id="projectslist" class="wrapper">
					<?php while ( $projects->have_posts() ) : $projects->the_post(); 
						$postid = get_the_ID();
						$projImage = get_field('featured_image');
						$hasImage = ($projImage) ? 'hasimage' : 'noimage';
						$style = ($projImage) ? ' style="background-image:url('.$projImage['url'].')"':'';
						$title = get_the_title();
						$link = get_permalink();
						$locationsCats = get_the_terms($postid,'project-locations');
						$locations = '';
						if($locationsCats) { 
							$n=1;
							foreach($locationsCats as $e) {
								$locname = $e->name;
				                $split = ($n>1) ? ' / ':'';
				                $locations .= $split . $locname;
				                $n++;
							}
						}
					?>
					<div class="box">
						<a class="inner <?php echo $hasImage ?>" href="<?php echo $link ?>">
							<?php if ($projImage) { ?>
							<span class="image"<?php echo $style ?>></span>
							<?php } ?>
							<img src="<?php echo $placeholder ?>" alt="" aria-hidden="true" />
							<span class="caption">
								<span class="wrap">
									<span class="title"><?php echo $title; ?></span>
									<?php if ($locations) { ?>
									<small class="location"><?php echo $locations ?></small>	
									<?php } ?>
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
