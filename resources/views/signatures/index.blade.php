@extends('layouts.app')

@section('page-title', 'Digital Signatures')

@section('content')
<div class="breadcrumb">
    <span class="breadcrumb-current">Digital Signatures</span>
</div>
<div class="section-header" style="margin-bottom:16px">
    <div>
        <div class="section-title">Digital Signatures</div>
        <div class="section-subtitle">Manage authorized signatories for certificates</div>
    </div>
    <button class="btn btn-primary" onclick="openModal('addSigModal')">✍️ Upload Signature</button>
</div>
<div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:16px">
    <div class="sig-card filled">
        <div class="sig-preview">Rev. Fr. Josephat Mwenda</div>
        <div style="margin-top:12px;text-align:center">
            <div class="sig-name">Rev. Fr. Josephat Mwenda</div>
            <div class="sig-role">National Chaplain</div>
        </div>
        <div style="margin-top:12px;display:flex;gap:8px;justify-content:center">
            <button class="btn btn-secondary btn-sm">Edit</button>
            <button class="btn btn-danger btn-sm">Remove</button>
        </div>
    </div>
    <div class="sig-card filled">
        <div class="sig-preview">Dr. Mary Nyerere</div>
        <div style="margin-top:12px;text-align:center">
            <div class="sig-name">Dr. Mary Nyerere</div>
            <div class="sig-role">National Coordinator</div>
        </div>
        <div style="margin-top:12px;display:flex;gap:8px;justify-content:center">
            <button class="btn btn-secondary btn-sm">Edit</button>
            <button class="btn btn-danger btn-sm">Remove</button>
        </div>
    </div>
    <div class="sig-card" onclick="openModal('addSigModal')">
        <div style="display:flex;flex-direction:column;align-items:center;justify-content:center;height:100%;padding:30px;color:var(--text-muted);cursor:pointer">
            <div style="font-size:40px;margin-bottom:8px">+</div>
            <div style="font-weight:700">Add New Signatory</div>
            <div style="font-size:12px;margin-top:4px">Upload signature PNG</div>
        </div>
    </div>
</div>
@endsection
