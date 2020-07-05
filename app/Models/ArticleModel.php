<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleModel 
{
    public static function get_all(){
        $articles = DB::table('articles')->orderBy('id', 'desc')->get();
        return $articles;
    } 

    
      public static function save($data){
       
        $new_article = DB::table('articles')->insert(
            [
                'title' => $data['title'],
                'content' => $data['content'],
                'slug' => Str::slug($data['title'], '-'),
                'users_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        return $new_article;
    }

   
    public static function find_id($id){
        $article = DB::table('articles')->where('id',$id)->first();
        return $article;
    }

  
    public static function update($id,$request){
        $update_article = DB::table('articles')
        ->where('id',$id)
        ->update(
            [
                'title' => $request['title'],
                'content' => $request['content'],
                'updated_at' => now()
            ]
        );
        return $update_article;
    }

    public static function destroy($id){
        $delete_article = DB::table('articles')
        ->where('id',$id)
        ->delete();

        return $delete_article;
    }
}
