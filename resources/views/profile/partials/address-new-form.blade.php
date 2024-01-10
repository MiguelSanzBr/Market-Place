<section>
   <header>

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Novo Endereço') }}
        </h2>

             @if (session('cepi'))
    <div class="alert alert-danger">
        {{ session('erronew') }}
    </div>
           @endif
  </header>
 
   <div class="container mt-5">
             <p class="text-muted fs-6">
    {{ __('Cadastre seu Endereço: Lembrando que são permitidos apenas 2 endereços por usuário.') }}
  </p>
  <a href="{{ route('address') }}" class="btn btn-primary btn-lg">Adicionar Endereço</a>
</div>
 </section>