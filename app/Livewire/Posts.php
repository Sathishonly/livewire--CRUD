<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class Posts extends Component
{

    public $title,$message,$postlist,$postid;

    public $editvalue = false;

    public function store(){
        $validatedData = $this->validate([
            'title' => 'required|string|max:255', 
            'message' => 'required|string|min:10',  
        ]);

         $post =  new Post;
         $post->title  = $this->title;
         $post->message = $this->message;
         $post->save();

         $this->removevalue();

         session()->flash('message','Post Created Successfully');
    }


    private function removevalue(){
        $this->title = '';
        $this->message = '';
    }


    public function edit($id){
        $this->editvalue = true;
        $post =  Post::find($id);
        if($post){
         $this->title = $post->title;
         $this->message = $post->message;
         $this->postid = $post->id;
        } 
    }

    public function update(){
        $validatedData = $this->validate([
            'title' => 'required|string|max:255', 
            'message' => 'required|string|min:10',  
        ]);

        $post =  Post::find($this->postid);
        if($post){
            $post->title = $this->title;
            $post->message = $this->message;
            $post->save();
        } 

        $this->removevalue();

        session()->flash('message','Post Updated Successfully');

        $this->editvalue = false;
    }


    public function cancelupdate(){
        $this->editvalue = false;
        $this->removevalue();
    }



    public function delete($id){
      $post =  Post::find($id);
      if($post){
        $post->delete();
        session()->flash('dlmessage','Post Deleted Successfully');
      }
    }


    public function render()
    {
        $this->postlist =  Post::all();
        return view('livewire.posts');
    }
}
