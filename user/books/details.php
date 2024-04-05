<?php
session_start();
$welcome = '';
$log = '';
if ($_SESSION['id']) {

    $welcome .= ' <p class="logy"> Welcome ' . $_SESSION['name'] . '</p>';
    $log .= ' <button class="btn btn-outline-success"><a href="../../logout.php">Logout </a></button>';
} else {

    header("Location:../../index.php");


    exit;
}

// Connect to DB
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'jumia';
$conn = mysqli_connect($server, $user, $pass, $db);

///select the book 
//edit.php?id=1 => $_GET['id']
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$select = "SELECT * FROM `books` WHERE `books`. `bookId`=" . $id . " LIMIT 1";
$result = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($result);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style1.css">

    <style>
        /* body {
            background-color: #2c3034;
        } */
        img {
            height: 400px;
            width: 300px;
            margin-left: 50px;
            margin-top: 70px;
        }

        .container {
            margin: 50px;
        }

        .title {
            font-weight: bold;
            font-size: 60px;
            font-family: 'Times New Roman', Times, serif;
        }

        .col-sm-8 {
            font-family: "Merriweather", "Georgia", serif;
        }

        .author {
            font-size: 20px;
            margin-left: 5px;
        }

        .date {
            font-size: 20px;
            margin-top: 10px;
        }

        .info {
            font-size: 20px;
            margin-top: 20px;
        }
    </style>

    <title>Details</title>
</head>

<body>

    <div class="container text-center">
        <div class="row">

            <div class="col-sm-4">
                <img src="../../uploads/<?= $row['bookImg'] ?>" />
            </div>

            <div class="col-sm-8">

                <div class="row title">
                    <?= $row['bookTitle']  ?>
                </div>

                <div class="row author">
                    by <?= $row['Author']  ?>
                </div>
                <div class="row date">
                    Submission Date : <?= $row['submissionDate']  ?>
                </div>
                <div class="row info">
                    <?= $row['bookInfo']  ?>
                </div>
            </div>

        </div>
    </div>





    <script src="../../js/jquery-3.6.1.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

</body>

</html>