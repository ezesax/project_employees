<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emps = Employee::all();
        $msg = count($emps) == 0 ? 'No employees in database' : 'Employees has been found';
        return response()->json(['message' => $msg, 'data' => $emps], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $data = $request->validated();
        $emp = new Employee();

        $emp->name = $data['name'];
        $emp->lastname = $data['lastname'];
        $emp->birthday = $data['birthday'];
        $emp->roll_on_date = $data['roll_on_date'];
        $emp->roll_off_date = $data['roll_off_date'];
        $emp->project_id = $data['project_id'];
        $emp->save();

        return response()->json(['message' => 'Employee has been stored', 'data' => $emp], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emp = Employee::find($id);
        $msg = !isset($emp) ? 'There is no employee with this given id' : 'Employee has been found';
        return response()->json(['message' => $msg, 'data' => $emp], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        $emp = Employee::find($id);
        if(!isset($emp))
            return response()->json(['message' => 'There is no employee with this given id', 'data' => null], 404);

        $data = $request->validated();

        $emp->name = $data['name'];
        $emp->lastname = $data['lastname'];
        $emp->birthday = $data['birthday'];
        $emp->roll_on_date = $data['roll_on_date'];
        $emp->roll_off_date = $data['roll_off_date'];
        $emp->project_id = $data['project_id'];
        $emp->save();

        return response()->json(['message' => 'Employee has been updated', 'data' => $emp], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emp = Employee::find($id);
        if(!isset($emp))
            return response()->json(['message' => 'There is no employee with this given id', 'data' => null], 404);
        
        $emp->delete();

        return response()->json(['message' => 'Employee has been deleted', 'data' => null], 202);
    }
}
