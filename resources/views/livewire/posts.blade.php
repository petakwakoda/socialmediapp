<div>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Home Page') }}
    </h2>
  </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg">
                <h4 class="text-gray-900 text-right mb-2">
                    {{ __("Want to find a friend's post?") }}
                </h4>
                <div class="flex justify-end">
                	<div class="relative left-6 pt-3">
                	<svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                   </div>
	               <x-text-input wire:model.live="searchName" type="text" 
	               class="block w-2/3 md:w-1/3 rounded-3xl border-gray-400 px-6 md:px-8"
	               placeholder="search friend's name..." />
               </div>
            </div>
        </div>
    </div>

    <div class="max-w-3xl mx-auto flex items-center gap-3">
       @if ($poststatus === 'post-created')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 5000)"
                class="text-sm text-white text-center bg-green-500 rounded-sm p-2"
            >{{ __('Post created successfully.') }}</p>
        @endif 

    </div> 

    <section>
        <div class="max-w-3xl mx-auto">
         <h3>What's on your mind?</h3>

            
                <div>
                    <textarea class="mt-1 block w-full rounded-sm" wire:model="body" id="new-post" placeholder="Your Post"></textarea>
                    <x-input-error :messages="$errors->get('body')" class="mt-2" />
                </div>
                <div class="flex items-center gap-4 mt-3">
                    <button 
                    class="text-white bg-purple-800 px-4 py-2 rounded-md"
                    type="button" x-on:click="$wire.addPost">
                    Post</button>
                </div>
            
        </div>
    </section>

 <section>
        <div class="max-w-3xl mx-auto py-6">

         @if ($posts->isEmpty())
          <div class="text-center">
                <p class="text-xl font-bold">No posts yet</p>
            </div>
         @else
            <h3>What other people say...</h3>
              
            @foreach($posts as $post)
               <div wire:key="{{$post->id}}">
                <article class="bg-white py-4 px-2 border-l-2 border-purple-400 mt-3 mb-6" 
                  data-postid="1">
                    <div class="text-xs text-blue-600">
                        Posted by <span class="text-purple-400 font-extrabold">{{$post->user->name}}</span>
                        on {{ date_format($post->created_at, 'M j Y H:i') }}
                    </div>
                    <p class="text-lg text-teal">{{ $post->body }}</p>
                    
                    <div class="text-sm">
                        <livewire:heart-post :post="$post" :key="$post->id" />
                    </div>
                  </article>
               </div>
           @endforeach
          @endif
             
        </div>
    </section>
  </div>
