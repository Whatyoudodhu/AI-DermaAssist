// Auto-scroll to product section when a filter/search is active
document.addEventListener('DOMContentLoaded', function () {
    const params = new URLSearchParams(window.location.search);

    if (params.has('search') || params.has('problem') || params.has('type') || params.has('tone')) {
        const section = document.getElementById('productSection');
        if (section) {
            section.scrollIntoView({ behavior: 'smooth' });
        }
    }
});

// Wishlist toggle
document.querySelectorAll('.wishlist-btn').forEach(function (btn) {
    btn.addEventListener('click', function (e) {
        e.preventDefault();
        e.stopPropagation();

        var id = this.dataset.id;
        var el = this;

        fetch('wishlist_toggle.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'product_id=' + id
        })
        .then(function (res) { return res.json(); })
        .then(function (data) {
            if (data.status === 'login') {
                alert('Please login first');
                return;
            }
            if (data.status === 'added') {
                el.innerHTML = '❤️';
            } else if (data.status === 'removed') {
                el.innerHTML = '🤍';
            }
        });
    });
});
