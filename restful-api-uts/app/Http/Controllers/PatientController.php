<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    // method index (menampilkan seluruh data pasien)
    public function index()
    {
        $patients = Patient::all();
        $data = [
            'message' => 'Menampilkan seluruh data pasien',
            'data' => $patients
        ];

        // mengembalikan data ke json dan kode status
        return response()->json($data, 200);
    }

    // method store (tambah data)
    public function store(Request $request)
    {
        // menangkap data request
        $input = [
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status,
            'in_date_at' => $request->in_date_at,
            'out_date_at' => $request->out_date_at 
        ];

        //insert data
        $patient = Patient::create($input);

        $data = [
            'message' => 'Menambahkan data pasien berhasil',
            'data' => $patient
        ];

        // mengembalikan data json dan kode status
        return response()->json($data, 201);
    }

    // method show (detail pasien)
    public function show($id)
    {
        $patient = Patient::find($id);

        if ($patient) {
            $data = [
            'message' => 'Menampilkan detail pasien',
            'data' => $patient
        ];

        // mengembalikan data json dan kode status
        return response()->json($data, 200);
        }
        else {
            $data = [
            'message' => 'Data tidak ditemukan'
        ];

        // mengembalikan data json dan kode status
        return response()->json($data, 404);
        }
    }

    // method update (mengupdate data pasien)
    public function update(Request $request, $id)
    {
        // cari id
        $patient = Patient::find($id);

        // kalau $id ditemukan maka jalankan kode
        if ($patient) {
            $input = [
                'name' => $request->name ?? $patient->name,
                'phone' => $request->phone ?? $patient->phone,
                'address' => $request->address ?? $patient->address,
                'status' => $request->status ?? $patient->status,
                'in_date_at' => $request->in_date_at ?? $patient->in_date_at,
                'out_date_at' => $request->out_date_at ?? $patient->out_date_at
            ];

            $patient->update($input);

            $data = [
            'message' => 'Mengupdate data pasien',
            'data' => $patient
        ];

        // mengembalikan data json dan kode status
        return response()->json($data, 200);
        }

        // jika $id tidak ditemukan
        else {
            $data = [
            'message' => 'Data tidak ditemukan'
        ];

        // mengembalikan data json dan kode status
        return response()->json($data, 204);
        }
    }

    //method delete (menghapus data)
    public function destroy($id)
    {
        $patient = Patient::find($id);

        if ($patient) {

            // hapus data
            $patient->delete($id);

            //tampilkan pesan sukses
            $data = [
            'message' => 'Data telah dihapus',
        ];

        // mengembalikan data json dan kode status
        return response()->json($data, 200);
        }
        else {
            // tampilkan pesan gagal
            $data = [
            'message' => 'Data tidak ditemukan'
        ];

        // mengembalikan data json dan kode status
        return response()->json($data, 404);
        }
    }
    
    // method search (detail pasien)
    public function search($name)
    {
        $patient = Patient::where('name', 'like', "%$name%")->get();

        if ($patient) {
            $data = [
            'message' => 'Menampilkan data pasien',
            'data' => $patient
        ];

        // mengembalikan data json dan kode status
        return response()->json($data, 200);
        }
        else {
            $data = [
            'message' => 'Data tidak ditemukan'
        ];

        // mengembalikan data json dan kode status
        return response()->json($data, 404);
        }
    }

    // method search by status
    public function positive()
    {
        $patient = Patient::where('status', 'like', "%positive%")->get();
        $total = count($patient);

        $data = [
            'message' => 'Menampilkan data pasien',
            'total' => $total,
            'data' => $patient
        ];

        // mengembalikan data json dan kode status
        return response()->json($data, 200);
    }    
    
    // method search by status
    public function recovered()
    {
        $patient = Patient::where('status','like', "%recovered%")->get();
        $total = count($patient);

        $data = [
            'message' => 'Menampilkan data pasien',
            'total' => $total,
            'data' => $patient
        ];

        // mengembalikan data json dan kode status
        return response()->json($data, 200);
    } 

    // method search by status
    public function dead()
    {
        $patient = Patient::where('status', 'like', "%dead%")->get();
        $total = count($patient);

        $data = [
            'message' => 'Menampilkan data pasien',
            'total' => $total,
            'data' => $patient
        ];

        // mengembalikan data json dan kode status
        return response()->json($data, 200);
    } 
}
