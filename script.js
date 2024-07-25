document.addEventListener('DOMContentLoaded', function() {
    const imageContainer = document.getElementById('image-container');
    let page = 1;
    let loading = false;

    function loadImages() {
        if (loading) return;
        loading = true;

        fetch(`generate_thumbnails.php?page=${page}`)
            .then(response => response.json())
            .then(data => {
                data.images.forEach(image => {
                    const img = document.createElement('img');
                    img.src = image.src;
                    img.alt = image.alt;
                    img.addEventListener('click', () => {
                        window.open(image.src, '_blank');
                    });
                    imageContainer.appendChild(img);
                });
                page++;
                loading = false;
            })
            .catch(error => {
                console.error('Error loading images:', error);
                loading = false;
            });
    }

    function handleScroll() {
        if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 500) {
            loadImages();
        }
    }

    window.addEventListener('scroll', handleScroll);
    loadImages();
});
