@extends('layouts.main_app')
@section('content')



<div class="col-xl-12 col-md-12">
    <div class="row">
      <div class="col-xl-3 col-md-6 col-sm-6">
        <div class="card prod-p-card card-border-none">
          <div class="card-body">
            <div class="row align-items-center m-b-0">
              <div class="col">
                <h6 class="m-b-5">Transaksi {{date("d M Y")}}</h6>
                <h3 class="m-b-0">$1,783</h3>
              </div>
              <div class="col-auto">
                <i class="material-icons-two-tone text-success">card_giftcard</i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 col-sm-6">
        <div class="card prod-p-card bg-blue-500 card-border-none">
          <div class="card-body">
            <div class="row align-items-center m-b-0">
              <div class="col">
                <h6 class="m-b-5 text-white">Stock Barang</h6>
                <h3 class="m-b-0 text-white">15,830</h3>
              </div>
              <div class="col-auto">
                <i class="material-icons-two-tone text-white">account_balance_wallet</i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 col-sm-6">
        <div class="card prod-p-card bg-green-500 card-border-none">
          <div class="card-body">
            <div class="row align-items-center m-b-0">
              <div class="col">
                <h6 class="m-b-5 text-white">Telah Terjual</h6>
                <h3 class="m-b-0 text-white">15,830</h3>
              </div>
              <div class="col-auto">
                <i class="material-icons-two-tone text-white">local_mall</i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 col-sm-6">
        <div class="card prod-p-card bg-purple-500 card-border-none">
          <div class="card-body">
            <div class="row align-items-center m-b-0">
              <div class="col">
                <h6 class="m-b-5 text-white">History</h6>
                <h3 class="m-b-0 text-white">15,830</h3>
              </div>
              <div class="col-auto">
                <i class="material-icons-two-tone text-white">all_inbox</i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection