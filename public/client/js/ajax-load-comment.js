const BASE_URL ='http://localhost/film_website/';

document.addEventListener('DOMContentLoaded', function() {
    const input_comment = document.querySelector('.input_comment');
    const btnSend = document.querySelector('.btn-send');
    const form = document.querySelector('.comments__form');

    btnSend.addEventListener('click', function(e) {
        e.preventDefault(); // Ngăn chặn hành động mặc định của nút gửi

        // Kiểm tra nếu input comment rỗng
        if (input_comment.value.trim() === "") {
            input_comment.focus(); // Di chuyển focus vào input comment
            return false;
        }
        else{
            form.submit();
        }

        // Lấy giá trị của input comment và input hidden movie_id
        const comment = input_comment.value.trim();
        const movie_id = document.querySelector('input[name="movie_id"]').value;

        // Tạo đối tượng FormData để gửi dữ liệu bằng Ajax
        const formData = new FormData();
        formData.append('comment', comment);
        formData.append('movie_id', movie_id);

        // Thay đổi action của form để gửi yêu cầu đến đúng endpoint
        form.action = 'send-comment'; // Đổi action tại đây

        // Gửi dữ liệu đến API bằng Ajax
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'send-comment', true); // Thay 'send-comment' bằng đường dẫn tới API xử lý bình luận
        xhr.onload = function() {
            // Sau khi gửi thành công, load lại danh sách bình luận
            // loadComments();
        };
        xhr.send(formData);
    });

    // Load bình luận khi trang được tải
    // loadComments();
});

// Hàm để load bình luận từ API
const loadMore = document.querySelector('.load-more');
loadMore.addEventListener('click', () => {
    const id = loadMore.dataset.id;
    const xhr = new XMLHttpRequest();
    const url = BASE_URL+'load-comments/'+id;
    // alert(url);
    xhr.open('GET', url, true);

    xhr.onload = function() {
        if (this.status === 200) {
            const comments = JSON.parse(this.responseText);
            loadComments(comments);
        }
    }
    xhr.send();
})
function loadComments(comments) {
    const commentList = document.querySelector('.comments__list');
    let newHTML = '';

    comments.forEach(comment => {
        newHTML += `
            <li class="comments__item">
                <div class="comments__autor">
                    <img class="comments__avatar" src="${BASE_URL}public/images/avatar.svg" alt="">
                    <span class="comments__name"> ${comment.username} </span>
                    <span class="comments__time"> ${comment.comment_time} </span>
                </div>
                <p class="comments__text"> ${comment.comment} </p>
            </li>
            `;
    });
    commentList.innerHTML = newHTML;
}

