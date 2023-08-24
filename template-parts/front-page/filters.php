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
                echo '<li id="item_category" class="list_item selected_filter_category" data-filter=' . $term->slug . '>' . $term->name . '</li>';
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
                echo '<li id="item_format" class="list_item selected_filter_format" data-filter=' . $term->slug . '>' . $term->name . '</li>';
            }
            ?>
        </ul>
    </div><!-- .wrapper_select_boxes -->

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