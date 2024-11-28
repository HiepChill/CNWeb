<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập trắc nghiệm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Bài tập trắc nghiệm</h1>
        <form action="process.php" method="post">
            <?php
            $filename = "data/Quiz.txt";
            $questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            $current_question = [];
            $number = 0;

            foreach ($questions as $line) {
                if (strpos($line, "ANSWER:") === 0) {
                    // Hiển thị câu hỏi
                    echo "<div class='card mb-4'>";
                    echo "<div class='card-header'><strong>{$current_question[0]}</strong></div>";
                    echo "<div class='card-body'>";
                    for ($i = 1; $i <= 4; $i++) {
                        $answer = substr($current_question[$i], 0, 1); // A, B, C, D
                        echo "<div class='form-check'>";
                        echo "<input class='form-check-input' type='radio' name='question{$number}' value='{$answer}' id='question{$number}{$answer}'>";
                        echo "<label class='form-check-label' for='question{$number}{$answer}'>{$current_question[$i]}</label>";
                        echo "</div>";
                    }
                    echo "</div>";
                    echo "</div>";
                    $number++;
                    $current_question = [];
                } else {
                    $current_question[] = $line;
                }
            }
            ?>
            <button type="submit" class="btn btn-primary">Nộp bài</button>
        </form>
    </div>
</body>

</html>