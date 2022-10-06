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
}
