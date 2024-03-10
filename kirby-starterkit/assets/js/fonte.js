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
