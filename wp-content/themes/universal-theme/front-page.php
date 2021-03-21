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
        <a href="<?php echo get_the_permalink(); ?>" class="more">Читать далее</a>
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
        <img src="<?php echo get_the_post_thumbnail_url( null, 'homepage-thumb') ?>" width="65" height="65" alt="">
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
            'posts_per_page' => 7,
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
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/comment.svg' ?>" 
                              alt="icon: comment" class="comments-icon">
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
                  <img src="<?php echo get_the_post_thumbnail_url()?>" alt="" class="article-grid-thumb">
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
                              <img src="<?php echo get_template_directory_uri() . '/assets/images/comment-white.svg' ?>" 
                                alt="icon: comment" class="comments-icon">
                                <span class="comments-counter"><?php comments_number('0', '1', '%') ?></span>
                            </div>
                            <div class="likes">
                              <img src="<?php echo get_template_directory_uri() . '/assets/images/heart-white.svg' ?>" 
                                alt="icon: like" class="likes-icon">
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
                      <img src="<?php echo get_the_post_thumbnail_url()?>" alt="" class="article-thumb">
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
      <section class="investigation" style="background:  linear-gradient(0deg, rgba(64, 48, 61, 0.35), rgba(64, 48, 61, 0.35)), url(<?php echo get_the_post_thumbnail_url()?>) no-repeat center center">
        <div class="container">
          <h2 class="investigation-title"><?php the_title( )?></h2>
          <a href="<?php echo get_the_permalink(); ?>" class="more">Читать статью</a>
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
<div class="main-grid">
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
          <img src="<?php echo get_the_post_thumbnail_url()?>" class="digest-thumb">
        </a>
        <div class="digest-info">
          <button class="bookmark">
            <svg width="14" height="18" class="icon icon-bookmark">
              <use xlink:href=""></use>
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
              <svg width="19" height="15" class="icon comments-icon">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M11.1346 11.9998V14.9998L8.36064 11.9998H2.25C1.42157 11.9998 0.75 11.3282 0.75 10.4998V2.99976C0.75 2.17133 1.42157 1.49976 2.25 1.49976H12.75C13.5784 1.49976 14.25 2.17133 14.25 2.99976V10.4998C14.25 11.3282 13.5784 11.9998 12.75 11.9998H11.1346Z" fill="#BCBFC2"/>
              </svg>
              <span class="comments-counter"><?php comments_number('0', '1', '%')?></span>
            </div>
            <div class="likes digest-likes">
              <img src="<?php echo get_template_directory_uri().'/assets/images/heart.svg'?>" alt="icon: like" class="likes-icon">
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
<!-- /.main-grid -->
</div>
  <!-- /.container -->