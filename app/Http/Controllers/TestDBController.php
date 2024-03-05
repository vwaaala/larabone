<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use PDO;
use PDOException;

/**
 * Class TestDBController
 *
 * This controller handles database testing functionality.
 */
class TestDBController extends Controller
{
    /**
     * Test the specified database connection.
     *
     * @param Request $request The HTTP request object.
     * @return JsonResponse A JSON response indicating the result of the database test.
     */
    public function testDB(Request $request): JsonResponse
    {

        // Store database connection parameters in session
        $request->session()->put('env.DB_CONNECTION', $request->db_connection);
        $request->session()->put('env.DB_HOST', $request->db_host);
        $request->session()->put('env.DB_PORT', $request->db_port);
        $request->session()->put('env.DB_DATABASE', $request->db_database);
        $request->session()->put('env.DB_USERNAME', $request->db_username);
        $request->session()->put('env.DB_PASSWORD', $request->db_password);

        // Check the type of database and perform appropriate testing
        if ($request->db_connection == 'mysql') {
            return $this->testMySql();
        }

        // Return error if the database type is not supported
        return response()->json(['Error' => 'DB Type not Supported for testing', 'State' => '999',]);

    }

    /**
     * Test MySQL database connection.
     *
     * @return JsonResponse A JSON response indicating the result of the MySQL database test.
     */
    public function testMySql(): JsonResponse
    {
        // Retrieve database connection parameters from session
        $db_type = session('env.DB_CONNECTION');
        $db_host = session('env.DB_HOST');
        $db_name = session('env.DB_DATABASE');
        $db_user = session('env.DB_USERNAME');
        $db_pass = session('env.DB_PASSWORD');
        $db_port = session('env.DB_PORT');

        // Check if necessary parameters are provided
        if (!$db_host) {
            return response()->json(['Error' => 'No Host', 'State' => '999',]);
        }

        if (!$db_name) {
            return response()->json(['Error' => 'No database name', 'State' => '999',]);
        }

        if (!$db_user) {
            return response()->json(['Error' => 'No user', 'State' => '999',]);
        }

        if (!$db_port) {
            return response()->json(['Error' => 'No port', 'State' => '999',]);
        }

        try {
            // Attempt to establish a database connection
            $db = new PDO($db_type . ':host=' . $db_host . ';port=' . $db_port . ';dbname=' . $db_name, $db_user, $db_pass, array(PDO::ATTR_TIMEOUT => '5', PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_LOCAL_INFILE => true));
        } catch (PDOException $e) {
            // Handle connection errors

            // If the database does not exist, attempt to create it
            if ($e->getCode() == '1049' && !$db_name == '') {
                $db = new PDO($db_type . ':host=' . $db_host . ';port=' . $db_port . ';dbname=' . '', $db_user, $db_pass, array(PDO::ATTR_TIMEOUT => '5', PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_LOCAL_INFILE => true));
                $db->query("CREATE DATABASE IF NOT EXISTS $db_name");
                return response()->json(['State' => '200', 'Success' => 'Database ' . $db_name . ' created',]);
            }

            // Return error message
            return response()->json(['Error' => $e->getMessage(), 'State' => $e->getCode(),]);
        }

        // Return success message if connection is established
        return response()->json(['State' => '200', 'Success' => 'Seems okay',]);
    }
}
