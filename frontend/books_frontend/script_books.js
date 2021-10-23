
let users = {};
let books = {};

/* fetch('http://localhost:3333/users')
    .then(function (response) {
        return response.json();
    })
    .then(usersCollection => {
        users = usersCollection;
    }); */
    

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
    
   /*      let elUsers = ""
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
    } */
 