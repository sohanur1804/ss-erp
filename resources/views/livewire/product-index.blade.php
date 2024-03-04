{{-- product-index.blade.php --}}

<div>
        <form wire:submit.prevent="formSubmit" class="flex flex-wrap">
            @csrf
    
            <div class="flex items-center mr-4">
                <label for="name" class="mr-2">Product Name:</label>
                <input wire:model="name" type="text" id="name" placeholder="Product Name or Model" class="rounded">
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
    
            <div class="flex items-center mr-4">
                <label for="category">Category:</label>
                <input wire:model="category" type="text" id="category" placeholder="Category" autocomplete="off"
                        list="categoryList">
                <div class="category-suggestions">
                        <datalist id="categoryList">
                                @foreach ($categories as $category)
                                <option value="{{ $category }}">
                                        @endforeach
                        </datalist>
                </div>
                @error('category') <span>{{ $message }}</span> @enderror
        </div>

            <div class="flex items-center mr-4">
                <label for="brand" class="mr-2">Brand:</label>
                <input wire:model="brand" type="text" id="brand" placeholder="Brand" class="rounded" autocomplete="off"
                list="brandList">

                <div class="category-suggestions">
                        <datalist id="brandList">
                                @foreach ($brands as $brand)
                                <option value="{{ $brand }}">
                                        @endforeach
                        </datalist>
                </div>

                @error('brand') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="flex items-center">
                <label for="warranty" class="mr-2">Warranty:</label>
                <input wire:model="warranty" type="text" id="warranty" placeholder="Warranty" class="rounded">
                @error('warranty') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
    
            <div class="flex items-center w-full mt-5">
                <label for="description" class="mr-2">Description:</label>
                <input wire:model="description" type="text" id="description" placeholder="Description" class="w-full rounded">
                @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
    
            
            <br>
            
    
            <button type="submit" class="px-5 py-3 bg-gray-300 border rounded ml-2 block mt-6 mb-10">
                {{ $editMode ? 'Update' : 'Add' }}
            </button>
        </form>
    
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Warranty</th>
                    <th>Brand</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->warranty }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>
                            <button wire:click="editProduct({{ $product->id }})">Edit</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    
        
    </div>
    