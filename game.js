const question = document.querySelector("#question");
const choices = Array.from(document.querySelectorAll(".choice-text"));
const progressText = document.querySelector("#progressText");
const container_choices = document.querySelector("#container_choices");

const scoreText = document.querySelector("#score");
const progressBarFull = document.querySelector("#progressBarFull");

let currentQuestion = {};
let acceptingAnswers = true;
let score = 0;
let questionCounter = 0;
let availableQuestions = [];
let incorrectBool = false;

let questions = [{
        question: 'Qui ont créé ce jeu',
        choice1: 'ABDOU ET SAID',
        choice2: 'OUBEID ET MENDEL',
        choice3: 'BILL GETES ET JACK',
        choice4: 'KAISSANE ET ATTOISSE',
        answer: 4,

    },
    {
        question: "Le prof qui donne trop des conseils en classe",
        choice1: 'OUBEID',
        choice2: 'AVOGADRO',
        choice3: 'NADHOIR',
        choice4: 'CHEHA',
        answer: 4,



    },
    {
        question: "En quelle année est formée le GSBT ?",
        choice1: '1999',
        choice2: '2006',
        choice3: '2002',
        choice4: '2004',
        answer: 3,



    },
    {
        question: "L'enseignant qui raconte des histoires rigolant",
        choice1: 'THE BEST',
        choice2: 'BENDJA',
        choice3: 'PAPA MOUSAANB',
        choice4: 'MOUSTIQUE',
        answer: 4,



    },
    {
        question: "La personne la plus sage de la promotion",
        choice1: 'AICHA MDJASSIRI',
        choice2: 'SALWA',
        choice3: 'ZAMAANA',
        choice4: 'NIWTON',
        answer: 3,



    },
    {
        question: "Le prof qui répète chaque fois \"EH ! EH ! WOUTSI RINDRIDRE\" ",
        choice1: 'ROLLAND',
        choice2: 'FIDJONE',
        choice3: 'NADHOIR',
        choice4: 'Mr BOSS',
        answer: 3,



    },
    {
        question: "Qui a volé le téléphone de NOURA à la mosquée ?",
        choice1: 'BABDOU',
        choice2: 'PAPARAZI',
        choice3: 'SAID',
        choice4: 'GARDIEN',
        answer: 4,



    },
    {
        question: "Le prof qui n'est jamais sorti à l'heure",
        choice1: 'MENDEL',
        choice2: 'ZABRA',
        choice3: 'ABDOULATUF',
        choice4: 'OUBEID',
        answer: 4,



    },
    {
        question: "L'élève le plus vantard de la promotion",
        choice1: 'NAFISSA',
        choice2: 'ATTOISSE',
        choice3: 'YADA MZE',
        choice4: 'NOURA',
        answer: 4,



    },
    {
        question: "Qui a été délégué en classe de seconde",
        choice1: 'ILHAM',
        choice2: 'GOULAM',
        choice3: 'NASSIM',
        choice4: 'PERSONNE',
        answer: 4,



    },
    {
        question: "Le jour de la proclamation du BAC 2019",
        choice1: '03 AOÛT',
        choice2: '26 JUILLET',
        choice3: '8 AOÛT',
        choice4: '30 JUILLET',
        answer: 2,



    },
    {
        question: "Le nombre d'élèves qui ont eu le BAC Blanc 2019 ",
        choice1: '23',
        choice2: '20',
        choice3: '25',
        choice4: '29',
        answer: 3,



    },
    {
        question: "Qui dort trop en classe",
        choice1: 'NITCH',
        choice2: 'DE 12',
        choice3: 'NABIL',
        choice4: 'KAISSANE',
        answer: 4,



    },
    {
        question: "Qui a été frappé en plein exercice au tableau ",
        choice1: 'ILHAM',
        choice2: 'NAZI',
        choice3: 'GOULAM',
        choice4: 'ABDOULHAKIM',
        answer: 3,



    },
    {
        question: "Les trois verbes de DUCOBU",
        choice1: 'Derranger,manger,draguer',
        choice2: 'frapper,danser,dormir',
        choice3: 'manger,dormir,boire',
        choice4: 'insulter,bavarder,rigoler',
        answer: 3,



    }
];
const SCORE_POINTS = 100;
const MAX_QUESTIONS = 15;

startGame = () => {
    questionCounter = 0;
    score = 0;
    availableQuestions = [...questions];
    getNewQuestion()
}
getNewQuestion = () => {
    if (availableQuestions.length === 0 || questionCounter > MAX_QUESTIONS) {
        localStorage.setItem('mostRecentScore', score)
        return window.location.href = 'http://localhost/MILLIONS//end.php';
    }
    questionCounter++;
    progressText.innerHTML = `Question ${questionCounter} sur  ${MAX_QUESTIONS}`
    progressBarFull.style.width = `${(questionCounter/MAX_QUESTIONS)*100}%`
    const questionsIndex = Math.floor(Math.random() * availableQuestions.length);
    currentQuestion = availableQuestions[questionsIndex];
    question.innerText = currentQuestion.question

    choices.forEach(choice => {
        const number = choice.dataset['number']
        choice.innerText = currentQuestion['choice' + number]
    })
    availableQuestions.splice(questionsIndex, 1)
    acceptingAnswers = true;
}

choices.forEach(choice => {
    choice.addEventListener('click', e => {

        if (!acceptingAnswers) return

        acceptingAnswers = false;
        incorrectBool = true;
        const selectedChoice = e.target;
        let _answer = document.querySelector('[data-number="' + currentQuestion.answer + '"]').parentElement;
        const selectedAnswer = selectedChoice.dataset['number'];
        let classToApply = selectedAnswer == currentQuestion.answer ? 'correct' :
            'incorrect'
        let son = new Audio('faux.mp3');
        let audio = new Audio('wow.mp3');

        if (classToApply === 'correct') {
            incrementScore(SCORE_POINTS)
            audio.play();

        } else if (classToApply === 'incorrect' && incorrectBool)

        {
            _answer.classList.add("correct");
            son.play();


        }

        selectedChoice.parentElement.classList.add(classToApply);
        setTimeout(() => {
            selectedChoice.parentElement.classList.remove(classToApply);
            _answer.classList.remove("correct");
            getNewQuestion();

        }, 1000)
    })
})

incrementScore = num => {
    score += num;
    scoreText.innerText = score;
}
startGame();