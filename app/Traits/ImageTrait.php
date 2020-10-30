<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image ;
trait ImageTrait
{

    public function handel_img($img , $path , $img_old="" ,$dafault_img="")
    {
        $image = Image::make($img) ;
        $image->resize(300, null, function($radais){
            $radais->aspectRatio();
        });

        $imgName =  time() .'_'. $img->getClientOriginalName(); 
        $image->save(storage_path('app/public/images/'.$path.'/'.$imgName), 50);
        
        $default = 'storage/app/public/' . $dafault_img ;
        if(!empty($img_old) && $img_old != $default )
        {
            if (file_exists($img_old)) {
                @unlink($img_old);
            }
            
        }

        return 'images/'.$path.'/'.$imgName ;
    }


    public function edit_img($requst_img , $old ,$model, $default)
    {

        
        if($requst_img)
        {
            $final_path = $this->handel_img($requst_img , $model , $old , DEFAULT_IMG_USER) ;
        }else
        {
            if( $old == 'storage/app/public/')
            {
                $final_path = $default ;
            }else{
                $final_path = substr($old,19) ;
            }
        }
        return $final_path ;

    }
}