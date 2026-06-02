@extends('layouts.app')

@section('page-title', 'PDF Templates')

@section('content')
<div class="breadcrumb">
    <span class="breadcrumb-current">PDF Templates</span>
</div>
<div class="section-header" style="margin-bottom:16px">
    <div>
        <div class="section-title">Certificate Templates</div>
        <div class="section-subtitle">Manage PDF templates for all certificate types</div>
    </div>
    <button class="btn btn-primary" onclick="openModal('addTemplateModal')">➕ Add Template</button>
</div>
<div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:16px">
    <!-- Template 1 -->
    <div class="template-card">
        <div class="template-preview" style="background:linear-gradient(135deg,#0a1628,#1a3260);color:#fff;font-family:'Georgia',serif;font-size:18px;letter-spacing:2px;text-align:center;cursor:pointer" onclick="viewTemplate(1)">MEMBERSHIP<br>CERTIFICATE</div>
        <div class="template-body">
            <div class="template-name">Membership Certificate</div>
            <div class="template-desc">Standard membership cert with seal</div>
            <div style="display:flex;align-items:center;justify-content:space-between;margin-top:12px">
                <div class="template-meta" style="display:flex;align-items:center;gap:8px">
                    <span class="badge badge-green">Active</span>
                    <span style="font-size:12px;color:var(--text-muted)">2,142 issued</span>
                </div>
                <div style="display:flex;gap:8px">
                    <button class="btn btn-icon" title="View" onclick="viewTemplate(1)" style="width:32px;height:32px;padding:0">👁️</button>
                    <button class="btn btn-icon" title="Edit" style="width:32px;height:32px;padding:0">✏️</button>
                    <button class="btn btn-icon" title="Delete" style="width:32px;height:32px;padding:0;color:var(--rose)">🗑️</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Template 2 -->
    <div class="template-card">
        <div class="template-preview" style="background:linear-gradient(135deg,#f59e0b,#d97706);color:#fff;font-family:'Georgia',serif;font-size:18px;letter-spacing:2px;text-align:center;cursor:pointer" onclick="viewTemplate(2)">LEADERSHIP<br>CERTIFICATE</div>
        <div class="template-body">
            <div class="template-name">Kamati Tendaji Leadership</div>
            <div class="template-desc">Leadership & executive positions</div>
            <div style="display:flex;align-items:center;justify-content:space-between;margin-top:12px">
                <div class="template-meta" style="display:flex;align-items:center;gap:8px">
                    <span class="badge badge-green">Active</span>
                    <span style="font-size:12px;color:var(--text-muted)">1,208 issued</span>
                </div>
                <div style="display:flex;gap:8px">
                    <button class="btn btn-icon" title="View" onclick="viewTemplate(2)" style="width:32px;height:32px;padding:0">👁️</button>
                    <button class="btn btn-icon" title="Edit" style="width:32px;height:32px;padding:0">✏️</button>
                    <button class="btn btn-icon" title="Delete" style="width:32px;height:32px;padding:0;color:var(--rose)">🗑️</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Template 3 -->
    <div class="template-card">
        <div class="template-preview" style="background:linear-gradient(135deg,#10b981,#059669);color:#fff;font-family:'Georgia',serif;font-size:18px;letter-spacing:2px;text-align:center;cursor:pointer" onclick="viewTemplate(3)">SPIRITUAL<br>CERTIFICATE</div>
        <div class="template-body">
            <div class="template-name">Spiritual Coordinator</div>
            <div class="template-desc">Special template for spiritual roles</div>
            <div style="display:flex;align-items:center;justify-content:space-between;margin-top:12px">
                <div class="template-meta" style="display:flex;align-items:center;gap:8px">
                    <span class="badge badge-green">Active</span>
                    <span style="font-size:12px;color:var(--text-muted)">497 issued</span>
                </div>
                <div style="display:flex;gap:8px">
                    <button class="btn btn-icon" title="View" onclick="viewTemplate(3)" style="width:32px;height:32px;padding:0">👁️</button>
                    <button class="btn btn-icon" title="Edit" style="width:32px;height:32px;padding:0">✏️</button>
                    <button class="btn btn-icon" title="Delete" style="width:32px;height:32px;padding:0;color:var(--rose)">🗑️</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Template 4 -->
    <div class="template-card">
        <div class="template-preview" style="background:linear-gradient(135deg,#8b5cf6,#7c3aed);color:#fff;font-family:'Georgia',serif;font-size:18px;letter-spacing:2px;text-align:center;cursor:pointer" onclick="viewTemplate(4)">COMMUNITY<br>GROUP LEAD</div>
        <div class="template-body">
            <div class="template-name">Community Group Lead</div>
            <div class="template-desc">For local community group leaders</div>
            <div style="display:flex;align-items:center;justify-content:space-between;margin-top:12px">
                <div class="template-meta" style="display:flex;align-items:center;gap:8px">
                    <span class="badge badge-green">Active</span>
                    <span style="font-size:12px;color:var(--text-muted)">321 issued</span>
                </div>
                <div style="display:flex;gap:8px">
                    <button class="btn btn-icon" title="View" onclick="viewTemplate(4)" style="width:32px;height:32px;padding:0">👁️</button>
                    <button class="btn btn-icon" title="Edit" style="width:32px;height:32px;padding:0">✏️</button>
                    <button class="btn btn-icon" title="Delete" style="width:32px;height:32px;padding:0;color:var(--rose)">🗑️</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Template 5 -->
    <div class="template-card">
        <div class="template-preview" style="background:linear-gradient(135deg,#ef4444,#dc2626);color:#fff;font-family:'Georgia',serif;font-size:18px;letter-spacing:2px;text-align:center;cursor:pointer" onclick="viewTemplate(5)">ACHIEVEMENT<br>AWARD</div>
        <div class="template-body">
            <div class="template-name">Achievement Award</div>
            <div class="template-desc">Special recognition awards</div>
            <div style="display:flex;align-items:center;justify-content:space-between;margin-top:12px">
                <div class="template-meta" style="display:flex;align-items:center;gap:8px">
                    <span class="badge badge-navy">Draft</span>
                    <span style="font-size:12px;color:var(--text-muted)">0 issued</span>
                </div>
                <div style="display:flex;gap:8px">
                    <button class="btn btn-icon" title="View" onclick="viewTemplate(5)" style="width:32px;height:32px;padding:0">👁️</button>
                    <button class="btn btn-icon" title="Edit" style="width:32px;height:32px;padding:0">✏️</button>
                    <button class="btn btn-icon" title="Delete" style="width:32px;height:32px;padding:0;color:var(--rose)">🗑️</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Template 6 -->
    <div class="template-card">
        <div class="template-preview" style="background:linear-gradient(135deg,#3b82f6,#2563eb);color:#fff;font-family:'Georgia',serif;font-size:18px;letter-spacing:2px;text-align:center;cursor:pointer" onclick="viewTemplate(6)">ALUMNI<br>CERTIFICATE</div>
        <div class="template-body">
            <div class="template-name">Alumni Certificate</div>
            <div class="template-desc">For graduating members</div>
            <div style="display:flex;align-items:center;justify-content:space-between;margin-top:12px">
                <div class="template-meta" style="display:flex;align-items:center;gap:8px">
                    <span class="badge badge-green">Active</span>
                    <span style="font-size:12px;color:var(--text-muted)">89 issued</span>
                </div>
                <div style="display:flex;gap:8px">
                    <button class="btn btn-icon" title="View" onclick="viewTemplate(6)" style="width:32px;height:32px;padding:0">👁️</button>
                    <button class="btn btn-icon" title="Edit" style="width:32px;height:32px;padding:0">✏️</button>
                    <button class="btn btn-icon" title="Delete" style="width:32px;height:32px;padding:0;color:var(--rose)">🗑️</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Add Template Modal -->
<div class="modal-overlay" id="addTemplateModal">
    <div class="modal">
        <div class="modal-header"><div class="modal-title">Add New Template</div><button class="modal-close" onclick="closeModal('addTemplateModal')">×</button></div>
        <div class="modal-body">
            <div class="form-grid" style="gap:14px">
                <div class="form-group full">
                    <label>Template Name</label>
                    <input type="text" placeholder="e.g., Special Achievement Award">
                </div>
                <div class="form-group full">
                    <label>Description</label>
                    <textarea placeholder="Brief description of this template" style="min-height:80px"></textarea>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select>
                        <option>Active</option>
                        <option>Draft</option>
                        <option>Inactive</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select>
                        <option>Membership</option>
                        <option>Leadership</option>
                        <option>Spiritual</option>
                        <option>Achievement</option>
                        <option>Alumni</option>
                    </select>
                </div>
                <div class="form-group full">
                    <div class="upload-zone">
                        <div class="upload-icon">📄</div>
                        <div class="upload-title">Upload Template File</div>
                        <div class="upload-sub">HTML, PDF, or image file (max 5MB)</div>
                        <button class="btn btn-primary" style="margin-top:12px">Choose File</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer"><button class="btn btn-secondary" onclick="closeModal('addTemplateModal')">Cancel</button><button class="btn btn-primary">Create Template</button></div>
    </div>
</div>

<!-- View Template Modal -->
<div class="modal-overlay" id="viewTemplateModal">
    <div class="modal" style="max-width:900px; width:90%;">
        <div class="modal-header">
            <div class="modal-title" id="viewTemplateTitle">Template Preview</div>
            <button class="modal-close" onclick="closeModal('viewTemplateModal')">×</button>
        </div>
        <div class="modal-body">
            <div class="form-grid" style="gap:20px">
                <div class="form-group">
                    <label>Template Name</label>
                    <input type="text" id="viewTemplateName" disabled style="background:var(--gray-100)">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <input type="text" id="viewTemplateStatus" disabled style="background:var(--gray-100)">
                </div>
                <div class="form-group full">
                    <label>Description</label>
                    <textarea id="viewTemplateDesc" disabled style="background:var(--gray-100); min-height:80px"></textarea>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <input type="text" id="viewTemplateCategory" disabled style="background:var(--gray-100)">
                </div>
                <div class="form-group">
                    <label>Times Issued</label>
                    <input type="text" id="viewTemplateIssued" disabled style="background:var(--gray-100)">
                </div>
            </div>
            <div style="margin-top:24px">
                <label style="display:block; font-size:12.5px; font-weight:700; color:var(--navy); letter-spacing:0.2px; margin-bottom:8px">Preview</label>
                <div id="viewTemplatePreview" style="width:100%; min-height:400px; border-radius:16px; display:flex; align-items:center; justify-content:center; color:#fff; font-family:'Georgia',serif; font-size:24px; letter-spacing:3px; text-align:center; border:1px solid var(--gray-200)"></div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeModal('viewTemplateModal')">Close</button>
            <button class="btn btn-primary">📥 Download Template</button>
        </div>
    </div>
</div>

<script>
// Template data for preview
const templates = {
    1: {
        name: "Membership Certificate",
        desc: "Standard membership cert with seal",
        status: "Active",
        category: "Membership",
        issued: "2,142 issued",
        bg: "linear-gradient(135deg,#0a1628,#1a3260)",
        title: "MEMBERSHIP\nCERTIFICATE"
    },
    2: {
        name: "Kamati Tendaji Leadership",
        desc: "Leadership & executive positions",
        status: "Active",
        category: "Leadership",
        issued: "1,208 issued",
        bg: "linear-gradient(135deg,#f59e0b,#d97706)",
        title: "LEADERSHIP\nCERTIFICATE"
    },
    3: {
        name: "Spiritual Coordinator",
        desc: "Special template for spiritual roles",
        status: "Active",
        category: "Spiritual",
        issued: "497 issued",
        bg: "linear-gradient(135deg,#10b981,#059669)",
        title: "SPIRITUAL\nCERTIFICATE"
    },
    4: {
        name: "Community Group Lead",
        desc: "For local community group leaders",
        status: "Active",
        category: "Leadership",
        issued: "321 issued",
        bg: "linear-gradient(135deg,#8b5cf6,#7c3aed)",
        title: "COMMUNITY\nGROUP LEAD"
    },
    5: {
        name: "Achievement Award",
        desc: "Special recognition awards",
        status: "Draft",
        category: "Achievement",
        issued: "0 issued",
        bg: "linear-gradient(135deg,#ef4444,#dc2626)",
        title: "ACHIEVEMENT\nAWARD"
    },
    6: {
        name: "Alumni Certificate",
        desc: "For graduating members",
        status: "Active",
        category: "Alumni",
        issued: "89 issued",
        bg: "linear-gradient(135deg,#3b82f6,#2563eb)",
        title: "ALUMNI\nCERTIFICATE"
    }
};

function viewTemplate(id) {
    const t = templates[id];
    document.getElementById('viewTemplateTitle').innerText = t.name;
    document.getElementById('viewTemplateName').value = t.name;
    document.getElementById('viewTemplateDesc').value = t.desc;
    document.getElementById('viewTemplateStatus').value = t.status;
    document.getElementById('viewTemplateCategory').value = t.category;
    document.getElementById('viewTemplateIssued').value = t.issued;
    document.getElementById('viewTemplatePreview').style.background = t.bg;
    document.getElementById('viewTemplatePreview').innerText = t.title;
    openModal('viewTemplateModal');
}
</script>
