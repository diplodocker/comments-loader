<?php
declare(strict_types = 1);

namespace Diplodocker\Database;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Grammars\MySqlGrammar as BaseMySqlGrammar;
use Illuminate\Support\Fluent;

/**
 * Class MySqlGrammar
 * @package Diplodocker\Database
 */
class MySqlGrammar extends BaseMySqlGrammar
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
        return sprintf('alter table %s comment = \'%s\'',
            $this->wrapTable($blueprint),
            addslashes($command->value)
        );
    }
}
