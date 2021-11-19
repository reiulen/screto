<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function buat(Request $request)
    {
        $message = [
            'required' => '*Nama harus diisi!'
        ];
        $request->validate([
            'nama' => 'required'
        ], $message);

        User::create([
            'nama' => $request->nama
        ]);

        $user = User::latest()->first();

        Auth::login($user);

        return redirect('pertanyaan/'.$user->id);

    }

    public function pertanyaan(User $user)
    {
        $user = $user;
        $komentar = $user->komentar->load(['user']);
        return view('pertanyaan', compact('user', 'komentar'));
    }

    public function kirim($id, Request $request)
    {

        if($request->komen == null){
            return back();
        }

        if($request->type == 'a'){
            $message =[
            'required' => 'Pesan belum diisi!'
            ];

            $request->validate([
            'komen' => 'required'
            ], $message);

            $status = 'Tanya';
        }elseif($request->type== 'b'){
            $status = 'Balas';
        }else{
            return back();
        }

        if($request->id){
            $komenid = $request->id;
        }else{
            $komenid = null;
        }

        Komentar::create([
            'user_id' => $id,
            'komen' => $request->komen,
            'status' => $status,
            'komen_id' => $komenid,
        ]);

        return back();
    }

    public function destroy($id)
    {   
        Komentar::findorFail($id)->delete($id);
        return back();
    }
}
