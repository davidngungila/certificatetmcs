@extends('layouts.app')

@section('page-title', 'My Profile')

@section('content')
<div class="glass-card" style="padding:32px">
    <div style="display:flex; align-items:center; gap:24px; margin-bottom:32px">
        <div style="width:100px;height:100px;border-radius:24px;background:linear-gradient(135deg,var(--accent),var(--violet));display:flex;align-items:center;justify-content:center;font-size:36px;font-weight:900;color:#fff">SA</div>
        <div>
            <h2 style="font-size:24px;font-weight:800;color:var(--navy);margin-bottom:4px">Sr. Admin</h2>
            <p style="font-size:14px;color:var(--text-muted);margin-bottom:8px">System Administrator</p>
            <p style="font-size:14px;color:var(--text-secondary)">admin@tmcs.or.tz</p>
        </div>
    </div>
    
    <div class="form-grid" style="gap:20px">
        <div class="form-group full">
            <label>Full Name</label>
            <input type="text" value="Sr. Admin" placeholder="Full Name">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" value="admin@tmcs.or.tz" placeholder="Email">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="tel" value="+255 712 345 678" placeholder="Phone">
        </div>
        <div class="form-group full">
            <label>Role</label>
            <input type="text" value="System Administrator" disabled style="background:var(--gray-100)">
        </div>
    </div>
    
    <div style="margin-top:32px; display:flex; gap:12px">
        <button class="btn btn-primary">Save Changes</button>
        <button class="btn btn-secondary">Cancel</button>
    </div>
</div>

<div class="glass-card" style="padding:32px; margin-top:24px">
    <h3 style="font-size:18px;font-weight:800;color:var(--navy);margin-bottom:20px">Change Password</h3>
    <div class="form-grid" style="gap:20px">
        <div class="form-group">
            <label>Current Password</label>
            <input type="password" placeholder="Current Password">
        </div>
        <div class="form-group">
            <label>New Password</label>
            <input type="password" placeholder="New Password">
        </div>
        <div class="form-group">
            <label>Confirm New Password</label>
            <input type="password" placeholder="Confirm New Password">
        </div>
    </div>
    <div style="margin-top:24px">
        <button class="btn btn-primary">Update Password</button>
    </div>
</div>
@endsection
