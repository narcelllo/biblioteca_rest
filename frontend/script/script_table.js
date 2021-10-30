
let users = {};
let books = {};

function initTable(type) {
    console.log(type)
    switch (type) {
        case 'books':
            fetch('http://localhost:3333/books')
                .then(function (response) {
                    return response.json();
                })
                .then(usersCollection => {
                    books = usersCollection;

                    let elBooks = ""

                    books.forEach(el => {
                        elBooks += "<tr><td>" + el.id + "</td>"
                        elBooks += "<td>" + el.name + "</td>"
                        elBooks += "<td>" + el.user_id + "</td>"
                        elBooks += "</tr>"
                    });
                    var tableBooks = document.getElementById("table_books");
                    tableBooks.innerHTML = elBooks;
                });
            break;

        case 'users':
            fetch('http://localhost:3333/users')
                .then(function (response) {
                    return response.json();
                })
                .then(usersCollection => {
                    users = usersCollection;

                    let elUsers = ""

                    users.forEach(el => {
                        elUsers += "<tr><td>" + el.id + "</td>"
                        elUsers += "<td>" + el.name + "</td>"
                        elUsers += "<td>" + el.birth_date + "</td>"
                        elUsers += "<td>" + el.cpf + "</td>"
                        elUsers += "<td>" + el.email + "</td>"
                        elUsers += "</tr>"
                    });
                    var tableUsers = document.getElementById("table_users");
                    tableUsers.innerHTML = elUsers;

                });
            break;
    }
}

/*  fetch('http://localhost:3333/users')
    .then(function (response) {
        return response.json();
    })
    .then(usersCollection => {
        users = usersCollection;
    }); 

function initTable(tipo) {
    if (tipo === 'books') {
        fetch('http://localhost:3333/books')
            .then(function (response) {
                return response.json();
            })
            .then(usersCollection => {
                books = usersCollection;

                let elBooks = ""

                books.forEach(el => {
                    elBooks += "<tr><td>" + el.id + "</td>"
                    elBooks += "<td>" + el.name + "</td>"
                    elBooks += "<td>" + el.user_id + "</td>"
                    elBooks += "</tr>"
                });
                var tableBooks = document.getElementById("table_books");
                tableBooks.innerHTML = elBooks;
            });
    } if (tipo === 'users') {
        fetch('http://localhost:3333/users')
            .then(function (response) {
                return response.json();
            })
            .then(usersCollection => {
                books = usersCollection;
                let elUsers = ""

                users.forEach(el => {
                    elUsers += "<tr><td>" + el.id + "</td>"
                    elUsers += "<td>" + el.name + "</td>"
                    elUsers += "<td>" + el.birth_date + "</td>"
                    elUsers += "<td>" + el.cpf + "</td>"
                    elUsers += "<td>" + el.email + "</td>"
                    elUsers += "</tr>"
                });
                var tableUsers = document.getElementById("table_users");
                tableUsers.innerHTML = elUsers;

            }

     let elUsers = ""
     for (var i = 0; i < users.length; i++) {
        elUsers += "<tr><td>" + users[i].id + "</td>"
        elUsers += "<td>" + users[i].name + "</td>"
        elUsers += "<td>" + users[i].birth_date + "</td>"
        elUsers += "<td>" + users[i].cpf + "</td>"
        elUsers += "<td>" + users[i].email + "</td>"
        elUsers += "</tr>"
     }
     var tableUsers = document.getElementById("table");
     tableUsers.innerHTML = elUsers;
 }  */
