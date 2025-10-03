<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Job;
use App\Models\Department;

class EmployeeController extends Controller
{
    // Mostrar lista de empleados
    public function index()
    {
        $empleados = Employee::with(['job', 'department'])->orderBy('id')->get();
        return view('employee.index', compact('empleados'));
    }

    // Formulario de creación
    public function create()
    {
        $jobs = Job::orderBy('title')->get(['id', 'title']);
        $depts = Department::orderBy('name')->get(['id', 'name']);
        $managers = Employee::orderBy('last_name')->get(['id', 'first_name', 'last_name']);

        return view('employee.create', compact('jobs', 'depts', 'managers'));
    }

    // Guardar nuevo empleado
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'job_id' => 'nullable|integer|exists:jobs,id',
            'department_id' => 'nullable|integer|exists:departments,id',
            'manager_id' => 'nullable|integer|exists:employees,id',
        ]);

        Employee::create($request->all());

        return redirect()->route('employee.index')->with('success', 'Empleado creado correctamente.');
    }

    // Formulario de edición
    public function edit(Employee $employee)
    {
        $jobs = Job::orderBy('title')->get(['id', 'title']);
        $depts = Department::orderBy('name')->get(['id', 'name']);
        $managers = Employee::orderBy('last_name')->get(['id', 'first_name', 'last_name']);

        $empleado = $employee;

        return view('employee.edit', compact('empleado', 'jobs', 'depts', 'managers'));
    }

    // Actualizar empleado
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'job_id' => 'nullable|integer|exists:jobs,id',
            'department_id' => 'nullable|integer|exists:departments,id',
            'manager_id' => 'nullable|integer|exists:employees,id',
        ]);

        $employee->update($request->all());

        return redirect()->route('employee.index')->with('success', 'Empleado actualizado correctamente.');
    }

    // Eliminar empleado
    public function destroy(Employee $employee)
    {
        try {
            $employee->delete();
            return redirect()->route('employee.index')->with('success', 'Empleado eliminado correctamente.');
        } catch (\Throwable $e) {
            return back()->withErrors('No se puede eliminar: tiene registros relacionados.');
        }
    }
}
