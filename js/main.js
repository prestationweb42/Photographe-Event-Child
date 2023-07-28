// Animation header Btn Menu Burger
const btnMenu = document.querySelector(".btn_menu");
const mainMenu = document.querySelector(".header_mobile");
const headerTitleLink = document.querySelector("#header_title_link");
btnMenu.addEventListener("click", () => {
    btnMenu.classList.toggle("is-active");
    mainMenu.classList.toggle("is-active");
    headerTitleLink.classList.toggle("fade-in");
});
