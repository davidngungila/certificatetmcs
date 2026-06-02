@extends('layouts.app')

@section('title', 'Reports & Analytics')

@section('content')
<div class="breadcrumb">
    <span class="breadcrumb-current">Reports & Analytics</span>
</div>
<div class="section-header" style="margin-bottom:16px">
    <div>
        <div class="section-title">Analytics Overview</div>
        <div class="section-subtitle">Certificate issuance trends & verification stats</div>
    </div>
    <button class="btn btn-secondary">📤 Export Report</button>
</div>
<div style="display:grid;grid-template-columns:2fr 1fr;gap:16px">
    <div class="glass-card" style="padding:20px">
        <div class="section-title" style="margin-bottom:16px">Certificates Issued (Last 6 Months)</div>
        <div class="chart-bar-wrap">
            <div class="chart-bar-item">
                <div class="chart-bar-header">
                    <div class="chart-bar-label">Jan 2026</div>
                    <div class="chart-bar-value">512</div>
                </div>
                <div class="progress" style="height:28px;border-radius:8px">
                    <div class="progress-fill" style="width:85%;background:linear-gradient(90deg,#2563eb,#60a5fa)"></div>
                </div>
            </div>
            <div class="chart-bar-item">
                <div class="chart-bar-header">
                    <div class="chart-bar-label">Feb 2026</div>
                    <div class="chart-bar-value">642</div>
                </div>
                <div class="progress" style="height:28px;border-radius:8px">
                    <div class="progress-fill" style="width:95%;background:linear-gradient(90deg,#2563eb,#60a5fa)"></div>
                </div>
            </div>
            <div class="chart-bar-item">
                <div class="chart-bar-header">
                    <div class="chart-bar-label">Mar 2026</div>
                    <div class="chart-bar-value">489</div>
                </div>
                <div class="progress" style="height:28px;border-radius:8px">
                    <div class="progress-fill" style="width:76%;background:linear-gradient(90deg,#2563eb,#60a5fa)"></div>
                </div>
            </div>
            <div class="chart-bar-item">
                <div class="chart-bar-header">
                    <div class="chart-bar-label">Apr 2026</div>
                    <div class="chart-bar-value">721</div>
                </div>
                <div class="progress" style="height:28px;border-radius:8px">
                    <div class="progress-fill" style="width:100%;background:linear-gradient(90deg,#2563eb,#60a5fa)"></div>
                </div>
            </div>
            <div class="chart-bar-item">
                <div class="chart-bar-header">
                    <div class="chart-bar-label">May 2026</div>
                    <div class="chart-bar-value">598</div>
                </div>
                <div class="progress" style="height:28px;border-radius:8px">
                    <div class="progress-fill" style="width:83%;background:linear-gradient(90deg,#2563eb,#60a5fa)"></div>
                </div>
            </div>
            <div class="chart-bar-item">
                <div class="chart-bar-header">
                    <div class="chart-bar-label">Jun 2026</div>
                    <div class="chart-bar-value">289</div>
                </div>
                <div class="progress" style="height:28px;border-radius:8px">
                    <div class="progress-fill" style="width:40%;background:linear-gradient(90deg,#2563eb,#60a5fa)"></div>
                </div>
            </div>
        </div>
    </div>
    <div style="display:flex;flex-direction:column;gap:16px">
        <div class="glass-card" style="padding:20px">
            <div class="section-title" style="margin-bottom:12px">Verification Stats</div>
            <div style="display:flex;flex-direction:column;gap:12px">
                <div style="display:flex;justify-content:space-between;align-items:center">
                    <span style="font-size:13px;color:var(--text-secondary)">Total Verifications</span>
                    <span style="font-weight:800;color:var(--navy);font-size:20px">12,458</span>
                </div>
                <div style="display:flex;justify-content:space-between;align-items:center">
                    <span style="font-size:13px;color:var(--text-secondary)">Success Rate</span>
                    <span style="font-weight:800;color:#10b981">98.5%</span>
                </div>
                <div style="display:flex;justify-content:space-between;align-items:center">
                    <span style="font-size:13px;color:var(--text-secondary)">Failed Checks</span>
                    <span style="font-weight:800;color:#f43f5e">187</span>
                </div>
            </div>
        </div>
        <div class="glass-card" style="padding:20px">
            <div class="section-title" style="margin-bottom:12px">Top Universities</div>
            <div style="display:flex;flex-direction:column;gap:10px">
                <div style="display:flex;justify-content:space-between;align-items:center">
                    <span style="font-size:13px;color:var(--text-secondary)">UDSM</span>
                    <div class="report-mini-chart" style="gap:3px">
                        <div class="report-bar" style="height:30px;opacity:1"></div>
                        <div class="report-bar" style="height:24px"></div>
                        <div class="report-bar" style="height:36px;opacity:1"></div>
                        <div class="report-bar" style="height:28px"></div>
                        <div class="report-bar" style="height:32px;opacity:1"></div>
                        <div class="report-bar" style="height:20px"></div>
                    </div>
                    <span style="font-weight:700;color:var(--navy)">1,248</span>
                </div>
                <div style="display:flex;justify-content:space-between;align-items:center">
                    <span style="font-size:13px;color:var(--text-secondary)">SUA</span>
                    <span style="font-weight:700;color:var(--navy)">873</span>
                </div>
                <div style="display:flex;justify-content:space-between;align-items:center">
                    <span style="font-size:13px;color:var(--text-secondary)">MUCE</span>
                    <span style="font-weight:700;color:var(--navy)">642</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
