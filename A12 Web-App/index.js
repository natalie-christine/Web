const questions = [
    {
        question: "Wer ist der Hauself von Harry Potter?",
        answer: "Dobby",
        options: ["Dobby", "Kreacher", "Winky"]
    },
    {
        question: "Welcher Hogwarts-Haus ist Harry zugeteilt?",
        answer: "Gryffindor",
        options: ["Slytherin","Gryffindor", "Ravenclaw"]
    },
    {
        question: "Was ist der Patronus von Severus Snape?",
        answer: "Ein Hirsch",
        options: ["Ein Hirsch", "Eine Schlange", "Ein Fuchs"]
    },

    {
        question: "Was sind die Heiligtümer des Todes?",
        answer: "Zauberstab, Stein, Tarnumhang",
        options: ["Ring, Tarnumhang, Zauberstab","Zauberstab, Stein, Tarnumhang", "Edelstein, Phönixfeder, Feuerkelch" ]
    },
    {
        question: "Welche magische Substanz ist im Kern von Harry Potters Zauberstab?",
        answer: "Phönixfeder",
        options: ["Phönixfeder", "Drachenherzfaser", "Einhornhaar"]
    },

    {
        question: "Was ist das Passwort für den Raum der Wünsche in „Harry Potter und der Halbblutprinz“?",
        answer: "Schweineschnautze",
        options: ["Schweineschnautze", "Süßigkeitenversteck", "Dracheneier"]
    },
    {
        question: "Welches magische Wesen befindet sich in der Kammer des Schreckens?",
        answer: "Basilisk",
        options: ["Dreiköpfiger Hund","Basilisk", "Troll"]
    },
    {
        question: "Wer war der Lehrer für Verteidigung gegen die dunklen Künste im fünftem Jahr?",
        answer: "Dolores Umbridge",
        options: ["Dolores Umbridge", "Severus Snape", "Remus Lupin"]
    },

    {
        question: "Wie heißt der dreiköpfige Hund aus Stein der Weisen?",
        answer: "Fluffy",
        options: ["Seidenschnabel", "Fluffy", "Fang"]
    }

];

const achievements = [
    "1.1.dobby.png",
    "1.2.gryffindor.png",
    "1.3.slytherin.png",
    "1.4.ravenclaw.png",
    "1.5.hufflepuff.png",
    "1.6.mcgonagall.png",
    "1.7.heiligtümer-des-todes.png",
    "1.8.hermine.png",
    "1.9.hogwarts-black.png",
    "firework.webp"
];

let currentQuestionIndex = 0;

const homeScreen = document.getElementById('home-screen');
const quizScreen = document.getElementById('quiz-screen');
const startButton = document.getElementById('start-button');
const questionEl = document.getElementById('question');
const buttons = document.querySelectorAll('.answers button');

startButton.addEventListener('click', () => {
    homeScreen.style.display = 'none';
    quizScreen.style.display = 'block';
    loadQuestion();
});

function loadQuestion() {
    const currentQuestion = questions[currentQuestionIndex];
    questionEl.textContent = currentQuestion.question;
    buttons.forEach((button, index) => {
        button.textContent = currentQuestion.options[index];
    });
}

function checkAnswer(event) {
    const selectedAnswer = event.target.textContent;
    const currentQuestion = questions[currentQuestionIndex];
    if (selectedAnswer === currentQuestion.answer) {
        document.getElementById(`achievement-${currentQuestionIndex + 1}`).src = achievements[currentQuestionIndex];
        currentQuestionIndex++;
        if (currentQuestionIndex < questions.length) {
            loadQuestion();
        } else {
            questionEl.textContent = "Hast du gut gemacht!";

            currentQuestionIndex++;

            document.querySelector('.answers').innerHTML= '<img src="firework.webp" alt="Firework">';
            document.querySelector('.table').style.background= "none";

        }
    } else {
        alert("Falsche Antwort. Versuch es noch einmal!");
    }
}

buttons.forEach(button => button.addEventListener('click', checkAnswer));

function restartGame() {
    location.reload();
}