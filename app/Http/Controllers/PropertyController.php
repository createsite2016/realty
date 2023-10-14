<?php

namespace App\Http\Controllers;

use App\Http\Requests\Property\PropertyStoreRequest;
use App\Http\Resources\Property\PropertyResource;
use App\Models\Property;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PropertyController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection|JsonResponse
    {
        if(auth()->user()){
            $properties = Property::paginate($request->paginator)->where('user_id',auth()->user()->getAuthIdentifier());
            return PropertyResource::collection($properties);
        }

        return response()->json([
            'message' => 'You dont have rights',
        ], status: 401);
    }

    public function show(Property $property): PropertyResource|JsonResponse
    {
        if($property->user_id === auth()->user()->getAuthIdentifier()){
            return PropertyResource::make($property);
        }

        return response()->json([
            'message' => 'You dont have rights',
        ], status: 401);
    }

    public function store(PropertyStoreRequest $request)
    {
        if(!auth()->user()){
            return response()->json([
                'message' => 'You dont have rights',
            ], status: 401);
        }
        $data = $request->validated();
        if($data){
            $property = new Property();
            $photosString = '';
            if($request->has('photos')) {
                $photos = $request->file('photos');
                if(is_array($photos)){
                    foreach($photos as $image) {
                        $path = public_path('storage/');
                        $filename = hash('sha256', $image->getClientOriginalName()).'.'.$image->getClientOriginalExtension();
                        $image->move($path, $filename);
                        if($image === end($photos)) {
                            $photosString .= $filename;
                        }
                        else {
                            $photosString .= $filename.',';
                        }

                    }
                    $property->photos = explode(',', $photosString);
                }
            }
            $property->user_id = auth()->user()->getAuthIdentifier();
            $property->property_type_id = $request->property_type_id;
            $property->title = $request->title;
            $property->rooms = $request->rooms;
            $property->description = $request->description;
            $property->realtor_comment = $request->realtor_comment;
            $property->price = $request->price;
            $property->currency_id = $request->currency_id;
            $property->country_id = $request->country_id;
            $property->city_id = $request->city_id;
            $property->address = $request->address;
            $property->gps_latitude = $request->gps_latitude;
            $property->gps_longitude = $request->gps_longitude;
            $property->is_published = $request->is_published;
            $property->save();

            return PropertyResource::make($property);
        }

        return $data;
    }

    public function destroy(Property $property)
    {
        if(!auth()->user()){
            return response()->json([
                'message' => 'You dont have rights',
            ], status: 401);
        }

        $property->delete();

        return response()->json([
            'message' => 'done'
        ]);
    }
}
