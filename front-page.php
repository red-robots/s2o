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
		<div class="mobileImg" style="background-image:url('<?php echo $row1_image1['url'] ?>');">
		</div>
		<img class="rowImg" src="<?php echo $row1_image1['url'] ?>" alt="" aria-hidden="true" />
		<?php } ?>
	
		<div class="content-row">
			<?php if ($row1_image2) { ?>
			<div class="mobileImg" style="background-image:url('<?php echo $row1_image2['url'] ?>');"></div>
			<img class="rowImg" src="<?php echo $row1_image2['url'] ?>" alt="" aria-hidden="true" />	
			<?php } ?>
			<div class="textwrap">
				<div class="inner cf">
					
					<div class="innerText wow fadeInLeft">
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


	<?php  
		$row2_image1 = get_field('row2_image1');
		$row2_title_small = get_field('row2_title_small');
		$row2_title_large = get_field('row2_title_large');
		$row2_text = get_field('row2_text');
	?>
	<?php /* Row 2 */ ?>
	<section class="section cf row2">
		<?php if ($row2_image1) { ?>
		<div class="mobileImg" style="background-image:url('<?php echo $row2_image1['url'] ?>');"></div>
		<img class="rowImg" src="<?php echo $row2_image1['url'] ?>" alt="" aria-hidden="true" />
		<?php } ?>

		<div class="content-row">
			<div class="textwrap">
				<div class="inner cf wow fadeInRight">
					<div class="sHead cf">
						<?php if ($row2_title_small) { ?>
						<div class="titlesm xs"><?php echo $row2_title_small ?></div>	
						<?php } ?>
						<?php if ($row2_title_large) { ?>
						<div class="titlelg md"><?php echo $row2_title_large ?></div>	
						<?php } ?>
					</div>

					<?php if ($row2_text) { ?>
					<div class="text"><?php echo $row2_text ?></div>	
					<?php } ?>
				</div>
			</div>
		</div>
	</section>

	<?php  
		$row3_image1 = get_field('row3_image1');
		$row3_title_small = get_field('row3_title_small');
		$row3_title_large = get_field('row3_title_large');
	?>
	<?php /* Row 3 */ ?>
	<section class="section cf row3">
		<?php if ($row3_image1) { ?>
		<div class="mobileImg" style="background-image:url('<?php echo $row3_image1['url'] ?>');"></div>
		<img class="rowImg" src="<?php echo $row3_image1['url'] ?>" alt="" aria-hidden="true" />
		<?php } ?>

		<div class="content-row">
			<div class="textwrap">
				<div class="wrapper cf">
					<div class="sHead cf">
						<?php if ($row3_title_small) { ?>
						<div class="titlesm xs wow fadeInLeft" data-wow-delay=".3s"><?php echo $row3_title_small ?></div>	
						<?php } ?>
						<?php if ($row3_title_large) { ?>
						<div class="titlelg wow fadeInLeft" data-wow-delay="1s"><?php echo $row3_title_large ?></div>	
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>


	<?php  
		$row4_image = get_field('row4_image');
		$row4_title_large = get_field('row4_title_large');
		$row4_text2 = get_field('row4_text2');
	?>
	<?php /* Row 4 */ ?>
	<section class="section cf row4">
		<?php if ($row4_image) { ?>
		<div class="mobileImg" style="background-image:url('<?php echo $row4_image['url'] ?>');"></div>
		<img class="rowImg" src="<?php echo $row4_image['url'] ?>" alt="" aria-hidden="true" />
		<?php } ?>

		<div class="content-row">
			<div class="textwrap">
				<div class="inner cf wow fadeInRight">
					<div class="sHead cf">
						<?php if ($row4_title_large) { ?>
						<div class="titlelg"><?php echo $row4_title_large ?></div>	
						<?php } ?>
					</div>
					<?php if ($row4_text2) { ?>
					<div class="text"><?php echo $row4_text2 ?></div>	
					<?php } ?>
				</div>
			</div>
		</div>
	</section>


	<?php  
		$row5_image = get_field('row5_image');
		$row5_title_small = get_field('row5_title_small');
		$type_parks = get_field('type_parks');
		$row5_text = get_field('row5_text');
		$row5_button_name = get_field('row5_button_name');
		$row5_button_link = get_field('row5_button_link');
	?>
	<?php /* Row 5 */ ?>
	<section class="section cf row5">
		<?php if ($row5_image) { ?>
		<div class="mobileImg" style="background-image:url('<?php echo $row5_image['url'] ?>');"></div>
		<img class="rowImg" src="<?php echo $row5_image['url'] ?>" alt="" aria-hidden="true" />
		<?php } ?>

		<div class="content-row">
			<div class="textwrap">
				<div class="wrapper cf wow fadeIn">
					<div class="sHead cf">
						<?php if ($row5_title_small) { ?>
						<div class="titlesm xs"><?php echo $row5_title_small ?></div>	
						<?php } ?>
					</div>

					<?php if ($type_parks) { ?>
					<div class="largetexts">
						<?php $n=1; foreach ($type_parks as $p) { 
							$title = $p['title'];
							$icon = $p['icon']; 
							$seconds = $n + 2;
							if( $n % 2 == 0 ) {
								$seconds = $n + 4;
							}
							?>
							<div class="titlelg wow fadeInLeft" data-wow-delay=".<?php echo $seconds;?>s">
								<div class="ttxt"><?php echo $title ?></div>
								<?php if ($icon) { ?>
								<div class="timg"><img src="<?php echo $icon['url'] ?>" alt="<?php echo $icon['title'] ?>" class="img" /></div>
								<?php } ?>
							</div>	
						<?php $n++; } ?>
					</div>
					<?php } ?>

					<?php if ($row5_text) { ?>
					<div class="text wow fadeIn" data-wow-delay="1.5s"><?php echo $row5_text ?></div>	
					<?php } ?>

					<?php if ($row5_button_name && $row5_button_link) { ?>
					<div class="sbutton wow fadeIn" data-wow-delay="1.5s"><a href="<?php echo $row5_button_link ?>" class="btn"><?php echo $row5_button_name ?></a></div>	
					<?php } ?>
				</div>
			</div>
		</div>
	</section>


	<?php  
		$row6_image = get_field('row6_image');
		$row6_title_small = get_field('row6_title_small');
		$row6_title_large = get_field('row6_title_large');
		$row6_text = get_field('row6_text');
		$row6_button_name = get_field('row6_button_name');
		$row6_button_link = get_field('row6_button_link');
	?>
	<?php /* Row 6 */ ?>
	<section class="section cf row6">
		<?php if ($row6_image) { ?>
		<div class="mobileImg" style="background-image:url('<?php echo $row6_image['url'] ?>');"></div>
		<img class="rowImg" src="<?php echo $row6_image['url'] ?>" alt="" aria-hidden="true" />
		<?php } ?>

		<div class="content-row">
			<div class="textwrap">
				<div class="inner cf wow fadeInRight">
					<div class="sHead cf">
						<?php if ($row6_title_small) { ?>
						<div class="titlesm xs"><?php echo $row6_title_small ?></div>	
						<?php } ?>
						<?php if ($row6_title_large) { ?>
						<div class="titlelg md"><?php echo $row6_title_large ?></div>	
						<?php } ?>
					</div>

					<?php if ($row6_text) { ?>
					<div class="text"><?php echo $row6_text ?></div>	
					<?php } ?>

					<?php if ($row6_button_name && $row6_button_link) { ?>
					<div class="sbutton"><a href="<?php echo $row6_button_link ?>" class="btn white"><?php echo $row6_button_name ?></a></div>	
					<?php } ?>
				</div>
			</div>
		</div>
	</section>

	<?php  
		$row7_image1 = get_field('row7_image');
		$row7_title_large = get_field('row7_title_large');
		$row7_text = get_field('row7_text');
		$row7_button_name = get_field('row7_button_name');
		$row7_button_link = get_field('row7_button_link');
	?>

	<?php /* Row 7 */ ?>
	<section class="section cf row7">
		<?php if ($row7_image1) { ?>
		<div class="mobileImg" style="background-image:url('<?php echo $row7_image1['url'] ?>');">
		</div>
		<img class="rowImg" src="<?php echo $row7_image1['url'] ?>" alt="" aria-hidden="true" />
		<?php } ?>
	
		<div class="content-row">
			<div class="textwrap">
				<div class="inner cf">
					
					<div class="innerText wow fadeInLeft">
						<div class="sHead cf">
							<?php if ($row7_title_large) { ?>
							<div class="titlelg"><?php echo $row7_title_large ?></div>	
							<?php } ?>
						</div>
						
						<?php if ($row7_text) { ?>
						<div class="text"><?php echo $row7_text ?></div>	
						<?php } ?>

						<?php if ($row7_button_name && $row7_button_link) { ?>
						<div class="sbutton"><a href="<?php echo $row7_button_link ?>" class="btn"><?php echo $row7_button_name ?></a></div>	
						<?php } ?>

					</div>

				</div>
			</div>
		</div>
	</section>


	<?php  
		$row8_image1 = get_field('row8_image1');
		$row8_image2 = get_field('row8_image2');
		$row8_title_large = get_field('row8_title_large');
		$row8_text = get_field('row8_text');
		$row8_button_name = get_field('row8_button_name');
		$row8_button_link = get_field('row8_button_link');
	?>

	<?php /* Row 8 */ ?>
	<section class="section cf row8">
		<?php if ($row8_image1) { ?>
		<div class="mobileImg" style="background-image:url('<?php echo $row8_image1['url'] ?>');">
		</div>
		<img class="rowImg" src="<?php echo $row8_image1['url'] ?>" alt="" aria-hidden="true" />
		<?php } ?>
	
		<div class="content-row">
			<div class="textwrap">
				<div class="inner cf">
					
					<div class="innerText wow fadeInRight">
						<div class="sHead cf">
							<?php if ($row8_title_large) { ?>
							<div class="titlelg"><?php echo $row8_title_large ?></div>	
							<?php } ?>
						</div>
						
						<?php if ($row8_text) { ?>
						<div class="text"><?php echo $row8_text ?></div>	
						<?php } ?>

						<?php if ($row8_button_name && $row8_button_link) { ?>
						<div class="sbutton"><a href="<?php echo $row8_button_link ?>" class="btn"><?php echo $row8_button_name ?></a></div>	
						<?php } ?>

					</div>

				</div>
			</div>
		</div>

		<?php if ($row8_image2) { ?>
		<div class="imageLayer2">
			<div class="mobileImg" style="background-image:url('<?php echo $row8_image2['url'] ?>');">
			</div>
			<img class="rowImg" src="<?php echo $row8_image2['url'] ?>" alt="" aria-hidden="true" />
		</div>
		<?php } ?>
	</section>

<?php endwhile; ?>
<?php
get_footer();
