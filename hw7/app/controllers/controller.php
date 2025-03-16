<?php

class Controller
{
    public function gettingNote()
    {
        $title = $_POST['title'] ?? null;
        $description = $_POST['description'] ?? null;
        $errors = [];

        if ($title) {
            $title = htmlspecialchars($title);
            if (strlen($title) < 3) {
                $errors['title'] = 'Title should be at least 3 characters.';
            }
        } else {
            $errors['title'] = 'Enter title.';
        }

        if ($description) {
            $description = htmlspecialchars($description);
            if (strlen($description) < 10) {
                $errors['description'] = 'Description should be at least 10 characters.';
            }
        } else {
            $errors['description'] = 'Enter Description.';
        }

        if (count($errors)) {
            header("Location: /public/views/hw7.html?error=" . json_encode($errors));
        } else {
            header("Location: /public/views/hw7.html?success=Note Saved.");
        }
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    (new Controller())->gettingNote();
}

    