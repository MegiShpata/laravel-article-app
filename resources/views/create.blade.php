<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="panel panel-primary">
            <h5 class="cart-header" style="margin-left: 20px">
                <br>
                <a href="{{route('articles.index')}}" class="btn btn-sm btn-outline-primary">Go Back</a>
            </h5>

            <div class="panel-body">

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>

                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <br><br>
                <form action="{{ url('articles') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-md-4">
                            <label>Barcode</label>
                            <input type="text" placeholder="barcode" value="{{ old('barcode') }}" name="barcode" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label>Emertimi</label>
                            <input type="text" placeholder="emertimi" value="{{ old('emertimi') }}" name="emertimi" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label>Njesia</label>
                            <input type="text" placeholder="njesia" value="{{ old('njesia') }}" name="njesia" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label>Data_skadences</label>
                            <input type="date" placeholder="data_skadences" value="{{ old('data_skadences') }}" name="data_skadences" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label>Price</label>
                            <input type="text" placeholder="price" value="{{ old('price') }}" name="price" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="lloji" id="lloji" value="{{ old('lloji')}}">
                                <label class="form-check-label" for="lloji">
                                    I Importuar?
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="TVSH" id="TVSH" value="{{ old('TVSH')}}">
                                <label class="form-check-label" for="TVSH">
                                    Ka TVSH?
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label>Tipi</label>
                            <input type="text" placeholder="Tipi" value="{{ old('tipi') }}" name="tipi" class="form-control">
                        </div>

                    </div>

                    <div class="row">
                        <br>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>
