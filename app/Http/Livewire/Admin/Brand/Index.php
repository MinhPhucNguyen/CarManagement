<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;

class Index extends Component
{
    public $brand_id, $brand_name, $status;

    public function resetInput()
    {
        $this->brand_name = NULL;
        $this->status = NULL;
    }

    public function addBrand()
    {
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

    public function editBrand(int $brand_id)
    { //Fill data in edit modal
        $this->brand_id = $brand_id;

        $brand = Brand::find($brand_id);
        $this->brand_name = $brand->brand_name;
        $this->status = $brand->status;
    }

    public function updateBrand()
    {
        $validatedData = $this->validate([
            'brand_name' => 'required|string',
        ]);
        Brand::find($this->brand_id)->update([
            'brand_name' => $validatedData['brand_name'],
            'status' => $this->status == true ? '1' : '0',
        ]);
        session()->flash('success', 'Brand Update Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function deleteBrand(int $brand_id){
        $this->brand_id = $brand_id;
    }

    public function destroyBrand(){
        Brand::find($this->brand_id)->delete();
        session()->flash('success', 'Brand Delete Successfully');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $brands = Brand::all()->reverse();
        return view('livewire.admin.brand.index', compact('brands'))
            ->extends('layouts.admin')
            ->section('content');
    }
}
