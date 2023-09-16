var front_page = 2;
jQuery(function ($) {
    $("body").on("click", ".btn_load_more", function () {
        var data = {
            action: "load_front_posts_by_ajax",
            page: front_page,
            security: photo.security,
        };

        $.post(photo.ajaxurl, data, function (response) {
            if ($.trim(response) != "") {
                $("#section_display_more").append(response);
                front_page++;
            } else {
                $(".btn_load_more").hide();
            }
        });
    });
});
// single-page.php
// var single_page = 2;
// jQuery(function ($) {
//     $("body").on("click", ".btn_load_all_imgs", function () {
//         var data = {
//             action: "load_single_posts_by_ajax",
//             page: single_page,
//             security: photo.security,
//         };

//         $.post(photo.ajaxurl, data, function (response) {
//             if ($.trim(response) != "") {
//                 $(".post_other_imgs_container").append(response);
//                 single_page++;
//             } else {
//                 $(".btn_load_all_imgs").hide();
//             }
//         });
//     });
// });
// Display None Section Btn Load All
$(document).ready(function () {
    const sectionBtnLoadAllImgs = $(".section_btn_load_all_imgs");
    const btnLoadAllImgs = $(".btn_load_all_imgs");

    function displayNoneSectionBtn(el) {
        btnLoadAllImgs.on("click", function () {
            el.hide();
        });
    }

    displayNoneSectionBtn(sectionBtnLoadAllImgs);
});
// Single-Photo : Load All Posts
jQuery(document).ready(function ($) {
    $(".btn_load_all_imgs").click(function () {
        $.ajax({
            url: photo.ajaxurl, // Use URL in wp_localize_script
            type: "POST",
            data: {
                action: "load_all_posts", // Action name
                security: photo.security, // Use nonce for Sécurity
            },
            success: function (response) {
                $(".post_other_imgs_container").append(response);
            },
        });
    });
});
