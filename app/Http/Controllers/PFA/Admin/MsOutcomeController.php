<?php

namespace App\Http\Controllers\PFA\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// add
use App\Models\Tables\PFA\MsIncome;
use App\Models\Tables\PFA\MsOutcome;
use App\Models\Tables\HistoryLog;
use Illuminate\Support\Facades\Auth;

class MsOutcomeController extends Controller
{
    public function index()
    {
        // $income = MsOutcome::select('*', 'ma.id AS id')
        //             ->from('ms_blog_artikel AS ma')
        //             ->join('ms_blog_kategori AS mk', 'mk.id', '=', 'ma.id_kategori')
        //             ->where('ma.flag', 1)
        //             ->get();

        $data = [
            'outcome' => MsOutcome::where('flag', 1)->get(),
        ];
        // dd($data);

        return view('pfa/admin/outcome')->with('data', $data);
    }

    public function create()
    {
        // $income = MsArtikel::where('flag', 1)->get();

        // $data = [
        //     'artikel' => $income,
        //     'kategori' => MsKategori::where('flag', 1)->get(),
        // ];

        // return view('blog/admin/artikel-create')->with('data', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'information_name' => 'required',
        ]);
        $data  = [
            'information_name' => $request->information_name,
            'flag' => 1,
            'created_by'=> Auth::user()->id,
        ];
        // dd($data);
        $insert = MsOutcome::insert($data);

        $data_history  = [
            'information' => 'Insert Data Outcome',
            'apps' => 'Personal Finance App',    
            'created_by'=> Auth::user()->id,
        ];
        $insert_history = HistoryLog::insert($data_history);

        // redirect
        if ($insert) {
            return redirect('pfa/pfa-outcome')->with('success', 'Data created successfully.');
        } else {
            return redirect('pfa/pfa-outcome')->with('error', 'Failed!');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        // $income = MsArtikel::select('*', 'ma.id AS id')
        //             ->from('ms_blog_artikel AS ma')
        //             ->join('ms_blog_kategori AS mk', 'mk.id', '=', 'ma.id_kategori')
        //             ->where('ma.flag', 1)
        //             ->where('ma.id', (int) $id)
        //             ->get();

        // $data = [
        //     'artikel' => $income,
        //     'kategori' => MsKategori::where('flag', 1)->get(),
        // ];
        // // dd($data);

        // return view('blog/admin/artikel-edit')->with('data', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'information_name' => 'required',
        ]);
        $data = [
            'information_name' => $request->information_name,
            'updated_by'=> Auth::user()->id,
        ];
        // dd($data);
        $update = MsOutcome::where('id', $request->id)->update($data);

        $data_history  = [
            'information' => 'Update Data Outcome',
            'apps' => 'Personal Finance App',    
            'created_by'=> Auth::user()->id,
        ];
        $insert_history = HistoryLog::insert($data_history);

        if ($update) {
            return redirect('pfa/pfa-outcome')->with('success', 'Data updated successfully.');
        } else {
            return redirect('pfa/pfa-outcome')->with('error', 'Failed!');
        }
    }

    public function destroy(Request $request)
    {
        $data = [
            'flag' => 0,
        ];
        // dd($data);
        $delete = MsOutcome::where('id', $request->id)->update($data);

        $data_history  = [
            'information' => 'Delete Data Outcome',
            'apps' => 'Personal Finance App',    
            'created_by'=> Auth::user()->id,
        ];
        $insert_history = HistoryLog::insert($data_history);

        if ($delete) {
            return redirect('pfa/pfa-outcome')->with('success', 'Data Deleted.');
        } else {
            return redirect('pfa/pfa-outcome')->with('error', 'Failed!');
        }
    }

    public function trash()
    {
        $income = MsOutcome::where('flag', 0)->get();

        $data = [
            'outcome' => $income,
        ];
        // dd($data);

        return view('pfa/admin/outcome-trash')->with('data', $data);
    }

    public function restore(Request $request)
    {
        $data = [
            'flag' => 1,
        ];
        // dd($data);
        $restore = MsOutcome::where('id', $request->id)->update($data);

        $data_history  = [
            'information' => 'Restore Data Outcome',
            'apps' => 'Personal Finance App',    
            'created_by'=> Auth::user()->id,
        ];
        $insert_history = HistoryLog::insert($data_history);
        
        if ($restore) {
            return redirect('pfa/pfa-outcome')->with('success', 'Data Restored.');
        } else {
            return redirect('pfa/pfa-outcome')->with('error', 'Failed!');
        }
    }

    public function delete(Request $request)
    {
        // dd($request->id);
        $delete_trash = MsOutcome::where('id', $request->id)->delete();

        $data_history  = [
            'information' => 'Delete Data Outcome in Trash',
            'apps' => 'Blog',    
            'created_by'=> Auth::user()->id,
        ];
        $insert_history = HistoryLog::insert($data_history);

        if ($delete_trash) {
            return redirect('pfa/pfa-outcome/trash')->with('success', 'Data Deleted!.');
        } else {
            return redirect('pfa/pfa-outcome/trash')->with('error', 'Failed!');
        }
    }
}
