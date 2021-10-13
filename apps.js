var userScore = 0;
var compScore = 0;
const userScore_span = document.getElementById("user-score");
const compScore_span = document.getElementById("computer-score");
const tablica_div = document.querySelector(".tablica");
const rezultat_p = document.querySelector(".rezultat > p");
const rock_div = document.getElementById("rock");
const paper_div = document.getElementById("paper");
const nojica_div = document.getElementById("nojica");

function getCompChoice() {
	const choices = ["rock", "paper", "nojica"];
	const randNum = Math.floor(Math.random() * 3);
	console.log(randNum);
	return choices [randNum];
}

function convertWord (word) {
	if (word === "rock") return "Rock";
	if (word === "paper") return "Paper";
	return "Scissors";
}

function win (user, computer) {
	userScore++;
	userScore_span.innerHTML = userScore;
	compScore_span.innerHTML = compScore;
	rezultat_p.innerHTML = convertWord(user) + " beats " + convertWord(computer) + ". You win!";
}

function lose(user, computer) {
	getOutput();
	compScore = 0;
	userScore = 0;
	userScore_span.innerHTML = userScore;
	compScore_span.innerHTML = compScore;
	rezultat_p.innerHTML = convertWord(user) + " loses to " + convertWord(computer) + ". Game Over!";
}

function draw(user, computer) {

	rezultat_p.innerHTML = convertWord(user) + " equals " + convertWord(computer) + ". It's a draw!";
}

function igra(userChoice) {
	const compChoice = getCompChoice();
	switch (userChoice + compChoice){
		case "rocknojica":
		case "paperrock":
		case "nojicapaper":
			win(userChoice, compChoice);
			break;
		case "rockpaper":
		case "papernojica":
		case "nojicarock":
			lose(userChoice, compChoice);
			break;
		case "rockrock":
		case "paperpaper":
		case "nojicanojica":
			draw(userChoice, compChoice);
			break;
	}
}

function getOutput() {
	jQuery.ajax({
		type: "POST",
		url: 'myAjax.php',
		dataType: 'json',
		data: {functionname: 'gameOver', arguments: [userScore]},

		success: function (obj, textstatus) {
			if( !('error' in obj) ) {
				yourVariable = obj.result;
			}
			else {
				console.log(obj.error);
			}
		}
	});

}


function main() {
	rock_div.addEventListener('click', function() {
		igra("rock");
	})

	paper_div.addEventListener('click', function() {
		igra("paper");
	})

	nojica_div.addEventListener('click', function() {
		igra("nojica");
	})
}

main();