<?php

namespace App\Http\Controllers\Api;

use App\Events\DonationCompleted;
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
            $entity = Entity::select("id", "name", "uniqueName", "entityType","logo", "coverImage")->where("uniqueName", $uniqueName)->first();

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
        $message = "";
        $data = [];

        $res = $request->data;

        // set the transaction object
        $transaction = new Transaction();

        $transaction->entityId = $res["entityId"];
        $transaction->transactionId = $res["idx"];
        $transaction->amount = $res["amount"];
        $transaction->message = @$res["message"];
        $transaction->paymentMethod = $res["paymentMethod"];

        $transaction->save();

        $eventData = [
            "username" => $res["name"],
            "amount" => $res["amount"],
            "message" => $res["message"]
        ];

        // dispatch the event so that notification for donation could be sent
        event(new DonationCompleted($eventData));

        return response()->json([
            "success"=> $success,
            "data" => $data,
            "message" => $message
        ]);
    }
}
