<?php

declare(strict_types=1);

namespace Task\Task2Refactoring;

use mysqli;

class CodeBefore
{
    public function runQuery(mysqli $mysqli, int $catId): array
    {
        $questionsQ = $mysqli->query('SELECT * FROM questions WHERE catalog_id=' . $catId);
        $result = array();
        while ($question = $questionsQ->fetch_assoc()) {
            $userQ = $mysqli->query('SELECT name, gender FROM users WHERE id=' . $question['user_id']);
            $user = $userQ->fetch_assoc();
            $result[] = array('question' => $question, 'user' => $user);
            $userQ->free();
        }
        $questionsQ->free();

        return $result;
    }
}