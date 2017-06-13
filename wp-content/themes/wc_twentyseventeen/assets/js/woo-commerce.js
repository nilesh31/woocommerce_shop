jQuery(function () {
    jQuery("#slider-range").slider({
        range: true,
        min: 0,
        max: 500,
        change: function () {
            var val = jQuery("#amount").val();
            jQuery.ajax({
                type: "POST",
                datatype: "json",
                url: ajax_params.ajax_url,
                beforeSend: function () {
                },
                data: {action: "product_filter_by_price", "price": val},
                success: function (data) {
                    alert(data);
                }
            });

        },
        values: [75, 300],
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

