<?php

declare(strict_types=1);

namespace Test\Task1BadMethod;

use PHPUnit\Framework\TestCase;
use Task\Task1BadMethod\BadMethod;

final class BadClassTest extends TestCase
{
    public function testBadMethod(): void
    {
        $testTask = new BadMethod();

        $_GET['id'] = 1;

        $result = $testTask->badMethod();

        $this->assertArrayHasKey('id', $result);
        $this->assertArrayHasKey('name', $result);
        $this->assertArrayHasKey('phone', $result);
        $this->assertArrayHasKey('email', $result);
        $this->assertArrayHasKey('created', $result);
    }
}
