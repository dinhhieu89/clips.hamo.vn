<?php get_header(); ?><div id="content">    <div id="left-sidebar">        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>    	<section class="entry-category">    		<h3><?php _e('Filed under:', 'themejunkie'); ?></h3><?php the_category(' '); ?>    	</section><!-- .entry-category -->        <?php the_tags( '<section class="entry-tags"><h3>Tagged with:</h3>', ' ', '</section>'); ?>        <section class="entry-social">            <h3><?php _e('Share this:', 'themejunkie') ?></h3>			<?php echo tj_social_bookmarks(); ?>        </section><!-- .entry-social -->        	<?php endwhile; else: ?>	<?php endif; ?>	    <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('left-sidebar-posts') ): ?>    <?php endif; ?>		            </div>        <article class="has-sidebar">    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>	   	<div class="entry-content">            <?php                $embed = get_post_meta(get_the_ID(), 'tj_video_embed', TRUE);                if($embed){            ?>                <div class="entry-embed">                	<?php echo stripslashes(htmlspecialchars_decode($embed));?>                </div><!-- .entry-embed -->            <?php                }            ?>		    <div class="entry-meta">		  		<?php _e('Posted on', 'themejunkie'); ?> <?php the_time('M j, Y'); ?> <?php _e('at', 'themejunkie'); ?> <?php the_time(); ?> &middot; <?php _e('by', 'themejunkie'); ?> <?php the_author_posts_link(); ?>		        <span class="entry-comment">		            <?php comments_popup_link( __( '0', 'theme junkie' ), __( '1', 'theme junkie' ), __( '%', 'theme junkie' ) ); ?>		        </span>		    </div><!-- .entry-meta -->		    	        <h1 class="entry-title"><?php the_title(); ?></h1>	        			<?php if(get_option('videoplus_integrate_singletop_enable') == 'on') echo (get_option('videoplus_integration_single_top')); ?>            <?php the_content(); ?>			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'themejunkie' ), 'after' => '</div>' ) ); ?>			<?php if(get_option('videoplus_integrate_singlebottom_enable') == 'on') echo (get_option('videoplus_integration_single_bottom')); ?>	    	<div class="clear"></div>			<?php edit_post_link('('.__('Edit', 'themejunkie').')', '<span class="entry-edit">', '</span>'); ?>	  	</div><!-- .entry-content -->		<div class="clear"></div>				<?php if(get_option('videoplus_show_author_box') == 'on') { ?> 					<div class="entry-author-box clear">				<div class="author-avatar">				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'themejunkie_author_bio_avatar_size', 60 ) ); ?>				</div> <!-- .author-avatar -->				<div class="author-description">					<h3><?php the_author(); ?></h3>					<?php the_author_meta( 'description' ); ?>				</div> <!-- .author-description -->				<div id="author-link">					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php printf( esc_attr__( 'View all posts by %s', 'theme junkie' ), get_the_author() ); ?>"><?php _e( 'View all posts by ', 'theme junkie' ); ?><?php the_author(); ?> &rarr;</a>				</div> <!-- .author-link -->							</div><!-- .entry-author-box -->					<?php } ?>				<?PHP if(get_option('videoplus_show_entry_bottom') == 'on') { ?>					<div class="entry-bottom">										<div class="related-posts">					<?php tj_related_posts(); ?>				</div><!-- .related-posts -->								<?PHP if(get_option('videoplus_entry_bottom_ad_enable') == 'on') { ?>					<div class="entry-bottom-ad">						<h3 class="ad-title"><?php _e('Advertisement','theme junkie'); ?></h3>						<?php echo get_option('videoplus_entry_bottom_ad_code'); ?>					</div><!-- .entry-bottom-ad -->				<?php } ?>								<div class="clear"></div>						</div><!-- .entry-bottom -->		<?php } ?>		    	<?php if(get_option('videoplus_show_post_comments') == 'on') { ?>	  		<?php comments_template(); ?>  		  	<?php } ?>	  		<?php endwhile; else: ?>	<?php endif; ?>    </article><!-- article -->        <?php get_sidebar(); ?></div> <!-- #content --><?php get_footer(); ?>