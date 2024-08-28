@extends('layouts.app')

@section('title')
    @if(request()->routeIs('lead.create'))
        Новый лид
    @else
        Редактирование лида
    @endif
@endsection

@section('content')
    <div class="col my-3">
        <h3 class="fw-bold">
            @if(request()->routeIs('lead.create'))
                Новый лид
            @else
                Редактирование лида
            @endif
        </h3>
    </div>

    <div class="col-6">
        @if(!empty($errors->all()))
            <p class="alert alert-danger">{{ config('messages.leads.validatorError') }}</p>
        @else
            @include('session-message')
        @endif
    </div>

    <form action="{{ isset($lead->id) ? route('lead.update', $lead->id) : route('lead.store') }}" method="post">
        @csrf
        @if(request()->routeIs('lead.destroy')) @method('delete') @endif

        <div class="col-6 my-5">
            <div class="row">
                <div class="col-6">
                    <label for="firstName-1" class="form-label">Имя</label>
                    <input id="firstName-1"
                           class="form-control custom-st-change-state @error('name') is-invalid @enderror"
                           name="name"
                           value="{{ old('name') ?? $lead->name ?? '' }}"
                           type="text"
                           required>
                    @error('name')
                    <div id="firstName-1-validation" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="lastName-1" class="form-label">Фамилия</label>
                    <input id="lastName-1"
                           class="form-control custom-st-change-state @error('surname') is-invalid @enderror"
                           name="surname"
                           value="{{ old('surname') ?? $lead->surname ?? '' }}"
                           type="text"
                           required>
                    @error('surname')
                    <div id="lastName-1-validation" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row my-4">
                <div class="col-6">
                    <label for="phone-1" class="form-label">Телефон</label>
                    <input id="phone-1"
                           class="form-control custom-st-change-state @error('phone') is-invalid @enderror"
                           name="phone"
                           value="{{ old('phone') ?? $lead->phone ?? '' }}"
                           type="tel"
                           placeholder="">
                    @error('phone')
                    <div id="phone-1-validation" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="email-1" class="form-label">E-mail</label>
                    <input
                        id="email-1"
                        class="form-control custom-st-change-state @error('email') is-invalid @enderror"
                        name="email"
                        value="{{ old('email') ?? $lead->email ?? '' }}"
                        type="email"
                        placeholder="">
                    @error('email')
                    <div id="email-1-validation" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="appeal-1" class="form-label">Текст обращения</label>
                    <textarea id="appeal-1"
                              class="form-control custom-st-change-state @error('appeal') is-invalid @enderror"
                              name="appeal"
                              rows="4">{{ old('appeal') ?? $lead->appeal ?? '' }}
                </textarea>
                    @error('appeal')
                    <div id="appeal-1-validation" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-center mt-4">
                <button class="btn btn-success custom-st-button" type="submit" disabled>
                    {{ isset($lead->id) ? __('Сохранить') : __('Отправить') }}
                </button>
            </div>
        </div>
    </form>
@endsection
