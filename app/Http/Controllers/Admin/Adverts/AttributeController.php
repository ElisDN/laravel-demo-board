<?php

namespace App\Http\Controllers\Admin\Adverts;

use App\Entity\Adverts\Attribute;
use App\Entity\Adverts\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AttributeController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:manage-adverts-categories');
    }

    public function create(Category $category)
    {
        $types = Attribute::typesList();

        return view('admin.adverts.categories.attributes.create', compact('category', 'types'));
    }

    public function store(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'type' => ['required', 'string', 'max:255', Rule::in(array_keys(Attribute::typesList()))],
            'required' => 'nullable|string|max:255',
            'variants' => 'nullable|string',
            'sort' => 'required|integer',
        ]);

        $attribute = $category->attributes()->create([
            'name' => $request['name'],
            'type' => $request['type'],
            'required' => (bool)$request['required'],
            'variants' => array_map('trim', preg_split('#[\r\n]+#', $request['variants'])),
            'sort' => $request['sort'],
        ]);

        return redirect()->route('admin.adverts.categories.attributes.show', [$category, $attribute]);
    }

    public function show(Category $category, Attribute $attribute)
    {
        return view('admin.adverts.categories.attributes.show', compact('category', 'attribute'));
    }

    public function edit(Category $category, Attribute $attribute)
    {
        $types = Attribute::typesList();

        return view('admin.adverts.categories.attributes.edit', compact('category', 'attribute', 'types'));
    }

    public function update(Request $request, Category $category, Attribute $attribute)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'type' => ['required', 'string', 'max:255', Rule::in(array_keys(Attribute::typesList()))],
            'required' => 'nullable|string|max:255',
            'variants' => 'nullable|string',
            'sort' => 'required|integer',
        ]);

        $category->attributes()->findOrFail($attribute->id)->update([
            'name' => $request['name'],
            'type' => $request['type'],
            'required' => (bool)$request['required'],
            'variants' => array_map('trim', preg_split('#[\r\n]+#', $request['variants'])),
            'sort' => $request['sort'],
        ]);

        return redirect()->route('admin.adverts.categories.show', $category);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.adverts.categories.show', $category);
    }
}
