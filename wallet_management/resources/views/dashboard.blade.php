<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('YOUR WALLET') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    {{-- Wallet Balance Display --}}
                    <h2 class="my-4">Wallet Balance: Rs {{ number_format($wallet->balance, 2) }}</h2>
                    {{-- {{ number_format($wallet->balance, 2) }} --}}
                    <div class="row">

                        <div class="col-md-6">
                            <div class="card shadow-sm">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0">Add Money</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('wallet.add') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="amount" class="form-label">Amount</label>
                                            <input type="number" class="form-control" name="amount" min="1" placeholder="Enter amount to add" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100">Add Money</button>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6 mt-4 mt-md-0">
                            <div class="card shadow-sm">
                                <div class="card-header bg-danger text-white">
                                    <h5 class="mb-0">Deduct Money</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('wallet.deduct') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="amount" class="form-label">Amount</label>
                                            <input type="number" class="form-control" name="amount" min="1" placeholder="Enter amount to deduct" required>
                                        </div>
                                        <button type="submit" class="btn btn-danger w-100">Deduct Money</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
