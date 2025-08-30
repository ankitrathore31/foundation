<?php

namespace App\Http\Controllers;

use App\Models\academic_session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function sessionlist()
    {
        $data = academic_session::all();
        Session::put('all_academic_session', $data);
        return view('ngo.session.session-list', compact('data'));
    }

    public function addsession()
    {
        return view('ngo.session.add-session');
    }



    public function SaveSession(Request $request)
    {
        // Step 1: Get last session (most recent)
        $lastSession = academic_session::orderByDesc('session_date')->first();

        if ($lastSession) {
            // Step 2: Generate next session string from last one
            [$start, $end] = explode('-', $lastSession->session_date);
            $nextSession = (int)$start + 1 . '-' . (int)$end + 1;
        } else {
            // Fallback if no session exists
            $nextSession = date('Y') . '-' . (date('y') + 1); // e.g., 2025-26
        }

        // Step 3: Check if next session already exists
        if (academic_session::where('session_date', $nextSession)->exists()) {
            return redirect()->route('add-session')->with('Error', 'Session "' . $nextSession . '" already exists.');
        }

        // Step 4: Create and save the session
        $session = new academic_session;
        $session->session_date = $nextSession;
        $session->status = 1;
        $session->save();

        // Step 5: Update session list in session storage
        Session::put('all_academic_session', academic_session::all());

        return redirect()->route('add-session')->with('Success', 'Session "' . $session->session_date . '" created successfully!');
    }

    public function editsession($id)
    {
        $session = academic_session::findOrFail($id);
        return view('ngo.session.edit-session', compact('session'));
    }

    public function updatesession(Request $request, $id)
    {
        // Validate the session format and uniqueness (excluding the current record)
        $request->validate([
            'session' => ['required', 'regex:/^\d{4}-\d{2}$/', 'unique:academic_sessions,session_date,' . $id],
        ]);

        // Find the session to update
        $session = academic_session::findOrFail($id);

        // Update the session
        $session->session_date = $request->session;
        $session->status = 1;
        $session->save();

        // Update session list in session storage
        Session::put('all_academic_session', academic_session::all());

        return redirect()->route('session-list')->with('Success', 'Session "' . $request->session . '" updated successfully!');
    }

    public function deletesession($id)
    {
        $session = academic_session::findOrFail($id);
        $session->delete();

        // Update session list in session storage
        Session::put('all_academic_session', academic_session::all());

        return redirect()->back()->with('Success', 'Session "' . $session->session_date . '" deleted successfully!');
    }
}
