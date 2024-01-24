<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// add
use App\Models\Tables\Blog\MsArtikel;
use App\Models\Tables\Blog\MsKategori;
use Illuminate\Support\Facades\Auth;

class MsArtikelController extends Controller
{
    public function index()
    {
        $artikels = MsArtikel::select('*', 'ma.id AS id')
                    ->from('ms_blog_artikel AS ma')
                    ->join('ms_blog_kategori AS mk', 'mk.id', '=', 'ma.id_kategori')
                    ->where('ma.flag', 1)
                    ->get();

        $data = [
            'artikel' => $artikels,
            'kategori' => MsKategori::where('flag', 1)->get(),
        ];
        // dd($data);

        return view('blog/admin/artikel')->with('data', $data);
    }

    public function create()
    {
        $artikels = MsArtikel::where('flag', 1)->get();

        $data = [
            'artikel' => $artikels,
            'kategori' => MsKategori::where('flag', 1)->get(),
        ];

        return view('blog/admin/artikel-create')->with('data', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'id_kategori' => 'required',
            // 'id_penulis' => 'required',
            'publikasi_date' => 'required',
        ]);
        $data  = [
            'judul' => $request->judul,
            'isi' => $request->isi,
            'id_kategori' => $request->id_kategori,
            'id_penulis' => Auth::user()->id,
            'publikasi_date' => $request->publikasi_date,
            'flag' => 1,
            'created_by'=> Auth::user()->id,
        ];
        // dd($data);
        $insert = MsArtikel::insert($data);

        // redirect
        if ($insert) {
            return redirect('/artikel')->with('success', 'Data created successfully.');
        } else {
            return redirect('/artikel')->with('error', 'Failed!');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $artikels = MsArtikel::select('*', 'ma.id AS id')
                    ->from('ms_blog_artikel AS ma')
                    ->join('ms_blog_kategori AS mk', 'mk.id', '=', 'ma.id_kategori')
                    ->where('ma.flag', 1)
                    ->where('ma.id', (int) $id)
                    ->get();

        $data = [
            'artikel' => $artikels,
            'kategori' => MsKategori::where('flag', 1)->get(),
        ];
        // dd($data);

        return view('blog/admin/artikel-edit')->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'id_kategori' => 'required',
            'publikasi_date' => 'required',
        ]);
        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
            'id_kategori' => $request->id_kategori,
            'publikasi_date' => $request->publikasi_date,
            'updated_by'=> Auth::user()->id,
        ];
        // dd($data);
        $update = MsArtikel::where('id', $request->id)->update($data);

        if ($update) {
            return redirect('/artikel')->with('success', 'Data updated successfully.');
        } else {
            return redirect('/artikel')->with('error', 'Failed!');
        }
    }

    public function destroy(Request $request)
    {
        $data = [
            'flag' => 0,
        ];
        // dd($data);
        $delete = MsArtikel::where('id', $request->id)->update($data);

        if ($delete) {
            return redirect('/artikel')->with('success', 'Data Deleted.');
        } else {
            return redirect('/artikel')->with('error', 'Failed!');
        }
    }

    public function trash()
    {
        $artikels = MsArtikel::where('flag', 0)->get();

        $data = [
            'artikel' => $artikels,
        ];
        // dd($data);

        return view('blog/admin/artikel-trash')->with('data', $data);
    }

    public function restore(Request $request)
    {
        $data = [
            'flag' => 1,
        ];
        // dd($data);
        $restore = MsArtikel::where('id', $request->id)->update($data);
        
        if ($restore) {
            return redirect('/artikel')->with('success', 'Data Restored.');
        } else {
            return redirect('/artikel')->with('error', 'Failed!');
        }
    }
}
