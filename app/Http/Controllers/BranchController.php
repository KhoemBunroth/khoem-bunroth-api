<?php

namespace App\Http\Controllers;

use App\Helpers\validation\validation;
use App\Models\Branch;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    function lists(Request $request)
    {
        $data = Branch::all();
        return response()->json([
            'status' => 'success',
            'data' => $data,
            'status_code' => 200
        ]);
    }

    function create(Request $request){
        $validated = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
        ]);

        $flatErrors = collect($validated->errors()->messages())->mapWithKeys(function($message, $field){
            return [$field => $message[0]];
        })->toArray();
        if ($validated->fails()) {
            return response()->json([
                'status' => 'error',
                'error' => $flatErrors,
                'status_code' => 422
            ]);
        }
        $branch = new Branch();
        $branch -> name = $request -> name;
        $branch -> location = $request -> location;
        $branch -> contact_number = $request -> contact_number;
        $branch -> save();
        return response()->json([
            'status' => 'success',
            'new_data' => $branch,
            'status_code' => 200
        ]);
    }

    function update(Request $request){
        $branch = Branch::find($request->id);
        if($branch != null){
            $branch -> name = $request -> name;
            $branch -> location = $request -> location;
            $branch -> contact_number = $request -> contact_number;
            $branch -> save();
            return response()->json([
            'status' => 'success',
            'update_data' => $branch,
            'status_code' => 200
        ]);
        }
    }

    function delete(Request $request){
        $branch = Branch::find($request->id);
        if($branch != null){
            $branch ->delete();
             return response()->json([
            'status' => 'success',
            'delete_data' => $branch,
            'status_code' => 200
            ]);
        }else{
             return response()->json([
            'status' => 'resouce not found',
            'status_code' => 200
            ]);
        }
    }
} 
