<?php

namespace App\Http\Controllers;

// use App\Traits\EnvTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;


class SettingsController extends Controller
{
    // use EnvTrait;
    public function index()
    {
        return view('pages.settings.index');
    }


    public function siteInfo()
    {
        // Get site information from environment variables
        $keys = [
            'APP_NAME',
            'APP_LOGO',
            'APP_ENV',
            'APP_KEY',
            'APP_DEBUG',
            'APP_URL',
        ];

        // Get site information from the .env file
        $siteInfo = $this->getFromEnv($keys);

        // Debug to see the retrieved values
        dd($siteInfo);
        return view('pages.settings.show', compact('siteInfo'));
    }

        /**
     * Get values from the environment for the specified keys.
     *
     * @param array $keys
     * @return array
     */
    protected function getFromEnv(array $keys)
    {
        $values = [];

        foreach ($keys as $key) {
            // Use the config function to get the value from the configuration
            $values[$key] = config($key);
        }

        return $values;
    }

    /**
     * Set values in the environment for the specified keys.
     *
     * @param array $data
     */
    protected function setOnEnv(array $data)
    {
        foreach ($data as $key => $value) {
            // Set the value in the configuration
            config([$key => $value]);

            // Optionally, update the .env file
            $this->updateEnvFile($key, $value);
        }

        // Clear the configuration cache (optional, but recommended)
        Artisan::call('config:clear');
    }

    /**
     * Update the .env file with the new key-value pair.
     *
     * @param string $key
     * @param mixed $value
     */
    protected function updateEnvFile($key, $value)
    {
        $envFilePath = base_path('.env');

        // Read the current contents of the .env file
        $contents = file_get_contents($envFilePath);

        // Replace the old value with the new value
        $contents = preg_replace("/{$key}=(.*)/", "{$key}={$value}", $contents);

        // Write the updated contents back to the .env file
        file_put_contents($envFilePath, $contents);
    }
}
