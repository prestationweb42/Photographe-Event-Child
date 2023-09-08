/**
 * Animation Lightbox Modale
 */
// Class Lightbox Overlay
let lightboxOverlay = document.querySelector(".lightbox_overlay");
// Class Btn Open Lightbox
let lightboxOpen = document.querySelectorAll(".icon_fullscreen");
// Close Lightbox - Btn Class
let closeLightbox = document.querySelector(".close_lightbox");
// Function Close Lightbox
closeLightbox.addEventListener("click", () => {
    lightboxOverlay.classList.remove("active-lightbox");
});
// Function Open Lightbox
lightboxOpen.forEach(function (div, index) {
    div.addEventListener("click", e => {
        e.preventDefault();
        lightboxOverlay.classList.add("active-lightbox");
        //
        let imageTitre = div.getAttribute("data-title");
        console.log(imageTitre);
        // img
        let imageSrc = div.getAttribute("data-image");
        if (imageSrc) {
            let lightboxImage =
                lightboxOverlay.querySelector(".lightbox__image");
            if (lightboxImage) {
                lightboxImage.setAttribute("src", imageSrc);
            } else {
                console.log("Élément .lightbox__image introuvable.");
            }
        } else {
            console.log("Attribut data-image introuvable ou vide.");
        }
        // categorie
        let imagecateg = div.getAttribute("data-categorie");
        console.log(imagecateg);
        let lightboxcateg = lightboxOverlay.querySelector(
            ".lightbox_categorie"
        );
        lightboxcateg.textContent = imagecateg;
        // reference
        let imageRef = div.getAttribute("data-reference");
        console.log(imageRef);
        let lightboxReference = lightboxOverlay.querySelector(
            ".lightbox_reference"
        );
        lightboxReference.textContent = imageRef;
    });
});
