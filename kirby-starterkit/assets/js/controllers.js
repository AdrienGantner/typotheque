import * as fontkit from "https://esm.sh/fontkit?bundle";

const featureTagLabels = {
    aalt: "Access All Alternates",
    abvf: "Above-base Forms",
    abvm: "Above-base Mark Positioning",
    abvs: "Above-base Substitutions",
    afrc: "Alternative Fractions",
    akhn: "Akhand",
    apkn: "Kerning for Alternate Proportional Widths",
    blwf: "Below-base Forms",
    blwm: "Below-base Mark Positioning",
    blws: "Below-base Substitutions",
    calt: "Contextual Alternates",
    case: "Case-sensitive Forms",
    ccmp: "Glyph Composition / Decomposition",
    cfar: "Conjunct Form After Ro",
    chws: "Contextual Half-width Spacing",
    cjct: "Conjunct Forms",
    clig: "Contextual Ligatures",
    cpct: "Centered CJK Punctuation",
    cpsp: "Capital Spacing",
    cswh: "Contextual Swash",
    curs: "Cursive Positioning",
    cv01: "Character Variant 1",
    cv02: "Character Variant 2",
    cv03: "Character Variant 3",
    cv04: "Character Variant 4",
    cv05: "Character Variant 5",
    cv06: "Character Variant 6",
    cv07: "Character Variant 7",
    cv08: "Character Variant 8",
    cv09: "Character Variant 9",
    cv10: "Character Variant 10",
    cv11: "Character Variant 11",
    cv12: "Character Variant 12",
    cv13: "Character Variant 13",
    cv14: "Character Variant 14",
    cv15: "Character Variant 15",
    cv16: "Character Variant 16",
    cv17: "Character Variant 17",
    cv18: "Character Variant 18",
    cv19: "Character Variant 19",
    cv20: "Character Variant 20",
    cv21: "Character Variant 21",
    cv22: "Character Variant 22",
    cv23: "Character Variant 23",
    cv24: "Character Variant 24",
    cv25: "Character Variant 25",
    cv26: "Character Variant 26",
    cv27: "Character Variant 27",
    cv28: "Character Variant 28",
    cv29: "Character Variant 29",
    cv30: "Character Variant 30",
    cv31: "Character Variant 31",
    cv32: "Character Variant 32",
    cv33: "Character Variant 33",
    cv34: "Character Variant 34",
    cv35: "Character Variant 35",
    cv36: "Character Variant 36",
    cv37: "Character Variant 37",
    cv38: "Character Variant 38",
    cv39: "Character Variant 39",
    cv40: "Character Variant 40",
    cv41: "Character Variant 41",
    cv42: "Character Variant 42",
    cv43: "Character Variant 43",
    cv44: "Character Variant 44",
    cv45: "Character Variant 45",
    cv46: "Character Variant 46",
    cv47: "Character Variant 47",
    cv48: "Character Variant 48",
    cv49: "Character Variant 49",
    cv50: "Character Variant 50",
    cv51: "Character Variant 51",
    cv52: "Character Variant 52",
    cv53: "Character Variant 53",
    cv54: "Character Variant 54",
    cv55: "Character Variant 55",
    cv56: "Character Variant 56",
    cv57: "Character Variant 57",
    cv58: "Character Variant 58",
    cv59: "Character Variant 59",
    cv60: "Character Variant 60",
    cv61: "Character Variant 61",
    cv62: "Character Variant 62",
    cv63: "Character Variant 63",
    cv64: "Character Variant 64",
    cv65: "Character Variant 65",
    cv66: "Character Variant 66",
    cv67: "Character Variant 67",
    cv68: "Character Variant 68",
    cv69: "Character Variant 69",
    cv70: "Character Variant 70",
    cv71: "Character Variant 71",
    cv72: "Character Variant 72",
    cv73: "Character Variant 73",
    cv74: "Character Variant 74",
    cv75: "Character Variant 75",
    cv76: "Character Variant 76",
    cv77: "Character Variant 77",
    cv78: "Character Variant 78",
    cv79: "Character Variant 79",
    cv80: "Character Variant 80",
    cv81: "Character Variant 81",
    cv82: "Character Variant 82",
    cv83: "Character Variant 83",
    cv84: "Character Variant 84",
    cv85: "Character Variant 85",
    cv86: "Character Variant 86",
    cv87: "Character Variant 87",
    cv88: "Character Variant 88",
    cv89: "Character Variant 89",
    cv90: "Character Variant 90",
    cv91: "Character Variant 91",
    cv92: "Character Variant 92",
    cv93: "Character Variant 93",
    cv94: "Character Variant 94",
    cv95: "Character Variant 95",
    cv96: "Character Variant 96",
    cv97: "Character Variant 97",
    cv98: "Character Variant 98",
    cv99: "Character Variant 99",
    c2pc: "Petite Capitals From Capitals",
    c2sc: "Small Capitals From Capitals",
    dist: "Distances",
    dlig: "Discretionary Ligatures",
    dnom: "Denominators",
    dtls: "Dotless Forms",
    expt: "Expert Forms",
    falt: "Final Glyph on Line Alternates",
    fin2: "Terminal Forms #2",
    fin3: "Terminal Forms #3",
    fina: "Terminal Forms",
    flac: "Flattened Accent Forms",
    frac: "Fractions",
    fwid: "Full Widths",
    half: "Half Forms",
    haln: "Halant Forms",
    halt: "Alternate Half Widths",
    hist: "Historical Forms",
    hkna: "Horizontal Kana Alternates",
    hlig: "Historical Ligatures",
    hngl: "Hangul",
    hojo: "Hojo Kanji Forms (JIS X 0212-1990 Kanji Forms)",
    hwid: "Half Widths",
    init: "Initial Forms",
    isol: "Isolated Forms",
    ital: "Italics",
    jalt: "Justification Alternates",
    jp78: "JIS78 Forms",
    jp83: "JIS83 Forms",
    jp90: "JIS90 Forms",
    jp04: "JIS2004 Forms",
    kern: "Kerning",
    lfbd: "Left Bounds",
    liga: "Standard Ligatures",
    ljmo: "Leading Jamo Forms",
    lnum: "Lining Figures",
    locl: "Localized Forms",
    ltra: "Left-to-right Alternates",
    ltrm: "Left-to-right Mirrored Forms",
    mark: "Mark Positioning",
    med2: "Medial Forms #2",
    medi: "Medial Forms",
    mgrk: "Mathematical Greek",
    mkmk: "Mark to Mark Positioning",
    mset: "Mark Positioning via Substitution",
    nalt: "Alternate Annotation Forms",
    nlck: "NLC Kanji Forms",
    nukt: "Nukta Forms",
    numr: "Numerators",
    onum: "Oldstyle Figures",
    opbd: "Optical Bounds",
    ordn: "Ordinals",
    ornm: "Ornaments",
    palt: "Proportional Alternate Widths",
    pcap: "Petite Capitals",
    pkna: "Proportional Kana",
    pnum: "Proportional Figures",
    pref: "Pre-base Forms",
    pres: "Pre-base Substitutions",
    pstf: "Post-base Forms",
    psts: "Post-base Substitutions",
    pwid: "Proportional Widths",
    qwid: "Quarter Widths",
    rand: "Randomize",
    rclt: "Required Contextual Alternates",
    rkrf: "Rakar Forms",
    rlig: "Required Ligatures",
    rphf: "Reph Form",
    rtbd: "Right Bounds",
    rtla: "Right-to-left Alternates",
    rtlm: "Right-to-left Mirrored Forms",
    ruby: "Ruby Notation Forms",
    rvrn: "Required Variation Alternates",
    salt: "Stylistic Alternates",
    sinf: "Scientific Inferiors",
    size: "Optical size",
    smcp: "Small Capitals",
    smpl: "Simplified Forms",
    ss01: "Stylistic Set 1",
    ss02: "Stylistic Set 2",
    ss03: "Stylistic Set 3",
    ss04: "Stylistic Set 4",
    ss05: "Stylistic Set 5",
    ss06: "Stylistic Set 6",
    ss07: "Stylistic Set 7",
    ss08: "Stylistic Set 8",
    ss09: "Stylistic Set 9",
    ss10: "Stylistic Set 10",
    ss11: "Stylistic Set 11",
    ss12: "Stylistic Set 12",
    ss13: "Stylistic Set 13",
    ss14: "Stylistic Set 14",
    ss15: "Stylistic Set 15",
    ss16: "Stylistic Set 16",
    ss17: "Stylistic Set 17",
    ss18: "Stylistic Set 18",
    ss19: "Stylistic Set 19",
    ss20: "Stylistic Set 20",
    ssty: "Math Script-style Alternates",
    stch: "Stretching Glyph Decomposition",
    subs: "Subscript",
    sups: "Superscript",
    swsh: "Swash",
    titl: "Titling",
    tjmo: "Trailing Jamo Forms",
    tnam: "Traditional Name Forms",
    tnum: "Tabular Figures",
    trad: "Traditional Forms",
    twid: "Third Widths",
    unic: "Unicase",
    valt: "Alternate Vertical Metrics",
    vapk: "Kerning for Alternate Proportional Vertical Metrics",
    vatu: "Vattu Variants",
    vchw: "Vertical Contextual Half-width Spacing",
    vert: "Vertical Alternates",
    vhal: "Alternate Vertical Half Metrics",
    vjmo: "Vowel Jamo Forms",
    vkna: "Vertical Kana Alternates",
    vkrn: "Vertical Kerning",
    vpal: "Proportional Alternate Vertical Metrics",
    vrt2: "Vertical Alternates and Rotation",
    vrtr: "Vertical Alternates for Rotation",
    zero: "Slashed Zero",
};

class FontTesterController {
    #editableElementClassName = "editable-text";

    constructor(fontController, testerContainer) {
        this.fontController = fontController;
        this.testerContainer = testerContainer;
        this.tester = null;
        this.axesSliders = {};
    }

    build() {
        var container = document.createElement("div");
        container.className = "font-tester";

        // Header

        var header = document.createElement("div");
        header.className = "header";
        container.appendChild(header);

        // Title

        var title = document.createElement("div");
        header.appendChild(title);
        title.className = "font-title";
        title.innerHTML = this.fontController.uiFullName;

        if (this.fontController.isVariable) {
            title.classList.add("variable");
        }

        // Settings

        var settingsContainer = document.createElement("div");
        header.appendChild(settingsContainer);
        settingsContainer.className = "settings-container";

        // Text alignment
        for (const textAlignSide of ["left", "center", "right"]) {
            var textAlignButtonContainer = document.createElement("div");
            settingsContainer.appendChild(textAlignButtonContainer);
            textAlignButtonContainer.classList.add("setting-flex", "button");
            var textAlignIcon = document.createElement("img");
            textAlignButtonContainer.appendChild(textAlignIcon);
            textAlignIcon.src = `/assets/icons/text-align-${textAlignSide}.svg`;
            textAlignButtonContainer.onclick = (e) => {
                this.setTextAlignment(textAlignSide);
            };
        }
        var defaultTextAlignment = "center";
        this.setTextAlignment(defaultTextAlignment);

        // Font size
        var defaultFontSize = 90;
        var fontSizeContainer = document.createElement("div");
        settingsContainer.appendChild(fontSizeContainer);
        fontSizeContainer.className = "setting-flex";
        var fontSizeSliderID = "font-size-slider";
        var fontSizeLabel = document.createElement("label");
        fontSizeContainer.appendChild(fontSizeLabel);
        fontSizeLabel.innerHTML = `${defaultFontSize}px`;
        fontSizeLabel.htmlFor = fontSizeSliderID;
        var fontSizeSlider = document.createElement("input");
        fontSizeContainer.appendChild(fontSizeSlider);
        fontSizeSlider.type = "range";
        fontSizeSlider.min = 10;
        fontSizeSlider.max = 150;
        fontSizeSlider.value = defaultFontSize;
        fontSizeSlider.id = fontSizeSliderID;
        fontSizeSlider.oninput = (e) => {
            this.setFontSize(e.target.value);
        };

        // Letter spacing
        var defaultLetterSpacing = 0;
        var letterSpacingContainer = document.createElement("div");
        settingsContainer.appendChild(letterSpacingContainer);
        letterSpacingContainer.className = "setting-flex";
        var letterSpacingSliderID = "letter-spacing-slider";
        var letterSpacingLabel = document.createElement("label");
        letterSpacingContainer.appendChild(letterSpacingLabel);
        letterSpacingLabel.htmlFor = letterSpacingSliderID;
        letterSpacingLabel.innerHTML = "↔";
        var letterSpacingSlider = document.createElement("input");
        letterSpacingContainer.appendChild(letterSpacingSlider);
        letterSpacingSlider.type = "range";
        letterSpacingSlider.min = -0.15;
        letterSpacingSlider.max = 0.15;
        letterSpacingSlider.step = "any";
        letterSpacingSlider.value = defaultLetterSpacing;
        letterSpacingSlider.id = letterSpacingSliderID;
        letterSpacingSlider.oninput = (e) => {
            this.setLetterSpacing(e.target.value);
        };

        // Line height
        var defaultLineHeight = 1.3;
        var lineHeightContainer = document.createElement("div");
        settingsContainer.appendChild(lineHeightContainer);
        lineHeightContainer.className = "setting-flex";
        var lineHeightSliderID = "line-height-slider";
        var lineHeightLabel = document.createElement("label");
        lineHeightContainer.appendChild(lineHeightLabel);
        lineHeightLabel.htmlFor = lineHeightSliderID;
        lineHeightLabel.innerHTML = "↕";
        var lineHeightSlider = document.createElement("input");
        lineHeightContainer.appendChild(lineHeightSlider);
        lineHeightSlider.type = "range";
        lineHeightSlider.min = 1;
        lineHeightSlider.max = 3;
        lineHeightSlider.step = "any";
        lineHeightSlider.value = defaultLineHeight;
        lineHeightSlider.id = lineHeightSliderID;
        lineHeightSlider.oninput = (e) => {
            this.setLineHeight(e.target.value);
        };

        // Editable text
        var editableText = document.createElement("div");
        container.appendChild(editableText);
        editableText.className = this.#editableElementClassName;
        editableText.contentEditable = "true";
        editableText.style.fontFamily = this.fontController.cssName;
        editableText.setAttribute("autocomplete", "off");
        editableText.autocorrect = "off";
        editableText.autocapitalize = "off";
        editableText.spellcheck = false;
        editableText.textContent =
            this.fontController.projectController.testString;
        editableText.style.fontSize = `${defaultFontSize}px`;
        editableText.style.letterSpacing = `${defaultLetterSpacing}em`;
        editableText.style.lineHeight = defaultLineHeight;

        // Variable font controls

        var featureTags = this.fontController.font.availableFeatures;
        var defaultFeatureTags = [
            "kern",
            "mark",
            "mkmk",
            "abvm",
            "abvf",
            "abvs",
            "blwm",
            "blwf",
            "blws",
            "cfar",
            "cjct",
            "dist",
            "dtls",
            "akhn",
            "med2",
            "medi",
            "fin2",
            "fin3",
            "fina",
            "flac",
            "half",
            "haln",
            "init",
            "isol",
            "mset",
            "nukt",
            "ltra",
            "ltrm",
            "rclt",
            "rtla",
            "rtlm",
            "stch",
            "tjmo",
            "vjmo",
            "ljmo",
            "vatu",
            "pref",
            "pres",
            "pstf",
            "psts",
            "rkrf",
            "rphf",
            "ssty",
            "calt",
            "rlig",
            "liga",
            "locl",
            "ccmp",
            "rvrn",
        ];
        var nonDefaultFeatureTags = featureTags.filter(
            (value) => !defaultFeatureTags.includes(value),
        );
        var namedVariations = this.fontController.namedVariations;

        if (
            (this.fontController.isVariable &&
                Object.keys(namedVariations).length) ||
            nonDefaultFeatureTags.length
        ) {
            // Make variable axes sliders

            var extraSettingsButton = document.createElement("div");
            extraSettingsButton.className = "setting-flex";
            extraSettingsButton.id = "extra-settings-button";
            var extraSettingsButtonIcon = document.createElement("div");
            extraSettingsButton.appendChild(extraSettingsButtonIcon);
            extraSettingsButtonIcon.className = "icon";
            extraSettingsButtonIcon.innerHTML = "+";

            var extraSettingsPanel = document.createElement("div");
            container.appendChild(extraSettingsPanel);
            extraSettingsPanel.id = "extra-settings";

            extraSettingsButton.onclick = (e) => {
                container.classList.toggle("open-extra");
                container.style.setProperty(
                    "--open-extra-translateX",
                    `calc(${extraSettingsPanel.offsetWidth}px + var(--padding-sides))`,
                );
            };

            if (this.fontController.isVariable) {
                // Make instance selector

                if (Object.keys(namedVariations).length) {
                    var instanceSelectContainer = document.createElement("div");
                    instanceSelectContainer.classList.add("setting-flex");
                    settingsContainer.appendChild(instanceSelectContainer);

                    var instanceSelect = document.createElement("select");
                    instanceSelectContainer.appendChild(instanceSelect);
                    instanceSelect.id = "named-instance-select";

                    for (const [name, settings] of Object.entries(
                        namedVariations,
                    )) {
                        var optionElement = document.createElement("option");
                        optionElement.textContent = name;
                        optionElement.value = name;
                        instanceSelect.appendChild(optionElement);
                        var isDefaultLocation = true;
                        for (const [axisName, defaultValue] of Object.entries(
                            this.fontController.defaultLocation,
                        )) {
                            if (!isDefaultLocation) {
                                break;
                            }
                            for (const [
                                instAxisName,
                                instAxisValue,
                            ] of Object.entries(settings)) {
                                if (
                                    !(
                                        axisName == instAxisName &&
                                        defaultValue == instAxisValue
                                    )
                                ) {
                                    isDefaultLocation = false;
                                }
                            }
                        }
                        if (isDefaultLocation) {
                            optionElement.setAttribute("selected", "");
                        }
                    }

                    instanceSelect.oninput = (e) => {
                        this.setInstance(e.target.value);
                    };
                }

                // Make axes sliders

                var axesSlidersContainer = document.createElement("div");
                extraSettingsPanel.appendChild(axesSlidersContainer);
                axesSlidersContainer.id = "axes-sliders";

                var fontVariationSettings = [];
                for (const [axis, info] of Object.entries(
                    this.fontController.font.variationAxes,
                )) {
                    // Make slider
                    var sliderContainer = document.createElement("div");
                    sliderContainer.classList.add("setting-flex");
                    var sliderID = `${axis}_axis-slider`;
                    var sliderLabel = document.createElement("label");
                    sliderContainer.appendChild(sliderLabel);
                    sliderLabel.htmlFor = sliderID;
                    var axisName;
                    if (axis == "wght") {
                        axisName = "Graisse";
                    } else if (axis == "wdth") {
                        axisName = "Largeur";
                    } else if (axis == "opsz") {
                        axisName = "Taille optique";
                    } else if (axis == "slnt") {
                        axisName = "Oblique";
                    } else if (axis == "ital") {
                        axisName = "Italique";
                    } else {
                        axisName = info.name;
                    }
                    sliderLabel.innerHTML = `${axisName} (${axis})`;
                    var slider = document.createElement("input");
                    sliderContainer.appendChild(slider);
                    slider.type = "range";
                    slider.id = sliderID;
                    slider.step = "any";
                    slider.min = info.min;
                    slider.max = info.max;
                    slider.value = info.default;
                    slider.title = `From ${info.min} to ${info.max}`;
                    editableText.style.setProperty("--" + axis, info.default);
                    slider.addEventListener("input", (event) => {
                        this.setAxisValue(axis, event.target.value);
                    });
                    this.axesSliders[axis] = slider;
                    fontVariationSettings.push(`'${axis}' var(--${axis})`);
                    axesSlidersContainer.appendChild(sliderContainer);
                }
                editableText.style.fontVariationSettings =
                    fontVariationSettings.join(", ");
            }

            // Make OpenType feature tags

            if (nonDefaultFeatureTags.length) {
                var featureTagsContainer = document.createElement("div");
                extraSettingsPanel.appendChild(featureTagsContainer);
                featureTagsContainer.id = "feature-tags";

                var fontFeatureSettings = [];
                for (const tag of nonDefaultFeatureTags) {
                    var tagContainer = document.createElement("div");
                    featureTagsContainer.appendChild(tagContainer);
                    tagContainer.id = tag;
                    tagContainer.className = "tag";

                    var tagButton = document.createElement("div");
                    tagContainer.appendChild(tagButton);
                    tagButton.className = "button";
                    tagButton.innerHTML = tag;
                    tagButton.onclick = (e) => {
                        e.target.classList.toggle("active");
                        this.setFeatureState(
                            tag,
                            e.target.classList.contains("active") ? 1 : 0,
                        );
                    };

                    var friendlyName = null;
                    if (tag.startsWith("cv") || tag.startsWith("ss")) {
                        for (const featureInfo of this.fontController.font.GSUB
                            .featureList) {
                            if (featureInfo.tag == tag) {
                                if (featureInfo.feature.featureParams) {
                                    const nameID =
                                        featureInfo.feature.featureParams
                                            .nameID;
                                    friendlyName =
                                        this.fontController.font.name.records
                                            .fontFeatures[nameID].en;
                                }
                            }
                        }
                    }

                    var tagLabel = document.createElement("div");
                    tagContainer.appendChild(tagLabel);
                    tagLabel.className = "label";
                    if (friendlyName) {
                        tagLabel.innerHTML = friendlyName;
                    } else {
                        tagLabel.innerHTML = featureTagLabels[tag];
                    }

                    editableText.style.setProperty("--feat-" + tag, 0);
                    fontFeatureSettings.push(`'${tag}' var(--feat-${tag})`);
                }
                editableText.style.fontFeatureSettings =
                    fontFeatureSettings.join(", ");
            }

            settingsContainer.appendChild(extraSettingsButton);
        }

        this.testerContainer.appendChild(container);

        this.tester = container;
    }

    get editableElement() {
        if (this.tester) {
            return this.tester.getElementsByClassName(
                this.#editableElementClassName,
            )[0];
        }
        return null;
    }

    setTextAlignment(side) {
        if (this.tester) {
            this.editableElement.style.textAlign = side;
        }
    }

    setFontSize(px) {
        if (this.tester) {
            var formatted = `${px}px`;
            this.editableElement.style.fontSize = formatted;
            this.tester
                .querySelector("#font-size-slider")
                .parentElement.getElementsByTagName("label")[0].innerHTML =
                formatted;
        }
    }

    setLetterSpacing(em) {
        if (this.tester) {
            this.editableElement.style.letterSpacing = em + "em";
        }
    }

    setLineHeight(int) {
        if (this.tester) {
            this.editableElement.style.lineHeight = int;
        }
    }

    setAxisValue(tag, value) {
        if (this.tester) {
            this.editableElement.style.setProperty("--" + tag, value);
            this.axesSliders[tag].value = value;
        }
    }

    setLocation(location) {
        if (this.tester) {
            for (const [tag, value] of Object.entries(location)) {
                this.setAxisValue(tag, value);
            }
        }
    }

    setInstance(name) {
        if (this.tester && name in this.fontController.namedVariations) {
            this.setLocation(this.fontController.namedVariations[name]);
        }
    }

    setFeatureState(tag, state) {
        if (this.tester) {
            this.editableElement.style.setProperty("--feat-" + tag, state);
        }
    }
}

class FontProjectGlyphSetController {
    #styleSelectElementClassName = "style-select";
    #glyphCountElementClassName = "glyph-count";
    #glyphsContainerClassName = "glyphs-container";
    #glyphElementClassName = "glyph";

    constructor(projectController) {
        this.projectController = projectController;
        this.activeFontController = null;
        this.container = this.projectController.glyphsetContainer;
        this.fontSelectElement = this.container.querySelector(
            `.${this.#styleSelectElementClassName}`,
        );
        this.glyphCountElement = this.container.querySelector(
            `.${this.#glyphCountElementClassName}`,
        );
        this.glyphsElement = this.container.querySelector(
            `.${this.#glyphsContainerClassName}`,
        );
    }

    build() {
        var unicodeToGlyphName = {};
        var controllers = this.projectController.fontControllers;
        var defaultControllerIndex = null;
        for (let index = 0; index < controllers.length; index++) {
            const fontController = controllers[index];
            controllers[index] = fontController;
            if (
                fontController == this.projectController.defaultFontController
            ) {
                defaultControllerIndex = index;
            }
            // Collect codepoints
            for (const unicode of fontController.font.characterSet) {
                if (!(unicode in unicodeToGlyphName)) {
                    unicodeToGlyphName[unicode] =
                        fontController.font.glyphForCodePoint(unicode).name;
                }
            }
            // Create option elements for font selector
            var optionElement = document.createElement("option");
            optionElement.textContent = fontController.uiFullName;
            optionElement.value = index;
            this.fontSelectElement.appendChild(optionElement);
        }
        var unicodes = Array.from(Object.keys(unicodeToGlyphName));
        unicodes.sort((a, b) => a - b);
        // Create glyph boxes
        for (const unicode of unicodes) {
            var glyphElement = document.createElement("div");
            glyphElement.className = this.#glyphElementClassName;
            glyphElement.dataset.unicode = unicode;

            var characterElement = document.createElement("div");
            glyphElement.appendChild(characterElement);
            characterElement.className = "character";
            characterElement.innerHTML = String.fromCodePoint(unicode);

            // Character info

            var infoContainer = document.createElement("div");
            infoContainer.className = "info";
            glyphElement.appendChild(infoContainer);

            const unicodeHex = parseInt(unicode)
                .toString(16)
                .padStart(4, "0")
                .toUpperCase();
            const glyphName = unicodeToGlyphName[unicode];

            var unicodeElement = document.createElement("div");
            infoContainer.appendChild(unicodeElement);
            unicodeElement.className = "unicode";
            unicodeElement.innerHTML = `U+${unicodeHex}`;

            if (!glyphName.toUpperCase().endsWith(unicodeHex)) {
                var nameElement = document.createElement("div");
                infoContainer.appendChild(nameElement);
                nameElement.className = "name";
                nameElement.innerHTML = glyphName;
            }

            // Copy to clipboard functionality
            glyphElement.addEventListener("click", (e) => {
                navigator.clipboard.writeText(String.fromCodePoint(unicode));
            });

            this.glyphsElement.appendChild(glyphElement);
        }
        // Select listener updates
        this.fontSelectElement.addEventListener("input", (e) => {
            this.setFontController(controllers[e.target.value]);
        });
        // If only one font, disable select element
        if (this.projectController.fontControllers.length == 1) {
            this.fontSelectElement.disabled = true;
            this.fontSelectElement.classList.add("disabled");
        }

        // Set first font controller
        this.setFontController(this.projectController.defaultFontController);
        this.fontSelectElement.value = defaultControllerIndex;
    }

    setFontController(controller) {
        this.activeFontController = controller;
        var font = controller.font;
        // Set font family
        this.container.style.setProperty("--font-family", controller.cssName);
        // Update glyph count
        this.glyphCountElement.innerHTML = `${font.numGlyphs} glyphes`;
        // Hide/show glyphs
        for (const glyphElement of Array.from(
            this.glyphsElement.querySelector(`.${this.#glyphElementClassName}`),
        )) {
            if (
                !font.characterSet.includes(
                    parseInt(glyphElement.dataset.unicode),
                )
            ) {
                glyphElement.classList.add("hidden");
            } else {
                glyphElement.classList.remove("hidden");
            }
        }
    }
}

class FontProjectPreviewController {
    #fontStylesClassName = "font-styles";
    #fontStyleLabelClassName = "font-style";
    #previewClassName = "preview";

    constructor(projectController) {
        this.projectController = projectController;
        this.activeFontController = null;
        this.container = this.projectController.previewContainer;
        this.fontStylesElement = this.container.querySelector(
            `.${this.#fontStylesClassName}`,
        );
        this.fontStyleLabels = [];
        this.previewElement = this.container.querySelector(
            `.${this.#previewClassName}`,
        );
    }

    build() {
        const controllers = this.projectController.fontControllers;
        for (const fontController of controllers) {
            if (!fontController.isVariable) {
                var fontStyleLabel = document.createElement("div");
                fontStyleLabel.classList.add(this.#fontStyleLabelClassName);
                fontStyleLabel.dataset.fontName = fontController.cssName;
                fontStyleLabel.innerHTML = fontController.uiStyleName;
                fontStyleLabel.onclick = (e) => {
                    this.setFontController(fontController);
                };
                this.fontStylesElement.appendChild(fontStyleLabel);
                this.fontStyleLabels.push(fontStyleLabel);
            }
        }
        this.setFontController(this.projectController.defaultFontController);
    }

    #getFontStyleLabelForFontController(controller) {
        const index =
            this.projectController.fontControllers.indexOf(controller);
        const fontStyleLabel = this.fontStyleLabels[index];
        return fontStyleLabel;
    }

    setFontController(controller) {
        if (this.activeFontController) {
            this.#getFontStyleLabelForFontController(
                this.activeFontController,
            ).classList.remove("active");
            if (controller == this.activeFontController) {
                controller = this.projectController.defaultFontController;
            }
        }
        this.activeFontController = controller;
        const fontStyleLabel =
            this.#getFontStyleLabelForFontController(controller);
        if (fontStyleLabel) {
            fontStyleLabel.classList.add("active");
        }
        this.previewElement.style.fontFamily = controller.cssName;
        // Variable font animations
        if (controller.isVariable) {
            var startVariations = [];
            var endVariations = [];
            for (const [axis, info] of Object.entries(
                controller.font.variationAxes,
            )) {
                startVariations.push(`'${axis}' ${info.min}`);
                endVariations.push(`'${axis}' ${info.max}`);
            }
            this.previewElement.style.setProperty(
                "--start-font-variations",
                startVariations.join(", "),
            );
            this.previewElement.style.setProperty(
                "--end-font-variations",
                endVariations.join(", "),
            );
            this.previewElement.classList.add("variable");
        } else {
            this.previewElement.classList.remove("variable");
        }
    }
}

class FontController {
    constructor(url, cssName, projectController) {
        this.url = url;
        this.cssName = cssName;
        this.projectController = projectController;
        this.testerController = null;
        this.font = null;

        // Load fontkit object
        this.fontBuffer = fetch(this.url).then((res) => res.arrayBuffer());
        this.fontBuffer.then((data) => {
            const fontBuffer = new Uint8Array(data);
            this.font = fontkit.create(fontBuffer);
        });

        // Build tester controller
        if (this.projectController.testersContainer) {
            this.testerController = new FontTesterController(
                this,
                this.projectController.testersContainer,
            );
        }
    }

    get isVariable() {
        if (this.font) {
            return Object.keys(this.font.variationAxes).length !== 0;
        } else {
            return null;
        }
    }

    get defaultLocation() {
        if (this.isVariable) {
            var e = {};
            for (const [axis, info] of Object.entries(
                this.font.variationAxes,
            )) {
                e[axis] = info.default;
            }
            return e;
        }
        return null;
    }

    get uiFullName() {
        const font = this.font;
        if (this.isVariable) {
            if (font.name.records.preferredFamily) {
                return font.name.records.preferredFamily.en;
            } else {
                return font.familyName;
            }
        } else {
            return font.fullName;
        }
    }

    get uiStyleName() {
        const font = this.font;
        if (font.name.records.preferredSubfamily) {
            return font.name.records.preferredSubfamily.en;
        } else if (font.subfamilyName) {
            return font.subfamilyName;
        } else {
            return "Regular";
        }
    }

    get namedVariations() {
        let e = {};
        const font = this.font;
        if (!font.fvar) return e;
        for (let t of font.fvar.instance) {
            let r = {};
            for (let s = 0; s < font.fvar.axis.length; s++) {
                let a = font.fvar.axis[s];
                r[a.axisTag.trim()] = t.coord[s];
            }
            if (t.name) {
                e[t.name.en] = r;
            } else {
                e["Regular"] = r;
            }
        }
        return e;
    }
}

class FontProjectController {
    constructor(
        title,
        id,
        fontsData,
        testString,
        defaultFontURL = null,
        testersContainer = null,
        glyphsetContainer = null,
        previewContainer = null,
    ) {
        this.title = title.trim();
        this.id = id.trim();
        this.fontsData = fontsData;
        this.testString = testString;
        this.fontControllers = [];
        this.defaultFontURL = defaultFontURL;
        this.defaultFontController = null;
        this.testersContainer = testersContainer;
        this.glyphsetContainer = glyphsetContainer;
        this.previewContainer = previewContainer;

        // Build font controllers
        for (const [cssName, info] of Object.entries(this.fontsData)) {
            var controller = new FontController(info.url, cssName, this);
            this.fontControllers.push(controller);
            if (info.url === defaultFontURL) {
                this.defaultFontController = controller;
            }
        }

        if (!this.defaultFontController) {
            this.defaultFontController = this.fontControllers[0];
        }

        // Build glyphset controller
        this.glyphsetController = null;
        if (this.glyphsetContainer) {
            this.glyphsetController = new FontProjectGlyphSetController(this);
        }

        // Build preview controller
        this.previewController = null;
        if (this.previewContainer) {
            this.previewController = new FontProjectPreviewController(this);
        }
    }

    sortFontControllers() {
        var variableFontControllers = [];
        var staticFontControllers = [];
        for (const controller of this.fontControllers) {
            if (controller.isVariable) {
                variableFontControllers.push(controller);
            } else {
                staticFontControllers.push(controller);
            }
        }
        staticFontControllers.sort((a, b) => {
            function getWidthClass(font) {
                return font["OS/2"].usWidthClass;
            }
            function getWeightClass(font) {
                return font["OS/2"].usWeightClass;
            }
            const widthA = getWidthClass(a.font);
            const widthB = getWidthClass(b.font);
            if (widthA === widthB) {
                return getWeightClass(a.font) - getWeightClass(b.font); // Sort by weight
            }
            return widthA - widthB; // Sort by width first
        });
        this.fontControllers = [
            ...variableFontControllers,
            ...staticFontControllers,
        ];
        if (!this.defaultFontURL) {
            this.defaultFontController = this.fontControllers[0];
        }
    }

    async waitLoaded() {
        await Promise.all(
            this.fontControllers.map(
                (fontController) => fontController.fontBuffer,
            ),
        );
    }
}

// Export controller classes
export {
    FontProjectController,
    FontController,
    FontTesterController,
    FontProjectGlyphSetController,
    FontProjectPreviewController,
};
