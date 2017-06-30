jQuery(function () {
    var ajax_category=function(){
        var val = jQuery("#amount").val();
            var cat = jQuery("#category option:selected").val();
            jQuery.ajax({
                type: "POST",
                datatype: "json",
                url: 'http://localhost/woocommerce_shop/wp-admin/admin-ajax.php',
                beforeSend: function () {
                },
                data: {action: "product_filter_by_price", price: val, category:cat},
                success: function (data) {
                  jQuery("ul.products").html(data);  
                }
            });
    }
    jQuery("#slider-range").slider({
        range: true,
        min: 0,
        max: 2000,
        change: ajax_category ,
        values: [0, 2000],
        slide: function (event, ui) {
            jQuery("#amount").val("$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ]);
        }
    });
    jQuery("#amount").val("$" + jQuery("#slider-range").slider("values", 0) +
            " - $" + jQuery("#slider-range").slider("values", 1));
    jQuery("#category").change(ajax_category);
});
