<?php
declare(strict_types = 1);

namespace Diplodocker\Database;

use Diplodocker\Concerns\CustomBlueprint;
use Illuminate\Database\MySqlConnection as BaseMySqlConnection;

/**
 * Class MySqlConnection
 * @package Diplodocker\Database
 */
class MySqlConnection extends BaseMySqlConnection
{
    use CustomBlueprint;

    /**
     * @return \Illuminate\Database\Grammar|\Illuminate\Database\Schema\Grammars\MySqlGrammar
     */
    protected function getDefaultSchemaGrammar()
    {
        return $this->withTablePrefix(new MySqlGrammar);
    }
}
