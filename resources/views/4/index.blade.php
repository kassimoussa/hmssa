@extends('4.layout', ['page' => 'Accueil', 'pageSlug' => 'index'])

@section('content')
<div class="container">

    <div class="row row-cols-2 row-cols-md-3 g-4 py-2 d-flex justify-content-center">
        <x-card-icon icon="fa-hospital-user" title="Patients " url="/patients" text="Voir la liste de patients" /> 
        <x-card-icon icon="fa-prescription-bottle-medical" title="Pharmacie " url="/pharmacie" text="Voir la pharmacie " /> 
    </div>
</div> 

@endsection