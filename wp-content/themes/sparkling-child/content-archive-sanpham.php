<?php
/**
 * @package sparkling
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(array('sanpham')); ?>>
    <div class="blog-item-wrap">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
            <?php the_post_thumbnail( 'sanpham_thumb', array( 'class' => 'sanpham_thumb' )); ?>
        </a>
        <div class="post-inner-content">
            <header class="entry-header page-header">
                <h3 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                <div class="entry-price">Giá: <?php echo get_post_meta( $post->ID, '_giasanpham', true ); ?></div>


            </header><!– .entry-header –>


        </div>
    </div>
</article><!– #post-## –>