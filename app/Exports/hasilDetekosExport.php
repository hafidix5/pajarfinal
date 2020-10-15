<?php

namespace App\Exports;

use App\detail_detekos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Session;



class hasilDetekosExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $hasil=DB::table('anak')
        ->select('detail_detekos.waktu','anak.nama','pertanyaan_detekos.pertanyaan','detail_detekos.jawaban')
        ->join('detail_detekos','anak.id','=','detail_detekos.anak_id')
        ->join('pertanyaan_detekos','pertanyaan_detekos.id','=','detail_detekos.pertanyaan_detekos_id')
        ->join('detekos','pertanyaan_detekos.detekos_id','=','detekos.id')
        ->where('anak.id','=',Session::get('idAnak'))
        ->where('detekos.jenis_edukasi_id','=',Session::get('idJenisEdukasi'))
        ->orderBy('detail_detekos.waktu','DESC')
        ->OrderBy('pertanyaan_detekos.id','ASC')
        ->get();

        return $hasil;
    }
    public function headings(): array
    {
        return [
            'Tanggal',
            'Nama Anak',
            'Pertanyaan',
            'Jawaban',

        ];
    }
}
