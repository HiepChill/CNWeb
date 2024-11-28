<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Kết quả bài làm</h1>
        <?php
        $filename = "data/Quiz.txt";
        $questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $answers = [];
        foreach ($questions as $line) {
            if (strpos($line, "ANSWER:") !== false) {
                $answers[] = trim(substr($line, strpos($line, ":") + 1));
            }
        }

        $score = 0;
        foreach ($_POST as $key => $userAnswer) {
            $questionNumber = (int)filter_var($key, FILTER_SANITIZE_NUMBER_INT);
            if (isset($answers[$questionNumber]) && $answers[$questionNumber] === $userAnswer) {
                $score++;
            }
        }

        echo "<div class='alert alert-success text-center'>";
        echo "Bạn trả lời đúng <strong>$score</strong>/" . count($answers) . " câu.";
        echo "</div>";
        ?>
        <div class="text-center">
            <a href="index.php" class="btn btn-primary">Làm lại</a>
        </div>
    </div>
</body>

</html>