<?php 
//Reevo Test
//Simple Calculator in CLI

class Calculator{

   public function run(){
      $result = 0;

      //get option from menu
      $option = $this->menu();
      
      if ($option == 1) {

         $numbers = $this->getNumbers(2);
         $result = $this->sum($numbers[0], $numbers[1]);

      } elseif ($option == 2){

         $numbers = $this->getNumbers(2);
         $result = $this->min($numbers[0], $numbers[1]);

      }elseif ($option == 3){

         $numbers = $this->getNumbers(2);
         $result = $this->multiply($numbers[0], $numbers[1]);
         
      }elseif ($option == 4){

         $numbers = $this->getNumbers(2);
         $result = $this->difference($numbers[0], $numbers[1]);
         
      } elseif ($option == 5 ) {

         $number = $this->getNumbers(1);
         $result = $this->square($number[0]);

      } elseif ($option == 6) {

         exit;

      } else {
         //if was selected wrog option, restart calculator
         
         echo "\n" . '|---->wrong option!!!' . "\n";
         $this->run();

      }

      // write result and start again 
      echo "|---->Operation result is: $result"."\n";
      $this->run();

   }

   public function menu(){

      echo "|--Menu--| ". "\n";
      echo "| 1. + ". "\n";
      echo "| 2. - ". "\n";
      echo "| 3. x ". "\n";
      echo "| 4. % ". "\n";
      echo "| 5. Square ". "\n";
      echo "| 6. Exit ". "\n";
      echo "|--------------| ". "\n";

      fwrite(STDOUT," Operation: ");
      $option = trim(fgets(STDIN));

      return $option;

   }

   public function sum($first = 0, $second = 0) : float {
      return $first + $second;
   }

   public function min($first = 0, $second = 0) : float{
      return $first - $second;
   }

   public function multiply($first = 0, $second = 0) : float{
      return $first * $second;
   }

   public function difference($first = 0, $second = 0) : float{
      return round($first / $second, 2);
   }

   public function square($first = 0) : float {
      return round(sqrt($first), 2);
   }

   public function getNumbers($numbers = 0): array {
      $result = [];

      if ($numbers > 0) {
         for ($i = 1; $i <= $numbers; $i++) {
            $nr = $this->enterNumber($i);
            array_push($result, $nr);
         }

         return $result;

      } else {
         return $result;
      }
   }

   public function enterNumber($number = 0) {
      $nr = '';

      while(!is_numeric($nr)){
         fwrite(STDOUT, "|---->enter number " . $number ." : ");
         $nr = trim(fgets(STDIN));
      }

      return $nr;

   }

}

   $obj = new Calculator();
   $hero = $obj->run();

?>
