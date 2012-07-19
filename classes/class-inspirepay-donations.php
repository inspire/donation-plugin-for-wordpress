<?php
/**
 * InspirePay Donations Class
 *
 * All functionality pertaining to the InspirePay Donations feature.
 *
 * @package WordPress
 * @author Matty
 * @since 1.0.0
 *
 * TABLE OF CONTENTS
 *
 * - __construct()
 * - shortcode()
 * - register_widget()
 */
class InspirePay_Donations {
	/**
	 * __construct function.
	 * @access public
	 * @since 1.0.0
	 * @return void
	 */
	public function __construct () {
		add_shortcode( 'inspirepay_donation', array( &$this, 'shortcode' ) );
		add_action( 'widgets_init', array( &$this, 'register_widget' ) );
	} // End __construct()

	/**
	 * Shortcode for adding a donation form.
	 * @access  public
	 * @since   1.0.0
	 * @param   array  $atts    Shortcode attributes.
	 * @param   string $content Optional content of the shortcode supports content wrapping.
	 * @return  string          The rendered shortcode HTML.
	 */
	public function shortcode ( $atts, $content = null ) {
		$settings = $this->get_settings();
		$defaults = array(
						'submit_button_text' => $settings['submit_button_text'],
						'inspirepay_url' => $settings['inspirepay_url'], 
						'donation_amount' => $settings['donation_amount']
					);

		if ( '' == $defaults['submit_button_text'] ) { $defaults['submit_button_text'] = __( 'Submit', 'inspirepay-donations' ); }

		$atts = shortcode_atts( $defaults, $atts );

		if ( 0 == floatval( $atts['donation_amount'] ) ) { $atts['donation_amount'] = ''; }

		// Don't do anything without the InspirePay donation URL slug.
		if ( $atts['inspirepay_url'] == '' ) { return; }

		$html = '<div class="inspirepay-donation">' . "\n";
		$html .= '<form action="' . esc_url( 'https://inspirepay.com/pay/' . esc_attr( $atts['inspirepay_url'] ) ) . '" method="get" accept-charset="utf-8">' . "\n";
		$html .= '<input id="" type="text" name="amount" value="' . esc_attr( $atts['donation_amount'] ) . '" />' . "\n";
		$html .= '<button type="submit" class="button">' . esc_attr( $atts['submit_button_text'] ) . '</button>' . "\n";
		$html .= '</form>' . "\n";
		$html .= '</div><!--/.inspirepay-donation-->' . "\n";

		return $html;
	} // End shortcode()

	/**
	 * Register the widget.
	 * @since  1.0.0
	 * @return void
	 */
	public function register_widget () {
		$basename = trailingslashit( str_replace( 'classes', '', dirname( __FILE__ ) ) );
		require_once( $basename . 'widgets/widget-inspirepay-donation.php' );
		register_widget( 'Widget_InspirePay_Donation' );
	} // End register_widget()

	/**
	 * Get an array of the default settings.
	 * @since  1.0.0
	 * @return array
	 */
	private function get_settings () {
		return array( 'inspirepay_url' => '', 'donation_amount' => '0', 'submit_button_text' => '' );
	} // End get_settings()
} // End Class
?>