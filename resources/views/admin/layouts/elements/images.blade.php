@push('scripts-top')
    <link href="/assets/js/fine-uploader/fine-uploader-gallery.css" rel="stylesheet">
    <script src="/assets/js/fine-uploader/fine-uploader.min.js"></script>
    <script type="text/template" id="qq-template">
        <div class="qq-uploader-selector qq-uploader qq-gallery" qq-drop-area-text="Загрузить новые фото">
            <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
            </div>
            <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
                <span class="qq-upload-drop-area-text-selector"></span>
            </div>
            <div class="qq-upload-button-selector qq-upload-button">
                <div>Загрузить</div>
            </div>
            <span class="qq-drop-processing-selector qq-drop-processing">
                <span>Processing dropped files...</span>
                <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
            </span>
            <ul class="qq-upload-list-selector qq-upload-list" role="region" aria-live="polite" aria-relevant="additions removals">
                <li>
                    <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
                    <div class="qq-progress-bar-container-selector qq-progress-bar-container">
                        <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>
                    </div>
                    <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                    <div class="qq-thumbnail-wrapper">
                        <img class="qq-thumbnail-selector" qq-max-size="120" qq-server-scale>
                    </div>
                    <button type="button" class="qq-upload-cancel-selector qq-upload-cancel">X</button>
                    <button type="button" class="qq-upload-retry-selector qq-upload-retry">
                        <span class="qq-btn qq-retry-icon" aria-label="Retry"></span>
                        Retry
                    </button>

                    <div class="qq-file-info">
                        <div class="qq-file-name">
                            <span class="qq-upload-file-selector qq-upload-file"></span>
                            <span class="qq-edit-filename-icon-selector qq-btn qq-edit-filename-icon" aria-label="Edit filename"></span>
                        </div>
                        <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
                        <span class="qq-upload-size-selector qq-upload-size"></span>
                        <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">
                            <span class="qq-btn qq-delete-icon" aria-label="Delete"></span>
                        </button>
                        <button type="button" class="qq-btn qq-upload-pause-selector qq-upload-pause">
                            <span class="qq-btn qq-pause-icon" aria-label="Pause"></span>
                        </button>
                        <button type="button" class="qq-btn qq-upload-continue-selector qq-upload-continue">
                            <span class="qq-btn qq-continue-icon" aria-label="Continue"></span>
                        </button>
                    </div>
                </li>
            </ul>

            <dialog class="qq-alert-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">Close</button>
                </div>
            </dialog>

            <dialog class="qq-confirm-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">No</button>
                    <button type="button" class="qq-ok-button-selector">Yes</button>
                </div>
            </dialog>

            <dialog class="qq-prompt-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <input type="text">
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">Cancel</button>
                    <button type="button" class="qq-ok-button-selector">Ok</button>
                </div>
            </dialog>
        </div>
    </script>
@endpush
<input type="hidden" name="path_temp" value="{{ $path_temp }}" />
<div class="box-body pad">
    {!! isset($label) ? '<label>'.$label.'</label>' : '' !!}
    <div id="uploader"></div>
    <script>
        // Some options to pass to the uploader are discussed on the next page
        var uploader = new qq.FineUploader({
            element: document.getElementById("uploader"),
            debug: true,
            request: {
                    endpoint: "{{ route('admin.image.upload') }}",
                    params: {
                        '_token': '{{ csrf_token() }}',
                        'path': '{{ $path_temp }}'
                    }
                },
            validation: {
                allowedExtensions: ['jpeg', 'jpg', 'gif', 'png']
            },
            deleteFile: {
                enabled: true,
                forceConfirm: false,
                endpoint: "/admin/image/remove",
                params: {
                        '_token': '{{ csrf_token() }}'
                    }
            },
            resume: {
                enabled: true
            },
            retry: {
                enableAuto: true,
                showButton: true
            }
        })
    </script>
</div>

@if($images)
<div class="box-body">
    <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Фото</th>
                <th>Комментарий</th>
                <th>Сортировка</th>
                <th class="text-center">Активно</th>
                <th class="text-center">Удалить</th>
            </tr>
            </thead>
            <tbody>
                @foreach($images as $image)
		<tr>
                    <td><img src="/{{ $image->image }}" width="50" height="50" /></td>
                    <td><input name="image_comment[{{ $image->id }}]" type="text" value="{{ $image->comment }}" style="width: 100%"></td>
                    <td><input name="image_sort[{{ $image->id }}]" type="text" value="{{ $image->sort }}" style="width: 50px"></td>
                    <td class="text-center">
                        <input name="image_active[{{ $image->id }}]" type="checkbox" value="1" @if($image->active) checked @endif />
                    </td>
                    <td class="text-center">
                        <input name="image_delete[{{ $image->id }}]" type="checkbox" value="1" />
                    </td>
		</tr>
                @endforeach
            </tbody>
    </table>
</div>
@endif