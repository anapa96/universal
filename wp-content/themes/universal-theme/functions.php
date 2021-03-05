<?php
//***ДОБАВЛЕНИЕ РАСШИРЕННЫХ ВОЗМОЖНОСТЕЙ (title)
//проверяем если ли функция universal_theme_setup
if ( ! function_exists( 'universal_theme_setup' ) ) :
  //если нет, то создаем ее
  function universal_theme_setup(){

    //добавляем тег title
    add_theme_support( 'title-tag' );

    //добавление миниатюр в админку к записям
    add_theme_support( 'post-thumbnails', array( 'post' ) );

    //добавление пользовательского логотипа
    add_theme_support( 'custom-logo', [
      'width'       => 163,
      //резиновая ширина и высота (ширину удалили)
      'flex-height' => true,
      //наверно alt
      'header-text' => 'Universal',
      //убирает ссылку на главную страницу, когда находимся на главной
      'unlink-homepage-logo' => false, // WP 5.5
    ] );

    //регистрация меню - register_nav_menus создает дырки под меню
    register_nav_menus( [
      'header_menu' => 'Меню в шапке',
      'footer_menu' => 'Меню в подвале'
    ] );
  }
endif;
//цепляемся к хуку after_setup_theme и выполняем universal_theme_setup
add_action( 'after_setup_theme', 'universal_theme_setup' );


//***ПОДКЛЮЧЕНИЕ СТИЛЕЙ И СКРИПТОВ
function enqueue_universal_style() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
                  /*название, где лежит, от каких файлов зависит, версия, для каких типов устройств*/
  wp_enqueue_style( 'universal-theme', get_template_directory_uri(  ) . '/assets/css/universal-theme.css', 'style');
  wp_enqueue_style( 'Roboto-Slab', 'https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@700&display=swap');
}
add_action( 'wp_enqueue_scripts', 'enqueue_universal_style' );
