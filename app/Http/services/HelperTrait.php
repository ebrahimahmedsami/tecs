<?php

namespace App\Http\services;

trait HelperTrait
{

    public function storeImage($file,$folder){
        $file = $file;
        $filename = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('dashboardAssets/images/'. $folder), $filename);
        return $filename;
    }

}
