@extends('layout')

@section('content')
<h1>Clients</h1>
<ul>
    <table class="table my-3">
        <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nom</th>
                <th scope="col">Status</th>
                <th scope="col">Entreprise</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr>
                <th scope="row">{{ $client->id }}</th>
                <td><a href="/clients/{{ $client->id }}">{{ $client->name }}</a> </td>
                <td>{{ $client->status }}</td>
                <td>{{ $client->entreprise->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</ul>
<a href="/clients/create" class="btn btn-primary my-3">Nouveau client</a>

@endsection
