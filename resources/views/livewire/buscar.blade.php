<div>
@if ($errors->any() )
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
 @elseif (isset($response["erro"]) == true)
 <div class="alert alert-danger">
        <ul>
           <li>CEP INVALIDO</li>
        </ul>
    </div>
@endif
 <form wire:submit.prevent="Buscar">
    @csrf
        <label>Cep:</label>
          <div class="col-8">
        <div class="input-group">
       <input type="number" class="form-control" name="cep" id="cep" value="{{ isset($response['cep']) ? $response['cep'] : '' }}" wire:model="cep" pattern="\d{5}-\d{3}" required autofocus autocomplete="cep"/>
    <button class="btn btn-outline-secondary">Buscar Cep</button>           
</form>
</div>
</div>