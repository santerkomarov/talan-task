<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UsersCatalog;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Http\Resources\UsersCatalogResource;
use App\Http\Resources\UsersCatalogCollection;

class XlsxController extends Controller
{
    /**
     * 
     * @return excell
     */
    public function index () {
    
        return Excel::download( new UsersExport, 'users.xlsx');
    }
}
