<?php
declare(strict_types = 1);

namespace Diplodocker\Providers;

use Diplodocker\Database\Blueprint;
use Diplodocker\Database\MySqlConnection;
use Diplodocker\Database\PostgresConnection;
use Illuminate\Database\Connection;
use Illuminate\Support\ServiceProvider;

/**
 * Package service provider
 */
class CommentsLoaderProvider extends ServiceProvider
{
    /**
     * Bootstrap the package services.
     */
    public function boot(): void
    {
    }

    public function register(): void
    {
        Connection::resolverFor('mysql', static function ($connection, $database, $prefix, $config) {
            return new MySqlConnection($connection, $database, $prefix, $config);
        });

        Connection::resolverFor('pgsql', static function ($connection, $database, $prefix, $config) {
            return new PostgresConnection($connection, $database, $prefix, $config);
        });
    }
}
