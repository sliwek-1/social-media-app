const canvas = document.getElementById("board");
const BLOCK_SIZE = 15;
let updateInterval;
let ctx = canvas.getContext("2d");
let velocityX = 0;
let velocityY = 0;
let snakeX, snakeY;
let fruitX, fruitY;
let prevSnakeX, prevSnakeY;
let fruitXrandom = Math.floor(Math.random() * 25);
let fruitYrandom = Math.floor(Math.random() * 25);
let wynik = 0;
let snakeLength = 0;
let snakeTailX = [];
let snakeTailY = [];

// siemka
snakeX = 10 * BLOCK_SIZE;
snakeY = 10 * BLOCK_SIZE;
fruitX = fruitXrandom * BLOCK_SIZE;
fruitY = fruitYrandom * BLOCK_SIZE;


function drawFruit(){
    ctx.fillStyle = "red";
    ctx.fillRect(fruitX,fruitY,15,15)
}

function drawBoard() {
    for(let i = 0;i <= 41; i++){
        for(let j = 0;j <= 41; j++){
            let x = i * BLOCK_SIZE;
            let y = j * BLOCK_SIZE;
            ctx.fillStyle = "black";
            ctx.fillRect(x,y,BLOCK_SIZE,BLOCK_SIZE);
        }
    }
}

function controls(){
    window.addEventListener('keydown', (e) => {
        let currentClickedKey = e.key;
        switch(currentClickedKey){
            case "w":
                velocityX = 0;
                velocityY = -1;
            break;
            case "s":
                velocityX = 0;
                velocityY = 1;
            break;
            case "a":
                velocityX = -1;
                velocityY = 0;
            break;
            case "d":
                velocityX = 1;
                velocityY = 0;
            break;
            default:
                return;
        }
    })
}

function update(){
    prevSnakeX = snakeX
    prevSnakeY = snakeY
    ctx.clearRect(prevSnakeX,prevSnakeY,BLOCK_SIZE,BLOCK_SIZE)
    drawBoard();
    snakeX += velocityX * BLOCK_SIZE;
    snakeY += velocityY * BLOCK_SIZE;
    drawFruit();
    drawSnake(snakeX,snakeY)
    logic()
}

function logic(){
    let result = document.querySelector('.punkty');
    prevFruitX = fruitX
    prevFruitY = fruitY
    if(snakeX == fruitX && snakeY == fruitY){
        wynik += 100;
        snakeLength++;
        result.textContent = wynik;
        ctx.clearRect(fruitX,fruitY, BLOCK_SIZE, BLOCK_SIZE)
        fruitXrandom = Math.floor(Math.random() * 25);
        fruitYrandom = Math.floor(Math.random() * 25);
        fruitX = fruitXrandom * BLOCK_SIZE;
        fruitY = fruitYrandom * BLOCK_SIZE;
    }

    snakeTailX[0] = prevSnakeX;
    snakeTailY[0] = prevSnakeY;
    for(let i = snakeLength;i >= 1;i--){
        snakeTailX[i] = snakeTailX[i-1]
        snakeTailY[i] = snakeTailY[i-1]
        ctx.fillStyle = "green";
        ctx.fillRect(snakeTailX[i],snakeTailY[i],BLOCK_SIZE,BLOCK_SIZE)

        if(snakeX == snakeTailX[i] && snakeY == snakeTailY[i]){
            clearInterval(updateInterval)
            alert("game over")
        }
    }

    if(snakeX == 645 || snakeX == -15 || snakeY == -15 || snakeY == 645){
        clearInterval(updateInterval)
        alert("game over")
    }
}

function drawSnake(snakeX,snakeY){
    ctx.fillStyle = "green";
    ctx.fillRect(snakeX, snakeY, BLOCK_SIZE, BLOCK_SIZE)
}

window.addEventListener('load', () => {
    updateInterval = setInterval(update,50)
    controls()
})