<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package design_hu_webpack
 */

get_header();
?>

	<main id="primary" class="site-main">

    <section class="inner-top-l inner-sm-top-l inner-bottom-l inner-sm-bottom-l mt-15">
      <div class="container">
        <div class="d-flex align-items-center justify-content-center">
          <div class="me-x5">
            <svg xmlns="http://www.w3.org/2000/svg" width="191" height="194" viewBox="0 0 191 194" fill="none">
              <g clip-path="url(#clip0_741_5804)">
                <path d="M50.4297 97.3208C83.0251 75.9822 120.493 76.1496 152.92 97.7671L101.339 194L50.4297 97.3208Z" fill="#D62025"/>
                <path d="M167.678 53.1931L153.844 66.7215L149.252 47.0844L137.994 61.2543L127.941 44.5182L126.093 59.1902C119.933 58.1303 113.632 57.4608 107.359 57.1819L110.58 0C118.14 0.30683 125.785 1.03206 133.262 2.14781L128.725 38.2979L157.961 5.35557L159.977 35.7875L182.379 13.4726L190.5 67.1678L171.374 72.6628L167.678 53.1931ZM0.5 24.6022C7.1087 21.1433 13.9974 17.9914 20.9702 15.202L27.8029 30.2088L38.36 6.33185L57.682 13.5005L47.2089 36.178L65.7189 43.8766L59.5302 3.933C72.5236 1.42257 87.0011 0.111574 101.339 0.111574L101.171 14.1142C100.723 14.1142 100.275 14.1142 99.8265 14.1142C88.5973 14.1142 81.8206 15.4531 81.7365 15.4809L81.3165 15.5646L82.0446 23.3469L82.7447 23.2075C86.6651 22.4265 91.4816 22.0917 97.1942 22.0917C97.8942 22.0917 98.6223 22.0917 99.3504 22.1196V34.2812C88.8773 34.3091 83.6968 35.7038 83.6407 35.7317L83.2487 35.8433L83.3887 36.6522C83.5007 37.489 83.6968 39.3021 83.8928 43.0398L83.9208 43.7651L84.4248 43.6814C84.4528 43.6814 84.5648 43.6535 84.7609 43.6256C86.413 43.3745 95.0099 42.2867 103.943 42.2867H104.223L103.691 57.0145H103.607C92.7417 57.0145 78.9082 58.5766 68.2391 61.0312L65.8309 45.6339L56.7859 63.0395L36.4838 52.4957L43.3725 69.1482C38.024 71.4634 32.7874 74.0854 27.8029 76.9863L0.5 24.6022Z" fill="#333333"/>
              </g>
              <defs>
                <clipPath id="clip0_741_5804">
                  <rect width="190" height="194" fill="white" transform="translate(0.5)"/>
                </clipPath>
              </defs>
            </svg>
          </div>
          <div>
            <p class="h1 layout-bottom-s layout-sm-bottom-s">404 找不到您要的頁面！</p>
            <p class="h3 layout-bottom-s layout-sm-bottom-s text-gray5">您尋找的頁面已遺失，您可以重新搜尋或返回首頁</p>
            <div class="d-flex justify-content-center">
              <a href="<?php echo home_url() ?>" class="btn btn-lg btn-secondary">
                返回首頁
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

	</main><!-- #main -->

<?php
get_footer();
