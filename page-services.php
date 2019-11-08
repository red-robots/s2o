<?php
/**
 * Template Name: Services
 *
 */

get_header(); ?>

<div id="primary" class="content-area cf topcontent">
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<h1 style="display:none;"><?php the_title(); ?></h1>
			<?php  
				$maintitle = get_field("tc_heading");
				$introText = get_field("tc_text");
				$subhead = get_field("subhead");
				$tc_button_name = get_field("tc_button_name");
				$tc_button_link = get_field("tc_button_link");
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
				</div>
			</div>
		<?php endwhile;  ?>


		<?php  
			$list_title = get_field("list_title");
			$post_type = 's2o-services';
			$posts_per_page = -1;
			$paged = ( get_query_var( 'pg' ) ) ? absint( get_query_var( 'pg' ) ) : 1;
			$args = array(
				'posts_per_page'=> $posts_per_page,
				'post_type'		=> $post_type,
				'post_status'	=> 'publish'
			);

			$team = new WP_Query($args);
			$placeholder = get_bloginfo("template_url") . "/images/rectangle.png";
			if ( $team->have_posts() ) {  ?>
				<div class="services-wrapper cf">
					<?php if ($list_title) { ?>
					<div class="wrapper"><h3 class="listtitle text-center"><em class="underline"><?php echo $list_title ?></em></h3></div>
					<?php } ?>
					<div id="servicesList" class="wrapper">
						<?php while ( $team->have_posts() ) : $team->the_post(); 
							$postid = get_the_ID();
							$projImage = get_field("featuredImage");
							$hasImage = ($projImage) ? 'hasimage' : 'noimage';
							$style = ($projImage) ? ' style="background-image:url('.$projImage['sizes']['medium_large'].')"':'';
							$title = get_the_title();
							$description = get_field("description");
							//$link = get_permalink();
						?>
						<div class="box <?php echo $hasImage ?>">
							<div class="flexbox">
								<div class="textcol">
									<h2 class="item-name"><?php echo $title ?></h2>
									<div class="description"><?php echo $description ?></div>
								</div>
								<div class="imagecol"<?php echo $style ?>>
									<img src="<?php echo $placeholder ?>" alt="" aria-hidden="true" />
								</div>
							</div>
						</div>
						<?php endwhile; wp_reset_postdata(); ?>
					</div>
				</div>
			<?php } ?>

			<?php
			$c_bottom_text = get_field("c_bottom_text");
			$c_bottom_button_name = get_field("c_bottom_button_name");
			$c_bottom_button_link = get_field("c_bottom_button_link");  
			?>
			<?php if ($c_bottom_text) { ?>
			<section class="pagebottomtext text-center">
				<div class="wrapper">
					<div class="text"><?php echo $c_bottom_text ?></div>
					<?php if ($c_bottom_button_name && $c_bottom_button_link) { ?>
						<div class="buttondiv">
							<a href="<?php echo $c_bottom_button_link ?>" class="btn sm"><?php echo $c_bottom_button_name ?></a>
						</div>
					<?php } ?>
				</div>
			</section>	
			<?php } ?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
