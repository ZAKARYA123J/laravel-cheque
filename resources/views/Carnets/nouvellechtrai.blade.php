@extends('app')

@section('title', 'Carnets')


@section('content')


    <style>
        .create-movie {
            display: block;
            width: 96%;
            margin: 0 1rem;
            gap: 1.8rem;
            position: relative;
        }

        .create-movie .importdata {
            margin-top: 2rem;
            display: grid;
        }

        .create-movie .top {
            margin-top: 2rem;
            width: 100%;
            display: grid;
            justify-content: space-around;
        }


        .create-movie .importdata .top a {
            color: var(--color-primary);

        }


        .create-movie .importdata .top .fetch {
            margin-top: 1rem;
            margin-bottom: 1rem;
            display: flex;
            justify-content: space-evenly;
            align-items: center;

        }

        .create-movie .top .fetch input {
            margin-top: 1rem;
            margin-bottom: 1rem;
            height: 35px;
            border: 1px solid var(--color-primary);
            border-radius: 3px;
            width: 100%;
            margin-right: .8rem;
            padding: 0rem .5rem;

        }

        .fetch-btn {
            height: 35px;
            border: 1px solid var(--color-primary);
            background: var(--color-primary);
            border-radius: 3px;
            width: 100%;
            color: var(--color-white);
            margin-right: .8rem;
            padding: 0rem .5rem;
            cursor: pointer;

        }

        .create-movie .importdata .top .fetch .fetch-btn {
            height: 35px;
            border: 1px solid var(--color-primary);
            background: var(--color-primary);
            border-radius: 3px;
            width: 100%;
            color: var(--color-white);
            margin-right: .8rem;
            padding: 0rem .5rem;
            cursor: pointer;

        }

        .create-movie .importdata .top .fetch button {
            background: var(--color-primary);
            color: var(--color-white);
            height: 35px;
            border-radius: 4px;
            padding: 0rem 1rem;
            border: none;
            font-weight: 600;
            cursor: pointer;

        }

        .create-movie .importdata .meddle {
            display: block;
            width: 100%;
            position: relative;
        }

        .create-movie .importdata .meddle input {
            height: 35px;
            border: 1px solid var(--color-primary);
            border-radius: 3px;
            width: 100%;
            margin-right: .8rem;
            padding: 0rem .5rem;

        }


        .addmoviebtn {

            margin-top: 2rem;
            display: flex;
            justify-content: center;
        }



        .m-title select {
            margin-top: 0.5rem;
            background: var(--color-primary);
            color: var(--color-white);
            display: flex;
            width: 100%;
            justify-content: space-between;
            align-items: center;
            border: 2px var(--color-primary) solid;
            box-shadow: 0 0 0.8em var(--color-primary);
            border-radius: 0.5rem;
            padding: .8em 0.5em;
            cursor: pointer;
            transition: var(--color-background) 0.3s;
        }


        .m-title .select-clicked {
            border: 2px var(--color-primary) solid;
            box-shadow: 0 0 0.8em var(--color-primary);
        }

        .m-title .select:hover {
            background: var(--color-primary-variant);
        }

        .m-title .select option {
            list-style: none;
            padding: 0.2em 0.5em;
            background: var(--color-primary);
            border: 2px var(--color-primary) solid;
            box-shadow: 0 0 0.8em var(--color-primary);
            border-radius: 0.5rem;
            position: absolute;
            opacity: 0;
            margin-top: .2rem;
            display: none;
            transition: 0.2s;
            z-index: 1;
        }


        .h4,
        h4 {
            font-size: 1rem;
        }

        .img-area {
            position: relative;
            width: 100%;
            height: 240px;
            background: var(--grey);
            margin-bottom: 30px;
            border-radius: 15px;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .img-area .icon {
            font-size: 100px;
        }

        .img-area h3 {
            font-size: 20px;
            font-weight: 500;
            margin-bottom: 6px;
        }

        .img-area p {
            color: #999;
        }

        .img-area p span {
            font-weight: 600;
        }

        .img-area img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            z-index: 100;
        }

        .img-area::before {
            content: attr(data-img);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, .5);
            color: #fff;
            font-weight: 500;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            pointer-events: none;
            opacity: 0;
            transition: all .3s ease;
            z-index: 200;
        }

        .img-area.active:hover::before {
            opacity: 1;
        }

        .select-image {
            display: block;
            width: 100%;
            padding: 16px 0;
            border-radius: 15px;
            background: var(--blue);
            color: #fff;
            font-weight: 500;
            font-size: 16px;
            border: none;
            cursor: pointer;
            transition: all .3s ease;
        }
    </style>
    <!-- MAIN -->
    <main>


        <div class="head-title">
            <div class="left">
                @if ($carnettype == 'Cheque')
                    <h1>Ajouter une nouvelle Cheque</h1>
                @else
                    <h1>Ajouter une nouvelle Traite</h1>
                @endif
                <h4 class="mt-3">Carnet > {{ $carnetname }}</h4>
                @if (\Session::has('success'))
                    <div class="textsuccses">
                        <h4>{{ \Session::get('success') }}</h4>
                    </div>
                @endif

            </div>



        </div>

        <div class="card create-movie mt-5 ">
            <div class="meddle">
                <div class="container-movies-2 p-4">
                    <form id="newcheque" enctype="multipart/form-data" onsubmit="saveCheaq(event)" method="POST">
                        @csrf
                        <input name="_method" type="hidden" value="POST">
                        <input name="carnet_id" type="hidden" value="{{ $carnet_id }}">
                        <input name="cheque" type="hidden" value="{{ $carnettype }}">
                        <input name="type" type="hidden" value="{{ $carnettype }}">

                        <div class="nodel-body">


                            <div class="form-group">
                                @if ($carnettype == 'Cheque')
                                    <label id="lenumberdotype" for="bdescid">Nº Cheque (Position) :</label>
                                @else
                                    <label id="lenumberdotype" for="bdescid">Nº Trait (Position) :</label>
                                @endif

                                <input type="text" name="cheque" id="cheque" value="{{ $carnetposition_actuelt }}"
                                    class="form-control">
                                    <span class="text-danger cheque_err"></span>

                            </div>
                            <div class="form-group">
                                <label for="date_emission">Date d'emission :</label>
                                <input type="date" name="date_emission" id="date_emission" class="form-control">
                                <span class="text-danger date_emission_err"></span>

                            </div>
                            <div class="form-group">
                                <label for="date_paiement">Date Paiement :</label>
                                <input type="date" name="date_paiement" id="date_paiement" class="form-control">
                                <span class="text-danger date_paiement_err"></span>

                            </div>

                            <div class="form-group">
                                <label for="benefisaire">Beneficiaires :</label>
                                <input type="text" name="benefisaire" id="benefisaire" class="form-control">
                                <span class="text-danger benefisaire_err"></span>

                            </div>

                            <div class="form-group">
                                <label for="Montant">Montant :</label>
                                <input type="text" name="Montant" id="Montant" class="form-control"
                                    placeholder="Ex:199999.99">
                                    <span class="text-danger Montant_err"></span>

                            </div>


                            @if ($carnettype == 'Cheque')
                                <div class="form-group" id="ConcerneGroup" style="display: block">
                                    <label for="bdescid">Concerne :</label>
                                    <input type="text" name="Concerne" id="bdescid" class="form-control">

                                </div>
                            @else
                                <div class="form-group" id="causeGroup" style="display: block">
                                    <label id="cause" for="cause">La Cause :</label>
                                    <input type="text" name="Concerne" id="cause" class="form-control">

                                </div>
                            @endif
                            <span class="text-danger Concerne_err"></span>




                            <div class="form-group">
                                <label for="bdescid">Ville :</label>
                                <input type="text" name="ville" id="bdescid" class="form-control">
                                <span class="text-danger ville_err"></span>

                            </div>

                            <div class="form-group">
                                <label for="bdescid">Remarques :</label>
                                <input type="text" name="Remarques" id="bdescid" class="form-control">
                            </div>




                        </div>

                        @if ($carnettype == 'Cheque')
                            <div class="model-footer">
                                <button type="submit" class="btn btn-primary" style="width: 100%;">
                                    Sortir le <span id="buttonText">Cheque</span>
                                </button>
                            </div>
                        @else
                            <div class="model-footer">
                                <button type="submit" class="btn btn-primary" style="width: 100%;">
                                    Sortir le <span id="buttonText">Trait</span>
                                </button>
                            </div>
                        @endif


                    </form>

                </div>
            </div>


        </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
        </script>



    </main>
    <!-- MAIN -->

    <script>
        function saveCarnet(e) {
            e.preventDefault();

            var contactform = $('#contact-form')[0];
            var contactformData = new FormData(contactform);

            // console.log(contactformData);

            $.ajax({
                type: "POST",
                url: "{{ route('StoreCarnets') }}",
                data: contactformData,
                processData: false,
                contentType: false,
                success: function(response) {

                    location.reload();
                },
                error: function(errr) {

                    $('.quantite_min_err').html('');
                    $('.Serie_err').html('');
                    $('.Start_Number_err').html('');
                    $('.Dernier_Number_err').html('');


                    var myeror = errr.responseJSON.errors;

                    console.log(myeror);

                    for (var er in myeror) {
                        $('.' + er + '_err').html(myeror[er][0]);
                    }

                }
            });


        }




        $(document).ready(function() {
            $('#carnettable').DataTable();
        });
    </script>



    <div class="modal fade" id="myModaladdnewcheque" tabindex="-1" role="dialog" aria-labelledby="ewcheque"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Modal content -->
                <div class="modal-header">
                    <h5 class="modal-title" id="ewcheque">Ajouter une nouvelle Cheque/Traite</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="container mr-3 mb-5 mt-5">
                    <form action="{{ route('addnewCheque.create') }}" method="POST">
                        @csrf
                        <input name="_method" type="hidden" value="POST">

                        <div class="nodel-body">



                            <div class="form-group">
                                <label id="lenumberdotype" for="bdescid">Nº Cheque (Position) :</label>

                                <input type="text" name="cheque" id="bdescid" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="date_emission">Date d'emission :</label>
                                <input type="date" name="date_emission" id="date_emission" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="date_paiement">Date Paiement :</label>
                                <input type="date" name="date_paiement" id="date_paiement" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="benefisaire">Beneficiaires :</label>
                                <input type="text" name="benefisaire" id="benefisaire" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="Montant">Montant :</label>
                                <input type="text" name="Montant" id="Montant" class="form-control"
                                    placeholder="Ex:199999.99">
                            </div>


                            <div class="form-group" id="ConcerneGroup" style="display: none">
                                <label for="bdescid">Concerne :</label>
                                <input type="text" name="Concerne" id="bdescid" class="form-control">
                            </div>

                            <div class="form-group" id="causeGroup" style="display: none">
                                <label id="cause" for="cause">La Cause :</label>
                                <input type="text" name="cause" id="cause" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="bdescid">Ville :</label>
                                <input type="text" name="ville" id="bdescid" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="bdescid">Remarques :</label>
                                <input type="text" name="Remarques" id="bdescid" class="form-control">
                            </div>




                        </div>
                        <div class="model-footer">
                            <button type="submit" class="btn btn-primary" style="width: 100%;">
                                Sortir le <span id="buttonText">Cheque</span>
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        function saveCheaq(e) {
            e.preventDefault();

            var contactform = $('#newcheque')[0];
            var contactformData = new FormData(contactform);

            // console.log(contactformData);

            $.ajax({
                type: "POST",
                url: "{{ route('addnewCheque.create') }}",
                data: contactformData,
                processData: false,
                contentType: false,
                success: function(response) {

                    swal(
                    "Message"," Cela a été fait avec succès ",
                    'success',{
                        button:true,


                    });

                    window.location.href = "{{ route('allcheques.all') }}";

                },
                error: function(errr) {

                    $('.cheque_err').html('');
                    $('.date_emission_err').html('');
                    $('.date_paiement_err').html('');
                    $('.benefisaire_err').html('');
                    $('.Montant_err').html('');
                    $('.Concerne_err').html('');
                    $('.ville_err').html('');


                    var myeror = errr.responseJSON.errors;

                    console.log(myeror);

                    for (var er in myeror) {
                        $('.' + er + '_err').html(myeror[er][0]);
                    }

                }
            });


        }



        const label = document.getElementById('lenumberdotype');
        const causeGroup = document.getElementById('causeGroup');
        const ConcerneGroup = document.getElementById('ConcerneGroup');
        const sortirButton = document.getElementById('buttonText');


        typeSelect.addEventListener('change', () => {
            const selectedValue = {{ $carnettype }};



            label.textContent = `Nº ${selectedValue === 'Traite' ? 'Trait' : 'Cheque'} :`;
            buttonText.textContent = `${selectedValue === 'Traite' ? 'Trait' : 'Cheque'}`;

            if (selectedValue === 'Traite') {

                causeGroup.style.display = 'block';
                ConcerneGroup.style.display = 'none';
                sortirButton.style.display = 'block';

            } else {
                causeGroup.style.display = 'none';
                ConcerneGroup.style.display = 'block';
            }

        });
    </script>

    </div>


@endsection
