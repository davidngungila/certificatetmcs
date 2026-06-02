@extends('layouts.app')

@section('page-title', 'PDF Templates')

@section('content')
<div class="breadcrumb">
    <span class="breadcrumb-current">PDF Templates</span>
</div>
@if(session('success'))
    <div class="glass-card" style="margin-bottom: 16px; padding:12px 16px; display:flex; align-items:center; gap:10px; background:rgba(16,185,129,0.08); border-color:rgba(16,185,129,0.2);">
        <span style="font-size:18px">✅</span>
        <span style="font-weight:700; color:var(--emerald)">{{ session('success') }}</span>
    </div>
@endif
<div class="section-header" style="margin-bottom:16px">
    <div>
        <div class="section-title">Certificate Templates</div>
        <div class="section-subtitle">Manage PDF templates for all certificate types</div>
    </div>
    <div style="display:flex;gap:8px">
        <a href="{{ route('templates.designer') }}" class="btn btn-primary">🎨 Open Designer</a>
        <button class="btn btn-secondary" onclick="openModal('addTemplateModal')">➕ Add Template</button>
    </div>
</div>
@if($templates->isEmpty())
    <div class="glass-card" style="padding:32px;text-align:center">
        <div style="font-size:48px;margin-bottom:12px">📄</div>
        <div class="section-title" style="font-size:20px">No templates yet</div>
        <div class="section-subtitle" style="margin-bottom:16px">Create your first certificate template</div>
        <a href="{{ route('templates.designer') }}" class="btn btn-primary">Open Designer</a>
    </div>
@else
    <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:16px">
        @foreach($templates as $template)
            <div class="template-card">
                <div class="template-preview" style="background:linear-gradient(135deg,#0a1628,#1a3260);color:#fff;font-family:'Georgia',serif;font-size:18px;letter-spacing:2px;text-align:center;cursor:pointer" onclick="window.location.href='{{ route('templates.show', $template->id) }}'">{{ strtoupper($template->name) }}</div>
                <div class="template-body">
                    <div class="template-name">{{ $template->name }}</div>
                    <div class="template-desc">{{ $template->description ?? 'No description' }}</div>
                    <div style="display:flex;align-items:center;justify-content:space-between;margin-top:12px">
                        <div class="template-meta" style="display:flex;align-items:center;gap:8px">
                            <span class="badge
                                @if($template->status == 'active') badge-green
                                @else badge-navy
                                @endif">{{ ucfirst($template->status) }}</span>
                        </div>
                        <div style="display:flex;gap:8px">
                            <a href="{{ route('templates.show', $template->id) }}" class="btn btn-icon" title="View" style="width:32px;height:32px;padding:0">👁️</a>
                            <a href="{{ route('templates.edit', $template->id) }}" class="btn btn-icon" title="Edit" style="width:32px;height:32px;padding:0">✏️</a>
                            <form method="POST" action="{{ route('templates.destroy', $template->id) }}" style="display:inline" onsubmit="return confirm('Delete this template?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-icon" title="Delete" style="width:32px;height:32px;padding:0;color:var(--rose)">🗑️</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection

<!-- Add Template Modal -->
<div class="modal-overlay" id="addTemplateModal">
    <div class="modal">
        <div class="modal-header"><div class="modal-title">Add New Template</div><button class="modal-close" onclick="closeModal('addTemplateModal')">×</button></div>
        <form method="POST" action="{{ route('templates.store') }}">
            @csrf
            <div class="modal-body">
                <div class="form-grid" style="gap:14px">
                    <div class="form-group full">
                        <label>Template Name</label>
                        <input type="text" name="name" required placeholder="e.g., Special Achievement Award">
                    </div>
                    <div class="form-group full">
                        <label>Description</label>
                        <textarea name="description" placeholder="Brief description of this template" style="min-height:80px"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status">
                            <option value="active" selected>Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeModal('addTemplateModal')">Cancel</button>
                <button type="submit" class="btn btn-primary">Create Template</button>
            </div>
        </form>
    </div>
</div>
