// slider for text size
// Get the elements
const fontSlider = document.getElementById("fontSlider");
const fontSizeDisplay = document.getElementById("fontSizeValue");
const editable = document.getElementById("editableText");

// Add event listener to the slider
fontSlider.addEventListener("input", function () {
  // Update the font size of the editable text
  editable.style.fontSize = this.value + "px";

  // Update the font size display
  fontSizeDisplay.textContent = this.value;
});

// On peut faire ça + simplement (et + accesible) en HTML avec l'élément <form>
// et une <input type="checkbox">, puis juste ajouter la condition pour que cocher
// la checkbox soit obligatoire ↓

// script for download button
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

// script for line height slider
const letterSpacingSlider = document.getElementById("letterSpacingSlider");

// Update line height on slider change
letterSpacingSlider.addEventListener("input", function (e) {
  console.log(e.target.value);
  editable.style.letterSpacing = letterSpacingSlider.value + "em";
});

// script for line height slider
const lineHeightSlider = document.getElementById("lineHeightSlider");

// <!-- script for line height slider -->
// Update line height on slider change
lineHeightSlider.addEventListener("input", function (e) {
  editable.style.lineHeight = lineHeightSlider.value;
});

// <!-- script for two variable sliders -->
const variable1Slider = document.getElementById("variable1Slider");
const variable2Slider = document.getElementById("variable2Slider");

variable1Slider.addEventListener("input", function (e) {
  updateFontVariation(e);
});

try {
  variable2Slider.addEventListener("input", function (e) {
    updateFontVariation(e);
  });
} catch (err) {
  console.log(err);
}

function updateFontVariation(e) {
  const variable1Value = variable1Slider.value;
  const axis1 = variable1Slider.dataset.axis;
  try {
    const variable2Value = variable2Slider.value;
    const axis2 = variable2Slider.dataset.axis;
    editable.style.fontVariationSettings = `'${axis1}' ${variable1Value}, '${axis2}' ${variable2Value}`;
  } catch (err) {
    editable.style.fontVariationSettings = `'${axis1}' ${variable1Value}`;
  }
}

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
