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
        console.log('toto');
    });
});
lightboxOverlay.addEventListener("click", () => {
    lightboxOverlay.classList.remove("active-lightbox");
});
