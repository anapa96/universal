<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
  <!--шапка поста-->
  <header class="entry-header <?php echo get_post_type()?>-header" style="background: linear-gradient(0deg, rgba(38, 45, 51, 0.75), rgba(38, 45, 51, 0.75))">
    <div class="container">
    <div class="post-header-wrapper">    
    <div class="post-header-nav">
      <?php
      foreach (get_the_category() as $category){
        printf(
          '<a href="%s" class="category-link %s">%s</a>',
          esc_url(get_category_link($category)),
          esc_html($category -> slug),
          $category -> name

        );
      }
      ?>
    </div>
    <!-- /.post-header-nav -->
      <div class="video">
        <?php 
          $video_link = get_field('video_link');
                   
          if (substr_count($video_link, 'yout')){
            echo '<iframe width="100%" height="450" src="https://www.youtube.com/embed/'.substr($video_link, -11).'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
          }else {
              echo '<iframe src="https://player.vimeo.com/video/'.substr($video_link, -9).'" width="100%" height="450" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>';
          };
        ?>
      </div>
      <!-- /.video -->
      <div class="lesson-header-title-wrapper">
        <?php
        //проверяем точно ли мы на странице поста
        if ( is_singular() ) :
          the_title( '<h1 class="lesson-header-title">', '</h1> ' );
        else :
          the_title( '<h2 class="lesson-header-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        endif;?>
      </div>
      <!-- /.post-header-title-wrapper -->
      <div class="post-header-info">
          <span class="post-header-date">
            <svg width="19" height="15" fill="#BCBFC2" class="likes-icon">
            <use xlink:href="<?php echo get_template_directory_uri()?>/assets/images/sprite.svg#clock"></use>
            </svg>
            <?php the_time( 'j F, G:i' )?>
          </span>
      </div>
      <!-- /.post-header-info -->
        
        
    
      </div>
    <!-- /.post-header-wrapper -->
      
    </div>
    <!-- /.container -->
	</header>
  <!-- /шапка поста -->

  <div class="container">
    <!--Содержимое поста-->
    <div class="post-content">
      <?php
      //выводим содержимое
      the_content(
        sprintf(
          wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'universal-example' ),
            array(
              'span' => array(
                'class' => array(),
              ),
            )
          ),
          wp_kses_post( get_the_title() )
        )
      );

      wp_link_pages(
        array(
          'before' => '<div class="page-links">' . esc_html__( 'Страница:', 'universal-example' ),
          'after'  => '</div>',
        )
      );
      ?>
    </div>
    <!-- /содержимое поста -->
  </div>
  <!-- /.container -->
  <div class="container">
    <footer class="entry-footer">
      <?php 
        $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'universal-example' ) );
        if ( $tags_list ) {
          /* translators: 1: list of tags. */
          printf( '<span class="tags-links">' . esc_html__( '%1$s', 'universal-example' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        //ссылки на соцю сети
        meks_ess_share();
        }?>

    </footer><!-- подвал поста -->
  </div>
  <!-- /.container -->

</article>