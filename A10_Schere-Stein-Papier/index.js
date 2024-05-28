let playerScore = 0;
let computerScore = 0;
let roundsToPlay = 0;

function startgame() {
    roundsToPlay = parseInt(document.querySelector('input[type="number"]').value);
    if (isNaN(roundsToPlay) || roundsToPlay <= 0) { // Nan = Not a Number
        alert("Bitte geben Sie eine gültige Anzahl von Runden ein.");
        return;
    }
    playerScore = 0;
    computerScore = 0;
    updateScore();
    document.getElementById('text-content').innerText = `Spiel startet! ${roundsToPlay} Runden zu spielen.`;
}

function chooseWeapon(playerChoice) {
    const choices = ['Schere', 'Stein', 'Papier', 'Echse', 'Spock'];
    const computerChoice = choices[Math.floor(Math.random() * 5)];

    document.querySelector('.gameplay p:nth-child(1)').innerText = `Computer hat ausgewählt: ${computerChoice}`;
    document.querySelector('.gameplay p:nth-child(2)').innerText = `Deine Auswahl: ${playerChoice}`;

    const result = getWinner(playerChoice, computerChoice);

    if (result === 'player') {
        playerScore++;
        document.querySelector('.gameplay p:nth-child(3)').innerText = 'Du gewinnst diese Runde!';
    } else if (result === 'computer') {
        computerScore++;
        document.querySelector('.gameplay p:nth-child(3)').innerText = 'Computer gewinnt diese Runde!';
    } else {
        document.querySelector('.gameplay p:nth-child(3)').innerText = 'Unentschieden!';
    }

    updateScore();

    if (--roundsToPlay <= 0) {
        declareWinner();
    }
}

function getWinner(player, computer) {
    if (player === computer) return 'unentschieden';


    const winningCombinations = {
        'Schere': ['Papier', 'Echse'],
        'Stein': ['Schere', 'Echse'],
        'Papier': ['Stein', 'Spock'],
        'Echse': ['Papier', 'Spock'],
        'Spock': ['Schere', 'Stein']
    };

    return winningCombinations[player].includes(computer) ? 'player' : 'computer';
}

function updateScore() {
    document.querySelector('.points').innerText = `Spielstand ${playerScore} : ${computerScore}`;
}

function declareWinner() {
    let winnerMessage;
    if (playerScore > computerScore) {
        winnerMessage = 'Du hast das Spiel gewonnen!';
    } else if (playerScore < computerScore) {
        winnerMessage = 'Der Computer hat das Spiel gewonnen!';
    } else {
        winnerMessage = 'Das Spiel endet unentschieden!';
    }
    document.getElementById('text-content').innerText = winnerMessage;
}

