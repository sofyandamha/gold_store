<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TukarPointController extends Controller
{
    //

    public function exchangePoints(Request $request)
{
    $request->validate([
        'member_id' => 'required|exists:members,id',
        'merchandise_id' => 'required|exists:merchandises,id',
    ]);

    $member = Member::find($request->member_id);
    $merchandise = Merchandise::find($request->merchandise_id);

    if ($member->points >= $merchandise->point_value) {
        $member->points -= $merchandise->point_value;
        $member->save();

        // Tambahkan logika untuk mencatat penukaran

        return back()->with('success', 'Penukaran berhasil!');
    }

    return back()->with('error', 'Poin tidak cukup untuk penukaran ini.');
}

}
