@extends('layouts.app')

@section('title', 'Certificates')

@section('content')
<div class="breadcrumb">
    <span class="breadcrumb-current">Certificates</span>
</div>
<div class="section-header" style="margin-bottom:16px">
    <div>
        <div class="section-title">Certificate Registry</div>
        <div class="section-subtitle">3,847 total certificates · 5 pending review</div>
    </div>
    <button class="btn btn-primary" onclick="openModal('issueCertModal')">🎓 Issue Certificate</button>
</div>
<div class="tabs">
    <button class="tab active">All</button>
    <button class="tab">Issued</button>
    <button class="tab">Pending</button>
    <button class="tab">Revoked</button>
</div>
<div class="glass-card">
    <div style="padding:16px 20px;display:flex;align-items:center;gap:12px;flex-wrap:wrap;border-bottom:1px solid var(--gray-100)">
        <div style="flex:1;min-width:200px;display:flex;align-items:center;gap:10px;background:var(--gray-100);border-radius:10px;padding:8px 14px;border:1px solid transparent">
            <svg width="16" height="16" fill="none" stroke="var(--text-muted)" viewBox="0 0 24 24">
                <circle cx="11" cy="11" r="8" stroke-width="2"/>
                <path d="m21 21-4.35-4.35" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <input placeholder="Search certificate number or member name…" style="background:transparent;border:none;outline:none;flex:1;font-family:inherit;color:var(--text-primary)">
        </div>
        <select style="padding:8px 14px;border-radius:10px;border:1px solid var(--gray-200);font-family:inherit;background:#fff">
            <option>All Types</option>
            <option>Membership</option>
            <option>Leadership</option>
            <option>Spiritual</option>
        </select>
        <select style="padding:8px 14px;border-radius:10px;border:1px solid var(--gray-200);font-family:inherit;background:#fff">
            <option>All Status</option>
            <option>Valid</option>
            <option>Expired</option>
            <option>Revoked</option>
        </select>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Certificate</th>
                    <th>Member</th>
                    <th>Type</th>
                    <th>Issue Date</th>
                    <th>Valid Until</th>
                    <th>Status</th>
                    <th style="text-align:right">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px">
                            <div style="width:40px;height:40px;border-radius:10px;background:linear-gradient(135deg,#f59e0b,#fcd34d);display:flex;align-items:center;justify-content:center;font-size:18px">🎓</div>
                            <div>
                                <div style="font-weight:700;color:var(--navy)">TMCS-2026-08472</div>
                                <div style="font-size:12px;color:var(--text-muted)">QR verified 3 mins ago</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px">
                            <div class="avatar">AJ</div>
                            <div>
                                <div style="font-weight:700;color:var(--navy)">Amina Juma</div>
                                <div style="font-size:12px;color:var(--text-muted)">UDSM</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge badge-gold">Leadership</span></td>
                    <td>Jan 15, 2025</td>
                    <td>Jan 15, 2027</td>
                    <td><span class="badge badge-green">Valid</span></td>
                    <td style="text-align:right">
                        <button class="btn btn-ghost btn-sm">View</button>
                        <button class="btn btn-secondary btn-sm">Download</button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px">
                            <div style="width:40px;height:40px;border-radius:10px;background:linear-gradient(135deg,#2563eb,#60a5fa);display:flex;align-items:center;justify-content:center;font-size:18px">📄</div>
                            <div>
                                <div style="font-weight:700;color:var(--navy)">TMCS-2025-78211</div>
                                <div style="font-size:12px;color:var(--text-muted)">Revoked manually</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px">
                            <div class="avatar">JN</div>
                            <div>
                                <div style="font-weight:700;color:var(--navy)">John Nyerere</div>
                                <div style="font-size:12px;color:var(--text-muted)">IFM</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge badge-blue">Membership</span></td>
                    <td>Jun 22, 2023</td>
                    <td>Jun 22, 2026</td>
                    <td><span class="badge badge-rose">Revoked</span></td>
                    <td style="text-align:right">
                        <button class="btn btn-ghost btn-sm">View</button>
                        <button class="btn btn-secondary btn-sm">Details</button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px">
                            <div style="width:40px;height:40px;border-radius:10px;background:linear-gradient(135deg,#10b981,#34d399);display:flex;align-items:center;justify-content:center;font-size:18px">🕊️</div>
                            <div>
                                <div style="font-weight:700;color:var(--navy)">TMCS-2026-08461</div>
                                <div style="font-size:12px;color:var(--text-muted)">Verified 12 times</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px">
                            <div class="avatar">SM</div>
                            <div>
                                <div style="font-weight:700;color:var(--navy)">Sarah Mushi</div>
                                <div style="font-size:12px;color:var(--text-muted)">SUA</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge badge-green">Spiritual Coordinator</span></td>
                    <td>Mar 10, 2025</td>
                    <td>Mar 10, 2027</td>
                    <td><span class="badge badge-green">Valid</span></td>
                    <td style="text-align:right">
                        <button class="btn btn-ghost btn-sm">View</button>
                        <button class="btn btn-secondary btn-sm">Download</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div style="padding:12px 20px;display:flex;align-items:center;justify-content:space-between;border-top:1px solid var(--gray-100)">
        <div style="font-size:12.5px;color:var(--text-muted)">Showing 1-3 of 3,847</div>
        <div class="pagination">
            <button class="page-btn">←</button>
            <button class="page-btn active">1</button>
            <button class="page-btn">2</button>
            <button class="page-btn">3</button>
            <span class="page-info">…</span>
            <button class="page-btn">385</button>
            <button class="page-btn">→</button>
        </div>
    </div>
</div>
@endsection
