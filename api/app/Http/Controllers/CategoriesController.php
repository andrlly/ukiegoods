<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function getAllCategories(){
        return Category::all();
    }

    public function addCategory(Request $request) {
        $category = new Category();

        $category['name'] = $request->name;

        $category->save();

        return ['success' => true, 'id' => $category['id']];
    }

    public function editCategory(Request $request, $id) {
        $category = Category::find($id);

        $category['name'] = $request->name;

        $category->save();

        return ['success' => true];
    }

    public function deleteCategory($id) {
        Category::find($id)->delete();
        return ['success' => true];
    }
}
