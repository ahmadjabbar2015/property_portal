<?php

namespace App\Utils;

use App\Models\amenitie;
use App\Models\location;
use App\Models\propertyimage;
use Exception;

use function PHPUnit\Framework\throwException;

class PropertyUtil extends Util
{
    public function createProperty( $data , $property_detail ){
        // request should have property data like images location and amenities
        $property_location = $data['property_location'];
        $property_location = $property_location + ['property_id' => $property_detail->id];
        $location = location::create($property_location);

        $property_amenities = $data['property_amenities'];
        $property_amenities =  $property_amenities + ['property_id' => $property_detail->id];
        $amenities = amenitie::create($property_amenities);

        $property_images = $data['property_images'];
        if($property_images != null){
            foreach($property_images as $image){
                if(file($image)){
                    $extension = $image->getClientoriginalExtension(); 
                    if(in_array($extension , ['PNG' , 'JPEG' , 'JPG'])){
                        $file_name = time() . "." . $extension;
                        propertyimage::create(['property_id' => $property_detail->id , 'propertyimage'=> $file_name]);
                        $image->move(public_path('/assets/img'),$file_name);
                    }else{
                        throw new Exception("Image Type not Supported");
                    }
                }
            }
        }
        
    }



 
}

