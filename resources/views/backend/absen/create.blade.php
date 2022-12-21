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
                    <div class="row mb-3">
                        <div class="col-12">
                    <form action="{{ route('backend.create.process.absensi') }}" method="post">
                            <h5>Jadwal KBM :
                                <select name="mapel" id="">
                                    @foreach ($mapel as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </h5>
                        </div>
                        <div class="col-12">
                            <h5>Hari/Tgl : {{ date('D,d M Y') }}</h5>
                        </div>
                        <div class="col-12">
                            <h5>Jam : <input type="datetime" name="tanggal" value="{{date('Y-m-d H:i:s')}}"></h5>
                        </div>
                    </div>
                        @csrf
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
                                            <input type="checkbox" name="hadir[]" class="form-check-input">
                                        </div>
                                    </td>
                                    <td>
                                        <input type="time" name="time[]" >
                                        {{-- value="{{ $jam[3] }}" --}}
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
