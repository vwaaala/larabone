<?php

namespace App\Http\Controllers;

use App\Traits\EnvTrait;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    use EnvTrait;
    public function index()
    {
        return view('pages.settings.index');
    }


    public function siteInfo()
    {
        // Get site information from environment variables
        $siteInfo = $this->getFromEnv([
            'APP_NAME',
            'APP_LOGO',
            'APP_ENV',
            'APP_KEY',
            'APP_DEBUG',
            'APP_URL',
        ]);
        $appin = [
            'APP_NAME',
            'APP_LOGO',
            'APP_ENV',
            'APP_KEY',
            'APP_DEBUG',
            'APP_URL',
        ];
        $values = [];

        foreach ($appin as $key) {
            // Use the config function to get the value from the configuration
            $values[$key] = config($key);
        }
        dd(config('APP_NAME'));

        return view('pages.settings.show', compact('siteInfo'));
    }
}
