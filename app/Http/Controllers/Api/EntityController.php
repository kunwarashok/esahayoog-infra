<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Entity;
use App\Models\Transaction;
use Illuminate\Http\Request;

class EntityController extends Controller
{
    public function info(Request $request, $uniqueName){
        $success = false;
        $data = [];

        if($uniqueName){
            $entity = Entity::select("id", "name", "uniqueName","logo", "coverImage")->where("uniqueName", $uniqueName)->first();

            if($entity){
                $success = true;
                $data["entity"] = $entity;
            }
        }

        return response()->json([
            "success"=> $success,
            "data" => $data
        ]);
    }

    public function donate(Request $request){
        $success = true;
        $data = [];

        $res = $request->data;
        $transaction = new Transaction();

        // set the values to transaction object
        $transaction->entityId = $res["entityId"];
        $transaction->transactionId = $res["idx"];
        $transaction->amount = $res["amount"];
        $transaction->message = @$res["message"];
        $transaction->paymentMethod = $res["paymentMethod"];

        $transaction->save();

        return response()->json([
            "success"=> $success,
            "data" => $data
        ]);
    }
}
