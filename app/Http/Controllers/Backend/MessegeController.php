<?php

namespace App\Http\Controllers\Backend;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\MessegeNotification;
use Illuminate\Support\Facades\Notification;

class MessegeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('backend.messege.index',[
            'notifications' => Auth::user()->notifications
        ]);
    }

    public function view()
    {
        $users = User::all();
        $roles = Role::all();
        return view('backend.messege.guest', compact('users', 'roles'));
    }

    

    public function save(Request $request)
    {
        // return $request;
        $user = User::find($request->receiver);
        $senderId = Auth::user()->id;
        $guestName = $request->guestName;
        $messeges = "$request->guestName with contact number $request->mobile is $request->purpose $request->guestAddress. They are accompanied by $request->nop guests with the purpose of $request->purpose .";
        Notification::send($user, new MessegeNotification($senderId, $guestName, $messeges));
        notify()->success("Messege","Messege Send Success");
        return redirect()->route('app.messege');
    }


    /**
     * Show the form for creating a new resource.
     */
    
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $user = User::find($request->user);
        $senderId = Auth::user()->id;
        $guestName = Auth::user()->name;
        $messeges = $request->message;
        Notification::send($user, new MessegeNotification($senderId, $guestName, $messeges));
        notify()->success("Messege","Messege Send Success");
        return redirect()->route('app.messeges.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        $notifications = Auth::user()->unreadNotifications;
        // $notifications->markAsRead();
        return view('backend.messege.form', [
            'notifications' => Auth::user()->notifications,
            'user' =>$user->id
        ]);
    }

    public function marsAsRead(string $id)
    {
        foreach (Auth::user()->unreadNotifications as $notification) {
            if($notification->data['sender_id'] == $id)
            {
                $notification->markAsRead();
                return redirect()->back();
            }
        }
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
