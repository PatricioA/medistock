<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Insumos;

class ExportInsumos implements FromView
{
    public function view(): View
    {
        return view('insumos.export', [
            'insumos' => Insumos::all()
        ]);
    }
}


