/**
 * Post Navigation Single Photo
 */
document.addEventListener("DOMContentLoaded", function () {
    let dynamicImage = document.getElementById("dynamicImage");
    let prevLink = document.getElementById("prevLink");
    let nextLink = document.getElementById("nextLink");

    let originalImageSrc = dynamicImage.src;

    if (prevLink) {
        prevLink.addEventListener("mouseover", function () {
            dynamicImage.src = this.getAttribute("data-image");
        });
        prevLink.addEventListener("mouseout", function () {
            dynamicImage.src = originalImageSrc;
        });
    }

    if (nextLink) {
        nextLink.addEventListener("mouseover", function () {
            dynamicImage.src = this.getAttribute("data-image");
        });
        nextLink.addEventListener("mouseout", function () {
            dynamicImage.src = originalImageSrc;
        });
    }
});
