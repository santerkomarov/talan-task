<?php

namespace App\Exports;

use App\Models\UsersCatalog;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;


class UsersExport implements FromCollection,WithHeadings
{
    /**
     * Return the data which we have to export
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Show only three columns from table
        return UsersCatalog::all('fio', 'email', 'phone');
    }

    /**
     * Define the heading, which would be displayed in an excel file.
     * @return array
     */
    public function headings():array {
        return[
            'fio',
            'email',
            'phone' 
        ];
    } 
}
