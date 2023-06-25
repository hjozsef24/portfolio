function removeLetters(string) {
    const hasLetterRegex = "[a-zA-ZÀ-ÖØ-öø-ÿ-]";
    const r = new RegExp(hasLetterRegex, "g");
    return string.replace(r, "");
}

function formatPhoneNumber(string) {
    return removeLetters(string).replace(" ", "");
}