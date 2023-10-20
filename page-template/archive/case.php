<!-- banner -->
<?php get_template_part('components/component-banner') ?>
<!-- banner -->
<!-- tab -->
<?php get_template_part('components/component-tab-cat') ?>
<!-- tab -->
<!-- case list -->

<?php 
$page_info = get_queried_object();
?>

<!-- <pre><?php //var_dump($page_info) ?></pre> -->

<section class="inner-y-l inner-sm-y-l bg-gray2" data-slug="<?php echo $page_info -> slug ?>">
  <div class="container">
    <ul class="case-list row row-gap-5 list-unstyled mb-x5">
      <!-- 由 js 渲染 -->
    </ul>
  </div>
</section>