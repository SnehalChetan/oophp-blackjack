<?php
declare(strict_types=1);

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
            <?php
                if(!isset($_SESSION['blackJack'])){
                    session_start();
                    $_SESSION['blackJack'] = new Blackjack();
                    $blackJack = $_SESSION['blackJack'];

                }
                    


            $player = $blackJack->getPlayer();
            $dealer = $blackJack->getDealer();
            $deck = $blackJack->getDeck();

            if(isset($_POST['hit'])){
                $player->hit($deck);
                if($player->hasLost() == true){
                    echo "the player loses the game";
                }
            }
            if(isset($_POST['stand'])){
                $dealer->hit($deck);
                if($dealer->hasLost() == true){
                    echo "the player wins the game";
                }
            }
            if(isset($_POST['surrender'])){
                $player->hasLost();
                echo "dealer wins";
            }

            $_SESSION['playerScore'] = $player->getScore();
            $_SESSION['DealerScore'] = $dealer->getScore();
            $_SESSION['score'] = $_SESSION['blackJack']->getPlayer()->getScore();
            $_SESSION['showDealerCards'] = false;

        ?> 
<div class="row">
    <div class="col">
    <p> Dealer Cards </p>
    <div class="cols dealerCards" style="font-size: 180pt;display:inline-block;">
        <?php
        if ($_SESSION['showDealerCards']) {
            foreach ($_SESSION['blackJack']->getDealer()->getCards() as $card) {
                echo ' <div class="playerCards" style="font-size: 180pt;display:inline-block;">';
                echo $card->getUnicodeCharacter(true);
                echo '</div>';
            }
        } else {
            for ($i = 0; $i < count($_SESSION['blackJack']->getDealer()->getCards()); $i++) {
                echo ' <div class="playerCards" style="font-size: 180pt;display:inline-block;">';
                echo '&#127136;';
                echo '</div>';
                
            }
        }
        ?>
    </div>
    </div>
    <div class="col">
      Score Board
    </div>
    <div class="col">
    <?php
        foreach ($_SESSION['blackJack']->getPlayer()->getCards() as $card) {
            echo ' <div class="playerCards" style="font-size: 180pt;display:inline-block;">';
            echo $card->getUnicodeCharacter(true);
            echo '</div>';
        } ?>
    </div>
  </div>
  

</div>
        <div class="playerAction text-center m-5">
            <form method="post" action="<?=htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <input type="submit" value="Hit" name="hit" class="btn border-warning"></input>
                <input type="submit" value="Stand" name ="stand" class="btn border-success"></input>
                <input type="submit" value="Surrender" name="surrender"class="btn border-danger"></input>
                <button type="submit" name="Reset" class="btn border-primary">Restart</button>

            </form>
        </div>
    </div>
</body>
</html>