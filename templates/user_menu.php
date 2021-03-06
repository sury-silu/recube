<?php 
$current_user           =   wp_get_current_user();
$userID                 =   $current_user->ID;
$user_login             =   $current_user->user_login;  
$user_agent_id          =   intval( get_user_meta($userID,'user_agent_id',true));
$add_link               =   get_dasboard_add_listing();
$add_agent              =   get_dasboard_add_agent();
$dash_profile           =   get_dashboard_profile_link();
$dash_favorite          =   get_dashboard_favorites();
$dash_link              =   wpestate_get_template_link('user_dashboard.php');
$agent_list_link        =   get_dasboard_agent_list();
$dash_searches          =   wpestate_get_template_link('user_dashboard_searches.php');
$dash_showing           =   get_dasboard_showing();
$activeprofile          =   '';
$activedash             =   '';
$activeadd              =   '';
$activefav              =   '';
$activesearch           =   '';
$activeinvoices         =   '';
$user_pack              =   get_the_author_meta( 'package_id' , $userID );    
$clientId               =   esc_html( get_option('wp_estate_paypal_client_id','') );
$clientSecret           =   esc_html( get_option('wp_estate_paypal_client_secret','') );  
$user_registered        =   get_the_author_meta( 'user_registered' , $userID );
$user_package_activation=   get_the_author_meta( 'package_activation' , $userID );
$home_url               =   home_url();
$dash_invoices          =   wpestate_get_invoice_link();
$dash_inbox             =   get_dashboard_inbox();
$activeinbox            =   '';
$activeshowing          =   '';
$activeaddagent         =   '';
$activeagentlist        =   '';

if ( basename( get_page_template() ) == 'user_dashboard.php' ){
    $activedash  =   'user_tab_active';    
}else if ( basename( get_page_template() ) == 'user_dashboard_add.php' ){
    $activeadd   =   'user_tab_active';
}else if ( basename( get_page_template() ) == 'user_dashboard_profile.php' ){
    $activeprofile   =   'user_tab_active';
}else if ( basename( get_page_template() ) == 'user_dashboard_favorite.php' ){
    $activefav   =   'user_tab_active';
}else if( basename( get_page_template() ) == 'user_dashboard_searches.php' ){
    $activesearch  =   'user_tab_active';
}else if( basename( get_page_template() ) == 'user_dashboard_invoices.php' ){
    $activeinvoices  =   'user_tab_active';
}else if( basename( get_page_template() ) == 'user_dashboard_add_agent.php' ){
    $activeaddagent =   'user_tab_active';
}else if( basename( get_page_template() ) == 'user_dashboard_agent_list.php' ){
    $activeagentlist =   'user_tab_active';
}else if( basename( get_page_template() ) == 'user_dashboard_inbox.php' ){
    $activeinbox =   'user_tab_active';
}else if( basename( get_page_template() ) == 'user_dashboard_showing.php' ){
    $activeshowing =   'user_tab_active';
}else if( basename( get_page_template() ) == 'user_dashboard_my_bids.php' ){
    $activemybids =   'user_tab_active';
}
$no_unread=  intval(get_user_meta($userID,'unread_mess',true));
    
$user_role = get_user_meta( $current_user->ID, 'user_estate_role', true) ;
?>



<?php
if ( $user_agent_id!=0 && get_post_status($user_agent_id)=='pending'  ){
    echo '<div class="user_dashboard_app">'.__('Your account is pending approval. Please allow 1-2 business days to verify your account after completing your profile. We will reach out if we have any questions. ','wpestate').'</div>';
}
if ( $user_agent_id!=0 && get_post_status($user_agent_id)=='disabled' ){
    echo '<div class="user_dashboard_app">'.__('Your account is disabled.','wpestate').'</div>';
}
?>

<div class="user_tab_menu">

    <div class="user_dashboard_links">
        <?php if( $dash_profile!=$home_url ){ ?>
            <a href="<?php print esc_url($dash_profile);?>"  class="<?php print $activeprofile; ?>"><i class="fa fa-cog"></i> <?php _e('My Profile','wpestate');?></a>
        <?php }
		
		// Menu only for developers/sellers
		if( $user_role==4 ){
			
			if( $dash_link!=$home_url ){
				if($user_agent_id==0 || ( $user_agent_id!=0 && get_post_status($user_agent_id)!='pending' && get_post_status($user_agent_id)!='disabled') ){?>
				<a href="<?php print esc_url($dash_link);?>"     class="<?php print $activedash; ?>"> <i class="fa fa-map-marker"></i> <?php _e('My Properties List','wpestate');?></a>
			<?php } 
			}?>
			<?php if( $add_link!=$home_url ){
				if($user_agent_id==0 || ( $user_agent_id!=0 && get_post_status($user_agent_id)!='pending' && get_post_status($user_agent_id)!='disabled') ){?>
				<a href="<?php print esc_url ($add_link);?>"      class="<?php print $activeadd; ?>"> <i class="fa fa-plus"></i><?php _e('Add New Property','wpestate');?></a>  
			<?php }
			} 
		}
		
		// Menu only for agent
		if( $user_role==2 ){
			if( $dash_favorite!=$home_url ){ ?>
				<a href="<?php print esc_url($dash_favorite);?>" class="<?php print $activefav; ?>"><i class="fa fa-heart"></i> <?php _e('Favorites','wpestate');?></a>
			<?php
			}?>
			
			<a href="<?php echo site_url() . '/my-bids'; ?>" class="<?php print $activemybids; ?>">
			<i class="fa fa-gavel"></i>My Bids</a>
			
		<?php
		}?>
       
        
        <a href="<?php echo wp_logout_url( home_url() );?>" title="Logout"><i class="fa fa-power-off"></i> <?php _e('Log Out','wpestate');?></a>
    </div>
    
</div>

 