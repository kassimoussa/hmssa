@extends('5.layout', ['page' => "Gestion de patients", 'pageSlug' => 'patients'])
@section('content')
<div class="containe">
    <div class="d-flex justify-content-between ">
        <h3 class="over-title ">Gestion de patients</h3> 
    </div>

    <livewire:gestion-patient />

</div> 

@endsection