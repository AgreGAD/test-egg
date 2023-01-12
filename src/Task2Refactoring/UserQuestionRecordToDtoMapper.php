<?php

declare(strict_types=1);

namespace Task\Task2Refactoring;

use Task\Task2Refactoring\Dto\User;
use Task\Task2Refactoring\Dto\Question;
use Task\Task2Refactoring\Dto\UserQuestion;
use Task\Task2Refactoring\Dto\Gender;

class UserQuestionRecordToDtoMapper
{
    /**
     * @param array{
     *     name: string,
     *     gender: string,
     *     id: int,
     *     question: string,
     *     catalog_id: int,
     *     user_id: int
     *     } $record
     */
    public function map(array $record): UserQuestion
    {
        $user = new User(
            $record['name'],
            Gender::from($record['gender'])
        );
        $question = new Question(
            (int)$record['id'],
            $record['question'],
            (int)$record['catalog_id'],
            (int)$record['user_id']
        );

        return new UserQuestion($question, $user);
    }
}