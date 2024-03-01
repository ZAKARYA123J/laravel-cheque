
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Modal content -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Choix de Bases pour Rubrique</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
