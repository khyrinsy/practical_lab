<?php
//variable declaration
//string, interger, float, boolean, array

$firstkwh = ""; //string
$secondkwh = "";
$thirdkwh = "";
$fourthkwh = "";
$fifthkwh = "";
$error = "";
$showBill = false; //boolean

//$_POST tarik data direct dari form
//isset check if the button is clicked
if (isset($_POST['calculate'])) {
    //. (titik atau dot) untuk gabungkan string, dengan PHP dan HTML
    //echo (print output / paparkan data)
    // echo "<p>The input for the first kwh is " . $_POST['first'] . "</p>";
    // echo "<p>The charge for the first kwh is " . $charge1 . "</p>";

    // variable declaration
    $firstkwh = $_POST['first'];
    $secondkwh = $_POST['second'];
    $thirdkwh = $_POST['third'];
    $fourthkwh = $_POST['fourth'];
    $fifthkwh = $_POST['fifth'];


    //first validation
    //will check if the user did not enter any value, if yes, the charge will be 0
    if ($firstkwh == "") {
        $firstkwh = 0;
    }
    if ($secondkwh == "") {
        $secondkwh = 0;
    }
    if ($thirdkwh == "") {
        $thirdkwh = 0;
    }
    if ($fourthkwh == "") {
        $fourthkwh = 0;
    }
    if ($fifthkwh == "") {
        $fifthkwh = 0;
    }

    //second validation
    //will check if the user did not enter any value, if yes, the charge will be 0
    // if ($firstkwh < 0) {
    //     $firstkwh = 0;
    // }
    // if ($secondkwh < 0) {
    //     $secondkwh   = 0;
    // }
    // if ($thirdkwh < 0) {
    //     $thirdkwh = 0;
    // }
    // if ($fourthkwh < 0) {
    //     $fourthkwh = 0;
    // }
    // if ($fifthkwh < 0) {
    //     $fifthkwh = 0;
    // }

    //second validation
    //ni ada error message, user kena enter value yang valid
    if ($firstkwh < 0 || $secondkwh < 0 || $thirdkwh < 0 || $fourthkwh < 0 || $fifthkwh < 0) {
        $error = "Please enter a valid value (0 or more)";
    }


    //validation 3
    //
    else if ($firstkwh > 200) {
        $error = "Please enter a valid value (0-200) for the first kwh";
    }
    if ($secondkwh > 100) {
        $error = "Please enter a valid value (0-100) for the second kwh";
    } else if ($thirdkwh > 300) {
        $error = "Please enter a valid value (0-300) for the third kwh";
    } else if ($fourthkwh > 300) {
        $error = "Please enter a valid value (0-300) for the fourth kwh";
    }

    //validation 4
    //will check if the user did not enter any value, if yes, the charge will be 0
    else if ($firstkwh + $secondkwh + $thirdkwh + $fourthkwh + $fifthkwh == 0) {
        $error = "Please enter a valid value (0 or more) for at least one kwh";
    } else {
    }

    //$charge1 = $_POST['first'] * 0.218;
    $charge1 = $firstkwh * 0.218;
    $charge2 = $secondkwh * 0.344;
    $charge3 = $thirdkwh * 0.516;
    $charge4 = $fourthkwh * 0.546;
    $charge5 = $fifthkwh * 0.571;

    //totl kwh
    $totalkwh = $firstkwh + $secondkwh + $thirdkwh + $fourthkwh + $fifthkwh;
    //total charge
    $totalcharge = $charge1 + $charge2 + $charge3 + $charge4 + $charge5;

    if ($totalcharge < 3) {
        $totalcharge = 3;
    }
    if ($totalkwh > 600) {
        //ini cara lambat
        //6% = 0.06
        //$totalcharge = $totalcharge * 1.06;
        //$totalcharge = $totalcharge + $totalSsst;

        // cara cepat nak kira, just darabkan terus dengan 1.06, akan terus dapat hasil
        $totalcharge = $totalcharge * 1.06;

    }
    $showBill = true;

    //echo "<p>The charge for the first kwh is " . $charge1 . "</p>";
    //echo "<p>The charge for the second kwh is " . $charge2 . "</p>";
    //echo "<p>The charge for the third kwh is " . $charge3 . "</p>";
    //echo "<p>The charge for the fourth kwh is " . $charge4 . "</p>";
    //echo "<p>The charge for the fifth kwh is " . $charge5 . "</p>";

}