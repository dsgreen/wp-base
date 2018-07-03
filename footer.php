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
        </div><!--/row--><?php // from header.php ?>
	</div><!--/#content-->

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
