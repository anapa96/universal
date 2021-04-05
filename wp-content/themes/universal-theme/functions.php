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
		add_action( 'init', 'register_post_types' );


		
		function register_post_types(){
			register_post_type( 'lesson', [
				'label'  => null,
				'labels' => [
					'name'               => 'Уроки', // основное название для типа записи
					'singular_name'      => 'Урок', // название для одной записи этого типа
					'add_new'            => 'Добавить урок', // для добавления новой записи
					'add_new_item'       => 'Добавление урока', // заголовка у вновь создаваемой записи в админ-панели.
					'edit_item'          => 'Редактирование урока', // для редактирования типа записи
					'new_item'           => 'Новый урок', // текст новой записи
					'view_item'          => 'Смотреть уроки', // для просмотра записи этого типа.
					'search_items'       => 'Искать уроки', // для поиска по этим типам записи
					'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
					'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
					'parent_item_colon'  => '', // для родителей (у древовидных типов)
					'menu_name'          => 'Уроки', // название меню
				],
				'description'         => 'Раздел с видеоуроками',
				'public'              => true,
				// 'publicly_queryable'  => null, // зависит от public
				// 'exclude_from_search' => null, // зависит от public
				// 'show_ui'             => null, // зависит от public
				// 'show_in_nav_menus'   => null, // зависит от public
				'show_in_menu'        => true, // показывать ли в меню адмнки
				// 'show_in_admin_bar'   => null, // зависит от show_in_menu
				'show_in_rest'        => true, // добавить в REST API. C WP 4.7
				'rest_base'           => null, // $post_type. C WP 4.7
				'menu_position'       => 5,
				'menu_icon'           => 'dashicons-welcome-learn-more',
				'capability_type'   => 'post',
				//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
				//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
				'hierarchical'        => false,
				'supports'            => [ 'title', 'editor', 'thumbnail', 'custom-fields' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
				'taxonomies'          => [],
				'has_archive'         => true,
				'rewrite'             => true,
				'query_var'           => true,
			] );
		}
  }
endif;
//цепляемся к хуку after_setup_theme и выполняем universal_theme_setup
add_action( 'after_setup_theme', 'universal_theme_setup' );

/**
 * Подключение сайдбара
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
//создаем функцию universal_theme_widgets_init
function universal_theme_widgets_init() {
  //регистрируем сайдбар
	register_sidebar(
		array(
      //название сайдбара
			'name'          => esc_html__( 'Сайдбар на главной сверху', 'universal-example' ),
			'id'            => 'main-sidebar-top',
			'description'   => esc_html__( 'Добавьте виджиты сюда', 'universal-example' ),
      //что будет перед этим виджитом: section с id виджита и классом
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
      //после виджита
			'after_widget'  => '</section>',
      //ешеду виджета
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	//регистрируем сайдбар
	register_sidebar(
		array(
      //название сайдбара
			'name'          => esc_html__( 'Сайдбар на главной снизу', 'universal-example' ),
			'id'            => 'main-sidebar-bottom',
			'description'   => esc_html__( 'Здесь выводим последние посты', 'universal-example' ),
      //что будет перед этим виджитом: section с id виджита и классом
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
      //после виджита
			'after_widget'  => '</section>',
      //ешеду виджета
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
//вешаем функцию universal_theme_widgets_init (инициализация стандартных виджетов wp) на хук-событие widgets_init. 
add_action( 'widgets_init', 'universal_theme_widgets_init' );

	//регистрируем сайдбар
	register_sidebar(
		array(
      //название сайдбара
			'name'          => esc_html__( 'Меню в подвале', 'universal-example' ),
			'id'            => 'sidebar-footer',
			'description'   => esc_html__( 'Добавьте меню сюда', 'universal-example' ),
      //что будет перед этим виджитом: section с id виджита и классом
			'before_widget' => '<section id="%1$s" class="footer-menu %2$s">',
      //после виджита
			'after_widget'  => '</section>',
      //ешеду виджета
			'before_title'  => '<h2 class="footer-title">',
			'after_title'   => '</h2>',
		)
	);
	//регистрируем сайдбар
	register_sidebar(
		array(
      //название сайдбара
			'name'          => esc_html__( 'Текст в подвале', 'universal-example' ),
			'id'            => 'sidebar-footer-text',
			'description'   => esc_html__( 'Добавьте текст сюда', 'universal-example' ),
      //что будет перед этим виджитом: section с id виджита и классом
			'before_widget' => '<section id="%1$s" class="footer-text %2$s">',
      //после виджита
			'after_widget'  => '</section>',
      //ешеду виджета
			'before_title'  => '',
			'after_title'   => '',
		)
	);
	//регистрируем сайдбар
	register_sidebar(
		array(
      //название сайдбара
			'name'          => esc_html__( 'Сайдбар на странице поиска', 'universal-example' ),
			'id'            => 'main-sidebar-search',
			'description'   => esc_html__( 'Добавьте виджиты сюда', 'universal-example' ),
      //что будет перед этим виджитом: section с id виджита и классом
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
      //после виджита
			'after_widget'  => '</section>',
      //ешеду виджета
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
//вешаем функцию universal_theme_widgets_init (инициализация стандартных виджетов wp) на хук-событие widgets_init. 
add_action( 'widgets_init', 'universal_theme_widgets_init' );








/**
 * Добавление нового виджета Downloader_Widget.
 */
class Downloader_Widget extends WP_Widget {

	// Регистрация виджета используя основной класс
	function __construct() {
		// вызов конструктора выглядит так:
		// __construct( $id_base, $name, $widget_options = array(), $control_options = array() )
		parent::__construct(
			'downloader_widget', // ID виджета, если не указать (оставить ''), то ID будет равен названию класса в нижнем регистре: downloader_widget
			'Полезные файлы',
			array( 'description' => 'Файлы для скачивания', 'classname' => 'widget-downloader', )
		);

		// скрипты/стили виджета, только если он активен
		if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
			add_action('wp_enqueue_scripts', array( $this, 'add_downloader_widget_scripts' ));
			add_action('wp_head', array( $this, 'add_downloader_widget_style' ) );
		}
	}

	/**
	 * Вывод виджета во Фронт-энде
	 *
	 * @param array $args     аргументы виджета.
	 * @param array $instance сохраненные данные из настроек
	 */
	function widget( $args, $instance ) {
		$title = $instance['title'];
		$description = $instance['description'];
		$link = $instance['link'];

		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		if ( ! empty( $description ) ) {
			echo '<p>'.$description.'</p>';
		}
		if ( ! empty( $link ) ) {
			echo '<a class="widget-link" target="_blank" href="'.$link.'">
			<svg width="20" height="20" fill="#fff" class="widget-link-icon">	<use xlink:href="' . get_template_directory_uri() . '/assets/images/sprite.svg#download"></use>
			</svg>
			Скачать</a>';
		}
		echo $args['after_widget'];
	}

	/**
	 * Админ-часть виджета
	 *
	 * @param array $instance сохраненные данные из настроек
	 */
	function form( $instance ) {
		$title = @ $instance['title'] ?: 'Полезные файлы';
		$description  = @ $instance['description'] ?: 'Описание';
		$link  = @ $instance['link'] ?: 'http://yandex.ru/';

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Заголовок:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
    <p>
			<label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Описание:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" 
      name="<?php echo $this->get_field_name( 'description' ); ?>" type="text" value="<?php echo esc_attr( $description ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e( 'Ссылка на файл:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" 
      name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>">
		</p>
		<?php 
	}

	/**
	 * Сохранение настроек виджета. Здесь данные должны быть очищены и возвращены для сохранения их в базу данных.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance новые настройки
	 * @param array $old_instance предыдущие настройки
	 *
	 * @return array данные которые будут сохранены
	 */
	function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';
		$instance['link'] = ( ! empty( $new_instance['link'] ) ) ? strip_tags( $new_instance['link'] ) : '';

		return $instance;
	}

	// скрипт виджета
	function add_downloader_widget_scripts() {
		// фильтр чтобы можно было отключить скрипты
		if( ! apply_filters( 'show_my_widget_script', true, $this->id_base ) )
			return;

		$theme_url = get_stylesheet_directory_uri();

		wp_enqueue_script('my_widget_script', $theme_url .'/my_widget_script.js' );
	}

	// стили виджета
	function add_downloader_widget_style() {
		// фильтр чтобы можно было отключить стили
		if( ! apply_filters( 'show_my_widget_style', true, $this->id_base ) )
			return;
		?>
		<style type="text/css">
			.my_widget a{ display:inline; }
		</style>
		<?php
	}

} 
// конец класса Downloader_Widget

// регистрация Downloader_Widget в WordPress
function register_downloader_widget() {
	register_widget( 'Downloader_Widget' );
}
add_action( 'widgets_init', 'register_downloader_widget' );







/**
 * Добавление нового виджета Social_Network_Widget
 */
class Social_Network_Widget extends WP_Widget {

	// Регистрация виджета используя основной класс
	function __construct() {
		// вызов конструктора выглядит так:
		// __construct( $id_base, $name, $widget_options = array(), $control_options = array() )
		parent::__construct(
			'social_network_widget', // ID виджета, если не указать (оставить ''), то ID будет равен названию класса в нижнем регистре: social_network_widget
			'Наши соцсети',
			array( 'description' => 'Ссылки на социальные сети','classname' => 'widget-social-network',)
		);

		// скрипты/стили виджета, только если он активен
		if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
			add_action('wp_enqueue_scripts', array( $this, 'add_social_network_widget_scripts' ));
			add_action('wp_head', array( $this, 'add_social_network_widget_style' ) );
		}
	}

	/**
	 * Вывод виджета во Фронт-энде
	 *
	 * @param array $args     аргументы виджета.
	 * @param array $instance сохраненные данные из настроек
	 */
	function widget( $args, $instance ) {
		$title = $instance['title'];
		$link_facebook = $instance['link_facebook'];
		$link_twitter = $instance['link_twitter'];
		$link_youtube = $instance['link_youtube'];
		$link_instagram = $instance['link_instagram'];
		$link_vk = $instance['link_vk'];


		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		if ( ! empty( $link_facebook ) ) {
			echo '<a href="' . $link_facebook . '" target="_blank"><img src="' .get_template_directory_uri() . '/assets/images/social-icon/facebook.svg"></a>';
		}
		if ( ! empty( $link_twitter ) ) {
			echo '<a href="' . $link_twitter . '" target="_blank"><img src="' .get_template_directory_uri() . '/assets/images/social-icon/twitter.svg"></a>';
		}
		if ( ! empty( $link_youtube ) ) {
			echo '<a href="' . $link_youtube . '" target="_blank"><img src="' .get_template_directory_uri() . '/assets/images/social-icon/youtube.svg"></a>';
		}
		if ( ! empty( $link_instagram ) ) {
			echo '<a href="' . $link_instagram . '" target="_blank"><img src="' .get_template_directory_uri() . '/assets/images/social-icon/instagram.svg"></a>';
		}
		if ( ! empty( $link_vk ) ) {
			echo '<a href="' . $link_vk. '" target="_blank"><img src="' .get_template_directory_uri() . '/assets/images/social-icon/vk.svg"></a>';
		}
		echo $args['after_widget'];
	}
	

	/**
	 * Админ-часть виджета
	 *
	 * @param array $instance сохраненные данные из настроек
	 */
	function form( $instance ) {
		$title = @ $instance['title'] ?: 'Наши соцсети';
		$link_facebook = @ $instance['link_facebook'] ?: 'https://facebook.com/MarilynManson/';
		$link_twitter = @ $instance['link_twitter'] ?: 'https://twitter.com/marilynmanson';
		$link_youtube = @ $instance['link_youtube'] ?: 'https://www.youtube.com/channel/UCbirjI1K3MGu0-Y1gTBNR5w';
		$link_instagram = @ $instance['link_instagram'] ?: 'https://www.instagram.com/marilynmanson/';
		$link_vk = @ $instance['link_vk'] ?: 'https://vk.com/marilynmanson';
		
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Заголовок:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'link_facebook' ); ?>"><?php _e( 'Фейсбук:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'link_facebook' ); ?>" name="<?php echo $this->get_field_name( 'link_facebook' ); ?>" type="text" value="<?php echo esc_attr( $link_facebook ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'link_twitter' ); ?>"><?php _e( 'Твитер:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'link_twitter' ); ?>" name="<?php echo $this->get_field_name( 'link_twitter' ); ?>" type="text" value="<?php echo esc_attr( $link_twitter ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'link_youtube' ); ?>"><?php _e( 'Ютуб:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'link_youtube' ); ?>" name="<?php echo $this->get_field_name( 'link_youtube' ); ?>" type="text" value="<?php echo esc_attr( $link_youtube ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'link_instagram' ); ?>"><?php _e( 'Инстаграм:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'link_instagram' ); ?>" name="<?php echo $this->get_field_name( 'link_instagram' ); ?>" type="text" value="<?php echo esc_attr( $link_instagram ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'link_vk' ); ?>"><?php _e( 'ВКонтакте:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'link_vk' ); ?>" name="<?php echo $this->get_field_name( 'link_vk' ); ?>" type="text" value="<?php echo esc_attr( $link_vk ); ?>">
		</p>
		
		<?php 
	}

	/**
	 * Сохранение настроек виджета. Здесь данные должны быть очищены и возвращены для сохранения их в базу данных.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance новые настройки
	 * @param array $old_instance предыдущие настройки
	 *
	 * @return array данные которые будут сохранены
	 */
	function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['link_facebook'] = ( ! empty( $new_instance['link_facebook'] ) ) ? strip_tags( $new_instance['link_facebook'] ) : '';
		$instance['link_twitter'] = ( ! empty( $new_instance['link_twitter'] ) ) ? strip_tags( $new_instance['link_twitter'] ) : '';
		$instance['link_youtube'] = ( ! empty( $new_instance['link_youtube'] ) ) ? strip_tags( $new_instance['link_youtube'] ) : '';
		$instance['link_instagram'] = ( ! empty( $new_instance['link_instagram'] ) ) ? strip_tags( $new_instance['link_instagram'] ) : '';
		$instance['link_vk'] = ( ! empty( $new_instance['link_vk'] ) ) ? strip_tags( $new_instance['link_vk'] ) : '';

		return $instance;
	}

	// скрипт виджета
	function add_social_network_widget_scripts() {
		// фильтр чтобы можно было отключить скрипты
		if( ! apply_filters( 'show_my_widget_script', true, $this->id_base ) )
			return;

		$theme_url = get_stylesheet_directory_uri();

		wp_enqueue_script('my_widget_script', $theme_url .'/my_widget_script.js' );
	}

	// стили виджета
	function add_social_network_widget_style() {
		// фильтр чтобы можно было отключить стили
		if( ! apply_filters( 'show_my_widget_style', true, $this->id_base ) )
			return;
		?>
		<style type="text/css">
			.my_widget a{ display:inline; }
		</style>
		<?php
	}

} 
// конец класса Social_Network_Widget

// регистрация Social_Network_Widget в WordPress
function register_social_network_widget() {
	register_widget( 'Social_Network_Widget' );
}
add_action( 'widgets_init', 'register_social_network_widget' );






/**
 * Добавление нового виджета Recent_Posts_Widget.
 */
class Recent_Posts_Widget extends WP_Widget {

	// Регистрация виджета используя основной класс
	function __construct() {
		// вызов конструктора выглядит так:
		// __construct( $id_base, $name, $widget_options = array(), $control_options = array() )
		parent::__construct(
			'recent_posts_widget', // ID виджета, если не указать (оставить ''), то ID будет равен названию класса в нижнем регистре: recent_posts_widget
			'Недавно опубликовано',
			array( 'description' => 'Последние посты', 'classname' => 'widget-recent-posts', )
		);

		// скрипты/стили виджета, только если он активен
		if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
			add_action('wp_enqueue_scripts', array( $this, 'add_recent_posts_widget_scripts' ));
			add_action('wp_head', array( $this, 'add_recent_posts_widget_style' ) );
		}
	}

	/**
	 * Вывод виджета во Фронт-энде
	 *
	 * @param array $args     аргументы виджета.
	 * @param array $instance сохраненные данные из настроек
	 */
	function widget( $args, $instance ) {
		$title = $instance['title'];
		$count = $instance['count'];

		echo $args['before_widget'];
		
		if ( ! empty( $count ) ) {
			if ( ! empty( $title ) ) {
				echo $args['before_title'] . $title . $args['after_title'];
			}
			echo '<div class="widget-recent-posts-wrapper">';
			global $post;
			$postslist = get_posts( array( 'posts_per_page' => $count, 'order'=> 'DESC', 'orderby' => 'date' ) );
			foreach ( $postslist as $post ){
				setup_postdata($post);
				?>
				<a href="<?php the_permalink()?>" class="recent-post-link">
					<img class="recent-post-thumb" src="<?php echo get_the_post_thumbnail_url( null,'thumbnail')?>">
					<div class="recent-post-info">
					<h4 class="resent-post-title"> 	<?php echo mb_strimwidth(get_the_title(), 0, 30, '...') ?> </h4>
					
					  <span class="recent-post-time">
						<?php $time_diff = human_time_diff( get_post_time('U'), current_time('timestamp') );
									echo "$time_diff назад";
									//> Опубликовано 5 лет назад. ?>
						</span>
					</div>
					
				</a>
				<?php
			}
			wp_reset_postdata();
			echo '</div>';
		}
		echo $args['after_widget'];
	}

	/**
	 * Админ-часть виджета
	 *
	 * @param array $instance сохраненные данные из настроек
	 */
	function form( $instance ) {
		$title = @ $instance['title'] ?: 'Недавно опубликовано';
		$count  = @ $instance['count'] ?: '7';

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Заголовок:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
    <p>
			<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e( 'Количество постов:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" 
      name="<?php echo $this->get_field_name( 'count' ); ?>" type="text" value="<?php echo esc_attr( $count ); ?>">
		</p>
		<?php 
	}

	/**
	 * Сохранение настроек виджета. Здесь данные должны быть очищены и возвращены для сохранения их в базу данных.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance новые настройки
	 * @param array $old_instance предыдущие настройки
	 *
	 * @return array данные которые будут сохранены
	 */
	function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['count'] = ( ! empty( $new_instance['count'] ) ) ? strip_tags( $new_instance['count'] ) : '';
	

		return $instance;
	}

	// скрипт виджета
	function add_recent_posts_widget_scripts() {
		// фильтр чтобы можно было отключить скрипты
		if( ! apply_filters( 'show_my_widget_script', true, $this->id_base ) )
			return;

		$theme_url = get_stylesheet_directory_uri();

		wp_enqueue_script('my_widget_script', $theme_url .'/my_widget_script.js' );
	}

	// стили виджета
	function add_recent_posts_widget_style() {
		// фильтр чтобы можно было отключить стили
		if( ! apply_filters( 'show_my_widget_style', true, $this->id_base ) )
			return;
		?>
		<style type="text/css">
			.my_widget a{ display:inline; }
		</style>
		<?php
	}

} 
// конец класса Recent_Posts_Widget

// регистрация Recent_Posts_Widget в WordPress
function register_recent_posts_widget() {
	register_widget( 'Recent_Posts_Widget' );
}
add_action( 'widgets_init', 'register_recent_posts_widget' );


//*********************конец виджетов */ */



//***ПОДКЛЮЧЕНИЕ СТИЛЕЙ И СКРИПТОВ
function enqueue_universal_style() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
                  /*название, где лежит, от каких файлов зависит, версия, для каких типов устройств*/
									wp_enqueue_style( 'swiper-slider', get_template_directory_uri(  ) . '/assets/css/swiper-bundle.min.css', 'style');
  wp_enqueue_style( 'universal-theme', get_template_directory_uri(  ) . '/assets/css/universal-theme.css', 'style');
	
  wp_enqueue_style( 'Roboto-Slab', 'https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@700&display=swap');
	wp_enqueue_script( 'swiper', get_template_directory_uri(  ) . '/assets/js/swiper-bundle.min.js', null, time(), true);
	wp_enqueue_script( 'scripts', get_template_directory_uri(  ) . '/assets/js/scripts.js', 'swiper', time(), true);
	wp_deregister_script( 'jquery-core' );
	wp_register_script( 'jquery-core', '//code.jquery.com/jquery-3.6.0.min.js');
	wp_enqueue_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_universal_style' );

//AGAX
//c помощью add_action цепляемся к wp_enqueue_scripts и добаляем функцию adminAjax_data
add_action( 'wp_enqueue_scripts', 'adminAjax_data', 99 );
function adminAjax_data(){
	//с помощью wp_localize_script
	wp_localize_script( 'jquery', 'adminAjax',
	//получаем url файла adminAjax
		array(
			'url' => admin_url('admin-ajax.php')
		)
	);

}
add_action( 'wp_ajax_contacts_form', 'ajax_form' );
add_action( 'wp_ajax_nopriv_contacts_form', 'ajax_form' );
function ajax_form() {
	$contact_name = $_POST[contact_name];
	$contact_email = $_POST[contact_email];
	$contact_comment = $_POST[contact_comment];

	$message ='Пользователь оставил свои данные: ' . $contact_name;
	$headers = 'From: Анастасия Пляс <ana.p.a@gmail.com>' . "\r\n";
	
	$sent_message = wp_mail('ana.p.a@gmail.ru', 'Новая заявка с сайта', $message, $headers);

	if ($sent_message) {
		echo 'Все получилось';
	}else{
		echo 'Где-то ошибка';
	}


	// выход нужен для того, чтобы в ответе не было ничего лишнего, только то что возвращает функция
	wp_die();
}

//***ИЗМЕНЕНИЯ РАЗМЕРОВ И НАСТРОЕК ЭЛЕМЕНТОВ В ОБЛАКЕ ТЕГОВ
add_filter( 'widget_tag_cloud_args', 'edit_widget_tag_cloud_args');
//d функции edit_widget_tag_cloud_args которая меняет аргументы тегов
function edit_widget_tag_cloud_args($args){
	//меняем ед. измеренения на px
	$args['unit'] = 'px';
	//меняем самый большой размер
	$args['smallest'] = '14';
	//меняем самый маленький размер
	$args['largest'] = '14';
	//меняем количество
	$args['number'] = '11';
	//сортируем по количетву записей
	$args['orderby'] = 'count';
  return $args;
}


## отключаем создание миниатюр файлов для указанных размеров
add_filter( 'intermediate_image_sizes', 'delete_intermediate_image_sizes' );
function delete_intermediate_image_sizes( $sizes ){
	// размеры которые нужно удалить
	return array_diff( $sizes, [
		'medium_large',
		'large',
		'1536x1536',
		'2048x2048',
	] );
}

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'homepage-thumb', 65, 65, true ); // Кадрирование изображения
}

//меняем стиль в отрывках
add_filter('excerpt_more', function($more) {
	return '...';
});

//склоняем слова после числительных
function plural_form($number, $after) {
	$cases = array (2, 0, 1, 1, 1, 2);
	echo $number.' '.$after[ ($number%100>4 && $number%100<20)? 2: $cases[min($number%10, 5)] ];
}

