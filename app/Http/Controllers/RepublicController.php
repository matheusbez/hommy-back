<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Republic;
use App\User;

class RepublicController extends Controller
{
    public function createRepublic(Request $request) {

        $republic = new Republic;
        $republic->name = $request->name;
        $republic->adress = $request->adress;
        $republic->zipcode = $request->zipcode;
        $republic->phone = $request->phone;
        $republic->price = $request->price;
        $republic->bathrooms = $request->bathrooms;
        $republic->bedrooms = $request->bedrooms;
        $republic->save();
        return response()->json($republic);
    }

    public function showRepublic($id) {

        $republic = Republic::findOrFail($id);
        return response()->json($republic);
    }

    /* public function findRepublic($name) {

        $republic = Republic::where('name', $name)->first();
        return response()->json($republic);
    } */

    public function listRepublic() {

        $republic = Republic::all();
        return response()->json([$republic]);
    }

    public function updateRepublic(Request $request, $id) {

        $republic = Republic::findOrFail($id);
        if($request->name) {
            $republic->name = $request->name;
        }
        if($request->adress) {
            $republic->adress = $request->adress;
        }
        if($request->zipcode) {
            $republic->zipcode = $request->zipcode;
        }
        if($request->phone) {
            $republic->phone = $request->phone;
        }
        if($request->price) {
            $republic->price = $request->price;
        }
        if($request->bathrooms) {
            $republic->bathrooms = $request->bathrooms;
        }
        if($request->bedrooms) {
            $republic->bedrooms = $request->bedrooms;
        }
        $republic->save();
        return response()->json($republic);
    }

    public function deleteRepublic($id) {
        Republic::destroy($id);
        return response()->json(['Produto deletado']);
    }

    //FOREIGN KEY

    public function addUser($id, $user_id) {
        $user = User::findOrFail($user_id);
        $republic = Republic::findOrFail($id);
        $republic->user_id = $user_id;
        $republic->save();
        return response()->json($republic);
    }

    public function removeUser($id, $user_id) {
        $user = User::findOrFail($user_id);
        $republic = Republic::findOrFail($id);
        $republic->user_id = NULL;
        $republic->save();
        return response()->json($republic);
    }



}

