<div>

    <!-- Form Section -->
    <form wire:submit.prevent="formSubmit">
        @csrf
        @include('components.form-field', [
            'name' => 'warranty_duration',
            'label' => 'Warranty Duration',
            'type' => 'text',
            'placeholder' => 'Enter Warranty Duration',
           'required' =>'required',
        ])
        <button type="submit" class="ss-btn">Add</button>
    </form>

    <!-- Warranty List Section -->
    <table class="w-full table-auto mt-10">
        <tr>
            <th class="border px-4 py-2 text-center">Serial No.</th>
            <th class="border px-4 py-2 text-center">Warranty Duration</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>

        @foreach ($warranties as $warranty)
        <tr>
            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
            <td class="border px-4 py-2">
                @if ($editMode && $selectedWarrantyId === $warranty->id)
                    <input wire:model="warranty_duration" type="text" placeholder="Warranty Duration" required>
                @else
                    {{ $warranty->warranty_duration }}
                @endif
            </td>
            <td class="border px-4 py-2 text-center">
                <div class="flex items-center justify-around">
                    @if ($editMode && $selectedWarrantyId === $warranty->id)
                        <button wire:click.prevent="formSubmit">Update</button>
                        <button wire:click.prevent="resetForm">Cancel</button>
                        @else
                        <a wire:click.prevent="editWarranty({{ $warranty->id }})" href="#">
                            Edit
                        </a>

                        <form onsubmit="return confirm('Are you sure?')" wire:submit.prevent="deleteWarranty({{ $warranty->id }})">
                            <button type="submit">Delete</button>
                        </form>
                    @endif
                </div>
            </td>
        </tr>
            
        @endforeach
    </table>

</div>
