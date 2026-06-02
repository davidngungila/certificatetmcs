@extends('layouts.app')

@section('title', 'Certificate Verification')

@section('content')
<div class="breadcrumb">
    <span class="breadcrumb-current">Certificate Verification</span>
</div>
<div class="verify-card">
    <div style="text-align:center;margin-bottom:20px">
        <div style="font-size:48px;margin-bottom:8px">🔍</div>
        <div style="font-size:20px;font-weight:800;color:var(--navy)">Verify Certificate</div>
        <div style="font-size:13px;color:var(--text-muted);margin-top:4px">Enter certificate number to check validity</div>
    </div>
    <div style="display:flex;gap:10px">
        <input id="certNumInput" placeholder="e.g. TMCS-2026-08472" style="flex:1;padding:12px 16px;border-radius:10px;border:1.5px solid var(--gray-200);font-size:14px;font-family:inherit;outline:none">
        <button class="btn btn-primary" onclick="verifyCertificate()">Verify</button>
    </div>

    <div id="verifyResult" class="verify-result">
        <div class="verify-status valid">
            <span class="verify-status-icon" style="font-size:24px">✅</span>
            <div class="verify-status-text">
                <strong>Valid Certificate</strong>
                <div style="font-size:12.5px;color:var(--text-muted)">This certificate is authentic and active</div>
            </div>
        </div>
        <div class="verify-fields">
            <div class="verify-field">
                <div class="verify-field-label">Certificate #</div>
                <div class="verify-field-value">TMCS-2026-08472</div>
            </div>
            <div class="verify-field">
                <div class="verify-field-label">Member</div>
                <div class="verify-field-value">Amina Juma</div>
            </div>
            <div class="verify-field">
                <div class="verify-field-label">University</div>
                <div class="verify-field-value">UDSM</div>
            </div>
            <div class="verify-field">
                <div class="verify-field-label">Type</div>
                <div class="verify-field-value">Leadership Certificate</div>
            </div>
            <div class="verify-field">
                <div class="verify-field-label">Issue Date</div>
                <div class="verify-field-value">January 15, 2025</div>
            </div>
            <div class="verify-field">
                <div class="verify-field-label">Valid Until</div>
                <div class="verify-field-value">January 15, 2027</div>
            </div>
        </div>
    </div>
</div>
<script>
function verifyCertificate(){
    const val = document.getElementById('certNumInput').value.trim();
    const r = document.getElementById('verifyResult');
    r.classList.add('show');
    r.scrollIntoView({behavior:'smooth', block:'nearest'});
}
</script>
@endsection
