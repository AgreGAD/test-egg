<?php

declare(strict_types=1);

namespace Task\Task2Refactoring;

use mysqli;
use Task\Task2Refactoring\Dto\UserQuestion;

readonly class CodeAfter
{
    public function __construct(
        private mysqli $dbConnection,
        private UserQuestionRecordToDtoMapper $userQuestionRecordToDtoMapper,
    ) {
    }

    /**
     * @return UserQuestion[]
     */
    public function findUserQuestions(int $catalogId): array
    {
        $sql = "
SELECT q.*, u.gender, u.name 
FROM questions q 
JOIN users u ON u.id = q.user_id
WHERE q.catalog_id = ?
    ";

        $stmt = $this->dbConnection->prepare($sql);
        $stmt->bind_param('i', $catalogId);
        $stmt->execute();

        $queryResult = $stmt->get_result();

        $result = [];

        while ($record = $queryResult->fetch_assoc()) {
            $result[] = $this->userQuestionRecordToDtoMapper->map($record);
        }

        $stmt->free_result();

        return $result;
    }
}
