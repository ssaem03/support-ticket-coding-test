<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Tickets</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .admin-button {
            float: right;
            padding: 10px 15px;
            background-color: #007bff; /* Bootstrap primary color */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .admin-button:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }
        .link-button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #28a745; /* Bootstrap success color */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .link-button:hover {
            background-color: #218838; /* Darker shade on hover */
        }
    </style>
</head>
<body>

    <h1>Your Tickets</h1>

    <!-- Admin button linking to the admin login page -->
    <a class="admin-button" href="{{ route('admin.login') }}">Admin Login</a>

    @if($tickets->isEmpty())
        <p>No tickets found.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Description</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->name }}</td>
                        <td>{{ $ticket->email }}</td>
                        <td>{{ $ticket->subject }}</td>
                        <td>{{ $ticket->description }}</td>
                        <td>{{ $ticket->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a class="link-button" href="{{ route('tickets.create') }}">Submit a New Ticket</a>

</body>
</html>
