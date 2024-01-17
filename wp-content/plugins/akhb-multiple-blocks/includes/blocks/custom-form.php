<?php

//Callback render function
function akhb_form_render_cb( $atts ) {

    $bgColor = esc_attr( $atts['bgColor'] );
    $textColor = esc_attr( $atts['textColor'] );
    $styleAttr = "background-color:{$bgColor}; color: {$textColor}"; //double quotes

    /*if( $_POST ){

        ob_start();

        echo '<h1>Thanks for submitting!</h1>';
        echo '<p>You searched for ' . $_POST['firstname'] . '</p>';

        $output = ob_get_contents();

        ob_end_clean();

    }else{*/

        ob_start();

    ?>

        <div style="<?php echo $styleAttr; ?>" class="wp-block-akhb-form">
            <h1>Fill In Your Info</h1>
            <form method="post" id="myForm" action="/andrewkhburns.com/wp-json/akhb/v2/endpoint">
                <div class="form-field">
                    <input type="text" name="firstname" id="firstname" placeholder="Enter your first name" />
                    <small></small>
                </div>
                <div class="form-field">
                    <input type="text" name="lastname" id="lastname" placeholder="Enter your last name" />
                    <small></small>
                </div>
                <div class="form-field">
                    <input type="email" name="email" id="email" placeholder="Enter your email" />
                    <small></small>
                </div>

                <div class="btn-wrapper">
                    <button type="submit" style="<?php echo $styleAttr ?>">Search</button>
                </div>
            </form>
        </div>

    <?php

        $output = ob_get_contents();

        ob_end_clean();
    //}

        return $output;
}
