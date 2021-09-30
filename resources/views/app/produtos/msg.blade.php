@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">.: Mensagem</div>
                    <div class="card-body">
                    <div class="mb-3">
                        {{-- Botão voltar --}}
                        <a href="{{ route('produtos.index') }}"><button type="button" class="btn btn-secondary">Voltar</button></a><br><br>
                    </div>
                        
                        @isset($msg)
                            @if ($msg != '')
                                <div class="alert alert-light" role="alert">
                                    {{$msg}}
                                </div>
                            
                            @endif
                        @endisset

                    </div>
                </div>
            <div>
        <div>
<div>
@endsection