<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Imports\UserImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel; //library excel

class UserController extends Controller
{

    public function index(){
        //mengambil data user
        $users = User::get();
        //menampilkan halaman user dan mengirim variabel data berisi data user
        return view('user', ['users' => $users]);
    }

    public function __invoke(Request $request){
        //melakukan import file
        Excel::import(new UserImport, request()->file('file'));
        //jika berhasil kembali ke halaman sebelumnya
        return back();
    }
}