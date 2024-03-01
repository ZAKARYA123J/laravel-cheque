@extends('app')

@section('title', 'Historique des operations')


@section('content')


    <style>




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
                <h1>Historique des operations</h1>

                @if (\Session::has('success'))
                    <div class="textsuccses">
                        <h4>{{ \Session::get('success') }}</h4>
                    </div>
                @endif

            </div>



        </div>

        <ul class="box-info">

            <li>
                <i class='bx bx-credit-card-alt'></i>
                <span class="text">
                    <h3>{{ count($cheques) }}</h3>
                    <p>Touts Les Historiques</p>
                </span>
            </li>


        </ul>



        <div class="table-data">
            <div class="order">
                <div class="head">
                 </div>
                <table id="carnettable">
                    <thead>
                        <tr>
                            <th>Societe</th>
                            <th>Compte</th>
                            <th>Carnet</th>
                            <th>Type</th>
                            <th>Numero</th>
                            <th>Date d'emission</th>
                            <th>Beneficiaire</th>
                            <th>Ville</th>
                            <th>Montant</th>
                            <th>Concerne/Cause</th>
                            <th>Date echeance</th>
                            <th>Remarques</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cheques as $item)
                            <tr>
                                <td>

                                    <h4>{{ $item->carnte->societe->name_s ?? '' }}</h4>


                                </td>
                                <td>

                                    <h4>{{ $item->carnte->compte->bank_name ?? '' }} | {{$item->carnte->compte->rib ?? ''}} |
                                        {{ $item->carnte->compte->adress_id  ?? ''}}</h4>

                                </td>
                                <td>

                                    <h4>{{ $item->carnte->name ?? '' }}</h4>

                                </td>

                                <td>

                                    <h4>{{ $item->type}}</h4>

                                </td>
                                <td>

                                    <h4>{{ $item->n_cheque }}</h4>

                                </td>
                                <td>

                                    <h4>{{ $item->date_emission }}</h4>

                                </td>
                                <td>

                                    <h4>{{ $item->benefisaire }}</h4>

                                </td>
                                <td>

                                    <h4>{{ $item->ville }}</h4>

                                </td>
                                <td>

                                    <h4>{{ $item->Montant }}</h4>

                                </td>
                                <td>

                                    <h4>{{ $item->Concerne }}</h4>

                                </td>
                                <td>

                                    <h4>{{ $item->date_paiement }}</h4>

                                </td>
                                <td>

                                    <h4>{{ $item->Remarques }}</h4>

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
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter une nouvelle Cheque</h5>
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
                                <label for="bdescid">Numero</label>
                                <input type="text" name="numero" id="bdescid" class="form-control"
                                    placeholder="Enter Debut">
                            </div>


                            </div>

                            <div class="form-group">
                                <label for="bnameid">Compte Carnet</label>
                                <div class="form-floating">
                                    <select class="form-select" name="carnet_id">
                                        <option> </option>
                                        @foreach ($carnets as $compte)
                                            <option value="{{ $compte->id }}">
                                                {{ $compte->name }}</option>
                                        @endforeach

                                    </select>
                                </div>


                            </div>

                            <div class="form-group">
                                <label for="bdescid">valeur</label>
                                <input type="text" name="valeur" id="bdescid" class="form-control"
                                    placeholder="Enter Debut">
                            </div>


                            <div class="form-group">
                                <label for="bdescid">datem</label>
                                <input type="text" name="datem" id="bdescid" class="form-control"
                                    placeholder="Enter Debut">
                            </div>
                            <div class="form-group">
                                <label for="bdescid">datep</label>
                                <input type="text" name="datep" id="bdescid" class="form-control"
                                    placeholder="Enter Debut">
                            </div>
                            <div class="form-group">
                                <label for="bdescid">concerne</label>
                                <input type="text" name="concerne" id="bdescid" class="form-control"
                                    placeholder="Enter Debut">
                            </div>




                            <div class="form-group">
                                <label for="bnameid">Type</label>
                                <div class="form-floating">
                                    <select class="form-select" name="typecliorsupp">
                                        <option> </option>
                                        @foreach (json_decode('{"Client":"Client", "Fournisseuse":"Fournisseuse"}', true) as $optionKey => $optionValu)
                                            <option value="{{ $optionKey }}">{{ $optionValu }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>


                            </div>

                        </div>
                        <div class="model-footer m-3">
                            <button type="submit" class="btn btn-primary" style="width: 100%;">Ajouter</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>



    </div>
    <script>
        $(document).ready(function() {
            $('#carnettable').DataTable();
        });
    </script>

@endsection
