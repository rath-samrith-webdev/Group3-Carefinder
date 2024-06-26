<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['success'=>true,'data'=>Hospital::all()],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $uid=Auth::id();
        $data=$request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'street_address' => 'string',
            'village' => 'string',
            'district' => 'string',
            'province' => 'string',
            'latitude' => 'string',
            'longitude' => 'string',
        ]);
        $data['user_id']=$uid;
        try {
            $hospital=Hospital::create($data);
            return response()->json(['success'=>true,'data'=>$hospital],201);
        }catch (\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage()],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Hospital $hospital)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hospital $hospital)
    {
        $uid=Auth::id();
        $data=$request->validate([
            'name' => 'required',
            'category_id' => 'exists:categories,id',
            'street_address' => 'string',
            'village' => 'string',
            'commune' => 'string',
            'district' => 'string',
            'province' => 'string',
            'latitude' => 'string',
            'longitude' => 'string',
        ]);
        try {
            if($hospital->user_id==$uid){
                $hospital->update($data);
                return response()->json(['success'=>true,'data'=>$hospital],201);
            }else{
                return response()->json(['success'=>false,'message'=>'You are not authorized to access this page.'],401);
            }
        }catch (\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage()],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hospital $hospital)
    {
        $uid=Auth::id();
        try {
            if($hospital->user_id==$uid){
                $hospital->delete();
                return response()->json(['success'=>true,'message'=>'Hospital has been deleted','data'=>$hospital],201);
            }else{
                return response()->json(['success'=>false,'message'=>'You can not delete this!'],500);
            }
        }catch (\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage()],500);
        }
    }
}
