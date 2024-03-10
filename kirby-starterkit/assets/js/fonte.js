// script for buttons
const buttonStates = [
  { text: "#40302A", background: "white" },
  { text: "#1B472A", background: "#F4E676" },
  { text: "#37E676", background: "#FFFFE7" },
  { text: "#680000", background: "#FFFFE7" },
  { text: "#131313", background: "#f0f0f0" },
];

function changeContrast(buttonIndex) {
  const txtElements = document.getElementsByClassName("setting-flex");
  const bkgdElement = document.getElementById("editable-container");

  // Get the current button state
  const currentState = buttonStates[buttonIndex];

  // Change text color with transition
  for (let i = 0; i < txtElements.length; i++) {
    txtElements[i].style.color = currentState.text;
  }

  // Change background color with transition

  bkgdElement.style.backgroundColor = currentState.background;

  // Toggle between two colors for the current button
  buttonStates[buttonIndex] = {
    text: currentState.background,
    background: currentState.text,
  };
}

// script for image slider
// let slideIndex = 1;
// showSlides(slideIndex);

// Next/previous controls
// function plusSlides(n) {
//   showSlides((slideIndex += n));
// }

// Thumbnail image controls
// function currentSlide(n) {
//   showSlides((slideIndex = n));
// }

// function showSlides(n) {
//   let i;
//   let slides = document.getElementsByClassName("mySlides");
//   let dots = document.getElementsByClassName("dot");
//   if (n > slides.length) {
//     slideIndex = 1;
//   }
//   if (n < 1) {
//     slideIndex = slides.length;
//   }
//   for (i = 0; i < slides.length; i++) {
//     slides[i].style.display = "none";
//   }
//   for (i = 0; i < dots.length; i++) {
//     dots[i].className = dots[i].className.replace(" active", "");
//   }
//   slides[slideIndex - 1].style.display = "block";
//   dots[slideIndex - 1].className += " active";
// }

// script for collapsible button
// var coll = document.getElementsByClassName("collapsible");
// var i;
//
// for (i = 0; i < coll.length; i++) {
//   coll[i].addEventListener("click", function () {
//     this.classList.toggle("active");
//     var content = this.nextElementSibling;
//     if (content.style.display === "block") {
//       content.style.display = "none";
//     } else {
//       content.style.display = "block";
//     }
//   });
// }

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
const font = document.querySelector(".font-url.good");
const fontUrl = font.href;
const fontName = font.innerText;

const buffer = fetch(fontUrl).then((res) => res.arrayBuffer());

// Attend que la fonte soit chargée pour l'analyser grâce à opentypejs
buffer.then((data) => {
  const glyphs = opentype.parse(data).glyphs.glyphs;

  const glyphset = document.getElementById("glyphset");
  const ul = document.createElement("ul");

  Object.values(glyphs).forEach((glyph) => {
    const li = document.createElement("li");
    li.innerText = String.fromCharCode(glyph.unicode);
    ul.appendChild(li);
  });

  glyphset.appendChild(ul);
});
