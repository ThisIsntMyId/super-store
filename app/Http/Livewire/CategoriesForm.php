<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoriesForm extends Component
{
    public $categoryName;
    public $categoryDesc;
    public $categoryParent;
    public $categoryFeatured;
    public $isEdit;
    public $category;

    protected $listeners = ['categoryUpdate'];

    protected $rules = [
        'categoryName' => 'required|min:3',
        'categoryDesc' => 'nullable|max:255',
        'categoryParent' => 'nullable|exists:categories,id',
        'categoryFeatured' => 'nullable|boolean',
    ];

    public function categoryUpdate(Category $category)
    {
        $this->categoryName = $category->name;
        $this->categoryDesc = $category->description;
        $this->categoryParent = $category->parent_id;
        $this->categoryFeatured = $category->featured;
        $this->isEdit = true;
        $this->category = $category;
    }

    public function save()
    {
        $this->validate();

        if ($this->isEdit) {
            $this->category->name = $this->categoryName;
            $this->category->description = $this->categoryDesc;
            $this->category->parent_id = $this->categoryParent;
            $this->category->featured = $this->categoryFeatured;
            $this->category->save();

            $this->emit('categoryCreated', $this->category);
        } else {
            $cat = Category::create([
                'name' => $this->categoryName,
                'description' => $this->categoryDesc,
                'parent_id' => $this->categoryParent,
                // 'featured' => $this->categoryFeatured,
            ]);
            $this->emit('categoryCreated', $cat);
        }

    }

    public function render()
    {
        return view('livewire.categories-form');
    }
}
