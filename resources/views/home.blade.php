@extends('layouts.app')

@section('title', 'Мои объявления')

@section('content')
    <p class="text-end">
        <a href="{{ route('bb.create') }}">Добавить объявление</a>
    </p>

    @if (count($bbs) > 0)
        <table class="table table-striped table-borderless">
            <thead>
                <tr>
                    <th>Товар</th>
                    <th>Цена, руб.</th>
                    <th colspan="2">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bbs as $bb)
                    <tr>
                        <td><h3>{{ $bb->title }}</h3></td>
                        <td>{{ $bb->price }}</td>
                        <td>
                            <a href="">Изменить</a>
                        </td>
                        <td>
                            <a href="">Удалить</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection