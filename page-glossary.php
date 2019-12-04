<?php
/**
 * Template Name: Glossary
 *
 */

get_header(); ?>

	<div id="primary" class="content-area default cf glossarypage">
		<main id="main" class="site-main wrapper cf" role="main">

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
					<div class="wrapper text-center">
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


			<?php /* PARKS */ ?>
			<?php if( $parks = get_field("parks") ) { ?>
			<div class="type-parks cf">
				<?php $i=1; foreach ($parks as $p) { 
				$p_image = $p['feat_image'];
				$p_title = $p['title'];
				$left_content = $p['left_content'];
				$right_content = $p['right_content']; 
				$bottom = $p['bottom_text'];
				$b_text = ($bottom) ? $bottom['text'] : '';
				$b_button_name = ($bottom) ? $bottom['button_name'] : '';
				$b_button_link = ($bottom) ? $bottom['button_link'] : '';
				$sec = $i + 2;
				$hasTwoCol = ( $left_content && $right_content ) ? 'half':'full';
				?>
				<div class="park-info cf fadeIn wow <?php echo $hasTwoCol ?>" data-wow-delay="0.<?php echo $sec?>s">
					<?php if ($p_title) { ?>
					<h3 class="name"><span><?php echo $p_title ?></span></h3>	
					<?php } ?>

					<?php if ($p_image) { ?>
					<div class="feat-image"><img src="<?php echo $p_image['url'] ?>" alt="<?php echo $p_image['title'] ?>" /></div>	
					<?php } ?>
					
					<div class="text-wrap">
						<?php if ($left_content) { ?>
						<div class="leftcol"><?php echo $left_content ?></div>	
						<?php } ?>
						
						<?php if ($right_content) { ?>
						<div class="rightcol"><?php echo $right_content ?></div>	
						<?php } ?>
					</div>
					

					<?php if ($b_text || ($b_button_name && $b_button_link) ) { ?>
					<div class="pagebottomtext text-center">
						<div class="wrapper">
							<?php if ($b_text) { ?>
							<div class="text"><?php echo $b_text ?></div>
							<?php } ?>
							<?php if ($b_button_name && $b_button_link) { ?>
								<div class="buttondiv">
									<a href="<?php echo $b_button_link ?>" class="btn sm"><?php echo $b_button_name ?></a>
								</div>
							<?php } ?>
						</div>
					</div>
					<?php } ?>
				</div>
				<?php $i++; } ?>
			</div>
			<?php } ?>


			<?php //get_template_part("template-parts/content","bottomtext"); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
