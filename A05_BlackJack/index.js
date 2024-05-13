// 1. Create two variables, firstCard and secondCard.
// Set their values to a random number between 2-11

// 2. Create a variable, sum, and set it to the sum of the two cards




let cards = []

let sum = 0
let hasBlackJack = false

let isAlive = false

let message = ""

let messageEL = document.getElementById("message-el")
let sumEL = document.getElementById("sum-el")
//let sumEL = document.querySelector("#sum-el")
let cardsEL =document.getElementById("cards-el")
let playerEL = document.getElementById("player-el")

let player = {
    name : "Natalie",
    chips : 50,
}


// THE EURO SIGN DOES NOT WORK
// https://stackoverflow.com/a/661539
console.log(player.name + ": " + player.chips + "\u20AC")
playerEL.textContent = player.name + ": " + player.chips + " \u20AC"

function getRandomCard() {

    let randomNumber = Math.floor( Math.random()*13 ) + 1
    if (randomNumber > 10) {
        return 10
    } else if (randomNumber === 1) {
        return 11
    } else {
        return randomNumber
    }
}



function startGame() {
    isAlive = true
    let firstCard = getRandomCard()
    let secondCard = getRandomCard()
    cards = [firstCard, secondCard]
    sum = firstCard + secondCard
    renderGame()
}


function renderGame() {
    cardsEL.textContent = "Cards: "
    sumEL.textContent = "Sum: " + sum

    for (let i = 0; i < cards.length; i++) {
        cardsEL.textContent += cards[i]+ " "
    }

    sumEL.textContent = "Sum: " + sum
    if (sum < 21) {
        message = "Do you want a new card?"
    } else if (sum === 21) {
        message = "Whuuhuu Blackjack!"
        hasBlackJack = true
    } else {
        message = "You are out of the game"
        isAlive = false
    }
    messageEL.textContent = message

}
function newCard() {

    if (isAlive === true && hasBlackJack === false) {
        console.log("Drawing a new Card")
        let nextCard = getRandomCard()
        sum += nextCard
        cards.push(nextCard)
        renderGame()
    } else {

    }




}