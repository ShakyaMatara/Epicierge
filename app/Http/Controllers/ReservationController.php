<?php

namespace App\Http\Controllers;

use App\Enums\PermissionEnum;
use App\Models\Customer;
use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $reservations = Reservation::with(['user', 'customer'])->paginate(10);

        return view('reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $users = User::select(['id', 'name'])->get();
        $customers = Customer::select(['id', 'customer_name'])->get();

        return view('reservations.create', compact('users', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request)
    {
        Reservation::create($request->validated());

        return redirect()->route('reservations.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        $users = User::select(['id', 'name'])->get();
        $customers = Customer::select(['id', 'customer_name'])->get();

        return view('reservations.edit', compact('reservation', 'users', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        $reservation->update($request->validated());

        return redirect()->route('reservations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        Gate::authorize(PermissionEnum::DELETE_RESERVATIONS->value);

        $reservation->delete();

        return redirect()->route('reservations.index');
    }
}
