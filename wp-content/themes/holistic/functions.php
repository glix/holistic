<?php 
function default_setting(){
    define('THEMEROOT',get_stylesheet_directory_uri());
    define('IMAGES',THEMEROOT .'/images');


    /*********************************************************
            ************ MENU ************          
    **********************************************************/
    show_admin_bar( false );
    function debug($data = array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    function register_my_menus(){       
        register_nav_menus(array(
            'main-menu' => __('Main Menu','holistic-vibration')
        ));
    }
    add_theme_support( 'post-thumbnails', array( 'product_manager','buyer_guide') );
    add_image_size( 'product-thumb', 150, 150  ); // (cropped)
    add_image_size('all-product-thumb-comparison',52,90);

    function admin_css(){
        wp_enqueue_style('my_meta_css', THEME_PATH . '/custom/custom.css');
    }   
    add_action('admin_init','admin_css');


}
add_action('init','default_setting');


function holistic_scripts() {

    wp_enqueue_style( 'holistic-vibration-script', get_stylesheet_uri() );

    wp_enqueue_script(  'ajax-script', get_template_directory_uri() . '/js/fronthend-medical-review-ajax.js', array(), true );
    
    $title_nonce = wp_create_nonce('title_example');

    wp_localize_script('ajax-script', 'my_ajax_obj', array(
    'ajax_url' => admin_url( 'admin-ajax.php' ),
    'nonce'    => $title_nonce, 
    )); 
}

// add_action('admin_enqueue_scripts', 'holistic_scripts');
add_action( 'wp_enqueue_scripts', 'holistic_scripts' );

// add_action('wp_ajax_nopriv_my_action','compare_select_list_callback');

function action_callback() {
     global $wpdb;
    $query = '';    
    $query_data = new WP_Query(array('post_type' =>'product_manager','order' => 'ASC'));
    $html = '';
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    } else {
        
    }
    $products = $query_data->get_posts();
    $html .='<option value=0 selected="selected">Choose Model</option>';
    foreach ($products as $product) {
                if ($product->ID ==$id) {
                    
                }
                else {
             $html .= '<option value= '. $product->ID .' >'. $product->post_title .'</option>'; 
         }
    }
    echo $html;
    die(); 
                         
}

add_action('wp_ajax_nopriv_action', 'action_callback');
add_action( 'wp_ajax_action', 'action_callback' );

add_action('wp_ajax_nopriv_my_action', 'my_action_callback');
add_action( 'wp_ajax_my_action', 'my_action_callback' );

add_action('wp_ajax_nopriv_all_action', 'all_action_callback');
add_action( 'wp_ajax_all_action', 'all_action_callback' );

function all_action_callback(){
    global $wpdb;
    
    if (isset($_POST['slug']) && $_POST['slug'] != null) {
        $slug = $_POST['slug'];
        $args = array(
                'post_type' =>'product_manager',
                'order' => 'ASC',
                'posts_per_page'=>-1,
                'tax_query' => array(
                            array(
                                'taxonomy' => 'medical_conditions',
                                'field'    => 'slug',
                                'terms'    => $slug,
                            )
                        )
                     );
    }
    
    if (isset($_POST['rating']) && $_POST['rating'] != null) {
        $rating = $_POST['rating'];
                $args = array(
                                 'post_type' =>'product_manager',
                                'order' => 'ASC',
                                'posts_per_page'=>-1,
                                'meta_key' => 'review-star',
                                'meta_value' => $rating
                            );  
    }
    if (isset($_POST['rating']) && $_POST['slug'] ) {
            $rating = $_POST['rating'];
            $slug = $_POST['slug'];
            $args = array(   
            'post_type' =>'product_manager',
            'order' => 'ASC',
            'posts_per_page'=>-1,   
            'meta_key' => 'review-star',
            'meta_value' => $rating,
             'tax_query' => array(
                            array(
                                'taxonomy' => 'medical_conditions',
                                'field'    => 'slug',
                                'terms'    => $slug,
                            )
                        )
                );  
                
    }
    if ($_POST['rating']=='0' && $_POST['slug']=='0') {
        $args = array(
            'post_type' => 'product_manager',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'caller_get_posts'=> 1
        );
    }
    $query = new WP_Query($args);
    $html ='';
    
        if ( $query->have_posts() ) {
            $i = 1;
            while ( $query->have_posts() ) : $query->the_post();

                $product_logo = get_post_meta(get_the_ID(),'product_logo',true);
                $image_attributes = wp_get_attachment_image_src($product_logo);
                $metaBox = get_post_custom(get_the_ID());
                $all_metaBox_values = unserialize($metaBox['review_specs']['0']);
                ?>  
                <?php if($i == 1): 

                echo  '<div class="preload-image"></div><div id="product-row" class="row"><div class="product-slider" id="all-product">';
                echo '<ul id="product-list-wrapper">';
                 endif; 
                    echo '<li>
                        <a href="'.  get_permalink( $post->ID ) .'">';
                            if ( has_post_thumbnail() ) { 
                                the_post_thumbnail('full');
                            } else {
                                echo "<div style='width:150px;height:150px'></div>" ;
                            }
                            
                            echo '<div class="featured-overlay">
                                <h5>'; the_title(); echo  '</h5>';
                                
                                    if ($image_attributes) :
                                        echo  '<div><img src="'.$image_attributes[0].'"></div>';
                                    endif;
                           
                            echo '<ul>';
                                     if (isset($all_metaBox_values['fitness'])) {
                                        echo "<li>Fitness ". $all_metaBox_values['fitness']."</li>";    
                                    } ?>    
                                    <?php if (isset($all_metaBox_values['bone'])) {
                                        echo  "<li> Bone density ". $all_metaBox_values['bone']."</li>";
                                    } ?>
                                    <?php if (isset($all_metaBox_values['detoxification'])) {
                                        echo  "<li> Detoxification ". $all_metaBox_values['detoxification']."</li>";
                                    } ?>
                                    <?php 
                                    if (isset($all_metaBox_values['lymph_drainage'])) {
                                        echo  "<li> Lymph Drainage ".$lymph_drainage."</li>";
                                    }
                                    
                            echo '</ul>
                            </div>
                        </a>
                        <div class="info">
                            <a href="#"><i class="fa fa-youtube-play"></i>VIDEO DEMO</a>
                            <a href="#"><i class="fa fa-info-circle"></i>MORE INFO</a>
                        </div>  
                    </li>';
            
                            $i++; 
                            if($i == 7): 
                                $i = 1;
                        
                            echo  '</ul>
                            </div>';
                        endif; ?>
                    <?php endwhile; ?>
            <?php 
            echo  '</div></div>';
        } else {
            echo '<div id="product-row" class="row"></div>';
        }
        
    echo $html;
    die();
}
    function my_action_callback() {
    global $wpdb; 
    
    if (isset($_POST['slug']) && $_POST['slug'] != null) {
        $slug = $_POST['slug'];
        $args = array(
                'post_type' =>'product_manager',
                'order' => 'ASC',
                'posts_per_page'=>-1,
                'tax_query' => array(
                            array(
                                'taxonomy' => 'medical_conditions',
                                'field'    => 'slug',
                                'terms'    => $slug,
                            )
                        )
                     );
    }
    
    if (isset($_POST['rating']) && $_POST['rating'] != null) {
        $rating = $_POST['rating'];
                $args = array(
                                 'post_type' =>'product_manager',
                                'order' => 'ASC',
                                'posts_per_page'=>-1,
                                'meta_key' => 'review-star',
                                'meta_value' => $rating
                            );  
    }
    if (isset($_POST['rating']) && $_POST['slug'] ) {
            $rating = $_POST['rating'];
            $slug = $_POST['slug'];
            $args = array(   
            'post_type' =>'product_manager',
            'order' => 'ASC',
            'posts_per_page'=>-1,   
            'meta_key' => 'review-star',
            'meta_value' => $rating,
             'tax_query' => array(
                            array(
                                'taxonomy' => 'medical_conditions',
                                'field'    => 'slug',
                                'terms'    => $slug,
                            )
                        )
                );  
                
    }
    if (isset($_POST['rating']) && isset($_POST['slug'])) {
        $args = array(
                'post_type' => 'product_manager',
                'order'=> 'ASC',
                'posts_per_page' => -1
            );
    }
    $query = new WP_Query($args);
    $posts = $query->get_posts();
    echo '<ul class="es-slides" id="product_list_wrapper">';  
     foreach($posts as $post) :
            
    echo   '<li class="product-list" style="margin-right: 30px; width: 175px; height: 274px;">';
        
            $custom_fields =(get_post_custom($post->ID));
            $review_values = unserialize($custom_fields['review_specs']['0']);
            // debug($review_values);
            if (!empty($review_values['featured']) && $review_values['featured'] == 1 ) {
                $class = '<div class="feature"></div>';
            } else {
                $class = '';
            }
        
    echo  '<a href="'.  get_permalink( $post->ID ) .'">'.$class;
                
                 $metaBox = get_post_custom($post->ID);
                 $featured_image = $metaBox['_thumbnail_id']['0'];
                 $featured_image_attributes = wp_get_attachment_image_src($featured_image, 'full');
                 if ($featured_image_attributes) {
                    echo '<img class="attachment-product-thumb wp-post-image" src="'.$featured_image_attributes[0].'" width="150"height="150"/>';
                 }
                 else {
                    echo "<div style='width:150px;height:150px'></div>" ;
                }
                $metaBox = get_post_custom($post->ID);
                $all_metaBox_values = unserialize($metaBox['review_specs']['0']);
                ?>
                <?php 
                $product_logo = get_post_meta($post->ID,'product_logo',true);
         
    echo        '<div class="featured-overlay">
                    <h5>'; echo $post->post_title; echo '</h5>';
                    
                    $image_attributes = wp_get_attachment_image_src($product_logo);

                    if ($image_attributes) :
                        echo '<div><img src="'.$image_attributes[0].'"></div>';
                        endif;
        
                echo '<ul>';
                        if (isset($all_metaBox_values['fitness'])) {
                            echo "<li>Fitness ". $all_metaBox_values['fitness']."</li>";    
                        } ?>    
                        <?php if (isset($all_metaBox_values['bone'])) {
                            echo "<li> Bone density ". $all_metaBox_values['bone']."</li>";
                        } ?>
                        <?php if (isset($all_metaBox_values['detoxification'])) {
                            echo "<li> Detoxification ". $all_metaBox_values['detoxification']."</li>";
                        } ?>
                        <?php 
                        if (isset($all_metaBox_values['lymph_drainage'])) {
                            echo "<li> Lymph Drainage ".$lymph_drainage."</li>";
                        }
                
                echo ' </ul>
                </div>
            </a>
            <div class="info">
                <a href="#"><i class="fa fa-youtube-play"></i>VIDEO DEMO</a>
                <a href="#"><i class="fa fa-info-circle"></i>MORE INFO</a>
            </div>
        </li>';
    endforeach;
    echo '</ul>';
    echo $html;
    die(); 
    }


add_action('init','register_my_menus');
define('THEME_FOLDER',str_replace("\\",'/',dirname(__FILE__)));

define('THEME_PATH','/' . substr(THEME_FOLDER,stripos(THEME_FOLDER,'wp-content')));


add_action('admin_init','comparison_product_init');
function comparison_product_init()
{
    wp_enqueue_style('comparison_css', THEME_PATH . '/comparison/comparison.css');
    foreach (array('comparison') as $type)
    {
        add_meta_box('comparison', ' Compare Product ', 'comparison_setup',  $type, 'normal', 'high');
    }

    add_action('save_post','compare_product_save');
}
 
function comparison_setup()
{
    global $post;
    $compared_product = get_post_meta($post->ID,'compare',TRUE);
    include(THEME_FOLDER . '/comparison/comparison.php');
    
    // create a custom nonce for submit verification later
    echo '<input type="hidden" name="compare_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}

function compare_product_save($post_id)
{
    if (!wp_verify_nonce($_POST['compare_noncename'],__FILE__)) return $post_id;
    if ($_POST['post_type'] == 'page')
    {
        if (!current_user_can('edit_page', $post_id)) return $post_id;
    }
    else
    {
        if (!current_user_can('edit_post', $post_id)) return $post_id;
    }
    $current_data = get_post_meta($post_id, 'compare', TRUE);

    $new_data = $_POST['compare'];
    if ($current_data)
    {
        if (is_null($new_data)) delete_post_meta($post_id,'compare');
        else update_post_meta($post_id,'compare',$new_data);
    }
    elseif (!is_null($new_data))
    {
        add_post_meta($post_id,'compare',$new_data,TRUE);
    }
 
    return $post_id;
}


add_action('admin_init','product_manager_meta_box_init');

function product_manager_meta_box_init()
{
    
    foreach (array('product_manager') as $type){
        add_meta_box('product_manager', 'Product Specification', 'my_meta_setup', $type, 'normal', 'core');
    }
    // add a callback function to save any data a user enters in
    add_action('save_post','my_meta_save');
}
 
function my_meta_setup()
{
    global $post;
    $review_specs_values = get_post_meta($post->ID,'review_specs',TRUE);
    include(THEME_FOLDER . '/custom/meta.php');
    echo '<input type="hidden" name="my_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}

function my_meta_save($post_id)
{
    if (!wp_verify_nonce($_POST['my_meta_noncename'],__FILE__)) return $post_id;
    // check user permissions
    if ($_POST['post_type'] == 'page')
    {
        if (!current_user_can('edit_page', $post_id)) return $post_id;
    }
    else
    {
        if (!current_user_can('edit_post', $post_id)) return $post_id;
    }

    $current_data = get_post_meta($post_id, 'review_specs', TRUE); 
    
    $new_data = $_POST['review_specs'];
    if (isset($new_data['fact'])) {
        
    
        foreach ($new_data['fact'] as $key => $value) { 
            if (empty($value['title']) && empty($value['desc'])) {
                    unset($new_data['fact'][$key]);
            }   
        }   
    }
  
    if ($current_data)
    {
        if (is_null($new_data)) delete_post_meta($post_id,'review_specs');
        else update_post_meta($post_id,'review_specs',$new_data);
    }

    elseif (!is_null($new_data))
    {
        add_post_meta($post_id,'review_specs',$new_data,TRUE);
    }

    if (isset($new_data['link'])) {
         update_post_meta($post_id,'review-star',$new_data['link']);
    }
    return $post_id;
}   
    // add new sidebar
    function add_new_sidebar() {
        register_sidebar(array(
        'name' => __( 'Sidebar 1', 'quickchic' ),
        'id' => 'sidebar-1',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
        ));
    }
    add_action( 'init', 'add_new_sidebar' );

    // remove quick edit links
    function remove_quick_edit( $actions ) {
        unset($actions['inline hide-if-no-js']);
        return $actions;
    }
    add_filter('post_row_actions','remove_quick_edit',10,1);

    // remove parent and description fields from taxonomy
    function remove_extra_fields_taxonomy()
    {
        // don't run in the Tags screen
        if ( ('medical_conditions' != $_GET['taxonomy']) && ('comparison' != $_GET['taxonomy']) && ('guide_category' != $_GET['taxonomy']))
            return;

        $parent = 'parent()';
        if ( isset( $_GET['action'] ) )
            $parent = 'parent().parent()';

        ?>
            <script type="text/javascript">
                jQuery(document).ready(function($)
                {     
                    $('label[for=parent]').<?php echo $parent; ?>.remove();       
                    $('#tag-description').parent().remove();
                    // $('label[for=description]').parent().remove();
                    // $('#description').parent().remove();
                });
            </script>
        <?php
    }
    add_action( 'admin_head-edit-tags.php', 'remove_extra_fields_taxonomy' );

    // remove tag cloud from taxonomy
    function remove_tag_cloud ( $return, $args )
    {   
        if(isset($args['taxonomy']) && $args['taxonomy'] == "medical_conditions"){
            return false;
        }
    }
    add_filter( 'wp_tag_cloud', 'remove_tag_cloud', 10, 2 );

    add_filter('manage_product_manager_posts_columns', 'add_review_columns_head');
    add_action('manage_product_manager_posts_custom_column', 'add_review_columns_content', 10, 2);
    function add_review_columns_head($defaults) {
        $defaults['reviews'] = 'Reviews';
        return $defaults;
    }
     
    function add_review_columns_content($column_name, $post_ID) {
        $review_specs_values = get_post_meta($post_ID,'review_specs',TRUE);
        if ($column_name == 'reviews' && isset($review_specs_values['link'])) {
               echo $review_specs_values['link'];
        }else{
            echo 0;
        }
    }

 function comparison_feature($feature=array()){
    if (isset($feature)) {
        foreach ($feature as $value) {
            echo '<td class="table-data">';
            echo $value;
            echo "</td>";       
        }
    }

 }
?>
