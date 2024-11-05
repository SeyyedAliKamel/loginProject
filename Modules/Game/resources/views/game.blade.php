@extends('layouts.app')

@section('content')
    <style>
        .main {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
            background-color: #f8fafc;
        }

        #game-container {
            position: relative;
            width: 400px;
            height: 400px;
            border: 2px solid #333;
            background-color: #fff;
        }

        #box {
            position: absolute;
            width: 50px;
            height: 50px;
            background-color: #3498db;
            border-radius: 5px;
            cursor: pointer;
        }

        #score {
            margin-top: 20px;
            font-size: 20px;
            color: #333;
            padding-left: 2rem;
            padding-right: 2rem;
        }

        #start-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #2ecc71;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        #start-btn:disabled {
            background-color: #95a5a6;
        }
    </style>

    <div class="main">
        <div id="game-container">
            <div id="box"></div>
        </div>
    </div>
    <div id="score" class="text-center">Score: 0</div>
    <div class="text-center">
        <button id="start-btn">Start Game</button>
    </div>

    <script>
        const box = document.getElementById('box');
        const gameContainer = document.getElementById('game-container');
        const scoreDisplay = document.getElementById('score');
        const startBtn = document.getElementById('start-btn');

        let score = 0;
        let gameDuration = 20000; // Time
        let gameStarted = false;
        let gameTimeout;

        function randomPosition() {
            const containerWidth = gameContainer.clientWidth;
            const containerHeight = gameContainer.clientHeight;

            const randomX = Math.floor(Math.random() * (containerWidth - box.offsetWidth));
            const randomY = Math.floor(Math.random() * (containerHeight - box.offsetHeight));

            box.style.left = `${randomX}px`;
            box.style.top = `${randomY}px`;
        }

        function startGame() {
            if (!gameStarted) {
                score = 0;
                scoreDisplay.textContent = `Score: ${score}`;
                startBtn.disabled = true;
                gameStarted = true;

                randomPosition();
                box.addEventListener('click', increaseScore);

                gameTimeout = setTimeout(() => {
                    endGame();
                }, gameDuration);
            }
        }

        function increaseScore() {
            score++;
            scoreDisplay.textContent = `Score: ${score}`;
            randomPosition();
        }

        function endGame() {
            clearTimeout(gameTimeout);
            box.removeEventListener('click', increaseScore);
            startBtn.disabled = false;
            gameStarted = false;
            alert(`Game over! Your score: ${score}`);
        }

        startBtn.addEventListener('click', startGame);
    </script>
@endsection

@section('footer')
    <x-test />
@endsection
