<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// add
use App\Models\Tables\Blog\MsKategori;
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

        // redirect
        if ($insert) {
            return redirect('/kategori')->with('success', 'Data created successfully.');
        } else {
            return redirect('/kategori')->with('error', 'Failed!');
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

        if ($update) {
            return redirect('/kategori')->with('success', 'Data updated successfully.');
        } else {
            return redirect('/kategori')->with('error', 'Failed!');
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

        if ($delete) {
            return redirect('/kategori')->with('success', 'Data Deleted.');
        } else {
            return redirect('/kategori')->with('error', 'Failed!');
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
        
        if ($restore) {
            return redirect('/kategori')->with('success', 'Data Restored.');
        } else {
            return redirect('/kategori')->with('error', 'Failed!');
        }
    }
}
