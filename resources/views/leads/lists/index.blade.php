@extends('layouts.app')

@section('title', 'Списки лидов и статистика')

@section('content')
    <div class="col my-3">
        <h3 class="fw-bold">Списки лидов и статистика</h3>
    </div>
    <div class="row mt-5">
        <div class="col-9 table-responsive">
            @include('leads.lists.leads-list')
        </div>
        <div class="col-3">
            @include('leads.lists.statistics-list')
        </div>
    </div>
    @if(isset($leads))
        <div class="col-12 d-flex justify-content-center my-3">
            {{ $leads->links() }}
        </div>
    @endif
@endsection
