<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use \App\Models\Heart;

class HeartPost extends Component
{

    public Post $post;
    public $post_id;
    public $heartCount;

   public function mount(Post $post)
   {
    $this->post = $post;
    $this->post_id = $post->id;

    $this->heartCount = Heart::where(['post_id'=>$this->post_id, 
                                       'heart'=>true,
                                     ])->count();
                             
   }
   
    public function theHeart()
    {
      
        $heart = Auth()->user()->hearts()->where('post_id', $this->post_id)->first();
        if($heart){

          $is_heart = $heart->heart;
          $heart->heart = !$is_heart;
          $heart->update();
        }else{
          $heart = new Heart();
         $heart->heart = true;
         $heart->user_id = Auth()->user()->id;
         $heart->post_id = $this->post_id;
         $heart->save();

        }
      $this->heartCount = Heart::where(['post_id'=>$this->post_id, 
                                       'heart'=>true,
                                     ])->count();

    }

    public function render()
    {
        return <<<'HTML'
        <div>
         <div class="flex" x-on:click="$wire.theHeart">
           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 pt-1 cursor-pointer">
               <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
             </svg>

              {{ $heartCount }}
           </div> 
        </div>
        HTML;
    }
}
