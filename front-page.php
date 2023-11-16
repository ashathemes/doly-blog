<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Doly Blog 
 */
get_header();

$wp_q = new WP_Query(
    array(

        'posts_per_page' => 1,
        'post_type' => 'post',
        'ignore_sticky_posts' => 1
        ),
    );
?>
<div class="bannar-area">
<?php if ( $wp_q->have_posts() ) {
    while ( $wp_q->have_posts() ) : $wp_q->the_post(); ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="content-overlay">
                        <h2 class="static-heading"><?php the_title(); ?></h2>
                        <div class="static-des">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <?php if ( has_post_thumbnail () ):
                        the_post_thumbnail(); 
                    else : ?>
                    <img src="<?php echo esc_url (get_stylesheet_directory_uri() . '/assets/img/02.jpg' ); ?>" alt="<?php the_title(); ?>">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php  endwhile; 
    } else { ?>
      <?php  get_template_part( 'template-parts/content', 'none' ); ?>
    <?php }
    wp_reset_postdata(); ?>
</div>



<?php 
$wp_lestest = new WP_Query(
    array(

        'posts_per_page' => 3,
        'post_type' => 'post',
        'ignore_sticky_posts' => 1
        ),
    );
?>
<div class="lastest-post">
    <div class="container">
        <div class="row">
  <?php if ( $wp_lestest->have_posts() ) {
    while ( $wp_lestest->have_posts() ) : $wp_lestest->the_post(); ?>
            <div class="col-lg-4">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="post-thumbnail">
                        <?php if ( has_post_thumbnail () ):
                            the_post_thumbnail(); 
                        else : ?>
                        <img src="<?php echo esc_url (get_stylesheet_directory_uri() . '/assets/img/01.jpg' ); ?>" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                    </div>
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
                            <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                        </div><!-- .entry-content -->
                    </div>
                </article>
            </div>
    <?php  endwhile; }
    wp_reset_postdata(); ?> 
        </div>
    </div> 
</div>
<?php
get_footer();