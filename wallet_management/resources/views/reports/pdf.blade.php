<!DOCTYPE html>
<html>
<head>
    <title>Summary Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Summary Report</h2>
    <table>
        <thead>
            <tr>
                <th>Total Debits</th>
                <th>Total Credits</th>
                <th>Remaining Balance</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $totalDebits }}</td>
                <td>{{ $totalCredits }}</td>
                <td>{{ $remainingBalance }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
