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
                $(".section_post_imgs_container").append(response);
                front_page++;
            } else {
                $(".btn_load_more").hide();
            }
        });
    });
});
// single-page.php
var single_page = 2;
jQuery(function ($) {
    $("body").on("click", ".btn_load_all_imgs", function () {
        var data = {
            action: "load_single_posts_by_ajax",
            page: single_page,
            security: photo.security,
        };

        $.post(photo.ajaxurl, data, function (response) {
            if ($.trim(response) != "") {
                $(".post_other_imgs_container").append(response);
                single_page++;
            } else {
                $(".btn_load_all_imgs").hide();
            }
        });
    });
});
//
$(document).ready(function () {
    $(".span_title_filter").on("change", function () {
        // var selectedValue = $('select[name="selection"]').val();
        // var selectedValue = $(".title_filter_box").val();
        var selectedValue = $(".span_title_filter").text();
        console.log(selectedValue);

        // Envoyer la valeur à PHP via une requête AJAX ou autre
        $.ajax({
            type: "POST",
            url: "/",
            data: { selectedValue: selectedValue },
            success: function (response) {
                // Traiter la réponse du serveur si nécessaire
                console.log("toto");
            },
        });
    });
});
// chatgpt
$(document).ready(function () {
    // Sélectionner l'élément que vous souhaitez observer
    var target = document.querySelector(".span_title_filter");

    // Créer une instance de MutationObserver
    var observer = new MutationObserver(function (mutations) {
        mutations.forEach(function (mutation) {
            var contenuDiv = $(mutation.target).text(); // Récupérer le contenu textuel de la div modifiée
            console.log(contenuDiv); // Afficher le contenu dans la console ou effectuer d'autres actions
        });
    });

    // Options de l'observateur
    var config = { childList: true, subtree: true };

    // Commencer l'observation de la cible avec les options
    observer.observe(target, config);
});
