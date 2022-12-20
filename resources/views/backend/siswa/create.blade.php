@extends('layouts.app')

@section('title')
    Siswa | Create
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Siswa | Create') }}</div>
                <div class="card-body">
                    <form id="contactForm" action="{{ route('backend.create.process.siswa') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">

                                <div class="mb-3">
                                    <div class="mb-2 @error('name') text-danger fw-bold @enderror">Name:</div>
                                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Name" 
                                    class="form-control @error('name') text-danger is-invalid @enderror">
                                    @error('name')
                                        <small class="text-danger">{!! $message !!}</small>
                                    @enderror
                                </div>

                                <button class="btn btn-dark">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection