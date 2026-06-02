@extends('layouts.app')

@section('page-title', 'Certificate Registry')

@section('content')
<div class="breadcrumb">
    <span class="breadcrumb-current">Certificate Registry</span>
</div>

@if(session('success'))
    <div class="glass-card" style="margin-bottom: 16px; padding:12px 16px; display:flex; align-items:center; gap:10px; background:rgba(16,185,129,0.08); border-color:rgba(16,185,129,0.2);">
        <span style="font-size:18px">✅</span>
        <span style="font-weight:700; color:var(--emerald)">{{ session('success') }}</span>
    </div>
@endif

<div class="section-header" style="margin-bottom:16px">
    <div>
        <div class="section-title">All Certificates</div>
        <div class="section-subtitle">{{ $certificates->total() }} total certificates</div>
    </div>
    <button class="btn btn-primary" onclick="openModal('addCertModal')">📄 Issue Certificate</button>
</div>

<div class="glass-card">
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Certificate No.</th>
                    <th>Member</th>
                    <th>Type</th>
                    <th>Issued</th>
                    <th>Expires</th>
                    <th>Status</th>
                    <th style="text-align:right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($certificates->isEmpty())
                <tr>
                    <td colspan="7" style="text-align:center; padding:32px; color:var(--text-muted)">
                        No certificates yet. Issue your first one!
                    </td>
                </tr>
                @else
                @foreach($certificates as $cert)
                <tr>
                    <td><span style="font-family:monospace;">{{ $cert->certificate_number }}</span></td>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px">
                            <div class="avatar" style="background:linear-gradient(135deg, #2563eb, #8b5cf6)">
                                {{ strtoupper(substr($cert->member_name, 0, 2)) }}
                            </div>
                            <div>
                                <div style="font-weight:700;color:var(--navy)">{{ $cert->member_name }}</div>
                                @if($cert->member)
                                    <div style="font-size:12px;color:var(--text-muted)">{{ $cert->member->email ?? '' }}</div>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td>{{ $cert->certificate_type }}</td>
                    <td>{{ $cert->issue_date->format('M d, Y') }}</td>
                    <td>{{ $cert->expiry_date ? $cert->expiry_date->format('M d, Y') : '—' }}</td>
                    <td>
                        <span class="badge
                            @if($cert->status == 'issued') badge-green
                            @elseif($cert->status == 'revoked') badge-danger
                            @else badge-navy
                            @endif">{{ $cert->status }}</span>
                    </td>
                    <td style="text-align:right">
                        <a href="{{ route('certificates.show', $cert->id) }}" target="_blank" class="btn btn-ghost btn-sm">View PDF</a>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <div style="padding:12px 20px;display:flex;align-items:center;justify-content:space-between;border-top:1px solid var(--gray-100)">
        <div style="font-size:12.5px;color:var(--text-muted)">Showing {{ $certificates->firstItem() ?? 0 }}-{{ $certificates->lastItem() ?? 0 }} of {{ $certificates->total() }}</div>
        <div class="pagination">
            @if($certificates->onFirstPage())
            <button class="page-btn" disabled>←</button>
            @else
            <a href="{{ $certificates->previousPageUrl() }}" class="page-btn">←</a>
            @endif
            
            @foreach(range(1, min($certificates->lastPage(), 5)) as $page)
            <a href="{{ $certificates->url($page) }}" class="page-btn {{ $certificates->currentPage() == $page ? 'active' : '' }}">{{ $page }}</a>
            @endforeach
            
            @if($certificates->hasMorePages())
            <a href="{{ $certificates->nextPageUrl() }}" class="page-btn">→</a>
            @else
            <button class="page-btn" disabled>→</button>
            @endif
        </div>
    </div>
</div>

<!-- Add Certificate Modal -->
<div class="modal-overlay" id="addCertModal">
    <div class="modal">
        <div class="modal-header">
            <div class="modal-title">Issue Certificate</div>
            <button class="modal-close" onclick="closeModal('addCertModal')">×</button>
        </div>
        <form method="POST" action="{{ route('certificates.store') }}">
            @csrf
            <div class="modal-body">
                <div class="form-grid">
                    <div class="form-group full">
                        <label>Member (Optional)</label>
                        <select name="member_id">
                            <option value="">Select from existing members</option>
                            @foreach($members as $member)
                            <option value="{{ $member->id }}">{{ $member->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group full">
                        <label>Member Name</label>
                        <input type="text" name="member_name" required placeholder="Name to appear on certificate">
                    </div>
                    <div class="form-group">
                        <label>Certificate Type</label>
                        <select name="certificate_type" required>
                            <option>Membership</option>
                            <option>Leadership</option>
                            <option>Spiritual Coordinator</option>
                            <option>Community Group Lead</option>
                            <option>Achievement Award</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Issue Date</label>
                        <input type="date" name="issue_date" value="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="form-group">
                        <label>Expiry Date (Optional)</label>
                        <input type="date" name="expiry_date">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeModal('addCertModal')">Cancel</button>
                <button type="submit" class="btn btn-primary">Issue Certificate</button>
            </div>
        </form>
    </div>
</div>
@endsection
