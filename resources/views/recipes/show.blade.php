@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6">
    <div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow mb-6">
        <h1 class="text-2xl font-semibold mb-2">{{ $recipe->title }}</h1>
        <p>{{ $recipe->description }}</p>
    </div>

    <div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow mb-6">
        <h2 class="text-xl font-semibold mb-2">Ingredientes</h2>
        <p>{{ $recipe->ingredients }}</p>
    </div>

    <div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow mb-6">
        <h2 class="text-xl font-semibold mb-2">Instruções</h2>
        <p>{{ $recipe->instructions }}</p>
    </div>

    <h2 class="text-xl font-semibold mt-6">Avaliações ({{ $recipe->average_rating }})</h2>
    @include('components.rating-stars', ['rating' => (float) $recipe->average_rating])
    <h3 class="text-lg font-semibold mt-4">Avaliar receita</h3>
    <form action="{{ route('ratings.store', ['recipe' => $recipe->id]) }}" method="POST" class="flex items-center gap-2 mb-6">
        @csrf
        <select name="score" id="score" class="border dark:bg-gray-900 dark:text-gray-100 px-8 py-1 rounded">
            @for ($i = 1; $i <= 5; $i++)
                <option value="{{ $i }}">{{ $i }} estrela(s)</option>
                @endfor
        </select>
        <x-primary-button type="submit">Avaliar</x-primary-button>
    </form>

    <h2 class="text-xl font-semibold mt-6 mb-2">Comentários</h2>
    @foreach($recipe->comments as $comment)
    @include('components.comment', ['comment' => $comment])
    @endforeach

    <h3 class="text-lg font-semibold mt-4">Adicionar comentário</h3>
    <form action="{{ route('comments.store', ['recipe' => $recipe->id]) }}" method="POST" class="space-y-4">
        @csrf
        <input type="text" name="visitor_name" placeholder="Seu nome (opcional)" class="w-full border dark:bg-gray-900 px-3 py-2 dark:text-gray-100 mb-4 rounded">
        <textarea name="content" placeholder="Comentário" class="w-full border px-3 py-2 rounded mb-2 dark:bg-gray-900 dark:text-gray-100" required></textarea>
        <x-primary-button type="submit">Enviar</x-primary-button>
    </form>
</div>
@endsection