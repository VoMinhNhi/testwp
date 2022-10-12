</pre>
<pre><?php
		/**
		 * @package sparkling
		 */
		?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   <div class="post-inner-content">
      <header class="entry-header page-header">
         <div class="left">
            <?php if (has_post_thumbnail($post->ID)) : ?>
               <?php the_post_thumbnail('sanpham_thumb'); ?>
            <?php endif; ?>
         </div>
         <div class="right">
            <h1 class="entry-title "><?php the_title(); ?></h1>
            <div class="entry-cat"><?php the_taxonomies($args); ?></div>
            <div class="entry-price">Giá: <?php echo number_format(get_post_meta($post->ID, '_giasanpham', true), 0, ',', '.') ?> VNĐ</div>	
			<div class="entry-price">Phẩm chất tướng: <?php echo get_post_meta($post->ID, '_phamchat', true); ?></div>
			<div class="entry-price">Quốc gia tướng: <?php echo get_post_meta($post->ID, '_quocgia', true); ?></div>
         </div>
      </header><!– .entry-header –>
	  <div class="buy-btn"><?php echo do_shortcode('[ninja_form id=6 text_link="Đặt hàng"]'); ?></div>

      <div class="entry-content">
         <?php the_content(); ?>


         <div class="sanpham_att">
            <?php $sanpham_atts = get_post_meta($post->ID, 'sanpham_attributes', false); ?>
            <table class="sanpham_att_table">
               <?php
				foreach ($sanpham_atts as $atts) {
					foreach ($atts as $att) { ?>
                     <tr class="sanpham_att_table_row">
                        <th><?php echo $att['sanpham_att_name']; ?></th>
                        <th><?php echo $att['sanpham_att_value']; ?></th>
                     </tr>
                  <?php }
				}
					?>
            </table>
         </div>
         <?php
			wp_link_pages(array(
				'before'            => '<div class="page-links">' . esc_html__('Pages:', 'sparkling'),
				'after'             => '</div>',
				'link_before'       => '<span>',
				'link_after'        => '</span>',
				'pagelink'          => '%',
				'echo'              => 1
			));
			?>
      </div><!– .entry-content –>


      <footer class="entry-meta">


         <?php if (has_tag()) : ?>
            <!– tags –>
            <div class="tagcloud">


               <?php
				$tags = get_the_tags(get_the_ID());
				foreach ($tags as $tag) {
					echo '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a> ';
				} ?>


            </div>
            <!– end tags –>
         <?php endif; ?>


      </footer><!– .entry-meta –>
   </div>


   <?php if (get_the_author_meta('description')) :  ?>
      <div class="post-inner-content secondary-content-box">
         <!– author bio –>
         <div class="author-bio content-box-inner">


            <!– avatar –>
            <div class="avatar">
               <?php echo get_avatar(get_the_author_meta('ID'), '60'); ?>
            </div>
            <!– end avatar –>


            <!– user bio –>
            <div class="author-bio-content">


               <h4 class="author-name"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author_meta('display_name'); ?></a></h4>
               <p class="author-description">
                  <?php echo get_the_author_meta('description'); ?>
               </p>


            </div><!– end .author-bio-content –>


         </div><!– end .author-bio  –>


      </div>
   <?php endif; ?>


</article><!– #post-## –>