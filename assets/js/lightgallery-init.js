// Wait for the DOM to be fully loaded before initializing the lightbox
document.addEventListener("DOMContentLoaded", function () {
  // Target the gallery section using the anchor (ID)
  var gallery = document.getElementById("my-gallery");

  if (gallery) {
    // Initialize lightGallery only on the elements inside the gallery
    lightGallery(gallery, {
      selector: "img", // Specify that the gallery items are images
      thumbnail: true, // Enable thumbnails (if desired)
      zoom: false, // Enable zoom feature (if desired)
      exitFullscreen: true,
      fullScreen: false, // Enable full screen feature (if desired)
      autoplay: true, // Enable autoplay (if desired)
      download: true, // Disable download option
    });
  }
});
