<?php
/**
 *
 * Template Name: Big Image Header, Full Width
 * Page with a big image header.
 *
 * @package _s
 */

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
<style>
.hero--sub {
  background-image: url('<?php
    if ( has_post_thumbnail() ) {
      the_post_thumbnail_url('full');
    } ?>');
}
</style>
<section class="hero hero--sub" id="hero">
  <div class="container">
	  <?php the_title( '<h1>', '</h1>' ); ?>
	  <?php if (get_post_meta(get_the_ID(), 'lead')): ?>
      <div class="lead"><h2><?php the_meta(); ?></h2></div>
	  <?php endif; ?>
  </div>
  <div class="color-overlay"></div>
</section>
<section class="site-content container" id="content">
  <div class="row">
      <main class="col-12 col site-main" id="main" role="main">

              <?php get_template_part( 'template-parts/content', 'page' ); ?>

              <?php
                  // If comments are open or we have at least one comment, load up the comment template.
                  if ( comments_open() || get_comments_number() ) :
                      comments_template();
                  endif;
              ?>

          <?php endwhile; // End of the loop. ?>

      </main>
<?php //get_sidebar(); ?>
  </div>
</section>
<?php get_footer();
?>
