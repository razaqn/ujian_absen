@extends('layouts.app')

@section('title')
    Manage Absensi
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
                <div class="card-header">Absensi
                    <a href="{{ route('backend.create.absensi') }}" class="btn btn-sm btn-success">
                        Create
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <th>No</th>
                                <th>Mata pelajaran</th>
                                <th>Hari/Tgl</th>
                                <th>Waktu</th>
                                <th>Action</th>
                            </thead>
                            @foreach ($absensi as $key => $value)
                            <tbody>
                                    <th>{{ ++$key }}</th>
                                    <td>{{ $value->name }}</td>
                                    <td>
                                        {{ date('l, d F Y', strtotime($value->tanggal)) }}
                                    </td>
                                    <td>{{ date('H:i:s', strtotime($value->tanggal)) }}</td>
                                    <td>
                                        <a href="{{ route('backend.edit.absensi', $value->id) }}" class="btn btn-sm btn-success"><i class="fas fa-pencil-alt pe-1"></i> Edit</a>
                                        <form action="{{ route('backend.delete.absensi', $value->id) }}" method="post" class="d-inline">
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
