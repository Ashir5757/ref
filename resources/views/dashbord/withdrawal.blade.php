@extends('dashbord.navsidebar')

@section('title', 'Withdrawal')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Withdrawal</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
                <li class="breadcrumb-item active">Withdrawal</li>
            </ol>
        </nav>
    </div>

    <button class="btn btn-outline-primary m-3 "><i class="fas fa-eye"></i> View Withdrawals</button>
    <div class="card">
        <div class="card-header">
            <h4><i class="fas fa-money-bill-wave"></i> Withdrawal Form</h4>
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

            <form method="POST" action="{{route('withdrawal.store')}}">
                @csrf

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        function calculateRemainingPoints() {
                            var withdrawalAmount = parseFloat(document.getElementById('withdrawal_amount').value) || 0;
                            var totalPoints = {{ $points->total_points }};
                            var remainingPoints = totalPoints - withdrawalAmount;
                            if (remainingPoints < 0) {
                                alert('Error: Remaining points cannot be negative.');
                                document.getElementById('withdrawal_amount').value = totalPoints; // Set withdrawal amount to total points
                                remainingPoints = document.getElementById('withdrawal_amount').value; // Keep remaining points as total points
                            }
                            var formattedRemainingPoints = remainingPoints % 1 === 0 ? remainingPoints.toFixed(0) : remainingPoints.toFixed(2);
                            document.getElementById('remaining_points').textContent = formattedRemainingPoints + " Points";
                            document.getElementById('hidden_remaining_points').value = remainingPoints;
                        }

                        document.getElementById('withdrawal_amount').addEventListener('input', calculateRemainingPoints);
                    });
                </script>

                <div class="form-group mb-3">
                    <p class="mt-3"> <b>Enter the number of points you wish to withdraw:</b></p>
                    <label for="withdrawal_amount" class="form-label">Withdrawal Amount:</label>
                    <input type="number" class="form-control @error('withdrawal_amount') is-invalid @enderror" id="withdrawal_amount" name="withdrawal_amount" min="0" step="0.01" placeholder="Enter withdrawal amount">
                    @error('withdrawal_amount')
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
                    <label for="withdrawal_details">Withdrawal Details (Optional):</label>
                    <textarea class="form-control" id="withdrawal_details" name="withdrawal_details" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Submit Withdrawal</button>
            </form>
        </div>
    </div>

</main>

@endsection

