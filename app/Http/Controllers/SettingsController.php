<?php

namespace App\Http\Controllers;

use App\Traits\LaraEnvTrait;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class SettingsController extends Controller
{
    use LaraEnvTrait;

    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $title = 'index';
        return view('pages.settings.index', compact('title'));
    }


    public function generalInfo(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        // Get site information from environment variables
        $keys = ['APP_NAME', 'APP_LOGO', 'APP_URL', 'DEFAULT_AVATAR', 'EMAIL_SUPPORT', 'CONTACT_NUMBER', 'STREET', 'CITY', 'COUNTRY',];
        // Get site information from the .env file
        $packets = $this->getFromEnv($keys);
        $title = 'general';

        return view('pages.settings.show', compact('packets', 'title'));
    }

    public function generalEdit(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        // Get site information from environment variables
        $keys = ['APP_NAME', 'APP_LOGO', 'APP_URL', 'DEFAULT_AVATAR', 'EMAIL_SUPPORT', 'CONTACT_NUMBER', 'STREET', 'CITY', 'COUNTRY',];
        // Get site information from the .env file
        $packets = $this->getFromEnv($keys);

        return view('pages.settings.edit-general', compact('packets'));
    }


    public function databaseInfo(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        // Get site information from environment variables
        $keys = ['DB_CONNECTION', 'DB_HOST', 'DB_PORT', 'DB_DATABASE', 'DB_USERNAME', 'DB_PASSWORD', 'DB_PORT', 'DB_PORT', 'DB_PORT', 'DB_PORT', 'DB_PORT',];

        // Get site information from the .env file
        $packets = $this->getFromEnv($keys);
        $title = 'database';

        return view('pages.settings.show', compact('packets', 'title'));
    }

    public function databaseEdit(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        // Get site information from environment variables
        $keys = ['DB_CONNECTION', 'DB_HOST', 'DB_PORT', 'DB_DATABASE', 'DB_USERNAME', 'DB_PASSWORD', 'DB_PORT', 'DB_PORT', 'DB_PORT', 'DB_PORT', 'DB_PORT',];

        // Get site information from the .env file
        $packets = $this->getFromEnv($keys);

        return view('pages.settings.edit-database', compact('packets'));
    }


    public function debugInfo(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        // Get site information from environment variables
        $keys = ['APP_ENV', 'APP_DEBUG', 'DEBUGBAR_ENABLED'];

        // Get site information from the .env file
        $packets = $this->getFromEnv($keys);
        $title = 'debug';

        return view('pages.settings.show', compact('packets', 'title'));
    }

    public function debugEdit(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        // Get site information from environment variables
        $keys = ['APP_ENV', 'APP_DEBUG', 'DEBUGBAR_ENABLED'];

        // Get site information from the .env file
        $packets = $this->getFromEnv($keys);

        return view('pages.settings.edit-debug', compact('packets'));
    }

    public function logInfo(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        // Get site information from environment variables
        $keys = ['LOG_CHANNEL', 'LOG_LEVEL', 'LOG_DEPRECATIONS_CHANNEL'];

        // Get site information from the .env file
        $packets = $this->getFromEnv($keys);
        $title = 'debug';

        return view('pages.settings.show', compact('packets', 'title'));
    }

    public function logEdit(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        // Get site information from environment variables
        $keys = ['LOG_CHANNEL', 'LOG_LEVEL', 'LOG_DEPRECATIONS_CHANNEL'];

        // Get site information from the .env file
        $packets = $this->getFromEnv($keys);

        return view('pages.settings.edit-log', compact('packets'));
    }

    public function mailInfo(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        // Get site information from environment variables
        $keys = ['DB_CONNECTION', 'DB_HOST', 'DB_PORT', 'DB_DATABASE', 'DB_USERNAME', 'DB_PASSWORD'];

        // Get site information from the .env file
        $packets = $this->getFromEnv($keys);
        $title = 'mail';

        return view('pages.settings.show', compact('packets', 'title'));
    }

    public function mailEdit(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        // Get site information from environment variables
        $keys = ['DB_CONNECTION', 'DB_HOST', 'DB_PORT', 'DB_DATABASE', 'DB_USERNAME', 'DB_PASSWORD'];

        // Get site information from the .env file
        $packets = $this->getFromEnv($keys);

        return view('pages.settings.edit-mail', compact('packets'));
    }
}
