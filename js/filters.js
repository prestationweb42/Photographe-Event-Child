document.addEventListener("DOMContentLoaded", function () {
    let selectedFilterCategory = "concert";
    let selectedFilterFormat = "paysage";
    let selectedFilterDate = "2022";
    // Fonction pour charger les résultats via AJAX
    function loadResults() {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", photo.ajaxurl, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById("result_div").innerHTML =
                    xhr.responseText;
            }
        };
        var formData = new FormData();
        formData.append("action", "filter_results");
        formData.append("filter1", selectedFilterCategory);
        formData.append("filter2", selectedFilterFormat);
        formData.append("filter3", selectedFilterDate);

        xhr.send(formData);
    }
    // Gestionnaire de clic sur les éléments de filtrage
    const filterItemsCategory = document.querySelectorAll("#item_category");
    const filterItemsFormat = document.querySelectorAll("#item_format");
    const filterItemsDate = document.querySelectorAll("#item_date");
    //
    for (let i = 0; i < filterItemsCategory.length; i++) {
        filterItemsCategory[i].addEventListener("click", function () {
            selectedFilterCategory = this.getAttribute("data-filter");
            loadResults();
        });
    }
    //
    for (let i = 0; i < filterItemsFormat.length; i++) {
        filterItemsFormat[i].addEventListener("click", function () {
            selectedFilterFormat = this.getAttribute("data-filter");
            loadResults();
        });
    }
    //
    for (let i = 0; i < filterItemsDate.length; i++) {
        filterItemsDate[i].addEventListener("click", function () {
            selectedFilterDate = this.getAttribute("data-filter");
            loadResults();
        });
    }
});
