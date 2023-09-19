/**
 * Animation + Navigation Lightbox Modale
 */
// Class Lightbox Overlay
let lightboxOverlay = document.querySelector(".lightbox_overlay");
// Class Btn Open Lightbox
let lightboxOpen = document.querySelectorAll(".icon_fullscreen");
// Close Lightbox - Btn Class
let closeLightbox = document.querySelector(".close_lightbox");
// Btn Before
let beforeArrow = document.querySelector(".before_arrow");
let beforeChevron = document.querySelector(".before_chevron");
// Btn After
let afterArrow = document.querySelector(".after_arrow");
let afterChevron = document.querySelector(".after_chevron");
// Lightbox Reference
const lightboxRef = document.querySelector(".lightbox_reference");
// Lightbox Category
const lightboxCateg = document.querySelector(".lightbox_categorie");
// Lightbox Title
const lightboxTitre = document.querySelector(".lightbox_title");
// Create variable to stock elements .icon_fullscreen
let allLightboxDivs = Array.from(document.querySelectorAll(".icon_fullscreen"));
// Update variable when add suplly elements
function updateLightboxArray() {
    allLightboxDivs = Array.from(document.querySelectorAll(".icon_fullscreen"));
}

// Function Update Lightbox
function updateLightbox(div) {
    // Update Categorie
    let lightboxImage = lightboxOverlay.querySelector(".lightbox_image");
    let imageSrc = div.getAttribute("data-image");
    lightboxImage.setAttribute("src", imageSrc);

    // Update Categorie
    let lightboxcateg = lightboxOverlay.querySelector(".lightbox_categorie");
    let imagecateg = div.getAttribute("data-categorie");
    lightboxcateg.textContent = imagecateg;

    // Update Title
    let lightboxTitle = lightboxOverlay.querySelector(".lightbox_title");
    let imageTitle = div.getAttribute("data-title");
    lightboxTitle.textContent = imageTitle;

    let lightboxReference = lightboxOverlay.querySelector(
        ".lightbox_reference"
    );
    let imageRef = div.getAttribute("data-reference");
    lightboxReference.textContent = imageRef;
}

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
    // Réinitialiser l'affichage des flèches lors de la fermeture de la lightbox
    beforeArrow.style.display = "block";
    afterArrow.style.display = "block";
    lightboxRef.style.display = "block";
    lightboxCateg.style.display = "block";
    lightboxTitre.style.display = "block";
});
// Function Open Lightbox + Animation
document.addEventListener("click", function (e) {
    const div = e.target.closest(".icon_fullscreen");
    if (!div) return;
    e.preventDefault();

    // Vérification si dans <article class="post_photo_img">
    const isInPostPhotoImg = div.closest(".post_photo_img");
    if (isInPostPhotoImg) {
        beforeArrow.style.display = "none";
        afterArrow.style.display = "none";
        lightboxRef.style.display = "none";
        lightboxCateg.style.display = "none";
        lightboxTitre.style.display = "none";
    } else {
        beforeArrow.style.display = "block";
        afterArrow.style.display = "block";
        lightboxRef.style.display = "block";
        lightboxCateg.style.display = "block";
        lightboxTitre.style.display = "block";
    }

    // Animation Open Lightbox
    lightboxOverlay.classList.add("show-lightbox");
    setTimeout(() => {
        lightboxOverlay.classList.add("active-lightbox");
    }, 50);

    // Title
    let imageTitre = div.getAttribute("data-title");
    let lightboxTitle = lightboxOverlay.querySelector(".lightbox_title");
    lightboxTitle.textContent = imageTitre;

    // Img
    let imageSrc = div.getAttribute("data-image");
    let lightboxImage = lightboxOverlay.querySelector(".lightbox_image");
    lightboxImage.setAttribute("src", imageSrc);

    // Categorie
    let imagecateg = div.getAttribute("data-categorie");
    let lightboxcateg = lightboxOverlay.querySelector(".lightbox_categorie");
    lightboxcateg.textContent = imagecateg;

    // Reference
    let imageRef = div.getAttribute("data-reference");
    let lightboxReference = lightboxOverlay.querySelector(
        ".lightbox_reference"
    );
    lightboxReference.textContent = imageRef;

    // Trouver l'index actuel de 'div' dans la liste des .icon_fullscreen
    const currentIndex = Array.from(
        document.querySelectorAll(".icon_fullscreen")
    ).indexOf(div);

    // Set Attribute Current Index
    lightboxOverlay.setAttribute("data-current-index", currentIndex);
    //
    updateLightbox(div);
});

// Function Before Navigation
function navigateBefore() {
    let currentIndex = parseInt(
        lightboxOverlay.getAttribute("data-current-index"),
        10
    );
    if (currentIndex > 0 && currentIndex < allLightboxDivs.length) {
        currentIndex--;
        lightboxOverlay.setAttribute("data-current-index", currentIndex);
        updateLightbox(allLightboxDivs[currentIndex]);
    }
}
// Click Before Navigation
beforeArrow.addEventListener("click", navigateBefore);
beforeChevron.addEventListener("click", navigateBefore);

// Function After Navigation
function navigateAfter() {
    let currentIndex = parseInt(
        lightboxOverlay.getAttribute("data-current-index"),
        10
    );
    if (currentIndex >= 0 && currentIndex < allLightboxDivs.length - 1) {
        currentIndex++;
        lightboxOverlay.setAttribute("data-current-index", currentIndex);
        updateLightbox(allLightboxDivs[currentIndex]);
    }
}
// Click After Navigation
afterArrow.addEventListener("click", navigateAfter);
afterChevron.addEventListener("click", navigateAfter);
