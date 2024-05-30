<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsGeneralUpdateRequest;
use App\Traits\LaraEnvTrait;
use Illuminate\Support\Facades\Artisan;

class SettingsController extends Controller
{
    use LaraEnvTrait;

    public function index()
    {
        $title = 'index';
        return view('pages.settings.index', compact('title'));
    }


    public function generalInfo()
    {
        // Get site information from environment variables
        $keys = ['APP_NAME', 'APP_LOGO', 'APP_URL', 'DEFAULT_AVATAR', 'BUSINESS_EMAIL', 'BUSINESS_NUMBER', 'STREET', 'CITY', 'COUNTRY',];
        // Get site information from the .env file
        $packets = $this->getFromEnv($keys);
        $title = 'general';

        return view('pages.settings.show', compact('packets', 'title'));
    }

    public function generalEdit()
    {
        // Get site information from environment variables
        $keys = ['APP_NAME', 'APP_LOGO', 'APP_URL', 'DEFAULT_AVATAR', 'BUSINESS_EMAIL', 'BUSINESS_NUMBER', 'STREET', 'CITY', 'COUNTRY',];
        // Get site information from the .env file
        $packets = $this->getFromEnv($keys);
        return view('pages.settings.edit-general', compact('packets'));
    }

    public function generalUpdate(SettingsGeneralUpdateRequest $request)
    {
        $data = [
            'APP_NAME' =>  '"' . $request->get('name') . '"',
            'APP_URL' => '"' . $request->get('domain') . '"',
            'BUSINESS_EMAIL' => '"' . $request->get('email') . '"',
            'BUSINESS_NUMBER' => '"' . $request->get('phone') . '"',
            'STREET' => '"' . $request->get('street') . '"',
            'CITY' => '"' . $request->get('city') . '"',
            'COUNTRY' =>  '"' . $request->get('country') . '"',
        ];
        if ($request->has('logo')){
            $image = $request->file('logo');
            $oldLogo = $this->getFromEnv(['APP_LOGO']);
            if (file_exists(public_path() . $oldLogo['APP_LOGO'])) {
                unlink(public_path() . $oldLogo['APP_LOGO']);
            }
            $image_name = 'logo' . '.' . $image->getClientOriginalExtension();
            $image->move(public_path(), $image_name);
            $data['APP_LOGO'] = $image_name;
        }
        if ($request->has('avatar')){
            $image = $request->file('avatar');
            $oldLogo = $this->getFromEnv(['DEFAULT_AVATAR']);
            if (file_exists(config('panel.avatar_path') . $oldLogo['DEFAULT_AVATAR'])) {
                unlink(public_path() . $oldLogo['DEFAULT_AVATAR']);
            }
            $image_name = 'avatar' . '.' . $image->getClientOriginalExtension();
            $image->move(public_path() . config('panel.avatar_path'), $image_name);
            $data['DEFAULT_AVATAR'] = config('panel.avatar_path') . $image_name;
        }

        $this->setOnEnv($data);
        Artisan::call('config:clear');
        Artisan::call('config:cache');

        return redirect()->route('settings.generalInfo')->with('success', 'Updated general info!');
    }

    public function databaseInfo()
    {
        // Get site information from environment variables
        $keys = ['DB_CONNECTION', 'DB_HOST', 'DB_PORT', 'DB_DATABASE', 'DB_USERNAME', 'DB_PASSWORD',];

        // Get site information from the .env file
        $packets = $this->getFromEnv($keys);
        $title = 'database';

        return view('pages.settings.show', compact('packets', 'title'));
    }

    public function databaseUpdate()
    {

    }

    public function databaseEdit()
    {
        // Get site information from environment variables
        $keys = ['DB_CONNECTION', 'DB_HOST', 'DB_PORT', 'DB_DATABASE', 'DB_USERNAME', 'DB_PASSWORD', 'DB_PORT', 'DB_PORT', 'DB_PORT', 'DB_PORT', 'DB_PORT',];

        // Get site information from the .env file
        $packets = $this->getFromEnv($keys);

        return view('pages.settings.edit-database', compact('packets'));
    }


    public function debugInfo()
    {
        // Get site information from environment variables
        $keys = ['APP_ENV', 'APP_DEBUG', 'DEBUGBAR_ENABLED'];

        // Get site information from the .env file
        $packets = $this->getFromEnv($keys);
        $title = 'debug';

        return view('pages.settings.show', compact('packets', 'title'));
    }

    public function debugEdit()
    {
        // Get site information from environment variables
        $keys = ['APP_ENV', 'APP_DEBUG', 'DEBUGBAR_ENABLED'];

        // Get site information from the .env file
        $packets = $this->getFromEnv($keys);

        return view('pages.settings.edit-debug', compact('packets'));
    }

    public function logInfo()
    {
        // Get site information from environment variables
        $keys = ['LOG_CHANNEL', 'LOG_LEVEL', 'LOG_DEPRECATIONS_CHANNEL'];

        // Get site information from the .env file
        $packets = $this->getFromEnv($keys);
        $title = 'log';

        return view('pages.settings.show', compact('packets', 'title'));
    }

    public function logEdit()
    {
        // Get site information from environment variables
        $keys = ['LOG_CHANNEL', 'LOG_LEVEL', 'LOG_DEPRECATIONS_CHANNEL'];

        // Get site information from the .env file
        $packets = $this->getFromEnv($keys);

        return view('pages.settings.edit-log', compact('packets'));
    }

    public function mailInfo()
    {
        // Get site information from environment variables
        $keys = ['DB_CONNECTION', 'DB_HOST', 'DB_PORT', 'DB_DATABASE', 'DB_USERNAME', 'DB_PASSWORD'];

        // Get site information from the .env file
        $packets = $this->getFromEnv($keys);
        $title = 'mail';

        return view('pages.settings.show', compact('packets', 'title'));
    }

    public function mailEdit()
    {
        // Get site information from environment variables
        $keys = ['DB_CONNECTION', 'DB_HOST', 'DB_PORT', 'DB_DATABASE', 'DB_USERNAME', 'DB_PASSWORD'];

        // Get site information from the .env file
        $packets = $this->getFromEnv($keys);

        return view('pages.settings.edit-mail', compact('packets'));
    }
}
