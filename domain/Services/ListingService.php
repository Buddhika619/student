<?php

namespace domain\Services;

use App\Models\Student;
use Illuminate\Validation\Rule;

class ListingService {
    protected $student;

    public function __construct()
    {
        $this->student = new Student();
    }
    
    //show all listings
    public function all()
    {


        
        return  $this->student->all();
    }


    //show single listing
    public function one($listing)
    {
      
        return $this->student->find($listing);
    }


    //store Listing data
    public function store($request)
    {



        $formFields = $request->validate([
            'name' => 'required',
            'age' => 'required',
            'status' => 'required'


        ]);


        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('image', 'public');
        }


        $this->student->create($formFields);


     
    }

    //show edit form
    public function edit(Student $student)
    {
        return view('listings.edit', ['listing' => $student]);
    }

    //update Listing data
    public function update($request, $student)
    {



        $formFields = $request->validate([
            'name' => 'required',
            'age' => 'required',
            'status' => 'required'


        ]);


        
        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('image', 'public');
        }


        $this->student->find($student)->update($formFields);

     
    }


    //Delete Listing
    public function delete($listing)
    {
        $this->student->find($listing)->delete();
        return redirect('/')->with('message', 'Listing Delete successfully');
    }

}