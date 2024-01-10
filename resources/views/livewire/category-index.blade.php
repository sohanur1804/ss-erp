{{-- <div>
    <label for="classification">Category Classification:</label>
        <select wire:model="classification" form="categoryname">
            <option value="Group">Group</option>
            <option value="Brand">Brand</option>
        </select>
        

    <form id="categoryname" wire:submit.prevent="addCategory">
        @include('components.form-field', [
        'name' => 'category_name',
        'label' => 'Category Name',
        'type' => 'text',
        'placeholder' => 'Category Name',
        'required' => 'required',
        ])


        @include('components.wire-loading-btn')
    </form>

</div> --}}

{{-- <div>
    <form wire:submit.prevent="createCategory">
        <label for="classification">Select Classification:</label>
    <select wire:model="classification">
        <option value="brand">Brand</option>
        <option value="group">Group</option>
    </select>

    <label for="categoryName">Category Name:</label>
    <input type="text" wire:model="categoryName" placeholder="Enter category name">
    @include('components.wire-loading-btn')
    </form>    
</div> --}}

<form wire:submit.prevent="formSubmit">
    <div class="mb-6">
        <label for="classification">Select Classification:</label>
    <select wire:model="classification">
        <option value="brand">Brand</option>
        <option value="group">Group</option>
    </select>
            {{-- </div>
            <div class="mb-6"> --}}
        @include('components.form-field', [
            'name' => 'category_name',
            'label' => 'category_name',
            'type' => 'text',
            'placeholder' => 'category_name',
            'required' => 'required',
        ])
    </div>
    @include('components.wire-loading-btn')
</form>

<div>
    <table class="w-full table-auto">
        {{-- <p>All Product Count:- {{count($categories)}} items</p> --}}
        <tr>
            <th class="border px-4 py-2 text-center">Id </th>
            <th class="border px-4 py-2 text-center">category_name </th>
            <th class="border px-4 py-2 text-center">classification</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
            @foreach($categories as $category)
        <tr>

            <td class="border px-4 py-2">{{$category->id}}</td>
            <td class="border px-4 py-2">{{$category->category_name}}</td>
            <td class="border px-4 py-2">{{$category->classification}}</td>
            <td class="border px-4 py-2 text-center">
                <div class="flex items-center justify-center">
                    <a href="">
                        @include('components.icons.edit')
                    </a>

                    <a class="px-2" href="">
                        @include('components.icons.eye')
                    </a>

                    <form onsubmit="return confirm('Are you sure?');"
                        wire:submit.prevent="">
                        <button type="submit">
                            @include('components.icons.trash')
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
</div>