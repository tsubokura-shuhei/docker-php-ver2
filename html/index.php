<!-- https://www.youtube.com/watch?v=3QxtIrakwKk 19:30 -->
<?php


if(!empty($_POST["submitButton"])){
    echo $_POST["username"];
    echo $_POST["comment"];
}

function connect_db(){

    $host = "mysql_container";
    $db = "test";
    $charset = "utf8";
    $dsn = "mysql:host=$host; dbname=$db; charset=$charset";

    $user = "test";
    $pass = "test";

    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try{
        //DB接続
        $pdo = new PDO($dsn, $user, $pass, $options);
        echo "接続成功";
    }catch(PDOException $e){
        echo $e->getMessage();
        echo "接続失敗";
    }


    return $pdo;

}

$pdo = connect_db();


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./stle.css">
    <title>test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <h1 class="title">PHPで掲示板アプリ</h1>
    <hr>
    <div class="boardWrapper">
        <section>
            <article>
                <div class="wrapper">
                    <div class="nameArea">
                        <span>名前:</span>
                        <p class="username">tsubokura</p>
                        <time>:2024/01/10</time>
                    </div>
                    <p class="comment">テストテストテストテスト</p>
                </div>
            </article>
        </section>

        <form method="POST" action="" class="formWrapper">
            <div>
                <input type="submit" value="書き込む" name="submitButton">
                <label for="usernameLabel">名前：</label>
                <input type="text" name="username">
            </div>
            <div>
                <textarea name="comment" class="commentTextArea" ></textarea>
            </div>
        </form>
    </div>

</body>
</html>