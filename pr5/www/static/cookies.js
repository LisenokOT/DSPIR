const lang_btn = document.getElementById("lang-button");
const them_btn = document.getElementById("thema-button");
let currentLanguage = getCookie("lang");
let currentThema = getCookie("theme");

lang_btn.addEventListener("click", function () {
    if (currentLanguage == "ru") {
        currentLanguage = "en";
    } else {
        currentLanguage = "ru";
    }
    console.log(currentLanguage);
    setCookie("lang", currentLanguage);
    location.reload();
})

them_btn.addEventListener("click", function () {
    if (currentThema == "tem") {
        currentThema = "sv";
    } else {
        currentThema = "tem";
    }
    console.log(currentThema);
    setCookie("theme", currentThema);
    location.reload();
})

function getCookie(name) {
    let matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}

function setCookie(name, value, options = {}) {

    options = {
        path: '/',
        ...options
    };

    if (options.expires instanceof Date) {
        options.expires = options.expires.toUTCString();
    }

    let updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);

    for (let optionKey in options) {
        updatedCookie += "; " + optionKey;
        let optionValue = options[optionKey];
        if (optionValue !== true) {
            updatedCookie += "=" + optionValue;
        }
    }

    document.cookie = updatedCookie;
}