<header id="masthead" class="site-header">
  <div class="container d-flex justify-content-between align-items-center pt-2">

    <!-- logo -->
    <?php get_template_part( 'components/component', 'logo' ); ?>
    <!-- logo -->
  
    <!-- nav -->
    <?php 
      if ( is_front_page() ) {
        get_template_part( 'components/component', 'navbarlight' );
      } else {
        get_template_part( 'components/component', 'navbar' );
      }
    ?>
    <!-- nav -->
  </div>

  <div class="search-sec">
    <div class="container h-100 d-flex align-items-center">
      <form role="search" method="get" class="post-search-form d-flex w-100" data-searchway="keyword" id="searchform" action="<?php echo home_url( '/' ); ?>">
        <input type="text" value="" name="s" id="s" placeholder="搜尋..." class="form-control me-10">
        <!-- <button
          type="submit"
          class="end-0 top-50 d-flex align-items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 18 18" fill="none">
            <path d="M7.20004 0.600098C8.42871 0.600021 9.63301 0.942918 10.6774 1.59019C11.7217 2.23746 12.5647 3.1634 13.1113 4.26377C13.6579 5.36415 13.8865 6.59526 13.7714 7.81853C13.6563 9.04179 13.202 10.2086 12.4596 11.1877L17.436 16.1641C17.5956 16.3249 17.6886 16.5399 17.6966 16.7663C17.7046 16.9927 17.6269 17.2138 17.4791 17.3854C17.3312 17.557 17.1241 17.6666 16.899 17.6922C16.674 17.7179 16.4475 17.6577 16.2648 17.5237L16.164 17.4361L11.1876 12.4597C10.3531 13.0923 9.38006 13.5173 8.34884 13.6994C7.31761 13.8816 6.25784 13.8158 5.25708 13.5075C4.25632 13.1991 3.3433 12.657 2.59346 11.926C1.84362 11.195 1.27848 10.2961 0.944742 9.30353C0.611001 8.31094 0.518238 7.25319 0.674116 6.21766C0.829995 5.18214 1.23004 4.19857 1.8412 3.34822C2.45236 2.49787 3.25709 1.80515 4.1889 1.3273C5.12071 0.84945 6.15285 0.600184 7.20004 0.600098ZM7.20004 2.4001C5.927 2.4001 4.7061 2.90581 3.80593 3.80598C2.90575 4.70616 2.40004 5.92706 2.40004 7.2001C2.40004 8.47314 2.90575 9.69404 3.80593 10.5942C4.7061 11.4944 5.927 12.0001 7.20004 12.0001C8.47308 12.0001 9.69398 11.4944 10.5942 10.5942C11.4943 9.69404 12 8.47314 12 7.2001C12 5.92706 11.4943 4.70616 10.5942 3.80598C9.69398 2.90581 8.47308 2.4001 7.20004 2.4001Z" fill="#CACACA"/>
          </svg>
        </button> -->
        <button
          type="button"
          class="close-search-btn d-flex align-items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
          </svg>
        </button>
      </form>
    </div>
  </div>
</header><!-- #masthead -->
