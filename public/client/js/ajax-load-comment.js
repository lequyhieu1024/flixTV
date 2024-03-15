document.getElementById('commentForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Ngăn chặn sự kiện mặc định của form

        const comment = document.querySelector('.input_comment').value;

        // Kiểm tra xem có bình luận không
        if (comment.trim() === "") {
            alert("Không được bỏ trống bình luận");
            return;
        }

        // Gửi yêu cầu AJAX
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'send-comment/<?php echo $id; ?>/<?php echo $slug; ?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Xử lý phản hồi từ server nếu cần
                console.log('Bình luận đã được gửi thành công:', xhr.responseText);
                // Thực hiện các hành động khác sau khi gửi bình luận thành công (nếu cần)
            } else {
                console.error('Có lỗi xảy ra khi gửi bình luận:', xhr.statusText);
                // Xử lý lỗi nếu cần
            }
        };
        xhr.onerror = function() {
            console.error('Có lỗi xảy ra khi gửi bình luận');
            // Xử lý lỗi nếu cần
        };
        xhr.send('comment=' + encodeURIComponent(comment));
    });