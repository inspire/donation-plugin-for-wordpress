<?php
/**
 * Plugin Name: InspirePay Donations
 * Plugin URI: http://inspirepay.com/
 * Description: Easily add a donation form, using InspirePay, to your pages via a shortcode, or to your sidebar in a widget.
 * Version: 1.0.0
 * Author: Matty
 * Author URI: http://inspirepay.com/
 * License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * @package WordPress
 * @author Matty
 * @since 1.0.0
*/

require_once( 'classes/class-inspirepay-donations.php' );
global $inspirepay_donations;
$inspirepay_donations = new InspirePay_Donations();
?>