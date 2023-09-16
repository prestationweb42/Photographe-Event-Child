/**
 * Animation header Btn Menu Burger
 */
const menuBurger = document.querySelector(".btn_menu");
const menuMobile = document.querySelector(".header_mobile");
const headerTitleLink = document.querySelector("#header_title_link");
menuBurger.addEventListener("click", () => {
    menuBurger.classList.toggle("is-active");
    menuMobile.classList.toggle("is-active");
});
/**
 * Animation contact Modale + Contact Form
 */
// Class Modal
const popUpOverlay = document.querySelector(".popup_modale");
const popUpContainer = document.querySelector(".popup_container");
// Link Contact Menu Header
const menuContactHeader = document.querySelector(
    ".header__menu__desktop .menu-item-23 a"
);
// Link Contact Menu Mobile
const menuContactMobile = document.querySelector(
    ".header__menu__mobile .menu-item-23 a"
);
// function Open Modale Form
function toggleModal() {
    popUpOverlay.style.display = "flex";
    void popUpOverlay.offsetWidth;
    popUpOverlay.classList.add("is-visible");
    popUpContainer.classList.toggle("is-display");
}
// Open Modale Form
[menuContactHeader, menuContactMobile].forEach(el => {
    el.addEventListener("click", toggleModal);
});
// Open Modale Btn Contact Single Page Photo
const contactSinglePageModal = document.querySelector(".post_contact_link");
if (contactSinglePageModal) {
    contactSinglePageModal.addEventListener("click", toggleModal);
}
// Function Close Modale Form
function closeModal() {
    popUpOverlay.classList.remove("is-visible");
    popUpContainer.classList.remove("is-display");
}
// Listener event close modal click outside
popUpOverlay.addEventListener("click", event => {
    if (event.target === popUpOverlay) {
        closeModal();
    }
});
// Listener event close modal press key escape
document.addEventListener("keydown", event => {
    if (
        event.key === "Escape" &&
        popUpOverlay.classList.contains("is-open") &&
        popUpContainer.classList.contains("is-visible")
    ) {
        closeModal();
    }
});
// Listener for transition end to hide the modal
popUpOverlay.addEventListener("transitionend", function (event) {
    if (
        event.propertyName === "opacity" &&
        !popUpOverlay.classList.contains("is-visible")
    ) {
        popUpOverlay.style.display = "none";
    }
});
/**
 * Animation Filter Categories
 */
const titleBoxCategory = document.getElementById("title_box_category");
const spanTitleCategory = document.getElementById("span_title_category");
const spanIconCategory = document.getElementById("span_icon_category");
const listItemCategory = document.getElementById("list_items_category");
const itemsCategory = document.querySelectorAll("#item_category");
titleBoxCategory.addEventListener("click", () => {
    titleBoxCategory.classList.toggle("title_filter_box_clicked");
    spanIconCategory.classList.toggle("span_icon_filter_rotate");
    listItemCategory.classList.toggle("menu_open");
});
itemsCategory.forEach(itemCategory => {
    // Animation filter Box
    itemCategory.addEventListener("click", () => {
        spanTitleCategory.innerText = itemCategory.innerText;
        titleBoxCategory.classList.toggle("title_filter_box_clicked");
        spanIconCategory.classList.toggle("span_icon_filter_rotate");
        listItemCategory.classList.toggle("menu_open");
        //
        itemsCategory.forEach(itemCategory => {
            itemCategory.classList.remove("list_item_selected");
        });
        itemCategory.classList.add("list_item_selected");
    });
});
// Close filter Categories
document.addEventListener("click", event => {
    if (!titleBoxCategory.contains(event.target)) {
        titleBoxCategory.classList.remove("title_filter_box_clicked");
        spanIconCategory.classList.remove("span_icon_filter_rotate");
        listItemCategory.classList.remove("menu_open");
    }
});
/**
 * Animation Filter Formats
 */
const titleBoxFormat = document.getElementById("title_box_format");
const spanTitleFormat = document.getElementById("span_title_format");
const spanIconFormat = document.getElementById("span_icon_format");
const listItemFormat = document.getElementById("list_items_format");
const itemsFormat = document.querySelectorAll("#item_format");
titleBoxFormat.addEventListener("click", () => {
    titleBoxFormat.classList.toggle("title_filter_box_clicked");
    spanIconFormat.classList.toggle("span_icon_filter_rotate");
    listItemFormat.classList.toggle("menu_open");
});
itemsFormat.forEach(itemFormat => {
    // Animation filter Box
    itemFormat.addEventListener("click", () => {
        spanTitleFormat.innerText = itemFormat.innerText;
        titleBoxFormat.classList.toggle("title_filter_box_clicked");
        spanIconFormat.classList.toggle("span_icon_filter_rotate");
        listItemFormat.classList.toggle("menu_open");
        //
        itemsFormat.forEach(itemFormat => {
            itemFormat.classList.remove("list_item_selected");
        });
        itemFormat.classList.add("list_item_selected");
    });
});
// Close filter Formats
document.addEventListener("click", event => {
    if (!titleBoxFormat.contains(event.target)) {
        titleBoxFormat.classList.remove("title_filter_box_clicked");
        spanIconFormat.classList.remove("span_icon_filter_rotate");
        listItemFormat.classList.remove("menu_open");
    }
});
/**
 * Animation Filter Dates
 */
const titleBoxDate = document.getElementById("title_box_date");
const spanTitleDate = document.getElementById("span_title_date");
const spanIconDate = document.getElementById("span_icon_date");
const listItemDate = document.getElementById("list_items_date");
const itemsDate = document.querySelectorAll("#item_date");
titleBoxDate.addEventListener("click", () => {
    titleBoxDate.classList.toggle("title_filter_box_clicked");
    spanIconDate.classList.toggle("span_icon_filter_rotate");
    listItemDate.classList.toggle("menu_open");
});
itemsDate.forEach(itemDate => {
    // Animation filter Box
    itemDate.addEventListener("click", () => {
        spanTitleDate.innerText = itemDate.innerText;
        titleBoxDate.classList.toggle("title_filter_box_clicked");
        spanIconDate.classList.toggle("span_icon_filter_rotate");
        listItemDate.classList.toggle("menu_open");
        //
        itemsDate.forEach(itemDate => {
            itemDate.classList.remove("list_item_selected");
        });
        itemDate.classList.add("list_item_selected");
    });
});
// Close filter Dates
document.addEventListener("click", event => {
    if (!titleBoxDate.contains(event.target)) {
        titleBoxDate.classList.remove("title_filter_box_clicked");
        spanIconDate.classList.remove("span_icon_filter_rotate");
        listItemDate.classList.remove("menu_open");
    }
});
// Animation filter All List
function animationAllList(items) {
    items.forEach(item => {
        item.addEventListener("mouseover", () => {
            item.classList.add("list_item_hover");
        });
        item.addEventListener("mouseout", () => {
            item.classList.remove("list_item_hover");
        });
        item.addEventListener("mousedown", () => {
            item.classList.add("list_item_pressing");
        });
        item.addEventListener("mouseup", () => {
            item.classList.remove("list_item_pressing");
        });
    });
}
animationAllList(itemsCategory);
animationAllList(itemsFormat);
animationAllList(itemsDate);
