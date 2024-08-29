# ListFX Plugin #

**Contributors:** WordPressFX.com  
**Donate link:** N/A  
**Tags:** phplist, wordpress, plugin   
**Requires at least:** 4.4  
**Tested up to:** 4.8-alpha-39357-src  
**Stable tag:** 0.1.0  
**License:** Restricted  
**License URI:** http://www.wordpressfx.com  

Integrates PHPList with WordPress

== Description ==

ListFX is a premium plugin developed by WordPressFX.com that integrates phpList seamlessly with WordPress.  
Easily embed phpList compatible subscription forms into any WordPress page using widgets. 
Additionally, you can capture new WordPress registrations for submission to phpList. CAN-SPAM compliant.

== Installation ==

This section describes how to install the plugin and get it working.


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

== Frequently Asked Questions ==

= Where do I get help? =

Visit http://WordPressFX.com or email support@wordpressfx.com

== Changelog ==

= 1.0 =
* First release

