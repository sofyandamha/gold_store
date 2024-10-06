<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Retur;
use PDF;

class ReturController extends Controller
{
    //
    public function printReceipt($id)
    {
        $retur = Retur::findOrFail($id);

        $pdf = PDF::loadview('retur.receipt',['retur'=> $retur]);
    	return $pdf->stream('tanda_terima_retur_' . $retur->id . '.pdf');
    }
}
