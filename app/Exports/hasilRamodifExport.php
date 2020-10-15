<?php

namespace App\Exports;

use App\detail_ramodif;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Session;

class hasilRamodifExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $hasil=DB::table('anak')
        ->select('detail_ramodif.waktu','anak.nama','pertanyaan_ramodif.tahap','pertanyaan_ramodif.pertanyaan','detail_ramodif.jawaban'
        )
        ->join('detail_ramodif','anak.id','=','detail_ramodif.anak_id')
        ->join('pertanyaan_ramodif','pertanyaan_ramodif.id','=','detail_ramodif.pertanyaan_ramodif_id')
        ->join('ramodif','pertanyaan_ramodif.ramodif_id','=','ramodif.id')
        ->where('anak.id','=',Session::get('idAnak'))
        ->where('ramodif.jenis_edukasi_id','=',Session::get('idJenisEdukasi'))
        ->orderBy('detail_ramodif.waktu','DESC')
        ->OrderBy('pertanyaan_ramodif.id','ASC')
        ->OrderBy('pertanyaan_ramodif.tahap','ASC')
        ->get();

        return $hasil;
    }
    public function headings(): array
    {
        return [
            'Tanggal',
            'Nama Anak',
            'Tahap',
            'Pertanyaan',
            'Jawaban',

        ];
    }
}
