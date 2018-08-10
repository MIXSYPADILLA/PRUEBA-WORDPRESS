(function($) {
    'use strict';
    $(document).on('change', '.background_style', function(e) {
    	$(".background_hov_color_style option[value='none'], .background_hov_color_style option[value='gradient_color'], .background_hov_color_style option[value='image']").remove();
    	$(".background_hov_color_style").append('<option class="none" value="none" selected="selected">None</option>');
        $(".background_hov_color_style").append('<option class="image" value="image">Image & Single Color</option>');
		$(".background_hov_color_style").append('<option class="gradient_color" value="gradient_color">Gradient Color</option>');

        if(this.options[e.target.selectedIndex].value == 'gradient_color') {
        
            $(".background_hov_color_style").val('gradient_color').change();
            $(".background_hov_color_style option[value='image']").remove();
        
        }else if(this.options[e.target.selectedIndex].value == 'image') {

            $(".background_hov_color_style").val('image').change();
            $(".background_hov_color_style option[value='gradient_color']").remove();
        }
    });

    function handleDropshadowVisiblity() {
        var $toggleBtn = $(".drop_shadow").closest('.mk-toggle-button');
        if ( $('.elevation_effect').val() === 'true' ) {
            if ( $toggleBtn.hasClass('mk-toggle-on') ) {
                $toggleBtn.trigger('click');
            }
            $toggleBtn.hide();
        } else {
            $toggleBtn.show();
        }
    }

    $(document).on('change', '.elevation_effect', handleDropshadowVisiblity );
    $(document).on('click', '.vc_edit-form-tab-control', handleDropshadowVisiblity );

})(jQuery);