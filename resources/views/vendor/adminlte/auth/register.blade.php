@extends('adminlte::auth.auth-page', ['auth_type' => 'register'])

@php($login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login'))
@php($register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register'))

@if (config('adminlte.use_route_url', false))
    @php($login_url = $login_url ? route($login_url) : '')
    @php($register_url = $register_url ? route($register_url) : '')
@else
    @php($login_url = $login_url ? url($login_url) : '')
    @php($register_url = $register_url ? url($register_url) : '')
@endif

@section('auth_header', __('adminlte::adminlte.register_message'))

@section('auth_body')
    <form action="{{ $register_url }}" method="post">
        @csrf
        {{-- Tipo de documento field --}}
        <div class="input-group mb-3">
            <Select name="Codtip_doc"
                class="form-control @error('Codtip_doc') is-invalid @enderror
                placeholder="{{ __('adminlte::adminlte.type_of_identity_document') }}"
                autofocus required>
                <option value="">Seleccione un tipo de documento</option>
                @foreach ($tipos_documentos as $tipo)
                    <option value="{{ $tipo->Codtip_doc }}" {{ old('Codtip_doc') == $tipo->Codtip_doc ? 'selected' : '' }}>
                        {{ $tipo->Tip_doc }}
                    </option>
                @endforeach
            </select>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-id-card {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @error('Codtip_doc')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Ndocum field --}}
        <div class="input-group mb-3">
            <input type="text" name="Ndocum" class="form-control @error('Ndocum') is-invalid @enderror"
                value="{{ old('Ndocum') }}" placeholder="{{ __('adminlte::adminlte.number_document') }}" autofocus required>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @error('Ndocum')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        {{-- Nombres field --}}
        <div class="input-group mb-3">
            <input type="text" name="Nombres" class="form-control @error('Nombres') is-invalid @enderror"
                value="{{ old('Nombres') }}" placeholder="{{ __('adminlte::adminlte.full_name') }}" autofocus required>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @error('Nombres')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Apellidos field --}}
        <div class="input-group mb-3">
            <input type="text" name="Apellidos" class="form-control @error('Apellidos') is-invalid @enderror"
                value="{{ old('Apellidos') }}" placeholder="{{ __('adminlte::adminlte.full_last') }}" autofocus required>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @error('Apellidos')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Fecha expedicion field --}}
        <div class="input-group mb-3">
            <label for="Fecha_nac" class="mr-2">{{ __('adminlte::adminlte.issue_date') }}</label>
            <input type="date" name="Fecha_exp" class="form-control @error('Fecha_exp') is-invalid @enderror"
                value="{{ old('Fecha_exp') }}" autofocus required>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-calendar-alt {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @error('Fecha_exp')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Fecha nacimiento field --}}
        <div class="input-group mb-3">
            <label for="Fecha_nac" class="mr-2">{{ __('adminlte::adminlte.birthdate') }}</label>
            <input type="date" name="Fecha_nac"
                class="form-control @error('Fecha_nac') is-invalid @enderror "value="{{ old('Fecha_nac') }}"
                autofocus required>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-calendar-alt {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @error('Fecha_nac')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Sexo field --}}
        <div class="input-group mb-3">
            <label for="Fecha_nac" class="mr-2">{{ __('adminlte::adminlte.sex') }}</label>
            <select name="Sexo" class="form-control @error('Sexo') is-invalid @enderror" autofocus required>
                <option value="M" {{ old('Sexo') == 'M' ? 'selected' : '' }}>Masculino</option>
                <option value="F" {{ old('Sexo') == 'F' ? 'selected' : '' }}>Femenino</option>
            </select>
            </select>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-users {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @error('Sexo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Celular field --}}
        <div class="input-group mb-3">
            <input type="Celular" name="Celular" class="form-control @error('Celular') is-invalid @enderror"
                value="{{ old('Celular') }}" placeholder="{{ __('adminlte::adminlte.phone') }}" autofocus required>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-phone {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('Celular')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Ciudad field --}}
        <div class="input-group mb-3">
            <Select name="Ciudad"
                class="form-control @error('Ciudad') is-invalid @enderror
                placeholder="{{ __('adminlte::adminlte.city') }}"
                autofocus required:>
                <option value="">Seleccione una ciudad</option>
                @foreach ($ciudades as $ciudad)
                    <option value="{{ $ciudad->Cod_Ciud }}" {{ old('Cod_ciud') == $ciudad->Cod_Ciud ? 'selected' : '' }}>
                        {{ $ciudad->Nom_Ciud }}
                    </option>
                @endforeach
            </select>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-map-marker-alt {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @error('Ciudad')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Tipo de usuario field --}}
        <div class="input-group mb-3">
            <Select name="Codtip_usu"
                class="form-control @error('Codtip_usu') is-invalid @enderror
                placeholder="{{ __('adminlte::adminlte.user_type') }}"
                autofocus required>
                <option value="">Seleccione un tipo de usuario</option>
                @foreach ($tipos_usuarios as $tipo)
                    <option value="{{ $tipo->Codtip_usu }}"
                        {{ old('Codtip_usu') == $tipo->Codtip_usu ? 'selected' : '' }}>
                        {{ $tipo->Tip_usu }}
                    </option>
                @endforeach
            </select>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-id-badge {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @error('Codtip_usu')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Email field --}}
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}" required>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Password field --}}
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                placeholder="{{ __('adminlte::adminlte.password') }}" required>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Confirm password field --}}
        <div class="input-group mb-3">
            <input type="password" name="password_confirmation"
                class="form-control @error('password_confirmation') is-invalid @enderror"
                placeholder="{{ __('adminlte::adminlte.retype_password') }}">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Register button --}}
        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            <span class="fas fa-user-plus"></span>
            {{ __('adminlte::adminlte.register') }}
        </button>
        <div class="social-auth-links text-center mb-3">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-primary">
                <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
            </a>
            <a href="#" class="btn btn-block btn-danger">
                <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
            </a>
        </div>
    </form>
@stop

@section('auth_footer')
    <p class="my-0">
        <a class="text-warning" href="{{ $login_url }}">
            {{ __('adminlte::adminlte.i_already_have_a_membership') }}
        </a>
    </p>
@stop
