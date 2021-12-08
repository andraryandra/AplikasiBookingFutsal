<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pelaporan;

class PelaporanCrud extends Component
{
    public $pelaporans, $idpes, $nama2, $jambooking2, $lapangan2, $uang2, $pelaporan_id;
    public $isModalOpen = 0;

    public function render()
    {
        $this->pelaporans = Pelaporan::all();
        return view('livewire.pelaporan-crud');
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
        $this->idpes = '';
        $this->nama2 = '';
        $this->jambooking2 = '';
        $this->lapangan2 = '';
        $this->uang2 = '';
  
    }

    public function store()
    {
        $this->validate([
            'idpes' => 'required',
            'nama2' => 'required',
            'jambooking2' => 'required',
            'lapangan2' => 'required',
            'uang2' => 'required',
           
        ]);

        Pelaporan::updateOrCreate(['id' => $this->pelaporan_id], [
            'idpes' => $this->idpes,
            'nama2' => $this->nama2,
            'jambooking2' => $this->jambooking2,
            'lapangan2' => $this->lapangan2,
            'uang2' => $this->uang2,
            
        ]);

        session()->flash('message', $this->pelaporan_id ? 'Data updated successfully.' : 'Data added successfully.');

        $this->closeModal();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $pelaporan = Pelaporan::findOrFail($id);
        $this->pelaporan_id = $id;
        $this->idpes = $pelaporan->idpes;
        $this->nama2 = $pelaporan->nama2;
        $this->jambooking2 = $pelaporan->jambooking2;
        $this->lapangan2 = $pelaporan->lapangan2;
        $this->uang2 = $pelaporan->uang2;
        




        $this->openModal();
    }

    public function delete($id)
    {
        Pelaporan::find($id)->delete();
        session()->flash('message', 'Data deleted successfully.');
    }
}
