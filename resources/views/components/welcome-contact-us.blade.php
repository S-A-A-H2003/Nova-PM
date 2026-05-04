<x-form-structure action="{{route('contactUs')}}">
    <x-form-fieldset
        name="name"
        value="{{old('name')}}"
        placeholder="{{ __('Name') }}"
        lable-name="{{ __('Name') }}"
    />
    <x-form-fieldset
        name="email"
        value="{{old('email')}}"
        type="email"
        placeholder="{{ __('Email') }}"
        lable-name="{{ __('Email') }}"
    />
    <x-form-fieldset-textarea
        type="text"
        name="content"
        value="{{old('Content')}}"
        placeholder="{{ __('Content') }}"
        lable-name="{{ __('Content') }}"
    />
</x-form-structure>
