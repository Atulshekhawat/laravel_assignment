<?php

namespace App\Http\Controllers\Api;

use App\Models\Userdata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function index(){

        $users = Userdata::all();

        if($users -> count()>0){
            $data = [
                'status' => 200,
                'users' => $users
            ];
            return response()->json($data,200);
        }else{
            $data = [
                'status' => 404,
                'users' => 'No Record Found'
            ];
            return response()->json($data,404);
        }

    }

    public function store(Request $request)
    {

        $validator = Validator::make($request ->all(),[
            'name' => 'required | max:190',
            'email' => 'required |email| max:190',
            'phoneNo' => 'required | digits:10'
        ]);

        if($validator->fails()){

            return response()->json([
                'status' => 422,
                'error' =>$validator -> messages()
            ],422); 
        }else{

            $user = userdata::create([
                'name' => $request->name,
                'email' => $request->email,
                'phoneNo' => $request->phoneNo
            ]);


            if($user){

                return response()-> json([
                    'status' => 200,
                    'message' => 'user data added sucessfully'
                ],200) ;

            }else{

                return response()-> json([
                    'status' => 500,
                    'message' => 'Data not added sucessfully'
                ],500) ;

            }
        }
    }
}
