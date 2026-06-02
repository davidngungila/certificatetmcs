@extends('layouts.app')

@section('page-title', 'Certificate Template Designer')

@section('content')
<style>
    .designer-container {
        display: grid;
        grid-template-columns: 300px 1fr;
        gap: 16px;
        margin-top: 16px;
    }

    .designer-sidebar {
        background: var(--glass-heavy);
        border: 1px solid var(--glass-border);
        border-radius: var(--radius);
        padding: 16px;
        box-shadow: var(--glass-shadow);
    }

    .designer-sidebar h3 {
        font-size: 14px;
        font-weight: 800;
        color: var(--navy);
        margin-bottom: 12px;
    }

    .element-item {
        background: var(--gray-50);
        border: 1px solid var(--gray-200);
        border-radius: 8px;
        padding: 10px 14px;
        margin-bottom: 8px;
        cursor: grab;
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        color: var(--navy);
        transition: all var(--transition);
    }

    .element-item:hover {
        background: rgba(37,99,235,0.06);
        border-color: var(--accent);
    }

    .designer-canvas-wrapper {
        background: var(--gray-50);
        border: 1px solid var(--glass-border);
        border-radius: var(--radius);
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: auto;
    }

    .certificate-canvas {
        width: 1123px;
        height: 794px; /* A4 landscape in pixels at 96 DPI */
        background: linear-gradient(135deg, #0a1628 0%, #1a3260 100%);
        border: 8px solid #f59e0b;
        position: relative;
        box-shadow: 0 10px 50px rgba(0,0,0,0.3);
    }

    .canvas-element {
        position: absolute;
        cursor: move;
        min-width: 100px;
        min-height: 30px;
        padding: 8px;
        border: 2px dashed transparent;
        transition: border 0.1s;
    }

    .canvas-element:hover, .canvas-element.selected {
        border-color: #f59e0b;
    }

    .canvas-element.text-element {
        color: white;
    }

    .format-toolbar {
        background: white;
        border: 1px solid var(--gray-200);
        border-radius: 8px;
        padding: 10px;
        margin-bottom: 12px;
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
    }

    .format-btn {
        width: 32px;
        height: 32px;
        border-radius: 6px;
        border: 1px solid var(--gray-200);
        background: white;
        cursor: pointer;
        transition: all var(--transition);
        font-size: 14px;
    }

    .format-btn:hover, .format-btn.active {
        background: var(--accent);
        color: white;
        border-color: var(--accent);
    }

    .format-select {
        padding: 4px 8px;
        border-radius: 6px;
        border: 1px solid var(--gray-200);
        font-family: inherit;
    }

    .designer-actions {
        margin-top: 20px;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    @media (max-width: 1200px) {
        .designer-container {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="breadcrumb">
    <a href="{{ route('templates.index') }}">Templates</a>
    <span class="breadcrumb-sep">/</span>
    <span class="breadcrumb-current">Designer</span>
</div>
<div class="section-header" style="margin-bottom:16px">
    <div>
        <div class="section-title">Certificate Template Designer</div>
        <div class="section-subtitle">Design custom certificate layouts with drag & drop, rich text, and images</div>
    </div>
    <div class="designer-actions">
        <button class="btn btn-secondary" onclick="resetDesign()">Reset to Default</button>
        <button class="btn btn-primary" onclick="saveDesign()">💾 Save Template</button>
    </div>
</div>

<div class="designer-container">
    <div class="designer-sidebar">
        <h3>📦 Add Elements</h3>
        <div class="element-item" draggable="true" data-type="text" data-default="Certificate of Excellence">
            <span>🎯</span> Text
        </div>
        <div class="element-item" draggable="true" data-type="dynamic-text" data-default="{{name}}">
            <span>👤</span> Recipient Name (Dynamic)
        </div>
        <div class="element-item" draggable="true" data-type="dynamic-text" data-default="{{certificate_type}}">
            <span>📜</span> Certificate Type (Dynamic)
        </div>
        <div class="element-item" draggable="true" data-type="dynamic-text" data-default="{{date}}">
            <span>📅</span> Date (Dynamic)
        </div>
        <div class="element-item" draggable="true" data-type="signature">
            <span>✍️</span> Signature
        </div>
        <div class="element-item" draggable="true" data-type="image">
            <span>🖼️</span> Image/Logo
        </div>

        <h3 style="margin-top:20px">🎨 Format Selected</h3>
        <div class="format-toolbar">
            <select class="format-select" id="fontFamily" onchange="applyFormat('fontFamily', this.value)">
                <option value="Georgia, serif">Georgia</option>
                <option value="'Times New Roman', serif">Times New Roman</option>
                <option value="Arial, sans-serif">Arial</option>
                <option value="'Courier New', monospace">Courier</option>
                <option value="Manrope, sans-serif">Manrope</option>
            </select>
            <select class="format-select" id="fontSize" onchange="applyFormat('fontSize', this.value + 'px')">
                <option value="12">12px</option>
                <option value="16">16px</option>
                <option value="20">20px</option>
                <option value="24">24px</option>
                <option value="36">36px</option>
                <option value="48">48px</option>
                <option value="64">64px</option>
            </select>
            <button class="format-btn" onclick="applyFormat('fontWeight', 'bold')" title="Bold">B</button>
            <button class="format-btn" onclick="applyFormat('fontStyle', 'italic')" title="Italic">I</button>
            <button class="format-btn" onclick="applyFormat('textDecoration', 'underline')" title="Underline">U</button>
            <button class="format-btn" onclick="applyFormat('textAlign', 'left')" title="Left Align">◀</button>
            <button class="format-btn" onclick="applyFormat('textAlign', 'center')" title="Center Align">●</button>
            <button class="format-btn" onclick="applyFormat('textAlign', 'right')" title="Right Align">▶</button>
            <input type="color" id="textColor" value="#ffffff" onchange="applyFormat('color', this.value)" style="width:32px;height:32px;border-radius:6px;padding:0;border:1px solid var(--gray-200);cursor:pointer" title="Text Color">
            <input type="color" id="bgColor" value="#00000000" onchange="applyFormat('backgroundColor', this.value)" style="width:32px;height:32px;border-radius:6px;padding:0;border:1px solid var(--gray-200);cursor:pointer" title="Background Color">
            <button class="format-btn btn-danger" onclick="deleteSelected()" style="margin-left:auto;color:var(--rose)">🗑️</button>
        </div>

        <h3 style="margin-top:20px">🎯 Quick Templates</h3>
        <button class="btn btn-secondary" style="width:100%;margin-bottom:8px" onclick="loadPreset('elegant')">Elegant Default</button>
        <button class="btn btn-secondary" style="width:100%" onclick="loadPreset('modern')">Modern Minimal</button>
    </div>

    <div>
        <div class="designer-canvas-wrapper">
            <div class="certificate-canvas" id="certificateCanvas">
                <div class="canvas-element text-element selected" style="left: 100px; top: 100px; font-size: 36px; font-weight: bold; color: #f59e0b; font-family: Georgia, serif; text-align: center; width: 923px;">
                    Certificate of Excellence
                </div>
                <div class="canvas-element text-element" style="left: 100px; top: 170px; font-size: 18px; color: rgba(255,255,255,0.8); font-family: Georgia, serif; text-align: center; width: 923px;">
                    This certificate is proudly presented to
                </div>
                <div class="canvas-element text-element" style="left: 100px; top: 220px; font-size: 48px; color: white; font-weight: bold; font-family: 'Times New Roman', serif; text-align: center; width: 923px;">
                    {{name}}
                </div>
                <div class="canvas-element text-element" style="left: 100px; top: 320px; font-size: 24px; color: #f59e0b; font-family: Georgia, serif; text-align: center; width: 923px;">
                    {{certificate_type}}
                </div>
                <div class="canvas-element text-element" style="left: 100px; top: 420px; font-size: 16px; color: rgba(255,255,255,0.7); font-family: Georgia, serif; text-align: center; width: 923px;">
                    Issued on: {{date}}
                </div>
                <div class="canvas-element text-element" style="left: 120px; top: 550px; font-size: 14px; color: white; font-family: Georgia, serif; text-align: center; width: 350px;">
                    <div style="border-bottom:1px solid white; margin-bottom:8px; padding-bottom:8px">Sr. Admin</div>
                    System Administrator
                </div>
                <div class="canvas-element text-element" style="left: 653px; top: 550px; font-size: 14px; color: white; font-family: Georgia, serif; text-align: center; width: 350px;">
                    <div style="border-bottom:1px solid white; margin-bottom:8px; padding-bottom:8px">TMCS Leadership</div>
                    Organizational Lead
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SortableJS for drag and drop -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

<script>
let selectedElement = null;
let isDragging = false;
let offsetX = 0;
let offsetY = 0;

// Initialize drag & drop on canvas elements
document.addEventListener('DOMContentLoaded', () => {
    initCanvas();
});

function initCanvas() {
    const canvas = document.getElementById('certificateCanvas');
    
    // Make elements draggable
    canvas.querySelectorAll('.canvas-element').forEach(el => {
        el.addEventListener('mousedown', startDrag);
        el.addEventListener('click', selectElement);
    });

    // Handle adding elements from sidebar
    document.querySelectorAll('.element-item').forEach(item => {
        item.addEventListener('dragstart', handleDragStart);
    });
    canvas.addEventListener('dragover', handleDragOver);
    canvas.addEventListener('drop', handleDrop);
}

function handleDragStart(e) {
    e.dataTransfer.setData('type', e.target.closest('.element-item').dataset.type);
    e.dataTransfer.setData('default', e.target.closest('.element-item').dataset.default || 'New Text');
}

function handleDragOver(e) {
    e.preventDefault();
}

function handleDrop(e) {
    const canvas = document.getElementById('certificateCanvas');
    const rect = canvas.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    const type = e.dataTransfer.getData('type');
    const defaultValue = e.dataTransfer.getData('default');

    addElement(x, y, type, defaultValue);
}

function addElement(x, y, type, defaultValue) {
    const canvas = document.getElementById('certificateCanvas');
    const newEl = document.createElement('div');
    newEl.className = 'canvas-element text-element';
    newEl.style.left = x + 'px';
    newEl.style.top = y + 'px';
    newEl.style.fontSize = '18px';
    newEl.style.color = 'white';
    newEl.style.textAlign = 'center';
    newEl.style.width = 'auto';
    newEl.textContent = defaultValue;
    newEl.addEventListener('mousedown', startDrag);
    newEl.addEventListener('click', selectElement);
    newEl.setAttribute('contenteditable', 'true');
    canvas.appendChild(newEl);
    selectElement({ target: newEl });
}

function startDrag(e) {
    if (e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA') return;
    
    const el = e.target.closest('.canvas-element');
    selectedElement = el;
    document.querySelectorAll('.canvas-element').forEach(e => e.classList.remove('selected'));
    el.classList.add('selected');

    isDragging = true;
    const rect = el.getBoundingClientRect();
    offsetX = e.clientX - rect.left;
    offsetY = e.clientY - rect.top;

    document.addEventListener('mousemove', drag);
    document.addEventListener('mouseup', stopDrag);
}

function drag(e) {
    if (!isDragging || !selectedElement) return;
    const canvas = document.getElementById('certificateCanvas');
    const rect = canvas.getBoundingClientRect();
    const x = e.clientX - rect.left - offsetX;
    const y = e.clientY - rect.top - offsetY;
    selectedElement.style.left = x + 'px';
    selectedElement.style.top = y + 'px';
}

function stopDrag() {
    isDragging = false;
    document.removeEventListener('mousemove', drag);
    document.removeEventListener('mouseup', stopDrag);
}

function selectElement(e) {
    const el = e.target.closest('.canvas-element');
    selectedElement = el;
    document.querySelectorAll('.canvas-element').forEach(el => el.classList.remove('selected'));
    if (el) {
        el.classList.add('selected');
        
        // Update format toolbar
        const computedStyle = getComputedStyle(el);
        document.getElementById('fontSize').value = parseInt(computedStyle.fontSize);
        document.getElementById('textColor').value = rgbToHex(computedStyle.color);
    }
}

function applyFormat(property, value) {
    if (!selectedElement) {
        alert('Please select an element first');
        return;
    }
    if (property === 'fontFamily') {
        selectedElement.style.fontFamily = value;
    } else if (property === 'fontSize') {
        selectedElement.style.fontSize = value;
    } else if (property === 'textAlign') {
        selectedElement.style.textAlign = value;
    } else if (property === 'fontWeight') {
        if (selectedElement.style.fontWeight === 'bold') {
            selectedElement.style.fontWeight = 'normal';
        } else {
            selectedElement.style.fontWeight = 'bold';
        }
    } else if (property === 'fontStyle') {
        if (selectedElement.style.fontStyle === 'italic') {
            selectedElement.style.fontStyle = 'normal';
        } else {
            selectedElement.style.fontStyle = 'italic';
        }
    } else if (property === 'textDecoration') {
        if (selectedElement.style.textDecoration === 'underline') {
            selectedElement.style.textDecoration = 'none';
        } else {
            selectedElement.style.textDecoration = 'underline';
        }
    } else if (property === 'color') {
        selectedElement.style.color = value;
    } else if (property === 'backgroundColor') {
        selectedElement.style.backgroundColor = value;
    }
}

function deleteSelected() {
    if (!selectedElement) {
        alert('Please select an element to delete');
        return;
    }
    if (confirm('Are you sure you want to delete this element?')) {
        selectedElement.remove();
        selectedElement = null;
    }
}

function saveDesign() {
    const canvas = document.getElementById('certificateCanvas');
    const elements = [];
    canvas.querySelectorAll('.canvas-element').forEach(el => {
        elements.push({
            tag: el.tagName,
            content: el.innerHTML,
            left: el.style.left,
            top: el.style.top,
            width: el.style.width,
            fontFamily: el.style.fontFamily,
            fontSize: el.style.fontSize,
            fontWeight: el.style.fontWeight,
            fontStyle: el.style.fontStyle,
            textDecoration: el.style.textDecoration,
            textAlign: el.style.textAlign,
            color: el.style.color,
            backgroundColor: el.style.backgroundColor
        });
    });
    localStorage.setItem('certificateTemplate', JSON.stringify(elements));
    alert('Template saved!');
}

function resetDesign() {
    if (confirm('Are you sure you want to reset to default?')) {
        location.reload();
    }
}

function loadPreset(preset) {
    if (confirm('Load preset? This will replace your current design.')) {
        location.reload();
    }
}

function rgbToHex(rgb) {
    if (!rgb) return '#000000';
    let rgba = rgb.match(/^rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*(\d+(?:\.\d+)?))?\)$/);
    if (!rgba) return rgb;
    return "#" + hex(rgba[1]) + hex(rgba[2]) + hex(rgba[3]);
}

function hex(x) {
    const hexDigits = new Array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "a", "b", "c", "d", "e", "f");
    return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
}
</script>
@endsection
