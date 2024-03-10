// slider for text size
// Get the elements
const editableText = document.getElementById("editableText");
const fontSlider = document.getElementById("fontSlider");
const fontSizeDisplay = document.getElementById("fontSizeValue");

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
  const agreeCheckbox = document.getElementById("agreeCheckbox");
  const downloadButton = document.getElementById("downloadButton");

  // Enable download button only when checkbox is checked
  agreeCheckbox.addEventListener("change", function () {
    downloadButton.disabled = !agreeCheckbox.checked;
  });

  // Handle download button click
  downloadButton.addEventListener("click", function () {
    if (agreeCheckbox.checked) {
      // Implement download logic here
      // juste un élément <a> avec l'attribut download
      alert("En téléchargement...");
    } else {
      alert(
        "Veuillez accepter les conditions d'utilisation avant de télécharger.",
      );
    }
  });
});

// Displays glyphset
// Récupère l'url de la fonte seulement si c'est un woff, pour pouvoir en extraire le glyphset et le rajouter dans la page
function getGlyphset(event) {
  event.preventDefault(); // Empêche que le lien ouvre une fenêtre.

  const glyphset = document.getElementById("glyphset");
  const font = document.querySelector(".good");

  // Check s'il y a une fonte dont on peut récupérer le glyphset
  if (font) {
    const fontUrl = font.dataset.fontUrl;
    const buffer = fetch(fontUrl).then((res) => res.arrayBuffer());

    // Attend que la fonte soit chargée pour l'analyser grâce à opentypejs
    buffer.then((data) => {
      const glyphs = opentype.parse(data).glyphs.glyphs;

      const ul = document.createElement("ul");

      Object.values(glyphs).forEach((glyph) => {
        const li = document.createElement("li");
        li.innerText = String.fromCharCode(glyph.unicode);
        ul.appendChild(li);
      });

      glyphset.appendChild(ul);
    });
  } else {
    const error = document.createElement("p");
    error.innerText = "Pas de glyphset disponible pour cette fonte";
    glyphset.appendChild(error);
  }
}
