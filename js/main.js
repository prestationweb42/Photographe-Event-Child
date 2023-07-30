// Animation header Btn Menu Burger
const menuBurger = document.querySelector(".btn_menu");
const menuMobile = document.querySelector(".header_mobile");
const headerTitleLink = document.querySelector("#header_title_link");
menuBurger.addEventListener("click", () => {
    menuBurger.classList.toggle("is-active");
    menuMobile.classList.toggle("is-active");
    headerTitleLink.classList.toggle("fade-in");
});
// **** Animation Modale + Form ****
// Link Contact Header
const menuContactHeader = document.querySelector(
    ".header__menu__desktop .menu-item-23 a"
);
const popUpOverlay = document.querySelector(".popup_overlay");
const btnClosePopUp = document.querySelector(".popup-close");
// Open Modale Form
menuContactHeader.addEventListener("click", () => {
    popUpOverlay.classList.toggle("is-open");
});
// Close Modale Form
btnClosePopUp.addEventListener("click", () => {
    popUpOverlay.classList.remove("is-open");
});
// Link Contact Mobile Popup
const menuContactPopUp = document.querySelector(
    ".header__menu__mobile .menu-item-23 a"
);
menuContactPopUp.addEventListener("click", () => {
    console.log("ca marche");
    menuBurger.classList.toggle("is-active");
    menuMobile.classList.toggle("is-active");
    popUpOverlay.classList.toggle("is-open");
});
