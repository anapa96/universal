<?php get_header();?>
<main class="front-page-header">
  <div class="container">
    <div class="hero">
      <div class="left">
      <?php
    //объявляем глобальную переменную 
global $post;

//get_posts отраляем в бд запрос
$myposts = get_posts([ 
  //возьми 5 последних постов
	'numberposts' => 1,
  'category_name' => 'css, html, javascript, web-design'
  
]);
//проверяем, есть ли посты
if( $myposts ){
  //если есть, запускаем цыкл
	foreach( $myposts as $post ){
		setup_postdata( $post );
		?>
    <!--Выводим записи-->
      <img src="<?php the_post_thumbnail_url(); ?>" alt="" class="post-thumb">
      <!--//узнаем id автора-->
      <?php $author_id=get_the_author_meta('ID') ?>
 
     <a href="<?php echo get_author_posts_url($author_id)?>"class="author">
        <img src="<?php echo get_avatar_url('ID')?>" alt="" class="avatar">
        <div class="author-bio">
          <span class="author-name"><?php the_author();?></span>
          <span class="author-rank">Должность</span>
        </div>
      </a>
      <div class="post-text">
        <?php foreach (get_the_category() as $category){
          printf(
            '<a href="%s" class="category-link %s">%s</a>',
            esc_url(get_category_link($category)),
            esc_html($category -> slug),
            $category -> name

          );
        }
        
        ?>
        <h2 class="post-title"><?php echo mb_strimwidth(get_the_title(), 0, 60, '...')?></h2>
        <a href="<?php echo get_the_permalink(); ?>" class="more"> <span>Читать далее </span>
          <svg width="20" height="20" fill="#fff" class="icon comments-icon">
            <use xlink:href="<?php echo get_template_directory_uri()?>/assets/images/sprite.svg#arrow"></use>
          </svg>
          </a>
      </div>
      <?php 
    }
  } else {
    ?><p>Постов нет</p><?php // Постов не найдено
    }

        wp_reset_postdata(); // Сбрасываем $post
?>
      </div>
      <!-- /.left -->
      <div class="right">
        <h3 class="recommend">Рекомендуем</h3>
        <ul class="posts-list">
        <?php
    //объявляем глобальную переменную 
global $post;

//get_posts отраляем в бд запрос
$myposts = get_posts([ 
  //возьми 5 последних постов
	'numberposts' => 5,
  'offset' => 1,
  'category_name' => 'css, html, javascript, web-design'
  
]);
//проверяем, есть ли посты
if( $myposts ){
  //если есть, запускаем цыкл
	foreach( $myposts as $post ){
		setup_postdata( $post );
		?>
          <li class="post">
          <?php foreach (get_the_category() as $category){
          printf(
            '<a href="%s" class="category-link %s">%s</a>',
            esc_url(get_category_link($category)),
            esc_html($category -> slug),
            $category -> name

          );
        }
        
        ?>
            <a class="post-permalink" href="<?php echo get_the_permalink()?>"> <h4 class="post-title"><?php echo mb_strimwidth(get_the_title(), 0, 60, '...')?></h4></a>
          </li>
          <?php 
            }
          } else {
            ?><p>Постов нет</p><?php // Постов не найдено
          }

          wp_reset_postdata(); // Сбрасываем $post
          ?>
        </ul>
      </div>
      <!-- /.right -->
    </div>
    <!-- /.hero -->
  </div>
  <!-- /.container -->
</main>
<div class="container">
  <ul class="article-list">
    <?php
      //объявляем глобальную переменную 
      global $post;
      //get_posts отраляем в бд запрос
      $myposts = get_posts([ 
      //возьми 5 последних постов
      'numberposts' => 4,
      'category_name' => 'articles'
      ]);
      //проверяем, есть ли посты
      if( $myposts ){
      //если есть, запускаем цыкл
      foreach( $myposts as $post ){
      setup_postdata( $post );
      ?>
      <li class="article-item">
        <a class="article-permalink" href="<?php echo get_the_permalink()?>"> 
          <h4 class="article-title"><?php echo mb_strimwidth(get_the_title(), 0, 50, '...')?></h4>
        </a>
        <img src="<?php 
          if( has_post_thumbnail() ) {
            echo get_the_post_thumbnail_url(null, 'thumb');
          }
          else {
            echo get_template_directory_uri().'/assets/images/img-default.png';
          } ?>" width="65" height="65" alt="">
      </li>
      <?php 
        }
      } else {
        ?><p>Постов нет</p><?php // Постов не найдено
      }

      wp_reset_postdata(); // Сбрасываем $post
      ?>
    </ul>
    <!--/artical-list-->

      <div class="main-grid">
        <ul class="article-grid">
        <?php		
          global $post;
          //формируем запрос в бд
          $query = new WP_Query( [
            //получаем 7 постов
            'posts_per_page' => 6,
            'category__not_in' => 22
          ] );
            //проверяем есть ли посты
          if ( $query->have_posts() ) {
            //создаем переменную счетчик постов
            $cnt=0;

            //пока есть посты выводим их
            while ( $query->have_posts() ) {
              $query->the_post();
              //увеличиваем счетчик постов
              $cnt++;
              switch ($cnt) {
                //выводим первый пост
                case '1':
                  ?>
                  <li class="article-grid-item article-grid-item-1">
                    <a href="<?php the_permalink()?>" class="article-grid-permalink">
                        <?php foreach (get_the_category() as $category){
                              printf(
                                '<span class="category-link %s">%s</span>',
                                esc_html($category -> slug),
                                $category -> name

                              );
                            }
                            
                            ?>
                        </span>
                        <h4 class="article-grid-title">
                          <?php the_title()?>
                        </h4>
                        <p class="article-grid-excerpt">
                          <?php echo mb_strimwidth(get_the_excerpt(), 0, 90, '...') ;?>
                        </p>
                        <div class="article-grid-info">
                          <div class="author">
                          <?php $author_id=get_the_author_meta('ID') ?>
                            <img src="<?php echo get_avatar_url($author_id)?>" alt="" class="author-avatar">
                            <span class="author-name"><strong><?php the_author();?></strong>: <?php the_author_meta('description') ?></span>
                          </div>
                          <div class="comments">
                          <svg width="19" height="15" class="icon comments-icon">
            <use xlink:href="<?php echo get_template_directory_uri()?>/assets/images/sprite.svg#comment"></use>
          </svg>
                              <span class="comments-counter"><?php comments_number('0', '1', '%') ?></span>
                          </div>
                        </div>
                    </a>
                  </li>
                <?php
                  break;
                //выводим второй пост
                case '2':
                  ?>
                  <li class="article-grid-item article-grid-item-2">
                  <img src="<?php 
          if( has_post_thumbnail() ) {
            echo get_the_post_thumbnail_url();
          }
          else {
            echo get_template_directory_uri().'/assets/images/img-default.png';
          }?>" alt="" class="article-grid-thumb">
                    <a href="<?php the_permalink()?>" class="article-grid-permalink">
                      <span class="tag">
                        <?php
                          //выводим теги
                          $posttags=get_the_tags();
                          if ($posttags) {
                            echo $posttags [0]->name . ' ';
                          }
                        ?>
                      </span>
                        
                      <span class="category-name">
                        <?php $category = get_the_category();
                        echo $category[0]->name;?>
                      </span>
                      <h4 class="article-grid-title">
                        <?php the_title()?>
                      </h4>
                      <div class="article-grid-info">
                        <div class="author">
                          <?php $author_id=get_the_author_meta('ID') ?>
                            <img src="<?php echo get_avatar_url($author_id)?>" alt="" class="author-avatar">
                          <div class="author-info">
                            <span class="author-name"><b><?php the_author();?></b> <?php the_author_meta('description') ?></span>
                            <span class="date"><?php the_time( 'j F' )?></span>
                            <div class="comments">
                            <svg width="19" height="15" fill="#fff" class="icon comments-icon">
                               <use xlink:href="<?php echo get_template_directory_uri()?>/assets/images/sprite.svg#comment"></use>
                            </svg>
                                <span class="comments-counter"><?php comments_number('0', '1', '%') ?></span>
                            </div>
                            <div class="likes">
                              <svg width="19" height="15" fill="#fff" class="likes-icon">
                                <use xlink:href="<?php echo get_template_directory_uri()?>/assets/images/sprite.svg#heart"></use>
                              </svg>
                              <span class="likes-counter"><?php comments_number('0', '1', '%') ?></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </li>
                  <?php
                  break;
                case '3':
                  ?>
                  <li class="article-grid-item article-grid-item-3">
                    <a href="<?php the_permalink()?>" class="article-grid-permalink">
                      <img src="<?php 
          if( has_post_thumbnail() ) {
            echo get_the_post_thumbnail_url();
          }
          else {
            echo get_template_directory_uri().'/assets/images/img-default.png';
          }?>" alt="" class="article-thumb">
                      <h4 class="article-grid-title"><?php the_title()?> </h4>
                    </a>
                  </li>
                  <?php
                //выводим остальные посты
                default:
                ?>
                <li class="article-grid-item article-grid-item-default">
                  <a href="<?php the_permalink()?>" class="article-grid-permalink">
                    <h4 class="article-grid-title"><?php echo mb_strimwidth(get_the_title(), 0, 40, '...')?> </h4>
                    <p class="article-grid-excerpt">
                          <?php echo mb_strimwidth(get_the_excerpt(), 0, 70, '...');?>
                    </p>
                    <span class="article-data"><?php the_time( 'j F' )?></span>
                  </a>
                </li>
                <?php
                  break;
              }
              ?>
              <!-- Вывода постов, функции цикла: the_title() и т.д. -->
              <?php 
            }
          } else {
            // Постов не найдено
          }

          wp_reset_postdata(); // Сбрасываем $post
        ?>
      </ul>
      <!-- /.artical-grid -->

      <!--Полючаем сайдбар-->
      <?php get_sidebar('home-top');?>
      </div>

    
    </div>
    <!-- /.container -->

   
    

<!---блок расследования-->
<?php		
  global $post;

  $query = new WP_Query( [
    'posts_per_page' => 1,
    'category_name' => 'investigation',
  ] );

  if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
      $query->the_post();
      ?>
      <section class="investigation" style="background:  linear-gradient(0deg, rgba(64, 48, 61, 0.35), rgba(64, 48, 61, 0.35)), url(<?php 
          if( has_post_thumbnail() ) {
            echo get_the_post_thumbnail_url();
          }
          else {
            echo get_template_directory_uri().'/assets/images/img-default.png';
          }?>) no-repeat center center">
        <div class="container">
          <h2 class="investigation-title"><?php the_title( )?></h2>
          <a href="<?php echo get_the_permalink(); ?>" class="more">Читать статью
          <svg width="20" height="20" fill="#fff" class="icon comments-icon">
            <use xlink:href="<?php echo get_template_directory_uri()?>/assets/images/sprite.svg#arrow"></use>
          </svg>
          </a>
        </div>
      </section>
      <?php 
    }
  } else {
    // Постов не найдено
  }
  wp_reset_postdata(); // Сбрасываем $post
?>
<!--/блок расследования-->

<div class="container">
<div class="favourites">
<div class="digest-wrapper">
  <ul class="digest">
  <?php		
  global $post;
  
  $query = new WP_Query( [
    'posts_per_page' => 6,
    'orderby'        => 'comment_count',
  ] );
  
  if ( $query->have_posts() ) {
    $cnt=0;
    while ( $query->have_posts() ) {
      $query->the_post();
      $cnt++;
      
      ?>
      <li class="digest-item">
        <a href="<?php the_permalink()?>" class="digest-item-permalink">
          <img src="<?php 
          if( has_post_thumbnail() ) {
            echo get_the_post_thumbnail_url();
          }
          else {
            echo get_template_directory_uri().'/assets/images/img-default.png';
          }

        ?>" class="digest-thumb">
        </a>
        <div class="digest-info">
          <button class="bookmark">
            <svg width="20" height="20" fill="#BCBFC2" class="icon icon-bookmark">
              <use xlink:href="<?php echo get_template_directory_uri()?>/assets/images/sprite.svg#bookmark"></use>
            </svg>
          </button>

          <?php foreach (get_the_category() as $category){
          printf(
            '<a href="%s" class="category-link %s">%s</a>',
            esc_url(get_category_link($category)),
            esc_html($category -> slug),
            $category -> name

          );
        }
        
        ?>
          <a href="<?php the_permalink()?>" class="digest-item-permalink">
          <h3 class="digest-title"><?php the_title()?></h3>
          </a>

          <p class="digest-excerpt">  <?php echo mb_strimwidth(get_the_excerpt(), 0, 185, '...');?></p>

          <div class="digest-footer">
            <span class="digest-date"><?php the_time( 'j F' )?></span>
            <div class="comments digest-comments">
            <svg width="19" height="15" fill="#BCBFC2" class="icon comments-icon">
            <use xlink:href="<?php echo get_template_directory_uri()?>/assets/images/sprite.svg#comment"></use>
          </svg>
              <span class="comments-counter"><?php comments_number('0', '1', '%')?></span>
            </div>
            <div class="likes digest-likes">
             
              <svg width="19" height="15" fill="#BCBFC2" class="likes-icon">
            <use xlink:href="<?php echo get_template_directory_uri()?>/assets/images/sprite.svg#heart"></use>
          </svg>
              
              <span class="likes-counter"><?php comments_number('0', '1', '%')?></span>
            </div>
          </div>
          <!-- /.digest-footer -->
        </div>
        <!-- /.digest-info -->
      </li>
      <?php 
    }
  } else {
    // Постов не найдено
  }
  
  wp_reset_postdata(); // Сбрасываем $post
  ?>
  </ul>
</div>
<!-- /.digest-wrapper -->
<!--Подключаем нижний сайдбар-->

<?php get_sidebar('home-bottom');?>
</div>
<!-- /.favourites -->
</div>
<!-- /.container -->


<div class="special">
  <div class="container">
    <div class="special-grid">
	<?php
		  global $post;
		  $query = new WP_Query( [
			'posts_per_page' => 1,
			'category_name' => 'photoreport',
		  ] );
		  if ( $query->have_posts() ) {
			$cnt=0;
			while ( $query->have_posts() ) {
			  $query->the_post();   
		  ?>
      <div class="photo-report">
		  
        <!-- Slider main container -->
        <div class="swiper-container photo-report-slider">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
            <!-- Slides -->
                  <?php $images = get_attached_media( 'image' );
                  foreach($images as $image){
                    echo '<div class="swiper-slide"><img src="';
                    print_r($image -> guid);
                    echo '"></div>';
                  }
                  ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>
        <div class="photo-report-content">
		
		<?php foreach (get_the_category() as $category){
              printf(
                '<a href="%s" class="category-link %s">%s</a>',
                esc_url(get_category_link($category)),
                esc_html($category -> slug),
                $category -> name

              );
            }
            
            ?>
            <!--//узнаем id автора-->
            <?php $author_id=get_the_author_meta('ID') ?>
      
          <a href="<?php echo get_author_posts_url($author_id)?>"class="author">
              <img src="<?php echo get_avatar_url('ID')?>" alt="" class="author-avatar">
              <div class="author-bio">
                <span class="author-name"><?php the_author();?></span>
                <span class="author-rank">Должность</span>
              </div>
            </a>
              
                <h3 class="photo-report-title"><?php the_title()?></h3>
                <a href="<?php echo get_the_permalink()?>" class="button photo-report-button">
                <svg width="19" height="15" class="icon photo-report-icon">
                  <use xlink:href="<?php echo get_template_directory_uri()?>/assets/images/sprite.svg#images"></use>
                </svg>
                  Смотреть фото
                  <span class="photo-report-counter"><?php echo count($images) ?></span>
                </a>
      
	   <?php 
            }
          } else {
            // Постов не найдено
          }
          
          wp_reset_postdata(); // Сбрасываем $post
          ?>
            </div>
        <!-- /.photo-report-content -->
      </div>
      <!-- /.photo-report -->

<div class="other">
<div class="career-post">
<?php
// параметры по умолчанию
$posts = get_posts( array(
	'category_name'    => 'career',
  'posts_per_page' => 1,
	'orderby'     => 'date',
	'order'       => 'DESC',
) );

foreach( $posts as $post ){
	setup_postdata($post);
   foreach (get_the_category() as $category){
              printf(
                '<a href="%s" class="category-link %s">%s</a>',
                esc_url(get_category_link($category)),
                esc_html($category -> slug),
                $category -> name

              );
            }
            
            ?>
          <h3 class="career-post-title"><?php the_title()?></h3>
          <p class="career-post-excerpt"><?php echo mb_strimwidth(get_the_excerpt(), 0, 78, '...') ;?></p>
          <a href="<?php the_permalink()?>" class="more">Читать далее <svg width="20" height="20" fill="#fff" class="icon comments-icon">
            <use xlink:href="<?php echo get_template_directory_uri()?>/assets/images/sprite.svg#arrow"></use>
          </svg></a>
  <?php
    
}

wp_reset_postdata(); // сброс
?>
</div>
<!-- /.career-post -->

<div class="other-posts">
<?php
// параметры по умолчанию
$posts = get_posts( array(
	'numberposts' => 2,
	'category'    => 'articles',
	'orderby'     => 'date',
	'order'       => 'DESC',
) );

foreach( $posts as $post ){
	setup_postdata($post);
  ?>
   <a href="<?php the_permalink()?>" class="other-post other-post-default">
    <h4 class="other-post-title"><?php echo mb_strimwidth(get_the_excerpt(), 0, 22, '...')?></h4>
    <p class="other-post-excerpt"><?php echo mb_strimwidth(get_the_excerpt(), 0, 80, '...') ;?></p>
    <span class="other-post-date"><?php the_time( 'j F' )?></span>
   </a>
  <?php
}

wp_reset_postdata(); // сброс
?>
         
        </div>
        <!-- /.other-posts -->
      </div>
      <!-- /.other -->
    </div>
    <!-- /.special-grid -->
  </div>
  <!-- /.container -->
</div>
<!-- /.special -->

<?php get_footer();?>