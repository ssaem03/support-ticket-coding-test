<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Ticket</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        .card {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f1f1f1;
        }

        .card-header {
            font-size: 20px;
            color: #495057;
            margin-bottom: 10px;
        }

        .card-body {
            font-size: 16px;
            color: #212529;
        }

        strong {
            color: #007bff;
        }

        .btn {
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            background-color: #007bff;
            color: white;
            border: none;
            display: inline-block;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ticket Details</h1>

        <div class="card">
            <div class="card-header">
                <h3>{{ $ticket->subject }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Name:</strong> {{ $ticket->name }}</p>
                <p><strong>Description:</strong> {{ $ticket->description }}</p>
                <p><strong>Submitted On:</strong> {{ $ticket->created_at }}</p>
                <p><strong>Email:</strong> {{ $ticket->email }}</p>
            </div>
        </div>

        <form action="{{ route('admin.tickets.close', $ticket->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn">Close Ticket</button>
        </form>

        <a href="{{ route('admin.tickets.index') }}" class="btn btn-secondary">Back to Tickets</a>
    </div>
</body>
</html>
