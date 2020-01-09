<?php

$page = "home";

$title = "My Homepage";

$metaD = "Welcome to my homepage";

include 'header.php';

$id = $_GET['id'];
$data = get_post($id);
?>
     <section class="Blog" id="single_blog">
         <div class="container">
            
            <div class="row">
               <div class="col-md-9 col-sm-12">
                  <div class="content">
                     
                      <div class="blog_content">
                           <?php
                           
                                $args = array(
                                    'post_type' => 'post',
                                    
                                );
                                $value = $id;
                                $post_query = new WP_Query($args);
                                if($post_query->have_posts() ) {
                                  while($post_query->have_posts() ) {
                                    $post_query->the_post();
                                    ?>
                                    <?php if($post->ID == $value) { ?>
                                        <?php if (has_post_thumbnail( $value ) ){ ?>
                                          <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $value ), 'single-post-thumbnail' ); ?>
                                            <img src="<?php echo $image[0]; ?>" style="width: 100%;">
                                        
                                          </div>
                                        <?php } else { ?>
                                            <img src="/images/blog1.jpg" style="width: 100%;">
                                            <?php } ?>
                                             
                                        <?php  
                                       }
                                    }
                                }
                            ?>
                                   
                            <h2><?php echo $data->post_title; ?></h2>
                            <p class="date"><?php echo $data->post_date; ?> <a href="#">On Demand App Services</a> </p>
                       
                    
                     <p><?php echo $data->post_content; ?>.</p>  

                  </div>
                </div>

                <div class="col-md-3 col-sm-12">
                 
                 <h4 class="lates_blog_title">Latest Blogs</h4>
                 
                <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                    );
                
                    $post_query = new WP_Query($args);
                    if($post_query->have_posts() ) {
                      while($post_query->have_posts() ) {
                        $post_query->the_post();
                        ?>
                        <div class="lates_blog_sec ">
                            <a class="row" href="/blog_page.php?id=<?php echo $post->ID; ?>">
                                <div class="lates_blog img col-md-4 pr-0">
                                 <?php
                                    if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                                    the_post_thumbnail( 'full' );
                                    } else {
                                    ?>
                                    <img src="/images/blog1.jpg" style="width: 100%;">
                                <?php } ?>
                                </div>
                                <div class="col-md-8">
                                    <p class="lates_blog"><b class="date"><?php echo get_the_date() ?></b></br><?php
                                    echo "<h3>".the_title()."</h3>";
                                ?></p>
                                </div>
                            </a>
                        </div>
                        <?php  
                       }
                    }
                ?>
                 
            </div>
         </div>
      </section>
      
            <?php

include 'footer.php';

?>
