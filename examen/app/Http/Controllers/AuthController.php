<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered; //handles the import
use Illuminate\Support\Facades\DB;



class AuthController extends Controller
{



    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request)

    {
        try {
            // DB::beginTransaction();

            $request->validate([
                'name' => 'required|string|min:8',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),

            ]);

            return response()->json([
                'user' => $user,
            ], 201);
        } catch (\Throwable $th) {
            //throw $th;
            // DB::
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }

    public function login(Request $request)

    {
        try {

            $credential_valid = $request->validate([
                'email' => 'required|string|email|exists:users',
                'password' => 'required|string|min:8',
            ]);

            if (!isset($credential_valid)) {
                return response()->json([
                    'message' => 'Credentials is not valid'
                ], 401);
            }

            $user = User::where(['email' => $request->email])->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json(['message'=>'The credentials are not correct'], 401);
            }
                $token = $user->createToken($user->name);

            return response()->json([
                'token' => $token->plainTextToken,
                'user_id'=>$user->id
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            // DB::
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
