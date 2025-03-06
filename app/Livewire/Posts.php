<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;


class Posts extends Component
{

	public $body;
	public $searchName;
	public $poststatus;


	public function addPost()
    {
    	
    	
        $validated = $this->validate([
            'body' => ['required', 'max:1000'],
        ]);

         

        auth()
            ->user()
            ->posts()
            ->create([
            'body' => $this->body
            ]);

         $this->body = '';
         
         $this->poststatus = 'post-created';
      
    }

    public function render()
    {

      if($this->searchName == ''){
         $posts = Post::orderBy('created_at', 'desc')->get();	
      }else{
      	 $posts = Post::with('user')
                     ->whereHas('user', function($query){
                       $query->where('name', 'like', '%'.$this->searchName.'%');
                  })
                    ->get();
      }
      

        return view('livewire.posts', [
           'posts' => $posts
        ]);
    }

}
