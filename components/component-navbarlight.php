<?php 
  $menu_items = wp_get_nav_menu_items('primary-menu');
  $menu_tree = build_menu_array($menu_items);
  $page_info = get_queried_object();
  $current_url = home_url(add_query_arg(array(), $wp->request)) . '/';
?>

<nav id="site-navigation" class="header-nav">
  <!-- 第一層選單 -->
  <ul class="list-unstyled d-flex column-gap-3 header-navbar header-navbar-light">
    <?php $active_class = ''; ?>
    <?php foreach ($menu_tree as $menu_item) : ?>
      <?php $active_class = ($menu_item->url == $current_url) ? 'active' : ''; ?>
      <li class="nav-item nav-item-fl">
        <?php if ($menu_item->children) : ?>
          <a href="<?php echo $menu_item->url; ?>" class="nav-link">
            <span>
              <?php echo $menu_item->title; ?>
            </span>
          </a>
        <?php else : ?>
          <a href="<?php echo $menu_item->url; ?>" class="nav-link <?php echo $active_class ?>"><?php echo $menu_item->title; ?></a>
        <?php endif ?>
        <?php if ($menu_item->children) : ?>
          <!-- 第二層選單 -->
          <ul class="list-unstyled sub-menu sub-menu-second">
            <?php foreach ($menu_item->children as $sub_menu_item) : ?>
              <li class="nav-item nav-item-sl">
                <a href="<?php echo $sub_menu_item->url; ?>" class="nav-link-sl">
                  <?php echo $sub_menu_item->title; ?>
                </a>
                <?php if ($sub_menu_item->children) : ?>
                  <!-- 第三層選單 -->
                  <ul class="list-unstyled sub-menu sub-menu-third">
                    <?php foreach ($sub_menu_item->children as $sub_sub_menu_item) : ?>
                      <li class="nav-item nav-item-tl">
                        <a href="<?php echo $sub_sub_menu_item->url; ?>" class="nav-link-tl">
                          <?php echo $sub_sub_menu_item->title; ?>
                        </a>
                        <?php if ($sub_sub_menu_item->children) : ?>
                          <!-- 第四層選單 -->
                          <ul class="list-unstyled sub-menu sub-menu-fourth">
                            <?php foreach ($sub_sub_menu_item->children as $sub_sub_sub_menu_item) : ?>
                              <li class="nav-item nav-item-tl">
                                <a href="<?php echo $sub_sub_sub_menu_item->url; ?>" class="nav-link-fr">
                                  <?php echo $sub_sub_sub_menu_item->title; ?>
                                </a>
                              </li>
                            <?php endforeach ?>
                          </ul>
                        <?php endif ?>
                      </li>
                    <?php endforeach ?>
                  </ul>
                <?php endif ?>
              </li>
            <?php endforeach ?>
          </ul>
        <?php endif ?>
      </li>
    <?php endforeach; ?>
  </ul>
</nav>