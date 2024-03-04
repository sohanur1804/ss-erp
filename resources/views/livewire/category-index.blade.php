<div>
    <form wire:submit.prevent="formSubmit">
        @csrf
        <label for="classification">Select Classification:</label>
        <select wire:model="classification">
            <option selected>Select</option>
            <option value="brand">Brand</option>
            <option value="Category">Category</option>
        </select>

        @include('components.form-field', [
            'name' => 'category_name',
            'label' => 'category_name',
            'type' => 'text',
            'placeholder' => 'category_name',
            'required' => 'required',
        ])

        <button type="submit" class="p-3 bg-gray-300 border rounded">Add</button>
            
        
    </form>

    <table class="w-full table-auto mt-10">
        <tr>
            <th class="border px-4 py-2 text-center">Serial</th>
            <th class="border px-4 py-2 text-center">Classification</th>
            <th class="border px-4 py-2 text-center">Category Name</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
        
        @foreach($categories as $category)
            <tr>
                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border px-4 py-2">
                    @if($editMode && $selectedCategoryId === $category->id)
                        <select wire:model="classification">
                            <option value="brand" {{ $classification === 'brand' ? 'selected' : '' }}>Brand</option>
                            <option value="group" {{ $classification === 'group' ? 'selected' : '' }}>Group</option>
                        </select>
                    @else
                        {{ $category->classification }}
                    @endif
                </td>
                <td class="border px-4 py-2">
                    @if($editMode && $selectedCategoryId === $category->id)
                        <input wire:model="category_name" type="text" placeholder="Category Name" required>
                    @else
                        {{ $category->category_name }}
                    @endif
                </td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex items-center justify-around">
                        @if($editMode && $selectedCategoryId === $category->id)
                            <button wire:click.prevent="formSubmit">Update</button>
                            <button wire:click.prevent="resetForm">Cancel</button>
                        @else
                            <a wire:click.prevent="editCategory({{ $category->id }})" href="#">
                                @include('components.icons.edit')
                            </a>

                            <form onsubmit="return confirm('Are you sure?')" wire:submit.prevent="categoryDelete({{ $category->id }})">
                                <button type="submit">
                                    @include('components.icons.trash')
                                </button>
                            </form>
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
</div>
