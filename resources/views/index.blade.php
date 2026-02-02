@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    @if (count($bbs) > 0)
    <table class="table table-striped table-borderless">
        <thead>
            <tr>
                <th>Товар</th>
                <th>Цена, руб.</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bbs as $bb) 
            <tr>
                <td><h4>{{ $bb->title }}</h4></td>
                <td>{{ $bb->price }} руб.</td>
                <td>
                    <a href="{{ route('detail', ['bb' => $bb->id]) }}">Подробнее...</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p class="text-center">Нет объявлений</p>
    @endif
@endsection