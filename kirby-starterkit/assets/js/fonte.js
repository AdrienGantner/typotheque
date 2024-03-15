// slider for text size
// Get the elements
const editableText = document.getElementById("editableText");
const fontSlider = document.getElementById("fontSlider");
const fontSizeDisplay = document.getElementById("fontSizeValue");
const editable = document.getElementById("editableText");

// Add event listener to the slider
fontSlider.addEventListener("input", function () {
  // Update the font size of the editable text
  editableText.style.fontSize = this.value + "px";

  // Update the font size display
  fontSizeDisplay.textContent = this.value;
});

// script for line height slider
document.addEventListener("DOMContentLoaded", function () {
  const lineHeightSlider = document.getElementById("lineHeightSlider");
  const textContainer = document.getElementById("textContainer");

  // Update line height on slider change
  lineHeightSlider.addEventListener("input", function () {
    const newLineHeight = lineHeightSlider.value;
    textContainer.style.lineHeight = newLineHeight;
  });
});

// On peut faire ça + simplement (et + accesible) en HTML avec l'élément <form>
// et une <input type="checkbox">, puis juste ajouter la condition pour que cocher
// la checkbox soit obligatoire ↓

// script for download button
document.addEventListener("DOMContentLoaded", function () {
  // on met un try/catch pour le cas où il n'y a pas de bouton "Télécharger"
  try {
    const agreeCheckbox = document.getElementById("agreeCheckbox");
    const downloadLink = document.getElementById("downloadLink");

    // Enable download button only when checkbox is checked
    agreeCheckbox.addEventListener("change", function () {
      downloadLink.classList.toggle("disabled");
    });
  } catch (e) {
    console.log("Pas de fonte téléchargeable →", e);
  }
});

// Displays glyphset
// Récupère l'url de la fonte seulement pour pouvoir en extraire le glyphset et le rajouter dans la page (fonctionne que avec woff ou ttf)
function getGlyphset(el) {
  const fontUrl = el.dataset.fontUrl;
  const fontName = el.dataset.fontName;

  // On vérifie si on n'a pas déjà ajouté le glyphset à la page
  if (!document.getElementById(fontName)) {
    const buffer = fetch(fontUrl).then((res) => res.arrayBuffer());

    // Attend que la fonte soit chargée pour l'analyser grâce à opentypejs
    buffer.then((data) => {
      const glyphs = opentype.parse(data).glyphs.glyphs;

      const ul = document.createElement("ul");
      ul.id = fontName;
      ul.style.fontFamily = fontName;

      Object.values(glyphs).forEach((glyph) => {
        const li = document.createElement("li");
        const glyphContent = String.fromCharCode(glyph.unicode);
        li.innerText = glyphContent;

        ul.appendChild(li);
      });

      el.insertAdjacentElement("afterend", ul);
    });
  }
}

function changeFont(value) {
  editable.style.fontFamily = value;
}
