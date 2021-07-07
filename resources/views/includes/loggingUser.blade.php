<h1 class="m-0 text-dark">
    Welcome: 
    @php
        $id = Auth::user()->user_id;
       $user = DB::table('staff')->where('username', $id)->first();
       $name = $user->fullname;
    @endphp 
    {{ $user->fullname }}
</h1>
<p>
    {{ Auth::user()->user_type }}
</p>