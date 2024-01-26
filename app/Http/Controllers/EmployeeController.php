<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // gett all data from database to table
        // last created , first shown table
        $employees = Employee::all()->sortByDesc('id');
        return view('employee_table', ['employees1' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $request->validated();

        if ($request->hasFile('photo')) {





            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            // $path = $file->storeAs('images', $filename);
            // storeAs function saved database images/1706272670.jpg 
            // storeAs fucntion saved storage/app/images/1706272670.jpg


            $imageName = time().'.'.$request->photo->extension();  
            $request->photo->move(public_path('images'), $imageName);
            // move function saved database 1706272670.jpg 
            // move public_path saved, public/images/1706272670.jpg 
        }

        $name = $request->name;
        $job = $request->job;
        $employed = $request->employed;


        $employee = new Employee();
        $employee->photo = $imageName;
        $employee->name = $name;
        $employee->job = $job;
        $employee->employed = $employed;
        
        $employee->save();


        return back()
                    ->with('success', 'You have successfully upload image.')
                    ->with('photo', $imageName); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee,$id)
    {
        // get id , shown form data from database
        $employee = Employee::findOrFail($id);
        return view('employee_read', ['employee3' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee, $id)
    {
        // get id , shown form data from database
        $employee = Employee::findOrFail($id);
        return view('employee_edit', ['employee2' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        //
        
        if ($request->hasFile('photo')) {
        

            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ]);

            // before photo delete
            $employeeforphoto = Employee::findOrFail($request->id);
            $image_path = public_path().'/images/'.$employeeforphoto->photo;
            unlink($image_path);


            $imageName = time().'.'.$request->photo->extension();  
            $request->photo->move(public_path('images'), $imageName);
            // move function saved database 1706272670.jpg 
            // move public_path saved, public/images/1706272670.jpg }

        $employeeforphoto->photo = $imageName;
        $employeeforphoto->update();
        }


        

        $employee = Employee::findOrFail($request->id);
        
        $employee->name = $request->name;
        $employee->job = $request->job;
        $employee->employed = $request->employed;
        $employee->update();
        return redirect()->route('table')->with('success', 'Employee updated successfully. employee id: '. $employee->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee, $id)
    {
        // delete data from database
        $employee = Employee::findOrFail($id);
        $image_path = public_path().'/images/'.$employee->photo;
        $employee->delete();
        // photo delete
        if (file_exists($image_path)) {
        unlink($image_path);
        }
        return redirect()->route('table')
      ->with('success', 'Employee deleted successfully');
    }
}
