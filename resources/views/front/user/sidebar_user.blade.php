<div class="col-xl-3 col-md-12 order-2 order-xl-1 mt-4 mt-xl-0">
    
    <div class="widget widget_recent_entries">
        <h2 class="widget-title">Hii {{Session::get('usr_username')}}</h2>
        <ul>
            <li>
                <a href="{{url('/dashboard/user/favorit/'.Session::get('user_id').'')}}">List Favorit</a>
            </li>
            <li>
                <a href="{{url('/dashboard/user/')}}">Pengaturan Akun</a>
            </li>
        </ul>
    </div>
   
  
</div>