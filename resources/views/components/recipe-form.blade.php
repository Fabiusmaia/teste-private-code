@props([
'recipe' => null,
'action',
'method' => 'POST',
'submitLabel' => 'Salvar'
])

<form method="POST" action="{{ $action }}" class="space-y-6">
    @csrf
    @if(strtoupper($method) !== 'POST')
    @method($method)
    @endif

    <div>
        <label class="block text-lg font-semibold mb-2" for="title">Título</label>
        <input type="text" name="title" id="title"
            value="{{ old('title', $recipe?->title) }}"
            class="w-full p-3 border rounded-lg bg-gray-100 dark:bg-gray-700 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400">
        @error('title')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-lg font-semibold mb-2" for="description">Descrição</label>
        <textarea name="description" id="description" rows="4"
            class="w-full p-3 border rounded-lg bg-gray-100 dark:bg-gray-700 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400">{{ old('description', $recipe?->description) }}</textarea>
        @error('description')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-lg font-semibold mb-2" for="ingredients">Ingredientes</label>
        <textarea name="ingredients" id="ingredients" rows="5"
            class="w-full p-3 border rounded-lg bg-gray-100 dark:bg-gray-700 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400">{{ old('ingredients', $recipe?->ingredients) }}</textarea>
        @error('ingredients')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-lg font-semibold mb-2" for="instructions">Instruções</label>
        <textarea name="instructions" id="instructions" rows="5"
            class="w-full p-3 border rounded-lg bg-gray-100 dark:bg-gray-700 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400">{{ old('instructions', $recipe?->instructions) }}</textarea>
        @error('instructions')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex justify-between items-center">
        <a href="{{ route('recipes.index') }}" class="text-gray-500 hover:underline">← Voltar</a>
        <x-primary-button type="submit">
            {{ $submitLabel }}
        </x-primary-button>
    </div>
</form>