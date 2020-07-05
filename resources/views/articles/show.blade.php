@extends('layouts.master')


@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary ">{{$articles->title}}</h3>
                <small>Slug : {{$articles->slug}}</small><br>
                <small>Posted At {{date('d M Y | H:i', strtotime($articles->updated_at))}}</small>
            </div>
            <div class="card-body">
                <p>
                    {{$articles->content}}
                </p>
                <p>Tags : 
                    @foreach ($tags as $item)
                        @if ($item->tag == "")
                            -
                        @else
                            <span class="btn btn-success">{{$item->tag}}</span>
                        @endif
                    @endforeach ($tags as $item)
                    
                </p>
                
            </div>
        </div>
        <a href="/articles" class="btn btn-secondary">Kembali Ke List Artikel</a>
    </div>
</div>  
@endsection