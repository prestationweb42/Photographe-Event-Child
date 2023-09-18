// Front Page Load More Posts
var front_page;
var alreadyDisplayedPosts = [];
// Add Post IDs -> alreadyDisplayedPosts each load posts
function updateAlreadyDisplayedPosts() {
    $(".section_post_imgs_container .post_img").each(function () {
        const postId = $(this).data("post-id");
        if (alreadyDisplayedPosts.indexOf(postId) === -1) {
            alreadyDisplayedPosts.push(postId);
        }
    });
}

jQuery(function ($) {
    // Call the function Posts IDs
    updateAlreadyDisplayedPosts();
    $("body").on("click", ".btn_load_more", function () {
        var data = {
            action: "load_front_posts_by_ajax",
            page: front_page,
            security: photo.security,
            exclude: alreadyDisplayedPosts.join(","),
        };

        $.post(photo.ajaxurl, data, function (response) {
            if ($.trim(response) != "") {
                $("#section_result_filtered").append(response);
                updateLightboxArray();
                updateAlreadyDisplayedPosts();
                front_page++;
            } else {
                $(".btn_load_more").hide();
            }
        });
    });
});
// Single Page Load All Posts
var single_page = 2;
jQuery(function ($) {
    $("body").on("click", ".btn_load_all_imgs", function () {
        var data = {
            action: "load_single_posts_by_ajax",
            page: single_page,
            security: photo.security,
            exclude: alreadyDisplayedPosts.join(","),
        };

        $.post(photo.ajaxurl, data, function (response) {
            if ($.trim(response) != "") {
                $(".post_other_imgs_container").append(response);
                updateLightboxArray();
                single_page++;
            } else {
                $(".btn_load_all_imgs").hide();
            }
        });
    });
});
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
