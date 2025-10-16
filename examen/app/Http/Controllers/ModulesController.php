<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\User;
use Illuminate\Http\Request;

class ModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $modules=Module::all();
            return response()->json([
                ''=>$modules
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message'=>$th->getMessage()
            ]);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function activate($module_id, $user_id)
    {
        $module=Module::find($module_id);
        // $user=User::find($user_id);

        if (isset($module)) {
            try {
                //code...
                // $user->modules()->attach($module);

                
            } catch (\Throwable $th) {
                return response()->json([
                    ''=>$th->getMessage()
                ]);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
