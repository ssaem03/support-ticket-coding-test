<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class AdminTicketController extends Controller
{
    // Display all tickets for admin
    public function index()
    {
        $tickets = Ticket::all(); 
        return view('admin.index', compact('tickets')); 
    }

    // Show a specific ticket
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id); 
        return view('admin.show', compact('ticket')); 
    }
}
