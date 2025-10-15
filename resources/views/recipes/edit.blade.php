@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-gray-50 rounded-lg shadow-xl dark:bg-gray-800 dark:text-gray-200">
    <h1 class="text-3xl font-extrabold mb-6 border-b-2 border-yellow-500 pb-2">
        ✏️ Editar Receita
    </h1>

    <x-recipe-form
        :recipe="$recipe"
        :action="route('recipes.update', $recipe)"
        method="PUT"
        submitLabel="💾 Salvar" />
</div>
@endsection