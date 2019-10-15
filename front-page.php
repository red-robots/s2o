<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<h1 class="hide"><?php the_title(); ?></h1>
	
	<?php  
		$row1_image1 = get_field('row1_image1');
		$row1_image2 = get_field('row1_image2');
		$row1_title_small = get_field('row1_title_small');
		$row1_title_large = get_field('row1_title_large');
		$row1_text = get_field('row1_text');
		$row1_button_name = get_field('row1_button_name');
		$row1_button_link = get_field('row1_button_link');
	?>

	<?php /* Row 1 */ ?>
	<section class="section cf row1">
		<?php if ($row1_image1) { ?>
		<div class="mobileImg" style="background-image:url('<?php echo $row1_image1['url'] ?>');"></div>
		<img class="rowImg" src="<?php echo $row1_image1['url'] ?>" alt="" aria-hidden="true" />	
		<?php } ?>
	
		<div class="content-row">
			<?php if ($row1_image2) { ?>
			<div class="mobileImg" style="background-image:url('<?php echo $row1_image2['url'] ?>');"></div>
			<img class="rowImg" src="<?php echo $row1_image2['url'] ?>" alt="" aria-hidden="true" />	
			<?php } ?>
			<div class="textwrap">
				<div class="inner cf">
					
					<div class="innerText">
						<div class="sHead cf">
							<?php if ($row1_title_small) { ?>
							<div class="titlesm"><?php echo $row1_title_small ?></div>	
							<?php } ?>
							<?php if ($row1_title_large) { ?>
							<div class="titlelg"><?php echo $row1_title_large ?></div>	
							<?php } ?>
						</div>
						
						<?php if ($row1_text) { ?>
						<div class="text"><?php echo $row1_text ?></div>	
						<?php } ?>

						<?php if ($row1_button_name && $row1_button_link) { ?>
						<div class="sbutton"><a href="<?php echo $row1_button_link ?>" class="btn"><?php echo $row1_button_name ?></a></div>	
						<?php } ?>

					</div>

				</div>
			</div>
		</div>

	</section>


<?php endwhile; ?>
<?php
get_footer();
