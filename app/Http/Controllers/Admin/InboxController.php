<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;


class InboxController extends Controller
{
    public function inbox(Request $request)
    {
        // 3. Ambil parameter sorting dari URL, berikan nilai default
        $sortBy = $request->query('sort', 'id'); // Default urutkan berdasarkan 'id'
        $direction = $request->query('direction', 'desc'); // Default urutan 'desc' (menurun)

        // Keamanan: Pastikan hanya kolom yang aman yang bisa di-sort
        $sortableColumns = ['id', 'nama', 'email'];
        if (!in_array($sortBy, $sortableColumns)) {
            $sortBy = 'id';
        }
        if (!in_array($direction, ['asc', 'desc'])) {
            $direction = 'desc';
        }

        // 4. Ubah query untuk menggunakan parameter sorting
        $messages = Contact::orderBy($sortBy, $direction)->paginate(10);

        // 5. Kirim variabel sorting ke view
        return view('admin.inbox.inbox', [
            'messages' => $messages,
            'sortBy' => $sortBy,
            'direction' => $direction,
        ]);
    }
}
