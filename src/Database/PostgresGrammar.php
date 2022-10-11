<?php
declare(strict_types = 1);

namespace Diplodocker\Database;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Grammars\PostgresGrammar as BasePostgresGrammar;
use Illuminate\Support\Fluent;

/**
 * Class PostgresGrammar
 * @package Diplodocker\Database
 */
class PostgresGrammar extends BasePostgresGrammar
{
    /**
     * Compile a TableComment command.
     *
     * @param  \Illuminate\Database\Schema\Blueprint  $blueprint
     * @param  \Illuminate\Support\Fluent  $command
     * @return string
     */
    public function compileTableComment(Blueprint $blueprint, Fluent $command)
    {
        return sprintf('comment on table %s is %s',
            $this->wrapTable($blueprint),
            "'".str_replace("'", "''", $command->value)."'"
        );
    }

}
