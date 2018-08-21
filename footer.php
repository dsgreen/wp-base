<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
<? if (
	!is_page_template('page-big-image.php') &&
	!is_page_template('page-big-image-full-width.php') &&
	!is_page_template('page-big-image-max-width.php')
) { ?>
        </div><!--/row--><?php // from header.php ?>
	</section><!--/#content-->
<?php } ?>

<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) : ?>
<section class="pre-footer">
  <div class="container">
    <div class="row">
      <?php if ( is_active_sidebar( 'footer-1' ) ) { ?>
      <div class="col-4 col">
	      <?php dynamic_sidebar( 'footer-1' ); ?>
      </div>
      <?php } ?>
      <?php if ( is_active_sidebar( 'footer-2' ) ) { ?>
      <div class="col-4 col">
	      <?php dynamic_sidebar( 'footer-2' ); ?>
      </div>
      <?php } ?>
      <?php if ( is_active_sidebar( 'footer-3' ) ) { ?>
      <div class="col-4 col">
	      <?php dynamic_sidebar( 'footer-3' ); ?>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
<?php endif; ?>

<footer class="site-footer" role="contentinfo">
	<div class="container site-info">
    <div class="row">
      <div class="half col">
				<p class="">&copy; Copyright 2018 <?php bloginfo( 'name' ); ?></p>
      </div>
      <div class="half col">
				<p class="text-right"><a href="#top"><?php esc_html_e( 'Back to top', '_s' ); ?></a></p>
      </div>
    </div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
