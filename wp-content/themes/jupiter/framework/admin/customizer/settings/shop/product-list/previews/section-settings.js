(function($) {

    var gridWrapper = '.theme-page-wrapper.full-layout.mk-grid';
    var listProduct = '.woocommerce-page ul.products';
    var listProduct1 = '.woocommerce-page ul.products.per-row-1';
    var listProduct2 = '.woocommerce-page ul.products.per-row-2';
    var listProduct3 = '.woocommerce-page ul.products.per-row-3';
    var listProduct4 = '.woocommerce-page ul.products.per-row-4';
    var boxProduct = '.woocommerce-page ul.products li.product';

    var selectors = [
        ".woocommerce-loop-product__title",
        ".price ins",
        ".price del",
        ".button",
        ".star-rating",
    ];

    // Method for Control's event handlers: cs_pl_settings_full_width.
    function mkCustomizerProductsListFullWidth() {
        wp.customize('cs_pl_settings_full_width', function(value) {

            if ('true' == value()) {
                $(gridWrapper).css('width', '100%');
                $(gridWrapper).css('max-width', '100%');
            } else {
                $(gridWrapper).css('max-width', mk_grid_width + 'px');
            }

            value.bind(function(to) {
                if ('true' == to) {
                    $(gridWrapper).css('width', '100%');
                    $(gridWrapper).css('max-width', '100%');
                } else {
                    $(gridWrapper).css('max-width', mk_grid_width + 'px');
                }
            });

        });
    }

    // Method for Control's event handlers: cs_pl_settings_hover_style.
    function mkCustomizerProductsListHoverStyle() {
        wp.customize('cs_pl_settings_hover_style', function(value) {
            $(listProduct).removeClass('thumbnail-hover-style-none thumbnail-hover-style-alternate thumbnail-hover-style-zoom');
            $(listProduct).addClass('thumbnail-hover-style-' + value());
            value.bind(function(to) {
                $(listProduct).removeClass('thumbnail-hover-style-none thumbnail-hover-style-alternate thumbnail-hover-style-zoom');
                $(listProduct).addClass('thumbnail-hover-style-' + to);
            });

        });
    }

    // Method for Control's event handlers: cs_pl_settings_product_info.
    function mkCustomizerProductsListProductInfo() {
        wp.customize('cs_pl_settings_product_info', function(value) {

            var selecteds = typeof value() === 'object' ? value() : value().split(',');

            for (var i = 0, len = selectors.length; i < len; i++) {
                $(boxProduct + ' ' + selectors[i]).hide();
                if (selectors[i] === '.price del') {
                    $(boxProduct + ' .price > .amount').hide();
                }
            }

            for (var i = 0, len = selecteds.length; i < len; i++) {
                $(boxProduct + ' ' + selecteds[i]).show();
                if (selecteds[i] === '.price del') {
                    $(boxProduct + ' .price > .amount').show();
                }
                if (selecteds[i] === '.star-rating' || selecteds[i] === '.button') {
                    $(boxProduct + ' ' + selecteds[i]).css({
                        'display': 'inline-block'
                    });
                }
            }

            value.bind(function(to) {

                selecteds = typeof to === 'object' ? to : to.split(',');

                for (var i = 0, len = selectors.length; i < len; i++) {
                    $(boxProduct + ' ' + selectors[i]).hide();
                    if (selectors[i] === '.price del') {
                        $(boxProduct + ' .price > .amount').hide();
                    }
                }

                for (var i = 0, len = selecteds.length; i < len; i++) {
                    $(boxProduct + ' ' + selecteds[i]).show();
                    if (selecteds[i] === '.price del') {
                        $(boxProduct + ' .price > .amount').show();
                    }
                    if (selecteds[i] === '.star-rating' || selecteds[i] === '.button') {
                        $(boxProduct + ' ' + selecteds[i]).css({
                            'display': 'inline-block'
                        });
                    }
                }

            });

        });
    }

    // Method for Control's event handlers: cs_pp_settings_product_info_align.
    function mkCustomizerProductsListAlignProductInfo() {
        wp.customize('cs_pp_settings_product_info_align', function(value) {

            align = value();

            if (!align.length) {
                align = 'center';
            }

            value.bind(function(to) {

                if (!to.length) {
                    to = 'center';
                }

                $(boxProduct + ' .mk-product-warp').css('text-align', to);
            });

        });
    }

    // Method for Control's event handlers: cs_pl_settings_columns.
    function mkCustomizerGridColumns() {
        wp.customize('cs_pl_settings_columns', function(value) {
            $(listProduct).attr({
                'data-columns': value(),
            });
            value.bind(function(to) {
                $(listProduct).attr({
                    'data-columns': to,
                });
            });
        });
    }

    // Method for Control's event handlers: cs_pl_settings_horizontal_space.
    function mkCustomizerGridHorizontalSpace() {

        wp.customize('cs_pl_settings_horizontal_space', function(value) {

            var gridWrapperWidth = $(gridWrapper).innerWidth();

            var gridColumns = wp.customize('cs_pl_settings_columns')();

            var gridMargin = (value() / 2);

            var boxWidth = 100;

            if (gridColumns > 1) {
                if (gridWrapperWidth > 768) {
                    boxWidth = 100 / gridColumns;
                } else if (gridWrapperWidth < 769 && gridWrapperWidth > 600) {
                    boxWidth = 50;
                }
            }

            $(listProduct).attr({
                'data-margin': value(),
            }).css({
                marginLeft: (gridMargin - value()) + 'px',
                marginRight: (gridMargin - value()) + 'px'
            });

            $(listProduct).find('li.product').css({
                marginLeft: gridMargin + 'px',
                marginRight: gridMargin + 'px',
                width: 'calc(' + boxWidth + '% - ' + value() + 'px)',
            });

            value.bind(function(to) {

                gridMargin = (to / 2);

                $(listProduct).attr({
                    'data-margin': to,
                }).css({
                    marginLeft: (gridMargin - to) + 'px',
                    marginRight: (gridMargin - to) + 'px'
                });

                $(listProduct).find('li.product').css({
                    marginLeft: gridMargin + 'px',
                    marginRight: gridMargin + 'px',
                    width: 'calc(' + boxWidth + '% - ' + to + 'px)',
                });

            });
        });
    }

    // Method for Control's event handlers: cs_pl_settings_vertical_space.
    function mkCustomizerGridverticalSpace() {
        wp.customize('cs_pl_settings_vertical_space', function(value) {
            $(boxProduct).css({
                marginBottom: value() + 'px',
            });
            value.bind(function(to) {
                $(boxProduct).css({
                    marginBottom: to + 'px',
                });
            });
        });
    }

    mkCustomizerProductsListFullWidth();
    mkCustomizerProductsListHoverStyle();
    mkCustomizerProductsListProductInfo();
    mkCustomizerProductsListAlignProductInfo();
    mkCustomizerGridColumns();
    mkCustomizerGridHorizontalSpace();
    mkCustomizerGridverticalSpace();

    $(document).ready(function() {
        // Method for selectiveRefresh event handlers: partial-content-rendered.
        wp.customize.selectiveRefresh.bind('partial-content-rendered', function(placement) {
            if (typeof placement.partial.id !== 'undefined' && 'cs_pl_settings_grid' === placement.partial.id) {
                mkCustomizerProductsListFullWidth();
                mkCustomizerProductsListHoverStyle();
                mkCustomizerProductsListProductInfo();
                mkCustomizerProductsListAlignProductInfo();
                mkCustomizerGridColumns();
                mkCustomizerGridHorizontalSpace();
                mkCustomizerGridverticalSpace();
                $(window).trigger('resize');
            }
        });
    });

})(jQuery);