<?php

namespace App\Http\Controllers\PFA\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// add
use App\Models\Tables\PFA\MsIncome;
use App\Models\Tables\PFA\MsOutcome;
use App\Models\Tables\HistoryLog;
use Illuminate\Support\Facades\Auth;

class MsIncomeController extends Controller
{
    public function index()
    {
        // $income = MsIncome::select('*', 'ma.id AS id')
        //             ->from('ms_blog_artikel AS ma')
        //             ->join('ms_blog_kategori AS mk', 'mk.id', '=', 'ma.id_kategori')
        //             ->where('ma.flag', 1)
        //             ->get();

        $data = [
            'income' => MsIncome::where('flag', 1)->get(),
            // 'kategori' => MsKategori::where('flag', 1)->get(),
        ];
        // dd($data);

        return view('pfa/admin/income')->with('data', $data);
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
        $insert = MsIncome::insert($data);

        $data_history  = [
            'information' => 'Insert Data Income',
            'apps' => 'Personal Finance App',    
            'created_by'=> Auth::user()->id,
        ];
        $insert_history = HistoryLog::insert($data_history);

        // redirect
        if ($insert) {
            return redirect('pfa/pfa-income')->with('success', 'Data created successfully.');
        } else {
            return redirect('pfa/pfa-income')->with('error', 'Failed!');
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
        $update = MsIncome::where('id', $request->id)->update($data);

        $data_history  = [
            'information' => 'Update Data Income',
            'apps' => 'Personal Finance App',    
            'created_by'=> Auth::user()->id,
        ];
        $insert_history = HistoryLog::insert($data_history);

        if ($update) {
            return redirect('pfa/pfa-income')->with('success', 'Data updated successfully.');
        } else {
            return redirect('pfa/pfa-income')->with('error', 'Failed!');
        }
    }

    public function destroy(Request $request)
    {
        $data = [
            'flag' => 0,
        ];
        // dd($data);
        $delete = MsIncome::where('id', $request->id)->update($data);

        $data_history  = [
            'information' => 'Delete Data Income',
            'apps' => 'Personal Finance App',    
            'created_by'=> Auth::user()->id,
        ];
        $insert_history = HistoryLog::insert($data_history);

        if ($delete) {
            return redirect('pfa/pfa-income')->with('success', 'Data Deleted.');
        } else {
            return redirect('pfa/pfa-income')->with('error', 'Failed!');
        }
    }

    public function trash()
    {
        $income = MsIncome::where('flag', 0)->get();

        $data = [
            'income' => $income,
        ];
        // dd($data);

        return view('pfa/admin/income-trash')->with('data', $data);
    }

    public function restore(Request $request)
    {
        $data = [
            'flag' => 1,
        ];
        // dd($data);
        $restore = MsIncome::where('id', $request->id)->update($data);

        $data_history  = [
            'information' => 'Restore Data Income',
            'apps' => 'Personal Finance App',    
            'created_by'=> Auth::user()->id,
        ];
        $insert_history = HistoryLog::insert($data_history);
        
        if ($restore) {
            return redirect('pfa/pfa-income')->with('success', 'Data Restored.');
        } else {
            return redirect('pfa/pfa-income')->with('error', 'Failed!');
        }
    }
}
