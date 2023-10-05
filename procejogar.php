<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["resposta"])) {
        $userAnswer = $_POST["resposta"];
        $correctAnswer = $row["resultado"];

        if ($userAnswer == $correctAnswer) {
            header("Location: index.php?correct=true");
            exit();
        } else {
            header("Location: index.php?correct=false&correctAnswer=$correctAnswer");
            exit();
        }
    } else {
        header("Location: index.php?noAnswer=true");
        exit();
    }
}
?>
