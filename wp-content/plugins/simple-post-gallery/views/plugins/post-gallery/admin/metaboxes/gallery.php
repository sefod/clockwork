<?php
/**
 * Metabox gallery view/template.
 *
 * @author Alejandro Mostajo <http://about.me/amostajo>
 * @copyright 10Quality <http://www.10quality.com>
 * @package PostGallery
 * @version 1.0
 */ 
?>
<?php use PostGallery\Main as Software ?>
<div id="post-gallery">

    <div class="heading">
        <a href="#add-gallery-media"
            data-editor="post-gallery"
            class="button insert-media"
        >
            <i class="fa fa-picture-o" aria-hidden="true"></i> <?php _e( 'Add Image', 'post-gallery' ) ?>
        </a>
    </div>

    <!-- Caller -->
    <span class="media-uploader"
        style="display: none;"
        data-editor="post-gallery"
        data-target="#post-gallery-media"
    >
        <?php $view->show( 'plugins.post-gallery.admin.metaboxes.input-attachment' ) ?>
    </span>

    <!-- Results placeholder -->
    <div id="post-gallery-media"
        class="body sortable"
    >
        <?php foreach ( $post->gallery as $attachment ) : ?>
            <?php $view->show( 'plugins.post-gallery.admin.metaboxes.input-attachment', [
                'attachment'    => $attachment,
            ] ) ?>
        <?php endforeach ?>
    </div>

    <div class="footer">
        <span class="pull-left">
            <?php _e( 'Display in', 'post-gallery' ) ?> 
            <a href="<?php echo admin_url( 'options-general.php?page=' . Software::ADMIN_MENU_SETTINGS . '&tab=docs' ) ?>"
            ><?php _e( 'templates', 'post-gallery' ) ?></a><?php _e( '?', 'post-gallery' ) ?>
        </span>
        <span class="pull-right">
            <?php _e( 'Shortcode:', 'post-gallery' ) ?> 
            <strong><?php _e( '[post_gallery]', 'post-gallery' ) ?></strong>
        </span>
    </div>

</div>