<?php
$banner = get_field('banner');
if( is_singular( array('projects') ) ) {
	$parentId = get_page_id_by_template('page-projects');
	$banner = get_field('banner',$parentId);
}

if($banner) { ?>
<div class="hero cf">
	<img src="<?php echo $banner['url'] ?>" alt="<?php echo $banner['title'] ?>" />
</div>
<?php } ?>