# oophp-blackjack
A first dive into OOP. Make a game in PHP: Blackjack! 

# Blackjack Rules
Cards are between 1-11 points.
Faces are worth 10
Ace is always worth 11
Getting more than 21 points, means that you lose.
To win, you need to have more points than the dealer, but not more than 21.
The dealer is obligated to keep taking cards until they have at least 15 points.
We are not playing with blackjack rules on the first turn (having 21 on first turn) - we leave this up to you as a nice to have.

# Flow
A new deck is shuffled
Player and dealer get 2 random cards
Dealer shows first card he drew to player
Player either keeps getting hit (asks for more cards), or stands down.
If the player at any point goes above 21, he automatically loses.
Once the player is done the dealer keeps taking cards until he has at least 15 points. If he hits above 21 he automatically loses.
At the end display the winner

#### Creating the base classes
[x] Create a class called `Player` in the file `Player.php`.
[x]Add 2 private properties:
    - `cards` (array)
    - `lost` (bool, default = false)
[x] Add a couple of empty public methods to this class: 
	- `hit`
	- `surrender`
	- `getScore`
	- `hasLost`
[x] Create a class called `Blackjack` in the file `Blackjack.php`
[x] Add 3 private properties 
    - `player` (Player)
    - `dealer` (Player for now)
    - `deck`  (Deck)
[x] Add the following public methods:
    - `getPlayer` (returns the `player` object)
    - `getDealer` (returns the `dealer` object)
    - `getDeck` (returns the `deck` object)
[x] In the [constructor](https://www.php.net/manual/en/language.oop5.decon.php) do the following:
    - Instantiate the Player class twice, insert it into the `player` property and a `dealer` property.
    - Create a new [`deck` object](code/Deck.php) (code has already been written for you!).
    - Shuffle the cards with `shuffle` method on `deck`.
[x] In the [constructor](https://www.php.net/manual/en/language.oop5.decon.php) of the `Player` class;
    - Make it expect the `Deck` object as a parameter.
    - Pass this `Deck` from the `Blackjack` constructor.
    - Now draw 2 cards for the player. You have to use an existing method for this from the Deck class.
[x] Go back to the `Player` class and add the following logic in your empty methods:
    -[ ] `getScore` loops over all the cards and return the total value of that player.
    -[ ] `hasLost` will return the bool of the lost property.
    -[ ] `hit` should add a card to the player. If this brings him above 21, set `lost` property to `true`. To count his score use the method `getScore` you wrote earlier. This method should expect the `$deck` variable as an argument from outside, to draw the card.
     [ ]  (optional) For bonus points make the number 21 a class constant: this is a [magical value](https://stackoverflow.com/questions/47882/[ ]what-is-a-magic-number-and-why-is-it-bad) we want to avoid.
    -[ ] `surrender` should make you surrender the game. (Dealer wins.)
     [ ]  This sets the property `lost` in the `player` instance to true.
    -[ ] `stand` does not have a method in the player class but will instead call hit on the `dealer` instance. (you have to do nothing here)

#### Creating the index.php  file
[ ] Create an index.php file with the following code:
   -[ ] Require all the files with the classes you already created. Ideally you want a seperate file for each class.
   -[ ] Start the PHP session
   -[ ] If the session does not have a `Blackjack` variable yet: 
        - [ ] Create a new `Blackjack` object.
        - [ ] Put the `Blackjack` object in the session
[ ] Use buttons or links to send to the `index.php` page what the player's action is. (i.e. hit/stand/surrender)
    
#### Take a moment to enjoy the view
Everything from the player is now done! Job well done!

![Don't forget to breathe](resources/breath.jpg)

#### The dealer
So far we are assuming the player and dealer play with the same rules, hence they share a class. There is of course an important difference: the dealer does keep playing with the function `hit` until he has at least 15.

[ ]  To change this behavior, we have are going [extend](https://www.php.net/manual/en/language.oop5.inheritance.php) the `player` class and extend it to a newly created `dealer` class. 

[ ]  Change the `Blackjack` class to create a new `dealer` object instead of a `player` object for the property of the dealer. 

[ ]  Now create a `hit` function that keeps drawing cards until the dealer has at least 15 points. The tricky part is that we also need the `lost` check we already had in the `hit` function of the player. We could just copy the code but duplicated code is never the solution, instead you can use the following code to call the old `hit` function:

```parent::hit();```

#### Final push
All classes are ready, now you just need to write some minimal glue in the `index.php`. The final result should be the following:

[ ]  When you the **hit** button call `hit` on player, then check the lost status of the player.
    You will need to pass a `Deck` variable to this function, you can use the `Blackjack::getDeck()` method for this.
[ ] When you the **stand** button call `hit` on dealer, then check the lost status of the dealer. If he is not lost, compare scores to set the winner (If equal the dealer wins). 
[ ]  **Surrender**: the dealer auto wins.
[ ]  Always display on the page the scores of both players. If you have a winner, display it.
[ ]  End of the game: destroy the current `blackjack` variable so the game restarts.
    
# Nice to have
[ ]  Implement a betting system
    -[ ]  very new player (new session) starts with 100 chips
    -[ ]  fter the player gets his 2 first cards every round ask how much he wants to bet. He needs to bet at least 5 chips. 
     - [ ]  If the player wins the bet he gains double the amount of chips.
[ ]  Implement the blackjack first turn rule: if the player draws 21 the first turn: he directly wins. If the dealer draws 21 the first turn, he wins. If both draw it, it is a tie. 
   [ ]  When you implement both nice to have features, a blackjack means an auto win of 10 chips, a blackjack of the dealer a loss of 5 chips for the player.
    
