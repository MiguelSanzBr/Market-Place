@extends('layout.app')
@section('title')
Image Product
@endsection
@section('page')
@livewire('imageproduct', ['idProduct' => $idProduct])
@endsection
