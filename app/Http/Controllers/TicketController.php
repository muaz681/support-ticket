<?php

namespace App\Http\Controllers;
Use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Support;
use App\Models\SupportDetail;
use App\Models\Image;
use App\Models\Rating;
use App\Models\UserReply;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TicketController extends Controller
{

    public function ticket()

    {
        $id = Auth::user()->id;
        $data = User::find($id);
        return view('openticket',compact('data'));
    }

    public function storeData(Request $request)

    {
        $data = new SupportDetail();
        $data->user_id = Auth::user()->id;
        $data->user_name = $request->name;
        $data->user_email = $request->email;
        $data->subject = $request->subject;
        $data->department = $request->department;
        $data->priority = $request->priority;
        $data->message = $request->message;


       if($attachment = $request->file('attachment'))

            {

                $dest = 'Support/'.date('Ymd');
                $getext = date('Ymdhis'). '.' .$attachment->getClientOriginalExtension();
                $attachment->storeAs($dest, $getext);
                $data->attachment = $getext;

            }

      else

        {
            $data->attachment = '0';
        }

        $data->save();

        return redirect()->route('myticket')->with('success','Ticket created successfully.');

    }

    public function adminTicket()

    {

        $data = SupportDetail::latest()->paginate(5);
        return view('admin/myticket',['data' => $data]);

    }

    public function myTicket()

    {
        $data = SupportDetail::where('user_id', Auth::user()->id)->latest()->paginate(4);
        return view('myticket',['data' => $data]);
    }

    public function editTicket($id)

    {
        $data = SupportDetail::find($id);
        return view('admin/edit',compact('data'));
    }

    public function updateTicket(Request $request, $id )

    {
        SupportDetail::find($id)->update([
  
            'status' => $request->status

        ]);

        return redirect()->route('admin/ticket');
    }

    public function deleteTicket($id)

    {
        $data = SupportDetail::find($id)->delete();
        return redirect()->route('admin/ticket');
    }


    public function reply(Request $request, $id)
    {

         if ($attachment = $request->file('attachment')){

            foreach($attachment as $image){

            $dest = 'Support/'.date('Ymd');
            $getext = hexdec(uniqid()). '.' .$image->getClientOriginalExtension();
            $image->storeAs($dest,$getext);
            $image_path = $dest.'/'.$getext;

            Support::insert([
                'ticket_id' => $id,
                'role' => Auth::user()->role,
                'message' => $request->message,
                'attachment' => implode ("|" ,$image_path),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            }
        }

        else

        {
            Support::insert([
            'ticket_id' => $id,
            'role' => Auth::user()->role,
            'message' => $request->message,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ]);
        }

            return redirect()->back();

    }

    public function replyBlade($id)

    {
        $data = SupportDetail::find($id);
        $rating = DB::table('ratings')->where('ticket_id', $id)->first();
        $admin_reply = DB::table('supports')->where('ticket_id', $id)->get();
        return view('reply',compact('admin_reply','data','rating'));
    }

    public function userReply(Request $request, $id)
    {
        $image_path =array();

        if ($attachment = $request->file('attachment')){

           foreach($attachment as $image){

        $dest = 'Support/'.date('Ymd');
        $getext = hexdec(uniqid()). '.' .$image->getClientOriginalExtension();
        $image->storeAs($dest,$getext);
        $image_path[] = $dest.'/'.$getext;


       }

        Support::insert([
            'ticket_id' => $id,
            'attachment' => implode ("|" ,$image_path),
            'role' => Auth::user()->role,
            'message' => $request->message,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
    else

    {
        Support::insert([
            'ticket_id' => $id,
            'role' => Auth::user()->role,
            'message' => $request->message,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }

        return redirect()->back();

    }

    public function adminReply($id)

    {
        $data = SupportDetail::find($id);
        $rating = DB::table('ratings')->where('ticket_id', $id)->first();
        $admin_reply = DB::table('supports')->where('ticket_id', $id)->get();
        return view('admin/reply',['admin_reply' => $admin_reply, 'data' => $data, 'rating' => $rating]);
    }

    public function show(Request $request)
    {
        return view('show', ['image'=> $request->image]);

    }


    public function rating(Request $request,$id)
    {
        $data = new Rating();
        $data->ticket_id = $id;
        $data->comment = $request->comment;
        $data->value = $request->rating;
        $data->save();

        return redirect()->back();


    }
}
