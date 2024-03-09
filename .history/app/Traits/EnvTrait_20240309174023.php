<?php

namespace App\Traits;

use Illuminate\Support\Facades\Artisan;
use Dotenv\Dotenv;

trait EnvTrait
{
    protected function getFromEnv(array $keys)
    {
        $values = [];

        foreach ($keys as $key) {
            $values[$key] = env($key);
        }

        return $values;
    }

    protected function setOnEnv(array $data)
    {
        // Load the current environment variables
        $dotenv = Dotenv::createImmutable(base_path());
        $dotenv->load();

        foreach ($data as $key => $value) {
            $dotenv->setKey($key, $value);
        }

        // Save the changes back to the .env file
        $dotenv->save();

        // Clear the configuration cache (optional, but recommended)
        Artisan::call('config:clear');
    }
}
