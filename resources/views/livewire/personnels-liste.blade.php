<div class="">
    <div class="card my-3 position-relative" style="width: 100%; ">

        <div class="card-header d-flex justify-content-between">
            <h3>Liste du personnel </h3>
            <a class="btn btn-primary bg-cp btn-square border-0 fw-bold" data-bs-toggle="modal" data-bs-target="#newpersonnel" ><i class="fa-solid fa-user-plus"></i> Ajouter</a>
        </div>

        <livewire:personnels-ajout />

        <div class="card-body">
            <table class="table table-bordered border-dark table-striped table-hover table-sm align-middle liste" id="">
                <thead class="bg-dark text-white text-center">
                    <th scope="col">#</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Matricule</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Fonction</th>
                    <th scope="col">Departement</th>
                    <th scope="col">Action</th>
                </thead> 
                <tbody class="text-center"> 
                    <tr>
                        <td>TEST 1</td>
                        <td>TEST 1</td>
                        <td>TEST 1</td>
                        <td>TEST 1</td>
                        <td>TEST 1</td>
                        <td>TEST 1</td>
                        <td class="td-actions "> 
                            <a class="btn  ">
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </a>
                            <a class="btn  " >
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn  " >
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr> 
                    <tr>
                        <td>TEST 2</td>
                        <td>TEST 2</td>
                        <td>TEST 2</td>
                        <td>TEST 2</td>
                        <td>TEST 2</td>
                        <td>TEST 2</td>
                        <td class="td-actions "> 
                            <a class="btn  ">
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </a>
                            <a class="btn  " >
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn  " >
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr> 
                </tbody>
            </table>
        </div>
    </div>
    
</div>