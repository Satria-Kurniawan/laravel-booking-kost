<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function readData()
    {
        $roomsData = Room::all();

        return view('admin/manajemen-ruangan', compact('roomsData'));
    }

    public function createData(Request $request)
    {
        $request->validate([
            'kode_ruangan' => 'required|max:4',
            'fasilitas' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'foto' => 'required|file',
            'harga_sewa' => 'required|max:255',
            'status' => ''
        ]);

        $file = $request->file('foto');
        $fileName = $file->getClientOriginalName();
        $file->storeAs('public/images', $fileName);

        Room::create([
            'kode_ruangan' => $request->kode_ruangan,
            'fasilitas' => $request->fasilitas,
            'deskripsi' => $request->deskripsi,
            'foto' => $fileName,
            'harga_sewa' => $request->harga_sewa,
            'status' => $request->status,
        ]);

        return redirect()->route('dataRuangan')->with('message', 'Ruangan berhasil ditambahkan');
    }

    public function updateData(Request $request, $id)
    {
        $request->validate([
            'kode_ruangan' => 'required|max:4',
            'fasilitas' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'foto' => 'required|file',
            'harga_sewa' => 'required|max:255',
            'status' => 'required|max:10'
        ]);

        $roomsData = Room::findOrFail($id);
        $roomsData->kode_ruangan = $request->kode_ruangan;
        $roomsData->fasilitas = $request->fasilitas;
        $roomsData->deskripsi = $request->deskripsi;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('public/images', $fileName);
            $roomsData->foto = $fileName;
        }
        $roomsData->harga_sewa = $request->harga_sewa;
        $roomsData->status = $request->status;

        $roomsData->save();

        return redirect()->route('dataRuangan')->with('message', 'Ruangan berhasil diperbarui');
    }

    public function deleteData($id)
    {
        $roomsData = Room::findOrFail($id);
        $roomsData->delete();

        return redirect()->route('dataRuangan')->with('message', 'Ruangan berhasil dihapus');
    }
}
