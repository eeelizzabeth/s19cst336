// JavaScript File
$("document").ready(function() {

    var randomNumber = 5 + 6;
    console.log(randomNumber);
    
    randomNumber = Math.floor(Math.random() * 99) + 1;
    console.log(randomNumber);
    
    var guesses = document.querySelector('#guesses');
    var lastResult = document.querySelector('#lastResult');
    var lowOrHi = document.querySelector('#lowOrHi');
    
    var guessSubmit = document.querySelector('.guessSubmit');
    var guessField = document.querySelector('.guessField');
    
    var guessCount = 1;
    var resetButton = document.querySelector('#reset');
    resetButton.style.display = 'none';
    
    var gW = 0;
    var gL = 0;
    
    var gameWon = document.querySelector('#gameWon');
    //var gameLost = document.querySelector('#gameLost');
    
    guessField.focus();
    
    function checkGuess() {
        var userGuess = Number(guessField.value);
            if(guessCount === 1) {
                guesses.innerHTML = 'Previous guesses: ';
            }
            console.log(guessCount);
            guesses.innerHTML += userGuess + ' ';
            if(userGuess < 1 || userGuess > 99 || isNaN(userGuess)) {
                $("document").ready(function() {
                    $('#lastResult').html("Wrong!");
                    $('#lastResult').css("backgroundColor", "red");
                })
                guessCount--;
            }
            else if(userGuess === randomNumber ) {
                gW++;
                    $("h1:first").html("Yay! You did it!");
                    $("#lastResult").html('Congratulations! You got it right!');
                    $("#lastResult").css("backgroundColor", "green");
                    $("#gameWon").html("Won: " + gW + " Lost: " + gL);
            
                
                lowOrHi.innerHTML = '';
                setGameOver();
            }else if(guessCount === 7) {
                gL++;
                lastResult.innerHTML = 'Sorry, you lost!';
                setGameOver();
                console.log("test");
                $('#gameWon').html("Won: " + gW + " Lost: " + gL);
                
                
            }else{ 
                lastResult.innerHTML = 'Wrong!';
                lastResult.style.backgroundColor = 'red';
                if(userGuess < randomNumber)
                {
                    lowOrHi.innerHTML = 'Last guess was too low!';
                }else if(userGuess > randomNumber)
                {
                    lowOrHi.innerHTML = 'Last guess was too high!';
                }
            }
            guessCount++;
            console.log(guessCount);
            guessField.value = '';
            guessField.focus();
    
    }
    guessSubmit.addEventListener('click', checkGuess);
    function setGameOver() {
        guessField.disabled = true;
        guessSubmit.disabled = true;
        resetButton.style.display = 'inline';
        resetButton.addEventListener('click', resetGame);
    }
    function resetGame() {
        guessCount = 1;
        var resetParas = document.querySelectorAll('.resultParas p');
        for(var i = 0; i < resetParas.length; i++)
        {
            resetParas[i].textContent = '';
        }
        resetButton.style.display = 'none';
                    
        guessField.disabled = false;
        guessSubmit.disabled = false;
        guessField.value = '';
        guessField.focus();
        
        lastResult.style.backgroundColor = 'white';
                    
        randomNumber = Math.floor(Math.random() * 99) + 1;
            console.log(randomNumber);

        //gW = 0;
        //gL = 0;
            $("h1:first").html("Guess a Number");
            $('#gameWon').html("Won: " + gW + " Lost: " + gL);
        
    }
})