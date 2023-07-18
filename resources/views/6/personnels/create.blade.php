@extends('6.layout', ['page' => 'Personnels', 'pageSlug' => 'personnel'])
@section('content')
<div class="containe">
    <div class="d-flex justify-content-between mb-3">
        <h3 class="over-title ">Gestion du personnels</h3> 
    </div>

    <livewire:personnels-ajout />

</div> 

@endsection