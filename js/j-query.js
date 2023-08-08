alert("toto");
jQuery(document).ready(function ($) {
    $("#form-filter").on("submit", function (e) {
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            url: ajaxurl, // Assurez-vous que cette variable soit correctement définie dans votre template
            type: "POST",
            data: formData + "&action=filtrer_images", // "filtrer_images" est le nom de l'action WordPress pour le traitement AJAX
            success: function (response) {
                // Mettez à jour la liste d'images avec les résultats de la requête
                $("#liste-images").html(response);
            },
        });
    });
});
