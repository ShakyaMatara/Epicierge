<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Customer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="POST" action="{{ route('customers.store') }}">
                    @csrf
                    <!-- Customer Name-->
                    <div>
                        <x-label for="customer_name" value="{{ __('Customer Name') }}" />
                        <x-input id="customer_name" class="block mt-1 w-full" type="text" name="customer_name" :value="old('customer_name')" required autofocus autocomplete="customer_name" />
                        <x-input-error for="customer_name" class="mt-2" />
                    </div>
                    <!-- Customer Phone -->
                    <div class="mt-4">
                        <x-label for="customer_phone" value="{{ __('Customer Phone') }}" />
                        <x-input id="customer_phone" class="block mt-1 w-full" type="text" name="customer_phone" :value="old('customer_phone')" required autocomplete="customer_phone" />
                        <x-input-error for="customer_phone" class="mt-2" />
                    </div>
                    <!-- Customer Email -->
                    <div class="mt-4">
                        <x-label for="customer_email" value="{{ __('Customer Email') }}" />
                        <x-input id="customer_email" class="block mt-1 w-full" type="email" name="customer_email" :value="old('customer_email')" required autocomplete="customer_email" />
                        <x-input-error for="customer_email" class="mt-2" />
                    </div>
                    <!-- Customer Notes -->
                    <div class="mt-4">
                        <x-label for="customer_notes" value="{{ __('Customer Notes') }}" />
                        <textarea id="customer_notes" name="customer_notes" class="block mt-1 w-full" rows="3" required>{{ old('customer_notes') }}</textarea>
                        <x-input-error for="customer_notes" class="mt-2" />
                    </div>
                    <!-- Submit Button -->
                    <div class="mt-4">
                        <x-button class="ml-3">
                            {{ __('Save Customer') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
