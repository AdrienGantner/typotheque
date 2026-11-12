import { FontProjectController } from "./controllers.js";

// Create project controller
let projectController;

// On peut faire ça + simplement (et + accesible) en HTML avec l'élément <form>
// et une <input type="checkbox">, puis juste ajouter la condition pour que cocher
// la checkbox soit obligatoire ↓

// script for download button
// on met un try/catch pour le cas où il n'y a pas de bouton "Télécharger"
try {
    const agreeCheckbox = document.getElementById("agreeCheckbox");
    const downloadLink = document.getElementById("downloadButton");

    // Enable download button only when checkbox is checked
    agreeCheckbox.addEventListener("change", function () {
        downloadLink.classList.toggle("disabled");
    });
} catch (e) {
    console.log("Pas de fonte téléchargeable →", e);
}

// Read font information
document.addEventListener("DOMContentLoaded", async (event) => {
    projectController = new FontProjectController(
        fontProjectData.title,
        fontProjectData.id,
        fontProjectData.fonts,
        fontProjectData.testString,
        fontProjectData.defaultFont,
        document.getElementById("font-testers"),
        document.getElementById("glyphset"),
    );

    // Wait for all fonts before sorting and building elements
    try {
        await projectController.waitLoaded();

        // Sort font controllers: variable first, static then (width and then weight)
        if (!fontProjectData.preserveFontsOrder) {
            projectController.sortFontControllers();
        }

        // Build font testers after sorting so visual order is right.
        for (const fontController of projectController.fontControllers) {
            fontController.testerController.build();
        }

        // Build glyphset view
        projectController.glyphsetController.build();
    } catch (error) {
        console.error("Failed to load one or more fonts:", error);
    }

    // Download button interactions
    const downloadButton = document.getElementById("download-button");
    if (downloadButton) {
        const downloadButtonTarget = downloadButton.querySelector(".container");
        const popup = downloadButton.querySelector(".popup");
        downloadButtonTarget.addEventListener("click", (e) => {
            popup.classList.toggle("visible");
        });
        const popupDownloadButton = document.getElementById(
            "popup-download-button",
        );
        const downloadConditionsCheckbox = document.getElementById(
            "download-conditions-checkbox",
        );
        downloadConditionsCheckbox.addEventListener("click", (e) => {
            popupDownloadButton.classList.toggle("disabled");
        });
    }
});
