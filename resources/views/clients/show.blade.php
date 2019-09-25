@extends('layout')

@section('content')
<h1>{{ $client->name }}</h1>
<a href="/clients/{{ $client->id }}/edit" class="btn btn-secondary my-3">Editer</a>
<hr>
<p><strong>Email :</strong> {{ $client->email }}</p>
<p><strong>Entreprise :</strong> {{ $client->entreprise->name }}</p>

@endsection