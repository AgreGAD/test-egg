<?php

declare(strict_types=1);

namespace Test\Task3SqlQuery;

use PHPUnit\Framework\TestCase;
use mysqli;
use Task\Task3SqlQuery\Query;

final class QueryTest extends TestCase
{
    public function testGetUsersTotals(): void
    {
        $query = new Query($this->createDbConnection());

        $result = $query->getUsersTotals();

        $expectedResult = [
            [
                'name' => 'User 1',
                'phone' => '89830000101',
                'subtotal' => '600.60',
                'average_subtotal' => '200.200000',
                'last_order' => '2023-01-21 10:00:00'
            ],
            [
                'name' => 'User 2',
                'phone' => '89830000202',
                'subtotal' => '304.40',
                'average_subtotal' => '152.200000',
                'last_order' => '2021-10-15 10:00:00'
            ],
        ];

        $this->assertEquals($expectedResult, $result);
    }

    private function createDbConnection(): mysqli
    {
        return new mysqli("127.0.0.1", "root", "1234", "testtask");
    }
}
