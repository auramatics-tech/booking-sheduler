<?php

namespace App\Exports;

use App\Inovice;
use Maatwebsite\Excel\Concerns\FromCollection;

class InoviceExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Inovice::all();
    }
}
