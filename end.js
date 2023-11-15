const username= document.querySelector('#username')
const saveScoreBtn= document.querySelector('#saveScoreBtn')
const finalScore = document.getElementById('finalScore')
console.log(finalScore)
const mostRecentScore= localStorage.getItem('mostRecentScore')
const highScores = JSON.parse(localStorage.getItem('highScores')) || []
const MAX_HIGH_SCORES = 100
finalScore.innerText = mostRecentScore

