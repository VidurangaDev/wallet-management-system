<div class="container">
    <h2>Wallet Balance: ${{ number_format($wallet->balance, 2) }}</h2>


    <form action="{{ route('wallet.add') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="amount" class="form-label">Add Money</label>
            <input type="number" class="form-control" name="amount" min="1" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Money</button>
    </form>


    
    <form action="{{ route('wallet.deduct') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="amount" class="form-label">Deduct Money</label>
            <input type="number" class="form-control" name="amount" min="1" required>
        </div>
        <button type="submit" class="btn btn-danger">Deduct Money</button>
    </form>
</div>
