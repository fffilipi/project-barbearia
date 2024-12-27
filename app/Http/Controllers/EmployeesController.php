<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeesRequest;
use App\Models\Employees;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class EmployeesController extends Controller
{
    /**
     * Display the employee creation form.
     */
    public function create(): Response
    {
        // Renderiza a página para criar um novo funcionário
        return Inertia::render('Employees/Create', [
            'status' => session('status'),
        ]);
    }

    /**
     * Store a newly created employee in the database.
     */
    public function store(EmployeesRequest $request): RedirectResponse
    {
        // Valida os dados do request através do EmployeeRequest
        $validated = $request->validated();

        // Cria o novo funcionário com os dados validados
        Employees::create($validated);

        // Redireciona para a página de listagem ou outra página após o cadastro
        return Redirect::route('employees.create')->with('status', 'Funcionário criado com sucesso!');
    }

    /**
     * Display a list of all employees.
     */
    public function index(): Response
    {
        // Obtém todos os funcionários e retorna a página de listagem
        $employees = Employees::all();

        return Inertia::render('Employees/Index', [
            'employees' => $employees,
        ]);
    }

    /**
     * Show the form for editing the specified employee.
     */
    public function edit(Employees $employee): Response
    {
        // Retorna o formulário de edição com os dados do funcionário
        return Inertia::render('Employees/Edit', [
            'employee' => $employee,
        ]);
    }

    /**
     * Update the specified employee in the database.
     */
    public function update(EmployeesRequest $request, Employees $employee): RedirectResponse
    {
        // Valida os dados do request
        $validated = $request->validated();

        // Atualiza o funcionário com os dados validados
        $employee->update($validated);

        // Redireciona para a página de edição do funcionário
        return Redirect::route('employees.edit', $employee)->with('status', 'Funcionário atualizado com sucesso!');
    }

    /**
     * Remove the specified employee from the database.
     */
    public function destroy(Employees $employee): RedirectResponse
    {
        // Exclui o funcionário
        $employee->delete();

        // Redireciona para a lista de funcionários
        return Redirect::route('employees.index')->with('status', 'Funcionário excluído com sucesso!');
    }
}
