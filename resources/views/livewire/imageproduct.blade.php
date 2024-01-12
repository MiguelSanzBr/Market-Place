<div>
<p class="text-center"><h1 class="display-3">Galeria Do seu Produto</h1></p>
<div class="alert alert-warning" role="alert">Mande ate 10 imagens do Produto.Assim que mandar Todas Clique em proximo passo</div>
<div
    x-data="{ isUploading: false, progress: 0 }"
    x-on:livewire-upload-start="isUploading = true"
    x-on:livewire-upload-finish="isUploading = false"
    x-on:livewire-upload-error="isUploading = false"
    x-on:livewire-upload-progress="progress = $event.detail.progress"
>
    <!-- File Input -->
<div class="container">
  <div class="row">
    <div class="col-md-6">
     <form class="needs-validation" wire:submit.prevent="save" novalidate>
       <input type="hidden" name="idProduct" value="{{ $idProduct }}">
         <div class="mb-3">
    <label for="photo" class="form-label">Escolha suas Imagens</label>
    <div class="input-group">
      <input type="file" class="form-control" id="photo" wire:model="photo" required>
     <div wire:loading wire:target="photo">
<div class="d-flex align-items-center">
  <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
</div>
</div>
      <div class="invalid-feedback">Por favor, selecione uma foto.</div>
    </div>
    @error('photo') <span class="error">{{ $message }}</span> @enderror
@if ($photo)
    Photo Preview:
    <img src="{{ $photo->temporaryUrl() }}" class="img-thumbnail">
<div class="btn-group" role="group" aria-label="Basic outlined example">
  <button type="submit" class="btn btn-primary">Salvar Foto</button>
  <button class="btn btn-danger" wire:click="deleteimg">Apagar Foto</button>
  </div>
  @endif 
 <div class="d-flex justify-content-end">
<button class="btn btn-info" wire:click="editProduct">Proximo Passo<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
</svg></button>

  </div>
  </div>
</form>

    </div>
   </div>
</div>
</div>
