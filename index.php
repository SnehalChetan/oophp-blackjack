<?php
declare(strict_types=1);


// if(!isset($_SESSION)){
//     session_start();
// }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A BlackJack Game as part of the BeCode course towards mastering Object Oriented Programming using PHP">
    <title>BlackJack in PHP</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <header class="border-bottom mb-2">
            <h1 class="text-center mt-2">BlackJack in PHP</h1>
        </header>
        <?php
        
require './code/Suit.php';
require './code/Card.php';
require './code/Deck.php';
require './code/Player.php';
require './code/Blackjack.php';
?>
  <div class="cardsDeck">

<?php
            // $deck = new Deck();
            // $deck->shuffle();
            echo "<pre/>";
            var_dump($_SESSION['game']);
            // foreach($deck->getCards() as $showCard) {
            //     echo ' <div class="" style="font-size: 180pt;display:inline-block;">';
            //     echo $showCard->getUnicodeCharacter(true);
            //     echo '</div>';
            // }
        ?>
  </div>
        <div class="playerAction text-center mt-5">
            <form method="post" action="<?=htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <input type="submit" value="hit" name="hit" class="btn border-warning"></input>
                <input type="submit" value="stand" name ="stand" class="btn border-success"></input>
                <input type="submit" value="surrender" name="surrender"class="btn border-danger"></input>
            </form>
        </div>
    </div>
</body>
</html>