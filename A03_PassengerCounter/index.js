// document.getElementById("count").innerText = 5


let saveEl = document.getElementById("save-el")
let counter = 0

// document.getElementById("count-el").innerText = 5
let countEl = document.getElementById("count-el")

console.log(countEl)
console.log(saveEl)

function increment() {
    console.log("The button is clicked!")
    counter++
    countEl.textContent = counter

}
console.log(counter)

function save(){
    let countStr = counter + " - "
    saveEl.innerText += countStr
    console.log(counter)
    console.textContent = 0
    counter = 0
}

