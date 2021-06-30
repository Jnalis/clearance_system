<h1 class="m-0 text-dark">
    Welcome: {{ Auth::user()->user_id }}
</h1>
<p>
    {{ Auth::user()->user_type }}
</p>