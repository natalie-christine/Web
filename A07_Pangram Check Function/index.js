
console.log(isPangram("The quick Brown fox jumps over the lazy DOG"));
console.log(isPangram("The quick fox jUMps over the dog"));

function isPangram(str) {
    str = str.toLowerCase();


    let set = new Set();

    for (let char of str) {
        if (char >= "a" && char <= "z") {
            set.add(char);
        }
    }

    if (set.size === 26) {
        console.log("is Panram")
        return true;
    } else {
        console.log("is not Pangram")
        return false;
    }
}







