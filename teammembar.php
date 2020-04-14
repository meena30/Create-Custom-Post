<?php
/*
 * Template Name: Team Member
 */
?>

<?php get_header(); ?>
<?php get_template_part( 'inc/banner' ); ?>

  <div class="content">
        <div class="container">
            <div class="row">
                
                <div class="span9 single">
                <?php
                 $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

                  $args = array( 'posts_per_page' => 10, 'post_type' => 'teammember',  'paged' => $paged);
                
                    // Instantiate custom query
                    $custom_query = new WP_Query( $args );

                    // Pagination fix
                    $temp_query = $wp_query;
                    $wp_query   = NULL;
                    $wp_query   = $custom_query;
                 ?>
               <?php if (have_posts()) while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('post clearfix'); ?>>
                            
                           <div class="title"><!--custom post Fearure image -->
                                <div class="team-image"><?php the_post_thumbnail(); ?> </div>                                
                            </div>
                            <div class="team-member-content">
                                <div class="name"><h2><?php the_title(); ?></h2></div>
                                <p><?php echo get_the_excerpt(); ?></p>
                            </div>
                        </article>
                <?php endwhile; 

                    // Reset postdata
                            wp_reset_postdata();
                            echo "<div class='pagination'>";
                            // Custom query loop pagination
                            previous_posts_link( '' );
                            next_posts_link( '', $custom_query->max_num_pages );
                            $big = 999999999; // need an unlikely integer

                            echo paginate_links( array(
                              'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                              'format' => '?paged=%#%',
                              'current' => max( 1, get_query_var('paged') ),
                              'total' => $custom_query->max_num_pages
                            ) );
                            // Reset main query object
                            echo "</div>";
                            $wp_query = NULL;
                            $wp_query = $temp_query;
                                               
            ?> 
                                        
                  </div>

               </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>
