<section>
   <header>

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Seus Endereços') }}
        </h2>
             @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif  
    </header>
    @php
    $i=0;
    @endphp
    @foreach ($ads as $addr)
        @php
    $i++;
    @endphp
    <div class="container mt-5">
      <div class="d-flex align-items-center">
    <h2 class="mb-4 mx-auto">Endereço {{$i}}</h2>
<form method="POST" action="{{route('address.Delete') }}" >
    @csrf
    @method('delete')
    <input type="hidden" name="id" value="{{$addr->id}}">
    <div class="mb-4 mx-auto">
        <button type="submit" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#confirmModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
            </svg>
        </button>
    </div>
</form>

    </div>
    <div class="card">
        <div class="card-body">
            <p class="fw-bold">Rua: {{ $addr->rua }}</p>
            <p class="fw-bold">Cidade: {{ $addr->cidade }}</p>
            <p class="fw-bold">Estado: {{ $addr->estado }}</p>
            <p class="fw-bold">Cep: {{ $addr->cep }}</p>
        </div>
    </div>
</div>
    

    @endforeach
    
</section>