<?php

/**
 * Sans Comments
 *
 * This template is loaded by single.php and contains comments
 * and the comment form. The actual display of comments is
 * handled by a callback to wap8_comments() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Sans
 * @since Sans 1.0.0
 * @author Jake Caputo
 *
 */

?>
	<section id="comments"><!-- Begin #comments -->
	<?php if ( post_password_required() ) : ?>
		<p><?php _e( 'This post is password protected. Enter the password to view any comments.', 'designcrumbs' ); ?></p>
	</section><!-- End #comments -->
	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>

	<?php $these_comments = get_comments_number(); // store the amount of comments for later testing ?>

	<?php if ( have_comments() ) : // if this post has comments ?>
		<h3 id="comments-title">
			<?php
				printf( _n( 'One Comment', '%1$s Comments', get_comments_number(), 'designcrumbs' ),
					number_format_i18n( get_comments_number() ) );
			?>
		</h2>

		<?php if ( !empty( $comments_by_type['comment'] ) ) : // list user generated comments ?>
		<ol class="commentlist">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use wap8_comments() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define wap8_comments() and that will be used instead.
				 * See wap8_comments() in dulce/functions.php for more.
				 */
				wp_list_comments( array(
					'callback' => 'wap8_comments',
					'type' => 'comment'
					));
			?>
		</ol>
		<?php endif; // end if there are no user generated comments ?>
		
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<div class="comment-pagination wap8-group"><!-- Begin .comment-pagination -->
			<h3><?php _e( 'Comment Navigation', 'designcrumbs' ); ?></h3>
			<ul>
				<li class="prev-comments"><?php previous_comments_link( __( '&larr; Older Comments', 'designcrumbs' ) ); ?></li>
				<li class="next-comments"><?php next_comments_link( __( 'Newer Comments &rarr;', 'designcrumbs' ) ); ?></li>
			</ul>
		</div><!-- End .comment-pagination -->
		<?php endif; // check for comment navigation ?>
		
		<?php if ( !empty( $comments_by_type['pings'] ) ) : // list trackbacks & pingbacks ?>
		<h3 class="trackback-heading"><?php _e( 'Trackbacks &#38; Pingbacks', 'designcrumbs' ); ?></h3>
		
		<ol class="trackbacklist">
			<?php
				/* Loop through and list the trackbacks. Tell wp_list_comments()
				 * to use wap8_trackbacks() to format the trackbacks.
				 * If you want to overload this in a child theme then you can
				 * define wap8_trackbacks() and that will be used instead.
				 * See wap8_trackbacks() in dulce/functions.php for more.
				 */
				wp_list_comments( array(
					'callback' => 'wap8_trackbacks',
					'type' => 'pings'
					));
			?>		
		</ol>
		<?php endif; // end if there are no trackbacks & pingbacks ?>

	<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'designcrumbs' ); ?></p>
	<?php endif; ?>

	<?php 
		$aria_req = isset($__POST['aria_req']);
	
		comment_form( array(
			'label_submit' => __( 'Submit Comment', 'designcrumbs' ),
			'title_reply' => __( 'Leave a Comment', 'designcrumbs' ),
			'fields' => array(
				'author' => '<p class="comment-form-author">' . '<label class="wap8-comment-form" for="author">' . __( 'Your Name', 'designcrumbs' )  . ( $req ? '<span class="required">*</span>' : '' ) . '</label><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" tabindex="1"' . $aria_req . ' />' . '</p><!-- #form-section-author .form-section -->',
				'email'  => '<p class="comment-form-email">' . '<label class="wap8-comment-form" for="email">' . __( 'Your Email', 'designcrumbs' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label><input id="email" name="email" type="email" placeholder="never shared" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" tabindex="2"' . $aria_req . ' />' . '</p><!-- #form-section-email .form-section -->',
				'url'    => '<p class="comment-form-url">' . '<label class="wap8-comment-form" for="url">' . __( 'Your URL', 'designcrumbs' ) . '</label>' . '<input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" tabindex="3" />' . '<!-- #<span class="hiddenSpellError" pre="">form-section-url</span> .form-section -->'
			),			
			'comment_field' => '<p class="comment-form-comment"><label class="wap8-comment-form" for="comment">' . __( 'Comment<span>&#42;</span>', 'designcrumbs' ) . '</label><textarea id="comment" name="comment" cols="55" rows="10" aria-required="true"></textarea></p>',
			'comment_notes_before' => __( '<p>Your email address will never be published or shared. Required fields are marked with an asterisk &#40;<span>&#42;</span>&#41;.</p>', 'notdivisible' ),
			'comment_notes_after' => ''	
		));
		
	?>

	</section><!-- End #comments -->
