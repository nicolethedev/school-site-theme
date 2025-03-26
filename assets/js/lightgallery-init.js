document.addEventListener("DOMContentLoaded", function () {
  const galleryElements = document.querySelectorAll(".wp-block-image");

  if (galleryElements.length) {
    galleryElements.forEach((gallery) => {
      const img = gallery.querySelector("img");

      if (img) {
        const imgSrc = img.getAttribute("src");
        const imgAlt = img.getAttribute("alt") || "";

        if (!gallery.querySelector("a")) {
          const link = document.createElement("a");
          link.href = imgSrc;
          link.classList.add("lightbox");
          link.setAttribute("data-src", imgSrc);
          link.setAttribute("data-sub-html", `<h4>${imgAlt}</h4>`);
          img.parentNode.insertBefore(link, img);
          link.appendChild(img);
        }
      }
    });

    lightGallery(document.body, {
      selector: ".wp-block-image a",
      plugins: [lgZoom, lgThumbnail],
      download: false,
      closable: true,
      closeOnTap: true,
      controls: true,
      counter: true,
      escKey: true,
      getCaptionFromTitleOrAlt: true,
      showCloseIcon: true,
    });
  }
});
