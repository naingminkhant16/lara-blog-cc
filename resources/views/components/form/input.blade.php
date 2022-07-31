@props(['name','type'=>'text'])
<div class="mb-3">
    <x-form.label :name="$name"></x-form.label>
    <input type="{{$type}}" id="{{$name}}" class="form-control" name="{{$name}}" value="{{old($name)}}">
    <x-error :name="$name"></x-error>
</div>
