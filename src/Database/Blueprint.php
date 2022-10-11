<?php
declare(strict_types = 1);

namespace Diplodocker\Database;

use Illuminate\Database\Schema\Blueprint as BaseBlueprint;

class Blueprint extends BaseBlueprint
{
    /**
     * @param string $value
     *
     * @return $this
     */
    public function tableComment(string $value): self
    {
        $this->addCommand('tableComment', compact('value'));
        return $this;
    }
}
