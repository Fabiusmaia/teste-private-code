@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-4xl font-semibold dark:text-gray-200">Receitas</h1>
    @auth
    <x-primary-button>
        <a href="{{ route('recipes.create') }}">
            Nova Receita
        </a>
    </x-primary-button>
    @endauth
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($recipes as $recipe)
    <div class="bg-white dark:bg-gray-900 p-4 mb-4 rounded shadow hover:shadow-lg transition-shadow duration-300">
        <h2 class="text-xl font-semibold dark:text-gray-100">{{ $recipe->title }}</h2>
        <p class="text-gray-600 dark:text-gray-300 mt-2">{{ Str::limit($recipe->description, 100) }}</p>

        <div class="mt-3 flex justify-between items-center">
            <x-primary-button>
                <a href="{{ route('recipes.show', $recipe) }}">
                    Ver detalhes
                </a>
            </x-primary-button>

            @auth
            @if (auth()->id() === $recipe->user_id)
            <div class="flex gap-2">
                <a href="{{ route('recipes.edit', $recipe) }}"
                    class="px-4 py-2 dark:text-gray-200 text-gray-800 rounded hover:bg-green-700 transition">
                    Editar
                </a>

                <form action="{{ route('recipes.destroy', $recipe) }}" method="POST"
                    onsubmit="return confirm('Tem certeza que deseja excluir esta receita?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                        Excluir
                    </button>
                </form>
            </div>
            @endif
            @endauth
        </div>
    </div>
    @endforeach
</div>

<div class="container mx-auto px-4 mt-6">
    {{ $recipes->links('pagination::tailwind') }}
</div>
@endsection