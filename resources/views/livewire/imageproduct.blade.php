<div>

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
         <div class="mb-3">
    <label for="photo" class="form-label">Foto</label>
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
     
    @endif
  <button type="submit" class="btn btn-primary">Salvar Foto</button>
 
  </div>
</form>
    </div>
  </div>
</div>
    <!-- Progress Bar -->

</div>
