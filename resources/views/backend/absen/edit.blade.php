@extends('layouts.app')

@section('title')
    Edit Absensi
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
                <div class="card-header">Absensi</div>
                <div class="card-body">
                    <form action="{{ route('backend.edit.process.absensi', $absensi->id) }}" method="post">
                        @csrf
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Hadir</th>
                                    <th>Jam</th>
                                </thead>
                                @foreach ($siswa as $key => $value)
                                <tbody>
                                    <input type="hidden" name="siswa_id[]" value="{{ $value->id }}">
                                    <th>{{ ++$key }}</th>
                                    <td>{{ $value->name }}</td>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" name="hadir[]" value="{{ $value->id }}" @if(in_array($value->id, $daftar_absen)) ? checked :  @endif class="form-check-input">
                                        </div>
                                    </td>
                                    <td>
                                        <input type="time" name="time[]">
                                    </td>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
