<?php
declare(strict_types = 1);

namespace Diplodocker\Concerns;

use Diplodocker\Database\Blueprint;

/**
 * Trait CustomBlueprint
 * @package Diplodocker\Concerns
 *
 * phpcs:disable SlevomatCodingStandard.Functions.StaticClosure
 */
trait CustomBlueprint
{
    /**
     * @return \Illuminate\Database\Schema\Builder
     */
    public function getSchemaBuilder()
    {
        $builder = parent::getSchemaBuilder();
        $builder->blueprintResolver(function ($table, $callback) {
            return new Blueprint($table, $callback);
        });
        return $builder;
    }
}
