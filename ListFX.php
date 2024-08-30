<?php
/*
Plugin Name: ListFX WordPress phpList Plugin
Plugin URI: http://www.WordPressFX.com
Description: Connects WordPress to phpList
Version: 1.0
Author: WordPress FX
License: Restricted
*/


class WP_Widget_PHPListAjax extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'widget_phplistajax', 'description' => __( "Integrate WordPress With phpList") );
        parent::__construct('PHPListAjax', __('ListFX phpList'), $widget_ops);
    }

    function widget( $args, $instance ) {
        extract($args);
        $button = apply_filters('widget_button', $instance['button'], $instance, $this->id_base);
        $input = apply_filters('widget_title', $instance['input'], $instance, $this->id_base);
        $id = apply_filters('widget_id', $instance['id'], $instance, $this->id_base);
		
	$ListFX_Path = apply_filters('widget_id', $instance['ListFX_Path'], $instance, $this->id_base);
		
	$label_message = apply_filters('widget_id', $instance['label_message'], $instance, $this->id_base);
	$label_email = apply_filters('widget_id', $instance['label_email'], $instance, $this->id_base);
	$label_name = apply_filters('widget_id', $instance['label_name'], $instance, $this->id_base);
	$label_success = apply_filters('widget_id', $instance['label_success'], $instance, $this->id_base);
	$label_failure = apply_filters('widget_id', $instance['label_failure'], $instance, $this->id_base);
	$label_name_error = apply_filters('widget_id', $instance['label_name_error'], $instance, $this->id_base);
	$label_email_error = apply_filters('widget_id', $instance['label_email_error'], $instance, $this->id_base);

        if (!$button) {
            $button = __('Subscribe to our newsletter');
        }


    
	
echo '<p class="listfx" style="width:100%;">'.$label_message.'</p><form method="post" name="subscribeform" id="subscribeform" enctype="multipart/form-data">
    <table border=0>
        <tr>
           <!-- <td><div class="required">'.$label_email.'</div></td> -->
            <td class="attributeinput"><input type=text name="email" value="" id="email" style="width:100%;" placeholder="'.$label_email.'"></td>
        </tr>
        <tr>
           <!-- <td><div class="required">'.$label_name.'</div></td>  -->
            <td class="attributeinput">
                <input type=text name="attribute1" id="attribute1" class="attributeinput" style="width:100%;" value="" placeholder="'.$label_name.'">
            </td>
        </tr>
    </table>
    <input type=hidden name="htmlemail" value="1">
    <input type="hidden" name="list[11]" value="signup"  />
    <input type="hidden" name="subscribe" value="subscribe"/>
    <div style="display:none"><input type="text" name="VerificationCodeX" value="" size="20"></div>
    <button style="width:100%" class=\'listfx\' 
        onclick="if (checkform()) {submitForm();} return false;"
    >'.$button.'</button>
    <div id="result" style="color: red;"></div>
</form>';

echo '
<script type="text/javascript">

var jQuery_1_4_2 = $.noConflict(true); 
function checkform()
{
    re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if (!(re.test(jQuery_1_4_2("#email").val()))) {
        jQuery_1_4_2("#result").empty().append("'.$label_email_error.'");
        jQuery_1_4_2("#email").focus();
        return false;
    }

    if (jQuery_1_4_2("#attribute1").val() == "") {
        jQuery_1_4_2("#result").empty().append("'.$label_name_error.'");
        jQuery_1_4_2("#attribute1").focus();
        return false;
    }

    return true;
}

function submitForm() {
    successMessage = \''.$label_success.'\';
    data = jQuery_1_4_2(\'#subscribeform\').serialize();
    jQuery_1_4_2.ajax( {
        type: \'POST\',
        data: data,
        url: \''.$ListFX_Path.'/index.php?p=asubscribe&id='.$id.'\',
        dataType: \'html\',
        success: function (data, status, request) {
            jQuery_1_4_2("#result").empty().append(data != \'\' ? data : successMessage);
            jQuery_1_4_2(\'#attribute1\').val(\'\');
            jQuery_1_4_2(\'#email\').val(\'\');
        },
        error: function (request, status, error) { alert(\''.$label_failure.'\'); }
    });
}


</script>';


	}

    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 'id' => '', 'button' => '', 'input' => '', 'ListFX_Path' => '', 'label_message' => '', 'label_email' => '', 'label_name' => '', 'label_success' => '', 'label_failure' => '', 'label_name_error' => '', 'label_email_error' => '') );
        $id = $instance['id'];
        $button = $instance['button'];
        $input = $instance['input'];
	$ListFX_Path = $instance['ListFX_Path'];
	$label_message = $instance['label_message'];
	$label_email = $instance['label_email'];
	$label_name = $instance['label_name'];
	$label_success = $instance['label_success'];
	$label_failure = $instance['label_failure'];
	$label_name_error = $instance['label_name_error'];
	$label_email_error = $instance['label_email_error'];
?>
        	<p><label for="<?php echo $this->get_field_id('ListFX_Path'); ?>"><?php _e('Path to your phpList installation (http://yourdomain.com/lists):'); ?> <input class="widefat" id="<?php echo $this->get_field_id('ListFX_Path'); ?>" name="<?php echo $this->get_field_name('ListFX_Path'); ?>" type="text" value="<?php echo esc_attr($ListFX_Path); ?>" /></label></p>
	
		<p><label for="<?php echo $this->get_field_id('id'); ?>"><?php _e('Subscribe Page ID:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>" type="text" value="<?php echo esc_attr($id); ?>" /></label></p>
       		<p><label for="<?php echo $this->get_field_id('button'); ?>"><?php _e('Submit Button Text :'); ?> <input class="widefat" id="<?php echo $this->get_field_id('button'); ?>" name="<?php echo $this->get_field_name('button'); ?>" type="text" value="<?php echo esc_attr($button); ?>" /></label></p>
<?
		/*
		<p><label for="<?php echo $this->get_field_id('input'); ?>"><?php _e('Input Text :'); ?> <input class="widefat" id="<?php echo $this->get_field_id('input'); ?>" name="<?php echo $this->get_field_name('input'); ?>" type="text" value="<?php echo esc_attr($input); ?>" /></label></p>
		*/
		?>
		<p><label for="<?php echo $this->get_field_id('label_message'); ?>"><?php _e('Message (appears above the form):'); ?> <input class="widefat" id="<?php echo $this->get_field_id('label_message'); ?>" name="<?php echo $this->get_field_name('label_message'); ?>" type="text" value="<?php echo esc_attr($label_message); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('label_email'); ?>"><?php _e('Email Text (appears beside the name field):'); ?> <input class="widefat" id="<?php echo $this->get_field_id('label_email'); ?>" name="<?php echo $this->get_field_name('label_email'); ?>" type="text" value="<?php echo esc_attr($label_email); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('label_name'); ?>"><?php _e('Name Text (appears beside the name field):'); ?> <input class="widefat" id="<?php echo $this->get_field_id('label_name'); ?>" name="<?php echo $this->get_field_name('label_name'); ?>" type="text" value="<?php echo esc_attr($label_name); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('label_success'); ?>"><?php _e('Success Message (appears upon successful submission):'); ?> <input class="widefat" id="<?php echo $this->get_field_id('label_success'); ?>" name="<?php echo $this->get_field_name('label_success'); ?>" type="text" value="<?php echo esc_attr($label_success); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('label_failure'); ?>"><?php _e('Failure Message (appears beside the name field):'); ?> <input class="widefat" id="<?php echo $this->get_field_id('label_failure'); ?>" name="<?php echo $this->get_field_name('label_failure'); ?>" type="text" value="<?php echo esc_attr($label_failure); ?>" /></label></p>

		<p><label for="<?php echo $this->get_field_id('label_name_error'); ?>"><?php _e('Name Error Message (appears when invalid name is entered):'); ?> <input class="widefat" id="<?php echo $this->get_field_id('label_name_error'); ?>" name="<?php echo $this->get_field_name('label_name_error'); ?>" type="text" value="<?php echo esc_attr($label_name_error); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('label_email_error'); ?>"><?php _e('Email Error Message (appears when invalid email address is entered):'); ?> <input class="widefat" id="<?php echo $this->get_field_id('label_email_error'); ?>" name="<?php echo $this->get_field_name('label_email_error'); ?>" type="text" value="<?php echo esc_attr($label_email_error); ?>" /></label></p>
<?php
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $new_instance = wp_parse_args((array) $new_instance, array( 'button' => '', 'input' => '', 'id' => '', 'ListFX_Path' => '', 'label_message' => '', 'label_email' => '', 'label_name' => '', 'label_success' => '', 'label_failure' => '', 'label_name_error' => '', 'label_email_error' => '') );
        $instance['id'] = strip_tags($new_instance['id']);
        $instance['button'] = strip_tags($new_instance['button']);
        $instance['input'] = strip_tags($new_instance['input']);
	$instance['ListFX_Path'] = strip_tags($new_instance['ListFX_Path']);
	$instance['label_message'] = strip_tags($new_instance['label_message']);
	$instance['label_email'] = strip_tags($new_instance['label_email']);
	$instance['label_name'] = strip_tags($new_instance['label_name']);
	$instance['label_success'] = strip_tags($new_instance['label_success']);
	$instance['label_failure'] = strip_tags($new_instance['label_failure']);
	$instance['label_email_error'] = strip_tags($new_instance['label_email_error']);
	$instance['label_name_error'] = strip_tags($new_instance['label_name_error']);
		
        return $instance;
    }

}

//add_action('admin_menu', 'my_plugin_menu');

function ListFX_Settings_Page()
{
	
			
    	add_settings_section("section", "ListFX Settings and Instructions <p style=\"font-size:.8em\">ListFX is a premium plugin developed by WordPressFX.com that integrates phpList seamlessly with WordPress.  Easily embed phpList compatible subscription forms into any WordPress page using widgets.  Additionally, you can capture new WordPress registrations for submission to phpList.   
</p>", null, "ListFX");
	add_settings_field("ListFX_Checkbox", "", "ListFX_Checkbox_Display", "ListFX", "section");  
	//add_settings_field("demo-text", "", "demo_checkbox_display", "demo", "section");  
    	register_setting("section", "ListFX_Checkbox");
	register_setting("section", "ListFX_Text");
	register_setting("section", "ListFX_Path_2");


}



function ListFX_Checkbox_Display()
{


?>
     

        <!-- Here we are comparing stored value with 1. Stored value is 1 if user checks the checkbox otherwise empty string. -->
        <p><input type="checkbox" name="ListFX_Checkbox" value="1" <?php checked(1, get_option('ListFX_Checkbox'), true); ?> /> <b>Capture WordPress registrations?</b></p>
	<p><input type="text" name="ListFX_Text" value="<?php echo get_option('ListFX_Text'); ?>" /> <b>Global subscribe page ID</b> - Required to capture registrations, can assign a different subscribe page than ones used in the widgets.</p>
	<p><input type="text" name="ListFX_Path_2" value="<?php echo get_option('ListFX_Path_2'); ?>" /> <b>Global phpList path</b> - Required to capture registrations, can use a different phpList install than used on widgets if desired.</p>

   
   

<h2>Preparing phpList</h2>

<ol>
 	<li>Login in to your phpList administration interface.</li>
 	<li>Select <b><i>Config > Subscribe pages</i></b> from the phpList administration menu.</li>
 	<li>Create a new subscribe page by clicking the <b><i>Add a new subscribe page button</i></b>.</li>
 	<li>Make sure you have set the <b><i>HTML Email choice</i></b>  option to either default HTML or default TEXT.</li>
 	<li>Select the option <b><i>Don't display email confirmation field</i></b> .</li>
 	<li>Select all attributes that you wish to be added, making sure that no fields are required for best results.</li>
 	<li>Add the mailing list(s) you like the user to automatically subscribe to.</li>
 	<li>Click on <b><i>Save and activate</i></b>  button.</li>
 	<li>Obtain the subscribe page id of the subscribe page created or an existing one. This ID will need to be applied to ListFX configuration setting.</li>
 
</ol>


<h2>Using the plugin:</h2>
<ol>
 	<li>Copy the ListFX.php file to your wp-content/plugins directory.</li>
 	<li>Activate the ListFX plugin using the WordPress administration interface.</li>
 	<li>Select <b><i>Settings > ListFX</i></b> from the WordPress administration menu.</li>
	<li>Place a check in the box next to <b><i>Capture WordPress registrations?</i></b></li>
	<li>Enter the subscribe page ID you want to use for registrations</li>
	<li>Enter the path to your phpList installation to use for storing WordPress registrations.</li>
	<li>Click the <b><i>Save Changes</i></b> button to save your changes.</li>
 	<li>Select <b><i>Appearance > Widgets</i></b> from the WordPress administration menu.</li>
	<li>Drag and drop the ListFX widget into a widget area.</li>
	<li>Set the ID of your subscribe page you wish to use.</li>
	<li>Enter the path to your phpList installation used for storing widget form submissions.</li>
	<li>Set the optional message text.</li>
 	<li>Set the optional submit button text.</li>
 	<li>Set the optional text you want to appear inside the email field.</li>
	<li>Set the optional text you want to appear inside the name field.</li>
	<li>Set the optional submission success message text.</li>
	<li>Set the optional submission error message text.</li>
	<li>Click the <b><i>Save Changes</i></b> button to save your changes.</li>
 
</ol>

<h2>Troubleshooting:</h2>
<ol>
	<li>If you enter your email address and get redirected to your phpList installation instead, double check your subscribe page settings, making sure extra fields are not being required.</li>
	<li>Visit <a href="http://WordPressFX.com" target="_blank">WordPressFX.com</a> for more information.</li>
</ol>



   
   
   <?php
}
add_action("admin_init", "ListFX_Settings_Page");

function ListFX_Page()
{
  ?>
      <div class="wrap">
         <h1>Demo</h1>
  
         <form method="post" action="options.php">
            <?php
               settings_fields("section");
  
               do_settings_sections("ListFX");
                 
               submit_button(); 
            ?>
         </form>
      </div>
   <?php
   

}




function menu_item()
{
	add_submenu_page("options-general.php", "ListFX", "ListFX", "manage_options", "ListFX", "ListFX_Page"); 
}
 
add_action("admin_menu", "menu_item");



function my_plugin_menu() {
	//add_plugins_page('ListFX', 'ListFX', 'read', 'list-fx-options', 'ListFX_Page');
}


//  check if sign up option is checked
add_action('widgets_init', create_function('', 'return register_widget("WP_Widget_PHPListAjax");'));



function ListFX_Register($user_id){
  
        
		
		$ListFX_Email = strip_tags($_POST['user_email']);
		
		if (empty($ListFX_Email)) {
		
       			$ListFX_Email = strip_tags($_POST['reg_email']);		
			
		}
		
		if (empty($ListFX_Email)) {
		
        		$ListFX_Email = strip_tags($_POST['email']);		
			
		}
		
		$ListFX_SubID = get_option('ListFX_Text');
		
		$ListFX_Path_Check = get_option('ListFX_Path_2');
		
  
		$ListFX_URL = $ListFX_Path_Check."/index.php?p=asubscribe&id=".$ListFX_SubID."&email=".$ListFX_Email;
		
	
		
         // create curl resource 
        $ch = curl_init(); 
        // set url 
        curl_setopt($ch, CURLOPT_URL, $ListFX_URL); 
        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        // $output contains the output string 
        $output = curl_exec($ch); 
        // close curl resource to free up system resources 
        curl_close($ch);  
   
  //do your stuff
}



$options = get_option('ListFX_Checkbox');
if ( $options == '1' ) {
 

// Capture WP Registrations?
add_action('user_register','ListFX_Register');
 
}


?>
