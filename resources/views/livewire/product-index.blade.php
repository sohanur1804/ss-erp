<form wire:submit.prevent="formSubmit">
    @include('components.form-field', [
            'name' => 'name',
            'label' => 'Product Name Or Model',
            'type' => 'text',
            'placeholder' => 'name or model',
            'required' => 'required',
    ])

    @include('components.form-field', [
            'name' => 'category',
            'label' => 'category',
            'type' => 'text',
            'placeholder' => 'product category',
            'required' => 'required',
    ])

    @include('components.form-field', [
            'name' => 'dercription',
            'label' => 'Dercription',
            'type' => 'text',
            'placeholder' => 'product dercription',
            'required' => 'required',
    ])

    @include('components.form-field', [
            'name' => 'warrenty',
            'label' => 'Warrenty',
            'type' => 'text',
            'placeholder' => 'product warrenty',
            'required' => 'required',
    ])

    @include('components.form-field', [
            'name' => 'brand',
            'label' => 'Brand',
            'type' => 'text',
            'placeholder' => 'enter Brand',
            'required' => 'required',
    ])

</form>