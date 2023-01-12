<?php

namespace Task\Task2Refactoring\Dto;

readonly class User
{
    public function __construct(
        public string $name,
        public Gender $gender,
    ) {
    }
}
