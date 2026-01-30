document.addEventListener('DOMContentLoaded', () => {
    // Real-time Search Filter
    const searchInput = document.getElementById('search-input');
    const postItems = document.querySelectorAll('.post-item');

    if (searchInput) {
        searchInput.addEventListener('input', (e) => {
            const term = e.target.value.toLowerCase();
            
            postItems.forEach(item => {
                const title = item.querySelector('.post-link').textContent.toLowerCase();
                if (title.includes(term)) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
        });
    }

    // Like Button Interaction (AJAX)
    const postList = document.getElementById('post-list');
    if (postList) {
        postList.addEventListener('click', (e) => {
            if (e.target.classList.contains('like-btn')) {
                const btn = e.target;
                const postId = btn.getAttribute('data-id');
                const countSpan = btn.previousElementSibling;

                // Send AJAX request
                fetch('api_like.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ post_id: postId })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        btn.classList.add('liked');
                        countSpan.textContent = data.likes;
                        
                        // Optional: Remove liked class after animation so it can be clicked again
                        setTimeout(() => btn.classList.remove('liked'), 300);
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        });
    }
});
