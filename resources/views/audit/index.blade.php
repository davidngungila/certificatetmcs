@extends('layouts.app')

@section('title', 'Audit Logs')

@section('content')
<div class="breadcrumb">
    <span class="breadcrumb-current">Audit Logs</span>
</div>
<div class="section-header" style="margin-bottom:16px">
    <div>
        <div class="section-title">System Audit Trail</div>
        <div class="section-subtitle">Complete log of all actions</div>
    </div>
    <button class="btn btn-secondary">📥 Export Logs</button>
</div>
<div class="glass-card" style="padding:0">
    <div style="padding:16px 20px;display:flex;align-items:center;gap:12px;flex-wrap:wrap;border-bottom:1px solid var(--gray-100)">
        <select style="padding:8px 14px;border-radius:10px;border:1px solid var(--gray-200);font-family:inherit;background:#fff">
            <option>All Actions</option>
            <option>Certificate Issued</option>
            <option>Certificate Revoked</option>
            <option>Member Added</option>
            <option>User Login</option>
        </select>
        <select style="padding:8px 14px;border-radius:10px;border:1px solid var(--gray-200);font-family:inherit;background:#fff">
            <option>All Users</option>
            <option>Sr. Admin</option>
            <option>Operator UDSM</option>
        </select>
    </div>
    <div style="display:flex;flex-direction:column">
        <div class="audit-item">
            <div class="audit-type-dot" style="background:#2563eb"></div>
            <div class="audit-body">
                <div class="audit-action">📄 Certificate issued: TMCS-2026-08472</div>
                <div class="audit-meta">By Sr. Admin · 18 mins ago · IP: 192.168.1.1</div>
            </div>
        </div>
        <div class="audit-item">
            <div class="audit-type-dot" style="background:#10b981"></div>
            <div class="audit-body">
                <div class="audit-action">👤 Member registered: Kelvin David</div>
                <div class="audit-meta">By Operator UDSM · 1 hour ago · IP: 192.168.1.2</div>
            </div>
        </div>
        <div class="audit-item">
            <div class="audit-type-dot" style="background:#f43f5e"></div>
            <div class="audit-body">
                <div class="audit-action">⚠️ Certificate revoked: TMCS-2025-78211</div>
                <div class="audit-meta">By Sr. Admin · 3 hours ago · IP: 192.168.1.1</div>
            </div>
        </div>
        <div class="audit-item">
            <div class="audit-type-dot" style="background:#8b5cf6"></div>
            <div class="audit-body">
                <div class="audit-action">🔐 User logged in: Operator UDSM</div>
                <div class="audit-meta">4 hours ago · IP: 192.168.1.2</div>
            </div>
        </div>
        <div class="audit-item">
            <div class="audit-type-dot" style="background:#f59e0b"></div>
            <div class="audit-body">
                <div class="audit-action">📦 Bulk import completed (28 records)</div>
                <div class="audit-meta">By Sr. Admin · Yesterday · IP: 192.168.1.1</div>
            </div>
        </div>
    </div>
</div>
<div style="display:flex;justify-content:flex-end;margin-top:16px">
    <div class="pagination">
        <button class="page-btn">←</button>
        <button class="page-btn active">1</button>
        <button class="page-btn">2</button>
        <button class="page-btn">3</button>
        <button class="page-btn">→</button>
    </div>
</div>
@endsection
