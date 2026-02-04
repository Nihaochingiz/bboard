@extends('layouts.app')
@section('title', 'Удаление объявления :: Мои объявления')

@section('content')
<p>Автор: {{ $bb->user->name }}</p> 
<form action="{{ route('bb.destroy', ['bb' => $bb->id]) }}" 
    method="POST"> 
  @csrf 
  @method('DELETE') 
  <input type="submit" class="btn btn-danger" value="Удалить"> 
</form> 
@endsection('content') 