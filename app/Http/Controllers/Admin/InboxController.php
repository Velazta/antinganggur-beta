<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;


class InboxController extends Controller
{
    public function inbox(Request $request)
    {
        // Sorting Id inbox pesan masuk
        $sortBy = $request->query('sort', 'id');
        $direction = $request->query('direction', 'desc');

        $sortableColumns = ['id', 'nama', 'email'];
        if (!in_array($sortBy, $sortableColumns)) {
            $sortBy = 'id';
        }
        if (!in_array($direction, ['asc', 'desc'])) {
            $direction = 'desc';
        }

        $messages = Contact::orderBy($sortBy, $direction)->paginate(5);

        return view('admin.inbox.inbox', [
            'messages' => $messages,
            'sortBy' => $sortBy,
            'direction' => $direction,
        ]);
    }
}
