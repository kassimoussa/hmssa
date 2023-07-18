@php
use Carbon\Carbon;
@endphp

<div class="py-3 ">

    <x-loading-indicator />

    <div class="modal fade" id="newvisite" tabindex="-1" aria-hidden="true" wire:ignore.self>

        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content ">
                <form wire:submit.prevent="store">

                    <div class="modal-header bg-dark text-white d-flex ">
                        <div class="col-6 text-end">
                            <h3 class="fw-bold">Ajout une visite</h3>
                        </div>

                        <div class="col-6 text-end pe-3">
                            <div class="row">
                                <div class="">
                                    <button type="submit" name="submit"
                                        class="btn btn-success square border-0  fw-bold">Enregistrer</button>
                                    <button type="button" wire:click="close_modal"
                                        class="btn btn-danger square fw-bold">Annuler</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-body px-3  ">
                        <div class=" " style="height: 300px">

                            <div class="col  position-relative" x-data="{ isOpen: true, search: '' }"
                                @click.away="isOpen = false">
                                <div class=" input-group ">
                                    <span class="input-group-text txt fw-bold bg-primary text-white">
                                        <i class="fas fa-search"></i>
                                    </span>
                                    <input class="form-control input-group-text" type="search" placeholder="Recherche"
                                        aria-label="Search" wire:model="search" x-ref="search" x-model="search"
                                        @keydown.window="
                                            if (event.keyCode === 191) {
                                                event.preventDefault();
                                                $refs.search.focus();
                                            }
                                        " 
                                        @keydown="isOpen = true" @keydown.escape.window="isOpen = false"
                                        @keydown.shift.tab="isOpen = false" @focus="isOpen = true" >
                                    <span class="input-group-text txt fw-bold bg-primary text-white">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>

                                @if (strlen($search) >= 2)
                                <div class="z-index-1 position-absolute top-1 start-1 mt-2 w-100 rounded "
                                    x-show.transition.opacity="isOpen">
                                    @if ($patients->isNotEmpty())
                                    @foreach ($patients as $patient)
                                    <a wire:click="loadpid('{{ $patient->id }}')"
                                        x-on:click="search ='{{ $patient->nom }}'" @click="isOpen=false" role="button">
                                        <div
                                            class="bg-white text-dark d-flex justify-content-start  py-1 border-bottom border-2 ">
                                            <div class="mx-3 py-1 fs-6">
                                                M: {{ $patient->matricule }} | N: {{ $patient->nom }}
                                            </div>
                                        </div>
                                    </a>
                                    @endforeach
                                    @else
                                    <div class="bg-white text-dark p-2 ">
                                        Aucun patient trouvé pour "{{ $search }}" !!  
                                        <a class="fw-bolder" data-bs-toggle="modal"
                                        data-bs-target="#newpatient" title="Ajouter un patient" role="button"  data-bs-dismiss="modal">  Ajouter un nouveau patient </a>
                                    </div>
                                    @endif


                                </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:load', function() {

            /* initialize the external events
                -----------------------------------------------------------------*/

            window.mobilecheck = function() {
                var check = false;
                (function(a) {
                    if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i
                        .test(a) ||
                        /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i
                        .test(a.substr(0, 4))) check = true;
                })(navigator.userAgent || navigator.vendor || window.opera);
                return check;
            };

            /*  var containerEl = document.getElementById('external-events-list');
            new FullCalendar.Draggable(containerEl, {
                itemSelector: '.fc-event',
                eventData: function(eventEl) {
                    return {
                        title: eventEl.innerText.trim()
                    }
                }
            }); */


            var initialLocaleCode = 'fr';
            var localeSelectorEl = document.getElementById('locale-selector');
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                windowResize: function(arg) {
                    if ($(window).width() < 514) {
                        initialView: 'listMonth';
                    }
                    else {
                        $('#calendar').fullCalendar('changeView', 'month');
                    }
                },
                headerToolbar: {
                    left: window.mobilecheck() ? 'prev,next' : 'prev,next today',
                    center: 'title',
                    right: window.mobilecheck() ? 'listMonth' :
                        'dayGridMonth,timeGridWeek,timeGridDay,listMonth',
                },
                firstDay: 0,
                height: 1000,
                contentHeight: 600,
                locale: initialLocaleCode,
                navLinks: true, // can click day/week names to navigate views
                initialView:  window.mobilecheck() ? "listMonth" : "dayGridMonth",
                nowIndicator: true,
                weekNumbers: true,
                editable: false,
                eventLimit: 6,
                dayMaxEvents: false,
                /* events: JSON.parse(@this.events), */ // allow "more" link when too many events 
                
                selectable: false,
                select: function(arg) {
                    var start_day = calendar.formatDate(arg.start, {
                        day: 'numeric'
                    });
                    var start_month = calendar.formatDate(arg.start, {
                        month: 'numeric'
                    });
                    var start_year = calendar.formatDate(arg.start, {
                        year: 'numeric'
                    });
                    var start = start_year + "-" + start_month + "-" + start_day;

                    var end_day = calendar.formatDate(arg.end, {
                        day: 'numeric'
                    });
                    var end_month = calendar.formatDate(arg.end, {
                        month: 'numeric'
                    });
                    var end_year = calendar.formatDate(arg.end, {
                        year: 'numeric'
                    });
                    var end = end_year + "-" + end_month + "-" + end_day;
                    var allDay = arg.allDay;
                    // @this.createEvent(start, end);

                    /* document.getElementById('start').value = start;
                    document.getElementById('end').value = end; */

                    const title = prompt('Titre :');
                    if (title) {
                        @this.eventAddd(title, start, end);
                        console.log(title);
                    };


                },
                droppable: false,
                eventDrop: info => @this.eventChange(info.event),
                eventResize: info => @this.eventChange(info.event),
                eventReceive: info => {
                    var start_day = calendar.formatDate(info.event._instance.range.start, {
                        day: 'numeric'
                    });
                    var start_month = calendar.formatDate(info.event._instance.range.start, {
                        month: 'numeric'
                    });
                    var start_year = calendar.formatDate(info.event._instance.range.start, {
                        year: 'numeric'
                    });
                    var start = start_year + "-" + start_month + "-" + start_day;

                    var end_day = calendar.formatDate(info.event._instance.range.start, {
                        day: 'numeric'
                    });
                    var end_month = calendar.formatDate(info.event._instance.range.start, {
                        month: 'numeric'
                    });
                    var end_year = calendar.formatDate(info.event._instance.range.start, {
                        year: 'numeric'
                    });
                    var end = end_year + "-" + end_month + "-" + end_day;
                    const id = create_UUID();
                    const data = {
                        "id": id,
                        "title": info.event.title,
                        "start": start,
                        "end": end,

                    };
                    // info.event.setProp('id', id);
                    @this.eventAdd(data);
                    console.log(data);
                    // displayMessage("Ajout réussi");

                },
                loading: function(isLoading) {
                    if (!isLoading) {
                        // Reset custom events
                        this.getEvents().forEach(function(e) {
                            if (e.source === null) {
                                e.remove();
                            }
                        });
                    }
                },
                eventClick: function(info) {
                    var pid = info.event._def.extendedProps.patient_id;
                    var vid = info.event.id;
                    var status = info.event._def.extendedProps.status;

                    @this.loadids(pid, vid, status);
                    //$("#eventAction").modal("show");


                    /* console.log( "eid: " + eid  );
                    console.log( "vid: " + vid );
                    console.log( "pid: " + pid ); */
                    //window.location.href = '/patients/show/' + pid;
                },
            });


            calendar.addEventSource({
                url: 'visites/events', 
            });

            calendar.render();
            @this.on(`refreshCalendar`, () => {
                calendar.refetchEvents()
            });

            function refreshcal() {
                calendar.refetchEvents()
            }

             // Call the function every 5 seconds
            setInterval(refreshcal, 5000);

         
           /*  Echo.channel('public.refetch.1')
            .listen('refetch', (event) => {
                console.log(event);
            //calendar.refetchEvents();
            });
             */

        });
 

    </script>

    <div wire:ignore.self id="eventAction" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Action</h4>
                    <button type="button" wire:click="close_modal" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>

                </div>
                <div id="modalBody" class="modal-body">
                    <div class=" row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4 py-1 d-flex justify-content-center">


                        <button wire:ignore wire:click="show_patient" class="btn btn-primary mx-2">
                            Voir le profil patient
                        </button>

                        @if ($status == "OUI")
                        <button wire:click="show_consultation" class="btn btn-primary mx-2 bg-cp">
                            Voir la Consultation
                        </button>
                        @endif

                        {{-- @if ($status == "NON")
                        <button wire:ignore wire:click="delete" class="btn btn-outline-danger mx-2">
                            Supprimer la visite
                        </button>
                        @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="newpatient" tabindex="-1" aria-hidden="true" wire:ignore.self>

        <div class="modal-dialog modal-fullscreen " role="document">
            <div class="modal-content ">
                <form wire:submit.prevent="storePatient">

                    <div class="modal-header bg-dark text-white d-flex ">
                        <div class="col-6 text-end">
                            <h3 class="fw-bold">Ajout de nouveau patient</h3>
                        </div>

                        <div class="col-6 text-end pe-3">
                            <div class="row">
                                <div class="">
                                    <button type="submit" name="submit"
                                        class="btn btn-success square border-0  fw-bold">Enregistrer</button>
                                    <button type="reset" wire.click="close_modal" class="btn btn-danger square fw-bold"
                                        data-bs-dismiss="modal">Annuler</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-body px-3  " >
                        <div class="row ">

                            <div class="mt-3 col-6">
                                <label for="nom_patient" class="form-label text-muted fw-italic mb-0">Nom *</label>
                                <div class="input-group">
                                    <span class="input-group-text txt fw-bold  text-white">
                                        <i class="fas fa-user icnbgc"></i>
                                    </span>
                                    <input type="text" class="form-control" id="nom_patient" wire:model.defer="nom_patient"
                                        placeholder="Nom du patient " required>
                                </div>
                                <span class="text-danger">
                                    @error('nom_patient')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mt-3 col-6 ">
                                <label for="matricule" class="form-label text-muted fw-italic mb-0">Matricule
                                    *</label>
                                <div class="input-group">
                                    <span class="input-group-text txt fw-bold  text-white">
                                        <i class="fa-solid fa-minus icnbgc"></i>
                                    </span>
                                    <input type="text" class="form-control" id="matricule" wire:model.defer="matricule"
                                        placeholder="ex: 25/5d54" required>
                                </div>
                                <span class="text-danger">
                                    @error('matricule')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>


                            <div class="mt-3 col-6 ">
                                <label for="sexe" class="form-label text-muted fw-italic mb-0">Sexe *</label>
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold  text-white">
                                        <i class="fas fa-venus-mars icnbgc"></i>
                                    </span>
                                    <select wire:model.defer="sexe" class="form-select" id="sexe">
                                        <option value="" selected>Select</option>
                                        <option value="Homme">Homme</option>
                                        <option value="Femme">Femme</option>
                                    </select>
                                </div>
                                <span class="text-danger">
                                    @error('sexe')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>


                            <div class="mt-3 col-6 ">
                                <label for="gp_sanguin" class="form-label text-muted fw-italic mb-0">Groupe sanguin *</label>
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold  text-white">
                                        <i class="fas fa-venus-mars icnbgc"></i>
                                    </span>
                                    <select wire:model.defer="gp_sanguin" class="form-select" id="gp_sanguin">
                                        <option value="" selected>Select</option>
                                        <option value="A-">A-</option>
                                        <option value="A+">A+</option>
                                        <option value="B-">B-</option>
                                        <option value="B+">B+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="O-">O-</option>
                                        <option value="O+">O+</option>
                                    </select>
                                </div>
                                <span class="text-danger">
                                    @error('gp_sanguin')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mt-3 col-6 ">
                                <label for="date_naissance" class="form-label text-muted fw-italic mb-0">Date de
                                    naissance
                                    *</label>
                                <div class="input-group">
                                    <span class="input-group-text txt fw-bold  text-white">
                                        <i class="fa-solid fa-calendar-days icnbgc"></i>
                                    </span>
                                    <input type="date" class="form-control " id="date_naissance"
                                        wire:model.defer="date_naissance" required>
                                </div>
                                <span class="text-danger">
                                    @error('date_naissance')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mt-3 col-6 ">
                                <label for="lieu_naissance" class="form-label text-muted fw-italic mb-0">Lieu de
                                    naissance *</label>
                                <div class="input-group">
                                    <span class="input-group-text txt fw-bold  text-white">
                                        <i class="fa-solid fa-city icnbgc"></i>
                                    </span>
                                    <input type="text" class="form-control" id="lieu_naissance"
                                        wire:model.defer="lieu_naissance" placeholder="Lieu de naissance du patient"
                                        required>
                                </div>
                                <span class="text-danger">
                                    @error('lieu_naissance')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mt-3 col-6 ">
                                <label for="telephone" class="form-label text-muted fw-italic mb-0">Telephone
                                    *</label>
                                <div class="input-group">
                                    <span class="input-group-text txt fw-bold  text-white">
                                        <i class="fa-solid fa-phone icnbgc"></i>
                                    </span>
                                    <input type="text" class="form-control" id="telephone" wire:model.defer="telephone"
                                        placeholder="ex: 77123456 " required>
                                </div>
                                <span class="text-danger">
                                    @error('telephone')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mt-3 col-6 ">
                                <label for="affiliation" class="form-label text-muted fw-italic mb-0">Affiliation
                                    *</label>
                                <div class="input-group">
                                    <span class="input-group-text txt fw-bold  text-white">
                                        <i class="fa-solid fa-link icnbgc"></i>
                                    </span>
                                    <select wire:model.defer="affiliation" class="form-select" id="affiliation">
                                        <option value="" selected>Select</option>
                                        <option value="militaire">Militaire</option>
                                        <option value="Conjoint(e) du militaire">Conjoint(e) du militaire</option>
                                        <option value="Enfant du militaire">Enfant du militaire</option>
                                    </select>
                                </div>
                                <span class="text-danger">
                                    @error('affiliation')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mt-3 col-12  ">
                                <label for="adresse" class="form-label text-muted fw-italic mb-0">Adresse *</label>
                                <div class="input-group">
                                    <span class="input-group-text txt fw-bold  text-white">
                                        <i class="fa-solid fa-location-dot icnbgc"></i>
                                    </span>
                                    <textarea class="form-control" id="adresse" wire:model.defer="adresse" cols="5"
                                        rows="3"></textarea>
                                </div>
                                <span class="text-danger">
                                    @error('adresse')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>


                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>