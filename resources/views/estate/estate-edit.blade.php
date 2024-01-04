<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('estate.update' , ['estate' => $estateEdit->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <!-- City -->
                        <div class="mt-4">
                            <x-input-label for="city" :value="__('City')" />
                            <select id="city"
                                class="block mt-1 w-1/2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                name="city"  required autocomplete="username">
                                <option value="{{ $estateEdit->City->id }}" selected>{{ $estateEdit->City->city_name }}</option>
                                @foreach ($citis as $city)
                                    <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('city')" class="mt-2" />
                        </div>

                        <!-- EstateType -->
                        <div class="mt-4">
                            <x-input-label for="type" :value="__('Estate type')" />
                            <select id="type"
                                class="block mt-1 w-1/2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                name="type"  required autocomplete="username">
                                <option value="{{ $estateEdit->Type->id }}" selected>{{ $estateEdit->Type->estate_type }}</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->estate_type }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('type')" class="mt-2" />
                        </div>

                        <!-- Estatestatus -->
                        <div class="mt-4">
                            <x-input-label for="status" :value="__('Estate status')" />
                            <select id="status"
                                class="block mt-1 w-1/2 b order-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                name="status"  required autocomplete="username">
                                <option value="{{ $estateEdit->Status->id }}" selected>{{ $estateEdit->Status->estate_status }}</option>
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->id }}">{{ $status->estate_status }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>

                        <!-- description -->
                        <div class="mt-4">
                            <div class="relative w-1/2 min-w-[200px]">
                                <label for="message"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Description</label>
                                <textarea id="message" rows="4" name="description"
                                    class="block p-2.5 w-full text-sm text-gray-900  bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="
                                            Estate description ...">{{ $estateEdit->description }}</textarea>
                            </div><x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- location -->
                        <div>
                            <x-input-label for="location" :value="__('location')" />
                            <x-text-input id="location" class="block mt-1 w-1/2" type="text" name="location"
                                :value=" $estateEdit->location "  required autofocus autocomplete="location" />
                            <x-input-error :messages="$errors->get('location')" class="mt-2" />
                        </div>

                        <!-- Area -->
                        <div>
                            <x-input-label for="area" :value="__('Area')" />
                            <x-text-input id="area" class="block mt-1 w-1/2" type="text" name="area"
                                :value="$estateEdit->area" required autofocus autocomplete="area" />
                            <x-input-error :messages="$errors->get('area')" class="mt-2" />
                        </div>

                        <!-- Amount -->
                        <div class="mt-4">
                            <x-input-label for="amount" :value="__('Amount')" />
                            <x-text-input id="amount" class="block mt-1 w-1/2" type="text" name="amount"
                                :value="$estateEdit->amount" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                        </div>

                        <!-- number of bathroom -->
                        <div class="mt-4">
                            <x-input-label for="bathroom" :value="__('Bathroom')" />
                            <x-text-input id="bathroom" class="block mt-1 w-1/2" type="number" name="bathroom"
                                :value="$estateEdit->number_of_bathroom" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('bathroom')" class="mt-2" />
                        </div>

                        <!-- number of bedroom -->
                        <div class="mt-4">
                            <x-input-label for="bedroom" :value="__('Bedroom')" />
                            <x-text-input id="bedroom" class="block mt-1 w-1/2" type="number" name="bedroom"
                                :value="$estateEdit->number_of_bedroom" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('bedroom')" class="mt-2" />
                        </div>

                        <!-- number of kitchen -->
                        <div class="mt-4">
                            <x-input-label for="kitchen" :value="__('Kitchen')" />
                            <x-text-input id="kitchen" class="block mt-1 w-1/2" type="number" name="kitchen"
                                :value="$estateEdit->number_of_kitchen" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('kitchen')" class="mt-2" />
                        </div>

                        <!-- number of garage -->
                        <div class="mt-4">
                            <x-input-label for="garage" :value="__('Garage')" />
                            <x-text-input id="garage" class="block mt-1 w-1/2" type="number" name="garage"
                                :value=" $estateEdit->number_of_garage" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('garage')" class="mt-2" />
                        </div>

                        <!-- number of floor -->
                        <div class="mt-4">
                            <x-input-label for="floor" :value="__('Floor')" />
                            <x-text-input id="floor" class="block mt-1 w-1/2" type="number" name="floor"
                                :value="$estateEdit->number_of_floor" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('floor')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="image" :value="__('image')" />
                            <x-text-input id="image"
                                class="block w-1/2 p-3 text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                                type="file" name="images[]" :value="old('image')" multiple  autocomplete="username" />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>


                        <div class="flex items-center  mt-4">
                            <x-primary-button class="ms-4" onclick="return confirm('Are you sure you want to edit this estate? If you select new images, all previously uploaded images will be deleted.')">
                                {{ __('submit') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
