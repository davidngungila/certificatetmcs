@extends('layouts.app')

@section('page-title', $template->name)

@section('content')
<div class="breadcrumb">
    <a href="{{ route('templates.index') }}">Templates</a>
    <span class="breadcrumb-sep">/</span>
    <span class="breadcrumb-current">{{ $template->name }}</span>
</div>
<div class="section-header" style="margin-bottom:16px">
    <div>
        <div class="section-title">{{ $template->name }}</div>
        <div class="section-subtitle">{{ $template->description ?? 'No description' }}</div>
    </div>
    <div style="display:flex;gap:8px">
        <a href="{{ route('templates.edit', $template->id) }}" class="btn btn-primary">✏️ Edit in Designer</a>
        <a href="{{ route('templates.index') }}" class="btn btn-secondary">⬅️ Back</a>
    </div>
</div>
<div class="glass-card" style="padding:20px">
    <label style="display:block; font-size:12.5px; font-weight:700; color:var(--navy); letter-spacing:0.2px; margin-bottom:12px">Template Preview</label>
    <div style="display:flex; justify-content:center; padding:20px">
        <div style="width:100%; max-width:900px; aspect-ratio: 297/210; background:linear-gradient(135deg,#0a1628,#1a3260); border:8px solid #f59e0b; display:flex; flex-direction:column; align-items:center; justify-content:center; padding:40px; color:#fff; font-family:Georgia,serif; text-align:center;">
            <div style="font-size:42px; color:#f59e0b; text-transform:uppercase; letter-spacing:3px; margin-bottom:20px">{{ strtoupper($template->name) }}</div>
            <div style="font-size:18px; color:rgba(255,255,255,0.8); margin-bottom:40px">This certificate is proudly presented to</div>
            <div style="font-size:36px; font-weight:bold; margin-bottom:30px">Jane Doe</div>
            <div style="font-size:24px; color:#f59e0b; margin-bottom:20px">Sample Certificate</div>
            <div style="font-size:16px; color:rgba(255,255,255,0.7); margin-top:40px">Issued on: {{ date('F d, Y') }}</div>
        </div>
    </div>
</div>
@endsection
