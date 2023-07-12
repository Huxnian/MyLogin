<?php
 session_start();
 if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != true){
    header("location: Log-in.php");
 }




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Document</title>
    <style>

#board {
    display: flex;
    flex-wrap: wrap;
    width: 300px;
    height: 300px;
    margin: 0 auto;
    margin-top: 20px;
    border: 1px solid black;
    font-size: 50px;
  }
  
  .square {
    width: 99.5px;
    height: 99.7px;
    border: 1px solid black;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
  }
  
  .square:hover {
    background-color: lightgray;
  }
  
  #turn {
    text-align: center;
  }
  
  #reset {
    display: block;
    margin: 0 auto;
    margin-top: 10px;
  }
  
    </style>
</head>
<body>
<?php require "Partials/Nav.php"?>
<div id="board">
        <div class="square" id="0"></div>
        <div class="square" id="1"></div>
        <div class="square" id="2"></div>
        <div class="square" id="3"></div>
        <div class="square" id="4"></div>
        <div class="square" id="5"></div>
        <div class="square" id="6"></div>
        <div class="square" id="7"></div>
        <div class="square" id="8"></div>
      </div>
      <p id="turn">Player X's turn</p>
      <button id="reset">Reset</button>



      <script>
const board = document.getElementById('board');
const squares = document.querySelectorAll('.square');
const turnDisplay = document.getElementById('turn');
const resetButton = document.getElementById('reset');
let turn = 'X';
let gameEnded = false;

function handleSquareClick(e) {
  if (gameEnded) return;
  if (e.target.textContent) return;

  e.target.textContent = turn;
  checkForWin();
  turn = turn === 'X' ? 'O' : 'X';
  turnDisplay.textContent = `Player ${turn}'s turn`;
}

function checkForWin() {
  const winConditions = [
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [2, 4, 6]
  ];

  for (let i = 0; i < winConditions.length; i++) {
    const [a, b, c] = winConditions[i];
    if (
      squares[a].textContent &&
      squares[a].textContent === squares[b].textContent &&
      squares[b].textContent === squares[c].textContent
    ) {
      gameEnded = true;
      turnDisplay.textContent = `Player ${turn} wins!`;
      return;
    }
  }

  const allSquaresFilled = Array.from(squares).every(square => square.textContent);
  if (allSquaresFilled) {
    gameEnded = true;
    turnDisplay.textContent = 'Tie game!';
  }
}

function handleResetClick() {
  gameEnded = false;
  turn = 'X';
  turnDisplay.textContent = `Player ${turn}'s turn`;
  squares.forEach(square => square.textContent = '');
}

squares.forEach(square => square.addEventListener('click', handleSquareClick));
resetButton.addEventListener('click', handleResetClick);



      </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> 
</body>
</html>