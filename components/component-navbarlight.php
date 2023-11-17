<?php 
  $menu_items = wp_get_nav_menu_items('primary-menu');
  $menu_tree = build_menu_array($menu_items);
  $page_info = get_queried_object();
  $current_url = home_url(add_query_arg(array(), $wp->request)) . '/';
?>

<nav id="site-navigation" class="header-nav d-flex align-items-center">
  <!-- 第一層選單 -->
  <ul class="list-unstyled d-flex column-gap-3 header-navbar header-navbar-light me-3">
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
      <path d="M10.1991 3.6001C11.4277 3.60002 12.632 3.94292 13.6764 4.59019C14.7207 5.23746 15.5637 6.1634 16.1103 7.26377C16.6569 8.36415 16.8856 9.59526 16.7704 10.8185C16.6553 12.0418 16.201 13.2086 15.4587 14.1877L20.4351 19.1641C20.5946 19.3249 20.6877 19.5399 20.6956 19.7663C20.7036 19.9927 20.6259 20.2138 20.4781 20.3854C20.3302 20.557 20.1231 20.6666 19.898 20.6922C19.673 20.7179 19.4465 20.6577 19.2639 20.5237L19.1631 20.4361L14.1867 15.4597C13.3521 16.0923 12.3791 16.5173 11.3479 16.6994C10.3166 16.8816 9.25687 16.8158 8.25611 16.5075C7.25535 16.1991 6.34233 15.657 5.59249 14.926C4.84264 14.195 4.27751 13.2961 3.94377 12.3035C3.61002 11.3109 3.51726 10.2532 3.67314 9.21766C3.82902 8.18214 4.22906 7.19857 4.84022 6.34822C5.45138 5.49787 6.25611 4.80515 7.18792 4.3273C8.11973 3.84945 9.15187 3.60018 10.1991 3.6001ZM10.1991 5.4001C8.92603 5.4001 7.70513 5.90581 6.80495 6.80598C5.90478 7.70616 5.39907 8.92706 5.39907 10.2001C5.39907 11.4731 5.90478 12.694 6.80495 13.5942C7.70513 14.4944 8.92603 15.0001 10.1991 15.0001C11.4721 15.0001 12.693 14.4944 13.5932 13.5942C14.4934 12.694 14.9991 11.4731 14.9991 10.2001C14.9991 8.92706 14.4934 7.70616 13.5932 6.80598C12.693 5.90581 11.4721 5.4001 10.1991 5.4001Z" fill="white"/>
    </svg>
  </div>
</nav>