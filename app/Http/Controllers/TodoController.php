<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoDestroyRequest;
use App\Http\Requests\TodoStoreRequest;
use App\Http\Requests\TodoUpdateRequest;
use App\Models\Todo;
use Illuminate\Database\Eloquent\Collection;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection
     */
    public function index(): Collection
    {
        return Todo::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TodoStoreRequest $request
     * @return Todo
     */
    public function store(TodoStoreRequest $request): Todo
    {
        return Todo::create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Todo
     */
    public function show(int $id): Todo
    {
        return Todo::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TodoUpdateRequest $request
     * @param int $id
     * @return Todo
     */
    public function update(TodoUpdateRequest $request, int $id): Todo
    {
        return tap(Todo::findOrFail($id))->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TodoDestroyRequest $request
     * @return int
     */
    public function destroy(TodoDestroyRequest $request): int
    {
        return Todo::destroy($request->route("todo"));
    }
}
