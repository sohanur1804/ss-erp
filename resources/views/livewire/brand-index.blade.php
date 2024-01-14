<div>
    <!-- Form Section -->
    <form wire:submit.prevent="formSubmit">
        @csrf
        @include('components.form-field', [
            'name' => 'brand_name',
            'label' => 'Brand Name',
            'type' => 'text',
            'placeholder' => 'Enter Brand Name',
            'required' => 'required',
        ])

<button type="submit" class="ss-btn">Add</button>
    </form>

    <!-- Brands List Section -->
    <table class="w-full table-auto mt-10">
        <tr>
            <th class="border px-4 py-2 text-center">Serial</th>
            <th class="border px-4 py-2 text-center">Brand Name</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>

        @foreach($brands as $brand)
            <tr>
                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border px-4 py-2">
                    @if($editMode && $selectedBrandId === $brand->id)
                        <input wire:model="brand_name" type="text" placeholder="Brand Name" required>
                    @else
                        {{ $brand->brand_name }}
                    @endif
                </td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex items-center justify-around">
                        @if($editMode && $selectedBrandId === $brand->id)
                            <button wire:click.prevent="formSubmit">Update</button>
                            <button wire:click.prevent="resetForm">Cancel</button>
                        @else
                            <a wire:click.prevent="editBrand({{ $brand->id }})" href="#">
                                Edit
                            </a>

                            <form onsubmit="return confirm('Are you sure?')" wire:submit.prevent="deleteBrand({{ $brand->id }})">
                                <button type="submit">Delete</button>
                            </form>
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
</div>
