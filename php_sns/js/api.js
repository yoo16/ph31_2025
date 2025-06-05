async function updateLike(tweetId, userId) {
    try {
        const response = await fetch('api/like/update.php', {
            method: 'POST',
            credentials: 'include',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                tweet_id: tweetId,
                user_id: userId
            })
        });

        const data = await response.json();
        return data.like_count;
    } catch (error) {
        console.error('Fetch error:', error);
    }
}

async function countLike(tweetId) {
    try {
        const response = await fetch('api/like/count.php', {
            method: 'POST',
            credentials: 'include',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                tweet_id: tweetId
            })
        });

        const data = await response.json();
        return data.like_count;
    } catch (error) {
        console.error('Fetch error:', error);
    }
}

// like-count 要素のクリックイベントを設定
const likeElements = document.querySelectorAll('.like-count');
likeElements.forEach((element) => {
    const tweetId = element.getAttribute('data-tweet-id');
    const userId = element.getAttribute('data-user-id');
    if (!tweetId || !userId) {
        console.error('data属性が設定されていません。');
        return;
    }

    // いいねのクリックイベント
    element.addEventListener('click', async (event) => {
        event.preventDefault();
        const like_count = await updateLike(tweetId, userId);
        document.querySelector(`.like-count[data-tweet-id="${tweetId}"] > span`).textContent = like_count;
    });
});