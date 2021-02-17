<?php


class OrderService
{
    const STATUS_NEW = 0;
    const STATUS_IN_PROCESS = 1;
    const STATUS_COMPLETED = 2;
    const STATUS_CANCELLED = 3;

    public static function getStatuses()
    {
        return [
            self::STATUS_NEW => 'New',
            self::STATUS_IN_PROCESS => 'In process',
            self::STATUS_COMPLETED => 'Completed',
            self::STATUS_CANCELLED => 'Cancelled'
        ];
    }
}