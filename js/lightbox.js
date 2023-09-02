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
