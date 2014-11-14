<?php 
$qry_args = array(
        'post_status' => 'publish', // optional
        'post_type' => 'product_manager', // Change to match your post_type
        'posts_per_page' => -1, // ALL posts
        );
    $all_posts = new WP_Query( $qry_args );
?>    

<div class="my_meta_control">
    <p style="display:inline-block;">
        
        <select name ="compare[compare_product1_id]">
            <option value="0">choose one</option>
            <?php 
             foreach ($all_posts->posts as $post ) :?>
            <?php if (isset($compared_product['compare_product1_id']) && $compared_product['compare_product1_id'] == $post->ID) :?>
                   <option selected ="selected" value="<?php echo $post->ID; ?> "><?php echo $post->post_title; ?></option> 
            <?php else : ?>
            <option value="<?php echo $post->ID; ?> "><?php echo $post->post_title; ?></option> 
                <?php endif; ?>
              <?php  endforeach; ?>     
        </select>
    </p>
<?php $post ='';
$arg2 = array(
        'post_type' => 'product_manager',
        'posts_per_page' => -1
    );
$products2 = new WP_Query( $arg2 ); 
 ?>
    
        <select name= "compare[compare_product2_id]">
            <option value="0">choose one</option>
            <?php 
             foreach ($products2->posts as $post ) :?>
            <?php if (isset($compared_product['compare_product2_id']) && $compared_product['compare_product2_id'] == $post->ID) :?>
                   <option selected ="selected" value="<?php echo $post->ID; ?> "><?php echo $post->post_title; ?></option> 
            <?php else : ?>
            <option value="<?php echo $post->ID; ?> "><?php echo $post->post_title; ?></option> 
                <?php endif; ?>
              <?php  endforeach; ?>   
        </select>
 
</div>