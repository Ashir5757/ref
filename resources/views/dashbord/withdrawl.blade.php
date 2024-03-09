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

    <div class="card">
        <div class="card-header">
            <h4>Withdrawal Form</h4>
        </div>
        <div class="card-body">
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

            <form method="POST" action="">
                @csrf

                <div class="form-group mb-3">
                    <label for="withdrawal_amount">Withdrawal Amount:</label>
                    <input type="number" class="form-control @error('withdrawal_amount') is-invalid @enderror" id="withdrawal_amount" name="withdrawal_amount" min="0" step="0.01" required>
                    @error('withdrawal_amount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="available_balance">Available Balance:</label>
                    {{-- <span id="available_balance">{{ isset($user->balance) ? number_format($user->balance, 2) : 'N/A' }}</span> --}}
                </div>

                {{-- <div class="form-group mb-3">
                    <label for="withdrawal_method">Withdrawal Method:</label>
                    <select class="form-control @error('withdrawal_method') is-invalid @enderror" id="withdrawal_method" name="withdrawal_method" required>
                        {{-- @foreach ($withdrawalMethods as $method) --}}
                            {{-- <option value="{{ $method->id }}">{{ $method->name }}</option> --}}
                        {{-- @endforeach --}}
                    {{-- </select>
                    @error('withdrawal_method')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> --}} 

                <div class="form-group mb-3">
                    <label for="withdrawal_details">Withdrawal Details (Optional):</label>
                    <textarea class="form-control" id="withdrawal_details" name="withdrawal_details" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit Withdrawal</button>
            </form>
        </div>
    </div>

</main>

@endsection

