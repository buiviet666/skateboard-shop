// slide toggle "index footer"
$(document).ready(function () {
    $(".footer_btn_toggle").click(function () {
        $(".footer_content_main").slideToggle();
        $(".footer_copyrightend").slideToggle();
    });

    $(".down_product_sk8").click(function () {
        $(".list_down_product_sk8").slideToggle();
    })

    $(".down_clother_sk8").click(function () {
        $(".list_down_clother_sk8").slideToggle();
    })

    $(".shop_size_text").click(function () {
        $(".shop_sort_down").slideToggle();
    })

    $(".dropdown_producer_click").click(function () {
        $(".dropdown_producer").slideToggle();
    })

    $(".dropdown_fix_producer_click").click(function () {
        $(".dropdown_fix_producer").slideToggle();
    })
});

// slide fullpage library
new fullpage('#fullpage', {
    licenseKey: '12345-ABCDE-67890-FGHIJ',

    //options here
    autoScrolling: true,
    scrollHorizontally: true,
    // sectionsColor: ['#00FA00', '#FF0800', '#FF01E5', '#E8F000'], chỉnh màu của các trang
    navigation: true, // hiển thị thanh chấm 
});

