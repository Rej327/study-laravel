 <div class="border p-2 rounded mb-2 bg-gray-100">
   <div>
     <p class="text-sm text-gray-700">{{ $comment->user->name ?? 'Guest' }}:</p>
     <p class="text-base">{{ $comment->comment }}</p>
     <p class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
   </div>

   <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="inline-block ml-2">
     @csrf
     @method('DELETE')
     <button type="submit" class="text-red-500 hover:underline text-sm">Delete</button>
   </form>

 </div>
