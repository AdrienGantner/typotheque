// Lightbox
Array.from(document.querySelectorAll("[data-lightbox]")).forEach((element) => {
  element.onclick = (e) => {
    e.preventDefault();
    basicLightbox.create(`<img src="${element.href}">`).show();
  };
});

function changeFontHome(el) {
  const fontName = el.dataset.fontName;
  const text = document.getElementById(fontName.split("-")[0]);
  text.style.fontFamily = fontName;
}

const coll = document.getElementsByClassName("collapsible");
for (let i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function () {
    this.classList.toggle("active");
    let filtresList = this.nextElementSibling;
    if (filtresList.style.display === "block") {
      filtresList.style.display = "none";
    } else {
      filtresList.style.display = "block";
    }
  });
}

const fonts = document.getElementsByClassName("font-list");
function hideAll() {
  for (const font of fonts) {
    font.style.display = "none";
  }
}

function showAll() {
  for (const font of fonts) {
    font.style.display = "block";
  }
}

function sortFonts(e) {
  const list = document.getElementsByClassName("font-list");

  switch (e.value) {
    case "ancient":
      recentSort(list, -1);
      break;

    case "recent":
      recentSort(list, 1);
      break;

    case "alphabetic":
      alphabeticSort(list, 1);
      break;

    case "reverse-alphabetic":
      alphabeticSort(list, -1);
      break;
  }
}

// Changer le texte du bouton selon l'ordre affiché
function recentSort(list, toggle) {
  // Comparer l'ordre des fontes pour fair le tri.
  // Par défaut, les fontes sont triées de la plus récente à la plus ancienne

  [...list]
    .sort((a, b) =>
      a.dataset.order > b.dataset.order ? 1 * toggle : -1 * toggle,
    )
    .forEach((node) => list[0].parentNode.appendChild(node));
}

// Trier les éléments par leur nom
function alphabeticSort(list, toggle) {
  // Comparer les noms des fontes pour fair le tri.
  [...list]
    .sort((a, b) =>
      a.querySelector(".font-name").innerText >
      b.querySelector(".font-name").innerText
        ? 1 * toggle
        : -1 * toggle,
    )
    .forEach((node) => list[0].parentNode.appendChild(node));
}

function filterFonts(el) {
  console.log("click");
  if (el.dataset.checked == "false") {
    hideAll();
    const filteredFonts = document.getElementsByClassName(el.dataset.filter);
    for (const filteredFont of filteredFonts) {
      filteredFont.style.display = "block";
    }
    el.dataset.checked = "true";
  } else {
    el.dataset.checked = "false";
    showAll();
  }
}

// Get the button
let mybutton = document.getElementById("upButton");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
