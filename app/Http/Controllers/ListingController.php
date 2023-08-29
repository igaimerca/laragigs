<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
  //show all listings
  public function index(Request $request)
  {
    return view('listings.index', [
      'heading' => 'Latest Listings',
      'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(2) // we can also use 'simplePaginate'
    ]);
  }

  public function create()
  {
    return view('listings.create');
  }
  //show single listing
  public function show(Listing $listing)
  {
    return view('listings.show', [
      'listing' => $listing
    ]);
  }
  public function store(Request $request)
  {
    // dd($request->all());
    $formFields = $request->validate([
      'title' => 'required',
      'company' => ['required', Rule::unique('listings', 'company')],
      'location' => 'required',
      'website' => 'required',
      'email' => ['required', 'email'],
      'tags' => 'required',
      'description' => 'required'
    ]);
    Listing::create($formFields);
    return redirect("/")->with('message', 'Listing successfully created');
  }
}
