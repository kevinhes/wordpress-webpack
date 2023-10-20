<?php
  $page_info = get_queried_object();
  $terms = get_the_terms($post->ID, $page_info -> taxonomy);
  foreach ( $terms as $key => $term ) {
    if ($term -> parent === 0) {
      unset($terms[$key]);
    }
  }
?>

<div class="col-6">
  <div class="card card-info card-info-video bg-light">
    <div class="card-img-top position-relative">
      <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="" class="w-100 h-100 object-cover">
      <div class="card-img-overlay">
        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none">
          <g clip-path="url(#clip0_741_4589)">
            <g filter="url(#filter0_d_741_4589)">
              <path d="M56.25 30C56.2515 30.6366 56.0883 31.2628 55.7762 31.8176C55.4641 32.3725 55.0136 32.8371 54.4688 33.1664L20.7 53.8242C20.1307 54.1728 19.4786 54.3631 18.8111 54.3755C18.1436 54.3878 17.485 54.2218 16.9031 53.8945C16.3268 53.5723 15.8467 53.1023 15.5123 52.5331C15.1778 51.9638 15.001 51.3157 15 50.6554V9.34448C15.001 8.68421 15.1778 8.03611 15.5123 7.46683C15.8467 6.89756 16.3268 6.42764 16.9031 6.10542C17.485 5.77811 18.1436 5.61206 18.8111 5.62442C19.4786 5.63678 20.1307 5.8271 20.7 6.17573L54.4688 26.8335C55.0136 27.1628 55.4641 27.6274 55.7762 28.1823C56.0883 28.7371 56.2515 29.3633 56.25 30Z" fill="white" fill-opacity="0.8" shape-rendering="crispEdges"/>
            </g>
          </g>
          <defs>
            <filter id="filter0_d_741_4589" x="-5" y="-14.3762" width="81.25" height="88.7524" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
              <feFlood flood-opacity="0" result="BackgroundImageFix"/>
              <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
              <feOffset/>
              <feGaussianBlur stdDeviation="10"/>
              <feComposite in2="hardAlpha" operator="out"/>
              <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.5 0"/>
              <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_741_4589"/>
              <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_741_4589" result="shape"/>
            </filter>
            <clipPath id="clip0_741_4589">
              <rect width="60" height="60" fill="white"/>
            </clipPath>
          </defs>
        </svg>
      </div>
    </div>
    <div class="card-content p-x1">
      <div class="d-flex align-items-center mb-x1">
        <ul class="list-unstyled d-flex">
          <?php foreach( $terms as $term ) : ?>
            <li class="me-2">
              <p class="btn btn-secondary20 text-small">
                <?php echo $term ->name ?>
              </p>
            </li>
          <?php endforeach ?>
        </ul>
        <p class="text-small text-end">
          <?php echo get_the_Date() ?>
        </p>
      </div>
      <h4><?php echo get_the_title() ?></h4>
      <p class="mul-ellipsis text-small">
        <?php 
          echo get_the_excerpt();
        ?>
      </p>
    </div>
    <a href="<?php echo get_permalink() ?>" class="stretched-link"></a>
  </div>
</div>
