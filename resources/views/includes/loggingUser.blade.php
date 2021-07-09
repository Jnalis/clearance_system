<h1 class="m-0 text-dark">
    Welcome: 
    @php
        $id = Auth::user()->user_id;
       $user = DB::table('staff')->where('username', $id)->first();
       $name = $user->fullname;
       $usertype = $user->usertype;

       $userType = DB::table('usertypes')->where('usertype_code', $usertype)->first();
       $loggedUsertype = $userType->usertype_name;
    @endphp 
    {{ $name }}
</h1>
<p>
    {{ $loggedUsertype }}
</p>