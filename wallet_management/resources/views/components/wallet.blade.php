<div class="container">
    {{-- Wallet Balance Display --}}
    <h2 class="my-4">Wallet Balance: Rs 650</h2>
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
