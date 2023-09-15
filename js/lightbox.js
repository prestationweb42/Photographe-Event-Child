/**
 * Animation Lightbox Modale
 */
// Class Lightbox Overlay
let lightboxOverlay = document.querySelector(".lightbox_overlay");
// Class Btn Open Lightbox
let lightboxOpen = document.querySelectorAll(".icon_fullscreen");
// Close Lightbox - Btn Class
let closeLightbox = document.querySelector(".close_lightbox");
// Function Close Lightbox + Animation
closeLightbox.addEventListener("click", () => {
    lightboxOverlay.classList.remove("active-lightbox");
    lightboxOverlay.addEventListener(
        "transitionend",
        function () {
            lightboxOverlay.classList.remove("show-lightbox");
        },
        { once: true }
    );
});
// Function Open Lightbox + Animation
lightboxOpen.forEach(function (div, index) {
    div.addEventListener("click", e => {
        e.preventDefault();
        lightboxOverlay.classList.add("show-lightbox");
        setTimeout(() => {
            lightboxOverlay.classList.add("active-lightbox");
        }, 50);
        //
        let imageTitre = div.getAttribute("data-title");
        console.log(imageTitre);
        // img
        let imageSrc = div.getAttribute("data-image");
        let lightboxImage = lightboxOverlay.querySelector(".lightbox__image");
        lightboxImage.setAttribute("src", imageSrc);

        // categorie
        let imagecateg = div.getAttribute("data-categorie");
        let lightboxcateg = lightboxOverlay.querySelector(
            ".lightbox_categorie"
        );
        lightboxcateg.textContent = imagecateg;

        // reference
        let imageRef = div.getAttribute("data-reference");
        let lightboxReference = lightboxOverlay.querySelector(
            ".lightbox_reference"
        );
        lightboxReference.textContent = imageRef;
    });
});
