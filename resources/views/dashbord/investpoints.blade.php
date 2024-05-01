@extends('dashbord\navsidebar')

@section('title', 'Invest')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Investment</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
                <li class="breadcrumb-item"> <a href="javascript:history.back()">Withdrawal</a> </li>
                <li class="breadcrumb-item active">Invest Points</li>
            </ol>
        </nav>
    </div>
    
    <div class="card">
    <div class="card-header">
        <h4><i class="fas fa-money-bill-wave"></i> Investment Points</h4>
    </div>
    <div class="card-body m-3">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @if (isset($errors) && count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <p><strong>Welcome to Investment Points!</strong> These points allow you to allocate resources towards specific goals or benefits within our system.</p>

        <p><strong>How to Use Investment Points:</strong></p>
        <ul>
            <li>Enter the number of points you wish to invest in the "Investment Amount" field.</li>
            <li>Ensure that your investment amount does not exceed your available balance.</li>
            <li>Provide optional details about your investment in the "Investment Details" textarea.</li>
            <li>Click "Submit Investment" to complete the investment process.</li>
        </ul>

        <form method="POST" action="">
            @csrf

            <div class="form-group mb-3">
                <label for="investment_amount" class="form-label">Investment Amount:</label>
                <input type="number" class="form-control @error('investment_amount') is-invalid @enderror" id="investment_amount" name="investment_amount" min="0" step="0.01" placeholder="Enter investment amount">
                @error('investment_amount')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-3 d-flex align-items-center">
                <span class="me-3">
                    <b><i class="bi bi-wallet2"></i> Available Balance:</b>
                </span>
                <span id="available_balance">{{ $points->total_points }} Points</span>
            </div>

            <div class="form-group mb-3 d-flex align-items-center">
                <span class="me-3">
                    <b><i class="bi bi-piggy-bank"></i> Remaining Points:</b>
                </span>
                <span id="remaining_points">{{ $points->total_points }} Points</span>
                <input type="hidden" id="hidden_remaining_points" name="remaining_points" value="{{ $points->total_points }}">
            </div>

            <div class="form-group mb-3">
                <label for="investment_details">Investment Details (Optional):</label>
                <textarea class="form-control" id="investment_details" name="investment_details" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Submit Investment</button>
        </form>
    </div>
</div>

</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        function calculateRemainingPoints() {
            var investmentAmount = parseFloat(document.getElementById('investment_amount').value) || 0;
            var totalPoints = {{ $points->total_points }};
            var remainingPoints = totalPoints - investmentAmount;

            if (remainingPoints < 0) {
                // If the investment amount exceeds total points, prevent negative remaining points
                alert('Error: Investment amount exceeds available points.');
                document.getElementById('investment_amount').value = totalPoints; // Set investment amount to total points
                remainingPoints = 0; // Reset remaining points to 0
            }

            // Update formatted remaining points display
            var formattedRemainingPoints = remainingPoints % 1 === 0 ? remainingPoints.toFixed(0) : remainingPoints.toFixed(2);
            document.getElementById('remaining_points').textContent = formattedRemainingPoints + " Points";
            document.getElementById('hidden_remaining_points').value = remainingPoints;
        }

        // Attach event listener to investment amount input for real-time updates
        document.getElementById('investment_amount').addEventListener('input', calculateRemainingPoints);
    });
</script>

@endsection
