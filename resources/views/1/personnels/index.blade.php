@extends('1.layout', ['page' => 'Gestion du Personnel', 'pageSlug' => 'personnel'])
@section('content')
<div class="containe">
    <div class="d-flex justify-content-between ">
        <h3 class="over-title ">Gestion du personnels</h3> 
    </div>

    <livewire:gestion-personnel />

</div> 

@endsection