<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Ticket Submitted</title>
</head>
<body>
    <h1>New Ticket Notification</h1>

    <p>A new ticket has been submitted:</p>
    
    <strong>Subject:</strong> {{ $ticket->subject }}<br>
    <strong>From:</strong> {{ $ticket->name }} ({{ $ticket->email }})<br>
    <strong>Description:</strong> {{ $ticket->description }}<br>
    <strong>Created At:</strong> {{ $ticket->created_at }}

    <p>Thank you!</p>
</body>
</html>
