<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
    <?php
    echo "<!-- This is a comment written in PHP -->";
    // $n = 20943;
    // $n = number_format($n,2); 
    // echo "<div>$n</div>";
    
    // $n = rand(5,15);   
    // echo $n  . "<br><br>";
    
    // $n = "hElLo WoRlD!";
    // echo strtoupper($n)  .  "<br><br>";
    echo "number odd/even";
    
    $total = 0;
    $avg = 0;
    for($i=0; $i<9; $i++)
    {
        $randNum = rand(1, 1000);
        echo "<br></br>";
        echo $randNum . "           ";
        
        if($randNum % 2 == 0)
        {
            echo "even";
        }
        else if($randNum % 2 == 1){
            echo "odd";
        }
        //$total .= $randNum;
    }
    $avg = $total/9;
    echo "SUM: " . $total;
    echo "AVG: " . $avg;
    ?>
    </body>
</html>
