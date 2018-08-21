<?php
/**
 *
 * Template Name: Big Image Header, Max Width
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
	  <?php if ($lead = get_post_meta(get_the_ID(), 'lead', true)): ?>
      <div class="lead"><h2><?php echo esc_html($lead); ?></h2></div>
	  <?php endif; ?>
  </div>
  <div class="color-overlay"></div>
</section>
<section class="site-content" id="content">
  <main class="site-main" id="main" role="main">

              <?php get_template_part( 'template-parts/content', 'page' ); ?>

              <?php
                  // If comments are open or we have at least one comment, load up the comment template.
                  if ( comments_open() || get_comments_number() ) :
                      comments_template();
                  endif;
              ?>

          <?php endwhile; // End of the loop. ?>

  </main>
</section>
<?php get_footer();
?>
