const BASE_URL = 'http://localhost/film_website/admin/users/';
const created_date = document.querySelector('.created_date');
const verified_email = document.querySelector('.verified_email');
const online = document.querySelector('.online');
const tbody = document.querySelector('tbody');

// sắp xếp bằng đã xác nhận email
verified_email.addEventListener('click', () => {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', BASE_URL + 'soft-by-verified-email', true);

    xhr.onload = () => {
        if (xhr.status === 200) {
            const users = JSON.parse(xhr.responseText);
            softByVerified(users);
        }
    };

    xhr.send(); 
});

const softByVerified = (users) => {
    let newHtml = ''; 

    users.forEach(user => {
        newHtml += `<tr>
            <td>
                <div class="main__table-text">${user.id}</div>
            </td>
            <td>
                <div class="main__user">
                    <div class="main__meta">
                        <h3>${user.username}</h3>
                        <span>${user.email}</span>
                    </div>
                </div>
            </td>
            <td>
                <div class="main__table-text">${user.password}</div>
            </td>
            <td>
                <div class="main__table-text">${user.create_at}</div>
            </td>
            <td>
                ${user.verified == 0 ? '<span class="main__table-text main__table-text--red">Chưa xác nhận</span>' : '<span class="main__table-text main__table-text--green">Đã xác nhận</span>'}
            </td>
            <td>
                ${user.is_active == 0 ? '<span class="main__table-text main__table-text--red">Offline</span>' : '<span class="main__table-text main__table-text--green">Online</span>'}
            </td>
            <td>
                <div class="main__table-btns">
                    <a href="${BASE_URL}delete/${user.id}" onclick="return confirm('Bạn chắc chắn xóa người dùng này ?')" class="main__table-btn main__table-btn--delete">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"/></svg>
                    </a>
                </div>
            </td>
        </tr>`;
    });

    tbody.innerHTML = newHtml;
};

created_date.addEventListener('click', () => {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', BASE_URL + 'soft-by-created-date', true);

    xhr.onload = () => {
        if (xhr.status === 200) {
            const users = JSON.parse(xhr.responseText);
            softByCreatedDate(users);
        }
    };

    xhr.send(); 
});

const softByCreatedDate = (users) => {
    let newHtml = ''; 

    users.forEach(user => {
        newHtml += `<tr>
            <td>
                <div class="main__table-text">${user.id}</div>
            </td>
            <td>
                <div class="main__user">
                    <div class="main__meta">
                        <h3>${user.username}</h3>
                        <span>${user.email}</span>
                    </div>
                </div>
            </td>
            <td>
                <div class="main__table-text">${user.password}</div>
            </td>
            <td>
                <div class="main__table-text">${user.create_at}</div>
            </td>
            <td>
                ${user.verified == 0 ? '<span class="main__table-text main__table-text--red">Chưa xác nhận</span>' : '<span class="main__table-text main__table-text--green">Đã xác nhận</span>'}
            </td>
            <td>
                ${user.is_active == 0 ? '<span class="main__table-text main__table-text--red">Offline</span>' : '<span class="main__table-text main__table-text--green">Online</span>'}
            </td>
            <td>
                <div class="main__table-btns">
                    <a href="${BASE_URL}delete/${user.id}" onclick="return confirm('Bạn chắc chắn xóa người dùng này ?')" class="main__table-btn main__table-btn--delete">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"/></svg>
                    </a>
                </div>
            </td>
        </tr>`;
    });

    tbody.innerHTML = newHtml;
};


// sort người online 

online.addEventListener('click', () => {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', BASE_URL + 'soft-by-online',true)

    xhr.onload = () => {
        if(xhr.status === 200){
            const users = JSON.parse(xhr.responseText)
            sortByOnline(users)
        }
    }
    xhr.send();
})
const sortByOnline = (data) => {
    let newHtml = '';
    data.forEach(user => {
        newHtml += `<tr>
            <td>
                <div class="main__table-text">${user.id}</div>
            </td>
            <td>
                <div class="main__user">
                    <div class="main__meta">
                        <h3>${user.username}</h3>
                        <span>${user.email}</span>
                    </div>
                </div>
            </td>
            <td>
                <div class="main__table-text">${user.password}</div>
            </td>
            <td>
                <div class="main__table-text">${user.create_at}</div>
            </td>
            <td>
                ${user.verified == 0 ? '<span class="main__table-text main__table-text--red">Chưa xác nhận</span>' : '<span class="main__table-text main__table-text--green">Đã xác nhận</span>'}
            </td>
            <td>
                ${user.is_active == 0 ? '<span class="main__table-text main__table-text--red">Offline</span>' : '<span class="main__table-text main__table-text--green">Online</span>'}
            </td>
            <td>
                <div class="main__table-btns">
                    <a href="${BASE_URL}delete/${user.id}" onclick="return confirm('Bạn chắc chắn xóa người dùng này ?')" class="main__table-btn main__table-btn--delete">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"/></svg>
                    </a>
                </div>
            </td>
        </tr>`;
    })
    tbody.innerHTML = newHtml;
} 