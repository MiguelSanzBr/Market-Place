<section>
   <header>

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Editar Seus Endereços') }}
        </h2>
             @if (session('edited'))
    <div class="alert alert-success">
        {{ session('edited') }}
    </div>
            @endif
             @if (session('cepi'))
    <div class="alert alert-danger">
        {{ session('cepi') }}
    </div>
    @endif
        @if (count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    </div>
@endif
 </header>
        @php $i=0; @endphp
        @foreach ($ads as $addr)
        @php $i++; @endphp
  <div class="container mt-5">
  <h2 class="mb-4 mx-auto">Endereço {{$i}} </h2>
<form method="post" 
action="{{route('address.Edit')}}" >
  @csrf
  @method('patch')
  <input type="hidden" name="id" value="{{$addr->id}}">
    <div class="mb-3">
  <label for="rua" class="form-label">Rua</label>
  <input type="text" class="form-control" name="rua" value=" {{ $addr->rua }}">
</div>
<div class="mb-3">
 <label for="numero" class="form-label">Numero</label>
  <input type="number" class="form-control" name="numero" value=" {{ $addr->numero }}">
</div>
<div class="mb-3">
  <label for="cidade" class="form-label">Cidade</label>
  <input type="text" class="form-control" name="cidade" value=" {{ $addr->cidade }}">
</div>
      <div class="mb-3">
            <label for="bairro" class="form-label">Bairro</label>
            <input id="Bairro" class="form-control" type="text" name="bairro" value="{{$addr->bairro }}" />
            <x-input-error :messages="$errors->get('bairro')" class="mt-2" />
        </div>
      <div class="mt-4">
<label for="estado"/>Estado</label>
    <input class="form-control" list="EstadoList" name="estado" 
           value="{{ $addr->estado }}" 
           placeholder="Selecione o Estado" required autofocus autocomplete="Estado">
    <datalist id="EstadoList">
    <option value="">Selecione o Estado</option>
    <option value="ac">Acre</option> 
    <option value="al">Alagoas</option> 
    <option value="am">Amazonas</option> 
    <option value="ap">Amapá</option> 
    <option value="ba">Bahia</option> 
    <option value="ce">Ceará</option> 
    <option value="df">Distrito Federal</option>
    <option value="es">Espírito Santo</option> 
    <option value="go">Goiás</option> 
    <option value="ma">Maranhão</option> 
    <option value="mt">Mato Grosso</option> 
    <option value="ms">Mato Grosso do Sul</option> 
    <option value="mg">Minas Gerais</option> 
    <option value="pa">Pará</option> 
    <option value="pb">Paraíba</option> 
    <option value="pr">Paraná</option> 
    <option value="pe">Pernambuco</option> 
    <option value="pi">Piauí</option> 
    <option value="rj">Rio de Janeiro</option> 
    <option value="rn">Rio Grande do Norte</option> 
    <option value="ro">Rondônia</option> 
   <option value="rs">Rio Grande do Sul</option> 
    <option value="rr">Roraima</option> 
    <option value="sc">Santa Catarina</option> 
    <option value="se">Sergipe</option> 
    <option value="sp">São Paulo</option> 
    <option value="to">Tocantins</option> 
</datalist>
     </div>
<div class="mb-3">
    <label for="cep" class="form-label">CEP</label>
   <input type="number" class="form-control" name="cep" value="{{ $addr->cep }}" >
</div>
<div class="d-grid gap-2 col-6 mx-auto">
   <button type="submit" class="btn btn-outline-primary">
      <span class="sr-only">Editar</span>
           Editar
    </button>
</div>
   </form>
</div>
    <br><hr class="hr-mg-5"><br> 
     @endforeach
</section>