<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" />

</head>

<body class="antialiased">
    <div class="container">
        <div class="readersack">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 ">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                            <h5 class="cart-header" style="margin-left: 20px">
                                <br>
                                <a href="{{route('articles.create')}}" class="btn btn-sm btn-outline-primary">Add New</a>
                            </h5>
                        <div id="search">
                            <form id="searchform" name="searchform">
                                <br>
                                <div class="row">
                                    <div class="form-group col-3">
                                        <label>Search by Emertimi</label>
                                        <input type="text" name="emertimi" value="{{request()->get('emertimi','')}}" class="form-control" />
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Search by Barcode</label>
                                        <input type="text" name="barcode" value="{{request()->get('barcode','')}}" class="form-control" />
                                    </div>
                                </div>
                                <button class='btn btn-success'>Search</button>
                            </form>
                            <br>
                        </div>
                        <div id="pagination">
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Barcode</th>
                                    <th>Emertimi</th>
                                    <th>Njesia</th>
                                    <th>Data_skadences</th>
                                    <th>Price</th>
                                    <th>Lloji</th>
                                    <th>TVSH</th>
                                    <th>Tipi</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($articles as $article)
                                    <tr>
                                        <td>{{$article->id}}</td>
                                        <td>{{$article->barcode}}</td>
                                        <td>{{$article->emertimi}}</td>
                                        <td>{{$article->njesia}}</td>
                                        <td>{{$article->data_skadences}}</td>
                                        <td>{{$article->price}}</td>
                                        @if($article->lloji)
                                        <td>I importuar</td>
                                        @else
                                            <td> Vendi </td>
                                        @endif

                                        @if($article->TVSH)
                                            <td>Me TVSH</td>
                                        @else
                                            <td>Pa TVSH </td>
                                        @endif>
                                        <td>{{$article->tipi}}</td>
                                        <td>
                                            <form action="{{ route('articles.destroy',$article->id) }}" method="Post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            <div id="pagination">
                                {{ $articles->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
