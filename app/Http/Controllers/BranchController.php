<?php

namespace App\Http\Controllers;

use App\Helpers\validation\validation;
use App\Models\Branch;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *     title="Fake Mart API Documentation",
 *     version="1.0.0",
 *     description="This is the API documentation for my Laravel app.",
 * )
 */


class BranchController extends Controller
{


    /**
     * @OA\Get(
     *     path="/api/branch/lists",
     *     summary="Get list of branches",
     *     tags={"Branch"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     )
     * )
     */

    public function index(){
        return Branch::all();
    }
 

    function lists(Request $request)
    {
        $data = Branch::all();
        return response()->json([
            'status' => 'success',
            'data' => $data,
            'status_code' => 200
        ]);
    }

    /**
     * @OA\Post(
     *     path="/api/branch/create",
     *     summary="Create a new branch",
     *     description="Creates a new branch with name, location, and contact number.",
     *     operationId="createBranch",
     *     tags={"Branch"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "location", "contact_number"},
     *             @OA\Property(property="name", type="string", example="Main Branch"),
     *             @OA\Property(property="location", type="string", example="Phnom Penh"),
     *             @OA\Property(property="contact_number", type="string", example="012345678")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Branch created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string", example="success"),
     *             @OA\Property(property="new_data", type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="name", type="string", example="Main Branch"),
     *                 @OA\Property(property="location", type="string", example="Phnom Penh"),
     *                 @OA\Property(property="contact_number", type="string", example="012345678"),
     *                 @OA\Property(property="created_at", type="string", example="2025-08-06T12:00:00.000000Z"),
     *                 @OA\Property(property="updated_at", type="string", example="2025-08-06T12:00:00.000000Z")
     *             ),
     *             @OA\Property(property="status_code", type="integer", example=200)
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string", example="error"),
     *             @OA\Property(property="error", type="object",
     *                 @OA\Property(property="name", type="string", example="The name field is required."),
     *                 @OA\Property(property="location", type="string", example="The location field is required."),
     *                 @OA\Property(property="contact_number", type="string", example="The contact number field is required.")
     *             ),
     *             @OA\Property(property="status_code", type="integer", example=422)
     *         )
     *     )
     * )
     */


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


        /**
     * @OA\Post(
     *     path="/api/branch/update",
     *     summary="Update a branch by ID",
     *     description="Updates a branch with the provided ID, name, location, and contact number.",
     *     operationId="updateBranch",
     *     tags={"Branch"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"id", "name", "location", "contact_number"},
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="name", type="string", example="Updated Branch Name"),
     *             @OA\Property(property="location", type="string", example="Siem Reap"),
     *             @OA\Property(property="contact_number", type="string", example="098765432")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Branch updated successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string", example="success"),
     *             @OA\Property(property="update_data", type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="name", type="string", example="Updated Branch Name"),
     *                 @OA\Property(property="location", type="string", example="Siem Reap"),
     *                 @OA\Property(property="contact_number", type="string", example="098765432"),
     *                 @OA\Property(property="created_at", type="string", example="2025-08-06T12:00:00.000000Z"),
     *                 @OA\Property(property="updated_at", type="string", example="2025-08-06T12:10:00.000000Z")
     *             ),
     *             @OA\Property(property="status_code", type="integer", example=200)
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Branch not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string", example="resource not found"),
     *             @OA\Property(property="status_code", type="integer", example=404)
     *         )
     *     )
     * )
     */



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

            
    /**
     * @OA\Post(
     *     path="/api/branch/delete",
     *     summary="Delete a branch by ID (POST version)",
     *     description="Deletes a branch if the given ID exists. This uses POST instead of DELETE for compatibility reasons.",
     *     operationId="postDeleteBranch",
     *     tags={"Branch"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"id"},
     *             @OA\Property(property="id", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Branch deleted successfully or resource not found",
     *         @OA\JsonContent(
     *             oneOf={
     *                 @OA\Schema(
     *                     @OA\Property(property="status", type="string", example="success"),
     *                     @OA\Property(property="delete_data", type="object",
     *                         @OA\Property(property="id", type="integer", example=1),
     *                         @OA\Property(property="name", type="string", example="Main Branch"),
     *                         @OA\Property(property="location", type="string", example="Phnom Penh"),
     *                         @OA\Property(property="contact_number", type="string", example="012345678"),
     *                         @OA\Property(property="created_at", type="string", example="2025-08-06T12:00:00.000000Z"),
     *                         @OA\Property(property="updated_at", type="string", example="2025-08-06T12:00:00.000000Z")
     *                     ),
     *                     @OA\Property(property="status_code", type="integer", example=200)
     *                 ),
     *                 @OA\Schema(
     *                     @OA\Property(property="status", type="string", example="resource not found"),
     *                     @OA\Property(property="status_code", type="integer", example=200)
     *                 )
     *             }
     *         )
     *     )
     * )
     */



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
