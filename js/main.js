// **** Animation header Btn Menu Burger ****
const menuBurger = document.querySelector(".btn_menu");
const menuMobile = document.querySelector(".header_mobile");
const headerTitleLink = document.querySelector("#header_title_link");
menuBurger.addEventListener("click", () => {
    menuBurger.classList.toggle("is-active");
    menuMobile.classList.toggle("is-active");
    // headerTitleLink.classList.toggle("fade-in");
});
/**
 * Animation contact Modale + Form
 */
// Class Modal
const popUpOverlay = document.querySelector(".popup_overlay");
// Link Contact Header
const menuContactHeader = document.querySelector(
    ".header__menu__desktop .menu-item-23 a"
);
// Link Contact Mobile
const menuContactMobile = document.querySelector(
    ".header__menu__mobile .menu-item-23 a"
);
// Open Modale Form
[menuContactHeader, menuContactMobile].forEach(el => {
    el.addEventListener("click", () => {
        popUpOverlay.classList.toggle("is-open");
    });
});
// Btn Contact Single Page Photo Open Modale
const contactSinglePageModal = document.querySelector(".post_contact_link");
if (contactSinglePageModal) {
    contactSinglePageModal.addEventListener("click", () => {
        popUpOverlay.classList.toggle("is-open");
    });
}
// Function Close Modale Form
function closeModal() {
    popUpOverlay.classList.remove("is-open");
}
// Listener event close modal click outside
popUpOverlay.addEventListener("click", event => {
    if (event.target === popUpOverlay) {
        closeModal();
    }
});
// Listener event close modal press key escape
document.addEventListener("keydown", event => {
    if (event.key === "Escape" && popUpOverlay.classList.contains("is-open")) {
        closeModal();
    }
});
/**
 * Animation Lightbox Modale
 */
// Class Lightbox Overlay
const lightboxOverlay = document.querySelector(".lightbox_overlay");
// Class Btn Open Lightbox
const lightboxOpen = document.querySelectorAll(".icon_fullscreen");
// Function Open Lightbox
lightboxOpen.forEach(el => {
    el.addEventListener("click", () => {
        lightboxOverlay.classList.add("active-lightbox");
    });
});
// Close Lightbox - Btn Class
const closeLightbox = document.querySelector(".close_lightbox");
// Function Close Lightbox
closeLightbox.addEventListener("click", () => {
    lightboxOverlay.classList.remove("active-lightbox");
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
