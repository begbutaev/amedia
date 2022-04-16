@extends('layouts.master')

@section('content')


<div class="col-md-12">
        <h1>Форма заявки</h1>
    <form method="POST" enctype="multipart/form-data"
          action="{{ route('store') }}">
        <div>
            @csrf
            <br>
            <div class="input-group row">
                <label for="subject" class="col-sm-4 col-form-label">Тема: </label>
                <div class="col-sm-6">
                    @include('layouts.error', ['fieldName' => 'subject'])
                    <input type="text" class="form-control" name="subject" id="subject"
                           value="">
                </div>
            </div>


            <br>
            <div class="input-group row">
                <label for="message" class="col-sm-2 col-form-label">Сообщение: </label>
                <div class="col-sm-6">
                    @include('layouts.error', ['fieldName' => 'message'])
                    <textarea name="message" id="message" cols="72"
                              rows="7"></textarea>
                </div>
            </div>

            <br>
            <div class="input-group row">
                <label for="file" class="col-sm-2 col-form-label">Файл: </label>
                <div class="col-sm-10">
                    @include('layouts.error', ['fieldName' => 'file'])
                    <label class="btn btn-default btn-file">
                        Загрузить <input type="file" style="display: none;" name="file" id="file">
                    </label>
                </div>
            </div>
            <br>

            <button class="btn btn-success">Отправить</button>
        </div>
    </form>
</div>
@endsection
