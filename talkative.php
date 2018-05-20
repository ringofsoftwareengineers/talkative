<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        ini_set('memory_limit', '-1');  /// no limit on maximun usage of RAM for this script
//        $str="Hello world & good morning. The date is 18/05/2016";
        $str1 = file_get_contents("bible.txt");
        $str = preg_replace("/[\r\n.(){}]+/", " ", $str1); // removing line breaks, periods and brackets.
        //getting all words in an array
        $words = explode(" ", $str);
        //counting words present in array
        $word_count = count($words);

        $total_length = 0; // total length of all words present in array
        //getting all words in array one by one and adding up their length.
        $length_array = array();
        foreach ($words as $word) {
            $length = strlen($word);
            $total_length += $length;



            if (isset($length_array[$length])) {
                $frequency = $length_array[$length];
                $frequency++;
                $length_array[$length] = $frequency;
            } else {
                if ($length > 0) {
                    $length_array[$length] = 1;
                }
            }
        }
        ksort($length_array); // sorting length frequency array by frequency of words in ascending order
        $average_length = 0;  // variable to hold average length of word

        //avoid division by zero
        if ($word_count > 0) {
            // calculation of average lenght of words
            $average_length = $total_length / $word_count;
        }

        //rounding the resulting average up to two decimal places.
        $average_length = round($average_length, 2);



        $max_length_array = array();
        echo '<br> Word count: ' . count($words) . '<br>';
        echo "<br> Average word length: $average_length <br>";

        foreach ($length_array as $key => $value) {

            echo "<br> Lenght $key : Freuency $value<br>";
        }

        asort($length_array);
       
        $highiest_frequency = end($length_array);
        $most_frequent_length = key($length_array);
        echo '<br> Most Frequent Word length: ' . $most_frequent_length;
        echo '<br> Frequency of most frequent word length: ' . $highiest_frequency;

        ?>
    </body>
</html>
