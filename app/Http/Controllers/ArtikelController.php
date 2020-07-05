<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArtikelModel;
use Carbon\Carbon;
use Redirect;

class ArtikelController extends Controller
{
    public function index() {
        $articles = ArtikelModel::get_all();
        //dd($items);
        return view('artikel.index', compact('articles'));
    }

    public function create() {
        return view('artikel.form');
    }

    public function store(Request $request) {
        $data = $request->all();
        unset($data["_token"]);
        $dt = array("tanggal_dibuat" => Carbon::now('Asia/Jakarta')->toDateTimeString());
        $slug = strtolower(str_replace(' ', '-', $data["judul"]));
        $sl = array("slug" => $slug);
        $uid = array("user_id" => "restuadi");
        $data = array_merge($data, $dt, $sl, $uid);
        //dd($data);
        $item = ArtikelModel::save($data);
        return redirect('/artikel');
    }

    public function show($id) {
        $articlex = ArtikelModel::findById($id);
        //dd($articlex);
        return view('artikel.detail', compact('articlex'));
    }

    public function edit($id) {
        $articlex = ArtikelModel::findById($id);
        $article = $articlex[0];
        return view('artikel.formEdit', compact('article'));
    }

    public function update(Request $request, $id) {
        $data = $request->all();
        $dt = array("tanggal_diperbarui" => Carbon::now('Asia/Jakarta')->toDateTimeString());
        $slug = strtolower(str_replace(' ', '-', $data["judul"]));
        $sl = array("slug" => $slug);
        $data = array_merge($data, $dt, $sl);
        $item = ArtikelModel::update($data, $id);
        return redirect('/artikel');
    }

    public function destroy($id) {
        $delete = ArtikelModel::delete($id);
        return redirect('/artikel');
    }
}
