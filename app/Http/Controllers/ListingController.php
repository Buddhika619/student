<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use domain\Facades\ListingFacade;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ListingController extends Controller
{



    //show all listings
    public function index(Request $request)
    {

        $response['listings'] = ListingFacade::all($request);
        return Inertia::render('Listing/index',$response);


        // return view('Listings.index', [
        //     'heading' => 'latest listings',
        //     'listings' => ListingFacade::all($request)
        // ]);
    }


    //show single listing
    public function show($listing)
    {

        $response['listing'] = ListingFacade::one($listing);
        return Inertia::render('Show/index', $response);

       
    }


    
    // show create Form 
    public function create()
    {
       
        return Inertia::render('Create/index');
    }


    //store Listing data
    public function store(Request $request)
    {


        ListingFacade::store($request);

        $response['listings'] = ListingFacade::all($request);
        return response()->json($response);
    }

    //show edit form
    public function edit($listing)
    {
    
        $response['listing'] = ListingFacade::one($listing);
        return Inertia::render('Edit/index', $response);
    }

    //update Listing data
    public function update(Request $request,  $listing)
    {
        ListingFacade::update($request, $listing);
        return back()->with('message', 'Listing updated successfully!');
    }


    //Delete Listing
    public function delete($listing)
    {
        ListingFacade::delete( $listing);
        return redirect('/')->with('message', 'Listing Delete successfully');
    }
}
