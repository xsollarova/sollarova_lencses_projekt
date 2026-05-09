document.addEventListener('DOMContentLoaded', () => {

    //hlavný obrázok
    const hlavnyInput = document.getElementById('hlavnyInput');
    if (hlavnyInput) {
        hlavnyInput.addEventListener('change', function () {
            const preview = document.getElementById('hlavnyPreview');
            preview.innerHTML = '';
            if (!this.files[0]) return;

            const wrap = document.createElement('div');
            wrap.style.cssText = 'position:relative;display:inline-block';

            const img = document.createElement('img');
            img.src = URL.createObjectURL(this.files[0]);
            img.style.cssText = 'width:100px;height:100px;object-fit:cover;border-radius:6px';

            const btn = document.createElement('button');
            btn.type = 'button';
            btn.textContent = '×';
            btn.style.cssText = 'position:absolute;top:2px;right:2px;background:red;color:white;border:none;border-radius:50%;width:20px;height:20px;cursor:pointer;font-size:14px;line-height:1;padding:0';
            btn.addEventListener('click', () => {
                hlavnyInput.value = '';
                preview.innerHTML = '';
            });

            wrap.appendChild(img);
            wrap.appendChild(btn);
            preview.appendChild(wrap);
        });
    }

    //miniatúry
    const miniInput = document.getElementById('miniInput');
    if (miniInput) {
        let miniFiles = new DataTransfer();

        miniInput.addEventListener('change', function () {
            for (const file of this.files) {
                miniFiles.items.add(file);
            }
            this.files = miniFiles.files;
            renderMini();
        });

        function renderMini() {
            const preview = document.getElementById('miniPreview');
            preview.innerHTML = '';

            Array.from(miniFiles.files).forEach((file, index) => {
                const wrap = document.createElement('div');
                wrap.style.cssText = 'position:relative;display:inline-block';

                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                img.style.cssText = 'width:100px;height:100px;object-fit:cover;border-radius:6px';

                const btn = document.createElement('button');
                btn.type = 'button';
                btn.textContent = '×';
                btn.style.cssText = 'position:absolute;top:2px;right:2px;background:red;color:white;border:none;border-radius:50%;width:20px;height:20px;cursor:pointer;font-size:14px;line-height:1;padding:0';
                btn.addEventListener('click', () => {
                    const newFiles = new DataTransfer();
                    Array.from(miniFiles.files).forEach((f, i) => {
                        if (i !== index) newFiles.items.add(f);
                    });
                    miniFiles = newFiles;
                    miniInput.files = miniFiles.files;
                    renderMini();
                });

                wrap.appendChild(img);
                wrap.appendChild(btn);
                preview.appendChild(wrap);
            });
        }
    }
});