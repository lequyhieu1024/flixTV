
    function changeEpisode(episodeLink) {
        // Lấy thẻ iframe
        const iframe = document.querySelector('iframe');
        
        // Thay đổi link src của iframe
        iframe.src = episodeLink;
    }
