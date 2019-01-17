@extends('layout')

@section('content')

    <h2>Websites list</h2>

    <table class="table table-hover table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        @forelse($websites as $website)
        <tr>
            <td>{{ $website->id }}</td>
            <td>{{ $website->name }}</td>
            <td><a href="/analytics/website/{{ $website->id }}">Report</a></td>
        </tr>
        @empty
            <tr>
                <td colspan="3">No data to display</td>
            </tr>
        @endforelse
    </table>

@endsection