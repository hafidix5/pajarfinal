<?php

namespace App\Exports;

use App\jawaban_kuesioner;
use Maatwebsite\Excel\Concerns\FromCollection;

class KuesionerExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return jawaban_kuesioner::all();
    }
}
