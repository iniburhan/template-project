<?php

namespace App\Http\Controllers\PFA\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// add
use App\Models\Tables\PFA\TrxTransaction;
use App\Models\Tables\PFA\TrxTransactionDetails;
use App\Models\Tables\PFA\MsIncome;
use App\Models\Tables\PFA\MsOutcome;
use App\Models\Tables\HistoryLog;
use Illuminate\Support\Facades\Auth;

class TrxTransactionController extends Controller
{
	// Transactions
    public function indexTrx()
    {
        $transaction = TrxTransaction::select('*', 'trx.id AS id', 'mi.information_name AS information_name', 'trx.income AS income', 'trx.periode_month AS periode_month')
        			->from('trx_pfa AS trx')
                    ->join('ms_pfa_income AS mi', 'mi.id', '=', 'trx.id_income')
                    ->where('trx.flag', 1)
                    ->get();

        $data = [
        	'transaction' => $transaction,
        	'income' => MsIncome::where('flag', 1)->get(),
            'outcome' => MsOutcome::where('flag', 1)->get(),
        ];
        // dd($data);

        return view('pfa/admin/transaction')->with('data', $data);
    }

    public function createTrx()
    {
        // $income = MsArtikel::where('flag', 1)->get();

        // $data = [
        //     'artikel' => $income,
        //     'kategori' => MsKategori::where('flag', 1)->get(),
        // ];

        // return view('blog/admin/artikel-create')->with('data', $data);
    }

    public function storeTrx(Request $request)
    {
        $request->validate([
            'id_income' => 'required',
            'income' => 'required',
            'periode_month' => 'required',
        ]);
        $data  = [
            'id_income' => $request->id_income,
            'income' => $request->income,
            'periode_month'=> $request->periode_month,
            'flag' => 1,
            'created_by'=> Auth::user()->id,
        ];
        // dd($data);
        $insert = TrxTransaction::insert($data);

        $data_history  = [
            'information' => 'Insert Data Transaction',
            'apps' => 'Personal Finance App',    
            'created_by'=> Auth::user()->id,
        ];
        $insert_history = HistoryLog::insert($data_history);

        // redirect
        if ($insert) {
            return redirect('pfa/pfa-transaction')->with('success', 'Data created successfully.');
        } else {
            return redirect('pfa/pfa-transaction')->with('error', 'Failed!');
        }
    }

    public function showTrx($id)
    {
        //
    }

    public function editTrx($id)
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

    public function updateTrx(Request $request)
    {
        $request->validate([
            'id_income' => 'required',
            'income' => 'required',
            'periode_month' => 'required',
        ]);
        $data = [
            'id_income' => $request->id_income,
            'income' => $request->income,
            'periode_month'=> $request->periode_month,
            'updated_by'=> Auth::user()->id,
        ];
        dd($data);
        $update = TrxTransaction::where('id', $request->id)->update($data);

        $data_history  = [
            'information' => 'Update Data Transaction',
            'apps' => 'Personal Finance App',    
            'created_by'=> Auth::user()->id,
        ];
        $insert_history = HistoryLog::insert($data_history);

        if ($update) {
            return redirect('/pfa-outcome')->with('success', 'Data updated successfully.');
        } else {
            return redirect('/pfa-outcome')->with('error', 'Failed!');
        }
    }

    public function destroyTrx(Request $request)
    {
        $data = [
            'flag' => 0,
        ];
        // dd($data);
        $delete = TrxTransaction::where('id', $request->id)->update($data);

        $data_history  = [
            'information' => 'Delete Data Transaction',
            'apps' => 'Personal Finance App',    
            'created_by'=> Auth::user()->id,
        ];
        $insert_history = HistoryLog::insert($data_history);

        if ($delete) {
            return redirect('/pfa-outcome')->with('success', 'Data Deleted.');
        } else {
            return redirect('/pfa-outcome')->with('error', 'Failed!');
        }
    }

    public function trashTrx()
    {
        $income = TrxTransaction::where('flag', 0)->get();

        $data = [
            'outcome' => $income,
        ];
        // dd($data);

        return view('pfa/admin/outcome-trash')->with('data', $data);
    }

    public function restoreTrx(Request $request)
    {
        $data = [
            'flag' => 1,
        ];
        // dd($data);
        $restore = TrxTransaction::where('id', $request->id)->update($data);

        $data_history  = [
            'information' => 'Restore Data Transaction',
            'apps' => 'Personal Finance App',    
            'created_by'=> Auth::user()->id,
        ];
        $insert_history = HistoryLog::insert($data_history);
        
        if ($restore) {
            return redirect('/pfa-outcome')->with('success', 'Data Restored.');
        } else {
            return redirect('/pfa-outcome')->with('error', 'Failed!');
        }
    }

    // Transaction Details
    public function indexTrxDetail($id)
    {
    	$transaction_details = TrxTransactionDetails::select('*', 'trx_detail.id AS id', 'mo.information_name AS information_name_outcome', 'trx_detail.outcome AS outcome')
        			->from('trx_pfa_details AS trx_detail')
        			->join('trx_pfa AS trx', 'trx.id', '=', 'trx_detail.id_trx')
                    ->join('ms_pfa_outcome AS mo', 'mo.id', '=', 'trx_detail.id_outcome')
                    ->where('trx_detail.flag', 1)
                    ->get();

        $data = [
        	'transaction_detail' => $transaction_details,
        	'income' => MsIncome::where('flag', 1)->get(),
            'outcome' => MsOutcome::where('flag', 1)->get(),
        ];
        // dd($data);

        return view('pfa/admin/transaction-detail')->with('data', $data);
    }
}
