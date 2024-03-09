<div>
    <form wire:submit.prevent="formSubmit" class="flex flex-wrap">
        @csrf

        <div class="flex items-center mr-4">
            <label for="name" class="mr-2">Group Name:</label>
            <input type="text" id="name" placeholder="Group Name / Area" class="p-1 rounded w-96" wire:model="group_name">
            @error('group_name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center mr-4">
            <label for="cus-name" class="mr-2">Customer Name:</label>
            <input type="text" id="cus-name" placeholder="Customer Name" class="p-1 rounded w-96" wire:model="customer_name">
            @error('customer_name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center w-full mt-3">
            <label for="address" class="mr-2">Address:</label>
            <input type="text" id="address" placeholder="Address" class="w-full rounded p-1" wire:model="address">
            @error('address') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center mr-4 mt-3">
            <label for="phone" class="mr-2">Mobile:</label>
            <input type="tel" pattern="[0-9\-]+" id="phone" placeholder="Enter Mobile Number" class="p-1 rounded" wire:model="mobile">
            @error('mobile') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center mt-3 mr-4">
            <label for="email" class="mr-2">Email:</label>
            <input type="email" id="email" placeholder="Enter Email" class="p-1 rounded" wire:model="email">
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center mt-3 mr-2">
            <label for="contact-person" class="mr-2">Contact-Person:</label>
            <input type="text" id="contact-person" placeholder="Contact Person Name" class="p-1 rounded" wire:model="contact_person">
            @error('contact_person') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center mt-3">
            <label for="owner" class="mr-2">Owner/Proprietor:</label>
            <input type="text" id="owner" placeholder="Owner Name" class="rounded p-1" wire:model="owner">
            @error('owner') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center mt-3">
            <label for="op-balance" class="mr-2">Opening Balance:</label>
            <input type="text" id="op-balance" placeholder="Opening Balance" class="rounded p-1" wire:model="opening_balance">
            @error('opening_balance') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        
        
        <button type="submit" class="px-5 py-3 bg-gray-300 border rounded ml-5 block mt-6 mb-3">Add</button>
            
        
    </form>


    <form wire:submit.prevent="search" class="flex items-center mb-4">
        <input wire:model.lazy="search" type="text" class="lms-input" placeholder="Search" required>
        <div class="ml-4">
            <button type="submit" class="px-5 py-3 bg-gray-300 border rounded ml-5 block mt-6 mb-3">Search</button>
        </div>
    </form>


    <table class="w-full table-auto mt-10">
        <tr>
            <th class="border px-4 py-2 text-center">Index</th>
            <th class="border px-4 py-2 text-center">customer_name</th>
            <th class="border px-4 py-2 text-center">Address</th>
            <th class="border px-4 py-2 text-center">Mobile</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
        
        @foreach($traders as $trader)
            <tr>
                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
            
                <td class="border px-4 py-2">
                    @if($editMode && $selectedTraderId === $trader->id)
                        <input wire:model="customer_name" type="text" placeholder="Customer Name" required>
                    @else
                        {{ $trader->customer_name }}
                    @endif
                </td>
                <td class="border px-4 py-2">
                    @if($editMode && $selectedTraderId === $trader->id)
                        <input wire:model="address" type="text" placeholder="Address" required>
                    @else
                        {{ $trader->address }}
                    @endif
                </td>
                <td class="border px-4 py-2">
                    @if($editMode && $selectedTraderId === $trader->id)
                        <input wire:model="mobile" type="text" placeholder="Mobile" required>
                    @else
                        {{ $trader->mobile }}
                    @endif
                </td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex items-center justify-around">
                        @if($editMode && $selectedTraderId === $trader->id)
                            <button wire:click.prevent="formSubmit">Update</button>
                            <button wire:click.prevent="resetForm">Cancel</button>
                        @else
                            <a wire:click.prevent="editTrader({{ $trader->id }})" href="#">
                                @include('components.icons.edit')
                            </a>

                            <div x-data="{ confirmDelete: false }">
                                <button @click="confirmDelete = true">
                                    @include('components.icons.trash')
                                </button>
                            
                                <div x-show="confirmDelete">
                                    <p>Are you sure you want to delete this course?</p>
                                    <button @click="confirmDelete = false">Cancel</button>
                                    <button @click="confirmDelete = false; $wire.traderDelete({{ $trader->id }})">OK</button>
                                </div>
                            </div>
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
    </table>

</div>
