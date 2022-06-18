<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupDestroyRequest;
use App\Http\Requests\GroupStoreRequest;
use App\Http\Requests\GroupUpdateRequest;
use App\Models\Group;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection
     */
    public function index(): Collection
    {
        return Group::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GroupStoreRequest $request
     * @return Group
     */
    public function store(GroupStoreRequest $request): Group
    {
        return Group::create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Group
     */
    public function show(int $id): Group
    {
        return Group::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GroupUpdateRequest $request
     * @param int $id
     * @return Group
     */
    public function update(GroupUpdateRequest $request, int $id): Group
    {
        return tap(Group::findOrFail($id))->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param GroupDestroyRequest $request
     * @return Response
     */
    public function destroy(GroupDestroyRequest $request): Response
    {
        return Group::destroy($request->route("group"));
    }
}
