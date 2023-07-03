<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;

class Index extends Component
{
    public $brand_name, $status;
    public function resetInput(){
        $this->brand_name = NULL;
        $this->status = NULL;
    } 

    public function addBrand(){
        $validatedData = $this->validate([
            'brand_name' => 'required|string',
        ]);
        Brand::create([
            'brand_name' => $validatedData['brand_name'],
            'status' => $this->status == true ? '1' : '0',
        ]);
        session()->flash('success', 'Brand Added Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function render()
    {
        $brands = Brand::all()->reverse();
        return view('livewire.admin.brand.index', compact('brands'))
            ->extends('layouts.admin')
            ->section('content');
    }
}
