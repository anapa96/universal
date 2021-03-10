<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package universal-example
 */
//если есть сайдар с id main-sidebar
if ( ! is_active_sidebar( 'main-sidebar' ) ) {
  //nj продолжаем работу в этом файле
	return;
}
?>

<aside id="secondary" class="sidebar-front-page">
	<?php dynamic_sidebar( 'main-sidebar' ); ?>
</aside><!-- #secondary -->
