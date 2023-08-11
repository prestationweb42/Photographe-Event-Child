// $(".link_post_all_imgs").click(function () {
//     alert("Hello World !");
// });
var page = 2;
jQuery(function ($) {
    $("body").on("click", ".btn_post_all_imgs", function () {
        var data = {
            action: "load_posts_by_ajax",
            page: page,
            security: photo.security,
        };

        $.post(photo.ajaxurl, data, function (response) {
            if ($.trim(response) != "") {
                $(".section_post_imgs_container").append(response);
                page++;
            } else {
                $(".btn_post_all_imgs").hide();
            }
        });
    });
});
