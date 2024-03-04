const BASE_URL = 'http://localhost/film_website/admin/movies/'
const views = document.querySelector('.views')
const tbody = document.querySelector('tbody')
console.log(tbody)

views.addEventListener('click', () => {
    const xhr = new XMLHttpRequest();
    xhr.open('GET',BASE_URL+'sort-by-views',true)
    xhr.onload = () => {
        if(xhr.status === 200){
        const movies = JSON.parse(xhr.responseText)
        sortByViews(movies)
    }
    }
    xhr.send();
})

const sortByViews = (data) => {
    let newHtml = '';
    data.forEach(movie => {
        newHtml += `<tr>
            <td>
                <div class="main__table-text">${movie.id }</div>
            </td>
            <td>
                <div class="main__table-text"><a href="{{routeAdmin('movies/detail/'.$item->id)}}">${movie.title }</a></div>
            </td>
            <td>
                <div class="main__table-text">${movie.views }</div>
            </td>
            <td>
                <div class="main__table-text main__table-text--rate"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> ${movie.rating }</div>
            </td>
            <td>
                <div class="main__table-text">${movie.name }</div>
            </td>
            <td>
                    ${movie.flag == 1 ? '<div class="main__table-text main__table-text--red">Đã ẩn</div>' : '<div class="main__table-text main__table-text--green">Có thể xem</div>'}
                </div>
            </td>
            <td>
                <div class="main__table-btns">
                    <a href="{{ routeAdmin('movies/update-flag/'.${movie.id}.'/'.${movie.flag}" onclick="return confirm('Bạn có ẩn phim không ?')" class="main__table-btn main__table-btn--banned">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12,13a1.49,1.49,0,0,0-1,2.61V17a1,1,0,0,0,2,0V15.61A1.49,1.49,0,0,0,12,13Zm5-4V7A5,5,0,0,0,7,7V9a3,3,0,0,0-3,3v7a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V12A3,3,0,0,0,17,9ZM9,7a3,3,0,0,1,6,0V9H9Zm9,12a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V12a1,1,0,0,1,1-1H17a1,1,0,0,1,1,1Z" /></svg>
                    </a>
                    <a href="{{routeAdmin('movies/detail/'.${movie.id}" class="main__table-btn main__table-btn--view">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
                    </a>
                    <a href="{{routeAdmin('movies/edit/'.${movie.id}" class="main__table-btn main__table-btn--edit">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,7.24a1,1,0,0,0-.29-.71L17.47,2.29A1,1,0,0,0,16.76,2a1,1,0,0,0-.71.29L13.22,5.12h0L2.29,16.05a1,1,0,0,0-.29.71V21a1,1,0,0,0,1,1H7.24A1,1,0,0,0,8,21.71L18.87,10.78h0L21.71,8a1.19,1.19,0,0,0,.22-.33,1,1,0,0,0,0-.24.7.7,0,0,0,0-.14ZM6.83,20H4V17.17l9.93-9.93,2.83,2.83ZM18.17,8.66,15.34,5.83l1.42-1.41,2.82,2.82Z"/></svg>
                    </a>
                    <a href="{{ routeAdmin('movies/delete/'.${movie.id}" onclick="return confirm('Bạn có muốn xóa không ?')" class="main__table-btn main__table-btn--delete">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"/></svg>
                    </a>
                </div>
            </td>
        </tr>`
    });
    tbody.innerHTML = newHtml;
}


