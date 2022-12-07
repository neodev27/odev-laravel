@extends('../layout/' . $layout)

@section('subhead')
    <title>CRUD Data List - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Soru Detay</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('usoru.usoru-list') }}"> Dön</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Soru:</strong>
                {{ $usoru->soru }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $product->detail }}
            </div>
        </div>
    </div>
   
@endsection
