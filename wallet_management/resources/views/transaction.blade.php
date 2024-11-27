<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('TRANSACTION HISTORY') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mt-5">
                    <h1 class="mb-4">Transaction List</h1>

                    <!-- Filter Form -->
                    <form method="GET" action="{{ route('transactions.index') }}">
                        <div class="row">
                            <!-- From Date -->
                            <div class="col-md-3 mb-3">
                                <label for="from_date" class="form-label">From Date</label>
                                <input type="date" name="from_date" value="{{ request('from_date') }}" class="form-control">
                            </div>

                            <!-- To Date -->
                            <div class="col-md-3 mb-3">
                                <label for="to_date" class="form-label">To Date</label>
                                <input type="date" name="to_date" value="{{ request('to_date') }}" class="form-control">
                            </div>

                            <!-- Transaction Type -->
                            <div class="col-md-3 mb-3">
                                <label for="type" class="form-label">Transaction Type</label>
                                <select name="type" class="form-select">
                                    <option value="">All</option>
                                    <option value="credit" {{ request('type') == 'credit' ? 'selected' : '' }}>Credit</option>
                                    <option value="debit" {{ request('type') == 'debit' ? 'selected' : '' }}>Debit</option>
                                </select>
                            </div>

                            <!-- Filter Button -->
                            <div class="col-md-3 mb-3 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary w-100">Filter</button>
                            </div>
                        </div>
                    </form>

                    <!-- Transactions Table -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover mt-4">
                            <thead class="table-dark">
                                <tr>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->transaction_date->format('Y-m-d') }}</td>
                                        <td>${{ number_format($transaction->amount, 2) }}</td>
                                        <td>{{ ucfirst($transaction->type) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No transactions found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination Links -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $transactions->links('pagination::bootstrap-5') }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
