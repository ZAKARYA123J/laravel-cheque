@extends('app')

@section('title', 'Comptes')


@section('content')


    <style>
        h4 {
            font-size: 1rem;
        }

        .mycomptediv {

            display: flex;
            gap: 2rem;
            justify-items: center;
            margin-top: 0.9rem;
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
                <h1>Comptes</h1>

                @if (\Session::has('success'))
                    <div class="textsuccses">
                        <h4>{{ \Session::get('success') }}</h4>
                    </div>
                @endif

            </div>
            <div class="form-group">
                <div class="col-m-8">
                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">
                        Ajouter une nouvelle societe
                    </button>
                </div>
                <div class="col-m-8 mt-3">
                    <button type="button" data-toggle="modal" data-target="#addcomte" class="btn btn-success">
                        Ajouter une nouvelle compte
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

                    <div class="col-m-8 mt-3">
                        <button id="deletallselectedids" type="button" class="btn btn-danger">
                            supprimer tous les Societes
                        </button>
                    </div>

                </div>
                <table id="carnettable">

                    <thead>
                        <tr>
                            <th class="col-sm-1"><input type="checkbox" name="deletcheck" id="selectall_ids"></th>
                            <th class="col-sm-2">Societes</th>
                            <th>Comptes</th>
                            <th>Logo</th>

                        </tr>
                    </thead>
                    <tbody>



                        @foreach ($banks as $index => $item)
                            <tr id="employee_ids{{ $item->id }}">
                                <td>

                                    <input type="checkbox" value="{{ $item->id }}" name="ids" class="checkbox_ids">



                                </td>
                                <td>


                                    <h4 id="textarea">{{ $item->name_s }}</h4>



                                    <button hidden type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                        data-target="#myModaladdcomte" id="submit">
                                        Ajouter
                                    </button>


                                </td>
                                <td>

                                    <div class="row">
                                        @foreach ($item->comptes as $item)
                                        <div class="mb-3 col-sm-8">
                                            <div class="row">
                                                <form action="{{ route('deletcompt.delet', $item->id) }}" method="POST" class="col-sm-2">
                                                    @csrf

                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class='bx bxs-trash-alt bx-tada'></i>
                                                        </button>
                                                </form>
                                                <h4 class="col-sm-10">{{ $item->bank_name }} | {{ $item->rib }} |
                                                        {{ $item->adress_id }}
                                                </h4>
                                            </div>
                                        </div>



                                        @endforeach
                                    </div>





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
                                <label for="bnameid">Societe title</label>
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
                            <button type="submit" class="btn btn-primary" style="width: 100%">Ajouter</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="addcomte">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal content -->
                <form action="{{ route('StoreCompte') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter une nouvelle Compte</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="container mr-3 mb-5 mt-5">
                        <input name="_method" type="hidden" value="POST">

                        <div class="nodel-body">


                            <div class="form-group">
                                <label for="bnameid">Societe</label>
                                <div class="form-floating">
                                    <select class="form-select" name="socitiy_id" id="bankdi">
                                        <option selected>Tous Les Societe</option>


                                        @foreach ($banks as $sociti)
                                            <option value="{{ $sociti->id }}">
                                                {{ $sociti->name_s }}</option>
                                        @endforeach

                                    </select>
                                </div>

                            </div>


                            <div class="form-group">
                                <label for="bnameid">Banque</label>
                                <div class="form-floating">
                                    <select class="form-select" name="bank_id" id="bankdi">
                                        <option selected>Tous Les Banques</option>


                                        @foreach ($allbanks as $bank)
                                            <option value="{{ $bank->id }},{{ $bank->banque }}">
                                                {{ $bank->banque }}</option>
                                        @endforeach

                                    </select>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="bdescid">Compte</label>
                                <input type="text" name="rib" id="bdescid" class="form-control"
                                    placeholder="Enter RIB">
                            </div>

                            <div class="form-group">
                                <label for="bdescid">Adresse agence</label>
                                <input type="text" name="adress_id" id="bdescid" class="form-control"
                                    placeholder="Enter Adresse agence">
                            </div>

                        </div>
                        <div class="model-footer">
                            <button type="submit" class="btn btn-primary" style="width: 100%">Ajouter</button>
                        </div>
                    </div>


                </form>


            </div>
        </div>
    </div>



    <script type="text/javascript">


     $(function (e) {


        $("#selectall_ids").click(function () {

            $(".checkbox_ids").prop('checked',$(this).prop('checked'))

        });

        $("#deletallselectedids").click(function (e) {
            e.preventDefault();
            var all_ids = [];
            $('input:checkbox[name=ids]:checked').each(function () {
                all_ids.push($(this).val())
             });

             $.ajax({
                type: "DELETE",
                url: "{{ route('DeletAllSocity') }}",
                data: {
                    ids:all_ids
                },
                success: function (response) {
                    $.each(all_ids, function (key, value) {
                        $('#employee_ids'+value).remove();
                    });
                }
             });




         });



     });



        $('.decline-loan-button').on('click', function() {

            $('#package_name').val($(this).data('package_name-input'));
            $('#investor_name').val($(this).data('investor_name-input'));


        });
    </script>

<script>
    $(document).ready(function() {
        $('#carnettable').DataTable();
    });
</script>


@endsection
