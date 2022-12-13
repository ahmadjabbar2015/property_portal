<?php

namespace App\Utils;

use App\Models\amenitie;
use App\Models\location;
use App\Models\propertyimage;

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
        dd($property_images);
        
       
      
        $propertyimage->save();
        foreach($property_images as $image){
            if(file($image->hasfile())){
                dd(true);
                $new_image = new propertyimage;
                $new_image = $image['property_id'];
                $new_image = $image['propertyimage'];
                $new_image->save();
                $file=$request->file('propertyimage');
                        $extention=$file->getClientoriginalExtension();
                        $filename=time().'.'.$extention;
                        
                        $data=$file->move(public_path('/assets/img'),$filename);
                        $propertyimage->propertyimage=$filename;
            

            }
            
        }
        dd($location);


    }



 
}

