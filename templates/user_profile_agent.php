<?php
$current_user = wp_get_current_user();
$userID                 =   $current_user->ID;
$user_login             =   $current_user->user_login;
$agent_id               =   get_the_author_meta('user_agent_id',$userID);



$user_email             =   get_the_author_meta( 'user_email' , $userID );
//$user_mobile            =   get_the_author_meta( 'mobile' , $userID );
//$user_phone             =   get_the_author_meta( 'phone' , $userID );
//$description            =   get_the_author_meta( 'description' , $userID );
//$facebook               =   get_the_author_meta( 'facebook' , $userID );
//$twitter                =   get_the_author_meta( 'twitter' , $userID );
//$linkedin               =   get_the_author_meta( 'linkedin' , $userID );
//$pinterest              =   get_the_author_meta( 'pinterest' , $userID );
//$userinstagram          =   get_the_author_meta( 'instagram' , $userID );
//$user_skype             =   get_the_author_meta( 'skype' , $userID );
//$website                =   get_the_author_meta( 'website' , $userID );
//$agent_member           =   get_the_author_meta( 'agent_member' , $userID );

$user_title             =   get_the_author_meta( 'title' , $userID );

$user_small_picture     =   get_the_author_meta( 'small_custom_picture' , $userID );
$image_id               =   get_the_author_meta( 'small_custom_picture',$userID); 

$user_custom_picture    =   get_the_post_thumbnail_url($agent_id,'user_picture_profile');
$agent_id             	=   get_the_author_meta('user_agent_id',$userID);
$first_name            	=   esc_html(get_post_meta($agent_id, 'first_name', true));
$last_name             	=   esc_html(get_post_meta($agent_id, 'last_name', true));
$agent_title           	=   get_the_title($agent_id);
$agent_description     	=   get_post_field('post_content', $agent_id);
$agent_email           	=   esc_html(get_post_meta($agent_id, 'agent_email', true));
$agent_phone           	=   esc_html(get_post_meta($agent_id, 'agent_phone', true));
$agent_mobile          	=   esc_html(get_post_meta($agent_id, 'agent_mobile', true));
$agent_skype           	=   esc_html(get_post_meta($agent_id, 'agent_skype', true));
$agent_facebook        	=   esc_html(get_post_meta($agent_id, 'agent_facebook', true));
$agent_twitter         	=   esc_html(get_post_meta($agent_id, 'agent_twitter', true));
$agent_linkedin        	=   esc_html(get_post_meta($agent_id, 'agent_linkedin', true));
$agent_pinterest       	=   esc_html(get_post_meta($agent_id, 'agent_pinterest', true));
$agent_instagram       	=   esc_html(get_post_meta($agent_id, 'agent_instagram', true));
$agent_address         	=   esc_html(get_post_meta($agent_id, 'agent_address', true));
$agent_languages       	=   esc_html(get_post_meta($agent_id, 'agent_languages', true));     
$agent_license         	=   esc_html(get_post_meta($agent_id, 'agent_license', true));
$agent_taxes           	=   esc_html(get_post_meta($agent_id, 'agent_taxes', true));    
$agent_lat             	=   esc_html(get_post_meta($agent_id, 'agent_lat', true));    
$agent_long            	=   esc_html(get_post_meta($agent_id, 'agent_long', true));
$agent_website         	=   esc_html(get_post_meta($agent_id, 'agent_website', true));
$agent_member          	=   esc_html(get_post_meta($agent_id, 'agent_member', true));
$agent_position        	=   esc_html(get_post_meta($agent_id, 'agent_position', true));
 
$agent_custom_data		=   get_post_meta($agent_id, 'agent_custom_data', true);
 
$agent_city='';
$agent_city_array     =   get_the_terms($agent_id, 'property_city_agent');
if(isset($agent_city_array[0])){
    $agent_city         =   $agent_city_array[0]->name;
}

 $agent_area='';
$agent_area_array     =   get_the_terms($agent_id, 'property_area_agent');
if(isset($agent_area_array[0])){
    $agent_area          =   $agent_area_array[0]->name;
}

$agent_county='';
$agent_county_array     =   get_the_terms($agent_id, 'property_county_state_agent');
if(isset($agent_county_array[0])){
    $agent_county          =   $agent_county_array[0]->name;
}




if($user_custom_picture==''){
    $user_custom_picture=get_template_directory_uri().'/img/default_user.png';
}
?>


<div class="col-md-12 user_profile_div"> 
    <div id="profile_message">
        </div> 
<div class="add-estate profile-page profile-onprofile row"> 
    
    <div class="col-md-4 profile_label">
        <div class="user_details_row"><?php _e('Photo','wpestate');?></div> 
        <div class="user_profile_explain"><?php _e('Upload your profile photo.','wpestate')?></div>
    </div>

    <div class="profile_div col-md-4" id="profile-div">
        <?php print '<img id="profile-image" src="'.$user_custom_picture.'" alt="user image" data-profileurl="'.$user_custom_picture.'" data-smallprofileurl="'.$image_id.'" >';

        //print '/ '.$user_small_picture;?>

        <div id="upload-container">                 
            <div id="aaiu-upload-container">                 

                <button id="aaiu-uploader" class="wpresidence_button wpresidence_success"><?php _e('Upload  profile image.','wpestate');?></button>
                <div id="aaiu-upload-imagelist">
                    <ul id="aaiu-ul-list" class="aaiu-upload-list"></ul>
                </div>
            </div>  
        </div>
        <span class="upload_explain"><?php _e('*minimum 500px x 500px','wpestate');?></span>                    
    </div>
</div>

<div class="add-estate profile-page profile-onprofile row"> 
    <div class="col-md-4 profile_label">
        <div class="user_details_row"><?php _e('Agent Details','wpestate');?></div> 
        <div class="user_profile_explain"><?php _e('Add your contact information and state license number.','wpestate')?></div>

    </div>
          
    <div class="col-md-4">
        <p>
            <label for="firstname"><?php _e('First Name','wpestate');?></label>
            <input type="text" id="firstname" class="form-control" value="<?php echo esc_html($first_name);?>"  name="firstname">
        </p>

        <p>
            <label for="secondname"><?php _e('Last Name','wpestate');?></label>
            <input type="text" id="secondname" class="form-control" value="<?php echo esc_html($last_name);?>"  name="firstname">
        </p>
        <p>
            <label for="useremail"><?php _e('Email','wpestate');?></label>
            <input type="text" id="useremail"  class="form-control" value="<?php echo esc_html($user_email);?>"  name="useremail">
        </p>
        
        <p>
			<!-- dummy custom field, won't work without it. -->
			<input type="hidden" class="form-control agent_custom_label" value="1" name="agent_custom_label[]">
			<input class="form-control agent_custom_value" value="1" name="agent_custom_value[]" type="hidden">
			
			<input type="hidden" class="form-control agent_custom_label" value="State License Number" name="agent_custom_label[]">
			<label for="agent_custom_value">State License Number</label>
			<input class="form-control agent_custom_value" value="<?php echo $agent_custom_data[0]['value']?>" name="agent_custom_value[0]" type="text">
			
			<?php
			$usa_state_list = array("Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut", "Delaware", "District Of Columbia", "Florida", "Georgia", "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa", "Kansas", "Kentucky", "Louisiana", "Maine", "Maryland", "Massachusetts", "Michigan", "Minnesota", "Mississippi", "Missouri", "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey", "New Mexico", "New York", "North Carolina", "North Dakota", "Ohio", "Oklahoma", "Oregon", "Pennsylvania", "Rhode Island", "South Carolina", "South Dakota", "Tennessee", "Texas", "Utah", "Vermont", "Virginia", "Washington", "West Virginia", "Wisconsin","Wyoming");
			?>
			<input type="hidden" class="form-control agent_custom_label" value="State Licensed In" name="agent_custom_label[]">
			<label for="agent_custom_value">State Licensed In</label>
			<select class="form-control agent_custom_value" name="agent_custom_value[1]">
				<option value="">Select a State</option>
				
				<?php
				foreach( $usa_state_list as $usa_state ){
					
					if( $agent_custom_data[1]['value'] == $usa_state )
						$selected = 'selected="selected"';
					else
						$selected = '';
					
					echo '<option value="' . $usa_state .'" ' . $selected .'>' . $usa_state .'</option>';
				}
				?>
			</select>
		</p>
    </div>  

    <div class="col-md-4">
        <p>
            <label for="userphone"><?php _e('Phone', 'wpestate'); ?></label>
            <input type="text" id="userphone" class="form-control" value="<?php echo esc_html($agent_phone); ?>"  name="userphone">
        </p>
        <p id="agent_mobile_field">
            <label for="usermobile"><?php _e('Mobile', 'wpestate'); ?></label>
            <input type="text" id="usermobile" class="form-control" value="<?php echo esc_html($agent_mobile); ?>"  name="usermobile">
        </p>

        <p>
            <label for="userskype"><?php _e('Skype', 'wpestate'); ?></label>
            <input type="text" id="userskype" class="form-control" value="<?php echo esc_html($agent_skype); ?>"  name="userskype">
        </p>
        <?php   wp_nonce_field( 'profile_ajax_nonce', 'security-profile' );   ?>
       
    </div>
	<p style="clear: both;">In order to be able to view listings and place a bid, we need to verify that you’re licensed by your state to sell real estate.</p>
</div>

<div class="add-estate profile-page profile-onprofile row">
    <div class="col-md-4 profile_label">
        <div class="user_details_row"><?php _e('Brokerage Details','wpestate');?></div> 
        <div class="user_profile_explain"><?php _e('Please give Brokerage Details','wpestate')?></div>
    </div>
	
    <div class="col-md-4">
        <p>
            <input type="hidden" class="form-control agent_custom_label" value="Brokerage Name" name="agent_custom_label[]">
			<label for="agent_custom_value">Brokerage Name</label>
			<input class="form-control agent_custom_value" value="<?php echo $agent_custom_data[2]['value'];?>" name="agent_custom_value[2]" type="text">
        </p>
		<p>
            <input type="hidden" class="form-control agent_custom_label" value="Brokerage Phone number" name="agent_custom_label[]">
			<label for="agent_custom_value">Brokerage Phone number</label>
			<input class="form-control agent_custom_value" value="<?php echo $agent_custom_data[3]['value'];?>" name="agent_custom_value[3]" type="text">
        </p>
        
    </div>
    
    <div class="col-md-4">
        <p>
            <input type="hidden" class="form-control agent_custom_label" value="Brokerage Address" name="agent_custom_label[]">
			<label for="agent_custom_value">Brokerage Address</label>
			<textarea class="form-control agent_custom_value" name="agent_custom_value[4]" type="text"><?php echo $agent_custom_data[4]['value'];?></textarea>
        </p>  
    </div>
</div>

<div class="add-estate profile-page profile-onprofile row">
    <div class="col-md-4 profile_label">
        <div class="user_details_row"><?php _e('Agent Experience','wpestate');?></div> 
        <div class="user_profile_explain"><?php _e('Please Give Agent Experience Details','wpestate')?></div>
    </div>
	
    <div class="col-md-4">
        <p>
			<?php
			$exp_years = array("1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25+");
			?>
			<input type="hidden" class="form-control agent_custom_label" value="Years of Experience" name="agent_custom_label[]">
			<label for="agent_custom_value">Years of Experience</label>
			<select class="form-control agent_custom_value" name="agent_custom_value[5]">
				
				<?php
				foreach( $exp_years as $exp_year ){
					
					if( $agent_custom_data[5]['value'] == $exp_year )
						$selected = 'selected="selected"';
					else
						$selected = '';
					
					echo '<option value="' . $exp_year .'" ' . $selected .'>' . $exp_year .'</option>';
				}
				?>
			</select>
        </p>
		<p>
            <input type="hidden" class="form-control agent_custom_label" value="Areas/Cities or Neighborhoods of Expertise" name="agent_custom_label[]">
			<label for="agent_custom_value">Areas/Cities or Neighborhoods of Expertise</label>
			<textarea class="form-control agent_custom_value" name="agent_custom_value[6]" type="text"><?php echo $agent_custom_data[6]['value'];?></textarea>
        </p>
        
    </div>
    
    <div class="col-md-4">
        <p>
			<input type="hidden" class="form-control agent_custom_label" value="Specializes In" name="agent_custom_label[]">
			<label for="agent_custom_value">Specializes In</label>
			<input id="specializes_in" class="form-control agent_custom_value" value="<?php echo $agent_custom_data[7]['value'];?>" name="agent_custom_value[3]" type="hidden">
			
			<?php
			$specializes = array("Single Family Residence", "Commercial", "Rental", "Condos", "Townhouses", "Land", "2-4 Unit Apartment Buildings", "4+ Unit Apartment Buildings", "Penthouse Units" );
			
			foreach( $specializes as $specialize ){
				
				$checked = "";
				if ( strpos( $agent_custom_data[7]['value'], ',' . $specialize ) ) {
					$checked = "checked";
				}
				
				echo '<p><input class="specializes agent_custom_value" type="checkbox" name="agent_custom_value[7]" value="' . $specialize . '" ' . $checked. '>';
				echo '<span>' . $specialize . '</span></p>';
			}
			?>
			
			<script type="text/javascript">
				jQuery(function() {
					
					if( !jQuery('#specializes_in').val() )
						jQuery('#specializes_in').val('0');
					
					jQuery('.specializes').click(function(){
						if(this.checked){
							jQuery('#specializes_in').val( jQuery('#specializes_in').val() + ',' + this.value );
						}
						else {
							jQuery('#specializes_in').val( jQuery('#specializes_in').val().replace( ',' + this.value, '' ) );
						}
					});
				});
			</script>
        </p>  
    </div>
</div>
                          
<div class="add-estate profile-page profile-onprofile row">       
    <div class="col-md-4 profile_label">
        <div class="user_details_row"><?php _e('Social Media Details','wpestate');?></div> 
        <div class="user_profile_explain"><?php _e('Add your social media information.','wpestate')?></div>

    </div>
    <div class="col-md-4">
        <p>
            <label for="userfacebook"><?php _e('Facebook Url', 'wpestate'); ?></label>
            <input type="text" id="userfacebook" class="form-control" value="<?php echo esc_html($agent_facebook); ?>"  name="userfacebook">
        </p>

        <p>
            <label for="usertwitter"><?php _e('Twitter Url', 'wpestate'); ?></label>
            <input type="text" id="usertwitter" class="form-control" value="<?php echo esc_html($agent_twitter); ?>"  name="usertwitter">
        </p>

        <p>
            <label for="userlinkedin"><?php _e('Linkedin Url', 'wpestate'); ?></label>
            <input type="text" id="userlinkedin" class="form-control"  value="<?php echo esc_html($agent_linkedin); ?>"  name="userlinkedin">
        </p>
    </div>
    <div class="col-md-4">
        <p>
            <label for="userinstagram"><?php _e('Instagram Url','wpestate');?></label>
            <input type="text" id="userinstagram" class="form-control" value="<?php echo esc_html($agent_instagram);?>"  name="userinstagram">
        </p> 

        <p>
            <label for="userpinterest"><?php _e('Pinterest Url','wpestate');?></label>
            <input type="text" id="userpinterest" class="form-control" value="<?php echo esc_html($agent_pinterest);?>"  name="userpinterest">
        </p> 

        <p>
            <label for="website"><?php _e('Website Url (without http)','wpestate');?></label>
            <input type="text" id="website" class="form-control" value="<?php echo esc_html($agent_website);?>"  name="website">
        </p>
    </div> 
</div>
    
<div class="add-estate profile-page profile-onprofile row">
    <div class="col-md-4 profile_label">
        <div class="user_details_row"><?php _e('Agent Bio','wpestate');?></div> 
        <div class="user_profile_explain"><?php _e('Add some information about yourself.','wpestate')?></div>
    </div>
    <div class="col-md-8">
         <p>
            <label for="about_me"><?php _e('About Me','wpestate');?></label>
            <textarea id="about_me" class="form-control" name="about_me"><?php echo ($agent_description);?></textarea>
        </p>
        <p class="fullp-button">
            <button class="wpresidence_button" id="update_profile"><?php _e('Update profile', 'wpestate'); ?></button>
        
        
        <?php
        $user_agent_id          =   intval( get_user_meta($userID,'user_agent_id',true));
        if ( $user_agent_id!=0 && get_post_status($user_agent_id)=='publish'  ){
            print'<a href='.get_permalink($user_agent_id).' class="wpresidence_button view_public_profile">'.__('View public profile', 'wpestate').'</a>';
        }
        ?>
        </p>
        
    </div>
    
            
</div>
      
<?php   get_template_part('templates/change_pass_template'); ?>
</div>