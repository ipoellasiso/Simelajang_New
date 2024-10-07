@extends('Template.Layout')
@section('content')

<div class="card">
    <div class="card-body">
        <div class="d-flex flex-row">
            <h4 class="card-title">{{ $title }}</h4>
        </div>
        <div class="m-t-25">

        <form method="POST">
        @csrf
            <div class="card">
            <div class="card-body flex flex-col p-6">
                <div class="card-text h-full space-y-4">
                        <div class="input-area">
                            <label for="url" class="form-label">Isi Data Json </label>
                            <!-- <textarea name="textarea" rows="5" cols="40">Write something here</textarea> -->
                            <textarea id="jsontextarea" name="" type="text" class="form-control" rows="21"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="saveBtn" value="create" class="btn btn-secondary">
                                <i class="fa fa-save"></i>  Simpan
                            </button>

                        </div>
                </div>
            </div>
            </div>
        </form>

        </div>
    </div>
</div>

@endsection