@extends('layout')

@section('content')

    <h2>Website: {{ $website->name }}</h2>
    <hr>

    <div class="row">
        <div class="col-6">
            <table class="table table-bordered">
                <tr>
                    <td>Browser</td>
                    <td>Visits</td>
                </tr>
                @foreach ($data_1 as $row)
                <tr>
                    <td>{{ $row->browser }}</td>
                    <td>{{ $row->visits }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="col-6">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>OS</td>
                        <td>Visits</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_2 as $row)
                        <tr>
                            <td>{{ $row->os }}</td>
                            <td>{{ $row->visits }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection