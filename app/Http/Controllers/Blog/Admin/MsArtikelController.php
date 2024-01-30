<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// add
use App\Models\Tables\Blog\MsArtikel;
use App\Models\Tables\Blog\MsKategori;
use App\Models\Tables\HistoryLog;
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

        $data_history  = [
            'information' => 'Insert Data Artikel',
            'apps' => 'Blog',    
            'created_by'=> Auth::user()->id,
        ];
        $insert_history = HistoryLog::insert($data_history);

        // redirect
        if ($insert) {
            return redirect('blog/artikel')->with('success', 'Data created successfully.');
        } else {
            return redirect('blog/artikel')->with('error', 'Failed!');
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

    public function update(Request $request)
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

        $data_history  = [
            'information' => 'Update Data Artikel',
            'apps' => 'Blog',    
            'created_by'=> Auth::user()->id,
        ];
        $insert_history = HistoryLog::insert($data_history);

        if ($update) {
            return redirect('blog/artikel')->with('success', 'Data updated successfully.');
        } else {
            return redirect('blog/artikel')->with('error', 'Failed!');
        }
    }

    public function destroy(Request $request)
    {
        $data = [
            'flag' => 0,
        ];
        // dd($data);
        $delete = MsArtikel::where('id', $request->id)->update($data);

        $data_history  = [
            'information' => 'Delete Data Artikel',
            'apps' => 'Blog',    
            'created_by'=> Auth::user()->id,
        ];
        $insert_history = HistoryLog::insert($data_history);

        if ($delete) {
            return redirect('blog/artikel')->with('success', 'Data Deleted.');
        } else {
            return redirect('blog/artikel')->with('error', 'Failed!');
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

        $data_history  = [
            'information' => 'Restore Data Artikel',
            'apps' => 'Blog',    
            'created_by'=> Auth::user()->id,
        ];
        $insert_history = HistoryLog::insert($data_history);
        
        if ($restore) {
            return redirect('blog/artikel')->with('success', 'Data Restored.');
        } else {
            return redirect('blog/artikel')->with('error', 'Failed!');
        }
    }

    public function delete(Request $request)
    {
        // dd($request->id);
        $delete_trash = MsArtikel::where('id', $request->id)->delete();

        $data_history  = [
            'information' => 'Delete Data Artikel in Trash',
            'apps' => 'Blog',    
            'created_by'=> Auth::user()->id,
        ];
        $insert_history = HistoryLog::insert($data_history);

        if ($delete_trash) {
            return redirect('blog/artikel/trash')->with('success', 'Data Deleted!.');
        } else {
            return redirect('blog/artikel/trash')->with('error', 'Failed!');
        }
    }
}
