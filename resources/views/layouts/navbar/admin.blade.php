<style>
  .navbar-brand {
    font-family: 'Segoe UI', 'Helvetica Neue', Arial, sans-serif; /* clean & modern */
    font-weight: 700; /* tebal */
    font-size: 24px;
    color: #1877f2 !important; /* biru khas */
    letter-spacing: -0.5px;
    text-decoration: none;
}
</style>
<nav class="navbar navbar-expand-lg" data-bs-theme="light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            {{ config('app.name') }}
        </a>
    </div> 
</nav>
<nav class="navbar navbar-expand-lg" data-bs-theme="light">
    <div class="container">
         <ul class="navbar-nav mx-auto">
             @include('layouts.nav-items.admin-auth')
        </ul>
    </div>
</nav>