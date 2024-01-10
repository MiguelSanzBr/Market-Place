<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Imageproduct extends Component
{
    use WithFileUploads;
 
    public $photo;
    
    public function render()
    {
        return view('livewire.imageproduct');
    }
     public function save()
    {
        $this->validate([
            'photo' => 'image|max:1024',
        ]);
       if ($this->photo) {
        
        $extension = $this->photo->extension();
        $fileName = time() . '.' . $this->photo->extension();
        $imageName = basename($this->photo->getClientOriginalName(), '.' . $extension);
        
      $save=$this->photo->storeAs('product', $fileName);
     $saved = Storage::disk('local')->exists($save);
       
      if ($saved) {
          
           return redirect()->route('product.get'); 
        } else {
             
        }
        
    }
  
    }
}
