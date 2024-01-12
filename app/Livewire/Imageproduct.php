<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;
use Illuminate\Support\Facades\File;

class Imageproduct extends Component
{
    use WithFileUploads;
   
    public $idProduct;
    public $photo;
    
    public function render()
    {
        return view('livewire.imageproduct');
    }
     public function save()
    {
        $this->validate([
            'photo' => 'image|max:1024',
            'idProduct' => 'required|integer'
        ]);
       if ($this->photo) {
        
        $extension = $this->photo->extension();
        $imageName = time() . '.' . $this->photo->extension();
         $fileName = basename($this->photo->getClientOriginalName(), '.' . $extension);
        
      $save=$this->photo->storeAs('product', $imageName);
     $saved = Storage::disk('local')->exists($save);
        if ($saved) {
        $img = Image::create([
    "image_path" => $save,
    "image_name" => $imageName,
    "product_id" => $this->idProduct
]);
if ($img){
$this->js("alert('Image added!'); window.location.reload();");
}
  }
  else
        {
           die();  
        }
      }
   }
    public function editProduct()
{
  
    return redirect()->route('Product.edit')->with('idProduct',$this->idProduct);

}
public function deleteimg(){
  $this->js("alert('Image Deleted!'); window.location.reload();");
}

}
