<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class ArtikelModel {

    public static function get_all() {
        $items = DB::table('article')->get();
        return $items;
    }

    public static function save($data) {
        $new_item = DB::table('article')->insert($data);
        return $new_item;
    }

    public static function findById($id) {
        $item = DB::table('article')
                    ->where('id', $id)
                    ->first();
        return [$item];
    }

    public static function update($request, $id){
        //dd($request);
        $item = DB::table('article')
                    ->where('id', $id)
                    ->update([
                        'judul' => $request['judul'],
                        'isi'   => $request['isi'],
                        'slug'   => $request['slug'],
                        'tag'   => $request['tag'],
                        'tanggal_diperbarui' => $request['tanggal_diperbarui']
                    ]);
        return $item;
    }

    public static function delete($id) {
        $del = DB::table('article')
                    ->where('id', $id)
                    ->delete();
        return $del;
    }
}

?>