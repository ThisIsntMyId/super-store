<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoriesTable extends Component
{

    protected $listeners = ['categoryCreated'];
    public $notification;

    public function categoryCreated($cat) {
        $this->notification = 'Category '.$cat['name'].' created with id ' . $cat['id'];
    }


    public function delete(Category $category)
    {
        $category->delete();
    }
    public function edit(Category $category)
    {
        return $this->emit('categoryUpdate', $category->id);
    }

    public function render()
    {
        return view('livewire.categories-table', [
            'categories' => Category::paginate(10)
        ]);
    }
}
