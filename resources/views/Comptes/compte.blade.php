@extends('app')

@section('title', 'Comptes')


@section('content')


    <style>
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
                <h1>Comptes</h1>

                @if (\Session::has('success'))
                    <div class="textsuccses">
                        <h4>{{ \Session::get('success') }}</h4>
                    </div>
                @endif

            </div>
            <div class="form-group row mb-0">
                <div class="col-md-8">
                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">
                        Ajouter une nouvelle societe
                    </button>
                </div>
            </div>


        </div>

        <ul class="box-info">
            <li>
                <i class='bx bxs-buildings'></i>
                <span class="text">
                    <h3>{{ count($banks) }}</h3>
                    <p>Touts Les societes</p>
                </span>
            </li>
            <li>
                <i class='bx bxs-buildings'></i>
                <span class="text">
                    <h3>{{ count($comptes) }}</h3>
                    <p>Touts Les Comptes</p>
                </span>
            </li>

        </ul>



        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Les Societe</h3>
                    <i class='bx bx-filter'></i>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Societes</th>
                            <th>Comptes</th>
                            <th>Logo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banks as $item)
                            <tr>
                                <td>

                                    <h4>{{ $item->name_s }}+ {{ $item->id }}</h4>

                                    {{-- <button id="myaddcomtbtn" type="button" data-bs-whatever="{{ $item->name_s }}"
                                        data-toggle="modal" data-target="#myModaladdcomte" class="btn btn-primary">
                                        Ajouter une Compte <i class='bx bx-message-square-add bx-tada bx-rotate-90'></i>
                                    </button> --}}

                                    <button type="button" data-toggle="modal" data-target="#myModaladdcomte" data-bs-whatever="{{ $item->id }}" class="btn btn-primary btnajuto">
                                        Ajouter une Compte
                                        <i class='bx bx-message-square-add bx-tada bx-rotate-90'></i>
                                    </button>

                                    <div class="modal fade" id="myModaladdcomte" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <!-- Modal content -->
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ajouter une nouvelle
                                                        Compte + {{ $item->id }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="container mr-3 mb-5 mt-5">
                                                    <form action="{{ route('StoreCompte', $item->id) }}" method="POST">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="POST">

                                                        <div class="nodel-body">

                                                            <h4 class="mytitlesocity"></h4>


                                                            <div class="form-group">
                                                                <label for="bnameid">Banque</label>
                                                                <div class="form-floating">
                                                                    <select class="form-select" name="bank_id">
                                                                        <option selected>Tous Les Banques</option>


                                                                        @foreach ($allbanks as $bank)
                                                                            <option
                                                                                value="{{ $bank->id }},{{ $bank->banque }}">
                                                                                {{ $bank->banque }}</option>
                                                                        @endforeach

                                                                    </select>
                                                                </div>

                                                            </div>

                                                            <div class="form-group">
                                                                <label for="bdescid">Compte</label>
                                                                <input type="text" name="rib" id="bdescid"
                                                                    class="form-control" placeholder="Enter RIB">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="bdescid">Adresse agence</label>
                                                                <input type="text" name="adress_id" id="bdescid"
                                                                    class="form-control" placeholder="Enter Adresse agence">
                                                            </div>


                                                        </div>
                                                        <div class="model-footer">
                                                            <button type="submit" class="btn btn-primary">Ajouter</button>
                                                        </div>

                                                    </form>
                                                </div>

                                            </div>
                                        </div>


                                </td>
                                <td>

                                    @foreach ($item->comptes as $mybankcont)
                                        <h4>{{ $mybankcont->rib }} |
                                            {{ preg_replace('/[^a-z]/i', '', $mybankcont->bank_id) }}</h4>

                                        <form action="{{ route('destroyCompte', $mybankcont->id) }}" method="POST">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">

                                            <button type="submit" class="btn btn-danger">
                                                supprimer une Compte <i
                                                    class='bx bx-message-square-x bx-tada bx-rotate-270'></i>
                                            </button>

                                        </form>
                                    @endforeach


                                </td>
                                <td>
                                    <img height="100px" width="100px" src="images/{{ $item->logo_link }}">
                                </td>
                            </tr>



            </div>
            @endforeach




            </tbody>
            </table>
        </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
        </script>

    </main>
    <!-- MAIN -->


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Modal content -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter une nouvelle Societe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="container mr-3 mb-5 mt-5">
                    <form action="{{ route('Comptes.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input name="_method" type="hidden" value="POST">

                        <div class="nodel-body">
                            <div class="form-group">
                                <label for="bnameid">Ssociete title</label>
                                <input type="text" name="name_s" id="bnameid" class="form-control"
                                    placeholder="Enter Name">
                            </div>

                            <div class="form-group">
                                <label for="bdescid">Banque description</label>
                                <input type="text" name="desc_s" id="bdescid" class="form-control"
                                    placeholder="Enter Desc">
                            </div>

                            <div class="form-group">
                                <label for="bdescid">choisir un logo</label>

                                <div class="container">
                                    <input type="file" id="fromfilecontroller" name="image" accept="image/*"
                                        class="from-control-file">

                                </div>
                            </div>
                        </div>
                        <div class="model-footer">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>



    </div>

    <script>


            const exampleModal = document.getElementById('myModaladdcomte')
            if (exampleModal) {
                exampleModal.addEventListener('show.bs.modal', event => {
                    // Button that triggered the modal
                    const button = event.relatedTarget
                    // Extract info from data-bs-* attributes
                    const recipient = button.getAttribute('data-bs-whatever')
                    console.log(recipient);
                    // If necessary, you could initiate an Ajax request here
                    // and then do the updating in a callback.

                    // Update the modal's content.
                    const modalTitle = exampleModal.querySelector('.modal-title')
                    const modalBodyInput = exampleModal.querySelector('.modal-body input')

                    modalTitle.textContent = `New message to ${recipient}`
                    modalBodyInput.value = recipient
                })
            }




        // $(document).ready(function() {

        //     $(document).on('click', '.btnajuto', function() {

        //         var sociti_id = $(this).val();
        //         //alert(sociti_id);
        //         $('#myModaladdcomte').modal('show');

        //     });
        // });
    </script>


@endsection
