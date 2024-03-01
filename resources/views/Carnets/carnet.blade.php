@extends('app')

@section('title', 'Carnets')


@section('content')


    <style>

.h4, h4 {
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
                <h1>Carnets</h1>

                @if (\Session::has('success'))
                    <div class="textsuccses">
                        <h4>{{ \Session::get('success') }}</h4>
                    </div>
                @endif
                @if(isset($concatenatedString))
    <div class="alert alert-info">
        Generated N°_de_carnet: {{ $concatenatedString }}
    </div>
@endif

            </div>
            <div class="form-group row mb-0">
                <div class="col-md-8">
                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">
                        Ajouter une nouvelle Carnets
                    </button>
                </div>
            </div>


        </div>

        <ul class="box-info">

            <li>
                <i class='bx bxs-book-alt'></i>
                <span class="text">
                    <h3>{{ count($cheques) }}</h3>
                    <p>Touts Les Chiques</p>
                </span>
            </li>
            <li>
                <i class='bx bxs-book-alt'></i>
                <span class="text">
                    <h3>{{ count($traite) }}</h3>
                    <p>Touts Les Traite</p>
                </span>
            </li>

        </ul>



        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Les Carnets</h3>
                    <i class='bx bx-filter'></i>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Banque</th>
                            <th>Societe [compte]</th>
                            <th>Ville</th>
                            <th>N de carnet</th>
                            <th>Debut</th>
                            <th>Fin</th>
                            <th>date limite</th>
                            <th>N° de carnet</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Carnets as $item)
            
                            <tr>
                                <td><h4>{{ $item->type }}</h4></td>
                                <td><h4>{{ $item->compte_id }}</h4></td>
                                <td><h4>{{ $item->socity_id }}</h4></td>
                                <td><h4>{{ $item->Ville }}</h4></td>
                                <td><h4>{{ $item->numberdocarnet }}</h4></td>
                                <td><h4>{{ $item->numberdebut }}</h4></td>
                                <td><h4>{{ $item->numberfin }}</h4></td>
                                <td><h4>{{ $item->datelimite }}</h4></td>
                                <td><h4>{{ $item->N°_de_carnet }}</h4></td>
                                <td>
                                <form action="{{ route('Carnets.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary">Supprimer</button>
                                </form>
                                </td>
                            </tr>
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
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter une nouvelle Carnet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="container mr-3 mb-5 mt-5">
                    <form action="{{ route('StoreCarnets',1) }}" method="POST">
                        @csrf
                        <input name="_method" type="hidden" value="POST">

                        <div class="nodel-body">

                            <div class="form-group">
                                <label for="bnameid">Type</label>
                                <div class="form-floating">
                                    <select name="type">
                                        <option> </option>
                                        @foreach (json_decode('{"Cheque":"Cheque", "Traite":"Traite"}', true) as $optionKey => $optionValu)
                                            <option value="{{ $optionKey }}">{{ $optionValu }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>


                            </div>

                            <div class="form-group">
                                <label for="bnameid">Compte societe</label>
                                <div class="form-floating">
                                    <select name="compte_id">
                                        <option> </option>
                                        @foreach ($comptes as $compte)
                                            <option value="{{ $compte->id }}">{{ preg_replace( '/[^a-z]/i', '', $compte->bank_id ) }} | {{ $compte->rib }} | {{ $compte->adress_id }}</option>
                                        @endforeach

                                    </select>
                                </div>


                            </div>
                            <div class="form-group">
                                <label for="bnameid">N de Carnet</label>
                                <div class="form-floating">
                                    <select name="numberdocarnet">
                                        <option> </option>
                                        @foreach (json_decode('{"25":"25", "50":"50", "100":"100"}', true) as $optionKey => $optionValu)
                                            <option value="{{ $optionKey }}">{{ $optionValu }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="bdescid">Ville</label>
                                <input type="text" name="Ville" id="bdescid"
                                    class="form-control" placeholder="Enter Ville">
                            </div>

                            <div class="form-group">
                                <label for="bdescid">Debut</label>
                                <input type="text" name="numberdebut" id="bdescid"
                                    class="form-control" placeholder="Enter Debut">
                            </div>
                            <div class="form-group">
                                <label for="bdescid">Fin</label>
                                <input type="text" name="numberfin" id="bdescid"
                                    class="form-control" placeholder="Enter Debut">
                            </div>
                            <div class="form-group">
                                <label for="bdescid">Date limite</label>
                                <input type="text" name="datelimite" id="bdescid"
                                    class="form-control" placeholder="Enter Debut">
                            </div>
                        </div>
                        <div class="model-footer">
                            
                            <button type="submit" class="btn btn-primary" style="width: 100%;">Ajouter</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>



    </div>


@endsection
