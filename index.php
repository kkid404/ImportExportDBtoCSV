<?php
namespace TestTask\Models;

use Exception;

require_once "config.php";
session_start();
$_SESSION["user_id"] = 1;
$db = new ConnectSql("localhost", "root", "", "test");

$reader = new UpdateSql();
// $reader->exportCsv($db); // функция экспорта

$work = false;
if(!empty($_POST["csv"])){
    $work = true;
    try{
        $res = $reader->importCsv($_POST["csv"], $db, $_SESSION["user_id"]);

    } catch(Exception $e) {
        echo $e;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="main">
        <div class="input__csv">
            <form action="./index.php" class="import_form" method="post">
                <label class="label_import csv_import" for="csv">Importer CSV to Database</label>
                <input  class="input_import btn_import btn_color csv_import custom_file_input" name="csv" type="file">
                <button class="btn_import btn_color csv_import" type="submit">import</button>
                <?if($work) :?>
                    <p class="text_import">Добавлено: <?=$res["add"]?>/ Обновлено: <?=$res["update"]?></p>
                <?endif?>
            </form>
        </div>
    </div>
</body>
</html>