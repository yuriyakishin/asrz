<div class="box-body pad">
  <label>{{ $label }}</label>
  <textarea type="text" id="{{ $id }}" name="{{ $name }}" class="form-control" {!! $attr ?? '' !!}>{{ $value }}</textarea>
</div>