<?php 
  $menu_items = wp_get_nav_menu_items('primary-menu');
  $menu_tree = build_menu_array($menu_items);
  $page_info = get_queried_object();
  $current_url = home_url(add_query_arg(array(), $wp->request)) . '/';
?>

<nav id="site-navigation" class="header-nav d-flex align-items-center">
  <!-- 第一層選單 -->
  <ul class="list-unstyled d-flex column-gap-3 header-navbar header-navbar--page me-3">
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
  <div class="search-trigger">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
      <path d="M10.2 3.6001C11.4287 3.60002 12.633 3.94292 13.6774 4.59019C14.7217 5.23746 15.5647 6.1634 16.1113 7.26377C16.6579 8.36415 16.8865 9.59526 16.7714 10.8185C16.6563 12.0418 16.202 13.2086 15.4596 14.1877L20.436 19.1641C20.5956 19.3249 20.6886 19.5399 20.6966 19.7663C20.7046 19.9927 20.6269 20.2138 20.4791 20.3854C20.3312 20.557 20.1241 20.6666 19.899 20.6922C19.674 20.7179 19.4475 20.6577 19.2648 20.5237L19.164 20.4361L14.1876 15.4597C13.3531 16.0923 12.3801 16.5173 11.3488 16.6994C10.3176 16.8816 9.25784 16.8158 8.25708 16.5075C7.25632 16.1991 6.3433 15.657 5.59346 14.926C4.84362 14.195 4.27848 13.2961 3.94474 12.3035C3.611 11.3109 3.51824 10.2532 3.67412 9.21766C3.82999 8.18214 4.23004 7.19857 4.8412 6.34822C5.45236 5.49787 6.25709 4.80515 7.1889 4.3273C8.12071 3.84945 9.15285 3.60018 10.2 3.6001ZM10.2 5.4001C8.927 5.4001 7.7061 5.90581 6.80593 6.80598C5.90575 7.70616 5.40004 8.92706 5.40004 10.2001C5.40004 11.4731 5.90575 12.694 6.80593 13.5942C7.7061 14.4944 8.927 15.0001 10.2 15.0001C11.4731 15.0001 12.694 14.4944 13.5942 13.5942C14.4943 12.694 15 11.4731 15 10.2001C15 8.92706 14.4943 7.70616 13.5942 6.80598C12.694 5.90581 11.4731 5.4001 10.2 5.4001Z" fill="#333333"/>
    </svg>
  </div>
</nav>