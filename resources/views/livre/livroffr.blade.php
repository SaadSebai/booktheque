@extends('layouts.app')


@section('content')

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

<div class="container" id="app">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10"><h3 class="panel-title">لائحة الكتب التي تريد اعطاءها</h3></div>
                        <div class="col-md-2 text-right">
                            <a href="{{ url('livres/create') }}" class="btn btn-success">اضافة كتاب    <i class="fas fa-plus-circle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">

                <table class="table">
                    <head>
                    <tr>
                        <td></td>
                        <td class="text-right"><strong>مدينة التبادل</strong></td>
                        <td class="text-right"><strong>المستوى</strong></td>
                        <td class="text-right"><strong>المادة</strong></td>
                        <td class="text-right"><strong>اسم الكتاب</strong></td>
                    </tr>
                    </head>

                    <body>

                        @foreach($livres as $lvr)
                        @if($lvr->offred == 0)
                        <tr>
                            <td>
                                    
                                    <form action="{{ url('livres/'.$lvr->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">مسح   <i class="fas fa-trash-alt"></i></button>
                                    <a href="{{ url('livres/'.$lvr->id.'/edit') }}" class="btn btn-warning">تعديلات     <i class="fas fa-cog"></i></a>
                                    @if($lvr->acc == 1)
                                        <a href="{{ url('livres/'.$lvr->id.'/info') }}" class="btn btn-info">تم طلب الكتاب    <i class="fas fa-info-circle"></i></a>
                                    @endif
                                    
                                </form>
                            </td>
                            <td class="text-right">{{ $lvr->ville_prnd }}</td>
                            <td class="text-right">{{ $lvr->livr_nivo }}</td>
                            <td class="text-right">{{ $lvr->matiere->matiere_nom }}</td>
                            <td class="text-right">{{ $lvr->livr_nom }} <br>( {{ $lvr->user->name }} )</td>
                        </tr>
                        @endif
                        @endforeach

                    </body>

                </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection