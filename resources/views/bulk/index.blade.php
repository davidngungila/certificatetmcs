@extends('layouts.app')

@section('page-title', 'Bulk Import')

@section('content')
<div class="breadcrumb">
    <span class="breadcrumb-current">Bulk Import</span>
</div>
<div class="section-header" style="margin-bottom:16px">
    <div>
        <div class="section-title">Bulk Certificate Generation</div>
        <div class="section-subtitle">Import members and issue certificates in batch</div>
    </div>
</div>
<div style="display:grid;grid-template-columns:1fr 1fr;gap:16px">
    <div class="glass-card" style="padding:20px">
        <div class="section-header">
            <div>
                <div class="section-title">Upload File</div>
            </div>
        </div>
        <div class="upload-zone">
            <div class="upload-icon">📊</div>
            <div class="upload-title">Drop Excel file here</div>
            <div class="upload-sub">Supports .xlsx · Max 10MB · 500 records max</div>
            <button class="btn btn-primary" style="margin-top:12px">Choose File</button>
        </div>
        <div style="margin-top:16px;font-size:12.5px;color:var(--text-muted);display:flex;align-items:center;gap:6px">
            <span>📥</span>
            <a href="#" style="color:var(--accent);font-weight:700;text-decoration:none">Download import template (.xlsx)</a>
        </div>
    </div>
    <div class="glass-card" style="padding:20px">
        <div class="section-header">
            <div>
                <div class="section-title">Recent Imports</div>
            </div>
        </div>
        <div style="display:flex;flex-direction:column;gap:10px">
            <div style="padding:12px;border-radius:10px;background:rgba(16,185,129,0.06);border:1px solid rgba(16,185,129,0.15);display:flex;align-items:center;justify-content:space-between">
                <div>
                    <div style="font-weight:700;color:var(--navy)">SUA Leadership Cohort 2026</div>
                    <div style="font-size:12px;color:var(--text-muted)">152 certificates · Completed 2 days ago</div>
                </div>
                <button class="btn btn-secondary btn-sm">Download ZIP</button>
            </div>
            <div style="padding:12px;border-radius:10px;background:rgba(37,99,235,0.06);border:1px solid rgba(37,99,235,0.15);display:flex;align-items:center;justify-content:space-between">
                <div>
                    <div style="font-weight:700;color:var(--navy)">MUCE New Members · Q1 2026</div>
                    <div style="font-size:12px;color:var(--text-muted)">87 certificates · Completed 1 week ago</div>
                </div>
                <button class="btn btn-secondary btn-sm">Download ZIP</button>
            </div>
            <div style="padding:12px;border-radius:10px;background:rgba(245,158,11,0.06);border:1px solid rgba(245,158,11,0.15);display:flex;align-items:center;justify-content:space-between">
                <div>
                    <div style="font-weight:700;color:var(--navy)">UDSM Spiritual Coordinators</div>
                    <div style="font-size:12px;color:var(--text-muted)">23 certificates · Completed 2 weeks ago</div>
                </div>
                <button class="btn btn-secondary btn-sm">Download ZIP</button>
            </div>
        </div>
    </div>
</div>
<div style="margin-top:16px">
    <div class="glass-card" style="padding:20px">
        <div class="section-header">
            <div>
                <div class="section-title">Simulated Import (Demo)</div>
                <div class="section-subtitle">Click to preview bulk generation UI</div>
            </div>
        </div>
        <button class="btn btn-primary" onclick="showBulkProgress()" style="margin-top:8px">▶️ Start Demo Import</button>
        <div id="bulkProgressArea" style="display:none;margin-top:16px">
            <div style="font-weight:700;color:var(--navy);margin-bottom:8px" id="bulkStatus">Processing…</div>
            <div class="progress" style="height:10px">
                <div class="progress-fill" id="bulkProgressBar" style="width:0%;background:linear-gradient(90deg,#2563eb,#60a5fa)"></div>
            </div>
            <div style="margin-top:12px;font-size:12.5px;color:var(--text-muted)">
                <span id="bulkProgressNum">0</span> / 152 certificates generated
            </div>
            <button id="downloadZipBtn" class="btn btn-primary" style="margin-top:12px;display:none" disabled>⬇ Download ZIP</button>
        </div>
    </div>
</div>
<script>
function showBulkProgress(){
    document.getElementById('bulkProgressArea').style.display = 'block';
    let progress = 0;
    const interval = setInterval(()=>{
        progress = Math.min(progress + Math.random()*8 + 2, 100);
        const num = Math.round(progress/100*152);
        document.getElementById('bulkProgressNum').textContent = num;
        document.getElementById('bulkProgressBar').style.width = progress+'%';    
        document.getElementById('bulkStatus').textContent = progress >= 100       
            ? '✅ All certificates generated!' : `Processing… ${Math.round(progress)}% complete`;
        if(progress >= 100){
            clearInterval(interval);
            const btn = document.getElementById('downloadZipBtn');
            btn.disabled = false;
            btn.style.display = 'block';
            btn.textContent = '⬇ Download ZIP (152 certs)';
        }
    }, 180);
}
</script>
@endsection
