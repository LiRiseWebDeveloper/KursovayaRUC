<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
    <?php 
    
      echo '<p>Hello World</p>';

      // 1
      function sumInRange($start, $end) {
        $sum = 0;
        for ($i = $start; $i <= $end; $i++) {
          $sum = $sum + $i;
        }

        //по завершению цикла выводим сумму
        echo "Сумма чисел в диапазоне от " . $start . " до " . $end . " равна " . $sum;
      }

      sumInRange(1, 10);
    ?>
    <br>
    <?
      //2
      function countVowels($str) {
          $glass = ['a', 'i', 'u', 'y', 'e', 'o'];
          $count = 0;

          foreach(str_split($str) as $char) {
              if (in_array(strtolower($char), $glass)) {
                  $count++;
              }
          }

          return $count;
      }

      $inputStr = "anime";
      echo "В слове '$inputStr' : " . countVowels($inputStr) . " гласных<br/>";
    ?>
    <br>
    <?
      //3
      echo "<table border='1'>";

      for ($i = 1; $i <= 5; $i++) {
          echo "<tr>";
          for ($j = 1; $j <= 5; $j++) {
              echo "<td>" . ($i * $j) . "</td>";
          }
          echo "</tr>";
      }

      echo "</table>";
    ?>
    <br>
    <?
     // 4
    function reverseWords($str) {
      $words = explode(' ', $str); //разбиваем строку массив слов, разделенных пробелом
      $arr = array_reverse($words); //изменяем порядок слов в массиве на обратный
      $reversed_string = implode(' ', $arr); //объединяем массив из слов в строку с пробелом между словами
      echo $reversed_string;
    }

    echo reverseWords('Hello World');
    ?>
    <br>
    <?
      // 5
      $arr = array('apple', 'banana', 'apple', 'orange', 'banana', 'apple');
      $arr_copy = $arr;
      function countOccurrences($arr) {
        $arrCount = array_count_values($arr);
        foreach ($arrCount as $key => $value) {
          echo $key . ' => ' . $value . '<br>';
        }
      }

      countOccurrences($arr);

      //print_r(countOccurrences($arr));
    ?>
    <br>
    <?
    
      // 6
      function len($str) {
        return mb_strlen($str);
      }

      print_r(len('Привет'));
    ?>

</html>