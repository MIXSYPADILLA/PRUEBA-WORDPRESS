
(function ($) {

    var data = {};

    $('.how-to-video-list a').on('click', function() {
        data.how_to_video = 'clicked';
        update_tracking()
    });

    $('.how-to .disc a').on('click', function() {
        data.common_issues = 'clicked';
        update_tracking()
    });

    $('a[href="https://themes.artbees.net/support/jupiter/docs"]').on('click', function() {
         data.documentation = 'clicked';
         update_tracking()
    });

    $('a[href="https://themes.artbees.net/support/jupiter/videos"]').on('click', function() {
         data.video_tutorials = 'clicked';
         update_tracking()
    });

    $('a[href="https://themes.artbees.net/support/jupiter/faq"]').on('click', function() {
         data.faq = 'clicked';
         update_tracking()
    });

    $('a[href="https://themes.artbees.net/support/jupiter"]').on('click', function() {
         data.ask_our_experts = 'clicked';
         update_tracking()
    });

    $('a[href="http://forums.artbees.net/c/jupiter"]').on('click', function() {
         data.join_community = 'clicked';
         update_tracking()
    });

    $('a[href="https://themes.artbees.net/artbees-care"]').on('click', function() {
         data.customize_jupiter = 'clicked';
         update_tracking()
    });

    function update_tracking() {
        json_data = JSON.stringify(data);
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: { 
                action: 'mk_control_panel_tracking',
                data: json_data,
            },
            dataType: 'json',
            timeout: 5000,
            success: function( response ) {
                
            },
            error: function( XMLHttpRequest, textStatus, errorThrown ) {
                console.log( XMLHttpRequest.responseText );
            }
        });
    }
    

})(jQuery);

