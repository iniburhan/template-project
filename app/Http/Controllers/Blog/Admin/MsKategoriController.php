<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// add
use App\Models\Tables\Blog\MsKategori;
use App\Models\Tables\HistoryLog;
use Illuminate\Support\Facades\Auth;

class MsKategoriController extends Controller
{
    public function index()
    {
        $kategori = MsKategori::where('flag', 1)->get();

        $data = [
            'kategori' => $kategori,
        ];
        // dd($data);

        return view('blog/admin/kategori')->with('data', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);
        $data  = [
            'nama_kategori' => $request->nama_kategori,
            'flag' => 1,
            'created_by'=> Auth::user()->id,
        ];
        // dd($data);
        $insert = MsKategori::insert($data);

        $data_history  = [
            'information' => 'Insert Data Kategori',
            'apps' => 'Blog',    
            'created_by'=> Auth::user()->id,
        ];
        $insert_history = HistoryLog::insert($data_history);

        // redirect
        if ($insert) {
            return redirect('blog/kategori')->with('success', 'Data created successfully.');
        } else {
            return redirect('blog/kategori')->with('error', 'Failed!');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);
        $data = [
            'nama_kategori' => $request->nama_kategori,
            'updated_by'=> Auth::user()->id,
        ];
        // dd($data);
        $update = MsKategori::where('id', $request->id)->update($data);

        $data_history  = [
            'information' => 'Update Data Kategori',
            'apps' => 'Blog',    
            'created_by'=> Auth::user()->id,
        ];
        $insert_history = HistoryLog::insert($data_history);

        if ($update) {
            return redirect('blog/kategori')->with('success', 'Data updated successfully.');
        } else {
            return redirect('blog/kategori')->with('error', 'Failed!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = [
            'flag' => 0,
        ];
        // dd($data);
        $delete = MsKategori::where('id', $request->id)->update($data);

        $data_history  = [
            'information' => 'Delete Data Kategori',
            'apps' => 'Blog',    
            'created_by'=> Auth::user()->id,
        ];
        $insert_history = HistoryLog::insert($data_history);

        if ($delete) {
            return redirect('blog/kategori')->with('success', 'Data Deleted.');
        } else {
            return redirect('blog/kategori')->with('error', 'Failed!');
        }
    }

    public function trash()
    {
        $kategori = MsKategori::where('flag', 0)->get();

        $data = [
            'kategori' => $kategori,
        ];
        // dd($data);

        return view('blog/admin/kategori-trash')->with('data', $data);
    }

    public function restore(Request $request)
    {
        $data = [
            'flag' => 1,
        ];
        // dd($data);
        $restore = MsKategori::where('id', $request->id)->update($data);

        $data_history  = [
            'information' => 'Restore Data Kategori',
            'apps' => 'Blog',    
            'created_by'=> Auth::user()->id,
        ];
        $insert_history = HistoryLog::insert($data_history);
        
        if ($restore) {
            return redirect('blog/kategori')->with('success', 'Data Restored.');
        } else {
            return redirect('blog/kategori')->with('error', 'Failed!');
        }
    }

    public function delete(Request $request)
    {
        // dd($request->id);
        $delete_trash = MsKategori::where('id', $request->id)->delete();

        $data_history  = [
            'information' => 'Delete Data Kategori in Trash',
            'apps' => 'Blog',    
            'created_by'=> Auth::user()->id,
        ];
        $insert_history = HistoryLog::insert($data_history);

        if ($delete_trash) {
            return redirect('blog/kategori/trash')->with('success', 'Data Deleted!.');
        } else {
            return redirect('blog/kategori/trash')->with('error', 'Failed!');
        }
    }
}
