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
            'EMAIL_SUPPORT',
            'APP_LOGO',
            'CONTACT_NUMBER',
            'STREET',
            'CITY',
            'COUNTRY',
        ];

        // Get site information from the .env file
        $siteInfo = $this->getFromEnv($keys);

        // Debug to see the retrieved values
        // dd($siteInfo);
        $hello = 'hello';
        return view('pages.settings.show', compact('siteInfo', 'hello'));
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
        // dd($siteInfo);
        $hello = 'hello';
        return view('pages.settings.show', compact('siteInfo', 'hello'));
    }
    
}
