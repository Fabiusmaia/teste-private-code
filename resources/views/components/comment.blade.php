    <div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow mb-6">
        <p class="font-semibold ml-2">{{ $comment['visitor_name'] ?? 'Anônimo' }}</p>
        <p class="ml-2">{{ $comment['content'] }}</p>
        <span class="text-xs dark:text-gray-100 text-gray-500">{{ $comment['created_at'] }}</span>
    </div>