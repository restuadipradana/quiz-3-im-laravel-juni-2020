@extends('layouts.master')

@section('content')
<div class="card card-widget">
    @foreach ($articlex as $key => $article)
    
    <div class="card-header">
        <h3>judul: {{$article->judul}}</h3>
    </div>
    <div class="card-body">
        <h5>slug: {{$article->slug}}</h5>
        <p>isi: {{$article->isi}} </p>
        <h5>tag: {{$article->tag}}</h5>
        <span class="float-right text-muted">Diposting pada {{$article->tanggal_dibuat}}</span><br>
        @if ($article->tanggal_diperbarui == !null)
        <span class="float-right text-muted">Diedit pada {{$article->tanggal_diperbarui}}</span>
        @endif
    </div>
    @endforeach
    
    
</div>
@endsection