<?php
// Template Name: User Dashboard My Bids

if ( !is_user_logged_in() ) {   
    wp_redirect(  home_url() );exit;
} 

get_header();

$current_user	= wp_get_current_user();
$user_small_picture_id	=   get_the_author_meta( 'small_custom_picture' , $current_user->ID  );

if( $user_small_picture_id == '' ){
    $user_small_picture[0]=get_template_directory_uri().'/img/default-user_1.png';
}else{
    $user_small_picture=wp_get_attachment_image_src($user_small_picture_id,'agent_picture_thumb');
}?>
-
<div class="row row_user_dashboard">

   <div class="col-md-3 user_menu_wrapper">
       <div class="dashboard_menu_user_image">
            <div class="menu_user_picture" style="background-image: url('<?php print $user_small_picture[0];  ?>');height: 80px;width: 80px;" ></div>
            <div class="dashboard_username">
                <?php _e('Welcome back, ','wpestate'); echo $user_login.'!';?>
            </div> 
        </div>
          <?php  get_template_part('templates/user_menu');  ?>
    </div>
    
    <div class="col-md-9 dashboard-margin">
		<h2 style="text-align: center;">My Current Bids</h2>
        <?php
		get_template_part('templates/breadcrumbs');
		get_template_part('templates/user_memebership_profile');
		get_template_part('templates/ajax_container');
		
		$my_bids = new WP_Query( array(
						'post_type'        => 'bid',
						'post_status'      => 'publish',
						'author'           => $current_user->ID
					)
				);
				
		if ( $my_bids->have_posts() ) {
			while ( $my_bids->have_posts() ) {
				$my_bids->the_post();
				$bid_id = $post->ID;
				$prop_id = esc_html(get_post_meta( $post->ID, 'wpcf-prop-id', true));
				$prop_image = get_the_post_thumbnail_url( $prop_id, 'blog_thumb' );
				$prop_add = esc_html(get_post_meta( $prop_id, 'property_address', true));
				$prop_price = esc_html(get_post_meta( $prop_id, 'property_price', true));
				$bid_sell_com = esc_html(get_post_meta( $post->ID, 'wpcf-sell-com', true));
				$bid_buy_com = esc_html(get_post_meta( $post->ID, 'wpcf-buy-com', true));
				$bid_both_com = esc_html(get_post_meta( $post->ID, 'wpcf-both-com', true));
				
				?>
					<div class="row bid-list">
						<div class="col-md-4 bid-attr">
							<img src="<?php echo $prop_image;?>">
						</div>
						<div class="col-md-3 bid-attr">
							<div class="bid-head">Address</div>
							<?php echo $prop_add;?>
						</div>
						<div class="col-md-2 bid-attr">
							<div class="bid-head">Asking</div>
							$<?php echo $prop_price;?>
						</div>
						<div class="col-md-1 bid-attr">
							<div class="bid-head">Me</div>
							<?php echo $bid_sell_com;?>%
						</div>
						<div class="col-md-1 bid-attr">
							<div class="bid-head">Buyers</div>
							<?php echo $bid_buy_com;?>%
						</div>
						<div class="col-md-1 bid-attr">
							<div class="bid-head">Dual Rep</div>
							<?php echo $bid_both_com;?>%
						</div>
					</div>
				
			<?php
			}
			/* Restore original Post Data */
			wp_reset_postdata();
		}
		else {
			echo "Nothing found";
		}?>          
    </div>
</div>
<?php get_footer(); ?>