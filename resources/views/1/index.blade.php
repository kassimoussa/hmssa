@extends('1.layout', ['page' => 'Accueil', 'pageSlug' => 'index'])

@section('content')
<div class="container">

    <div class="row row-cols-2 row-cols-md-3 g-4 py-2 d-flex justify-content-center">
        <x-card-icon icon="fa-calendar-days" title="Visites " url="/visites" text="Voir les visites" /> 
        <x-card-icon icon="fa-users" title="Personnels " url="/personnel" text="Voir la liste de personnels" /> 
        <x-card-icon icon="fa-hospital-user" title="Patients " url="/patients" text="Voir la liste de patients" /> 
        <x-card-icon icon="fa-prescription-bottle-medical" title="Pharmacie " url="/pharmacie" text="Voir la pharmacie " /> 
        <x-card-icon icon="fa-flask" title="Laboratoire " url="/laboratoire" text="Voir le laboratoire" /> 
        <x-card-icon icon="fa-x-ray" title="Radiologie " url="/radiologie" text="Voir le radiologie" /> 
        <x-card-icon icon="fa-cogs" title="Administration " url="/administration" text="Administration de l'application" /> 
    </div>
</div> 

@endsection