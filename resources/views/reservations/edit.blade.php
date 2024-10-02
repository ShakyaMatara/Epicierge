<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Reservations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="POST" action="{{ route('reservations.update', $reservation) }}">
                    @method('PUT')
                    @csrf

                    <!-- Assigned User -->
                    <div>
                        <x-label for="user_id" value="{{ __('Assigned User') }}" />
                        <select id="user_id" name="user_id" class="block mt-1 w-full" required>
                            <option value="">Select User</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" @selected(old('user_id', $reservation->user_id) == $user->id)>{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="user_id" class="mt-2" />
                    </div>
                    <!-- Customer Name -->
                    <div class="mt-4">
                        <x-label for="customer_id" value="{{ __('Customer Name') }}" />
                        <select id="customer_id" name="customer_id" class="block mt-1 w-full" required>
                            <option value="">Select Customer</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}" @selected(old('customer_id', $reservation->customer_id) == $customer->id)>{{ $customer->customer_name }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="customer_id" class="mt-2" />
                    </div>
                    <!-- Reservation Description -->
                    <div class="mt-4">
                        <x-label for="reservation_description" value="{{ __('Reservation Description') }}" />
                        <textarea id="reservation_description" name="reservation_description" class="block mt-1 w-full" rows="3" required>{{ old('reservation_description', $reservation->reservation_description) }}</textarea>
                        <x-input-error for="reservation_description" class="mt-2" />
                    </div>
                    <!-- Reservation Date -->
                    <div class="mt-4">
                        <x-label for="reservation_date" value="{{ __('Reservation Date') }}" />
                        <x-input id="reservation_date" class="block mt-1 w-full" type="date" name="reservation_date" :value="old('reservation_date', $reservation->reservation_date)" required />
                        <x-input-error for="reservation_date" class="mt-2" />
                    </div>
                    <!-- Reservation Time -->
                    <div class="mt-4">
                        <x-label for="reservation_time" value="{{ __('Reservation Time') }}" />
                        <x-input id="reservation_time" class="block mt-1 w-full" type="time" name="reservation_time" :value="old('reservation_time', $reservation->reservation_time)" required />
                        <x-input-error for="reservation_time" class="mt-2" />
                    </div>
                    <!-- Reservation Guests -->
                    <div class="mt-4">
                        <x-label for="reservation_guests" value="{{ __('Reservation Guests') }}" />
                        <x-input id="reservation_guests" class="block mt-1 w-full" type="number" name="reservation_guests" :value="old('reservation_guests', $reservation->reservation_guests)" required />
                        <x-input-error for="reservation_guests" class="mt-2" />
                    </div>
                    <!-- Reservation Status -->
                    <div class="mt-4">
                        <x-label for="reservation_status" value="{{ __('Reservation Status') }}" />
                        <select id="reservation_status" name="reservation_status" class="block mt-1 w-full" required>
                            <option value="">Select Status</option>
                            <option value="pending" @selected(old('reservation_status', $reservation->reservation_status) == 'pending')>Pending</option>
                            <option value="confirmed" @selected(old('reservation_status', $reservation->reservation_status) == 'confirmed')>Confirmed</option>
                            <option value="cancelled" @selected(old('reservation_status', $reservation->reservation_status) == 'cancelled')>Cancelled</option>
                        </select>
                        <x-input-error for="reservation_status" class="mt-2" />
                    </div>
                    <!-- Submit Button -->
                    <div class="mt-4">
                        <x-button class="ml-3">
                            {{ __('Update and Save') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
