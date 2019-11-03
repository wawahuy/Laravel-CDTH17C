<?php

namespace App\Components;

/**
 * Lớp single này được sử dụng với view notification.blade.php
 * Các thông bao được lưu vào session và gọi ở lần tiếp theo
 * Variable view: alert_type, alert_level, alert_message
 * Nó được áp dụng với redirect()
 * 
 */
trait Notification {

    protected static function notification($type = '', $level = 'success', $message){
        if (session()->has('notifications')) {
            $notifications = session()->pull('notifications');
        }
  
        $notifications[] = $notification = ['level' => $level, 'message' => $message, 'type' => $type];
  
        session()->flash('notifications', $notifications);
  
        return $notification;
    }

    protected static function getNotifications()
    {
        return self::hasNotifications() ? session()->pull('notifications') : [];
    }

    protected static function hasNotifications()
    {
        return session()->has('notifications');
    }

    protected static function success($message){
        return self::notification('', 'success', $message);
    }

    protected static function error($message){
        return self::notification('', 'error', $message);
    }

    protected static function sweet_success($message){
        return self::notification('sweet', 'success', $message);
    }

    protected static function sweet_error($message){
        return self::notification('sweet', 'error', $message);
    }
}

?>