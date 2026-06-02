<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TMCS — Certificate Management System</title>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <style>
    :root {
      --navy: #0a1628;
      --navy-mid: #0e2040;
      --navy-light: #1a3260;
      --navy-soft: #1e3a6e;
      --accent: #2563eb;
      --accent-bright: #3b82f6;
      --accent-glow: #60a5fa;
      --gold: #f59e0b;
      --gold-light: #fcd34d;
      --emerald: #10b981;
      --rose: #f43f5e;
      --violet: #8b5cf6;
      --white: #ffffff;
      --off-white: #f8fafc;
      --gray-50: #f8fafc;
      --gray-100: #f1f5f9;
      --gray-200: #e2e8f0;
      --gray-300: #cbd5e1;
      --gray-400: #94a3b8;
      --gray-500: #64748b;
      --gray-600: #475569;
      --text-primary: #0a1628;
      --text-secondary: #334155;
      --text-muted: #64748b;
      --glass-bg: rgba(255,255,255,0.72);
      --glass-border: rgba(10,22,40,0.08);
      --glass-shadow: 0 8px 32px rgba(10,22,40,0.10);
      --glass-heavy: rgba(255,255,255,0.85);
      --sidebar-w: 260px;
      --header-h: 64px;
      --radius: 16px;
      --radius-sm: 10px;
      --radius-xs: 6px;
      --transition: 0.22s cubic-bezier(.4,0,.2,1);
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: 'Manrope', sans-serif;
      background: #ffffff;
      color: var(--text-primary);
      min-height: 100vh;
      overflow-x: hidden;
      -webkit-font-smoothing: antialiased;
    }

    /* ─── Subtle background pattern ─── */
    body::before {
      content:'';
      position:fixed;inset:0;
      background:
        radial-gradient(ellipse 900px 600px at 0% 0%, rgba(37,99,235,0.04) 0%, transparent 70%),
        radial-gradient(ellipse 700px 500px at 100% 100%, rgba(10,22,40,0.04) 0%, transparent 70%),
        repeating-linear-gradient(0deg, transparent, transparent 39px, rgba(10,22,40,0.018) 40px),
        repeating-linear-gradient(90deg, transparent, transparent 39px, rgba(10,22,40,0.018) 40px);
      pointer-events:none;
      z-index:0;
    }

    /* ─── Layout ─── */
    .app { display:flex; min-height:100vh; position:relative; z-index:1; }

    /* ─── Sidebar ─── */
    .sidebar {
      width: var(--sidebar-w);
      background: var(--navy);
      position: fixed;
      top:0; left:0; bottom:0;
      display:flex; flex-direction:column;
      z-index: 100;
      transition: transform var(--transition), width var(--transition);
      box-shadow: 4px 0 40px rgba(10,22,40,0.18);
    }
    .sidebar-header {
      padding: 22px 20px 18px;
      border-bottom: 1px solid rgba(255,255,255,0.07);
      display:flex; align-items:center; gap:12px;
      min-height: var(--header-h);
    }
    .sidebar-logo {
      width:40px;height:40px;border-radius:12px;
      background: linear-gradient(135deg, var(--accent) 0%, var(--navy-light) 100%);
      display:flex;align-items:center;justify-content:center;
      font-weight:900;color:#fff;font-size:15px;letter-spacing:-0.5px;
      flex-shrink:0;
      box-shadow: 0 4px 14px rgba(37,99,235,0.4);
    }
    .sidebar-brand { color:#fff; }
    .sidebar-brand strong { display:block; font-size:14px; font-weight:800; letter-spacing:0.3px; }
    .sidebar-brand span { font-size:10.5px; color:rgba(255,255,255,0.45); font-weight:500; letter-spacing:0.8px; text-transform:uppercase; }

    .sidebar-nav { flex:1; overflow-y:auto; padding:12px 10px; scrollbar-width:none; }
    .sidebar-nav::-webkit-scrollbar { display:none; }

    .nav-section { margin-bottom:6px; }
    .nav-section-label {
      font-size:10px; font-weight:700; letter-spacing:1.2px; text-transform:uppercase;
      color:rgba(255,255,255,0.3); padding:14px 12px 6px;
    }

    .nav-item {
      display:flex; align-items:center; gap:11px;
      padding:10px 12px; border-radius:10px;
      cursor:pointer; transition:all var(--transition);
      color:rgba(255,255,255,0.55);
      font-size:13.5px; font-weight:500;
      position:relative; margin-bottom:2px;
      user-select:none;
      text-decoration:none;
    }
    .nav-item:hover { background:rgba(255,255,255,0.06); color:rgba(255,255,255,0.85); }
    .nav-item.active {
      background: linear-gradient(135deg, rgba(37,99,235,0.22) 0%, rgba(37,99,235,0.08) 100%);
      color:#fff;
      box-shadow: 0 0 0 1px rgba(37,99,235,0.25) inset;
    }
    .nav-icon { width:18px;height:18px; flex-shrink:0; opacity:0.9; }
    .nav-badge {
      margin-left:auto; background:var(--accent);
      color:#fff; font-size:10px; font-weight:700;
      padding:2px 7px; border-radius:20px; min-width:20px; text-align:center;
    }
    .nav-badge.gold { background: var(--gold); color:var(--navy); }

    /* ─── Main ─── */
    .main {
      margin-left: var(--sidebar-w);
      flex:1; display:flex; flex-direction:column;
      min-height:100vh;
      transition: margin-left var(--transition);
    }

    /* ─── Header ─── */
    .header {
      height: var(--header-h);
      background: rgba(255,255,255,0.82);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border-bottom:1px solid var(--glass-border);
      display:flex; align-items:center;
      padding:0 28px;
      position:sticky; top:0; z-index:50;
      gap:16px;
      box-shadow: 0 1px 20px rgba(10,22,40,0.06);
    }
    .header-hamburger {
      display:none; background:none; border:none; cursor:pointer;
      padding:8px; border-radius:8px; transition:background var(--transition);
      color:var(--navy);
    }
    .header-hamburger:hover { background:var(--gray-100); }
    .page-title {
      font-size:18px; font-weight:800; color:var(--navy);
      letter-spacing:-0.3px; flex:1;
    }
    .page-subtitle { font-size:12px; color:var(--text-muted); font-weight:500; margin-top:1px; }
    .header-actions { display:flex; align-items:center; gap:10px; }
    .header-search {
      display:flex; align-items:center; gap:8px;
      background:var(--gray-100); border-radius:10px;
      padding:8px 14px; border:1px solid transparent;
      transition:all var(--transition); cursor:text;
    }
    .header-search:hover { border-color:var(--gray-200); background:#fff; }
    .header-search input {
      border:none; background:none; outline:none;
      font-family:inherit; font-size:13px; color:var(--text-primary);
      width:180px;
    }
    .header-search input::placeholder { color:var(--gray-400); }
    .header-btn {
      width:38px;height:38px; border-radius:10px;
      background:var(--gray-100); border:1px solid var(--gray-200);
      display:flex;align-items:center;justify-content:center;
      cursor:pointer; transition:all var(--transition); color:var(--navy);
      position:relative;
    }
    .header-btn:hover { background:var(--navy); color:#fff; border-color:var(--navy); }
    .notif-dot {
      position:absolute; top:8px; right:8px;
      width:7px;height:7px; background:var(--rose); border-radius:50%;
      border:2px solid #fff;
    }
    .header-user {
      display:flex; align-items:center; gap:10px;
      padding:6px 12px; border-radius:10px;
      background:var(--gray-100); border:1px solid var(--gray-200);
      cursor:pointer; transition:all var(--transition);
    }
    .header-user:hover { background:var(--navy); border-color:var(--navy); }
    .header-user:hover .user-info-header strong { color:#fff; }
    .header-user:hover .user-info-header span { color:rgba(255,255,255,0.7); }
    .user-avatar-header {
      width:34px;height:34px;border-radius:10px;
      background:linear-gradient(135deg,var(--accent),var(--violet));
      display:flex;align-items:center;justify-content:center;
      font-weight:800;color:#fff;font-size:13px;flex-shrink:0;
    }
    .user-info-header strong { display:block;font-size:12.5px;color:var(--navy);font-weight:700;line-height:1.2; }
    .user-info-header span { font-size:11px;color:var(--text-muted);font-weight:500;line-height:1.2; }
    .header-dropdown {
      position:absolute; top:calc(var(--header-h) - 8px); right:28px;
      background:#fff; border-radius:12px;
      box-shadow: 0 10px 40px rgba(10,22,40,0.15);
      border:1px solid var(--gray-200);
      padding:8px 0; min-width:220px;
      z-index:200; opacity:0; transform:translateY(-10px);
      pointer-events:none; transition:all var(--transition);
    }
    .header-dropdown.show {
      opacity:1; transform:translateY(0);
      pointer-events:all;
    }
    .header-dropdown-item {
      display:flex; align-items:center; gap:10px;
      padding:10px 16px; color:var(--navy);
      text-decoration:none; font-size:13px; font-weight:600;
      transition:background var(--transition);
    }
    .header-dropdown-item:hover { background:var(--gray-100); }
    .header-dropdown-item.danger { color:var(--rose); }
    .header-dropdown-item.danger:hover { background:rgba(244,63,94,0.08); }
    .header-dropdown-divider {
      height:1px; background:var(--gray-200);
      margin:8px 0;
    }

    /* ─── Content ─── */
    .content { flex:1; padding:28px; overflow-y:auto; }

    /* ─── Stats Grid ─── */
    .stats-grid { display:grid; grid-template-columns:repeat(4,1fr); gap:16px; margin-bottom:24px; }
    @media(max-width:1100px){ .stats-grid { grid-template-columns:repeat(2,1fr); } }

    .stat-card {
      background: var(--glass-heavy);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border: 1px solid var(--glass-border);
      border-radius: var(--radius);
      padding: 22px 22px 18px;
      box-shadow: var(--glass-shadow);
      position:relative; overflow:hidden;
      transition: transform var(--transition), box-shadow var(--transition);
      cursor:default;
    }
    .stat-card:hover { transform:translateY(-2px); box-shadow:0 16px 40px rgba(10,22,40,0.13); }
    .stat-card::before {
      content:'';position:absolute;top:0;left:0;right:0;height:3px;
      background: var(--card-accent, linear-gradient(90deg, var(--accent), var(--accent-glow)));
      border-radius:var(--radius) var(--radius) 0 0;
    }
    .stat-icon {
      width:44px;height:44px;border-radius:12px;
      background:var(--icon-bg, rgba(37,99,235,0.08));
      display:flex;align-items:center;justify-content:center;
      margin-bottom:14px;
    }
    .stat-icon svg { width:22px;height:22px; }
    .stat-value { font-size:28px; font-weight:900; color:var(--navy); letter-spacing:-1px; line-height:1; }
    .stat-label { font-size:12.5px; color:var(--text-muted); font-weight:600; margin-top:6px; text-transform:uppercase; letter-spacing:0.5px; }
    .stat-change {
      display:inline-flex;align-items:center;gap:4px;
      font-size:11.5px; font-weight:700; margin-top:8px;
      padding:3px 8px; border-radius:20px;
    }
    .stat-change.up { background:rgba(16,185,129,0.1); color:var(--emerald); }
    .stat-change.down { background:rgba(244,63,94,0.1); color:var(--rose); }

    /* ─── Section heading ─── */
    .section-header {
      display:flex; align-items:center; justify-content:space-between;
      margin-bottom:16px;
    }
    .section-title { font-size:16px; font-weight:800; color:var(--navy); letter-spacing:-0.2px; }
    .section-subtitle { font-size:12px; color:var(--text-muted); font-weight:500; margin-top:2px; }

    /* ─── Buttons ─── */
    .btn {
      display:inline-flex; align-items:center; gap:7px;
      padding:9px 18px; border-radius:9px; font-family:inherit;
      font-size:13px; font-weight:700; cursor:pointer;
      border:none; transition:all var(--transition); white-space:nowrap;
    }
    .btn-primary {
      background: linear-gradient(135deg, var(--accent) 0%, var(--navy-light) 100%);
      color:#fff;
      box-shadow: 0 4px 14px rgba(37,99,235,0.28);
    }
    .btn-primary:hover { transform:translateY(-1px); box-shadow:0 6px 20px rgba(37,99,235,0.38); }
    .btn-secondary {
      background:var(--gray-100); color:var(--navy);
      border:1px solid var(--gray-200);
    }
    .btn-secondary:hover { background:var(--navy); color:#fff; border-color:var(--navy); }
    .btn-ghost { background:transparent; color:var(--text-muted); padding:8px 12px; }
    .btn-ghost:hover { background:var(--gray-100); color:var(--navy); }
    .btn-danger { background:rgba(244,63,94,0.08); color:var(--rose); border:1px solid rgba(244,63,94,0.2); }
    .btn-danger:hover { background:var(--rose); color:#fff; }
    .btn-sm { padding:6px 13px; font-size:12px; border-radius:7px; }
    .btn-icon { padding:8px; width:36px;height:36px; justify-content:center; border-radius:8px; background:var(--gray-100); border:1px solid var(--gray-200); cursor:pointer; transition:all var(--transition); }
    .btn-icon:hover { background:var(--navy); color:#fff; border-color:var(--navy); }

    /* ─── Glass Card ─── */
    .glass-card {
      background: var(--glass-heavy);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border:1px solid var(--glass-border);
      border-radius:var(--radius);
      box-shadow: var(--glass-shadow);
    }

    /* ─── Table ─── */
    .table-wrap { overflow-x:auto; }
    table { width:100%; border-collapse:collapse; }
    thead th {
      font-size:11.5px; font-weight:700; text-transform:uppercase;
      letter-spacing:0.7px; color:var(--text-muted);
      padding:12px 16px; text-align:left;
      border-bottom:1px solid var(--gray-100);
      background:var(--gray-50);
      white-space:nowrap;
    }
    thead th:first-child { border-radius:var(--radius-sm) 0 0 0; }
    thead th:last-child { border-radius:0 var(--radius-sm) 0 0; }
    tbody tr { transition:background var(--transition); cursor:default; }
    tbody tr:hover { background:rgba(37,99,235,0.03); }
    tbody td {
      padding:13px 16px; font-size:13.5px; color:var(--text-secondary);
      border-bottom:1px solid var(--gray-100); vertical-align:middle;
    }
    tbody tr:last-child td { border-bottom:none; }

    /* ─── Badges ─── */
    .badge {
      display:inline-flex;align-items:center;gap:5px;
      padding:3px 10px; border-radius:20px; font-size:11.5px; font-weight:700;
      white-space:nowrap;
    }
    .badge-dot { width:6px;height:6px;border-radius:50%; }
    .badge-blue { background:rgba(37,99,235,0.1); color:var(--accent); }
    .badge-green { background:rgba(16,185,129,0.1); color:var(--emerald); }
    .badge-gold { background:rgba(245,158,11,0.1); color:var(--gold); }
    .badge-rose { background:rgba(244,63,94,0.1); color:var(--rose); }
    .badge-violet { background:rgba(139,92,246,0.1); color:var(--violet); }
    .badge-gray { background:var(--gray-100); color:var(--gray-500); }
    .badge-navy { background:rgba(10,22,40,0.08); color:var(--navy); }

    /* ─── Avatar ─── */
    .avatar {
      width:34px;height:34px; border-radius:9px;
      background:linear-gradient(135deg,var(--accent),var(--violet));
      display:inline-flex;align-items:center;justify-content:center;
      font-size:13px;font-weight:800;color:#fff;flex-shrink:0;
    }

    /* ─── Progress bar ─── */
    .progress { background:var(--gray-100); border-radius:10px; height:6px; overflow:hidden; }
    .progress-fill { height:100%; border-radius:10px; transition:width 1s ease; }

    /* ─── Cert type cards ─── */
    .cert-types-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(220px,1fr)); gap:14px; }
    .cert-type-card {
      background:var(--glass-heavy);
      border:1px solid var(--glass-border);
      border-radius:var(--radius);
      padding:20px; cursor:pointer;
      transition:all var(--transition);
      position:relative; overflow:hidden;
      box-shadow: var(--glass-shadow);
    }
    .cert-type-card:hover { transform:translateY(-3px); box-shadow:0 20px 40px rgba(10,22,40,0.14); border-color:var(--accent-bright); }
    .cert-type-card::after {
      content:'';position:absolute;bottom:0;left:0;right:0;height:3px;
      background:var(--ct-color, var(--accent));
      opacity:0; transition:opacity var(--transition);
    }
    .cert-type-card:hover::after { opacity:1; }
    .ct-icon {
      width:48px;height:48px;border-radius:14px;
      background:var(--ct-bg, rgba(37,99,235,0.08));
      display:flex;align-items:center;justify-content:center;
      margin-bottom:14px; font-size:28px;
    }
    .ct-name { font-size:14px; font-weight:800; color:var(--navy); margin-bottom:4px; }
    .ct-count { font-size:12px; color:var(--text-muted); font-weight:500; }
    .ct-meta { margin-top:12px; display:flex; gap:8px; flex-wrap:wrap; }

    /* ─── Form ─── */
    .form-grid { display:grid; grid-template-columns:1fr 1fr; gap:16px; }
    .form-grid-3 { display:grid; grid-template-columns:1fr 1fr 1fr; gap:16px; }
    @media(max-width:700px){ .form-grid,.form-grid-3 { grid-template-columns:1fr; } }
    .form-group { display:flex; flex-direction:column; gap:6px; }
    .form-group.full { grid-column:1/-1; }
    label { font-size:12.5px; font-weight:700; color:var(--navy); letter-spacing:0.2px; }
    input, select, textarea {
      font-family:inherit; font-size:13.5px; color:var(--text-primary);
      background:#fff; border:1.5px solid var(--gray-200);
      border-radius:9px; padding:10px 14px; outline:none;
      transition:border-color var(--transition), box-shadow var(--transition);
    }
    input:focus, select:focus, textarea:focus {
      border-color:var(--accent-bright);
      box-shadow:0 0 0 3px rgba(37,99,235,0.12);
    }
    textarea { resize:vertical; min-height:90px; }
    .form-hint { font-size:11.5px; color:var(--text-muted); }

    /* ─── Upload zone ─── */
    .upload-zone {
      border:2px dashed var(--gray-300); border-radius:var(--radius);
      padding:40px 20px; text-align:center; cursor:pointer;
      transition:all var(--transition); background:var(--gray-50);
    }
    .upload-zone:hover { border-color:var(--accent); background:rgba(37,99,235,0.03); }
    .upload-icon { font-size:36px; margin-bottom:12px; }
    .upload-title { font-size:14px; font-weight:700; color:var(--navy); margin-bottom:6px; }
    .upload-sub { font-size:12.5px; color:var(--text-muted); }

    /* ─── Timeline ─── */
    .timeline { display:flex; flex-direction:column; gap:0; }
    .timeline-item { display:flex; gap:14px; padding-bottom:20px; position:relative; }
    .timeline-item:last-child { padding-bottom:0; }
    .timeline-left { display:flex; flex-direction:column; align-items:center; width:32px; flex-shrink:0; }
    .timeline-dot {
      width:32px;height:32px;border-radius:50%;
      display:flex;align-items:center;justify-content:center;
      font-size:13px; z-index:1; flex-shrink:0;
    }
    .timeline-line { flex:1; width:2px; background:var(--gray-100); margin-top:4px; }
    .timeline-item:last-child .timeline-line { display:none; }
    .timeline-content { flex:1; padding-top:4px; }
    .timeline-title { font-size:13.5px; font-weight:700; color:var(--navy); margin-bottom:3px; }
    .timeline-desc { font-size:12.5px; color:var(--text-muted); line-height:1.5; }
    .timeline-time { font-size:11px; color:var(--text-muted); margin-top:4px; }

    /* ─── Charts ─── */
    .chart-bar-wrap { display:flex; flex-direction:column; gap:12px; }
    .chart-bar-item { display:flex; flex-direction:column; gap:5px; }
    .chart-bar-header { display:flex; justify-content:space-between; align-items:center; }
    .chart-bar-label { font-size:12.5px; font-weight:600; color:var(--text-secondary); }
    .chart-bar-value { font-size:12.5px; font-weight:800; color:var(--navy); }

    /* ─── Verification ─── */
    .verify-card {
      max-width:480px; margin:0 auto;
      background:var(--glass-heavy);
      border:1px solid var(--glass-border);
      border-radius:var(--radius);
      padding:36px;
      box-shadow: 0 20px 60px rgba(10,22,40,0.1);
    }
    .verify-result {
      background:var(--glass-heavy);
      border:1px solid var(--glass-border);
      border-radius:var(--radius);
      padding:24px; margin-top:20px;
      display:none;
    }
    .verify-result.show { display:block; }
    .verify-status {
      display:flex;align-items:center;gap:10px;
      padding:14px 18px; border-radius:10px;
      margin-bottom:16px;
    }
    .verify-status.valid { background:rgba(16,185,129,0.08); border:1px solid rgba(16,185,129,0.2); }
    .verify-status.invalid { background:rgba(244,63,94,0.08); border:1px solid rgba(244,63,94,0.2); }
    .verify-status-icon { font-size:24px; }
    .verify-status-text strong { display:block; font-size:15px; font-weight:800; }
    .verify-fields { display:flex; flex-direction:column; gap:10px; }
    .verify-field { display:flex; gap:12px; align-items:flex-start; padding:10px 0; border-bottom:1px solid var(--gray-100); }
    .verify-field:last-child { border-bottom:none; }
    .verify-field-label { font-size:12px; font-weight:700; color:var(--text-muted); width:140px; flex-shrink:0; text-transform:uppercase; letter-spacing:0.5px; }
    .verify-field-value { font-size:13.5px; font-weight:600; color:var(--navy); }

    /* ─── Settings ─── */
    .settings-section { margin-bottom:28px; }
    .settings-title { font-size:14px; font-weight:800; color:var(--navy); margin-bottom:14px; padding-bottom:10px; border-bottom:1px solid var(--gray-100); }
    .settings-row {
      display:flex; align-items:center; justify-content:space-between;
      padding:14px 0; border-bottom:1px solid var(--gray-50);
    }
    .settings-row:last-child { border-bottom:none; }
    .settings-row-info strong { display:block; font-size:13.5px; font-weight:700; color:var(--navy); margin-bottom:2px; }
    .settings-row-info span { font-size:12px; color:var(--text-muted); }
    .toggle {
      width:44px;height:24px;background:var(--gray-200);border-radius:12px;
      position:relative;cursor:pointer;transition:background var(--transition);
      border:none;flex-shrink:0;
    }
    .toggle.on { background:var(--accent); }
    .toggle::after {
      content:'';position:absolute;top:3px;left:3px;
      width:18px;height:18px;background:#fff;border-radius:50%;
      transition:transform var(--transition);
      box-shadow:0 1px 4px rgba(0,0,0,0.2);
    }
    .toggle.on::after { transform:translateX(20px); }

    /* ─── Audit log ─── */
    .audit-item {
      display:flex; align-items:flex-start; gap:14px;
      padding:14px 20px; border-bottom:1px solid var(--gray-100);
      transition:background var(--transition);
    }
    .audit-item:hover { background:var(--gray-50); }
    .audit-item:last-child { border-bottom:none; }
    .audit-type-dot { width:8px;height:8px;border-radius:50%;flex-shrink:0;margin-top:5px; }
    .audit-body { flex:1; }
    .audit-action { font-size:13.5px; font-weight:600; color:var(--navy); }
    .audit-meta { font-size:12px; color:var(--text-muted); margin-top:3px; }

    /* ─── Reports ─── */
    .report-mini-chart { display:flex; align-items:flex-end; gap:4px; height:48px; }
    .report-bar { flex:1; background:var(--accent); border-radius:4px 4px 0 0; opacity:0.7; transition:opacity var(--transition); min-width:8px; }
    .report-bar:hover { opacity:1; }

    /* ─── Template cards ─── */
    .template-card {
      background:var(--glass-heavy);
      border:1px solid var(--glass-border);
      border-radius:var(--radius);
      overflow:hidden;
      box-shadow:var(--glass-shadow);
      transition:all var(--transition);
    }
    .template-card:hover { transform:translateY(-3px); box-shadow:0 20px 50px rgba(10,22,40,0.14); }
    .template-preview {
      height:140px;
      display:flex;align-items:center;justify-content:center;
      font-size:28px;
      position:relative; overflow:hidden;
    }
    .template-body { padding:16px; }
    .template-name { font-size:14px; font-weight:800; color:var(--navy); margin-bottom:4px; }
    .template-desc { font-size:12px; color:var(--text-muted); margin-bottom:12px; }
    .template-meta { display:flex; gap:8px; flex-wrap:wrap; }

    /* ─── Signature cards ─── */
    .sig-card {
      background:var(--glass-heavy);
      border:1.5px dashed var(--gray-200);
      border-radius:var(--radius); padding:24px;
      display:flex;flex-direction:column;align-items:center;gap:12px;
      transition:all var(--transition);
    }
    .sig-card.filled { border-style:solid; border-color:var(--glass-border); }
    .sig-preview {
      width:180px;height:70px;background:var(--gray-50);
      border-radius:8px; border:1px solid var(--gray-200);
      display:flex;align-items:center;justify-content:center;
      font-size:11px;color:var(--text-muted);
      font-family:cursive;font-size:28px;color:var(--navy-soft);
      letter-spacing:-2px;
    }
    .sig-name { font-size:13px;font-weight:800;color:var(--navy); }
    .sig-role { font-size:12px;color:var(--text-muted); }

    /* ─── Modal ─── */
    .modal-overlay {
      position:fixed;inset:0;background:rgba(10,22,40,0.4);
      backdrop-filter:blur(6px);z-index:200;
      display:flex;align-items:center;justify-content:center;
      opacity:0;pointer-events:none;transition:opacity var(--transition);
      padding:20px;
    }
    .modal-overlay.open { opacity:1;pointer-events:all; }
    .modal {
      background:#fff;border-radius:var(--radius);
      width:100%;max-width:560px;max-height:90vh;overflow-y:auto;
      box-shadow:0 30px 80px rgba(10,22,40,0.25);
      transform:translateY(12px) scale(0.98);
      transition:transform var(--transition);
    }
    .modal-overlay.open .modal { transform:none; }
    .modal-header { display:flex;align-items:center;justify-content:space-between; padding:24px 24px 0; }
    .modal-title { font-size:17px;font-weight:900;color:var(--navy);letter-spacing:-0.3px; }
    .modal-close { background:none;border:none;cursor:pointer;padding:6px;border-radius:7px;color:var(--gray-400);font-size:20px;transition:all var(--transition); }
    .modal-close:hover { background:var(--gray-100);color:var(--navy); }
    .modal-body { padding:20px 24px 24px; }
    .modal-footer { padding:16px 24px; border-top:1px solid var(--gray-100); display:flex;justify-content:flex-end;gap:10px; }

    /* ─── Breadcrumbs ─── */
    .breadcrumb { display:flex;align-items:center;gap:6px; font-size:12px; color:var(--text-muted); margin-bottom:18px; }
    .breadcrumb a { color:var(--text-muted);text-decoration:none;font-weight:600; transition:color var(--transition); }
    .breadcrumb a:hover { color:var(--accent); }
    .breadcrumb-sep { color:var(--gray-300); }
    .breadcrumb-current { color:var(--navy);font-weight:700; }

    /* ─── Empty state ─── */
    .empty-state { text-align:center; padding:48px 20px; }
    .empty-state-icon { font-size:48px; margin-bottom:14px; opacity:0.5; }
    .empty-state-title { font-size:16px;font-weight:800;color:var(--navy);margin-bottom:6px; }
    .empty-state-sub { font-size:13px;color:var(--text-muted);max-width:320px;margin:0 auto 18px; }

    /* ─── Responsive ─── */
    @media(max-width:900px){
      :root { --sidebar-w: 0px; }
      .sidebar { transform:translateX(-260px); width:260px; }
      .sidebar.open { transform:translateX(0); }
      .main { margin-left:0; }
      .header-hamburger { display:flex; }
      .header-search { display:none; }
      .stats-grid { grid-template-columns:repeat(2,1fr); gap:12px; }
      .content { padding:16px; }
      .form-grid { grid-template-columns:1fr; }
      .form-grid-3 { grid-template-columns:1fr; }
    }
    @media(max-width:600px){
      .stats-grid { grid-template-columns:1fr; }
      .cert-types-grid { grid-template-columns:1fr; }
      .header { padding:0 14px; gap:10px; }
      .page-title { font-size:16px; }
    }
    .sidebar-overlay {
      display:none;position:fixed;inset:0;background:rgba(10,22,40,0.4);z-index:99;
      backdrop-filter:blur(2px);
    }
    .sidebar-overlay.show { display:block; }

    /* Scrollbar */
    ::-webkit-scrollbar { width:5px;height:5px; }
    ::-webkit-scrollbar-track { background:transparent; }
    ::-webkit-scrollbar-thumb { background:var(--gray-300);border-radius:10px; }
    ::-webkit-scrollbar-thumb:hover { background:var(--gray-400); }

    /* ─── Dashboard Charts ─── */
    .mini-donut {
      width:80px;height:80px;border-radius:50%;
      background: conic-gradient(var(--accent) 0% 68%, var(--gray-100) 68% 100%);
      display:flex;align-items:center;justify-content:center;
      position:relative;flex-shrink:0;
    }
    .mini-donut::after {
      content:'68%';position:absolute;
      width:54px;height:54px;background:#fff;border-radius:50%;
      display:flex;align-items:center;justify-content:center;
      font-size:13px;font-weight:900;color:var(--navy);
    }
    .donut-label { font-size:11px;color:var(--text-muted);margin-top:6px;text-align:center;font-weight:600; }

    /* Queue progress */
    .queue-item { display:flex;align-items:center;gap:12px;padding:10px 0;border-bottom:1px solid var(--gray-100); }
    .queue-item:last-child { border-bottom:none; }
    .queue-name { font-size:13px;font-weight:700;color:var(--navy);flex:1; }
    .queue-count { font-size:12px;color:var(--text-muted);width:60px;text-align:right; }

    /* Tab system */
    .tabs { display:flex;gap:4px;padding:4px;background:var(--gray-100);border-radius:10px;margin-bottom:20px;width:fit-content; }
    .tab { padding:7px 16px;border-radius:7px;font-size:13px;font-weight:700;cursor:pointer;transition:all var(--transition);color:var(--text-muted);border:none;background:none;font-family:inherit; }
    .tab.active { background:#fff;color:var(--navy);box-shadow:0 2px 8px rgba(10,22,40,0.08); }
    .tab-content { display:none; }
    .tab-content.active { display:block; }

    /* Pagination */
    .pagination { display:flex;align-items:center;gap:6px;justify-content:flex-end;margin-top:16px; }
    .page-btn { width:32px;height:32px;border-radius:7px;border:1px solid var(--gray-200);background:#fff;font-size:13px;font-weight:600;color:var(--text-secondary);cursor:pointer;display:flex;align-items:center;justify-content:center;transition:all var(--transition); }
    .page-btn:hover,.page-btn.active { background:var(--accent);color:#fff;border-color:var(--accent); }
    .page-info { font-size:12.5px;color:var(--text-muted);margin:0 8px; }

    /* ─── Floating generate btn ─── */
    .fab {
      position:fixed;bottom:28px;right:28px;
      background:linear-gradient(135deg,var(--accent),var(--navy-light));
      color:#fff;border:none;border-radius:50px;
      padding:14px 22px;font-family:inherit;font-size:14px;font-weight:800;
      cursor:pointer;box-shadow:0 8px 28px rgba(37,99,235,0.4);
      display:flex;align-items:center;gap:9px;
      transition:all var(--transition);z-index:60;
    }
    .fab:hover { transform:translateY(-3px);box-shadow:0 14px 36px rgba(37,99,235,0.45); }
    @media(max-width:600px){ .fab { bottom:16px;right:16px;padding:12px 16px;font-size:13px; } }

    /* Notification dot on nav items */
    .nav-item .pulse { width:8px;height:8px;border-radius:50%;background:var(--rose);margin-left:auto;animation:pulse 2s infinite; }
    @keyframes pulse { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:0.6;transform:scale(1.2)} }

    /* Skeleton loading */
    .skeleton { background:linear-gradient(90deg,var(--gray-100) 25%,var(--gray-50) 50%,var(--gray-100) 75%);background-size:200% 100%;animation:shimmer 1.5s infinite;border-radius:6px; }
    @keyframes shimmer { 0%{background-position:200% 0} 100%{background-position:-200% 0} }

    /* Role chips */
    .role-admin { background:rgba(244,63,94,0.08);color:var(--rose); }
    .role-operator { background:rgba(37,99,235,0.08);color:var(--accent); }
    .role-viewer { background:rgba(16,185,129,0.08);color:var(--emerald); }
  </style>
</head>
<body>

<div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

<!-- ═══ SIDEBAR ═══ -->
<aside class="sidebar" id="sidebar">
  <div class="sidebar-header">
    <div class="sidebar-logo">TC</div>
    <div class="sidebar-brand">
      <strong>TMCS — CMS</strong>
      <span>Certificate Management</span>
    </div>
  </div>

  <nav class="sidebar-nav">
    <div class="nav-section">
      
      <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1.5" stroke-width="2"/><rect x="14" y="3" width="7" height="7" rx="1.5" stroke-width="2"/><rect x="3" y="14" width="7" height="7" rx="1.5" stroke-width="2"/><rect x="14" y="14" width="7" height="7" rx="1.5" stroke-width="2"/></svg>
        Dashboard
      </a>
    </div>

    <div class="nav-section">
     
      <a href="{{ route('members.index') }}" class="nav-item {{ request()->routeIs('members.index') ? 'active' : '' }}">
        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 0 0-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 0 15.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 0 19.288 0"/></svg>
        Members
        <span class="nav-badge">1,248</span>
      </a>
      <a href="{{ route('certificates.index') }}" class="nav-item {{ request()->routeIs('certificates.index') ? 'active' : '' }}">
        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 0 01.946-.806 3.42 3.42 0 0 14.438 0 3.42 3.42 0 0 01.946.806 3.42 3.42 0 0 13.138 3.138 3.42 3.42 0 0 0.806 1.946 3.42 3.42 0 0 10 4.438 3.42 3.42 0 0 0-.806 1.946 3.42 3.42 0 0 1-3.138 3.138 3.42 3.42 0 0 0-1.946.806 3.42 3.42 0 0 1-4.438 0 3.42 3.42 0 0 0-1.946-.806 3.42 3.42 0 0 1-3.138-3.138 3.42 3.42 0 0 0-.806-1.946 3.42 3.42 0 0 10-4.438 3.42 3.42 0 0 0.806-1.946 3.42 3.42 0 0 13.138-3.138z"/></svg>
        Certificates
        <span class="nav-badge gold">5</span>
      </a>
      <a href="{{ route('templates.index') }}" class="nav-item {{ request()->routeIs('templates.index') ? 'active' : '' }}">
        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 0 11-1h14a1 1 0 0 11 1v2a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5zM4 13a1 1 0 0 11-1h6a1 1 0 0 11 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-6zM16 13a1 1 0 0 11-1h2a1 1 0 0 11 1v6a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-6z"/></svg>
        Templates
      </a>
      <a href="{{ route('signatures.index') }}" class="nav-item {{ request()->routeIs('signatures.index') ? 'active' : '' }}">
        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 1 13.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
        Signatures
      </a>
    </div>

    <div class="nav-section">
     
      <a href="{{ route('bulk.index') }}" class="nav-item {{ request()->routeIs('bulk.index') ? 'active' : '' }}">
        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 0 03 3h10a3 3 0 0 03-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
        Bulk Import
        <span class="pulse"></span>
      </a>
      <a href="{{ route('verification.index') }}" class="nav-item {{ request()->routeIs('verification.index') ? 'active' : '' }}">
        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0 112 2.944a11.955 11.955 0 0 1-8.618 3.04A12.02 12.02 0 0 03 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
        Verification
      </a>
      <a href="{{ route('reports.index') }}" class="nav-item {{ request()->routeIs('reports.index') ? 'active' : '' }}">
        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v6a2 2 0 0 02 2h2a2 2 0 0 02-2zm0 0V9a2 2 0 0 12-2h2a2 2 0 0 12 2v10m-6 0a2 2 0 0 02 2h2a2 2 0 0 02-2m0 0V5a2 2 0 0 12-2h2a2 2 0 0 12 2v14a2 2 0 0 0-2 2h-2a2 2 0 0 0-2-2z"/></svg>
        Reports
      </a>
    </div>

    <div class="nav-section">
      
      <a href="{{ route('users.index') }}" class="nav-item {{ request()->routeIs('users.index') ? 'active' : '' }}">
        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 1 10 5.292M15 21H3v-1a6 6 0 0 112 0v1zm0 0h6v-1a6 6 0 0 0-9-5.197M13 7a4 4 0 1 1-8 0 4 4 0 0 18 0z"/></svg>
        Users & Roles
      </a>
      <a href="{{ route('audit.index') }}" class="nav-item {{ request()->routeIs('audit.index') ? 'active' : '' }}">
        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 02 2h10a2 2 0 0 02-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 02 2h2a2 2 0 0 02-2M9 5a2 2 0 0 12-2h2a2 2 0 0 12 2"/></svg>
        Audit Logs
      </a>
      <a href="{{ route('settings.index') }}" class="nav-item {{ request()->routeIs('settings.index') ? 'active' : '' }}">
        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 02.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 01.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0-2.573-1.065c-1.543.94-3.31-.826 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><circle cx="12" cy="12" r="3" stroke-width="2"/></svg>
        Settings
      </a>
    </div>
  </nav>
</aside>

<!-- ═══ MAIN ═══ -->
<div class="main">

  <!-- ─── HEADER ─── -->
  <header class="header">
    <button class="header-hamburger" onclick="toggleSidebar()">
      <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
    </button>
    <div style="flex:1">
      <div class="page-title" id="headerTitle">@yield('page-title', 'Dashboard')</div>
    </div>
    <div class="header-actions">
      <div class="header-search">
        <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8" stroke-width="2"/><path d="m21 21-4.35-4.35" stroke-width="2" stroke-linecap="round"/></svg>
        <input placeholder="Search members, certificates…" id="searchInput">
      </div>
      <div class="header-btn" title="Notifications">
        <svg width="17" height="17" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0 118 14.158V11a6.002 6.002 0 0 0-4-5.659V5a2 2 0 1 0-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 1 1-6 0v-1m6 0H9"/></svg>
        <span class="notif-dot"></span>
      </div>
      <div class="header-btn" title="Help">
        <svg width="17" height="17" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="2"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.09 9a3 3 0 0 15.83 1c0 2-3 3-3 3"/><circle cx="12" cy="17" r=".5" fill="currentColor"/></svg>
      </div>
      <div class="header-user" onclick="toggleDropdown()">
        <div class="user-avatar-header">{{ Auth::user() ? strtoupper(substr(Auth::user()->name, 0, 2)) : 'SA' }}</div>
        <div class="user-info-header">
          <strong>{{ Auth::user() ? Auth::user()->name : 'Sr. Admin' }}</strong>
          <span>{{ Auth::user() ? Auth::user()->email : 'System Administrator' }}</span>
        </div>
        <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-left:8px;flex-shrink:0"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
      </div>
      <div class="header-dropdown" id="headerDropdown">
        <a href="{{ route('profile.index') }}" class="header-dropdown-item">
          <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
          My Profile
        </a>
        <a href="{{ route('settings.index') }}" class="header-dropdown-item">
          <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 02.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 01.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0-2.573-1.065c-1.543.94-3.31-.826 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><circle cx="12" cy="12" r="3" stroke-width="2"/></svg>
          Settings
        </a>
        <div class="header-dropdown-divider"></div>
        <form method="POST" action="{{ route('logout') }}" style="margin:0;">
          @csrf
          <button type="submit" class="header-dropdown-item danger" style="width:100%; text-align:left; background:none; border:none; cursor:pointer;">
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
            Logout
          </button>
        </form>
      </div>
    </div>
  </header>

  <!-- ─── CONTENT ─── -->
  <div class="content">
    @yield('content')
  </div>
</div>

<!-- ═══ SCRIPTS ═══ -->
<script>
  // ─── Sidebar mobile ───
  function toggleSidebar(){
    document.getElementById('sidebar').classList.toggle('open');
    document.getElementById('sidebarOverlay').classList.toggle('show');
  }
  function closeSidebar(){
    document.getElementById('sidebar').classList.remove('open');
    document.getElementById('sidebarOverlay').classList.remove('show');
  }

  // ─── Modals ───
  function openModal(id){ document.getElementById(id).classList.add('open'); }
  function closeModal(id){ document.getElementById(id).classList.remove('open'); }
  document.querySelectorAll('.modal-overlay').forEach(o=>{
    o.addEventListener('click',e=>{ if(e.target===o) o.classList.remove('open'); });
  });

  // ─── Tabs ───
  function setTab(el, tab){
    el.closest('.tabs').querySelectorAll('.tab').forEach(t=>t.classList.remove('active'));
    el.classList.add('active');
  }

  // ─── Toggle buttons ───
  document.querySelectorAll('.toggle').forEach(btn=>{
    btn.addEventListener('click',()=>btn.classList.toggle('on'));
  });

  // ─── ESC to close modal ───
  document.addEventListener('keydown',e=>{
    if(e.key==='Escape'){
      document.querySelectorAll('.modal-overlay.open').forEach(m=>m.classList.remove('open'));
      document.getElementById('headerDropdown').classList.remove('show');
    }
  });

  // ─── Header user dropdown ───
  function toggleDropdown() {
    const dropdown = document.getElementById('headerDropdown');
    dropdown.classList.toggle('show');
  }

  // Close dropdown when clicking outside
  document.addEventListener('click', (e) => {
    const dropdown = document.getElementById('headerDropdown');
    const userBtn = document.querySelector('.header-user');
    if (!userBtn.contains(e.target) && !dropdown.contains(e.target)) {
      dropdown.classList.remove('show');
    }
  });
</script>

</body>
</html>
