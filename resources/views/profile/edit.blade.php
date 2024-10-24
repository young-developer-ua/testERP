@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center mb-4">Редагувати профіль</h2>
        <form method="POST" action="{{ route('profile.update', $user->id) }}">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Ім'я</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email адреса</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    @if(!$user->team_lead_id && $user->role->id === \App\Enums\RoleEnum::BUYER->value)
                        <div class="form-group">
                            <label for="team_lead_id">Тімлід</label>
                            <select class="form-control @error('team_lead_id') is-invalid @enderror" id="team_lead_id" name="team_lead_id">
                                <option value="">Оберіть тімліда</option>
                                @foreach($teamLeads as $teamLead)
                                    <option value="{{ $teamLead->id }}" {{ old('team_lead_id', $user->team_lead_id) == $teamLead->id ? 'selected' : '' }}>
                                        {{ $teamLead->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('team_lead_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Зберегти зміни</button>
                </div>
            </div>
        </form>
    </div>
@endsection
