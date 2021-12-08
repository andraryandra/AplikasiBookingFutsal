<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pembeli;

class PembeliCrud extends Component
{
    public $pembelis, $nama, $jambooking, $lapangan, $harga, $pembayaran, $pembeli_id;
    public $isModalOpen = 0;

    public function render()
    {
        $this->pembelis = Pembeli::all();
        return view('livewire.pembeli-crud');
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm()
    {
        $this->nama = '';
        $this->jambooking = '';
        $this->lapangan = '';
        $this->harga = '';
        $this->pembayaran = '';
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'jambooking' => 'required',
            'lapangan' => 'required',
            'harga' => 'required',
            'pembayaran' => 'required',
        ]);

        Pembeli::updateOrCreate(['id' => $this->pembeli_id], [
            'nama' => $this->nama,
            'jambooking' => $this->jambooking,
            'lapangan' => $this->lapangan,
            'harga' => $this->harga,
            'pembayaran' => $this->pembayaran,
        ]);

        session()->flash('message', $this->pembeli_id ? 'Data updated successfully.' : 'Data added successfully.');

        $this->closeModal();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $pembeli = Pembeli::findOrFail($id);
        $this->pembeli_id = $id;
        $this->nama = $pembeli->nama;
        $this->jambooking = $pembeli->jambooking;
        $this->lapangan = $pembeli->lapangan;
        $this->harga = $pembeli->harga;
        $this->pembayaran = $pembeli->pembayaran;
        
        
        

        $this->openModal();
    }

    public function delete($id)
    {
        Pembeli::find($id)->delete();
        session()->flash('message', 'Data deleted successfully.');
    }
}
