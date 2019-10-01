@extends('layouts.app')

@section('content')
<h1>Créer un nouveau client</h1>
<form action="/clients" method="POST">
@include('includes.form')

    <button type="submit" class="btn btn-primary">Ajouter le client</button>
</form>
@endsection