<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    { 
        return view('master_items.index.kategorilist', );
    }

    public function getkategori(){
        $data = Kategori::orderBy('nama')->get();

        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }


    public function formView($method, $id = 0)
    {
        if ($method == 'new') {
            $category = [];
        } else {
            $category = Kategori::findOrFail($id);
        }

        $data['category'] = $category;
        $data['method'] = $method;

        return view('master_items.form.kategoriform', $data);
    }

    public function singleView($id)
    {
        $data['data'] = Kategori::where('id', $id)->first();
        return view('master_items.single.kategori', $data);
    }

    public function kategoricreate(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|string',
        ]);

         $kode = Kategori::count('id');
            $kode = $kode + 1;
            $kode = str_pad($kode, 5, '0', STR_PAD_LEFT);
            sleep(3);

       $kategori = Kategori::create([
            'nama' => $validate['nama'],
            'kode_kategori' => $kode
        ]);

        return redirect('master-items');

    }

   public function show($id)
{
    $kategori = Kategori::findOrFail($id);
    return response()->json($kategori);
}

public function update(Request $request, $id)
{
    $kategori = Kategori::findOrFail($id);

    $validate = $request->validate([
        'nama' => 'required|string',
    ]);

    $kategori->update([
        'nama' => $validate['nama']
    ]);

    return response()->json([
        'status' => 'success',
        'message' => 'Kategori berhasil diupdate'
    ]);
}
    public function destroy($id)
{
    $kategori = Kategori::findOrFail($id);
    $kategori->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'Kategori berhasil dihapus'
    ]);
}

}
