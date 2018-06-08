<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.  The actual display of comments is
 * handled by a callback to twentyten_comment which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.1
 */

  
  if ( post_password_required() ) : 
    echo '<p>Insira a senha para visualizar os comentários.</p>';

    /* Stop the rest of comments.php from being processed,
     * but don't kill the script entirely -- we still have
     * to fully load the template.
     */
    return;
  endif;


  if ( have_comments() ) : ?>
      <!-- STARKERS NOTE: The following h3 id is left intact so that comments can be referenced on the page -->
      <div class="box-comments">
      <h2 class="s-title"><span><?php
      printf( _n( '01 Comentário', '%1$s Comentários', get_comments_number(), 'twentyten' ),
      number_format_i18n( get_comments_number() ), '' . get_the_title() . '' );
      ?></span></h2>

<?php 
      // Are there comments to navigate through?
      if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : 
        
        previous_comments_link( __( '&larr; Comentários Anteriores', 'twentyten' ) );
        next_comments_link( __( 'Próximos Comentários &rarr;', 'twentyten' ) );

      endif;

      echo "<ol>";        
        wp_list_comments('avatar_size=50&callback=mytheme_comment');
      echo "</ol></div>";
      
      // Are there comments to navigate through? 
      if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : 
        previous_comments_link( __( '&larr; Older Comments', 'twentyten' ) );
        next_comments_link( __( 'Newer Comments &rarr;', 'twentyten' ) ); 
      endif; // check for comment navigation 

  else : // or, if we don't have comments:

    /* If there are no comments and comments are closed,
     * let's leave a little note, shall we?
     */
    if ( ! comments_open() ) :
      // Exibe ou não exibe a mensagem de comentários fechados
      echo '<p>Comentários fechados</p>';
    endif; // end ! comments_open()

  endif; // end have_comments() 

  $commenter = wp_get_current_commenter();
  $req = get_option( 'require_name_email' );
  $aria_req = ( $req ? " aria-required='true'" : '' );

  $fields =  array(

    'author' =>
      '<p class="comment-form-author"><label class="sr-only" for="author">Nome</label><input id="author" name="author" placeholder="nome" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
      '" ' . $aria_req . ' /></p>',

    'email' =>
      '<p class="comment-form-email"><label class="sr-only" for="email">Email</label><input id="email" name="email" type="text" placeholder="e-mail (não será publicado)" value="' . esc_attr(  $commenter['comment_author_email'] ) .
      '" size="30"' . $aria_req . ' /></p>',

    'url' =>
      '<p class="comment-form-url"><label class="sr-only" for="url">Site</label>' .
      '<input id="url" name="url" type="text" placeholder="blog ou site"  value="' . esc_attr( $commenter['comment_author_url'] ) .
      '" size="30" /></p>',
  );


  $args = array(
    'id_form'           => 'commentform',
    'id_submit'         => 'submit',
    'class_submit'      => 'submit btn-envia',
    'name_submit'       => 'submit',
    'title_reply'       => __( 'deixe seu comentário' ),
    'title_reply_to'    => __( 'Responda a %s' ),
    'cancel_reply_link' => __( 'Cancelar resposta' ),
    'label_submit'      => __( 'Enviar' ),
    'format'            => 'xhtml',

    'comment_field' =>  '<p class="comment-form-comment"><label class="sr-only" for="comment">' . _x( 'Comment', 'noun' ) .
      '</label><textarea id="comment" name="comment" cols="45" rows="4" aria-required="true" placeholder="comentário">' .
      '</textarea></p>',

    'must_log_in' => '<p class="must-log-in">' .
      sprintf(
        __( 'Você precisa fazer <a href="%s">login</a> para postar um comentário.' ),
        wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
      ) . '</p>',

    'logged_in_as' => '<p class="logged-in-as">' .
      sprintf(
      __( 'Logado como: <a href="%1$s">%2$s</a>. <a href="%3$s" title="Deseja sair?">Sair?</a>' ),
        admin_url( 'profile.php' ),
        $user_identity,
        wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
      ) . '</p>',

    'comment_notes_before' => '',
    'comment_notes_after' => '',

    'fields' => apply_filters( 'comment_form_default_fields', $fields ),
  );

  comment_form($args); 
?>