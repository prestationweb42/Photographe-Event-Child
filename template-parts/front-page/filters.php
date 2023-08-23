<section id="section_selects">

    <!-- Select filter category -->
    <div class="wrapper_select_boxes">
        <div id="title_box_category" class="title_filter_box">
            <span id="span_title_category" class="span_title_filter">Catégories</span>
            <span id="span_icon_category" class="span_icon_filter">&#8964;
            </span>
        </div>
        <ul id="list_items_category" class="list_items_filter menu_close">
            <?php
            $terms = get_terms('categorie');
            foreach ($terms as $term) {
                echo '<li id="item_category" class="list_item" data-filter=' . $term->slug . '>' . $term->name . '</li>';
            }
            ?>
        </ul>
    </div><!-- .wrapper_select_boxes -->
    <!-- Select filter format -->
    <div class="wrapper_select_boxes">
        <div id="title_box_format" class="title_filter_box">
            <span id="span_title_format" class="span_title_filter">Formats</span>
            <span id="span_icon_format" class="span_icon_filter">&#8964;
            </span>
        </div>
        <ul id="list_items_format" class="list_items_filter">
            <?php
            $terms = get_terms('format');
            foreach ($terms as $term) {
                echo '<li id="item_format" class="list_item" data-filter=' . $term->slug . '>' . $term->name . '</li>';
            }
            ?>
        </ul>
    </div><!-- .wrapper_select_boxes -->

    <!-- Container for displaying filtered results -->
    <div id="filtered_results"></div>

    <!-- Select filter date -->
    <div class="wrapper_select_boxes">
        <div id="title_box_date" class="title_filter_box">
            <span id="span_title_date" class="span_title_filter">Trier par</span>
            <span id="span_icon_date" class="span_icon_filter">&#8964;
            </span>
        </div>
        <ul id="list_items_date" class="list_items_filter">
            <?php
            $terms = get_terms('date');
            foreach ($terms as $term) {
                echo '<li id="item_date" class="list_item" data-filter=' . $term->slug . '>' . $term->name . '</li>';
            }
            ?>
        </ul>
    </div><!-- .wrapper_select_boxes -->

</section><!-- #section_selects -->
<script>
const ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
const categoryFilterButtons = document.querySelectorAll("#list_items_category .list_item");
const formatFilterButtons = document.querySelectorAll("#list_items_format .list_item");
const filteredResultsContainer = document.getElementById("filtered_results");

categoryFilterButtons.forEach(button => {
    button.addEventListener("click", () => {
        const selectedCategory = button.getAttribute("data-filter");
        console.log(selectedCategory);
        fetchFilteredResults(selectedCategory, "categorie");
    });
});

formatFilterButtons.forEach(button => {
    button.addEventListener("click", () => {
        const selectedFormat = button.getAttribute("data-filter");
        fetchFilteredResults(selectedFormat, "format");
    });
});

function fetchFilteredResults(filterValue, filterType) {
    // You can add loading indicators or other UI changes here

    const data = new FormData();
    data.append("action", "custom_filter_action"); // Create a WordPress AJAX action
    data.append("filter_value", filterValue);
    data.append("filter_type", filterType);

    fetch(ajaxurl, {
            method: "POST",
            body: data,
        })
        .then(response => response.text())
        .then(result => {
            // Update the results container with the filtered content
            filteredResultsContainer.innerHTML = result;
        })
        .catch(error => {
            console.error("Error fetching filtered results:", error);
        });
}
</script>