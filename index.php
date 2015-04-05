class text_domainmane_address extends WP_Widget {
    // constructor
    function text_domainmane_address() {
        parent::WP_Widget(false, $name = __('text_domainmane Address', 'text_domainmane_address') );
    }

    // widget form creation
    function form($instance) {


// Check values
        if( $instance) {
            $title = esc_attr($instance['title']);
            $address = esc_textarea($instance['address']);
            $phone = esc_attr($instance['phone']);
            $email = esc_attr($instance['email']);

        } else {
            $title = '';
            $address = '';
            $phone = '';
            $email = '';
        }
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'wp_widget_plugin'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('address'); ?>"><?php _e('Address:', 'wp_widget_plugin'); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>"><?php echo $address ; ?></textarea>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('phone'); ?>"><?php _e('Phone Number:', 'wp_widget_plugin'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo $phone ; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email Address:', 'wp_widget_plugin'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" />
        </p>

    <?php
    }

    // update widget
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        // Fields
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['address'] = strip_tags($new_instance['address']);
        $instance['phone'] = strip_tags($new_instance['phone']);
        $instance['email'] = strip_tags($new_instance['email']);

        return $instance;
    }

    // display widget
    function widget($args, $instance) {
        extract( $args );
        // these are the widget options
        $title = apply_filters('widget_title', $instance['title']);
        $address = $instance['address'];
        $phone = $instance['phone'];
        $email = $instance['email'];
        echo $before_widget;
        // Display the widget
        echo '<div class="widget-text wp_widget_plugin_box">';

        // Check if title is set
        if ( $title ) {
            echo $before_title . $title . $after_title;
        }

        // Check if text is set
        if( $address ) {
            echo '<p class="text_domainmane_address_txt"><i class="fa fa-map-marker"></i>
'.$address.'</p>';
        }
        // Check if textarea is set
        if( $phone ) {
            echo '<p class="text_domainmane_address_txt"><i class="fa fa-phone"></i>
'.$phone.'</p>';
        }

        if( $email ) {
            echo '<p class="text_domainmane_address_txt"><i class="fa fa-envelope"></i>
'.$email.'</p>';
        }
        echo '</div>';
        echo $after_widget;
    }
}
// register widget
add_action('widgets_init', create_function('', 'return register_widget("text_domainmane_address");'));
