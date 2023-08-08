<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return response([
            'employees' =>
            EmployeeResource::collection($employees),
            'message' => 'Successful'
        ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|max:50',
            'contact' => 'required|max:50',
            'email' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return response([
                'error' => $validator->errors(),
                'Validation Error'
            ]);
        }

        $employee = new Employee;
        $employee->name = $request->name;
        $employee->contact = $request->contact;
        $employee->email = $request->email;
        $employee->save();

        return response([
            'employee' => new
                EmployeeResource($employee),
            'message' => 'Success'
        ], 200);
    }


    public function show(Employee $employee)
    {
        return response(['employee' => new
            EmployeeResource($employee), 'message' => 'Success'], 200);
    }

    public function update(Request $request, Employee $employee)
    {

        $employee->update($request->all());

        return response(['employee' => new
            EmployeeResource($employee), 'message' => 'Success'], 200);
    }
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return response(['message' => 'Employee deleted']);
    }
}
