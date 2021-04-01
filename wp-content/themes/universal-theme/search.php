<?php get_header(); ?>
<div class="container">
  <h1 class="search-title">Результаты поиска по запросу:</h1>
  <div class="favourites">
    <div class="digest-wrapper">
      <ul class="digest">
        <?php while ( have_posts() ){ the_post(); ?>
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
        <?php } ?>
        <?php if ( ! have_posts() ){ ?>
          Записей нет.
        <?php } ?>
      </ul>

      <?php 
        $args=array(
          'prev_text'    =>  '&larr; Назад',
	        'next_text'    => __('Next &rarr;'),
        );
        the_posts_pagination($args)?>
    </div>
    <!-- /.digest-wrapper -->
    <?php get_sidebar('search');?>
  </div>
  <!-- /.favourites -->
</div>
<!-- /.container -->
<?php get_footer(); ?>