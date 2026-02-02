@extends('layouts.app')

@section('title', $bb->title . ' :: Объявления')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $bb->title }}</h4>
            <p class="card-text">{{ $bb->content }}</p>
            <p class="card-text"><strong>{{ $bb->price }} руб.</strong></p>
            <p>Автор: {{ $bb->user->name }}</p>
            
            <a href="{{ route('index') }}" class="btn btn-primary">
                ← Назад к списку объявлений
            </a>
        </div>
    </div>
@endsection