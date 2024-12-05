<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snake Game</title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
        }

        canvas {
            background-color: #f4f4f4;
            border: 1px solid black;
        }

        #score {
            font-size: 24px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Snake Game</h1>
    <canvas id="gameCanvas" width="400" height="400"></canvas>
    <div id="score">Score: 0</div>
    
    <script>
        // Snake Game JavaScript
        const canvas = document.getElementById('gameCanvas');
        const ctx = canvas.getContext('2d');

        const grid = 20;
        const count = canvas.width / grid;
        let score = 0;

        // Snake and food data
        let snake = [{x: 9 * grid, y: 9 * grid}];
        let food = {x: 5 * grid, y: 5 * grid};

        let dx = grid;
        let dy = 0;

        // Handling keyboard input
        document.addEventListener("keydown", changeDirection);

        function gameLoop() {
            setTimeout(function() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                moveSnake();
                checkCollision();
                drawFood();
                drawSnake();
                gameLoop();
            }, 100);
        }

        function moveSnake() {
            const head = {x: snake[0].x + dx, y: snake[0].y + dy};
            snake.unshift(head);

            if (head.x === food.x && head.y === food.y) {
                score++;
                document.getElementById('score').innerText = "Score: " + score;
                generateFood();
            } else {
                snake.pop();
            }
        }

        function changeDirection(event) {
            if (event.keyCode === 37 && dx === 0) {
                dx = -grid;
                dy = 0;
            } else if (event.keyCode === 38 && dy === 0) {
                dx = 0;
                dy = -grid;
            } else if (event.keyCode === 39 && dx === 0) {
                dx = grid;
                dy = 0;
            } else if (event.keyCode === 40 && dy === 0) {
                dx = 0;
                dy = grid;
            }
        }

        function checkCollision() {
            const head = snake[0];
            if (head.x < 0 || head.y < 0 || head.x >= canvas.width || head.y >= canvas.height || isCollidingWithSnake(head)) {
                alert("Game Over! Your score was: " + score);
                resetGame();
            }
        }

        function isCollidingWithSnake(head) {
            for (let i = 1; i < snake.length; i++) {
                if (snake[i].x === head.x && snake[i].y === head.y) {
                    return true;
                }
            }
            return false;
        }

        function generateFood() {
            food.x = Math.floor(Math.random() * count) * grid;
            food.y = Math.floor(Math.random() * count) * grid;
        }

        function drawSnake() {
            snake.forEach(function(segment) {
                ctx.fillStyle = 'green';
                ctx.fillRect(segment.x, segment.y, grid, grid);
            });
        }

        function drawFood() {
            ctx.fillStyle = 'red';
            ctx.fillRect(food.x, food.y, grid, grid);
        }

        function resetGame() {
            score = 0;
            snake = [{x: 9 * grid, y: 9 * grid}];
            dx = grid;
            dy = 0;
            document.getElementById('score').innerText = "Score: 0";
            generateFood();
            gameLoop();
        }

        gameLoop();  // Start the game
    </script>
</body>
</html>
