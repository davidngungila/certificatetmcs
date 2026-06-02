@extends('layouts.app')

@section('title', 'Settings')

@section('content')
<div class="breadcrumb">
    <span class="breadcrumb-current">Settings</span>
</div>
<div style="display:grid;grid-template-columns:1fr 1fr;gap:16px">
    <div class="glass-card" style="padding:20px">
        <div class="settings-title">General</div>
        <div class="settings-row">
            <div class="settings-row-info">
                <strong>Organization Name</strong>
                <span>Tanzania Muslim Catholic Students</span>
            </div>
            <button class="btn btn-secondary btn-sm">Edit</button>
        </div>
        <div class="settings-row">
            <div class="settings-row-info">
                <strong>Default Certificate Validity</strong>
                <span>2 years from issue date</span>
            </div>
            <button class="btn btn-secondary btn-sm">Edit</button>
        </div>
        <div class="settings-row" style="border-bottom:none">
            <div class="settings-row-info">
                <strong>Email Notifications</strong>
                <span>Send email when certificate is verified</span>
            </div>
            <button class="toggle on" onclick="this.classList.toggle('on')"></button>
        </div>
    </div>
    <div class="glass-card" style="padding:20px">
        <div class="settings-title">Security</div>
        <div class="settings-row">
            <div class="settings-row-info">
                <strong>Two-Factor Auth</strong>
                <span>Require 2FA for all admin users</span>
            </div>
            <button class="toggle" onclick="this.classList.toggle('on')"></button>
        </div>
        <div class="settings-row">
            <div class="settings-row-info">
                <strong>Session Timeout</strong>
                <span>30 minutes of inactivity</span>
            </div>
            <button class="btn btn-secondary btn-sm">Edit</button>
        </div>
        <div class="settings-row" style="border-bottom:none">
            <div class="settings-row-info">
                <strong>API Access</strong>
                <span>Enable REST API for integrations</span>
            </div>
            <button class="toggle on" onclick="this.classList.toggle('on')"></button>
        </div>
    </div>
</div>
<div style="margin-top:16px" class="glass-card" style="padding:20px">
    <div class="settings-title">Danger Zone</div>
    <div class="settings-row" style="border-bottom:none">
        <div class="settings-row-info">
            <strong>Reset Demo Data</strong>
            <span>Clear all sample data and start fresh</span>
        </div>
        <button class="btn btn-danger">Reset Data</button>
    </div>
</div>
<script>
document.querySelectorAll('.toggle').forEach(btn=>{
    btn.addEventListener('click',()=>btn.classList.toggle('on'));
});
</script>
@endsection
