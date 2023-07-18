@extends('5.layout', ['page' => 'Accueil', 'pageSlug' => 'index'])

@section('content')
<div class="container">

    <div class="row row-cols-2 row-cols-md-3 g-4 py-2 d-flex justify-content-center">
        <x-card-icon icon="fa-flask" title="Laboratoire " url="/laboratoire" text="Voir le laboratoire" /> 
        <x-card-icon icon="fa-hospital-user" title="Patients " url="/patients" text="Voir la liste de patients" /> 
    </div>
</div> 

@endsection