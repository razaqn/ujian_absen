@extends('layouts.app')

@section('title')
    Mata Pelajaran
@endsection

@section('javascript')
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('table').DataTable({
                "pageLength" : 10
            });
        });
    </script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Mapels') }}
                    <a href="{{ route('backend.create.mapel') }}" class=" btn btn-sm btn-dark">Create</a>
                </div>
                <div class="card-body">
                    @if (Session::has('error'))
                        <div class="alert alert-success">
                            {!! Session::get('error') !!}
                        </div>
                    @endif

                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {!! Session::get('success') !!}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <th>No</th>
                                <th>name</th>
                                <th>slug</th>
                                <th>Action</th>
                            </thead>
                            {{-- @foreach ($categories as $key => $value) --}}
                            @foreach ($mapel as $mapel)
                                <tbody>
                                    <td>{{ $mapel->id}}</td>
                                    <td>{{ $mapel->name}}</td>
                                    <td>{{ $mapel->slug}}</td>
                                    <td>
                                        <a href="{{ route('backend.show.mapel', $mapel->id)  }}" class="btn btn-sm btn-primary"><i class="fas fa-search pe-1"></i> Show</a>
                                        <a href="{{ route('backend.mapel.edit', $mapel->id) }}" class="btn btn-sm btn-success"><i class="fas fa-pencil-alt pe-1"></i> Edit</a>
                                        <form method="post" class="d-inline" action="{{ route('backend.mapel.destroy', $mapel->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash-alt pe-1"> Destroy</i>
                                            </button>
                                        </form>
                                    </td>
                                </tbody>
                            @endforeach
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
