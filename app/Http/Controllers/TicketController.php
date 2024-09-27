<?php

namespace App\Http\Controllers;

use App\Mail\TicketClosedMail;
use App\Mail\TicketSubmittedMail; 
use Illuminate\Support\Facades\Mail; 
use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    
    public function create()
    {
        return view('tickets.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'subject' => 'required|max:255',
            'description' => 'required',
        ]);

        // Create a new ticket
        $ticket = Ticket::create($request->all());

        // Send email to admin about the new ticket
        Mail::to('admin@example.com')->send(new TicketSubmittedMail($ticket)); 

        return redirect()->route('tickets.index')->with('success', 'Ticket submitted successfully!');
    }

        public function destroy($id)
        {
            $ticket = Ticket::find($id);
            
            if (!$ticket) {
                return redirect()->route('admin.tickets.index')->with('error', 'Ticket not found.');
            }

            $ticket->delete();

            return redirect()->route('admin.tickets.index')->with('success', 'Ticket deleted successfully.');
        }

    // Display all tickets
    public function index()
    {
        $tickets = Ticket::all(); 
        return view('tickets.index', compact('tickets')); 
    }

    // Close the ticket and send closure notification to the customer
    public function close($id)
    {
        $ticket = Ticket::find($id);
        if (!$ticket) {
            return redirect()->route('admin.tickets.index')->with('error', 'Ticket not found.');
        }

        // Send closure notification to the customer
        Mail::to($ticket->email)->send(new TicketClosedMail($ticket));


        
        return redirect()->route('admin.tickets.index')->with('success', 'Ticket closed and customer notified.');
    }
}
