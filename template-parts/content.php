<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Doly Blog
 */
if ( ! is_singular( ) ) : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail () ): ?>
	<div class="post-thumbnail">
		<?php doly_post_thumbnail(); ?>
	</div>
	<?php endif; ?>
	<div class="post-content">
		<?php doly_category();  ?>
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif; ?>
		</header><!-- .entry-header -->
		<?php
		if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php 
					doly_posted_on(); 
					doly_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div><!-- .entry-content -->
	</div>
</article>
<?php else: ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail () ): ?>
	<div class="post-thumbnail">
		<?php doly_post_thumbnail(); ?>
	</div>
	<?php endif; ?>
	<div class="post-content">
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif; ?>
		</header><!-- .entry-header -->

		<?php
		if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php 
					doly_posted_on(); 
					doly_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		<div class="entry-content">
			<?php

			if(is_single( )){
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'doly-blog' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);
			}else{
				the_excerpt();
			}
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'doly-blog' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->

		<?php if ( is_singular() ) : ?>
			<footer class="entry-footer">
				<?php doly_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
	</div>
</article>
<?php endif; ?>