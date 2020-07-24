<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Republic;

class UserController extends Controller
{
    public function createUser(Request $request) {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->username = $request->username;
        $user->educationalInstitution = $request->educationalInstitution;
        $user->phone = $request->phone;
        $user->age = $request->age;
        $user->save();
        return response()->json($user);  
    }

    public function showUser($id) {

        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function listUser() {

        $user = User::all();
        return response()->json([$user]);
    }

    public function updateUser(Request $request, $id) {

        $user = User::findOrFail($id);
        if($request->name) {
            $user->name = $request->name;
        }
        if($request->email) {
            $user->email = $request->email;
        }
        if($request->password) {
            $user->password = $request->password;
        }
        if($request->username) {
            $user->username = $request->username;
        }
        if($request->educationalInstitution) {
            $user->educationalInstitution = $request->educationalInstitution;
        }
        if($request->phone) {
            $user->phone = $request->phone;
        }
        if($request->age) {
            $user->age = $request->age;
        }
        $user->save();
        return response()->json($user);
    }

    public function deleteUser($id) {
        User::destroy($id);
        return response()->json(['Produto deletado']);
    }

}
