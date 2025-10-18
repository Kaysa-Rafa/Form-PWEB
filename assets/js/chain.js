document.getElementById('biomeSelect').addEventListener('change', function() {
    const biome = this.value;
    const mobSelect = document.getElementById('mobSelect');
    mobSelect.innerHTML = ''; // Reset opsi

    const mobs = {
        'Overworld': ['Zombie', 'Skeleton', 'Creeper', 'Villager'],
        'Nether': ['Ghast', 'Piglin', 'Blaze', 'Wither Skeleton'],
        'End': ['Enderman', 'Shulker', 'Ender Dragon']
    };

    if (mobs[biome]) {
        mobs[biome].forEach(mob => {
            const option = document.createElement('option');
            option.value = mob;
            option.textContent = mob;
            mobSelect.appendChild(option);
        });
    } else {
        const opt = document.createElement('option');
        opt.textContent = 'Tidak ada mob untuk biome ini';
        mobSelect.appendChild(opt);
    }
});
