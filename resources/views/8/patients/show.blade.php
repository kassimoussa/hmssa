@extends('8.layout', ['page' => "Gestion de patients", 'pageSlug' => 'patients'])
@section('content')
<div class="containe">
   {{--  <div class="d-flex justify-content-between ">
        <h3 class="over-title ">Fiche Patient </h3> 
    </div> --}}

    <livewire:toggle-patient :patient_id="$patient_id" />

</div> 

@endsection