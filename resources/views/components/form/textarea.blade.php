@props(['name'])
<div class="mb-3">
    <label for="{{$name}}" class="form-label">{{ucwords($name)}}</label>
    <textarea name="{{$name}}" id="{{$name}}" rows="30" class="form-control editor">{{old($name)}}</textarea>
    <x-error :name="$name"></x-error>
</div>
