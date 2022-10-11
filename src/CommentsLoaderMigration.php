<?php
declare(strict_types = 1);

namespace Diplodocker;

use Diplodocker\Concerns\CommentsLoader;
use Illuminate\Database\Migrations\Migration;

/**
 * Foreign keys loader migration
 */
class CommentsLoaderMigration extends Migration
{
    /**
     * Include trait
     */
    use CommentsLoader;

    /**
     * Run the migrations.
     *
     */
    public function up(): void
    {
        $this->loadTableComments();
    }
}
