let person =  {
    name : "Natalie",
    age: 27,
    country : "Austria"
}

function logData() {
    console.log(person.name + " is " + person.age + " years old and lives in " + person.country)
}
logData()

let age = 99

if (age < 6) {
    console.log("free")
} else if (age < 18) {
    console.log("child discount")
} else if (age < 27) {
    console.log("student discount")
} else if (age < 67) {
    console.log("full price")
} else {
    console.log("senior citizen discount")
}

let largeCountries = ["China","India","USA","Indonesia","Pakistan"]

for (let i = 0; i < largeCountries.length; i++) {
    let country = largeCountries[i]
    console.log("- " + country)
}
let largeCountries2 = ["Tuvalu","India","USA","Indonesia","Monaco"]
largeCountries2.pop()
largeCountries2.push("Pakistan")
largeCountries2.shift()
largeCountries2.unshift("China")
console.log(largeCountries2)

let hands = ["rock", "paper", "scissor"]

// Create a function that returns a random item from the array

function getHand () {
    let randomIndex = Math.floor( Math.random() * 3)
    return hands[randomIndex]
}
console.log(getHand())

let fighters = ["🐉", "🐥", "🐊","💩", "🦍", "🐢", "🐩", "🦭", "🦀", "🐝", "🤖", "🐘", "🐸", "🕷","🐆", "🦕", "🦁"]

let stageEl = document.getElementById("stage")
let fightButton = document.getElementById("fightButton")

fightButton.addEventListener("click", function() {
    // Challenge:
    // When the user clicks on the "Pick Fighters" button, pick two random
    // emoji fighters and display them as i.e. "🦀 vs 🐢" in the "stage" <div>.
    let randomIndexOne = Math.floor( Math.random() * fighters.length )
    let randomIndexTwo = Math.floor( Math.random() * fighters.length )

    // Emoji doesn't work :(
    console.log(fighters[randomIndexOne] + " vs " + fighters[randomIndexTwo])
})
