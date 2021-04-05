<?php get_header()?>
<div class="container">
  <h1 class="category-title"><?php single_cat_title()?></h1>
  <!-- /.category-title -->
  <div class="post-list">
    <?php while ( have_posts() ){ the_post(); ?>
      <div class="post-card">
        <img src="<?php   if( has_post_thumbnail() ) {
            echo get_the_post_thumbnail_url();
          }
          else {
            echo get_template_directory_uri().'/assets/images/img-default.png';
          }?>" alt="" class="post-card-thumb">
          <div class="post-card-text">
          <h2 class="post-card-title"><?php the_title();?></h2>
          <p><?php echo mb_strimwidth(get_the_excerpt(), 0, 70, '...');?></p>
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
                  <svg width="19" height="15" fill="#BCBFC2" class="likes-icon">
                    <use xlink:href="<?php echo get_template_directory_uri()?>/assets/images/sprite.svg#heart"></use>
                  </svg>
                  <span class="likes-counter"><?php comments_number('0', '1', '%') ?></span>
                </div>
              </div>
          </div>
        </div>
        <!-- /.post-card-text -->
      </div>
    <?php } ?>
    <?php if ( ! have_posts() ){ ?>
      Записей нет.
    <?php } ?>
  </div>
  <!-- /.post-list -->
  <?php 
        $args=array(
          'prev_text'    =>  '&larr; Назад',
	        'next_text'    => __('Далее &rarr;'),
        );
        the_posts_pagination($args)?>
</div>
<!-- /.container -->
<?php get_footer()?>