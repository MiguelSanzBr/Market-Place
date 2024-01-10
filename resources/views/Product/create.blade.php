@extends('layout.app')
@section('title')
Product New
@endsection
@section('page')

<div class="container">
  <form method="POST" action="{{route('product.post')}}" >
    @csrf
    <div class="mb-3">
      <label for="price" class="form-label">Preço</label>
      <input type="number" class="form-control" name="price" placeholder="Insira o preço" step="0.01">
    </div>
    <div class="mb-3">
      <label for="name" class="form-label">Nome</label>
      <input type="text" class="form-control" name="name" placeholder="Insira o nome" required>
    </div>
    <div class="mb-3">
      <label for="describe" class="form-label">Descrição</label>
      <textarea class="form-control" name="describe" placeholder="Insira a descrição" required></textarea>
    </div>
    <div class="mb-3">
      <label for="category" class="form-label">Categoria</label>
      <select class="form-select" name="category" required>
        <option value="">Selecione uma categoria</option>
        <option value="Eletrônicos">Eletrônicos</option>
        <option value="Livros">Livros</option>
        <option value="Roupas">Roupas</option>
        <option value="Utensílios domésticos">Utensílios domésticos</option>
        <option value="Ferramentas e equipamentos">Ferramentas e equipamentos</option>
        <option value="Brinquedos e jogos">Brinquedos e jogos</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="stored_quantity" class="form-label">Quantidade armazenada</label>
      <input type="number" class="form-control" name="stored_quantity" placeholder="Insira a quantidade armazenada" required>
    </div>
    <!-- 
      livewire('imageproduct')
    -->
    <button type="submit" class="btn btn-primary">Salvar</button>
  </form>
</div>

@endsection

  
