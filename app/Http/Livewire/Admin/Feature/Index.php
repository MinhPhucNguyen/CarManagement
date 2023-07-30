<?php

namespace App\Http\Livewire\Admin\Feature;

use App\Models\Feature;
use Livewire\Component;

class Index extends Component
{
    public $featureId, $name, $logo;

    public function resetInput()
    {
        $this->name = NULL;
        $this->logo = NULL;
    }

    public function addFeature()
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
        ]);

        Feature::create([
            'name' => $validatedData['name'],
            'logo' => $this->logo,
        ]);

        session()->flash('message', 'Feature Added Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function editFeature(int $id)
    {
        $this->featureId = $id;
        $feature = Feature::find($id);
        $this->name = $feature->name;
        $this->logo = $feature->logo;
    }

    public function updateFeature()
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
        ]);

        Feature::find($this->featureId)->update([
            'name' => $validatedData['name'],
            'logo' => $this->logo,
        ]);

        session()->flash('message', 'Feature Updated Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function deleteFeature(int $id){
        $this->featureId = $id;
    }

    public function destroyFeature(){
        Feature::find($this->featureId)->delete();
        session()->flash('message','Feature Deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $features = Feature::all()->reverse();
        return view('livewire.admin.feature.index', compact('features'))
            ->extends('layouts.admin')
            ->section('content');
    }
}
