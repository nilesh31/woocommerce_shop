jQuery(function () {
    jQuery("#slider-range").slider({
        range: true,
        min: 0,
        max: 2000,
        change: function () {
            var val = jQuery("#amount").val();
            jQuery.ajax({
                type: "POST",
                datatype: "json",
                url: 'http://localhost/woocommerce_shop/wp-admin/admin-ajax.php',//ajax_params.ajax_url,
                beforeSend: function () {
                },
                data: {action: "product_filter_by_price", price: val},
                success: function (data) {
                  jQuery("ul.products").html(data);  
                }
            });
        },
        values: [0, 2000],
        slide: function (event, ui) {
            jQuery("#amount").val("$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ]);
        }
    });
    jQuery("#amount").val("$" + jQuery("#slider-range").slider("values", 0) +
            " - $" + jQuery("#slider-range").slider("values", 1));
});
jQuery(document).on("change", '#slider-range', function () {
    console.log(jQuery(this).val());
});

