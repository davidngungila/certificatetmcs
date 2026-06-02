@extends('layouts.app')

@section('page-title', 'Profile')

@section('content')
<div class="breadcrumb"><span class="breadcrumb-current">Profile</span></div>

<div class="section-header" style="margin-bottom:16px">
  <div>
    <div class="section-title">Profile</div>
    <div class="section-subtitle">Manage your account settings</div>
  </div>
</div>

<div class="glass-card" style="padding:24px">
  <div class="form-grid" style="grid-template-columns:1fr">
    <div class="form-group">
      <label>Name</label>
      <input type="text" value="{{ Auth::user()->name }}" disabled style="background:var(--gray-100)">
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="email" value="{{ Auth::user()->email }}" disabled style="background:var(--gray-100)">
    </div>
  </div>
  <div style="margin-top:24px; display:flex; gap:8px">
    <a href="{{ route('profile.edit') }}" class="btn btn-secondary">Edit Profile</a>
    <a href="{{ route('dashboard') }}" class="btn btn-primary">Back to Dashboard</a>
  </div>
</div>
@endsection
