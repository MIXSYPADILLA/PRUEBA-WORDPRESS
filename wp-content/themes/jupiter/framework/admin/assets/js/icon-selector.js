(function($) {

    var locolized_data = icon_selector_locolized_data,
        ajax_url = locolized_data.ajax_url,
        $icon_selector = $('.mk-ip'),
        $search_input = $('.mk-ip-search-input'),
        $close_btn = $('.mk-ip-header-close-btn'),
        $cancel_btn = $('.mk-ip-cancel-btn'),
        $save_btn = $('.mk-ip-save-btn'),
        $small_view = $('.mk-ip-lib-view-small'),
        $large_view = $('.mk-ip-lib-view-large'),
        $lib_container = $('.mk-ip-lib-wrap'),
        $filter_bar = $('.mk-ip-filter'),
        $filters = $filter_bar.find('a'),
        $filter_all_btn = $filter_bar.find('.mk-ip-filter-all'),
        pag_start = 0,
        pag_count = 200,
        displayed_icons_index = pag_start,
        icons_index = pag_start,
        is_inf_scroll_initiated = false,
        is_inf_scroll_active = true,
        $last_selected_icon = '',
        $vc_value_input = '',
        $vc_value_view = '',
        $vc_value_view_wrap = '',
        $current_svg = '',
        $spinner = $('.mk-ip-spinner'),
        all_icons = '',
        filtered_cat = 'all';
        $lib = $('.mk-ip-lib');

    // Open Icon Selector
    $('body').on('click', '.mk-vc-icon-selector-btn', function(e) {
        e.preventDefault();
        $vc_value_input = $(this).siblings('.icon_selector_field');
        $vc_value_view_wrap = $(this).siblings('.mk-vc-icon-selector-view-wrap');
        $vc_value_view = $vc_value_view_wrap.find('.mk-vc-icon-selector-view');
        $current_svg = $vc_value_view.children('svg').clone();
        $icon_selector.fadeIn(300);
        $search_input.focus();
        $filters.removeClass('mk-selected');
        $filter_all_btn.addClass('mk-selected');
        filtered_cat = 'all';
        init_icon_selector();
    });

    // Save Icon Selector
    $save_btn.on('click', function(e) {
        e.preventDefault();
        $lib_container.off('scroll');
        is_inf_scroll_initiated = false;
        var icon_class_name = $last_selected_icon.find('svg').attr('data-name'),
            $icon_srouce = $last_selected_icon.find('svg').clone();
        $vc_value_input.val(icon_class_name);
        $vc_value_view_wrap.removeClass('mka-hidden');
        $vc_value_view_wrap.siblings('.mk-vc-icon-selector-btn').text( icon_selector_locolized_data.replace_icon_string );
        $vc_value_view.empty().append($icon_srouce);
        $icon_selector.fadeOut(300);
        setTimeout(function() {
            $lib.empty();
        }, 400);
    });

    // Close Icon Selector
    $close_btn.add( $cancel_btn ).on('click', function(e) {
        e.preventDefault();
        $lib_container.off('scroll');
        is_inf_scroll_initiated = false;
        $icon_selector.fadeOut(300);
        setTimeout(function() {
            $lib.empty();
        }, 400);
    });

    // On VC window close
    $('body').on('click', '.vc_ui-close-button', function(e) {
        $close_btn.trigger('click');
    });

    // Search Icon Selector
    $search_input.on('keyup', _.debounce(function (e) {
        if ( $.trim( $search_input.val() ) === '' ) {
            is_inf_scroll_active = true;
            display_list_of_icons(true);
        } else {
            display_search_of_icons( $search_input.val() );
        }
    }, 500));

    // View buttons
    $small_view.on('click', function(e) {
        e.preventDefault();
        $(this).addClass('mk-selected').siblings().removeClass('mk-selected');
        $lib.removeClass('mk-ip-lib-large').addClass('mk-ip-lib-small');
    });
    $large_view.on('click', function(e) {
        $(this).addClass('mk-selected').siblings().removeClass('mk-selected');
        $lib.removeClass('mk-ip-lib-small').addClass('mk-ip-lib-large');
        e.preventDefault();
    });

    // Filtering
    $filters.on('click', function(e) {
        e.preventDefault();
        $filters.removeClass('mk-selected');
        $(this).addClass('mk-selected');
        filtered_cat = $(this).attr('data-filter');
        display_list_of_icons(true);
    });

    // Select Icon
    $lib.on('click', '.mk-ip-lib-item', function() {
        handle_selected_icon( this );
    });

    // Remove Icon in VC
    $('body').on('click', '.mk-vc-icon-selector-view-remove', function(e) {
        e.preventDefault();
        $(this).closest('.mk-vc-icon-selector-view-wrap').siblings('.wpb_vc_param_value').val('');
        $(this).closest('.mk-vc-icon-selector-view-wrap').siblings('.mk-vc-icon-selector-btn').text( icon_selector_locolized_data.select_icon_string );
        $(this).closest('.mk-vc-icon-selector-view-wrap').addClass('mka-hidden');
    });


    function init_icon_selector() {
        localforage.getItem('mk_jupiter_icons').then( function(value) {
            if ( value ) {
                display_list_of_icons(true);
            } else {
                cache_all_icons();
            }
        }).catch(function(err) {
            console.log(err);
        });
    }

    function display_list_of_icons(clear) {

        var clear = clear || false;

        if ( clear ) {
            $lib.empty();
            displayed_icons_index = pag_start;
            icons_index = pag_start;
            is_inf_scroll_active = true;
            $search_input.val('');
            if ( $current_svg.length > 0 ) {
                $lib.append( '<li class="mk-ip-lib-item mk-ip-lib-item-first"><div class="mk-ip-lib-item-inner"><div class="mk-ip-lib-item-icon">' + $current_svg[0].outerHTML + '</div></div></li>' );
            }
            handle_selected_icon( $lib.find('.mk-ip-lib-item-first')[0] );
        }

        var initated_start_index = icons_index;

        localforage.getItem('mk_jupiter_icons').then( function(data) {
            var icons = '';
            var loop_index = 0;
            $.each( data, function(name, source) {
                if ( loop_index > initated_start_index + pag_count ) {
                    return false;  // Break when loaded the amount of pag_count
                }
                if ( loop_index < initated_start_index  ) {
                    loop_index++;  // Loop until index is at desired position
                } else {

                    var current_cat_name = name.substr(0, nthIndex(name,'-', 2)),
                        cat_class = 'mk-ip-cat-' + current_cat_name;
                        
                    if ( current_cat_name === filtered_cat || filtered_cat === 'all' ) {
                        icons += '<li class="mk-ip-lib-item ' + cat_class + '"><div class="mk-ip-lib-item-inner"><div class="mk-ip-lib-item-icon">' + source + '</div></div></li>';
                        displayed_icons_index++;  // Keep track of loaded icons
                        icons_index++;
                        loop_index++;
                    } else {
                        icons_index++;
                    }

                }
            });
            if ( is_inf_scroll_active ) {
                $lib.append(icons);
            }
            init_infinite_scrolling(); // only runs on the first initation
        });
    }

    function display_search_of_icons(icon_name) {
        is_inf_scroll_active = false;
        $lib.empty()
        localforage.getItem('mk_jupiter_icons').then( function(data) {
            var icons = '';
            var regex = new RegExp('-' + icon_name, 'i');
            $.each( data, function(name, source) {
                var current_cat_name = name.substr(0, nthIndex(name,'-', 2));
                if ( current_cat_name === filtered_cat || filtered_cat === 'all' ) {
                    if ( regex.test(name) ) {
                        icons += '<li class="mk-ip-lib-item"><div class="mk-ip-lib-item-inner"><div class="mk-ip-lib-item-icon">' + source + '</div></div></li>';
                    }
                }
            });
            $lib.append(icons);
        });
    }

    function cache_all_icons() {
        $lib.empty();
        $spinner.show();
        jQuery.ajax({
            method: "POST",
            url: ajax_url,
            data: {
                pagination_start: 0,
                pagination_count: -1,
                icon_family: 'all',
                action: 'mk_get_icons_list',
            }
        }).success( function( obj ) {
            localforage.setItem('mk_jupiter_icons', obj.data).then( function (value) {
                console.log('Icons were cached.');
                $spinner.hide();
                display_list_of_icons(true);
            }).catch(function(err) {
                console.log('Icons were NOT cached: ' + err);
            });
        });
    }

    function handle_selected_icon(elem) {
        var $this = $(elem);
        if ( $last_selected_icon instanceof jQuery ) {
            $last_selected_icon.removeClass('mk-selected');
        }
        $last_selected_icon = $this;
        $this.addClass('mk-selected');
    }

    // Initiate Infinite Scrolling, Helps to prevent jerky behavior on lib's height changes when initiating icon selector window 
    function init_infinite_scrolling() {
        if ( !is_inf_scroll_initiated ) {
            $lib_container.scroll( function() {
               if ( $lib_container.scrollTop() + $lib_container.height() > $lib.prop('scrollHeight') - 100 && is_inf_scroll_active) {
                    display_list_of_icons(false);
               }
            });
            is_inf_scroll_initiated = true;
        }
    }

    function nthIndex(str, pat, n){
        var L= str.length, i= -1;
        while(n-- && i++<L){
            i= str.indexOf(pat, i);
            if (i < 0) break;
        }
        return i;
    }
    


}(jQuery));