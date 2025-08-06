<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Invoiceitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller
{
    function lists(Request $request)
    {
        $data = Invoice::all(); // Fetch all invoices
        return response()->json([
            'status' => 'success',
            'data' => $data,
            'status_code' => 200
        ]);
    }

     function create(Request $request){
        $validated = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'total' => 'required|numeric',
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
        $invoice = new Invoice();
        $invoice -> user_id = $request -> user_id;
        $invoice -> total = $request -> total;
        $invoice -> save();
        return response()->json([
            'status' => 'success',
            'new_data' => $invoice,
            'status_code' => 200
        ]);
    }

    function update(Request $request){
        $invoice = Invoice::find($request->id);
        if($invoice != null){
            $invoice -> user_id = $request -> user_id;
            $invoice -> total = $request -> total;
            $invoice -> save();
            return response()->json([
            'status' => 'success',
            'update_data' => $invoice,
            'status_code' => 200
        ]);
        }
    }

    function delete(Request $request){
        $invoice = Invoice::find($request->id);
        if($invoice != null){
            $invoice ->delete();
             return response()->json([
            'status' => 'success',
            'delete_data' => $invoice,
            'status_code' => 200
            ]);
        }else{
             return response()->json([
            'status' => 'resource not found',
            'status_code' => 404
            ]);
        }
    }
}
