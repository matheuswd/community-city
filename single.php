<?php get_header() ?>
<div class="container">
	<div class="col-md-8 primary">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/BlogPosting">
			<header>
				<figure><?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?></figure>
				<h2 class="post-title" itemprop="headline"><?php the_title(); ?></h2>
				<p class="metadata">
					<?php _e( "Published by:", "commcitytheme" ); ?> <a href="" itemprop="author" itemscope itemtype="http://schema.org/Person"><span itemprop="name"><?php the_author(); ?></span></a> <?php _e( "at", "commcitytheme" ); ?> <span itemprop="datePublished" content="<?php the_date( 'y-m-d' ); ?>"><?php the_date( 'd/m/Y' ); ?></span> <?php _e( "in category", "commcitytheme" ); ?> <?php the_category( ', ' ); ?>
				</p>
			</header>
			<div class="content" itemprop="articleBody">
				<?php
					the_content();
					the_tags( '<ul class="tags"><li>' . __( 'Tags', 'commcitytheme' ) . ':</li><li>', '</li><li>', '</li></ul>' );
				 	$args_link_pages = array(
						'before'           => '<p>' . __( 'Pages:', 'commcitytheme' ),
						'nextpagelink'     => __( 'Next page', 'commcitytheme' ),
						'previouspagelink' => __( 'Previous page', 'commcitytheme' ),
					);
					wp_link_pages( $args_link_pages );
					comment_form();
					wp_list_comments();
					paginate_comments_links();
				?>
			</div>
		</article>
	<?php endwhile; ?>
	<!-- post navigation -->
<?php else: ?>
	<!-- no posts found -->
<?php endif; ?>
</div>

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
