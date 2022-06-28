<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Support;
use App\Models\SupportDetail;


class ApiController extends Controller
{
    public function getTicket(){
        $data =SupportDetail::all();
        return response()->json($data, 200);
    }
    
    public function createTicket(Request $request){
        $data = new SupportDetail();
        $data->user_name = $request->name;
        $data->user_email = $request->email;
        $data->subject = $request->subject;
        $data->department = $request->department;
        $data->priority = $request->priority;
        $data->message = $request->message;
        $data->attachment = '0';

        $result         = $data->save();

        if($result){
        return ["result" => "Data Save Succefully"];
        }
        else
        {
            return ["result" => "Something Wrong"];
        }

    }

    public function updateTicket(Request $request, $id){

        $data = SupportDetail::find($id);
        $data->update($request->all());

        return response("Update Succefully");
    }

    public function deleteTicket($id){
        $data = SupportDetail::findOrFail($id);
        if($data)
           $data->delete(); 
        else
            return response()->json(error);
        return response()->json(null);
    }
}
