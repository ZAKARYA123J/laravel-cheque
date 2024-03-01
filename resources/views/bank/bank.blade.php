@extends('app')

@section('title', 'Banques')

@section('content')


    <!-- MAIN -->
    <main>


        <div class="head-title">
            <div class="left">
                <h1>Banques</h1>

                @if (\Session::has('success'))
                    <div class="textsuccses">
                        <h4>{{ \Session::get('success') }}</h4>
                    </div>
                @endif

            </div>
            <div class="form-group row mb-0">
                <div class="col-md-8">
                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary" >
                        Ajouter une nouvelle banque
                    </button>
                </div>
            </div>

            {{-- <a href="#" class="btn-download">


                <span class="text"></span>
                <i class='bx bxs-plus-circle'></i>
            </a> --}}
        </div>

        <ul class="box-info">
            <li>
                <i class='bx bxs-bank'></i>
                <span class="text">
                    <h3>{{ count($banks) }}</h3>
                    <p>Touts Les Banques</p>
                </span>
            </li>

        </ul>


        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Les Banques</h3>
                    <i class='bx bx-filter'></i>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Banques</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banks as $item)
                            <tr>
                                <td>
                                    <p>{{ $item->banque }}</p>
                                </td>
                                <td>
                                    <form action="{{ route('banks.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">


                                        <button type="submit"class="btn btn-primary" >
                                            Supprimer
                                        </button>

                                    </form>



                                </td>
                            </tr>
                        @endforeach




                    </tbody>
                </table>
            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    </main>
    <!-- MAIN -->


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Modal content -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter une nouvelle banque</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="container mr-3 mb-5 mt-5">
                    <form action="{{route('Banques.store')}}" method="POST">
                        @csrf
                        <input name="_method" type="hidden" value="POST">

                        <div class="nodel-body">
                            <div class="form-group">
                                <label for="bnameid" >Banque title</label>
                                <input type="text" name="bname" id="bnameid" class="form-control" placeholder="Enter Bank Name">
                            </div>

                            <div class="form-group">
                                <label for="bdescid">Banque description</label>
                                <input type="text" name="bdesc" id="bdescid" class="form-control" placeholder="Enter Bank Desc">
                            </div>
                        </div>
                        <div class="model-footer">
                            <button type="submit" class="btn btn-primary" >Ajouter</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>





{{-- <!-- Add Model -->

    <div class="model fade" id="exampleModel" tabindex="-1" role="dialog" aria-labelledby="exampleModellable" aria-hidden="true">
        <div class="model-dialog" role="document">
            <div class="model-countent">
                <div class="model-header">
                    <h5 class="model-title" id="exampleModellable">Model title</h5>
                    <button class="close" data-dismiss="model" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('store', $item->id) }}" method="POST">
                    @csrf
                    <input name="_method" type="hidden" value="POST">

                    <div class="nodel-body">
                        <div class="form-group">
                            <label >Bank Name</label>
                            <input type="text" name="bname" class="form-control" placeholder="Enter Bank Name">
                        </div>

                        <div class="form-group">
                            <label >Bank Desc</label>
                            <input type="text" name="bdesc" class="form-control" placeholder="Enter Bank Desc">
                        </div>
                    </div>
                    <div class="model-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="model">Close</button>
                        <button type="submit" class="btn btn-primary" >Save Data</button>
                    </div>

                </form>
            </div>
        </div>

    </div>


    <!-- Add Model --> --}}

</div>



@endsection
