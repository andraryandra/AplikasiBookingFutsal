<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Image;

class MultipleImageUpload extends Component
{
    use WithFileUploads;
    public $images = [];

    public function save(){
        $this->validate([
            'images.*' => 'image|max:1024',
        ]);

    foreach ($this->images as $key => $image) {
        $this->images[$key] = $image->store('images');
    }

    $this->images = json_encode($this->images);
    
    Image::create(['image' => $this->images]);

    session()->flash('Success', 'Gambar Telah Berhasil Di Upload');

    return redirect()->back();
    
    }
    public function render()
    {
        return view('livewire.multiple-image-upload');
    }
}
