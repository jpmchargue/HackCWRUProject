<?php
  //$userCode = fopen("UserStockCode.txt", "r") or die("Unable to open file!");
    /*$tickerArr = explode(" ", $_POST['tickerArr']);
    $currentTickerFile = "";
    $tickersArray = [];
    for( $i = 0; $i < sizeOf($tickerArr); $i++){
        $currentTickerFile = fopen("{$tickerArr[$i]}.csv", r);
        while( ($tickerData = fgetcsv($currentTickerFile, 1000, ",")) !== FALSE){
            $tickersArray[$i] = $tickerData[4];
        }
        fclose($currentTickerFile);
    }*/
    
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
</div>

</body>
</html>
