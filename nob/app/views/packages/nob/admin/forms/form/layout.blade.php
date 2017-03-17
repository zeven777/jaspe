        {{
            NobForm::open([
                'model'  => $model,
                'store'  => 'admin.form.store',
                'update' => 'admin.form.update',
                'class'  => 'form',
                'id'     => 'fileupload',
                'files'  => true,
            ])
        }}

            @include('admin::forms.form.image-preview')

            @include('admin::forms.form.language-tabs')

            @include('admin::forms.form.relation')

            @include('admin::forms.form.fields')

            @include('admin::forms.form.filemanager')

            @include('admin::forms.form.pre-info')

            @include('admin::forms.form.artisan')

            <div class="text-right">

                <button type="button" class="btn btn-success" data-role="confirm" data-action="submit" data-form="#fileupload">

                    <i class="fa fa-save"></i>&nbsp; {{ trans("admin::admin.button.save") }}

                </button>

            </div>

        {{ NobForm::close() }}