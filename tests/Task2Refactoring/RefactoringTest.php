<?php

declare(strict_types=1);

namespace Test\Task2Refactoring;

use PHPUnit\Framework\TestCase;
use Task\Task2Refactoring\CodeBefore;
use mysqli;
use Task\Task2Refactoring\CodeAfter;
use Task\Task2Refactoring\UserQuestionRecordToDtoMapper;

final class RefactoringTest extends TestCase
{
    public function testRefactoring(): void
    {
        $codeBefore = new CodeBefore();
        $codeAfter = new CodeAfter(
            $this->createDbConnection(),
            new UserQuestionRecordToDtoMapper(),
        );
        $catalogId = 1;

        $expected = $codeBefore->runQuery(
            $this->createDbConnection(),
            $catalogId
        );
        $result = $codeAfter->findUserQuestions($catalogId);

        $resultAsArray = [];
        foreach ($result as $userQuestion) {
            $resultAsArray[] = [
                'user' => [
                    'name' => $userQuestion->user->name,
                    'gender' => $userQuestion->user->gender->value,
                ],
                'question' => [
                    'id' => $userQuestion->question->id,
                    'question' => $userQuestion->question->question,
                    'catalog_id' => $userQuestion->question->catalogId,
                    'user_id' => $userQuestion->question->userId,
                ]
            ];
        }

        $this->assertEquals($expected, $resultAsArray);
    }

    private function createDbConnection(): mysqli
    {
        return new mysqli("127.0.0.1", "root", "1234", "testtask");
    }
}
