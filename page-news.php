<?php
/**
 * Template Name: News
 *
 */

get_header(); ?>

<div id="primary" class="content-area cf allnewspage">
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
		$catId = ( isset($_GET['catid']) && $_GET['catid'] ) ? $_GET['catid'] : '';
		$default_posts_per_page = get_option( 'posts_per_page' );
		$posts_per_page = ($default_posts_per_page) ? $default_posts_per_page : 12;
		$paged = ( get_query_var( 'pg' ) ) ? absint( get_query_var( 'pg' ) ) : 1;
		$post_type = 'post';
		$taxonomy = 'category';
		$terms = get_terms( array(
		    'taxonomy' => $taxonomy,
		    'post_types'=> array($post_type),
		    'hide_empty' => true,
		) );

		$args = array(
			'posts_per_page'=> $posts_per_page,
			'post_type'		=> $post_type,
			'post_status'	=> 'publish',
			'paged'			=> $paged,
			'orderby'       => 'date',       
		  	'order'         => 'DESC'
		);

		if($catId) {
			$args['tax_query'] = array( 
					array(
						'taxonomy' => $taxonomy, 
						'field'    => 'term_id',
						'terms'    => $catId, 
					),
				);
		}



		$news = new WP_Query($args); 
		$newsPosts = get_posts($args);
		$subtotal = ($newsPosts) ? count($newsPosts) : 0;
		$currentURL = get_permalink();
		$countCol = 'count'.$subtotal;
		?> 

		
		<section id="newsSection" class="section-news cf">

			<?php if ( $news->have_posts() ) {  ?> 

			<div id="innerPosts" class="wrapper">
			
				<?php if($terms) { ?>
				<div class="news-filter cf">
					<strong>Filter by:</strong> 
					<a href="<?php echo get_permalink(); ?>" class="all<?php echo ($catId) ? '':' active'?>">All</a>
					<?php foreach ($terms as $t) { 
					$termId = $t->term_id;
					$term = $t->name;
					$isActive = ($catId==$termId) ? ' active':'';
					?>
					<a href="<?php echo $currentURL ?>?catid=<?php echo $termId ?>" data-catid="<?php echo $termId ?>" class="category<?php echo $isActive ?>"><?php echo $term ?></a>	
					<?php } ?>
				</div>
				<?php } ?>
				
				<div class="news-wrapper">
					<div class="masonry grid <?php echo $countCol ?>">

						<div class="grid-sizer"></div>
						<?php while ( $news->have_posts() ) : $news->the_post(); ?>
							<?php 
							$pid = get_the_ID();
							$thumbId = get_post_thumbnail_id($pid);
							$img = wp_get_attachment_image_src($thumbId,'full');
							$px = get_bloginfo("template_url") . "/images/rectangle.png"; 
							$content = get_the_content();
							if($content) {
								$content = strip_tags($content);
								$content = strip_shortcodes($content);
								$content = shortenText($content, 70," ","...");
							}
							$categoryLists = '';
							$categories = get_the_terms($pid,$taxonomy);
							if($categories) {
								$n=1; foreach($categories as $e) {
									$locname = $e->name;
									$split = ($n>1) ? ', ':'';
									$categoryLists .= $split . $locname;
									$n++;
								}
							}
							$pageid = 'news' . $pid;
							?>

							<article id="<?php echo $pageid ?>" class="item grid-item lineup">
								<div class="inside cf">
									<?php if ($categoryLists) { ?>
									<div class="categoryname"><?php echo $categoryLists ?></div>	
									<?php } ?>
									<?php if ($img) { ?>
									<figure>
										<a href="<?php echo get_permalink() . '#content'; ?>" style="background-image:url('<?php echo $img[0] ?>');">
											<img src="<?php echo $px ?>" alt="" aria-hidden="true" />
										</a>
									</figure>
									<?php } ?>
									<div class="excerpt cf">
										<h2 class="title"><?php echo get_the_title(); ?></h2>
										<?php if ($content) { ?>
										<div class="text"><?php echo $content ?></div>
										<?php } ?>
										<div class="postdate"><?php echo get_the_date('F j, Y'); ?></div>
										<div class="btndiv"><a href="<?php echo get_permalink() . '#content'; ?>">Read &rsaquo;</a></div>
									</div>
								</div>
							</article>

						<?php endwhile; wp_reset_postdata(); ?>
					</div>
				</div>

				<?php
				    $total_pages = $news->max_num_pages;
				    $totalpost = $news->found_posts; 
				    if ($total_pages > 1){ ?>

				    	<div class="moreposts">
				    		<?php if ($paged==$total_pages) { ?>
				    			<span class="lastposts">No more posts to load.</span>
				    		<?php } else { ?>
				    		<a href="#" id="loadMoreBtn" data-posttype="<?php echo $post_type ?>" data-total="<?php echo $totalpost ?>" data-term="<?php echo $catId ?>" data-pg="1">Load More</a>
				    		<?php } ?>
				    	</div>
						
						<div id="paginationWrap" class="clear" style="display:none;">
					        <div id="pagination" class="pagination clear">
					            <?php
					                $pagination = array(
					                    'base' => @add_query_arg('pg','%#%'),
					                    'format' => '?paged=%#%',
					                    'current' => $paged,
					                    'total' => $total_pages,
					                    'prev_text' => __( '&laquo;', 'bellaworks' ),
					                    'next_text' => __( '&raquo;', 'bellaworks' ),
					                    'type' => 'plain'
					                );
					                echo paginate_links($pagination);
					            ?>
					        </div>
				        </div>
				        <?php
		    		} ?>

			</div>
			
			<?php } else {  ?>
			<div id="nopostfound" class="wrapper text-center">
				<h2>No post found.</h2>
			</div>
			<?php } ?>

			
		</section>


		



	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
