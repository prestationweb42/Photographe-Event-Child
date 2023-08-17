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
// Close Modale Form
const btnClosePopUp = document.querySelector(".popup-close");
btnClosePopUp.addEventListener("click", () => {
    popUpOverlay.classList.remove("is-open");
});
// Btn Contact Single Page Photo Open Modale
const contactSinglePageModal = document.querySelector(".post_contact_link");
if (contactSinglePageModal) {
    contactSinglePageModal.addEventListener("click", () => {
        popUpOverlay.classList.toggle("is-open");
    });
}
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
    itemCategory.addEventListener("click", () => {
        spanTitleCategory.innerText = itemCategory.innerText;
        titleBoxCategory.classList.toggle("title_filter_box_clicked");
        spanIconCategory.classList.toggle("span_icon_filter_rotate");
        listItemCategory.classList.toggle("menu_open");
        //
        itemsCategory.forEach(itemCategory => {
            itemCategory.classList.remove("list_item_active");
        });
        itemCategory.classList.add("list_item_active");
    });
});

// const wrapperSelectBox = document.querySelectorAll(".wrapper_select_boxes");
// wrapperSelectBox.forEach(el => {
//     const titleFilterBox = el.querySelector(".title_filter_box");
//     const spanTitleFilter = el.querySelector(".span_title_filter");
//     const spanIconFilter = el.querySelector(".span_icon_filter");
//     const listItemsFilter = el.querySelector(".list_items_filter");
//     const listItems = el.querySelectorAll(".list_item");
//     //
//     titleFilterBox.addEventListener("click", () => {
//         titleFilterBox.classList.toggle("title_filter_box_clicked");
//         spanIconFilter.classList.toggle("span_icon_filter_rotate");
//         listItemsFilter.classList.toggle("menu_open");
//     });
//     //
//     listItems.forEach(listItem => {
//         listItem.addEventListener("click", () => {
//             spanTitleFilter.innerText = listItem.innerText;
//             titleFilterBox.classList.toggle("title_filter_box_clicked");
//             spanIconFilter.classList.toggle("span_icon_filter_rotate");
//             listItemsFilter.classList.toggle("menu_open");
//             //
//             listItems.forEach(listItem => {
//                 listItem.classList.remove("list_item_active");
//             });
//             listItem.classList.add("list_item_active");
//         });
//     });
//     //
// });
