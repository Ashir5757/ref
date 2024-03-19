@extends('dashbord.navsidebar')

@section('title', 'View Withdrawals')

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

  <div class="container mt-4">
    <h1>View Withdrawals</h1>
    <hr>
    <div class="row">
      <div class="col-md-6">
        <div class="card border-primary mb-3">
          <div class="card-header bg-primary text-white">
            <i class="bi bi-check-circle"></i> Approved Withdrawals
          </div>
          <div class="card-body p-3">
            <table class="table table-hover mb-3">
              <tbody>
                @foreach($withdrawals as $withdrawal)
                  @if($withdrawal->status == 1)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td><i class="bi bi-coin"></i></td>
                      <td>{{ $withdrawal->amount }} Points - Approved</td>
                      <td><button class="btn btn-outline-success"><i class="bi bi-check-circle">Check</i> Approve</button></td>
                    </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card border-warning mb-3">
          <div class="card-header bg-warning text-white">
            <i class="bi bi-exclamation-circle"></i> Pending Withdrawals
          </div>
          <div class="card-body p-3">
            <table class="table table-hover">
                <tbody>
                    @foreach($withdrawals as $withdrawal)
                      @if($withdrawal->status != 1)
                        <tr class="table-warning">
                          <th scope="row">{{$loop->iteration}}</th>
                          <td><i class="bi bi-hourglass"></i></td>
                          <td>{{ $withdrawal->amount }} Points - Pending</td>
                          <td>
                            <a href="#" class="btn btn-sm btn-warning disabled">Pending</a>
                          </td>
                        </tr>
                      @endif
                    @endforeach
                  </tbody>

            </table>
          </div>
        </div>
      </div>
    </div>

  </div>

</main>

@endsection
