<?php
declare(strict_types = 1);

namespace Diplodocker\Concerns;

use Illuminate\Support\Facades\DB;

/**
 * Trait for the apply comments to tables
 * @see README.md
 */
trait CommentsLoader
{
    /**
     * Table comments loader
     */
    protected function loadTableComments(): void
    {
        foreach ($this->comments as $table => $comment) {
            $this->executeAlterComment(
                $this->getAlterQuery($table, $comment)
            );
        }
    }

    /**
     * Execute alter query to database
     * @param string $query Query string
     */
    private function executeAlterComment(string $query): void
    {
        DB::unprepared($query);
    }

    /**
     * Return ready to execute query
     * @param string $table Table name
     * @param string $comment Comment
     * @return string Query
     */
    private function getAlterQuery(string $table, string $comment): string
    {
        return sprintf(
            "ALTER TABLE `%s%s` comment '%s'",
            $this->getTablePrefix(),
            $table,
            $comment
        );
    }

    /**
     * Return a database prefix string
     */
    private function getTablePrefix(): string
    {
        return DB::getTablePrefix();
    }
}
