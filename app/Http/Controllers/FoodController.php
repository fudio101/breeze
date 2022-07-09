<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Http\Requests\StoreFoodRequest;
use App\Http\Requests\UpdateFoodRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $food = Food::query()->get();
        return view('food', ['food' => $food]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFoodRequest $request
     * @return Application|Factory|View
     */
    public function store(StoreFoodRequest $request): View|Factory|Application
    {
        $food = new Food();
        $food->fill([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
        ]);
        $food->save();

        return \view('food');
    }

    /**
     * Display the specified resource.
     *
     * @param Food $food
     * @return Response
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Food $food
     * @return Response
     */
    public function edit(Food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateFoodRequest $request
     * @param Food $food
     * @return Response
     */
    public function update(UpdateFoodRequest $request, Food $food)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Food $food
     * @return Application|Factory|View
     */
    public function destroy(Food $food): View|Factory|Application
    {
        $food->delete();

        return \view('food');
    }
}
