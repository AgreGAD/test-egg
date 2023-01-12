<?php

namespace Task\Task2Refactoring\Dto;

readonly class UserQuestion
{
    public function __construct(
        public Question $question,
        public User $user,
    ) {
    }
}
