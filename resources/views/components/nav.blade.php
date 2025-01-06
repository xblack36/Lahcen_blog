@props(['propName'])
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand link-primary" href="{{ route('postes.index') }}">{Lahcen=>#_Blog}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href={{ route('postes.index') }}>All Posts</a>
          </li>
        </ul>

        <div class="position-relative d-inline-block">
          <button class="btn btn-primary">
            Add to Cart
          </button>
          <span class="position-relative translate-x badge rounded-pill bg-danger">
            3
          <span class="visually-hidden">unread notifications</span>
          </span>
        </div>
        
      </div>
      <div class="d-flex justify-content-end">
        <form action="{{ route('auth.logout') }}" method="post">
          @csrf
          <span class="tw-bold">{{ auth()->user()->firstname.' '.auth()->user()->lastname }}</span>
          <button class="btn btn-primary px-2 ml-3 " style="margin-right: 10px !important">Logout</button>
        </form>
      </div>
    </div>
</nav>