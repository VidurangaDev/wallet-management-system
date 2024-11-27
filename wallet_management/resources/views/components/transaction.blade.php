<div class="container">
    <h1>Transaction History</h1>


    <form method="GET" action="{{ route('transactions.index') }}">
        <div class="row">
            <div class="col-md-3">
                <label for="from_date">From Date</label>
                <input type="date" name="from_date" value="{{ request('from_date') }}" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="to_date">To Date</label>
                <input type="date" name="to_date" value="{{ request('to_date') }}" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="type">Transaction Type</label>
                <select name="type" class="form-control">
                    <option value="">All</option>
                    <option value="credit" {{ request('type') == 'credit' ? 'selected' : '' }}>Credit</option>
                    <option value="debit" {{ request('type') == 'debit' ? 'selected' : '' }}>Debit</option>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary mt-4">Filter</button>
            </div>
        </div>
    </form>


    <table class="table mt-4">
        <thead>
            <tr>
                <th>Date</th>
                <th>Amount</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
            <tr>
                <td>{{ $transaction->transaction_date->format('Y-m-d') }}</td>
                <td>{{ $transaction->amount }}</td>
                <td>{{ ucfirst($transaction->type) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>


    {{ $transactions->links() }}
</div>
