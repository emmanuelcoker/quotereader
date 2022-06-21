<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers;
use App\Models\User;

class UserNotificationsController extends Controller
{
     //show user notifications
     public function allNotifications(){
        $notifications = [
            'unread' => auth()->user()->unreadnotifications,
            'read' => auth()->user()->notifications()->whereNotNull('read_at')->get(),
        ];

        return Helpers::dataResponse($notifications, 200);
    } 

    //mark notification as read
    public function markNotification($id){
        $notification = auth()->user()->notifications()->find($id);
        if($notification) {
            $notification->markAsRead();
            $notification->delete(); 
            return Helpers::successResponse();
        }

        return Helpers::messageResponse('Notification not found!');
    }


    public function markAllNotifs(){

        try {
            $notifications = auth()->user()->notifications()->get();
            if(Helpers::checkIfEmpty($notifications) == false) {
                $notifications->markAsRead();
                foreach ($notifications as $notification) {
                    $notification->delete(); 
                }
    
                return Helpers::successResponse();
            }
            
            return Helpers::messageResponse('You do not have any notifications!');
        } catch (\Throwable $e) {
            return Helpers::throwError($e);
        }
     
    }
}
