<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Wisata;
use Exception;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Wisata::all();
        if ($data) {
            return ApiFormatter::createApi(200, 'Success get all wisata', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed get data', []);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'kategori_id' => 'required',
                'nama_wisata' => 'required',
                'slug' => 'required',
                'harga' => 'required',
                'deskripsi' => 'required',
                'kota' => 'required',
                'provinsi' => 'required',
                'alamat' => 'required',
                'waktu_buka' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
                'image' => 'required'
            ]);

            $wisata = Wisata::create([
                'kategori_id' => $request->kategori_id,
                'nama_wisata' => $request->nama_wisata,
                'slug' => $request->slug,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
                'kota' => $request->kota,
                'provinsi' => $request->provinsi,
                'alamat' => $request->alamat,
                'waktu_buka' => $request->waktu_buka,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'image' => $request->image
            ]);

            $data = Wisata::where('id', '=',  $wisata->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success created data wisata', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed create data wisata', []);
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed create data wisata' . $error, []);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Wisata::where('id', '=',  $id)->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success Get Detail data wisata', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed get detail data wisata', []);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    public function update(Request $request, $id)
    {
        try {
            $wisata = Wisata::findOrFail($id);

            $wisata->update([
                'kategori_id' => $request->kategori_id,
                'nama_wisata' => $request->nama_wisata,
                'slug' => $request->slug,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
                'kota' => $request->kota,
                'provinsi' => $request->provinsi,
                'alamat' => $request->alamat,
                'waktu_buka' => $request->waktu_buka,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'image' => $request->image
            ]);

            $data = Wisata::where('id', '=',  $wisata->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success Update data wisata', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed update data wisata', []);
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed update data wisata' . $error, []);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wisata = Wisata::findOrFail($id);
        $data = $wisata->delete();
        if ($data) {
            return ApiFormatter::createApi(200, 'Success Delete data wisata', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed Delete data wisata', []);
        }
    }
}
