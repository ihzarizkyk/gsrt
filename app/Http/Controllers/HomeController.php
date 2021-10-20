<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Surat;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    public function index()
    {
        $data = Surat::all();
        return view("home",["surat" => $data]);
    }

    public function edit($id)
    {
        $data = Surat::find($id);
        return Response::json($data);
    }

    public function store(Request $req)
    {
        $surat = new Surat;
        $surat->subject = $req->subject;
        $surat->body = $req->body;
        $surat->save();

        return Response::json($surat);
    }

    public function update(Request $req,$id)
    {
        $surat = Surat::find($id);
        $surat->subject = $req->subject;
        $surat->body = $req->body;
        $surat->save();

        return Response::json($surat);
    }

    public function destroy($id)
    {
        $surat = Surat::find($id);
        $surat->delete();

        return Response::json($surat);
    }
}
