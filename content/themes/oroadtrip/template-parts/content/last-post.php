<div <?php post_class(); ?>>
  <div class=""><?php the_post_thumbnail('cropped-last-post'); ?></div>
  <div class="">
    <h5 class=""><?php the_title(); ?></h5>
    <p class=""><?php the_excerpt(); ?></p>
    <a class="" href="<?php the_permalink(); ?>" role="">Lire <?php the_title(); ?></a>
  </div>
</div>