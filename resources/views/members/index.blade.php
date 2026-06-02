@extends('layouts.app')

@section('page-title', 'Member Registry')

@section('content')
<div class="breadcrumb">
    <span class="breadcrumb-current">Member Registry</span>
</div>

@if(session('success'))
    <div class="glass-card" style="margin-bottom: 16px; padding:12px 16px; display:flex; align-items:center; gap:10px; background:rgba(16,185,129,0.08); border-color:rgba(16,185,129,0.2);">
        <span style="font-size:18px">✅</span>
        <span style="font-weight:700; color:var(--emerald)">{{ session('success') }}</span>
    </div>
@endif
@if(session('error'))
    <div class="glass-card" style="margin-bottom: 16px; padding:12px 16px; display:flex; align-items:center; gap:10px; background:rgba(239,68,68,0.08); border-color:rgba(239,68,68,0.2);">
        <span style="font-size:18px">⚠️</span>
        <span style="font-weight:700; color:var(--rose)">{{ session('error') }}</span>
    </div>
@endif

<div class="section-header" style="margin-bottom:16px">
    <div>
        <div class="section-title">All Members</div>
        <div class="section-subtitle">{{ $members->total() }} total members</div>
    </div>
    <div style="display:flex; gap:8px">
        <button class="btn btn-secondary" onclick="openModal('bulkImportModal')">📥 Bulk Import</button>
        <button class="btn btn-primary" onclick="openModal('addMemberModal')">👤 Add Member</button>
    </div>
</div>

<div class="glass-card">
    <div style="padding:16px 20px;display:flex;align-items:center;gap:12px;flex-wrap:wrap;border-bottom:1px solid var(--gray-100)">
        <div style="flex:1;min-width:200px;display:flex;align-items:center;gap:10px;background:var(--gray-100);border-radius:10px;padding:8px 14px;border:1px solid transparent">
            <svg width="16" height="16" fill="none" stroke="var(--text-muted)" viewBox="0 0 24 24">
                <circle cx="11" cy="11" r="8" stroke-width="2"/>
                <path d="m21 21-4.35-4.35" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <input placeholder="Search name, student ID, email…" style="background:transparent;border:none;outline:none;flex:1;font-family:inherit;color:var(--text-primary)">
        </div>
        <form method="GET" action="{{ route('members.index') }}" id="filterForm" style="display:flex; gap:8px">
            <select name="university" onchange="document.getElementById('filterForm').submit()" style="padding:8px 14px;border-radius:10px;border:1px solid var(--gray-200);font-family:inherit;background:#fff">
                <option value="">All Universities</option>
                @foreach($universities as $u)
                <option value="{{ $u }}" {{ request('university') == $u ? 'selected' : '' }}>{{ $u }}</option>
                @endforeach
            </select>
            <select name="category" onchange="document.getElementById('filterForm').submit()" style="padding:8px 14px;border-radius:10px;border:1px solid var(--gray-200);font-family:inherit;background:#fff">
                <option value="">All Categories</option>
                @foreach($categories as $c)
                <option value="{{ $c }}" {{ request('category') == $c ? 'selected' : '' }}>{{ $c }}</option>
                @endforeach
            </select>
        </form>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Member</th>
                    <th>Student ID</th>
                    <th>University</th>
                    <th>Category</th>
                    <th>Joined</th>
                    <th style="text-align:right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($members->isEmpty())
                <tr>
                    <td colspan="6" style="text-align:center; padding:32px; color:var(--text-muted)">
                        No members yet. Add your first member!
                    </td>
                </tr>
                @else
                @foreach($members as $member)
                <tr>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px">
                            <div class="avatar" style="background:linear-gradient(135deg, #2563eb, #8b5cf6)">
                                {{ strtoupper(substr($member->name, 0, 2)) }}
                            </div>
                            <div>
                                <div style="font-weight:700;color:var(--navy)">{{ $member->name }}</div>
                                <div style="font-size:12px;color:var(--text-muted)">{{ $member->email ?? '—' }}</div>
                            </div>
                        </div>
                    </td>
                    <td>{{ $member->student_id ?? '—' }}</td>
                    <td>{{ $member->university ?? '—' }}</td>
                    <td>
                        <span class="badge
                            @if($member->category == 'Student Member') badge-green
                            @elseif($member->category == 'Leadership') badge-blue
                            @elseif($member->category == 'Alumni') badge-violet
                            @else badge-navy
                            @endif">{{ $member->category }}</span>
                    </td>
                    <td>{{ $member->joined_at ? $member->joined_at->format('M d, Y') : '—' }}</td>
                    <td style="text-align:right">
                        <button class="btn btn-ghost btn-sm">View</button>
                        <button class="btn btn-secondary btn-sm" onclick="openModal('issueCertModal'); document.getElementById('issueCertName').value='{{ $member->name }}'">Issue Cert</button>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <div style="padding:12px 20px;display:flex;align-items:center;justify-content:space-between;border-top:1px solid var(--gray-100)">
        <div style="font-size:12.5px;color:var(--text-muted)">Showing {{ $members->firstItem() ?? 0 }}-{{ $members->lastItem() ?? 0 }} of {{ $members->total() }}</div>
        <div class="pagination">
            @if($members->onFirstPage())
            <button class="page-btn" disabled>←</button>
            @else
            <a href="{{ $members->previousPageUrl() }}" class="page-btn">←</a>
            @endif
            
            @foreach(range(1, min($members->lastPage(), 5)) as $page)
            <a href="{{ $members->url($page) }}" class="page-btn {{ $members->currentPage() == $page ? 'active' : '' }}">{{ $page }}</a>
            @endforeach
            
            @if($members->hasMorePages())
            <a href="{{ $members->nextPageUrl() }}" class="page-btn">→</a>
            @else
            <button class="page-btn" disabled>→</button>
            @endif
        </div>
    </div>
</div>

<!-- Add Member Modal -->
<div class="modal-overlay" id="addMemberModal">
    <div class="modal">
        <div class="modal-header">
            <div class="modal-title">Add New Member</div>
            <button class="modal-close" onclick="closeModal('addMemberModal')">×</button>
        </div>
        <form method="POST" action="{{ route('members.store') }}">
            @csrf
            <div class="modal-body">
                <div class="form-grid">
                    <div class="form-group full">
                        <label>Name</label>
                        <input type="text" name="name" required placeholder="Member full name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Email address">
                    </div>
                    <div class="form-group">
                        <label>Student ID</label>
                        <input type="text" name="student_id" placeholder="Student/Registration ID">
                    </div>
                    <div class="form-group">
                        <label>University</label>
                        <select name="university">
                            <option value="">Select...</option>
                            @foreach($universities as $u)
                            <option value="{{ $u }}">{{ $u }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category" required>
                            @foreach($categories as $c)
                            <option value="{{ $c }}">{{ $c }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Joined On</label>
                        <input type="date" name="joined_at">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeModal('addMemberModal')">Cancel</button>
                <button type="submit" class="btn btn-primary">Add Member</button>
            </div>
        </form>
    </div>
</div>

<!-- Bulk Import Modal -->
<div class="modal-overlay" id="bulkImportModal">
    <div class="modal">
        <div class="modal-header">
            <div class="modal-title">Bulk Import Members</div>
            <button class="modal-close" onclick="closeModal('bulkImportModal')">×</button>
        </div>
        <form method="POST" action="{{ route('members.bulk-import') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <p style="margin-bottom:16px; font-size:13px; color:var(--text-muted)">
                    Upload an Excel or CSV file with the following columns:
                    <strong>Name, Email, Student ID, University, Category, Joined Date</strong>
                </p>
                <div class="upload-zone" onclick="document.getElementById('bulkFileInput').click()">
                    <div class="upload-icon">📊</div>
                    <div class="upload-title">Click or drag Excel/CSV here</div>
                    <div class="upload-sub" id="bulkFileName">Supports XLSX, CSV (max 5MB)</div>
                    <input type="file" id="bulkFileInput" name="excel_file" accept=".xlsx,.xls,.csv" style="display:none" onchange="document.getElementById('bulkFileName').textContent = this.files[0].name">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeModal('bulkImportModal')">Cancel</button>
                <button type="submit" class="btn btn-primary">Upload & Import</button>
            </div>
        </form>
    </div>
</div>

<!-- Issue Certificate Modal -->
<div class="modal-overlay" id="issueCertModal">
    <div class="modal">
        <div class="modal-header">
            <div class="modal-title">Issue Certificate</div>
            <button class="modal-close" onclick="closeModal('issueCertModal')">×</button>
        </div>
        <form method="POST" action="{{ route('certificates.generate-pdf') }}">
            @csrf
            <div class="modal-body">
                <div class="form-grid">
                    <div class="form-group full">
                        <label>Member Name</label>
                        <input type="text" id="issueCertName" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Certificate Type</label>
                        <select name="type" required>
                            <option>Membership</option>
                            <option>Leadership</option>
                            <option>Spiritual Coordinator</option>
                            <option>Community Group Lead</option>
                            <option>Achievement Award</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Issue Date</label>
                        <input type="date" name="date" value="{{ date('Y-m-d') }}" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeModal('issueCertModal')">Cancel</button>
                <button type="submit" class="btn btn-primary">Generate & Download</button>
            </div>
        </form>
    </div>
</div>
@endsection
