<nav class="side-nav">
    <div class="logo-wrapper">
        <img src="{{ asset('img/top-logo-high-res.png') }}" width="100px" />
    </div>
    <ul>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ route('ingredients.index') }}">Ingredients</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="#">Inventory</a></li>
        <li><a href="#">Order Product</a></li>
        <li><a href="#">Reports</a></li>
        <li><a href="{{ url('logout') }}">Sign Out</a></li>
    </ul>
</nav>
