document.addEventListener("DOMContentLoaded", function () {
    // Initialization of filters.
    let selectedFilterCategory = "mariage";
    let selectedFilterFormat = "paysage";
    let selectedFilterDate = "2022";
    // Varaibles
    const defaultImagesSection = document.querySelector(".display_none");
    const btnLoadMore = document.querySelector(".div_btn_load_more");
    let initialFiltersSet = true;

    // Function to check filters and manage default section display
    function checkFiltersAndDisplayDefaultSection() {
        if (initialFiltersSet) {
            defaultImagesSection.style.display = "block";
            btnLoadMore.style.display = "block";
        } else {
            defaultImagesSection.style.display = "none";
            btnLoadMore.style.display = "none";
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

                // Calling the function to check filters after loading the results
                checkFiltersAndDisplayDefaultSection();
            }
        };
        var formData = new FormData();
        formData.append("action", "filter_results");
        formData.append("filter1", selectedFilterCategory);
        formData.append("filter2", selectedFilterFormat);
        formData.append("filter3", selectedFilterDate);

        xhr.send(formData);
        // During initial loading, check if all filters are empty and hide the default section if necessary
        checkFiltersAndDisplayDefaultSection();
    }
    // Filtering element click handler
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
