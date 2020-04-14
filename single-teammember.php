<?php get_header(); ?>

<?php get_template_part( 'inc/banner' ); ?>
   
    <!-- CONTENT -->
    <div class="content">
        <div class="container">
            <div class="row">
              <div class="span9 single">

                    <?php if (have_posts()) while (have_posts()) : the_post(); ?>

                        <article id="post-<?php the_ID(); ?>" <?php post_class('post clearfix'); ?>>                           
                            
                            <div class="title custom-single-teammember">
                                <div class="team-image"><?php the_post_thumbnail(); ?> </div>
                            </div>
                            
                            <div class="post-detail">
                                <?php the_content();?>
                            </div>
                            
                        </article>

                        <?php endwhile; ?>

                    </div>
              </div>
        </div>
    </div>

<?php get_footer(); ?>
