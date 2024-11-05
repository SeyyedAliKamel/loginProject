@extends('layouts.app')

@section('content')

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        #game-container {
            text-align: center;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        #game-container h1 {
            margin-bottom: 20px;
        }

        input[type="number"] {
            width: 15rem;
            padding: 5px;
            font-size: 18px;
            margin-right: 10px;
        }

        #submit-btn {
            padding: 5px 10px;
            font-size: 16px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #submit-btn:hover {
            background-color: #2980b9;
        }

        #message {
            margin-top: 20px;
            font-size: 18px;
            color: #333;
        }
    </style>

    <div id="game-container">
        <h1>Guess the Number</h1>
        <p>I'm thinking of a number between 1 and 100. Can you guess it?</p>
        <input type="number" id="guess-input" min="1" max="100" placeholder="Enter a number">
        <button id="submit-btn">Submit</button>
        <div id="message"></div>
    </div>

    <script>
        const randomNumber = Math.floor(Math.random() * 100) + 1;
        const message = document.getElementById('message');
        const guessInput = document.getElementById('guess-input');
        const submitBtn = document.getElementById('submit-btn');

        submitBtn.addEventListener('click', () => {
            const userGuess = parseInt(guessInput.value);

            if (isNaN(userGuess) || userGuess < 1 || userGuess > 100) {
                message.textContent = 'Please enter a number between 1 and 100.';
                return;
            }

            if (userGuess === randomNumber) {
                message.textContent = `Congratulations! You guessed it right. The number was ${randomNumber}.`;
                message.style.color = 'green';
                guessInput.disabled = true;
                submitBtn.disabled = true;
            } else if (userGuess < randomNumber) {
                message.textContent = 'Too low! Try again.';
                message.style.color = 'red';
            } else {
                message.textContent = 'Too high! Try again.';
                message.style.color = 'red';
            }
        });
    </script>

@endsection
