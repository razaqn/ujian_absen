@extends('layouts.app')

@section('title')
    Edit Absensi
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
                                        <td>#{{ $value->id }}. {{ $value->name }}</td>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" name="hadir[]" value="{{ $value->id }}" class="form-check-input">
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
