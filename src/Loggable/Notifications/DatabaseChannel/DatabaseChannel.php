<?php

namespace Illuminated\Console\Loggable\Notifications\DatabaseChannel;

use Monolog\Logger;

trait DatabaseChannel
{
    protected function useDatabaseNotifications()
    {
        return false;
    }

    protected function getDatabaseChannelHandler()
    {
        if (!$this->useDatabaseNotifications()) {
            return false;
        }

        $table = $this->getDatabaseNotificationsTable();
        $callback = $this->getNotificationDbCallback();
        $level = $this->getDatabaseNotificationsLevel();

        return (new MonologDatabaseHandler($table, $callback, $level));
    }

    protected function getDatabaseNotificationsLevel()
    {
        return Logger::NOTICE;
    }

    protected function getDatabaseNotificationsTable()
    {
        return 'iclogger_notifications';
    }

    protected function getNotificationDbCallback()
    {
        return null;
    }
}
