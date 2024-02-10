<?php 

namespace App\Models; 

use Illuminate\Support\Facades\File;

class Post 
{
    public static function all() {
        $files = File::files(resource_path("posts"));
        return array_map(fn($file) => $file->getContents(), $files);
        //Run the function against every value in $files, to produce a value to insert into an array 
        //Basically transform each file in $files to get the content out 
    }

    public static function find($slug){
        $path = resource_path("posts/{$slug}.html");

        if (! file_exists($path)) {
            abort(404); 
        }
    
        return $post = file_get_contents($path);
    }
}