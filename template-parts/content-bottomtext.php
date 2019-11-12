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