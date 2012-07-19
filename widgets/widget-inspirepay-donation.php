<?php
class Widget_InspirePay_Donation extends WP_Widget {

	/* Variable Declarations */
	var $inspire_widget_cssclass;
	var $inspire_widget_description;
	var $inspire_widget_idbase;
	var $inspire_widget_title;

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @uses WooDojo
	 * @return void
	 */
	public function __construct () {
		/* Widget variable settings. */
		$this->inspire_widget_cssclass = 'widget_inspirepay_donation';
		$this->inspire_widget_description = __( 'A donation form for your site', 'inspirepay-donations' );
		$this->inspire_widget_idbase = 'inspirepay_donation';
		$this->inspire_widget_title = __('InspirePay Donation Form', 'inspirepay-donations' );

		/* Widget settings. */
		$widget_ops = array( 'classname' => $this->inspire_widget_cssclass, 'description' => $this->inspire_widget_description );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => $this->inspire_widget_idbase );

		/* Create the widget. */
		$this->WP_Widget( $this->inspire_widget_idbase, $this->inspire_widget_title, $widget_ops, $control_ops );
	} // End Constructor

	/**
	 * widget function.
	 * @since  1.0.0
	 * @access public
	 * @param array $args
	 * @param array $instance
	 * @return void
	 */
	public function widget ( $args, $instance ) {
		extract( $args, EXTR_SKIP );
		
		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'], $instance, $this->id_base );

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}
		
		/* Widget content. */
		// Add actions for plugins/themes to hook onto.
		do_action( $this->inspire_widget_cssclass . '_top' );
		
		$html = '';

		// Load widget content here.
		if ( isset( $instance['pre_form_text'] ) && '' != $instance['pre_form_text'] ) { $html .= wpautop( stripslashes( $instance['pre_form_text'] ) ); }

		$shortcode_atts = '';
		foreach ( array( 'inspirepay_url', 'donation_amount', 'submit_button_text' ) as $k => $v ) {
			if ( $instance[$v] != '' && $instance[$v] != '0' ) {
				$shortcode_atts .= ' ' . $v . '="' . esc_attr( $instance[$v] ) . '"';
			}
		}

		$html .= do_shortcode( '[inspirepay_donation' . $shortcode_atts . ']' );

		if ( isset( $instance['post_form_text'] ) && '' != $instance['post_form_text'] ) { $html .= wpautop( stripslashes( $instance['post_form_text'] ) ); }

		echo $html;

		// Add actions for plugins/themes to hook onto.
		do_action( $this->inspire_widget_cssclass . '_bottom' );

		/* After widget (defined by themes). */
		echo $after_widget;
	} // End widget()

	/**
	 * update function.
	 * @access public
	 * @param array $new_instance
	 * @param array $old_instance
	 * @return array $instance
	 */
	public function update ( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['inspirepay_url'] = esc_attr( $new_instance['inspirepay_url'] );
		$instance['donation_amount'] = floatval( $new_instance['donation_amount'] );
		$instance['submit_button_text'] = esc_attr( $new_instance['submit_button_text'] );

		$instance['pre_form_text'] = wp_filter_kses( $new_instance['pre_form_text'] );
		$instance['post_form_text'] = wp_filter_kses( $new_instance['post_form_text'] );

		return $instance;
	} // End update()

   /**
    * form function.
    * 
    * @since  1.0.0
    * @access public
    * @param array $instance
    * @return void
    */
   public function form ( $instance ) {
		/* Set up some default widget settings. */
		/* Make sure all keys are added here, even with empty string values. */
		$defaults = array(
						'title' => __( 'Donate', 'inspirepay-donations' ), 
						'inspirepay_url' => '', 
						'donation_amount' => '', 
						'submit_button_text' => '', 
						'pre_form_text' => '', 
						'post_form_text' => ''
					);

		$instance = wp_parse_args( (array) $instance, $defaults );
?>
		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title (optional):', 'inspirepay-donations' ); ?></label>
			<input type="text" name="<?php echo $this->get_field_name( 'title' ); ?>"  value="<?php echo $instance['title']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" />
		</p>
		<!-- Widget Text Above The Form: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'pre_form_text' ); ?>"><?php _e( 'Text Above The Form (optional):', 'inspirepay-donations' ); ?></label>
			<textarea name="<?php echo $this->get_field_name( 'pre_form_text' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'pre_form_text' ); ?>" rows="5"><?php echo stripslashes( $instance['pre_form_text'] ); ?></textarea>
		</p>
		<!-- Widget InspirePay URL: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'inspirepay_url' ); ?>"><?php _e( 'InspirePay URL Slug:', 'inspirepay-donations' ); ?></label>
			<input type="text" name="<?php echo $this->get_field_name( 'inspirepay_url' ); ?>"  value="<?php echo $instance['inspirepay_url']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'inspirepay_url' ); ?>" />
		</p>
		<!-- Widget Donation Amount: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'donation_amount' ); ?>"><?php _e( 'Donation Amount (optional):', 'inspirepay-donations' ); ?></label>
			<input type="text" name="<?php echo $this->get_field_name( 'donation_amount' ); ?>"  value="<?php echo $instance['donation_amount']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'donation_amount' ); ?>" />
		</p>
		<p><small><?php _e( 'Leave empty or 0 to have visitors specify the donation amount.', 'inspirepay-donations' ); ?></small></p>
		<!-- Widget Submit Button Text: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'submit_button_text' ); ?>"><?php _e( '"Submit" Button Text (optional):', 'inspirepay-donations' ); ?></label>
			<input type="text" name="<?php echo $this->get_field_name( 'submit_button_text' ); ?>"  value="<?php echo $instance['submit_button_text']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'submit_button_text' ); ?>" />
		</p>
		<p><small><?php _e( 'Defaults to "Submit".', 'inspirepay-donations' ); ?></small></p>
		<!-- Widget Text Below The Form: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'post_form_text' ); ?>"><?php _e( 'Text Below The Form (optional):', 'inspirepay-donations' ); ?></label>
			<textarea name="<?php echo $this->get_field_name( 'post_form_text' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'post_form_text' ); ?>" rows="5"><?php echo stripslashes( $instance['post_form_text'] ); ?></textarea>
		</p>
<?php
	} // End form()
} // End Class
?>