<?php
    $tickerArr = explode(" ", "AMZN AAPL"/*$_POST['tickerArr']*/);
    for ($i = 0; $i < count($tickerArr); $i++) {
        if (!file_exists($tickerArr[$i] . "data.csv")) {
            $returned = shell_exec("python3 historic.py " . $tickerArr[$i]);
            //echo $returned;
        } else {
            //echo "The data for " . $tickerArr[$i] . "is already here!<br>";
        }
    }
    $totalNumRows = 0;
    $currentTickerFile = "";
    $tickerClose = [];
    $tickersAllClose = [];
    $balanceFromHolding = [];
    for( $i = 0; $i < sizeOf($tickerArr); $i++){
        $currentTickerFile = fopen("${$tickerArr[$i]}data.csv", 'r');
        $totalNumRows = count(file("${$tickerArr[$i]}data.csv"));
        $count = 0;
        while( ($tickerData = fgetcsv($currentTickerFile, 1000, ",")) !== FALSE){
            $tickerClose[$count] = $tickerData[4];
            $count++;
        }
        //made 2d array of closing for companies in case we want to do smt with it later, as of now it's not really needed.
        $tickersAllClose[$i] = $tickerClose;
        //calculates the balance from holding, stores in 1d array
        $balanceFromHolding[$i] = $tickerClose[$totalNumRows-1] - $tickerClose[1];
        fclose($currentTickerFile);

        //eval("echo 'The first closing price of ".$tickerArr[$i]." is ".strval($tickerClose[1]).".';");
    }
    // evals the code from frontend
    eval($_POST['code'];);
    
    $balanceDiff = [];
    $successNum = 0;
    $successRate = 0.00;
    $mostSuccessfulIndex = PHP_INT_MIN;
    $overallBalance = 0;
    $overallBalanceHolding = 0;
    $overallBalanceDiff = 0.00;
    /*
     for loop that calculates how much of a difference the algorithm made versus just holding, finds overall balance from algorithm, finds overall balance from holding. If the algorithm has a higher end balance, then it counts it as success. Second if statement finds most successful company the algorithm worked on
     */
    for($i = 0; $i < sizeOf($tickerArr); $i++){
        $balanceDiff[$i] = $algBalance[$i] - $balanceHolding[$i]);
        $overallBalance += $algBalance[$i];
        $overallBalanceHolding = $balanceHolding[$i];
        if($balanceDiff[$i] > 0){
            $successNum++;
        }
        if($balanceDiff[$i] > $mostSuccessfulIndex){
            $mostSuccessfulIndex = $balanceDiff[$i];
        }
    }
    //finds success rate of algorithm
    $successRate = round($successNum/sizeOf($tickerArr), 2);
    /*creates a shit ton of info in a string, front end can just add    var str = "<?php echo $str>    to access the String and put it in console*/
    $outputString = "Algorithm Success Rate: ${$successRate}\nNumber of companies tested on: ${sizeOf($ticketArr)}\nEnding balance from algorithm: ${$overallBalance}\nEnding balance from holding: ${$overallBalanceHolding}\nEnding balance difference: ${$overallBalanceDiff}\nMost successful company return: ${$ticketArr[$mostSuccessfulIndex]}, ${$balanceDiff[$mostSuccessfulIndex]}\n";
?>


<!DOCTYPE html>
<head>
    <style>

    .chart {
        border: 1px solid #000;
        height: 150px;
    }
    .blocks {
        height: 80px;
    }
    .codespace {
        border: 1px solid #000;
        height: 200px;
        padding: 10px;
        background: #ccc;
    }
    .console {
        border: 1px solid #000;
        height: 80px;
        padding: 10px;
        background: #222;
        color: #fff;
    }

    </style>

</head>

<body>

    <div class="chart" id="chart">
        chart
    </div>
    <div class="blocks" id="blocks">
        blocks
    </div>
    <div class="codespace" id="codespace">
        code
    </div>
    <div class="console" id="console">
        console
<?php if (isset($_POST['code'])) {
echo eval($_POST['code']);
}
?>

</div>

</body>
</html>
