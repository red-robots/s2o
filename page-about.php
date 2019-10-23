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
							<h1 class="hd1 fadeIn wow" data-wow-delay="0.3s"><?php echo $row1_title ?></h1>
						<?php } ?>
						
						<div class="content-section cf">
							<div class="flexrow">
								<div class="scol left fadeIn wow" data-wow-delay="0.5s">
									<?php if ($row1_text) { ?>
										<div class="text cf"><?php echo $row1_text; ?></div>
										<?php if ($row1_button_name && $row1_button_link) { ?>
										<div class="button cf"><a href="<?php echo $row1_button_link ?>" class="btn"><?php echo $row1_button_name ?></a></div>
										<?php } ?>
									<?php } ?>
								</div>

								<div class="scol right fadeIn wow" data-wow-delay="0.8s">
									<?php if ($row1_image) { ?>
										<div class="image">
											<img src="<?php echo $row1_image['url'] ?>" alt="<?php echo $row1_image['title'] ?>" />
										</div>
									<?php } ?>
								</div>
							</div>

						</div>
						
					</div>
				</section>

				<div class="section-divider cf">
					<img src="<?php echo get_bloginfo('template_url') ?>/images/wave-broken-line.png" alt="" aria-hidden="true" />
				</div>

				<?php 
					$row2_title = get_field('row2_title'); 
					$row2_text = get_field('row2_text'); 
					$row2_photos = get_field('row2_photos'); 
					$row2_button_name = get_field('row2_button_name'); 
					$row2_button_link = get_field('row2_button_link'); 
					$photos_count = ($row2_photos) ? count($row2_photos) : 0;
					$row2_class = 'imgcol1';
					if($photos_count==1) {
						$row2_class = 'imgcol1';
					}
					else if($photos_count==2) {
						$row2_class = 'imgcol2';
					}
					else if( $photos_count % 3 == 0 ) {
						$row2_class = 'imgcol3';
					}
					else if($photos_count % 4 == 0 ) {
						$row2_class = 'imgcol4';
					}
					else {
						$row2_class = 'imgcol3';
					}
				?>

				<section class="subsection padtb row2">
					<div class="wrapper">
						<div class="toptext text-center fadeIn wow">
						<?php if ($row2_title) { ?>
							<h3 class="hd3"><?php echo $row2_title ?></h3>
						<?php } ?>
						<?php if ($row2_text) { ?>
							<div class="text"><?php echo $row2_text ?></div>
						<?php } ?>
						</div>

						<?php if ($row2_photos) { ?>
							<div class="photos cf <?php echo $row2_class ?>">
								<?php foreach ($row2_photos as $p) { ?>
								<div class="img fadeIn wow" data-wow-delay="0.5s">
									<img src="<?php echo $p['url'] ?>" alt="<?php echo $p['title'] ?>" />
								</div>	
								<?php } ?>
							</div>
						<?php } ?>

						<?php if ($row2_button_name && $row2_button_link) { ?>
						<div class="button text-center cf fadeIn wow"><a href="<?php echo $row2_button_link ?>" class="btn"><?php echo $row2_button_name ?></a></div>
						<?php } ?>
					</div>
				</section>


				<?php 
					$row3_title = get_field('row3_title'); 
					$row3_text = get_field('row3_text'); 
					$row3_bg = get_field('row3_bg'); 
					$row3_button_name = get_field('row3_button_name'); 
					$row3_button_link = get_field('row3_button_link'); 
				?>
				
				<section class="subsection row3">
					<?php if ($row3_bg) { ?>
					<div class="mobileRowBg" style="background-image:url('<?php echo $row3_bg['url'] ?>');"></div>
					<img src="<?php echo $row3_bg['url'] ?>" alt="" aria-hidden="true" class="rowBg">	
					<?php } ?>
					<div class="section-text">
						<div class="wrapper fadeIn wow" data-wow-delay="0.3s">
							<div class="toptext text-center">
							<?php if ($row3_title) { ?>
								<h3 class="hd3"><?php echo $row3_title ?></h3>
							<?php } ?>
							<?php if ($row3_text) { ?>
								<div class="text"><?php echo $row3_text ?></div>
							<?php } ?>
							</div>

							<?php if ($row3_button_name && $row3_button_link) { ?>
							<div class="button text-center cf"><a href="<?php echo $row3_button_link ?>" class="btn white"><?php echo $row3_button_name ?></a></div>
							<?php } ?>
						</div>
					</div>
				</section>

				<?php 
					$row4_title = get_field('row4_title'); 
					$row4_text = get_field('row4_text'); 
					$row4_image = get_field('row4_image'); 
					$row4_button_name = get_field('row4_button_name'); 
					$row4_button_link = get_field('row4_button_link'); 
				?>

				<section class="subsection padtb row4">
					<div class="wrapper">
						<?php if ($row4_title) { ?>
							<h1 class="hd1 fadeIn wow" data-wow-delay="0.3s"><?php echo $row4_title ?></h1>
						<?php } ?>
						
						<div class="content-section cf">
							<div class="flexrow">
								<div class="scol left fadeIn wow" data-wow-delay="0.5s">
									<?php if ($row4_text) { ?>
										<div class="text cf"><?php echo $row4_text; ?></div>
										<?php if ($row4_button_name && $row4_button_link) { ?>
										<div class="button cf"><a href="<?php echo $row4_button_link ?>" class="btn"><?php echo $row4_button_name ?></a></div>
										<?php } ?>
									<?php } ?>
								</div>

								<div class="scol right fadeIn wow" data-wow-delay="0.8s">
									<?php if ($row4_image) { ?>
										<div class="image">
											<img src="<?php echo $row4_image['url'] ?>" alt="<?php echo $row4_image['title'] ?>" />
										</div>
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
