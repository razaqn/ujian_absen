@extends('layouts.app')

@section('title')
    mapel | Show #ID {{ $mapel->id }}
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
@endsection

@section('javascript')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script>
        $(function(){
            $('[data-fancybox]').fancybox();
        });
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">mapel | Show #ID {{ $mapel->id }}</div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $mapel->id }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $mapel->name }}</td>
                                </tr>
                               
                                <tr>
                                    <th>Slug</th>
                                    <td>{{ $mapel->slug }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
