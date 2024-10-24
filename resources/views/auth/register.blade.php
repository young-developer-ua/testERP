@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <form class="w-50" method="POST" action="{{ route('register') }}">
            @csrf
            <h2 class="text-center mb-4">Реєстрація</h2>
            <div class="form-group">
                <label for="name">Ім'я *</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Введіть ім'я" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email адреса *</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Введіть email" required>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Пароль *</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Пароль" required>
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="passwordConfirmation">Підтвердження пароля *</label>
                <input type="password" class="form-control @error('passwordConfirmation') is-invalid @enderror" id="passwordConfirmation" name="passwordConfirmation" placeholder="Підтвердження пароля" required>
                @error('passwordConfirmation')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="role_id">Роль *</label>
                <select class="form-control @error('role_id') is-invalid @enderror" id="role_id" name="role_id" required>
                    @foreach(App\Enums\RoleEnum::cases() as $role)
                        @if ($role !== App\Enums\RoleEnum::ADMIN)
                        <option value="{{ $role->value }}">{{ $role->name() }}</option>
                        @endif
                    @endforeach
                </select>
                @error('role_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="form-text text-muted">Після вибору ролі змінити її не можна.</small>
            </div>
            <div class="form-group" id="teamLeadContainer" style="display: none;">
                <label for="team_lead_id">Тімлід</label>
                <select class="form-control @error('team_lead_id') is-invalid @enderror" id="team_lead_id" name="team_lead_id">
                    <option value="">Оберіть тімліда</option>
                    @foreach($teamLeads as $teamLead)
                        <option value="{{ $teamLead->id }}">{{ $teamLead->name }}</option>
                    @endforeach
                </select>
                @error('team_lead_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">Зареєструватись</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const roleSelect = document.getElementById('role_id');
            const teamLeadContainer = document.getElementById('teamLeadContainer');
            const teamLeadSelect = document.getElementById('team_lead_id');

            roleSelect.addEventListener('change', function() {
                if (this.value == '3') {
                    teamLeadContainer.style.display = 'block';
                    teamLeadSelect.required = false;
                } else {
                    teamLeadContainer.style.display = 'none';
                    teamLeadSelect.value = '';
                }
            });
        });
    </script>
@endsection
