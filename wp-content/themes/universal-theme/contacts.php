<?php
/*
Template Name: Страница контакты
Template Post Type: page
*/

get_header();?>
<div class="section-dark">
  <div class="container">
    <?php
      the_title('<h1 class="page-title">', '</h1>', true);
    ?>
   <div class="contacts-wrapper">
    <div class="left">
      <p class="page-text">Через форму обратной связи</p>
     <form action="#" class="contacts-form" method="POST">
        <input name="contact_name" type="text" placeholder="Ваше имя" class="input contacts-input">
        <input name="contact_email" type="email" placeholder="Ваш Email" class="input contacts-input">
        <textarea name="contact_comment" id="" placeholder="Ваш вопрос" class="textarea contacts-textarea"></textarea>
        <button type="submit" class="button more">Отправить  <svg width="20" height="20" fill="#fff" class="icon">
            <use xlink:href="<?php //echo get_template_directory_uri()?>/assets/images/sprite.svg#arrow"></use>
          </svg></button>
      </form>
      <?php the_content(); ?>
    </div>
    <!-- /.left -->
    <div class="right">
    </div>
    <!-- /.right -->
   </div>
   <!-- /.contacts-wrapper -->
  </div>
  <!-- /.container -->
</div>
<!-- /.section-dark -->
<?php get_footer();?>