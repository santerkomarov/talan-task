<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;

use App\Models\UsersCatalog;

class JsonController extends Controller
{
    /**
     * Clear existing json-file. Get dta from DB. Fill the file with new data.
     * 
     * @return array of json
     */
    public function index () {

        // Remove file content 
        file_put_contents(storage_path('downloads/users.json'), json_encode([]));

        // Initialize store array
        $user = [];

        // Get all data from DB
        $mass =  UsersCatalog::all();

        // Iterate array. Build temporary array. Assign array key to values from DB.
        foreach ( $mass as $item ) {
            $u = [
                "fio" => $item['fio'],
                "email"=> $item['email'],
                "phone"=> $item['phone']
            ];

            // Fill store with new data
            array_push($user, $u);
        }

        // Convert the store into json. 
        // JSON_UNESCAPED_UNICODE for correct show cyrillic symbols
        // JSON_PRETTY_PRINT, use empty spaces for formatting, code 128
        $newJsonString = json_encode($user, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        // Save file with new data
        file_put_contents(storage_path('downloads/users.json'), $newJsonString);

        return Response::download(storage_path('downloads/users.json'));
    }
}
