<?php

namespace App\Exports;

use App\detail_insting;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Session;

class hasilInstingExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

       // return jawaban_kuesioner::where('pasien_id', '=',auth()->user()->id,'and','tanggal','=','2020-08-10')->get();
       /* $hasil=DB::select('
        SELECT di.waktu AS waktu,a.nama AS namaAnak,pei.pertanyaan AS pertanyaan, di.jawaban AS jawaban
 FROM anak AS a JOIN detail_insting AS di ON a.id=di.anak_id JOIN pertanyaan_insting AS pei
ON di.pertanyaan_insting_id=pei.id JOIN insting AS i ON pei.insting_id=i.id
WHERE a.id="1" AND i.jenis_edukasi_id="1" ORDER BY di.waktu DESC, pei.id asc
    '); */
    $hasil=DB::table('anak')
        ->select('detail_insting.waktu','anak.nama','pertanyaan_insting.pertanyaan','detail_insting.jawaban')
        ->join('detail_insting','anak.id','=','detail_insting.anak_id')
        ->join('pertanyaan_insting','pertanyaan_insting.id','=','detail_insting.pertanyaan_insting_id')
        ->join('insting','pertanyaan_insting.insting_id','=','insting.id')
        ->where('anak.id','=',Session::get('idAnak'))
        ->where('insting.jenis_edukasi_id','=',Session::get('idJenisEdukasi'))
        ->orderBy('detail_insting.waktu','DESC')
        ->OrderBy('pertanyaan_insting.id','ASC')
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
