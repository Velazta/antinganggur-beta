<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;


class NotificationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // Mengambil semua pesan (notifikasi) untuk user ini
        $notifications = Message::where('user_id', $user->id)
                           ->with('admin') // Memuat nama pengirim
                           ->latest()
                           ->paginate(5);

        return view('notification.index', compact('notifications'));
    }
}


