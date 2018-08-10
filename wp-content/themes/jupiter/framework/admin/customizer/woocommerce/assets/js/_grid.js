/**
 * Grid layout handler.
 * Credit: https://goo.gl/25ohzX
 *
 * @since 5.9.4
 */

jQuery(document).ready(function($) {

    function mkShopGridResponsive() {

        var gridWrapper = $('.woocommerce-page .theme-page-wrapper.full-layout.mk-grid');
        var gridWrapperWidth = gridWrapper.innerWidth();

        gridWrapper.find('ul.products').each(function(index, ul) {

            var gridMargin = $(ul).attr('data-margin');
            var gridColumns = $(ul).attr('data-columns');

            var boxWidth = 100;
            var boxLast = 1;

            if (gridColumns > 1) {
                if (gridWrapperWidth > 768) {
                    boxWidth = 100 / gridColumns;
                    boxLast = gridColumns;
                } else if (gridWrapperWidth < 769 && gridWrapperWidth > 600) {
                    boxWidth = 50;
                    boxLast = 2;
                }
            }

            $(ul).find('li.product').removeClass('first last').css({
                'width': 'calc(' + boxWidth + '% - ' + gridMargin + 'px)',
            });

            if (boxLast > 1) {
                first = false;
                $(ul).find('li.product').each(function(index, el) {
                    if (!first) {
                        $(el).addClass('first');
                        first = true;
                    }
                    if (index && 0 === (index + 1) % boxLast) {
                        $(el).addClass('last');
                        first = false;
                    }
                });
            } else {
                $(ul).find('li.product').addClass('first last');
            }

        });
    }

    mkShopGridResponsive();

    $(window).on('resize orientationchange', mkShopGridResponsive);

});