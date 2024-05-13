console.log(isIsogram("ambidExtRously")); // true
console.log(isIsogram("patteRN")); // false

function isIsogram(str) {
    str = str.toLowerCase();

    for (let i = 0; i < str.length; i++) {
        for (let j = i + 1; j < str.length; j++) {
            if (str[i] === str[j]) {
                console.log("is not Isogram")
                return false;
            }
        }
    }

    console.log("is Isogram")
    return true;
}











