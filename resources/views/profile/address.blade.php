<x-guest-layout>

       @php 
$cep = session('cep');
$response = session('response');
@endphp
    <form method="POST" action="{{ route('address') }}"> 
   @csrf
@if (isset($errors))

          @foreach ($errors->all() as $error)
    <div class="alert alert-danger">
        {{ $error }}
    </div>
    @endforeach
 @endif
         <!-- Endereço -->
                <div class="mt-4">
            <x-input-label for="Rua" :value="__('Rua')" />
            <x-text-input id="Rua" class="block mt-1 w-full" type="text" name="Rua" value="{{ isset($response['logradouro']) ? $response['logradouro'] : '' }}" required autofocus autocomplete="rua" />
            <x-input-error :messages="$errors->get('Rua')" class="mt-2" />
        
        </div>
               <div class="mt-4">
              <div class="col-4">
            <x-input-label for="Numero" :value="__('Numero')" />
            <x-text-input id="Numero" class="block mt-1 w-full" type="number" name="Numero" :value="old('Numero')" required autofocus autocomplete="Numero" />
            <x-input-error :messages="$errors->get('Numero')" class="mt-2" />
        
        </div>
        </div>
       
                               <div class="mt-4">
            <x-input-label for="Bairro" :value="__('Bairro')" />
            <x-text-input id="Bairro" class="block mt-1 w-full" type="text" name="Bairro" value="{{ isset($response['bairro'] ) ? $response['bairro']  : '' }}" required autofocus autocomplete="Bairro" />
            <x-input-error :messages="$errors->get('Bairro')" class="mt-2" />
        </div>
        
                       <div class="mt-4">
            <x-input-label for="Cidade" :value="__('Cidade')" />
            <x-text-input id="Cidade" class="block mt-1 w-full" type="text" name="Cidade" value="{{ isset($response['localidade'] ) ? $response['localidade']  : '' }}" required autofocus autocomplete="Cidade" />
            <x-input-error :messages="$errors->get('Cidade')" class="mt-2" />
        </div>
        
                        <div class="mt-4">
<x-input-label for="Estado"/>
    <input class="form-control" list="EstadoList" name="Estado" 
           value="{{ isset($response['uf']) ? $response['uf'] : '' }}" 
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
            <x-input-error :messages="$errors->get('Estado')" class="mt-2" />
        </div>
        <input type="hidden" name="Cep" value="{{isset($cep) ? $cep : ''}}"><br>
              
                  <div class="d-flex justify-center">
                    
<button type="submit" class="btn btn-outline-primary" name="bts">Registrar</button>
                  </div>
      
        </form>   

        @empty($cep)
       <div class="mt-4">
          <div class="d-flex justify-content-center align-items-center">
           <x-input-label for="cep" />
        @livewire('buscar')
                  </div>
                  </div>
                    </div>
                  @else
                   </div> 
        @livewire('ResetSession')
                  
         @endif
         

         
           
        <div class="flex items-center justify-end mt-4">
         
            
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Ja Tem Login com endereço?') }}
            </a>
</x-guest-layout>

 

