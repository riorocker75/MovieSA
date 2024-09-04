@extends('layouts.main_app')
@section('content')


  @php
      $jlh_movie= App\Models\Film::count();
      $jlh_post= App\Models\BlogPost::count();
      $jlh_user= App\Models\Users::count();
  @endphp
<div class="col-xl-12 col-md-12">
    <div class="row">
      <div class="col-xl-4 col-md-6 col-sm-6">
        <div class="card prod-p-card card-border-none">
          <div class="card-body">
            <div class="row align-items-center m-b-0">
              <div class="col">
                <h6 class="m-b-5">Movie </h6>
                <h3 class="m-b-0">{{ $jlh_movie}}</h3>
              </div>
              <div class="col-auto">
                <i class="material-icons-two-tone text-success">card_giftcard</i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-6 col-sm-6">
        <div class="card prod-p-card bg-blue-500 card-border-none">
          <div class="card-body">
            <div class="row align-items-center m-b-0">
              <div class="col">
                <h6 class="m-b-5 text-white">Post News</h6>
                <h3 class="m-b-0 text-white">{{ $jlh_post}}</h3>
              </div>
              <div class="col-auto">
                <i class="material-icons-two-tone text-white">account_balance_wallet</i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-4 col-md-6 col-sm-6">
        <div class="card prod-p-card bg-green-500 card-border-none">
          <div class="card-body">
            <div class="row align-items-center m-b-0">
              <div class="col">
                <h6 class="m-b-5 text-white">Pengguna</h6>
                <h3 class="m-b-0 text-white">{{ $jlh_user}}</h3>
              </div>
              <div class="col-auto">
                <i class="material-icons-two-tone text-white">local_mall</i>
              </div>
            </div>
          </div>
        </div>
      </div>

      
    </div>
</div>

@endsection