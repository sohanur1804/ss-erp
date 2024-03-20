<div>
    <form wire:submit.prevent="formSubmit" class="flex flex-wrap">
        @csrf
        <input wire:model="purchase_date" type="date" name="purchase_date" value="{{ now()->format('Y-m-d') }}" class="rounded p-1" required>

        <div class="flex items-center mr-4 ml-5">
            <label for="mobile" class="mr-2">Mobile:</label>
            <input wire:model="mobile" name="mobile" type="tel" pattern="[0-9\-]+" id="mobile" placeholder="Enter Mobile Number" class="p-1 rounded" required>
            @error('mobile') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center mr-4 ">
            <label for="bill_type" class="mr-1">Bill type :</label>
            <select wire:model="bill_type" id="bill_type">
                <option selected>Select</option>
                <option value="credit">Credit</option>
                <option value="cash">Cash</option>
            </select>
            @error('bill_type') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center mr-4">
            <label for="invoice_number" class="mr-2">invoice-number :</label>
            <input wire:model="invoice_number" type="text" id="invoice_number" placeholder="Invoice Number" class="p-1 rounded" required>
            @error('invoice_number') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        
        <div class="flex items-center mr-4 mt-3">
            <label for="supplier_group" class="mr-2">Supplier Group :</label>
            <input wire:model="supplier_group" type="text" id="supplier_group" placeholder="Gupplier Group / Area" class="rounded p-1" autocomplete="off" list="supplierGroupList" required>
            {{-- <datalist id="supplierGroupList">
                @foreach ($traders as $trader)
                <option value="{{ $trader->group_name }}">
                @endforeach
            </datalist> --}}
            @error('supplier_group') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        
        <div class="flex items-center mr-4 mt-3">
            <label for="supplier_name" class="mr-2">Supplier Name :</label>
            <input wire:model="supplier_name" type="text" id="supplier_name" placeholder="Supplier Name" class="rounded p-1 w-80" autocomplete="off" list="supplierNameList" required>
            {{-- <datalist id="supplierNameList">
                @foreach ($traders as $trader)
                <option value="{{ $trader->customer_name }}">
                @endforeach
            </datalist> --}}
            @error('supplier_name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center mt-3 w-full">
            <label for="address" class="mr-2">Address:</label>
            <input wire:model="address" type="text" id="address" placeholder="Address" class="p-1 rounded w-full" required>
            @error('address') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center mt-3 w-full">
            <label for="narration" class="mr-2">Narration:</label>
            <input wire:model="narration" type="text" id="narration" placeholder="Narration" class="p-1 rounded w-full" required>
            @error('narration') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>


        <div class="flex items-center mr-4 mt-3">
            <label for="categoryName" class="mr-2">Product Group :</label>
            <input wire:model="categoryName" type="text" id="categoryName" placeholder="Product Group/Category" class="rounded p-1"  list="productGroupList" required>
            <datalist id="productGroupList">
                @foreach ($products as $product)
                <option value="{{ $product->category->category_name }}">
                @endforeach
            </datalist>
            @error('categoryName') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>



        <div class="flex items-center mr-4 mt-3">
            <label for="brand" class="mr-2">Brand :</label>
            <input wire:model="brand" type="text" id="brand" placeholder="Brand Name" class="rounded p-1" autocomplete="off" list="brandList" required>
            <datalist id="brandList">
                @foreach ( $products as $product )
                <option value="{{ $product->brand_id }}">
                @endforeach
            </datalist>
            @error('brand') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center mr-4 mt-3">
            <label for="productName" class="mr-2">Product Model :</label>
            <input wire:model="productName" type="text" id="productName" placeholder="Product name/model" class="rounded p-1" autocomplete="off" list="productNameList" required>
            <datalist id="productNameList">
                @foreach ( $products as $product )
                <option value="{{ $product->name }}">{{ $product->name }}</option>
                @endforeach
            </datalist>
            @error('productName') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>


        <div class="flex items-center mr-4 mt-3">
            <p>Stock : </p>
        </div>


        <div class="flex items-center mt-3 mr-5 w-full">
            <label for="description" class="mr-2">Description:</label>
            <input wire:model="description" type="text" id="description" placeholder="Description" class="p-1 rounded w-full" required>
            {{-- this description will be product description and auto filled and not editable --}}
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>


        <div class="flex items-center mt-3 mr-5">
            <label for="unit" class="mr-2">Unit :</label>
            <input wire:model="unit" type="text" id="unit" placeholder="Unit" class="p-1 rounded w-14" required>
            @error('unit') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center mt-3 mr-5">
            <label for="discount" class="mr-2">Discount :</label>
            <input wire:model="discount" type="text" id="discount" placeholder="Discount" class="p-1 rounded w-24" required>
            @error('discount') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center mt-3 mr-5">
            <label for="price" class="mr-2">Unit Price :</label>
            <input wire:model="price" type="number" min="1" step="any" id="price" placeholder="Price" class="p-1 rounded" required>
            @error('price') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        
        <div class="flex items-center mt-3 mr-5">
            <label for="serial_number" class="mr-2">Serial / IMEI Number :</label>
            <input wire:model="serial_number" type="text" id="serial_number" placeholder="Serial / IMEI Number" class="p-1 rounded w-96" required>
            @error('serial_number') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>


        <button type="submit" class="px-5 py-3 bg-gray-300 border rounded ml-2 block mt-5">Add</button>
    </form>
    
    


</div>




