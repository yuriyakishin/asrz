@push('scripts-bottom')
    <script src="/assets/admin/bower_components/ckeditor/ckeditor.js"></script>
    <script>
        $(function () {
            CKEDITOR.replace('{{ $name }}', {
                filebrowserUploadUrl: "{{route('admin.image.editorupload',['_token' => csrf_token() ])}}"
            })
        })
    </script>
@endpush

<div class="box-body pad">
  <label>{{ $label }}</label>
  <textarea id="{{ $id }}" name="{{ $name }}" rows="10" cols="80" {{ $attr ?? '' }}>{{ $value }}</textarea>
  {!! (isset($help) ? '<span class="help-block">'.$help.'</span>' : '' ) !!}
</div>
