<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class InboxController extends Controller
{
    public function inbox(Request $request)
    {
        $messages = collect([
            (object)[
                'id' => 1,
                'name' => 'Ravelin Lutfhan',
                'email' => 'robbyseptian@gmail.com',
                'message' => 'Halo, saya ingin menanyakan lebih lanjut tentang lowongan kerja yang tersedia.',
                'created_at' => Carbon::parse('2025-06-11 10:00:00'),
                'is_read' => false
            ],
            (object)[
                'id' => 2,
                'name' => 'Tito Rizqy',
                'email' => 'robbyseptian@gmail.com',
                'message' => 'Saya ingin mengajukan permohonan untuk posisi yang tersedia.',
                'created_at' => Carbon::parse('2025-06-22 12:30:00'),
                'is_read' => true
            ],
            (object)[
                'id' => 3,
                'name' => 'Rayhan Bagus Sadewa',
                'email' => 'robbyseptian@gmail.com',
                'message' => 'Saya ingin tahu lebih lanjut tentang proses rekrutmen yang sedang berlangsung.',
                'created_at' => Carbon::parse('2025-05-10 14:15:00'),
                'is_read' => false
            ],
            (object)[
                'id' => 4,
                'name' => 'Dimas Prasetya',
                'email' => 'robbyseptian@gmail.com',
                'message' => 'Saya ingin memberikan informasi tambahan terkait lamaran saya.',
                'created_at' => Carbon::parse('2025-07-01 09:00:00'),
                'is_read' => true
            ],
        ]);

        // untuk mensorting pesan dari id menngunakan request
        $sortColumn = $request->get('sort_column', 'id');
        $sortDirection = $request->get('sort_direction', 'desc');

        // $sortedMessages = $messages->sortBy($sortColumn, SORT_REGULAR, $sortDirection === 'desc');

        // if ($sortDirection === 'desc') {
        //     $sortedMessages = $sortedMessages->reverse();
        // }

        if ($sortDirection === 'desc') {
            $sortedMessages = $messages->sortByDesc($sortColumn);
        } else {
            $sortedMessages = $messages->sortBy($sortColumn);
        }


        return view('admin.inbox.inbox', [
            'messages' => $sortedMessages->values(),
            'sortColumn' => $sortColumn,
            'sortDirection' => $sortDirection
        ]);
        // return view('admin.inbox.inbox', compact('messages'));
    }
}
