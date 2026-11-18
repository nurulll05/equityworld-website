
document.addEventListener('DOMContentLoaded', () => {
    if (document.body.dataset.visualEditor !== 'true') return;

    let selectedElement = null;
    let selectedType = 'text';
    let isLegacyHero = false;

    const saveUrl = document.body.dataset.cmsSaveUrl;
    const csrfToken = document.body.dataset.csrf;

    const style = document.createElement('style');

    style.textContent = `
        [data-cms-editable] {
            outline: 1px dashed rgba(59, 130, 246, .55);
            outline-offset: 4px;
            cursor: pointer;
        }

        [data-cms-editable]:hover {
            outline: 2px dashed #3b82f6;
        }

        [data-cms-editable].cms-selected {
            outline: 2px solid #2563eb !important;
            outline-offset: 4px;
        }

        #cms-modal input,
        #cms-modal select,
        #cms-modal textarea {
            box-sizing: border-box;
            width: 100%;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            padding: 9px 10px;
            font-size: 13px;
            color: #1e293b;
            background: #fff;
            min-width: 0;
        }

        #cms-modal input[type="color"] {
            height: 38px;
            width: 42px;
            padding: 3px;
            cursor: pointer;
            flex-shrink: 0;
        }

        #cms-modal label {
            display: block;
            margin-bottom: 5px;
            font-size: 11px;
            font-weight: 600;
            color: #475569;
        }

        #cms-modal .cms-field {
            min-width: 0;
        }

        #cms-modal .cms-section-title {
            font-size: 12px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 10px;
        }

        #cms-modal .cms-hint {
            font-size: 10px;
            color: #64748b;
            margin-top: 4px;
        }

        /* Stroke tombol dibuat konsisten */
        #cms-modal button {
            box-sizing: border-box;
            border-width: 1px;
            border-style: solid;
            border-color: #cbd5e1;
            box-shadow: none !important;
            outline: none;
            appearance: none;
        }

        #cms-modal button:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, .12) !important;
        }

        /* Baris segmen hero */
        #cms-modal .cms-segment {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 42px 40px;
            gap: 10px;
            align-items: center;
            padding: 12px;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            background: #f8fafc;
        }

        #cms-modal .cms-segment textarea {
            min-height: 38px;
            resize: vertical;
        }

        /* Tombol hapus */
        #cms-modal .cms-remove-segment {
            height: 40px;
            width: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            border: 1px solid #cbd5e1;
            border-radius: 9px;
            color: #dc2626;
            background: #fff;
            cursor: pointer;
            transition: background .2s ease, border-color .2s ease;
        }

        #cms-modal .cms-remove-segment:hover {
            background: #fef2f2;
            border-color: #fecaca;
        }

        /* Checkbox pindah baris */
        #cms-modal .cms-segment-break-label {
            grid-column: 1 / -1;
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 8px 0 0 2px !important;
            padding: 2px 0 0;
            cursor: pointer;
        }

        #cms-modal .cms-segment-break-label input {
            flex: 0 0 14px;
            width: 14px !important;
            height: 14px;
            margin: 0;
            padding: 0;
        }

        #cms-modal .cms-segment-break-label span {
            margin: 0;
        }

        #cms-modal .cms-typography {
            display: grid;
            grid-template-columns: 1.2fr .8fr 1fr;
            gap: 9px;
        }

        #cms-modal .cms-typography label {
            white-space: nowrap;
        }

        @media (max-width: 480px) {
            #cms-modal .cms-typography {
                grid-template-columns: 1fr 1fr;
            }
        }
    `;

    document.head.appendChild(style);

    const toolbar = document.createElement('div');

    toolbar.id = 'cms-toolbar';
    toolbar.className =
        'fixed z-[99999] hidden items-center gap-1 rounded-lg border border-slate-700 bg-slate-900 p-1 shadow-lg';

    toolbar.innerHTML = `
        <button type="button" data-action="edit"
            class="rounded-md bg-blue-600 px-3 py-2 text-xs font-semibold text-white hover:bg-blue-700">
            ✎  Edit
        </button>
    `;

    document.body.appendChild(toolbar);

    // MODAL
    const modal = document.createElement('div');

    modal.id = 'cms-modal';
    modal.className =
        'fixed inset-0 z-[100000] hidden items-center justify-center bg-slate-950/60 p-4';

    modal.innerHTML = `
        <div class="w-full max-w-lg max-h-[85vh] overflow-y-auto rounded-xl bg-white shadow-2xl">

            <div class="sticky top-0 z-10 flex items-center justify-between border-b border-slate-200 bg-white px-5 py-4">
                <div>
                    <h2 id="cms-modal-title"
                        class="text-base font-bold text-slate-800">
                        Edit Elemen
                    </h2>

                    <p id="cms-modal-description"
                        class="mt-1 text-xs text-slate-500">
                        Atur konten website.
                    </p>
                </div>

                <button type="button" data-close
                    class="rounded-lg px-3 py-2 text-xl text-slate-500 hover:bg-slate-100">
                    &times;
                </button>
            </div>

            <form id="cms-edit-form" class="space-y-4 p-5">

                <div id="cms-fields"></div>

                <p id="cms-message"
                    class="hidden rounded-lg p-3 text-xs"></p>

                <div class="flex justify-between items-center gap-2 border-t border-slate-200 pt-4">

                    <div class="flex gap-2">
                        <button type="button" data-close
                            class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-50">
                            Batal
                        </button>

                        <button type="submit" id="cms-save-button"
                            class="rounded-lg bg-blue-600 px-5 py-2 text-sm font-semibold text-white hover:bg-blue-700">
                            Simpan Perubahan
                        </button>
                    </div>

                </div>
            </form>
        </div>
    `;

    document.body.appendChild(modal);

    const form = modal.querySelector('#cms-edit-form');
    const fieldsContainer = modal.querySelector('#cms-fields');
    const message = modal.querySelector('#cms-message');
    const saveButton = modal.querySelector('#cms-save-button');

    // HELPER
    function escapeHtml(value) {
        return String(value ?? '').replace(/[&<>"']/g, char => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        })[char]);
    }

    function getValue(selector, fallback = '') {
        return fieldsContainer.querySelector(selector)?.value ?? fallback;
    }

    function getColor(selector, fallback = '#FFFFFF') {
        const value = getValue(selector, fallback);

        return /^#[0-9A-Fa-f]{6}$/.test(value)
            ? value
            : fallback;
    }

    function getElementKey(element) {
        return element.dataset.cmsEditable?.trim() || '';
    }

    function getElementType(element) {
        const type = element.dataset.cmsType || 'text';

        return ['text', 'image', 'button', 'background'].includes(type)
            ? type
            : 'text';
    }

    function getElementLabel(element) {
        return element.dataset.cmsLabel || 'Elemen Website';
    }

    function getInlineColor(element) {
        const color = getComputedStyle(element).color;
        const match = color.match(/\d+/g);

        if (!match || match.length < 3) return '#000000';

        return '#' + match.slice(0, 3)
            .map(value => Number(value).toString(16).padStart(2, '0'))
            .join('');
    }

    function getBackgroundColor(element) {
        const color = getComputedStyle(element).backgroundColor;
        const match = color.match(/\d+/g);

        if (!match || match.length < 3) return '#FFFFFF';

        return '#' + match.slice(0, 3)
            .map(value => Number(value).toString(16).padStart(2, '0'))
            .join('');
    }

    function showMessage(text, type = 'error') {
        message.textContent = text;

        message.className = type === 'success'
            ? 'rounded-lg bg-green-50 p-3 text-xs text-green-700'
            : 'rounded-lg bg-red-50 p-3 text-xs text-red-700';
    }

    // PILIH ELEMEN
    function selectElement(element) {
        document.querySelectorAll('.cms-selected').forEach(item => {
            item.classList.remove('cms-selected');
        });

        selectedElement = element;
        selectedElement.classList.add('cms-selected');

        selectedType = getElementType(element);

        isLegacyHero =
            getElementKey(element) === 'home.hero.title' &&
            !element.hasAttribute('data-cms-type');

        const rect = element.getBoundingClientRect();

        toolbar.style.display = 'flex';
        toolbar.style.top = `${Math.max(8, rect.top - 45)}px`;

        toolbar.style.left = `${Math.max(
            8,
            Math.min(rect.left, window.innerWidth - 160)
        )}px`;
    }

    document.querySelectorAll('[data-cms-editable]').forEach(element => {
        element.addEventListener('click', event => {
            event.preventDefault();
            event.stopPropagation();

            selectElement(element);
        });
    });

    // BARIS SEGMEN HERO
    function updateSegmentNumbers() {
        fieldsContainer.querySelectorAll('.cms-segment').forEach((row, index) => {
            row.dataset.index = index + 1;
        });
    }

    function addLegacySegment(segment = {}) {
        const container = fieldsContainer.querySelector('#cms-segments');

        if (!container) return;

        const row = document.createElement('div');
        row.className = 'cms-segment';

        // Input teks
        const text = document.createElement('textarea');
        text.className = 'cms-segment-text';
        text.rows = 1;
        text.maxLength = 120;
        text.placeholder = 'Masukkan teks...';
        text.value = segment.text || '';

        // Pemilih warna
        const color = document.createElement('input');
        color.type = 'color';
        color.className = 'cms-segment-color';
        color.value = /^#[0-9A-Fa-f]{6}$/.test(segment.color)
            ? segment.color
            : '#FFFFFF';
        color.title = 'Warna teks';

        // Tombol hapus dengan ikon tempat sampah
        const remove = document.createElement('button');
        remove.type = 'button';
        remove.className = 'cms-remove-segment';
        remove.title = 'Hapus segmen';
        remove.setAttribute('aria-label', 'Hapus segmen');

        remove.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg"
                width="18" height="18" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="1.8"
                stroke-linecap="round" stroke-linejoin="round"
                aria-hidden="true">
                <path d="M3 6h18"/>
                <path d="M8 6V4h8v2"/>
                <path d="M19 6l-1 14H6L5 6"/>
                <path d="M10 11v5M14 11v5"/>
            </svg>
        `;

        remove.addEventListener('click', event => {
            event.preventDefault();
            event.stopPropagation();

            row.remove();
            updateSegmentNumbers();
        });

        // Checkbox pindah baris
        const breakLabel = document.createElement('label');
        breakLabel.className = 'cms-segment-break-label';

        const lineBreak = document.createElement('input');
        lineBreak.type = 'checkbox';
        lineBreak.className = 'cms-segment-break';
        lineBreak.checked = Boolean(segment.line_break_after);

        const breakText = document.createElement('span');
        breakText.className = 'text-[10px] font-normal text-slate-500';
        breakText.textContent = 'Pindah ke baris berikutnya';

        breakLabel.append(lineBreak, breakText);

        row.append(text, color, remove, breakLabel);

        container.appendChild(row);

        updateSegmentNumbers();
    }

    // =====================================================
    // FIELD KHUSUS HERO LAMA
    // =====================================================

    function renderLegacyHeroFields() {
        fieldsContainer.innerHTML = `
            <div>
                <div class="mb-3 flex items-center justify-between">
                    <div>
                        <h3 class="cms-section-title mb-0">Konten Judul</h3>
                        <p class="cms-hint">Atur teks dan warna setiap baris.</p>
                    </div>

                    <button type="button" id="cms-add-segment"
                        class="rounded-lg bg-blue-50 px-3 py-2 text-xs font-semibold text-blue-700 hover:bg-blue-100">
                        + Tambah Baris
                    </button>
                </div>

                <div id="cms-segments" class="space-y-2"></div>
            </div>

            <div class="border-t border-slate-200 pt-4">
                <h3 class="cms-section-title">Gaya Teks</h3>

                <div class="cms-typography">

                    <div>
                        <label>Font</label>
                        <select id="cms-font">
                            <option value="Manrope">Manrope</option>
                            <option value="DM Sans">DM Sans</option>
                            <option value="Arial">Arial</option>
                            <option value="Georgia">Georgia</option>
                        </select>
                    </div>

                    <div>
                        <label>Ukuran (px)</label>
                        <input id="cms-size" type="number"
                            min="20" max="100"
                            value="${parseInt(selectedElement.style.fontSize) || 54}">
                    </div>

                    <div>
                        <label>Ketebalan</label>
                        <select id="cms-weight">
                            <option value="400">Normal</option>
                            <option value="500">Medium</option>
                            <option value="600">Semi Bold</option>
                            <option value="700">Bold</option>
                            <option value="800">Extra Bold</option>
                            <option value="900">Black</option>
                        </select>
                    </div>

                </div>
            </div>
        `;

        const spans = selectedElement.querySelectorAll(':scope > span');

        if (spans.length) {
            spans.forEach(span => {
                addLegacySegment({
                    text: span.textContent.trim(),
                    color: getInlineColor(span),
                    line_break_after:
                        span.nextElementSibling?.tagName === 'BR'
                });
            });
        } else {
            addLegacySegment({
                text: selectedElement.textContent.trim(),
                color: '#FFFFFF',
                line_break_after: false
            });
        }

        fieldsContainer.querySelector('#cms-add-segment')
            .addEventListener('click', () => {
                addLegacySegment({
                    text: '',
                    color: '#FFFFFF',
                    line_break_after: false
                });
            });

        fieldsContainer.querySelector('#cms-font').value =
            selectedElement.style.fontFamily
                .replace(/['"]/g, '')
                .split(',')[0]
                .trim() || 'Manrope';

        fieldsContainer.querySelector('#cms-weight').value =
            selectedElement.style.fontWeight || '800';
    }

    // EDITOR TEKS UNIVERSAL
    function renderTextFields() {
        fieldsContainer.innerHTML = `
            <div class="cms-field">
                <label>Isi Teks</label>
                <textarea id="cms-content" rows="3"
                    maxlength="5000">${escapeHtml(selectedElement.textContent.trim())}</textarea>
            </div>

            <div class="border-t border-slate-200 pt-4">
                <h3 class="cms-section-title">Gaya Teks</h3>

                <div class="cms-field mb-3">
                    <label>Warna Teks</label>
                    <input id="cms-color" type="color"
                        value="${getInlineColor(selectedElement)}">
                </div>

                <div class="cms-typography">
                    <div>
                        <label>Font</label>
                        <select id="cms-font">
                            <option value="Manrope">Manrope</option>
                            <option value="DM Sans">DM Sans</option>
                            <option value="Arial">Arial</option>
                            <option value="Georgia">Georgia</option>
                        </select>
                    </div>

                    <div>
                        <label>Ukuran (px)</label>
                        <input id="cms-size" type="number"
                            min="8" max="120"
                            value="${parseInt(selectedElement.style.fontSize) || 24}">
                    </div>

                    <div>
                        <label>Ketebalan</label>
                        <select id="cms-weight">
                            <option value="400">Normal</option>
                            <option value="500">Medium</option>
                            <option value="600">Semi Bold</option>
                            <option value="700">Bold</option>
                            <option value="800">Extra Bold</option>
                            <option value="900">Black</option>
                        </select>
                    </div>
                </div>

                <div class="cms-field mt-3">
                    <label>Perataan Teks</label>
                    <select id="cms-align">
                        <option value="left">Kiri</option>
                        <option value="center">Tengah</option>
                        <option value="right">Kanan</option>
                    </select>
                </div>
            </div>
        `;

        fieldsContainer.querySelector('#cms-font').value =
            selectedElement.style.fontFamily
                .replace(/['"]/g, '')
                .split(',')[0]
                .trim() || 'Manrope';

        fieldsContainer.querySelector('#cms-weight').value =
            selectedElement.style.fontWeight || '400';

        fieldsContainer.querySelector('#cms-align').value =
            selectedElement.style.textAlign || 'left';
    }

    // EDITOR GAMBAR
    function renderImageFields() {
        fieldsContainer.innerHTML = `
            <div class="cms-field">
                <label>Alamat Gambar (URL)</label>
                <input id="cms-image-src" type="text"
                    value="${escapeHtml(selectedElement.getAttribute('src') || '')}"
                    placeholder="Masukkan URL gambar">
            </div>

            <div class="cms-field">
                <label>Deskripsi Gambar</label>
                <input id="cms-image-alt" type="text"
                    value="${escapeHtml(selectedElement.getAttribute('alt') || '')}"
                    placeholder="Deskripsi gambar">
            </div>
        `;
    }

    // EDITOR TOMBOL
    function renderButtonFields() {
        fieldsContainer.innerHTML = `
            <div class="cms-field">
                <label>Label Tombol</label>
                <input id="cms-button-label" type="text"
                    value="${escapeHtml(
                        Array.from(selectedElement.childNodes)
                            .filter(node => node.nodeType === Node.TEXT_NODE)
                            .map(node => node.textContent)
                            .join('')
                            .trim()
                    )}"
                    maxlength="255">
            </div>

            <div class="cms-field">
                <label>Alamat Tujuan (URL)</label>
                <input id="cms-button-url" type="text"
                    value="${escapeHtml(selectedElement.getAttribute('href') || '')}"
                    maxlength="2048">
            </div>

            <div class="cms-typography">
                <div>
                    <label>Warna Background</label>
                    <input id="cms-button-bg" type="color"
                        value="${getBackgroundColor(selectedElement)}">
                </div>

                <div>
                    <label>Warna Teks</label>
                    <input id="cms-button-color" type="color"
                        value="${getInlineColor(selectedElement)}">
                </div>
            </div>
        `;
    }

    // EDITOR BACKGROUND
    function renderBackgroundFields() {
        const backgroundImage =
            getComputedStyle(selectedElement).backgroundImage || '';

        const imageMatch = backgroundImage.match(/url\(["']?(.*?)["']?\)/);

        fieldsContainer.innerHTML = `
            <div class="cms-field">
                <label>Warna Background</label>
                <input id="cms-background-color" type="color"
                    value="${getBackgroundColor(selectedElement)}">
            </div>

            <div class="cms-field">
                <label>Gambar Background (URL)</label>
                <input id="cms-background-image" type="text"
                    value="${escapeHtml(imageMatch ? imageMatch[1] : '')}"
                    placeholder="Masukkan URL gambar">
            </div>
        `;
    }

    // BUKA MODAL
    function openEditor() {
        if (!selectedElement) return;

        message.className = 'hidden rounded-lg p-3 text-xs';
        message.textContent = '';

        modal.querySelector('#cms-modal-title').textContent =
            `Edit ${getElementLabel(selectedElement)}`;

        const descriptions = {
            text: 'Atur isi dan tampilan teks.',
            image: 'Atur gambar dan deskripsinya.',
            button: 'Atur tulisan, tujuan, dan warna tombol.',
            background: 'Atur warna atau gambar background.'
        };

        modal.querySelector('#cms-modal-description').textContent =
            descriptions[selectedType];

        if (isLegacyHero) {
            renderLegacyHeroFields();
        } else {
            switch (selectedType) {
                case 'text':
                    renderTextFields();
                    break;

                case 'image':
                    renderImageFields();
                    break;

                case 'button':
                    renderButtonFields();
                    break;

                case 'background':
                    renderBackgroundFields();
                    break;
            }
        }

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeEditor() {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    // AMBIL DATA FORM
    function collectLegacyHeroValue() {
        const rows = fieldsContainer.querySelectorAll('.cms-segment');

        const segments = Array.from(rows).map(row => ({
            text: row.querySelector('.cms-segment-text').value.trim(),
            color: row.querySelector('.cms-segment-color').value,
            line_break_after:
                row.querySelector('.cms-segment-break').checked
        }));

        if (!segments.length || segments.some(segment => !segment.text)) {
            throw new Error('Isi semua baris teks terlebih dahulu.');
        }

        const size = Number(getValue('#cms-size'));

        if (!Number.isInteger(size) || size < 20 || size > 100) {
            throw new Error('Ukuran font harus antara 20 sampai 100 px.');
        }

        return {
            segments,
            font: getValue('#cms-font'),
            size,
            weight: getValue('#cms-weight')
        };
    }

    function collectUniversalValue() {
        switch (selectedType) {
            case 'text': {
                const content = getValue('#cms-content').trim();

                if (!content) {
                    throw new Error('Isi teks tidak boleh kosong.');
                }

                const size = Number(getValue('#cms-size'));

                if (!Number.isInteger(size) || size < 8 || size > 120) {
                    throw new Error('Ukuran font harus antara 8 sampai 120 px.');
                }

                return {
                    content,
                    color: getColor('#cms-color', '#000000'),
                    font: getValue('#cms-font'),
                    size,
                    weight: getValue('#cms-weight'),
                    align: getValue('#cms-align')
                };
            }

            case 'image': {
                const src = getValue('#cms-image-src').trim();

                if (!src) {
                    throw new Error('Alamat gambar wajib diisi.');
                }

                return {
                    src,
                    alt: getValue('#cms-image-alt').trim()
                };
            }

            case 'button': {
                const label = getValue('#cms-button-label').trim();
                const url = getValue('#cms-button-url').trim();

                if (!label || !url) {
                    throw new Error('Label dan URL tombol wajib diisi.');
                }

                return {
                    label,
                    url,
                    background_color: getColor('#cms-button-bg', '#2563EB'),
                    text_color: getColor('#cms-button-color', '#FFFFFF')
                };
            }

            case 'background': {
                return {
                    color: getColor('#cms-background-color', '#FFFFFF'),
                    image: getValue('#cms-background-image').trim()
                };
            }

            default:
                throw new Error('Jenis elemen tidak dikenali.');
        }
    }

    // =====================================================
    // SIMPAN KE CMS
    // =====================================================

    form.addEventListener('submit', async event => {
        event.preventDefault();

        if (!selectedElement) return;

        if (!saveUrl || !csrfToken) {
            showMessage('Alamat penyimpanan CMS belum tersedia.');
            return;
        }

        let payload;

        try {
            if (isLegacyHero) {
                payload = collectLegacyHeroValue();
            } else {
                const key = getElementKey(selectedElement);

                if (!key || !key.includes('.')) {
                    throw new Error('CMS key belum diatur pada elemen ini.');
                }

                payload = {
                    key,
                    type: selectedType,
                    value: collectUniversalValue()
                };
            }
        } catch (error) {
            showMessage(error.message);
            return;
        }

        saveButton.disabled = true;
        saveButton.textContent = 'Menyimpan...';

        try {
            const response = await fetch(saveUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify(payload)
            });

            const result = await response.json();

            if (!response.ok || !result.success) {
                const validationMessage = result.errors
                    ? Object.values(result.errors).flat().join(' ')
                    : result.message;

                throw new Error(
                    validationMessage || 'Perubahan gagal disimpan.'
                );
            }

            showMessage(
                'Perubahan berhasil disimpan. Memuat ulang halaman...',
                'success'
            );

            saveButton.textContent = 'Berhasil';

            setTimeout(() => {
                window.location.reload();
            }, 800);

        } catch (error) {
            showMessage(error.message);

            saveButton.disabled = false;
            saveButton.textContent = 'Simpan Perubahan';
        }
    });

    // TUTUP MODAL
    modal.querySelectorAll('[data-close]').forEach(button => {
        button.addEventListener('click', closeEditor);
    });

    modal.addEventListener('click', event => {
        if (event.target === modal) closeEditor();
    });

    document.addEventListener('keydown', event => {
        if (event.key === 'Escape') closeEditor();
    });

    // TOOLBAR
    toolbar.addEventListener('click', event => {
        const button = event.target.closest('[data-action]');

        if (!button || !selectedElement) return;

        if (button.dataset.action === 'edit') {
            openEditor();
        }
    });

    // TUTUP SELEKSI
    document.addEventListener('click', event => {
        if (
            selectedElement &&
            !selectedElement.contains(event.target) &&
            !toolbar.contains(event.target) &&
            !modal.contains(event.target)
        ) {
            selectedElement.classList.remove('cms-selected');
            selectedElement = null;
            toolbar.style.display = 'none';
        }
    });
});
