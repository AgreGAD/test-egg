<?php

declare(strict_types=1);

namespace Task\Task3SqlQuery;

use mysqli;

readonly class Query
{
    public function __construct(
        private mysqli $dbConnection,
    ) {
    }

    /**
     * @return array{
     *     name: string,
     *     phone: string,
     *     subtotal: float,
     *     average_subtotal: float,
     *     last_order: string
     *  }
     */
    public function getUsersTotals(): array
    {
        $sql = "
SELECT 
    u.name, 
    u.phone, 
    sum(o.subtotal) as subtotal, 
    avg(o.subtotal) as average_subtotal, 
    max(o.created) as last_order 
FROM users u 
JOIN orders o ON o.user_id = u.id
GROUP BY u.name, u.phone
    ";

        $stmt = $this->dbConnection->prepare($sql);
        $stmt->execute();

        $queryResult = $stmt->get_result();

        $result = [];

        while ($record = $queryResult->fetch_assoc()) {
            $result[] = $record;
        }

        $stmt->free_result();

        return $result;
    }
}
