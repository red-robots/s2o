	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrapper">
			<?php 
			$foot_icon = get_field('opt_footer_icon','option');
			$foot_text = get_field('opt_footer_text','option');
			?>
			<?php if ($foot_text) { ?>
			<div class="foot-info">
				<div class="midtext">
					<div class="flex clear">
						<?php if ($foot_icon) { ?>
							<div class="foot-icon">
								<img src="<?php echo $foot_icon['url'] ?>" alt="<?php echo $foot_icon['title'] ?>" />
							</div>
						<?php } ?>
						<div class="foot-text">
							<?php echo $foot_text ?>
						</div>
					</div>
				</div>
			</div>	
			<?php } ?>
			
			<?php if ( has_nav_menu( 'footer' ) ) { ?>
			<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu','container_class'=>'footer-menu',) ); ?>
			<?php } ?>
		</div><!-- wrapper -->

			<?php  
				$foot_info[] = get_field('opt_company_name','option');
				$foot_info[] = get_field('opt_address1','option');
				$foot_info[] = get_field('opt_address2','option');
				//$foot_info[] = ( get_field('opt_phone','option') ) ? 'Cell: ' . '<a href="tel:'.format_phone_number(get_field('phone','option')).'">'.get_field('phone','option').'</a>' : '';
				$foot_info[] = ( get_field('opt_phone','option') ) ? 'Cell: ' . get_field('phone','option') : '';
				$foot_info[] = ( get_field('opt_fax','option') ) ? 'Office/fax: ' . get_field('fax','option') : '';
				$social_media = get_social_links();
			?>
			<div class="foot-contact-info clear">
				<ul class="footcontact">
				<?php foreach ($foot_info as $val) { ?>
					<?php if ($val) { ?>
					<li class="info"><?php echo $val ?></li>
					<?php } ?>	
				<?php } ?>
					<li class="social-media">
						<div class="social">
							<?php foreach ($social_media as $field=>$s) { 
							$icon = $s['icon'];
							$link = $s['link']; ?>
							<a href="<?php echo $link ?>" target="_blank" class="social-link"><i class="<?php echo $icon ?>"></i><span style="display:none;"><?php echo $field; ?></span></a>	
							<?php } ?>
						</div>
					</li>
				</ul>
			</div>

		
	</footer><!-- #colophon -->
</div><!-- #page -->
<div id="loaderdiv"><div class="loader"><span class="loadtxt">Loading...</span></div></div>
<?php wp_footer(); ?>

</body>
</html>
