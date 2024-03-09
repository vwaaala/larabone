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


    public function generalInfo()
    {
        // Get site information from environment variables
        $keys = [
            'APP_NAME',
            'APP_URL',
            'APP_LOGO',
            'EMAIL_SUPPORT',
            'CONTACT_NUMBER',
            'STREET',
            'CITY',
            'COUNTRY',
            'DEFAULT_AVATAR'
        ];
        // Get site information from the .env file
        $packets = $this->getFromEnv($keys);
        $title = 'general';

        return view('pages.settings.show', compact('packets', 'title'));
    }


    public function debugInfo()
    {
        // Get site information from environment variables
        $keys = [
            'APP_ENV',
            'APP_DEBUG',
            'DEBUGBAR_ENABLED'
        ];

        // Get site information from the .env file
        $siteInfo = $this->getFromEnv($keys);

        // Debug to see the retrieved values
        // dd($siteInfo);
        $hello = 'hello';
        return view('pages.settings.show', compact('siteInfo', 'hello'));
    }
    
    public function smtpInfo()
    {
        // Get site information from environment variables
        $keys = [
            'APP_ENV',
            'APP_DEBUG',
            'DEBUGBAR_ENABLED'
        ];

        // Get site information from the .env file
        $siteInfo = $this->getFromEnv($keys);

        // Debug to see the retrieved values
        // dd($siteInfo);
        $hello = 'hello';
        return view('pages.settings.show', compact('siteInfo', 'hello'));
    }
}
