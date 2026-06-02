@extends('layouts.app')

@section('page-title', 'Users & Roles')

@section('content')
<div class="breadcrumb">
    <span class="breadcrumb-current">Users & Roles</span>
</div>
<div class="section-header" style="margin-bottom:16px">
    <div>
        <div class="section-title">System Users</div>
        <div class="section-subtitle">Manage access and permissions</div>
    </div>
    <button class="btn btn-primary" onclick="openModal('addUserModal')">👤 Add User</button>
</div>
<div class="glass-card">
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>User</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Branch</th>
                    <th>Last Active</th>
                    <th style="text-align:right">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px">
                            <div class="avatar">SA</div>
                            <div>
                                <div style="font-weight:700;color:var(--navy)">Sr. Admin</div>
                            </div>
                        </div>
                    </td>
                    <td>admin@tmcs.or.tz</td>
                    <td><span class="badge badge-rose role-admin">Admin</span></td>
                    <td>National Office</td>
                    <td>Just now</td>
                    <td style="text-align:right">
                        <button class="btn btn-ghost btn-sm">Edit</button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px">
                            <div class="avatar">OP</div>
                            <div>
                                <div style="font-weight:700;color:var(--navy)">Operator UDSM</div>
                            </div>
                        </div>
                    </td>
                    <td>operator.udsm@tmcs.or.tz</td>
                    <td><span class="badge badge-blue role-operator">Operator</span></td>
                    <td>UDSM</td>
                    <td>2 hours ago</td>
                    <td style="text-align:right">
                        <button class="btn btn-ghost btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Disable</button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px">
                            <div class="avatar">VW</div>
                            <div>
                                <div style="font-weight:700;color:var(--navy)">Viewer SUA</div>
                            </div>
                        </div>
                    </td>
                    <td>viewer.sua@tmcs.or.tz</td>
                    <td><span class="badge badge-green role-viewer">Viewer</span></td>
                    <td>SUA</td>
                    <td>Yesterday</td>
                    <td style="text-align:right">
                        <button class="btn btn-ghost btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Disable</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
