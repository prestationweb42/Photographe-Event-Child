document.addEventListener("DOMContentLoaded", function () {
    //
    let selectedFilterCategory = "concert";
    let selectedFilterFormat = "paysage";
    let selectedFilterDate = "2022";
    // let selectedFilterCategory = null;
    // let selectedFilterFormat = null;
    // let selectedFilterDate = null;
    const defaultImagesSection = document.querySelector(".display_none");
    let initialFiltersSet = true;

    // Fonction pour vérifier les filtres et gérer l'affichage de la section par défaut
    function checkFiltersAndDisplayDefaultSection() {
        if (initialFiltersSet) {
            defaultImagesSection.style.display = "block";
        } else {
            defaultImagesSection.style.display = "none";
        }
    }

    // AJAX Function load resultats
    function loadResults() {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", photo.ajaxurl, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById("section_result_filtered").innerHTML =
                    xhr.responseText;

                // Appel de la fonction pour vérifier les filtres après avoir chargé les résultats
                checkFiltersAndDisplayDefaultSection();
            }
        };
        var formData = new FormData();
        formData.append("action", "filter_results");
        formData.append("filter1", selectedFilterCategory);
        formData.append("filter2", selectedFilterFormat);
        formData.append("filter3", selectedFilterDate);

        xhr.send(formData);
        // Au chargement initial, vérifier si tous les filtres sont vides et masquer la section par défaut si nécessaire
        checkFiltersAndDisplayDefaultSection();
    }
    // Gestionnaire de clic sur les éléments de filtrage
    const filterItemsCategory = document.querySelectorAll("#item_category");
    const filterItemsFormat = document.querySelectorAll("#item_format");
    const filterItemsDate = document.querySelectorAll("#item_date");
    //
    for (let i = 0; i < filterItemsCategory.length; i++) {
        filterItemsCategory[i].addEventListener("click", function () {
            initialFiltersSet = false;
            selectedFilterCategory = this.getAttribute("data-filter");
            loadResults();
        });
    }
    //
    for (let i = 0; i < filterItemsFormat.length; i++) {
        filterItemsFormat[i].addEventListener("click", function () {
            initialFiltersSet = false;
            selectedFilterFormat = this.getAttribute("data-filter");
            loadResults();
        });
    }
    //
    for (let i = 0; i < filterItemsDate.length; i++) {
        filterItemsDate[i].addEventListener("click", function () {
            initialFiltersSet = false;
            selectedFilterDate = this.getAttribute("data-filter");
            loadResults();
        });
    }
});
