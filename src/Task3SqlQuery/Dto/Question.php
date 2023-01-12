<?php

namespace Task\Task2Refactoring\Dto;

readonly class Question
{
    public function __construct(
        public int $id,
        public string $question,
        public int $catalogId,
        public int $userId,
    ) {
    }
}
