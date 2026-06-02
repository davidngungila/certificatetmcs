@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="breadcrumb">
    <span class="breadcrumb-current">Dashboard</span>
</div>

<div class="stats-grid">
    <div class="stat-card" style="--card-accent:linear-gradient(90deg,#2563eb,#60a5fa);--icon-bg:rgba(37,99,235,0.08)">
        <div class="stat-icon">
            <svg fill="none" stroke="#2563eb" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 0 0-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 0 15.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 0 19.288 0"/>
            </svg>
        </div>
        <div class="stat-value">1,248</div>
        <div class="stat-label">Total Members</div>
        <div class="stat-change up">↑ +142 this month</div>
    </div>
    <div class="stat-card" style="--card-accent:linear-gradient(90deg,#f59e0b,#fcd34d);--icon-bg:rgba(245,158,11,0.08)">
        <div class="stat-icon">
            <svg fill="none" stroke="#f59e0b" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 0 01.946-.806 3.42 3.42 0 0 14.438 0 3.42 3.42 0 0 01.946.806 3.42 3.42 0 0 13.138 3.138 3.42 3.42 0 0 0.806 1.946 3.42 3.42 0 0 10 4.438 3.42 3.42 0 0 0-.806 1.946 3.42 3.42 0 0 1-3.138 3.138 3.42 3.42 0 0 0-1.946.806 3.42 3.42 0 0 1-4.438 0 3.42 3.42 0 0 0-1.946-.806 3.42 3.42 0 0 1-3.138-3.138 3.42 3.42 0 0 0-.806-1.946 3.42 3.42 0 0 10-4.438 3.42 3.42 0 0 0.806-1.946 3.42 3.42 0 0 13.138-3.138z"/>
            </svg>
        </div>
        <div class="stat-value">3,847</div>
        <div class="stat-label">Certs Issued</div>
        <div class="stat-change up">↑ +289 this month</div>
    </div>
    <div class="stat-card" style="--card-accent:linear-gradient(90deg,#10b981,#34d399);--icon-bg:rgba(16,185,129,0.08)">
        <div class="stat-icon">
            <svg fill="none" stroke="#10b981" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0 112 2.944a11.955 11.955 0 0 1-8.618 3.04A12.02 12.02 0 0 03 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
            </svg>
        </div>
        <div class="stat-value">3,791</div>
        <div class="stat-label">Verified Valid</div>
        <div class="stat-change up">98.5% validity rate</div>
    </div>
    <div class="stat-card" style="--card-accent:linear-gradient(90deg,#8b5cf6,#a78bfa);--icon-bg:rgba(139,92,246,0.08)">
        <div class="stat-icon">
            <svg fill="none" stroke="#8b5cf6" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <div class="stat-value">5</div>
        <div class="stat-label">Pending Queue</div>
        <div class="stat-change down">Needs attention</div>
    </div>
</div>

<div style="display:grid;grid-template-columns:2fr 1fr;gap:16px;margin-top:16px">
    <div class="glass-card" style="padding:20px">
        <div class="section-header">
            <div>
                <div class="section-title">Recent Activity</div>
                <div class="section-subtitle">Last 24h</div>
            </div>
        </div>
        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-left">
                    <div class="timeline-dot" style="background:rgba(16,185,129,0.12);color:#10b981">✅</div>
                    <div class="timeline-line"></div>
                </div>
                <div class="timeline-content">
                    <div class="timeline-title">Certificate verified (TMCS-2026-08472)</div>
                    <div class="timeline-desc">Public verification check passed · Valid certificate</div>
                    <div class="timeline-time">3 mins ago</div>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-left">
                    <div class="timeline-dot" style="background:rgba(37,99,235,0.12);color:#2563eb">📄</div>
                    <div class="timeline-line"></div>
                </div>
                <div class="timeline-content">
                    <div class="timeline-title">Certificate issued to Amina Juma</div>
                    <div class="timeline-desc">Leadership Certificate · UDSM</div>
                    <div class="timeline-time">18 mins ago</div>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-left">
                    <div class="timeline-dot" style="background:rgba(245,158,11,0.12);color:#f59e0b">👤</div>
                    <div class="timeline-line"></div>
                </div>
                <div class="timeline-content">
                    <div class="timeline-title">New member registered</div>
                    <div class="timeline-desc">Kelvin David · MUCE</div>
                    <div class="timeline-time">1 hour ago</div>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-left">
                    <div class="timeline-dot" style="background:rgba(244,63,94,0.12);color:#f43f5e">⚠️</div>
                    <div class="timeline-line"></div>
                </div>
                <div class="timeline-content">
                    <div class="timeline-title">Certificate marked as revoked</div>
                    <div class="timeline-desc">TMCS-2025-78211 · Manual action</div>
                    <div class="timeline-time">3 hours ago</div>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-left">
                    <div class="timeline-dot" style="background:rgba(139,92,246,0.12);color:#8b5cf6">📦</div>
                </div>
                <div class="timeline-content">
                    <div class="timeline-title">Bulk import completed</div>
                    <div class="timeline-desc">28 members imported from SUA</div>
                    <div class="timeline-time">Yesterday</div>
                </div>
            </div>
        </div>
    </div>
    <div style="display:flex;flex-direction:column;gap:16px">
        <div class="glass-card" style="padding:20px">
            <div class="section-header">
                <div>
                    <div class="section-title">Quick Actions</div>
                </div>
            </div>
            <div style="display:grid;gap:10px">
                <button class="btn btn-primary" onclick="openModal('issueCertModal')">🎓 Issue Certificate</button>
                <button class="btn btn-secondary" onclick="openModal('addMemberModal')">👤 Add Member</button>
                <button class="btn btn-secondary" onclick="openModal('bulkModal')">📥 Bulk Import</button>
            </div>
        </div>
        <div class="glass-card" style="padding:20px">
            <div class="section-header">
                <div>
                    <div class="section-title">Cert Type Breakdown</div>
                </div>
            </div>
            <div style="display:flex;align-items:center;gap:16px;margin-top:8px">
                <div class="mini-donut"></div>
                <div style="flex:1">
                    <div class="queue-item">
                        <div class="queue-name">
                            <span class="badge-dot" style="width:8px;height:8px;border-radius:50%;background:#2563eb;display:inline-block;margin-right:6px"></span>
                            Membership
                        </div>
                        <div class="queue-count">2,142</div>
                    </div>
                    <div class="queue-item">
                        <div class="queue-name">
                            <span class="badge-dot" style="width:8px;height:8px;border-radius:50%;background:#f59e0b;display:inline-block;margin-right:6px"></span>
                            Leadership
                        </div>
                        <div class="queue-count">1,208</div>
                    </div>
                    <div class="queue-item">
                        <div class="queue-name">
                            <span class="badge-dot" style="width:8px;height:8px;border-radius:50%;background:#10b981;display:inline-block;margin-right:6px"></span>
                            Spiritual
                        </div>
                        <div class="queue-count">497</div>
                    </div>
                </div>
            </div>
            <div class="donut-label" style="margin-top:8px">Total: 3,847 certificates</div>
        </div>
    </div>
</div>
@endsection
