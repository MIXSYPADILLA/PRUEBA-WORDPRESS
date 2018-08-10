<?php
/**
 * Meta Boxes.
 *
 * @package Spark_Constrcution_Lite
 */

function sparkconstructionlite_meta_init() {

    add_meta_box( 'sparkconstructionlite_sidebar', esc_html__( 'Sidebar Position', 'spark-construction-lite' ), 'sparkconstructionlite_sidebar_meta_options', array( 'page', 'post' ), 'normal', 'default' );
}
add_action( 'admin_init', 'sparkconstructionlite_meta_init' );

/*
 * Post Meta Box
 */
function sparkconstructionlite_sidebar_meta_options( $post ) {

    wp_nonce_field( 'sparkconstructionlite_post_meta_box_nonce', 'meta_box_nonce' );

    $sidebar_positions =array(
        'leftsidebar' => array(
            'value'     => 'left',
            'label'     => esc_html__( 'Left Sidebar', 'spark-construction-lite' ),
            'thumbnail' => get_template_directory_uri() . '/offshorethemes/assets/admin/img/left-sidebar.png',
        ),
        'rightsidebar' => array(
            'value'     => 'right',
            'label'     => esc_html__( 'Right (Default)', 'spark-construction-lite' ),
            'thumbnail' => get_template_directory_uri() . '//offshorethemes/assets/admin/img/right-sidebar.png',
        ),
         'nosidebar' => array(
            'value'     => 'none',
            'label'     => esc_html__( 'Full width', 'spark-construction-lite' ),
            'thumbnail' => get_template_directory_uri() . '/offshorethemes/assets/admin/img/no-sidebar.png',
        )
    );

    ?>

    <table>
        <tr>
          <td>            
            <?php
                $i = 0;  
                foreach ( $sidebar_positions as $field ) { 
                    $sparkconstructionlite_sidebar = esc_attr( get_post_meta( $post->ID, 'sparkconstructionlite_sidebar', true ) ); 
                    ?>            
                    <div class="radio-image-wrapper slidercat" id="slider-<?php echo intval( $i ); ?>" style="float:left; margin-right:15px;">
                        <label class="description">
                            <span>
                                <img src="<?php echo esc_url( $field['thumbnail'] ); ?>" />
                            </span>
                            </br>
                            <input type="radio" name="sparkconstructionlite_sidebar" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( esc_html( $field['value'] ), $sparkconstructionlite_sidebar ); if( empty( $sparkconstructionlite_sidebar ) && esc_html( $field['value'] ) =='right') { echo "checked='checked'";  } ?>/>
                         <?php echo esc_html( $field['label'] ); ?>
                        </label>
                    </div>
                    <?php  
                    $i++; 
                }  
            ?>
          </td>
        </tr>            
    </table>  
    <?php   
}


function sparkconstructionlite_sidebar_meta_save( $post_id ) {

    global $post;  

    $custom_meta_fields = array( 'sparkconstructionlite_sidebar' );

    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( sanitize_key( $_POST['meta_box_nonce'] ), 'sparkconstructionlite_post_meta_box_nonce' ) ) return;
    
    // Check permission.
    if ( isset( $_POST['post_type'] ) && 'page' === $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post->ID ) ) {
            return;
        }
    } elseif ( ! current_user_can( 'edit_post', $post->ID ) ) {
        return;
    }
    
    foreach( $custom_meta_fields as $custom_meta_field ) {

        if( isset( $_POST[$custom_meta_field] ) )           

            update_post_meta( $post->ID, $custom_meta_field, sanitize_text_field( wp_unslash( $_POST[$custom_meta_field] ) ) );      
    }   
}
add_action( 'save_post', 'sparkconstructionlite_sidebar_meta_save' );
