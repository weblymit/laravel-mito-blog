<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListOfCategory;
use Illuminate\Support\Facades\DB;

class ListOfCategoryController extends Controller
{
  /**
   * home page of category
   *
   * @return void
   */
  public function index()
  {
    $categories = ListOfCategory::all();
    return view('pages.category', compact('categories'));
  }

  /**
   * store category in DB
   */
  public function store(Request $request)
  {
    // dd($request->all());
    // 1- Validate form with validate() method
    $request->validate([
      'category' => 'required|string|max:20|min:1'
    ]);
    // 2- stock form's values in variable
    $data = [
      'category' => $request->category,
      'created_at' => now()
    ];
    // 3- Send in DB with model of DB + create() methode
    ListOfCategory::create($data);

    // 4- redirect
    return back()->with('status', 'Category added');
  }

  /**
   * Delete category
   *
   * @param [int] $id
   * @return void
   */
  public function delete($id)
  {
    $category = ListOfCategory::find($id);

    if (!$category) {
      abort(404);
    }
    $category->delete();

    return back()->with('status', 'Category delete');
  }

  /**
   * Send the view to edit form with the good category
   *
   * @param [int] $id
   * @return void
   */
  public function edit($id)
  {
    $category = ListOfCategory::find($id);
    return view('pages.update-category', compact('category'));
  }

  /**
   * Update the current category and store in DB
   *
   * @param Request $request
   * @param [int] $id
   * @return void
   */
  public function update(Request $request, $id)
  {
    $category = ListOfCategory::find($id);

    // 1- Validate form with validate() method
    $request->validate([
      'category' => 'required|string|max:20|min:1'
    ]);
  }
}
