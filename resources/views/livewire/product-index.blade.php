<div>
    <form wire:submit.prevent="formSubmit" class="flex flex-wrap">
        @csrf


        <div class="flex items-center mr-4">
            <label for="category">Category:</label>
            <input wire:model="category" type="text" id="category" placeholder="Category" autocomplete="off" list="categoryList" required>
            <datalist id="categoryList">
                @foreach ($categories as $category)
                <option value="{{ $category }}">
                @endforeach
            </datalist>
            @error('category') <span>{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center mr-4">
            <label for="brand" class="mr-2">Brand:</label>
            <input wire:model="brand" type="text" id="brand" placeholder="Brand" class="rounded" autocomplete="off" list="brandList" required>
            <datalist id="brandList">
                @foreach ($brands as $brand)
                <option value="{{ $brand }}">
                @endforeach
            </datalist>
            @error('brand') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>


       
        <div class="flex items-center mr-4">
            <label for="name" class="mr-2">Product Name:</label>
            <input wire:model="name" type="text" id="name" placeholder="Product Name or Model" class="rounded" required>
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div> 

        <div class="flex items-center">
            <label for="warranty" class="mr-2">Warranty:</label>
            <input wire:model="warranty" type="text" id="warranty" placeholder="Warranty" class="rounded" autocomplete="off" list="warrantydList" required>
            <datalist id="warrantydList">
                @foreach ($warranties as $warranty)
                <option value="{{ $warranty }}">
                @endforeach
            </datalist>
            @error('warranty') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center w-full mt-5">
            <label for="description" class="mr-2">Description:</label>
            <input wire:model="description" type="text" id="description" placeholder="Description" class="w-full rounded" required>
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <br>

        <button type="submit" class="px-5 py-3 bg-gray-300 border rounded ml-2 block mt-6 mb-10">Add</button>
    </form>

    <table class="w-full table-auto mt-10">
        <tr>
            <th class="border px-4 py-2 text-center">Serial</th>
            <th class="border px-4 py-2 text-center">Product Name</th>
            <th class="border px-4 py-2 text-center">Category</th>
            <th class="border px-4 py-2 text-center">Brand</th>
            <th class="border px-4 py-2 text-center">Warranty</th>
            <th class="border px-4 py-2 text-center">Description</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>

        @foreach($products as $product)
        <tr>
            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
            <td class="border px-4 py-2">
                @if($editMode && $selectedProductId === $product->id)
                <input wire:model="name" type="text" placeholder="Product Name" required>
                @else
                {{ $product->name }}
                @endif
            </td>
            <td class="border px-4 py-2">
                @if($editMode && $selectedProductId === $product->id)
                <input wire:model="category" type="text" placeholder="Category" required>
                @else
                {{ $product->category->category_name  }}
                @endif
            </td>
            <td class="border px-4 py-2">
                @if($editMode && $selectedProductId === $product->id)
                <input wire:model="brand" type="text" placeholder="Brand" required>
                @else
                {{ $product->brand->brand_name }}
                @endif
            </td>
            <td class="border px-4 py-2">
                @if($editMode && $selectedProductId === $product->id)
                <input wire:model="warranty" type="text" placeholder="Warranty" required>
                @else
                {{ $product->warranty->warranty_duration }}
                @endif
            </td>
            <td class="border px-4 py-2">
                @if($editMode && $selectedProductId === $product->id)
                <input wire:model="description" type="text" placeholder="Description" required>
                @else
                {{ $product->description }}
                @endif
            </td>
            <td class="border px-4 py-2 text-center">
                <div class="flex items-center justify-around">
                    @if($editMode && $selectedProductId === $product->id)
                    <button wire:click.prevent="formSubmit">Update</button>
                    <button wire:click.prevent="resetForm">Cancel</button>
                    @else
                    <button wire:click.prevent="editProduct({{ $product->id }})">Edit</button>
                    <button wire:click.prevent="deleteProduct({{ $product->id }})" onclick="return confirm('Are you sure?')">Delete</button>
                    @endif
                </div>
            </td>
        </tr>
        @endforeach
    </table>
</div>
