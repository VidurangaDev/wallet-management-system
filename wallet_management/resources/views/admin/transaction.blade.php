<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ADMIN PANEL') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container my-5">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <h3>{{ $user->name }}'s Transaction History</h3>
                            <div class="card shadow-sm">

                                <div class="card-body">
                                    @if($transactions->isEmpty())
                                        <div class="alert alert-warning" role="alert">
                                            No transactions found for this user.
                                        </div>
                                    @else
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead class="thead-dark">
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
                                                            <td>{{ number_format($transaction->amount, 2) }}</td>
                                                            <td>
                                                                <span class="badge badge-{{ $transaction->type == 'credit' ? 'success' : 'danger' }} text-dark">
                                                                    {{ ucfirst($transaction->type) }}
                                                                </span>
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
