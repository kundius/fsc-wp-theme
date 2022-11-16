<?php
/*
Template Name: Альбом
 */
$per_page = 16;
$current_page = get_query_var('paged') ? get_query_var('paged') : 1;
$offset = $per_page * $current_page - $per_page;
$gallery = get_field('album_gallery');
$paged_gallery = array_slice($gallery, $offset, $per_page);
$total_pages = ceil(count($gallery) / $per_page);
$links = paginate_links([
  'mid_size' => 1,
  'class' => 'pagination',
  'prev_text' => '',
  'next_text' => '',
  'total' => $total_pages,
  'current' => $current_page,
]);
$ids = implode(',', array_map(function($item) { return $item['id']; }, $gallery));
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes()?> itemscope itemtype="http://schema.org/WebSite">
  <head>
    <?php get_template_part('partials/head');?>
  </head>
  <body <?php body_class();?>>
    <?php wp_body_open();?>

    <div class="ui-wrapper">
      <?php get_template_part('partials/header') ?>
      <?php get_template_part('partials/page-breadcrumbs') ?>
      <?php get_template_part('partials/page-headline') ?>

      <div class="album">
        <?php foreach($paged_gallery as $item): ?>
        <div class="album-item" data-modal-attachment="<?php echo $item['id'] ?>" data-modal-attachment-queue="<?php echo $ids ?>">
          <div class="album-item__image">
            <img src="<?php echo $item['sizes']['theme-medium'] ?>" alt="" />
          </div>
          <div class="album-item__info">
            <div class="album-item__title"><?php echo $item['title'] ?></div>
            <?php if ($date = date_parse($item['date'])): ?>
            <div class="album-item__date"><?php echo $date['year'] ?></div>
            <?php endif ?>
          </div>
        </div>
        <?php endforeach ?>
      </div>

      <div class="album-pagination">
        <?php echo _navigation_markup($links , 'pagination') ?>
      </div>

      <div class="page-body album-body">
        <div class="ui-container">
          <div class="page-body__content ui-content">
            <?php the_content() ?>
          </div>
        </div>
      </div>

      <?php get_template_part('partials/footer')?>
    </div>
  </body>
</html>
