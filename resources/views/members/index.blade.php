@extends('layouts.app')

@section('page-title', 'Member Registry')

@section('content')
<div class="breadcrumb">
    <span class="breadcrumb-current">Member Registry</span>
</div>
<div class="section-header" style="margin-bottom:16px">
    <div>
        <div class="section-title">All Members</div>
        <div class="section-subtitle">1,248 total members · 142 added this month</div>
    </div>
    <button class="btn btn-primary" onclick="openModal('addMemberModal')">👤 Add Member</button>
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
        <select style="padding:8px 14px;border-radius:10px;border:1px solid var(--gray-200);font-family:inherit;background:#fff">
            <option>All Universities</option>
            <option>UDSM</option>
            <option>SUA</option>
            <option>MUCE</option>
            <option>IFM</option>
            <option>UDOM</option>
        </select>
        <select style="padding:8px 14px;border-radius:10px;border:1px solid var(--gray-200);font-family:inherit;background:#fff">
            <option>All Categories</option>
            <option>Student Member</option>
            <option>Leadership</option>
            <option>Alumni</option>
        </select>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Member</th>
                    <th>Student ID</th>
                    <th>University</th>
                    <th>Category</th>
                    <th>Certs</th>
                    <th>Joined</th>
                    <th style="text-align:right">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px">
                            <div class="avatar">AJ</div>
                            <div>
                                <div style="font-weight:700;color:var(--navy)">Amina Juma</div>
                                <div style="font-size:12px;color:var(--text-muted)">amina.juma@udsm.ac.tz</div>
                            </div>
                        </div>
                    </td>
                    <td>2022-04-01234</td>
                    <td>UDSM</td>
                    <td><span class="badge badge-blue">Leadership</span></td>
                    <td><span class="badge badge-navy">3</span></td>
                    <td>Jan 12, 2024</td>
                    <td style="text-align:right">
                        <button class="btn btn-ghost btn-sm">View</button>
                        <button class="btn btn-secondary btn-sm">Issue Cert</button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px">
                            <div class="avatar">KM</div>
                            <div>
                                <div style="font-weight:700;color:var(--navy)">Kelvin David</div>
                                <div style="font-size:12px;color:var(--text-muted)">kelvin.david@muce.ac.tz</div>
                            </div>
                        </div>
                    </td>
                    <td>2023-01-05678</td>
                    <td>MUCE</td>
                    <td><span class="badge badge-green">Student Member</span></td>
                    <td><span class="badge badge-navy">1</span></td>
                    <td>Mar 5, 2025</td>
                    <td style="text-align:right">
                        <button class="btn btn-ghost btn-sm">View</button>
                        <button class="btn btn-secondary btn-sm">Issue Cert</button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px">
                            <div class="avatar">SM</div>
                            <div>
                                <div style="font-weight:700;color:var(--navy)">Sarah Mushi</div>
                                <div style="font-size:12px;color:var(--text-muted)">sarah.mushi@sua.ac.tz</div>
                            </div>
                        </div>
                    </td>
                    <td>2021-08-09012</td>
                    <td>SUA</td>
                    <td><span class="badge badge-violet">Alumni</span></td>
                    <td><span class="badge badge-navy">2</span></td>
                    <td>Sep 18, 2023</td>
                    <td style="text-align:right">
                        <button class="btn btn-ghost btn-sm">View</button>
                        <button class="btn btn-secondary btn-sm">Issue Cert</button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px">
                            <div class="avatar">JN</div>
                            <div>
                                <div style="font-weight:700;color:var(--navy)">John Nyerere</div>
                                <div style="font-size:12px;color:var(--text-muted)">john.nyerere@ifm.ac.tz</div>
                            </div>
                        </div>
                    </td>
                    <td>2020-03-03456</td>
                    <td>IFM</td>
                    <td><span class="badge badge-gold">Student Member</span></td>
                    <td><span class="badge badge-navy">1</span></td>
                    <td>Jun 22, 2023</td>
                    <td style="text-align:right">
                        <button class="btn btn-ghost btn-sm">View</button>
                        <button class="btn btn-secondary btn-sm">Issue Cert</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div style="padding:12px 20px;display:flex;align-items:center;justify-content:space-between;border-top:1px solid var(--gray-100)">
        <div style="font-size:12.5px;color:var(--text-muted)">Showing 1-4 of 1,248</div>
        <div class="pagination">
            <button class="page-btn">←</button>
            <button class="page-btn active">1</button>
            <button class="page-btn">2</button>
            <button class="page-btn">3</button>
            <span class="page-info">…</span>
            <button class="page-btn">125</button>
            <button class="page-btn">→</button>
        </div>
    </div>
</div>
@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
    const categorySelect = document.querySelectorAll('select')[1];
    const universitySelect = document.querySelectorAll('select')[0];

    function filterMembers() {
        // For demo purposes, we can log the selected values
        console.log('Selected Category:', categorySelect.value);
        console.log('Selected University:', universitySelect.value);
    }

    categorySelect.addEventListener('change', filterMembers);
    universitySelect.addEventListener('change', filterMembers);
});
</script>
