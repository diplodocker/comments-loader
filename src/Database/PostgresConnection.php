<?php
declare(strict_types = 1);

namespace Diplodocker\Database;

use Diplodocker\Concerns\CustomBlueprint;
use Illuminate\Database\PostgresConnection as BasePostgresConnection;

/**
 * Class PostgresConnection
 * @package Diplodocker\Database
 */
class PostgresConnection extends BasePostgresConnection
{
    use CustomBlueprint;

    /**
     * @return \Illuminate\Database\Grammar|\Illuminate\Database\Schema\Grammars\PostgresGrammar
     */
    protected function getDefaultSchemaGrammar()
    {
        return $this->withTablePrefix(new PostgresGrammar);
    }
}
