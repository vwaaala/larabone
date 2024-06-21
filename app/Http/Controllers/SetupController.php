<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class SetupController extends Controller
{
    public function viewSetup(): View
    {
        return view('setup.check');
    }

    public function viewStep1(): View
    {
        $data = array(
            "APP_NAME" => session('env.APP_NAME') ? str_replace('"', '', session('env.APP_NAME')) : str_replace('"', '', config('app.name')),
            "APP_ENV" => session('env.APP_ENV') ? session('env.APP_ENV') : config('app.env'),
            "APP_DEBUG" => session('env.APP_DEBUG') ? session('env.APP_DEBUG') : config('app.debug'),
            "APP_KEY" => session('env.APP_KEY') ? session('env.APP_KEY') : config('app.key'),
        );

        return view('setup.step1', compact('data'));
    }


    public function viewStep2(): View
    {
        if (config("database.default") == 'mysql') {
            $db = config('database.connections.mysql');

        }
        $data = array(
            "DB_CONNECTION" => session('env.DB_CONNECTION') ? session('env.DB_CONNECTION') : config("database.default"),
            "DB_HOST" => session('env.DB_HOST') ? session('env.DB_HOST') : (isset($db['host']) ? $db['host'] : ''),
            "DB_PORT" => session('env.DB_PORT') ? session('env.DB_PORT') : (isset($db['port']) ? $db['port'] : ''),
            "DB_DATABASE" => session('env.DB_DATABASE') ? session('env.DB_DATABASE') : (isset($db['database']) ? $db['database'] : ''),
            "DB_USERNAME" => session('env.DB_USERNAME') ? session('env.DB_USERNAME') : (isset($db['username']) ? $db['username'] : ''),
            "DB_PASSWORD" => session('env.DB_PASSWORD') ? str_replace('"', '', session('env.DB_PASSWORD')) : (isset($db['password']) ? str_replace('"', '', $db['password']) : ''),
        );

        return view('setup.step2', ["data" => $data]);
    }

    public function changeEnv($data = array()): bool
    {
        if (count($data) > 0) {
            // Read .env-file
            $env = file_get_contents(base_path() . '/.env');

            // Split string on every " " and write into array
            $env = preg_split('/(\r\n|\n|\r)/', $env);

            // Loop through given data
            foreach ((array) $data as $key => $value) {

                // Loop through .env-data
                foreach ($env as $env_key => $env_value) {

                    // Turn the value into an array and stop after the first split
                    // So it's not possible to split e.g. the App-Key by accident
                    $entry = explode("=", $env_value, 2);

                    // Check, if new key fits the actual .env-key
                    if ($entry[0] == $key) {
                        // If yes, overwrite it with the new one
                        if ($value !== null) {

                            $env[$env_key] = $key . "=" . $value;
                        }
                    } else {
                        // If not, keep the old one
                        $env[$env_key] = $env_value;
                    }
                }
            }

            // Turn the array back to a String
            $env = implode("\n", $env);

            // And overwrite the .env with the new data
            file_put_contents(base_path() . '/.env', $env);

            return true;
        } else {
            return false;
        }
    }

    public function viewStep3(): View
    {
        return view('setup.step3');
    }
    public function viewStep4(): View
    {
        return view('setup.step4');
    }

    public function viewStep5(): View
    {
        if (session('env.DB_CONNECTION') == null) {
            $dbtype = config("database.default");
        } else {
            $dbtype = session('env.DB_CONNECTION');
        }

        if ($dbtype == 'mysql') {
            $db = config('database.connections.mysql');

        } else{
            $db = config('database.connections.pgsql');
        }

        $dbDatabase = session('env.DB_DATABASE');

        $data = array(
            "APP_NAME" => str_replace('"', '', session('env.APP_NAME')) == str_replace('"', '', config('app.name')) ? 'old' : str_replace('"', '', session('env.APP_NAME')),
            "APP_ENV" => session('env.APP_ENV') == config('app.env') ? 'old' : session('APP_ENV'),
            "APP_DEBUG" => session('env.APP_DEBUG') == config('app.debug') ? 'old' : session('env.APP_DEBUG'),
            "APP_KEY" => session('env.APP_KEY') == config('app.key') ? 'old' : session('env.APP_KEY'),
            "DB_CONNECTION" => session('env.DB_CONNECTION') == config("database.default") ? 'old' : session('env.DB_CONNECTION'),
            "DB_HOST" => session('env.DB_HOST') == (isset($db['host']) ? $db['host'] : '') ? 'old' : session('env.DB_HOST'),
            "DB_PORT" => session('env.DB_PORT') == (isset($db['port']) ? $db['port'] : '') ? 'old' : session('env.DB_PORT'),
            "DB_DATABASE" => $dbDatabase == (isset($db['database']) ? $db['database'] : '') ? 'old' : session('env.DB_DATABASE'),
            "DB_USERNAME" => session('env.DB_USERNAME') == (isset($db['username']) ? $db['username'] : '') ? 'old' : session('env.DB_USERNAME'),
            "DB_PASSWORD" => str_replace('"', '', session('env.DB_PASSWORD')) == (isset($db['password']) ? str_replace('"', '', $db['password']) : '') ? 'old' : str_replace('"', '', session('env.DB_PASSWORD')),
            "ADMIN_NAME" => session('env.ADMIN_NAME'),
            "ADMIN_EMAIL" => session('env.ADMIN_EMAIL'),
            "ADMIN_PASSWORD" => session('env.ADMIN_PASSWORD'),
            "MAIL_MAILER" => session('env.MAIL_MAILER'),
            "MAIL_HOST" => session('env.MAIL_HOST'),
            "MAIL_PORT" => session('env.MAIL_PORT'),
            "MAIL_USERNAME" => session('env.MAIL_USERNAME'),
            "MAIL_PASSWORD" => session('env.MAIL_PASSWORD'),
            "MAIL_ENCRYPTION" => session('env.MAIL_ENCRYPTION')
        );

        return view('setup.step5', compact('data'));
    }

    public function lastStep(): Application|Factory|string
    {
        ini_set('max_execution_time', 600); //600 seconds = 10 minutes
        $super_admin = [
            'name' => session('env.ADMIN_NAME'),
            'email'=> session('env.ADMIN_EMAIL'),
            'password'=> bcrypt(str_ireplace('"', '', session('env.ADMIN_PASSWORD'))),
        ];

        try {
            $this->changeEnv([
                'APP_NAME' => session('env.APP_NAME'),
                'APP_LOGO' => session('env.APP_LOGO'),
                'APP_ENV' => session('env.APP_ENV'),
                'APP_KEY' => session('env.APP_KEY'),
                'APP_DEBUG' => session('env.APP_DEBUG'),
                'APP_URL' => session('env.APP_URL'),
                'LOG_CHANNEL' => session('env.LOG_CHANNEL'),

                'DB_CONNECTION' => session('env.DB_CONNECTION'),
                'DB_HOST' => session('env.DB_HOST'),
                'DB_PORT' => session('env.DB_PORT'),
                'DB_DATABASE' => session('env.DB_DATABASE'),
                'DB_USERNAME' => session('env.DB_USERNAME'),
                'DB_PASSWORD' => session('env.DB_PASSWORD'),

                'BUSINESS_EMAIL' => session('env.EMAIL_CONTACT'),
                'BUSINESS_NUMBER' => session('env.CONTACT_NUMBER'),
                'BUSINESS_STREET' => session('env.STREET'),
                'BUSINESS_CITY' => session('env.CITY'),
                'BUSINESS_COUNTRY' => session('env.COUNTRY'),

                'MAIL_MAILER' => session('env.MAIL_MAILER'),
                'MAIL_HOST' => session('env.MAIL_HOST'),
                'MAIL_PORT' => session('env.MAIL_PORT'),
                'MAIL_USERNAME' => session('env.MAIL_USERNAME'),
                'MAIL_PASSWORD' => session('env.MAIL_PASSWORD'),
                'MAIL_ENCRYPTION' => session('env.MAIL_ENCRYPTION'),
                'MAIL_FROM_ADDRESS' => session('env.MAIL_FROM'),
            ]);

            Artisan::call('migrate:fresh --force --seed');

            User::where('id', 1)->update($super_admin);

            Storage::disk('public')->put('installed', 'Contents');

            Artisan::call('optimize');

        } catch (\Exception $e) {

            return $e->getMessage();
        }

        return view('setup.finished');
    }

    public function getNewAppKey(): string
    {
        Artisan::call('key:generate', ['--show' => true]);
        $output = (Artisan::output());

        return substr($output, 0, -2);
    }

    public function setupStep1(Request $request): Factory|View|Application
    {
        $image = $request->file('logo');
        $image_name = 'logo' . '.' . $image->getClientOriginalExtension();
        $image->move(public_path(), $image_name);
        $request->session()->put('env.APP_LOGO', $image_name);
        $request->session()->put('env.APP_ENV', $request->app_env);

        $request->session()->put('env.APP_DEBUG', $request->app_debug);

        if (strlen($request->app_name) > 0) {
            $request->session()->put('env.APP_NAME', '"' . $request->app_name . '"');
        }

        if (strlen($request->app_key) > 0) {
            $request->session()->put('env.APP_KEY', $request->app_key);
        }

        $request->session()->put('env.EMAIL_CONTACT', $request->support_email);
        $request->session()->put('env.CONTACT_NUMBER', $request->phone_first);
        $request->session()->put('env.STREET', '"'.$request->street.'"');
        $request->session()->put('env.CITY', $request->city);
        $request->session()->put('env.COUNTRY', $request->country);

        return $this->viewStep2();
    }

    public function setupStep2(Request $request): Factory|View|Application
    {

        if (strlen($request->db_password) > 0) {
            $request->session()->put('env.DB_PASSWORD', '"' . $request->db_password . '"');
        }
        $request->session()->put('env.DB_CONNECTION', $request->db_connection);
        $request->session()->put('env.DB_HOST', $request->db_host);
        $request->session()->put('env.DB_PORT', $request->db_port);
        $request->session()->put('env.DB_DATABASE', $request->db_database);
        $request->session()->put('env.DB_USERNAME', $request->db_username);

        return $this->viewStep3();
    }

    public function setupStep3(Request $request): Factory|View|Application
    {
        if (strlen($request->password) > 0) {
            $request->session()->put('env.ADMIN_PASSWORD', '"'. $request->password . '"');
        }
        $request->session()->put('env.ADMIN_NAME', $request->name);
        $request->session()->put('env.ADMIN_EMAIL', $request->email);

        return $this->viewStep4();
    }

    public function setupStep4(Request $request): Factory|View|Application
    {
        if (strlen($request->get('mail_password')) > 0) {
            $request->session()->put('env.MAIL_PASSWORD', '"'. $request->get('mail_password') . '"');
        }
        $request->session()->put('env.MAIL_MAILER', $request->get('mail_driver'));
        $request->session()->put('env.MAIL_HOST', $request->get('mail_host'));
        $request->session()->put('env.MAIL_PORT', $request->get('mail_port'));
        $request->session()->put('env.MAIL_USERNAME', $request->get('mail_username'));
        $request->session()->put('env.MAIL_ENCRYPTION', $request->get('mail_encryption'));

        return $this->viewStep5();
    }

}
