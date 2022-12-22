@extends('layouts.app')

@section('title')
    Edit Absensi
@endsection

@section('javascript')
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
        $('table').DataTable({
            "pageLength" : 50
        });

        $('select').select2();
    });
</script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">

<style>
    .select2-container .select2-selection--single { height: 37px; font-size: .875rem; }
    .select2-container--default .select2-selection--single .select2-selection__rendered { line-height: 37px; }
    .select2-container--default .select2-selection--single .select2-selection__arrow { height: 37px; }
    .select2-container--default .select2-selection--single { border-radius: 0.375rem; border: 1px solid #ced4da; }
    .select2-container--default .select2-results__option--selected { font-size: .875rem; }
    .select2-results__option--selectable { font-size: .875rem; }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Absensi</div>
                <div class="card-body">
                    <form action="{{ route('backend.create.process.absensi') }}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                        <h5 class="">Mata Pelajaran :</h5>
                                    </div>
                                    <div class="col-9">
                                        <select name="mapel" class="form-control">
                                            @foreach ($mapel as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <div class="row">
                                    <h5 class="col-3">Hari/Tgl : </h5>
                                    <h5 class="col-9">{{ date('l, d F Y') }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                        <h5>Jam :</h5>
                                    </div>
                                    <div class="col-9">
                                        <h5><input type="datetime" name="tanggal" value="{{date('H:i:s')}}" class="form-control"></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Hadir</th>
                                    <th>Jam</th>
                                </thead>
                                <tbody>
                                @foreach ($siswa as $key => $value)
                                <tr>
                                    <input type="hidden" name="siswa_id[]" value="{{ $value->id }}">
                                    <th>{{ ++$key }}</th>
                                    <td>{{ $value->name }}</td>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" name="hadir[]" value="{{ $value->id }}" class="form-check-input">
                                        </div>
                                    </td>
                                    <td>
                                        <input type="time" name="time[]" >
                                    </td>
                                </tr>
                                    @endforeach
                                </tbody>
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
