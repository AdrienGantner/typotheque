import { FontProjectController } from "./controllers.js";

const fonts = document.getElementsByClassName("font-element");

function hideAll() {
    for (const font of fonts) {
        font.style.display = "none";
    }
}

function showAll(category) {
    for (const font of fonts) {
        if (
            font.dataset.tags.split(" ").includes(category) ||
            font.dataset.category == category ||
            category == "reset"
        ) {
            font.style.display = "block";
        }
    }
}

function sortFonts(e) {
    const list = document.getElementsByClassName("font-element");

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
    // Comparer les noms des fontes pour faire le tri.
    [...list]
        .sort((a, b) =>
            a.querySelector(".font-name").innerText >
            b.querySelector(".font-name").innerText
                ? 1 * toggle
                : -1 * toggle,
        )
        .forEach((node) => list[0].parentNode.appendChild(node));
}

function filterFonts() {
    const tagsInput = document.getElementById("tags-filter");
    const categoryInput = document.getElementById("categories-filter");

    if (tagsInput.value == "reset") {
        showAll(categoryInput.value);
    } else {
        hideAll();
        for (const font of fonts) {
            if (
                font.dataset.tags.split(" ").includes(tagsInput.value) &&
                (font.dataset.category == categoryInput.value ||
                    categoryInput.value == "reset")
            ) {
                font.style.display = "block";
            }
        }
    }
}

function filterFontsByCategory(input) {
    const tagsInput = document.getElementById("tags-filter");

    if (input.value == "reset") {
        showAll(tagsInput.value);
    } else {
        hideAll();
        // if (tagsInput.value == "reset") {
        //     showAll(input.value);
        // } else {
        //     const filteredFonts = document.getElementsByClassName(
        //         tagsInput.value,
        //     );
        //     for (const filteredFont of filteredFonts) {
        //         if (
        //             filteredFont.dataset.category == input.value ||
        //             tagsInput.value == "reset"
        //         ) {
        //             filteredFont.style.display = "block";
        //         }
        //     }
        // }
        const filteredFonts = document.getElementsByClassName(tagsInput.value);
        for (const filteredFont of filteredFonts) {
            if (
                filteredFont.dataset.category == input.value ||
                tagsInput.value == "reset"
            ) {
                filteredFont.style.display = "block";
            }
        }
    }
}

window.sortFonts = sortFonts;
window.filterFonts = filterFonts;

// Read font information
document.addEventListener("DOMContentLoaded", async (event) => {
    for (const [fontProjectID, fontProjectData] of Object.entries(
        window.fontData,
    )) {
        var projectController = new FontProjectController(
            fontProjectData.title,
            fontProjectData.id,
            fontProjectData.fonts,
            fontProjectData.testString,
            fontProjectData.defaultFont,
            null,
            null,
            document.getElementById(`font-element_${fontProjectData.id}`),
        );

        await projectController.waitLoaded();

        if (!fontProjectData.preserveFontsOrder) {
            projectController.sortFontControllers();
        }

        // Build preview
        projectController.previewController.build();
    }
});
