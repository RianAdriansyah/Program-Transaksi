<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #a9def9">
  <div class="container">
    <a class="navbar-brand text-uppercase fw-bold" href="#">Test Program</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav text-uppercase fw-bold ms-auto">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'active' : '' }}"href="/">Transaksi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('formulir') ? 'active' : '' }}" href="formulir">Formulir</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('barang') ? 'active' : '' }}" href="barang">Barang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('customer') ? 'active' : '' }}" href="customer">Customer</a>
        </li>
      </ul>
    </div>
  </div>
</nav>