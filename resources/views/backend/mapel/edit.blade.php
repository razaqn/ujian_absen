@extends('layouts.app')
@section('title')
    Mapel | Edit ID {{ $mapel->id }}
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
@endsection
@section('javascript')
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(function(){
            $('input[name="name"]').on('keyup', function(){
                let Text = $(this).val();

                Text = Text.toLowerCase();
                Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');

                $('input[name="slug"]').val(Text);
            })
        })
    </script>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">mapel | Edit #ID {{ $mapel->id }}</div>
                    <div class="card-body">
                        <form action="{{ route('backend.edit.process.mapel', $mapel->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12  col-md-12 mb-3">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">
                                            Name <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Name" class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                            <small class="text-danger">{!! $message !!}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="slug" class="form-label">
                                            Slug <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="slug" value="{{ old('slug') }}" placeholder="Slug" class="form-control @error('slug') is-invalid @enderror">
                                        @error('slug')
                                            <small class="text-danger">{!! $message !!}</small>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary btn-xl" id="submitButton" type="submit">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
