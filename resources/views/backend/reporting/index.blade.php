@extends('layouts.app')

@section('title')
    Reporting Siswa
@endsection

@section('javascript')
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('table').DataTable({
                "pageLength" : 50
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
                <div class="card-header">Siswa
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Action</th>
                            </thead>
                            @foreach ($siswa as $key => $value)
                            <tbody>
                                    <th>{{ ++$key }}</th>
                                    <td>{{ $value->name }}</td>
                                    <td>
                                        <a href="{{ route('backend.filter.reporting', $value->id) }}" class="btn btn-sm btn-primary">Filter</a>
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