<div wire:poll>

    <form wire:submit.prevent="store"> 
        <div class="">
            <textarea class="form-control " wire:model="observations" id="" cols="30"
                rows="5" @unless ($level == 1) disabled @endunless > </textarea>

            @unless($level != 1)  
                <div class=" form-group d-flex justify-content-center mt-3">
                    <button type="submit" name="submit"
                        class="btn btn-primary fw-bold mx-2 ">Enregistrer</button>
                    <button type="reset"
                        class="btn btn-outline-danger fw-bold mx-2 ">Annuler</button>
                </div>
            @endunless 
        </div>
    </form>
</div>
