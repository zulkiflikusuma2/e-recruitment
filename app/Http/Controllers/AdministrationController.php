<?php

namespace App\Http\Controllers;

use App\Models\Administration;
use App\Models\Applicant;
use App\Models\Interview;
use App\Models\Practice_test;
use App\Models\Schedule;
use App\Models\Selection_result;
use App\Models\Written_test;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdministrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Applicant $administration)
    {
        return view('dashboard.selection.administration.index', [
            'applicants' => Administration::where('process', 0)->get(),
            'schedules' => Schedule::where('date', '>=', Carbon::now())
                ->where('status', 1)
                ->where('selection_id', 1)->latest()->get(),
        ]);
    }

    public function add_update(Request $request, Applicant $administration)
    {
        Applicant::where('id', $administration->id)
            ->update(['status' => 1]);

        $validatedData = $request->validate([
            'status' => 'required',
        ]);
        $validatedData['process'] = 0;
        Administration::where('applicant_id', $administration->id)
            ->update($validatedData);


        return redirect('/applicants')->with('success', 'Berhasil Ditambahkan!');
    }

    public function update(Request $request, Administration $administration)
    {
        $validatedData = $request->validate([
            'status' => 'required',
        ]);

        Administration::where('id', $administration->id)
            ->update($validatedData);

        return redirect('/administration')->with('success', 'Berhasil Diubah!');
    }

    public function destroy(Administration $administration)
    {
        Administration::destroy($administration->id);

        return redirect('/administration')->with('success', 'Data berhasil dihapus!');
    }

    public function announcement(Request $request)
    {

        $ids = $request->ids;
        switch ($request->input('action')) {
            case 'rejected':
                Administration::whereIn('id',  $ids)
                    ->update(['process' => 1, 'status' => 0]);

                Selection_result::whereIn('administration_id', $ids)
                    ->update(['result' => 0]);

                return redirect('/administration')->with('success', 'Berhasil Ditambahkan!');
                break;

            case 'accepted':
                Administration::whereIn('id',  $ids)
                    ->update(['process' => 1, 'status' => 1]);

                $validatedData1 = $request->validate([
                    'schedule_id' => 'required',
                ]);

                $validatedData1['process'] = 0;
                Written_test::whereIn('administration_id',  $ids)
                    ->update($validatedData1);

                return redirect('/administration')->with('success', 'Berhasil Ditambahkan!');
                break;
        }
    }
}
